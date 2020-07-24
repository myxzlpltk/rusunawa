<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{

	function __construct(){
		parent::__construct();

		$this->event->auth();
	}

	public function index(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'Berhasil keluar');
		redirect('login');
	}

}

/* End of file Logout.php */
/* Location: ./application/controllers/Logout.php */