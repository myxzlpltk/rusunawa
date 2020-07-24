<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$data['slider'] = $this->model->slider();

		$this->event->view('welcome', $data);
	}

}

/* End of file Welcome.php */
/* Location: ./application/Welcome.php */