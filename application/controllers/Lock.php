<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lock extends CI_Controller{

	function __construct(){
		parent::__construct();

		if(!isAuth('admin,user,petugas')){
			$this->event->show_401();

			exit;
		}
	}

	public function index(){
		$isLocked = $this->session->userdata('lock');

		if($isLocked){
			if($this->form_validation->run('lockscreen') == FALSE){
				$url = $this->input->get('redirect') ? "lock?redirect=".$this->input->get('redirect') : "lock";
				$this->event->view('lockscreen', array('url' => $url));
			}
			else{
				if($this->model->openLock()){
					$url = $this->input->get('redirect') ? $this->input->get('redirect') : "home";
					redirect($url);
				}
				else{
					$this->session->set_flashdata('error', 'Kata sandi salah');
					$url = $this->input->get('redirect') ? "lock?redirect=".$this->input->get('redirect') : "lock";
					redirect($url);
				}
			}
		}
		else{
			$url = $this->input->get('redirect') ? "lock?redirect=".$this->input->get('redirect') : "lock";
			$this->session->set_userdata('lock', TRUE);
			redirect($url);
		}
	}

}

/* End of file Lock.php */
/* Location: ./application/controllers/Lock.php */