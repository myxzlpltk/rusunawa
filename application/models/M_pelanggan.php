<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {

	public function data($id){
		return $this->db
			->where('user.id_user', $id)
			->join('pelanggan', 'pelanggan.id_user = user.id_user', 'inner')
			->get('user')
			->row();
	}

	public function insert(){
		$data = $this->input->post();
		$user = array(
			'username' => $data['username'],
			'password' => password_hash($data['password'], PASSWORD_DEFAULT),
			'role' => 'user',
			'blokir' => 'n',
			'avatar' => $data['avatar']
		);

		$query = $this->db->insert('user', $user);
		
		if($query){
			$id = $this->db->insert_id();

			$pelanggan = array(
				'id_user' => $id,
				'nama' => $data['nama'],
				'telepon' => $data['telepon'],
				'jenis_identitas' => $data['jenis_identitas'],
				'no_identitas' => $data['no_identitas']
			);

			$query = $this->db->insert('pelanggan', $pelanggan);

			return $query ? $id : FALSE;
		}
		else{
			return FALSE;
		}

		return TRUE;
	}

	public function tagihan($id=null){
		return $this->db
			->where('id_user', $id)
			->where('status', 'aktif')
			->get('tagihan')
			->result();
	}

	public function delete($id){
		$query = $this->db
			->where('id_user', $id)
			->delete('tagihan');

		if($query){
			$query = $this->db
				->where('id_user', $id)
				->delete('pelanggan');

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
		$pelanggan = $this->db
			->where('id_user', $id)
			->get('user')
			->row();

		if(!empty($pelanggan)){
			$data = $pelanggan->blokir == 'n' ? 'y' : 'n';

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

			$pelanggan = array(
				'nama' => $data['nama'],
				'telepon' => $data['telepon'],
				'jenis_identitas' => $data['jenis_identitas'],
				'no_identitas' => $data['no_identitas']
			);

			$query = $this->db
				->set($pelanggan)
				->where('id_user', $id)
				->update('pelanggan');

			return $query;
		}
		else{
			return FALSE;
		}

		return TRUE;
	}
}

/* End of file M_pelanggan.php */
/* Location: ./application/models/M_pelanggan.php */