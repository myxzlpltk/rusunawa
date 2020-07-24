<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	public function data($id){
		return $this->db
			->where('id_berita', $id)
			->get('berita')
			->row();
	}

	public function tambah(){
		$config['upload_path'] = './uploads/berita/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10240';
		$config['file_ext_tolower'] = TRUE;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('file')){
			return $this->upload->display_errors();
		}
		else{
			$data = array(
				'judul' => $this->input->post('title'),
				'isi' => $this->input->post('isi'),
				'image' => $this->upload->data('file_name')
			);

			$this->db
				->set($data)
				->insert('berita');

			return TRUE;
		}
	}

	public function delete($id){
		$berita = $this->data($id);

		if(!empty($berita)){
			$file = './uploads/berita/'.$berita->image;

			@unlink($file);

			$this->db
				->where('id_berita', $id)
				->delete('berita');

			$row = $this->db->affected_rows();

			if($row > 0){
				return TRUE;
			}
			else{
				return 'Gagal menghapus data berita';
			}
		}
		else{
			return 'Berita tidak dapat ditemukan';
		}
	}

	public function update($id){
		$data = array(
			'judul' => $this->input->post('title'),
			'isi' => $this->input->post('isi'),
		);
		
		$config['upload_path'] = './uploads/berita/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10240';
		$config['file_ext_tolower'] = TRUE;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if($this->upload->do_upload('file')){
			$data['image'] = $this->upload->data('file_name');

			$berita = $this->data($id);
			@unlink('./uploads/berita/'.$berita->image);
		}

		$this->db
			->set($data)
			->where('id_berita', $id)
			->update('berita');

		if($this->db->affected_rows() > 0){
			return TRUE;
		}
		else{
			return 'Gagal memperbarui berita';
		}
	}

	public function ajax(){
		$last = intval($this->input->post('id'));
		$query = $this->input->post('q');
		$where = array();
		$like = array();

		if(!empty($last)){
			$where['id_berita < '] = $last;
		}
		if(!empty($query)){
			$like = array(
				'judul' => $query,
				'isi' => $query
			);
		}

		$this->db->simple_query("SET lc_time_names = 'id_ID'");
		$data = $this->db
			->select("id_berita AS id, image, judul, DATE_FORMAT(tanggal, '%e %M %Y') AS tanggal")
			->where($where)
			->group_start()
			->or_like($like)
			->where('1', '1')
			->group_end()
			->order_by('id_berita', 'desc')
			->limit(15)
			->get('berita')
			->result();

		foreach($data as $k => $d){
			$data[$k]->slug = underscore(strtolower($d->judul));
		}

		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function view($slug){
		$title = humanize($slug);

		$data = $this->db
			->where('judul', $title)
			->get('berita')
			->row();

		return $data;
	}

	public function hit($id){
		return $this->db
			->set('viewer', 'viewer+1', FALSE)
			->update('berita');
	}

}

/* End of file M_berita.php */
/* Location: ./application/models/M_berita.php */