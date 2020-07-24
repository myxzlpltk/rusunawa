<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Profil extends CI_Model {

	public function data(){
		$id = $this->session->userdata('id');

		return $this->db
			->where('id_user', $id)
			->get('user')
			->row();
	}

	public function updateAvatar($id){
		$avatar = $this->config->item('avatar');
		$id = intval($id);

		if(isset($avatar[$id])){
			$id_user = $this->session->userdata('id');

			$this->db
				->set('avatar', $avatar[$id])
				->where('id_user', $id_user)
				->update('user');

			$this->session->set_userdata('avatar', $avatar[$id]);

			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function updateUsername(){
		$username = $this->input->post('username');
		$id_user = $this->session->userdata('id');

		$query = $this->db
			->set('username', $username)
			->where('id_user', $id_user)
			->update('user');

		if($query){
			$this->session->set_userdata('username', $username);
			return TRUE;
		}
		else{
			return FALSE;
		}	

	}

	public function updatePassword(){
		$password = $this->input->post('new_password');
		$id_user = $this->session->userdata('id');

		$query = $this->db
			->set('password', password_hash($password, PASSWORD_DEFAULT))
			->where('id_user', $id_user)
			->update('user');

		if($query){
			return TRUE;
		}
		else{
			return FALSE;
		}	

	}

}

/* End of file M_Profil.php */
/* Location: ./application/models/M_Profil.php */