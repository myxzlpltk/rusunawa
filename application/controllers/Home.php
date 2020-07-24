<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();
	}

	public function index(){
		if(isAuth('admin')){
			$data = $this->model->dashboardAdmin();
			$this->event->view('admin/dashboard', $data);
		}
		elseif(isAuth('user')){
			$this->load->model('m_pelanggan');
			$id = $this->session->userdata('id');
			$pelanggan = $this->m_pelanggan->data($id);

			if(!empty($pelanggan)){
				$data['pelanggan'] = $pelanggan;
				$data['tagihan'] = $this->m_pelanggan->tagihan($id);
				$data['menu'] = 1;

				$this->event->view('view_pelanggan', $data);
			}
			else{
				show_404();
			}
		}
		elseif(isAuth('petugas')){
			$this->load->model('m_petugas');
			$id = $this->session->userdata('id');
			$petugas = $this->m_petugas->data($id);

			if(!empty($petugas)){
				$data['petugas'] = $petugas;
				$data['menu'] = 1;

				$this->event->view('view_petugas', $data);
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */