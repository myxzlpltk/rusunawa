<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_slider');
	}

	public function index(){
		$data['slider'] = $this->model->slider();
		$this->event->view('admin/slider', $data);
	}

	public function tambah(){
		if($this->form_validation->run('tambah_slider') == FALSE){
			$this->event->view('admin/tambah_slider');
		}
		else{
			if($this->m_slider->upload()){
				$this->session->set_flashdata('success', 'Berhasil menambah slider');
				redirect('slider');
			}
			else{
				redirect('slider/tambah');
			}
		}
	}

	public function delete($id=null){
		if($this->m_slider->delete($id)){
			$this->session->set_flashdata('success', 'Berhasil menghapus slider');
			redirect('slider');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal menghapus slider');
			redirect('slider');
		}
	}

	public function up($id){
		if($this->m_slider->up($id)){
			$this->session->set_flashdata('success', 'Berhasil menaikkan slider');
			redirect('slider');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal menaikkan slider');
			redirect('slider');
		}
	}

	public function down($id){
		if($this->m_slider->down($id)){
			$this->session->set_flashdata('success', 'Berhasil menurunkan slider');
			redirect('slider');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal menurunkan slider');
			redirect('slider');
		}
	}

}

/* End of file Slider.php */
/* Location: ./application/controllers/Slider.php */