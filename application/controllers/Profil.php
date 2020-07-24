<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_profil');
	}

	public function index(){
		$data['profil'] = $this->m_profil->data();

		$this->event->view('profil', $data);
	}

	public function avatar($id=null){
		if($this->m_profil->updateAvatar($id)){
			$this->session->set_flashdata('success', 'Berhasil memperbarui avatar');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal memperbarui avatar');
		}
		redirect('profil');
	}

	public function username(){
		if($this->form_validation->run('updateUsername') == TRUE){
			if($this->m_profil->updateUsername()){
				$this->session->set_flashdata('success', 'Berhasil memperbarui username');
				redirect('profil');
			}
			else{
				$this->session->set_flashdata('error', 'Gagal memperbarui username');
				redirect('profil');
			}
		}
		else{
			$error = $this->form_validation->error_array();
			$this->session->set_flashdata('error', $error);
			redirect('profil');
		}
	}

	public function password(){
		if($this->form_validation->run('updatePassword') == TRUE){
			if($this->m_profil->updatePassword()){
				$this->session->set_flashdata('success', 'Berhasil memperbarui kata sandi');
				redirect('profil');
			}
			else{
				$this->session->set_flashdata('error', 'Gagal memperbarui kata sandi');
				redirect('profil');
			}
		}
		else{
			$error = $this->form_validation->error_array();
			$this->session->set_flashdata('error', $error);
			redirect('profil');
		}
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */