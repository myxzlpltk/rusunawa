<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tagihan extends CI_Model {

	public function insert($id){
		$data = array(
			'id_user' => $id,
			'nama_tagihan' => $this->input->post('nama_tagihan'),
			'deskripsi' => $this->input->post('deskripsi'),
			'nominal' => $this->input->post('nominal'),
			'tanggal_tenggat' => $this->input->post('date'),
		);

		$query = $this->db->insert('tagihan', $data);

		return $query ? $this->db->insert_id() : $query;
	}

	public function data($id){
		$id_user = isAuth('admin') ? array() : array('id_user' => $this->session->userdata('id'));
		$tagihan = $this->db
			->where('id_tagihan', $id)
			->where($id_user)
			->get('tagihan')
			->row();

		if(!empty($tagihan)){
			$tagihan->pemilik = $this->db
				->join('pelanggan', 'user.id_user = pelanggan.id_user', 'inner')
				->where('user.id_user', $tagihan->id_user)
				->get('user')
				->row();

			return $tagihan;
		}
		else{
			return NULL;
		}
	}

	public function error_bayar($param=null){
		if(is_object($param)){
			$tagihan = $param;

			$pembayaran = $this->db
				->where('id_tagihan', $tagihan->id_tagihan)
				->order_by('RAND()', FALSE)
				->get('pembayaran')
				->result();
			$pertanggal = array_column($pembayaran, 'pertanggal');
			array_multisort($pembayaran, $pertanggal);

			$error = array(
				'ganda' => array(),
				'hilang' => array()
			);

			$max_loop = count($pertanggal)-1;
			for($i=0;$i<$max_loop;$i++){
				$from = date_create($pertanggal[$i]);
				$to = date_create($pertanggal[$i+1]);

				$months = date_diff($from, $to)->format('%R%m');
				if($months < 1){
					$error['ganda'][] = $pertanggal[$i];
				}
				elseif($months > 1){
					for($j=1;$j<$months;$j++){
						$error['hilang'][] = date('Y-m-d', strtotime("+{$j} months", strtotime($pertanggal[$i])));
					}
				}
				else{

				}
			}

			return $error;
		}
		elseif(is_integer($param)){
			$tagihan = $this->data($param);

			if(!empty($tagihan)){
				return $this->error_bayar($tagihan);
			}
			else{
				return NULL;
			}
		}
		else{
			return NULL;
		}
	}

	public function tunggakan($param=null){
		if(is_object($param)){
			$tagihan = $param;

			$tenggat = $tagihan->tanggal_tenggat;
			$now = date('Y-m-d');

			$from = date_create($tenggat);
			$to = date_create($now);

			$interval = date_diff($from, $to);

			$months = $interval->format('%R%m');
			$days = $interval->format('%R%d');

			if($days > 0 && $months >= 0){
				$months++;
			}

			$tunggakan = array();
			for($i=0;$i<$months;$i++){
				$tunggakan[] = date('Y-m-d', strtotime("+{$i} months", strtotime($tenggat)));
			}

			return $tunggakan;
		}
		elseif(is_integer($param)){
			$tagihan = $this->data($param);

			if(!empty($tagihan)){
				return $this->tunggakan($tagihan);
			}
			else{
				return NULL;
			}
		}
		else{
			return NULL;
		}
	}

	public function bayar($param, $total){
		if(is_object($param)){
			$tagihan = $param;
			$startDate = $tagihan->tanggal_tenggat;
			$ids = array();

			for($i=0;$i<$total;$i++){
				$data = array(
					'id_tagihan' => $tagihan->id_tagihan,
					'nominal_bayar' => $tagihan->nominal,
					'pertanggal' => date('Y-m-d', strtotime("+{$i} months", strtotime($startDate)))
				);

				$this->db->insert('pembayaran', $data);
				$ids[] = $this->db->insert_id();
			}

			return $ids;
		}
		elseif(is_integer($param)){
			$tagihan = $this->data($param);

			if(!empty($param)){
				return $this->bayar($tagihan);
			}
			else{
				return NULL;
			}
		}
		else{
			return NULL;
		}
	}

	public function cetak($ids){
		$this->load->library('fpdf/fpdf');

		$data = $this->db
			->where_in('id', $ids)
			->get('pembayaran')
			->result();

		if(count($data) > 0){

			$bayar = $data[0];
			$pelanggan = $this->db
				->select('pelanggan.*')
				->where('id_tagihan', $bayar->id_tagihan)
				->join('pelanggan', 'pelanggan.id_user = tagihan.id_user', 'inner')
				->get('tagihan')
				->row();

			$pdf = new FPDF();

			$pdf->SetAutoPageBreak(TRUE);
			$pdf->SetSubject('Invoice');
			$pdf->SetTitle('Invoice');
			$pdf->SetAuthor('Rusunawa Jepun');
			$pdf->SetCreator('Web Server');

			$pdf->AddPage('P', array('150', '150'));
			$pdf->SetFont('Arial','I',8);
			$pdf->Cell(130, 10, 'Dibuat di server secara otomatis pada '.fix_datetime(date('Y-m-d H:i:s')), 0, 1, 'L');

			$pdf->SetFont('Arial', '', 10);
			$pdf->Write(10, "Nama : {$pelanggan->nama}");
			$pdf->Ln(5);
			$pdf->Write(10, "No. HP : {$pelanggan->telepon}");
			$pdf->Ln(5);
			$pdf->Write(10, "Tanggal : ".fix_datetime($bayar->tanggal));
			$pdf->Ln(5);

			$pdf->Ln(5);

			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(10, 8, 'No.', 0, 0, 'R');
			$pdf->Cell(60, 8, 'Pertanggal', 0, 0, 'L');
			$pdf->Cell(60, 8, 'Nominal', 0, 0, 'L');
			$pdf->Ln();
			$pdf->Line($pdf->GetX(), $pdf->GetY(), 130, $pdf->GetY());

			$total = 0;
			foreach($data as $k => $d){
				$pertanggal = date_create($d->pertanggal);
				$pertanggal = bulan(date_format($pertanggal,"m")).date_format($pertanggal,"Y");

				$pdf->Cell(10, 8, ($k+1).'.', 0, 0, 'R');
				$pdf->Cell(60, 8, $pertanggal, 0, 0, 'L');
				$pdf->Cell(60, 8, idr($d->nominal_bayar), 0, 0, 'L');
				$pdf->Ln();

				$total += $d->nominal_bayar;
			}

			$pdf->Line($pdf->GetX(), $pdf->GetY(), 130, $pdf->GetY());
			$pdf->Cell(70, 8, 'Total : ', 0, 0, 'R');
			$pdf->Cell(60, 8, idr($total), 0, 0, 'L');
			$pdf->Ln();

			$file = $pdf->Output('S');

			$this->load->helper('download');
			force_download('Invoice '.$pelanggan->nama.'.pdf', $file);

			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function update($id){
		$data = $this->input->post();
		
		$query = $this->db
			->set('nama_tagihan', $data['nama_tagihan'])
			->set('deskripsi', $data['deskripsi'])
			->set('nominal', $data['nominal'])
			->where('id_tagihan', $id)
			->update('tagihan');

		$affected_rows = $this->db->affected_rows();

		return array('status' => $query, 'affected_rows' => $affected_rows);
	}

	public function stop($id){
		$query = $this->db
			->set('status', 'tidak aktif')
			->where('id_tagihan', $id)
			->update('tagihan');

		$affected_rows = $this->db->affected_rows();

		return array('status' => $query, 'affected_rows' => $affected_rows);
	}

	public function delete($id){
		$query = $this->db
			->where('id_tagihan', $id)
			->delete('tagihan');

		$affected_rows = $this->db->affected_rows();

		return array('status' => $query, 'affected_rows' => $affected_rows);
	}	

}

/* End of file M_tagihan.php */
/* Location: ./application/models/M_tagihan.php */