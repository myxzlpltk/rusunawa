<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		if($this->form_validation->run('login') == FALSE){
			$this->event->view('login');
		}
		else{
			$message = $this->model->auth();

			if($message === TRUE){
				$this->session->set_flashdata('success', 'Selamat datang!');
				redirect('home');
			}
			else{
				$this->session->set_flashdata('error', $message);
				redirect('login');
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */