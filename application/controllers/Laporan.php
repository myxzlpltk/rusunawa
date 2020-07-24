<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_laporan');
	}

	public function index(){
		$data = array();
		if(isAuth('admin')){
			$data['jenis'] = $this->m_laporan->jenis();
		}
		$this->event->view('admin/laporan', $data);
	}

	public function data($id=null){
		if($this->input->is_ajax_request()){
			if(!isAuth('admin')){
				$id = $this->session->userdata('id');
			}
			$this->dataTable->laporan($id);
		}
		else{
			$this->event->show_406();
		}
	}

	public function view($id=null){
		$laporan = $this->m_laporan->data($id);

		if(!empty($laporan)){
			$data['laporan'] = $laporan;
			$this->event->view('view_laporan', $data);
		}
		else{
			show_404();
		}
	}

	public function file($id=null){
		$this->m_laporan->file($id);
	}

	public function verify($id=null){
		$laporan = $this->m_laporan->data($id);

		if(!empty($laporan)){
			if($this->m_laporan->verify($id)){
				$this->session->set_flashdata('success', 'Berhasil memverifikasi laporan');
			}
			else{
				$this->session->set_flashdata('success', 'Berhasil memverifikasi laporan');
			}
			redirect('laporan/view/'.$id);
		}
		else{
			show_404();
		}
	}

	public function delete($id=null){
		if($this->m_laporan->delete($id)){
			$this->session->set_flashdata('success', 'Berhasil menghapus laporan');
			redirect('laporan');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal menghapus laporan');
			redirect('laporan/view/'.$id);
		}
	}

	public function tambah_jenis(){
		if($this->form_validation->run('tambahJenis') == FALSE){
			$this->event->view('admin/tambah_jenis');
		}
		else{
			if($this->m_laporan->addJenis()){
				$this->session->set_flashdata('success', 'Berhasil menambah jenis laporan');
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menambah jenis laporan');
			}
			redirect('laporan');
		}
	}

	public function edit_jenis($id=null){
		$jenis = $this->m_laporan->data_jenis($id);
		if(!empty($jenis)){
			$_POST['id'] = $id;

			if($this->form_validation->run('editJenis') == FALSE){
				$data = array('jenis' => $jenis);
				$this->event->view('admin/edit_jenis', $data);
			}
			else{
				if($this->m_laporan->updateJenis($id)){
					$this->session->set_flashdata('success', 'Berhasil memperbarui jenis laporan');
				}
				else{
					$this->session->set_flashdata('error', 'Gagal memperbarui jenis laporan');
				}
				redirect('laporan');
			}
		}
		else{
			show_404();
		}
	}

	public function delete_jenis($id=null){
		if($this->m_laporan->deleteJenis($id)){
			$this->session->set_flashdata('success', 'Berhasil menghapus jenis laporan');
		}
		else{
			$this->session->set_flashdata('error', 'Gagal menghapus jenis laporan');
		}
		redirect('laporan');
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */