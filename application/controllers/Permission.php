<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

	public function index(){
		
		$this->model->get_permission(__FILE__);
	}

}

/* End of file Permission.php */
/* Location: ./application/controllers/Permission.php */