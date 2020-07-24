<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_pelanggan');
	}

	public function index(){
		$this->event->view('admin/pelanggan');
	}

	public function tambah(){
		if($this->form_validation->run('tambah_pelanggan') == FALSE){
			$data['password'] = $this->event->get_password();
			$this->event->view('admin/tambah_pelanggan', $data);
		}
		else{
			$data = $this->input->post();
			if($id = $this->m_pelanggan->insert()){
				$this->session->set_flashdata('success', 'Berhasil menyimpan data');
				redirect('pelanggan/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menyimpan data');
				redirect('pelanggan/tambah');
			}
		}
	}

	public function view($id=null){
		$pelanggan = $this->m_pelanggan->data($id);

		if(!empty($pelanggan)){
			$data['pelanggan'] = $pelanggan;
			$data['tagihan'] = $this->m_pelanggan->tagihan($id);
			$data['menu'] = 2;

			$this->event->view('view_pelanggan', $data);
		}
		else{
			show_404();
		}
	}

	public function edit($id=null){
		$menu = 2;
		if(!isAuth('admin')){
			$id = $this->session->userdata('id');
			$menu = 1;
		}
		$pelanggan = $this->m_pelanggan->data($id);

		if(!empty($pelanggan)){
			if($this->form_validation->run('edit_pelanggan') == FALSE){
				$data['pelanggan'] = $pelanggan;
				$data['menu'] = $menu;
				$this->event->view('admin/edit_pelanggan', $data);
			}
			else{
				if($this->m_pelanggan->update($id)){
					$this->session->set_flashdata('success', 'Berhasil memperbarui data');
					if(isAuth('admin')){
						redirect('pelanggan/view/'.$id);
					}
					else{
						redirect('home');
					}
				}
				else{
					$this->session->set_flashdata('error', 'Gagal memperbarui data');
					redirect('pelanggan/edit/'.$id);
				}
			}
		}
		else{
			show_404();
		}
	}

	public function delete($id=null){
		$pelanggan = $this->m_pelanggan->data($id);

		if(!empty($pelanggan)){
			
			if($this->m_pelanggan->delete($id)){
				$this->session->set_flashdata('success', 'Berhasil menghapus data');
				redirect('pelanggan');
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('pelanggan/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function toggle($id=null){
		$pelanggan = $this->m_pelanggan->data($id);

		if(!empty($pelanggan)){
			
			if($status = $this->m_pelanggan->toggle($id)){
				if($pelanggan->blokir == 'n'){
					$this->session->set_flashdata('success', 'Berhasil memblokir pelanggan');
				}
				else{
					$this->session->set_flashdata('success', 'Berhasil membuka blokir pelanggan');
				}
				redirect('pelanggan/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('pelanggan/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function reset($id=null){
		$pelanggan = $this->m_pelanggan->data($id);

		if(!empty($pelanggan)){
			
			if($this->m_pelanggan->reset($id)){
				$this->session->set_flashdata('success', 'Berhasil mereset kata sandi ke \''.$this->config->item('default_password').'\'');
				redirect('pelanggan/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('pelanggan/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function data(){
		if($this->input->is_ajax_request()){
			$this->dataTable->pelanggan();
		}
		else{
			$this->event->show_406();
		}
	}

	public function autocomplete(){
		if($this->input->is_ajax_request()){
			$this->load->model('autocomplete');

			$nama = $this->input->post('data');
			$data = $this->autocomplete->pelanggan($nama);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		}
		else{
			$this->event->show_406();
		}	
	}

}

/* End of file Pelanggan.ph */
/* Location: ./application/controllers/Pelanggan.ph */