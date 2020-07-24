<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

	public function data($id){
		return $this->db
			->where('user.id_user', $id)
			->join('petugas', 'petugas.id_user = user.id_user', 'inner')
			->get('user')
			->row();
	}

	public function insert(){
		$data = $this->input->post();
		$user = array(
			'username' => $data['username'],
			'password' => password_hash($data['password'], PASSWORD_DEFAULT),
			'role' => 'petugas',
			'blokir' => 'n',
			'avatar' => $data['avatar']
		);

		$query = $this->db->insert('user', $user);
		
		if($query){
			$id = $this->db->insert_id();

			$petugas = array(
				'id_user' => $id,
				'nama' => $data['nama'],
				'telepon' => $data['telepon'],
				'jenis_identitas' => $data['jenis_identitas'],
				'no_identitas' => $data['no_identitas']
			);

			$query = $this->db->insert('petugas', $petugas);

			return $query ? $id : FALSE;
		}
		else{
			return FALSE;
		}

		return TRUE;
	}

	public function update($id){
		$data = $this->input->post();
		$user = array(
			'username' => $data['username'],
			'avatar' => $data['avatar']
		);

		$query = $this->db
			->set($user)
			->where('id_user', $id)
			->update('user', $user);
		
		if($query){

			$petugas = array(
				'nama' => $data['nama'],
				'telepon' => $data['telepon'],
				'jenis_identitas' => $data['jenis_identitas'],
				'no_identitas' => $data['no_identitas']
			);

			$query = $this->db
				->set($petugas)
				->where('id_user', $id)
				->update('petugas');

			return $query;
		}
		else{
			return FALSE;
		}

		return TRUE;
	}

	public function delete($id){
		$laporan = $this->db
			->where('id_user', $id)
			->get('laporan')
			->result();

		$this->load->model('m_laporan');

		$query = $this->m_laporan->delete(array_column($laporan, 'id_laporan'));

		if($query){
			$query = $this->db
				->where('id_user', $id)
				->delete('petugas');

			if($query){
				$query = $this->db
					->where('id_user', $id)
					->delete('user');

				if($query){
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
		else{
			return FALSE;
		}
	}

	public function toggle($id){
		$petugas = $this->db
			->where('id_user', $id)
			->get('user')
			->row();

		if(!empty($petugas)){
			$data = $petugas->blokir == 'n' ? 'y' : 'n';

			return $this->db
				->set('blokir', $data)
				->where('id_user', $id)
				->update('user');
		}
		else{
			return FALSE;
		}
	}

	public function reset($id){
		$password = password_hash($this->config->item('default_password'), PASSWORD_DEFAULT);

		$this->db
			->set('password', $password)
			->where('id_user', $id)
			->update('user');

		return $this->db->affected_rows();
	}

	public function jenis(){
		return $this->db
			->get('jenis')
			->result();
	}

	public function lapor($id){
		$files = $_FILES['file'];

		$data = array(
			'id_jenis' => $this->input->post('id_jenis'),
			'id_user' => $id
		);

		$query = $this->db
			->set($data)
			->insert('laporan');

		if($query){
			$id = $this->db->insert_id();

			$detail = array();

			foreach($files['tmp_name'] as $key => $value){
				$file = array(
					'name' => $files['name'][$key],
					'type' => $files['type'][$key],
					'tmp_name' => $files['tmp_name'][$key],
					'error' => $files['error'][$key],
					'size' => $files['size'][$key]
				);

				$_FILES['upload'] = $file;

				$config['upload_path'] = './uploads/laporan/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '10240';
				$config['file_ext_tolower'] = TRUE;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('upload')){
					$detail[] = array(
						'id_laporan' => $id,
						'file' => $this->upload->data('file_name')
					);
				}
			}

			$this->db->insert_batch('detail_laporan', $detail);

			return count($detail);
		}
		else{
			return FALSE;
		}
	}

}

/* End of file M_petugas.php */
/* Location: ./application/models/M_petugas.php */