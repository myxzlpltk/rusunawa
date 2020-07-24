<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	public function data($id=null){
		$id_user = isAuth('admin') ? array() : array('id_user' => $this->session->userdata('id'));

		$laporan = $this->db
			->where('id_laporan', $id)
			->where($id_user)
			->join('jenis', 'jenis.id_jenis = laporan.id_jenis', 'inner')
			->get('laporan')
			->row();

		if(!empty($laporan)){
			$laporan->petugas = $this->db
				->where('petugas.id_user', $laporan->id_user)
				->join('user', 'user.id_user = petugas.id_user', 'inner')
				->get('petugas')
				->row();

			$laporan->detail = $this->db
				->where('id_laporan', $id)
				->get('detail_laporan')
				->result();
		}

		return $laporan;
	}

	public function file($id=null){
		$id_user = isAuth('admin') ? array() : array('id_user' => $this->session->userdata('id'));
		
		$file = $this->db
			->where('id_detail', $id)
			->where($id_user)
			->join('laporan', 'laporan.id_laporan = detail_laporan.id_laporan', 'inner')
			->get('detail_laporan')
			->row();

		if(!empty($file)){

			$image = file_get_contents('./uploads/laporan/'.$file->file);

			$this->output
				->set_content_type('img')
				->set_output($image)
				->_display();
			exit;
		}
		else{
			show_404();
		}
	}

	public function verify($id=null){
		return $this->db
			->set('isVerified', '1')
			->where('id_laporan', $id)
			->update('laporan');
	}

	public function delete($param){
		if(is_array($param)){
			foreach($param as $value){
				$this->delete($value);
			}

			return TRUE;
		}
		else{
			$id = $param;

			$laporan = $this->db
				->where('id_laporan', $id)
				->get('detail_laporan')
				->result();

			foreach($laporan as $f){
				$file = './uploads/'.$f->file;

				@unlink($file);
			}

			$this->db
				->where('id_laporan', $id)
				->delete('detail_laporan');

			$this->db
				->where('id_laporan', $id)
				->delete('laporan');

			return TRUE;
		}
	}

	public function jenis(){
		return $this->db
			->select('jenis.*, COUNT(laporan.id_jenis) AS total')
			->join('laporan', 'laporan.id_jenis = jenis.id_jenis', 'left')
			->group_by('jenis.id_jenis')
			->get('jenis')
			->result();
	}

	public function data_jenis($id){
		return $this->db
			->select('jenis.*, COUNT(laporan.id_jenis) AS total')
			->where('jenis.id_jenis', $id)
			->join('laporan', 'laporan.id_jenis = jenis.id_jenis', 'left')
			->group_by('jenis.id_jenis')
			->get('jenis')
			->row();
	}

	public function addJenis(){
		$nama = $this->input->post('nama');

		$query = $this->db
			->set('nama', $nama)
			->insert('jenis');

		return boolval($query);
	}

	public function deleteJenis($id){
		$laporan = $this->db
			->where('id_jenis', $id)
			->from('laporan')
			->count_all_results();

		if($laporan == 0){
			$this->db
				->where('id_jenis', $id)
				->delete('jenis');

			if($this->db->affected_rows() > 0){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}

	public function updateJenis($id){
		$nama = $this->input->post('nama');

		$query = $this->db
			->set('nama', $nama)
			->where('id_jenis', $id)
			->update('jenis');

		if($query){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */