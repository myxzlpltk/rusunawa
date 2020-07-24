<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('m_berita');
	}

	public function index(){
		$this->event->auth();
		
		$this->event->view('admin/berita');
	}

	public function data(){
		$this->event->auth();

		if($this->input->is_ajax_request()){
			$this->dataTable->berita();
		}
		else{
			$this->event->show_406();
		}
	}

	public function list(){
		if($this->input->is_ajax_request()){
			$this->m_berita->ajax();
		}
		else{
			$this->event->show_406();
		}
	}

	public function baca($slug=null){
		$berita = $this->m_berita->view($slug);

		if(!empty($berita)){
			$berita->viewer++;
			$data['berita'] = $berita;
			$this->m_berita->hit($berita->id_berita);
			$this->event->view('view_berita', $data);
		}
		else{
			show_406();
		}
	}

	public function tambah($id=null){
		$this->event->auth();

		if($this->form_validation->run('berita') == FALSE){
			$this->event->view('admin/tambah_berita');
		}
		else{
			$status = $this->m_berita->tambah($id);
			if($status == TRUE){
				$this->session->set_flashdata('success', 'Berhasil menambah berita');
				redirect('berita');
			}
			else{
				$this->session->set_flashdata('error', $status);
				redirect('berita/tambah');
			}
		}	
	}

	public function edit($id=null){
		$this->event->auth();
		
		$berita = $this->m_berita->data($id);

		if(!empty($berita)){
			if($this->form_validation->run('berita') == FALSE){
				$data['berita'] = $berita;
				$this->event->view('admin/edit_berita', $data);
			}
			else{
				$status = $this->m_berita->update($id);
				if($status == TRUE){
					$this->session->set_flashdata('success', 'Berhasil memperbaharui berita');
				}
				else{
					$this->session->set_flashdata('error', $status);
				}
				redirect('berita');
			}
		}
		else{
			$this->session->set_flashdata('error', 'Berita tidak dapat ditemukan');
		}
	}

	public function delete($id=null){
		$this->event->auth();

		$status = $this->m_berita->delete($id);
		if($status == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menghapus berita');
		}
		else{
			$this->session->set_flashdata('error', $status);
		}
		redirect('berita');
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */