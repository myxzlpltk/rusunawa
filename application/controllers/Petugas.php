<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_petugas');
	}

	public function index(){
		$this->event->view('admin/petugas');
	}

	public function data(){
		if($this->input->is_ajax_request()){
			$this->dataTable->petugas();
		}
		else{
			$this->event->show_406();
		}
	}

	public function tambah(){
		if($this->form_validation->run('tambah_petugas') == FALSE){
			$data['password'] = $this->event->get_password();
			$this->event->view('admin/tambah_petugas', $data);
		}
		else{
			if($id = $this->m_petugas->insert()){
				$this->session->set_flashdata('success', 'Berhasil menyimpan data');
				redirect('petugas/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menyimpan data');
				redirect('petugas/tambah');
			}
		}
	}

	public function view($id=null){
		$petugas = $this->m_petugas->data($id);

		if(!empty($petugas)){
			$data['petugas'] = $petugas;
			$data['menu'] = 4;

			$this->event->view('view_petugas', $data);
		}
		else{
			show_404();
		}
	}

	public function edit($id=null){
		$menu = 4;
		if(!isAuth('admin')){
			$id = $this->session->userdata('id');
			$menu = 1;
		}
		$petugas = $this->m_petugas->data($id);

		if(!empty($petugas)){
			if($this->form_validation->run('edit_petugas') == FALSE){
				$data['petugas'] = $petugas;
				$data['menu'] = $menu;
				$this->event->view('admin/edit_petugas', $data);
			}
			else{
				$data = $this->input->post();
				if($this->m_petugas->update($id)){
					$this->session->set_flashdata('success', 'Berhasil memperbarui data');
					if(isAuth('admin')){
						redirect('petugas/view/'.$id);
					}
					else{
						redirect('home');
					}
				}
				else{
					$this->session->set_flashdata('error', 'Gagal memperbarui data');
					redirect('petugas/edit/'.$id);
				}
			}
		}
		else{
			show_404();
		}
	}

	public function delete($id=null){
		$petugas = $this->m_petugas->data($id);

		if(!empty($petugas)){
			
			if($this->m_petugas->delete($id)){
				$this->session->set_flashdata('success', 'Berhasil menghapus data');
				redirect('petugas');
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('petugas/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function toggle($id=null){
		$petugas = $this->m_petugas->data($id);

		if(!empty($petugas)){
			
			if($status = $this->m_petugas->toggle($id)){
				if($petugas->blokir == 'n'){
					$this->session->set_flashdata('success', 'Berhasil memblokir petugas');
				}
				else{
					$this->session->set_flashdata('success', 'Berhasil membuka blokir petugas');
				}
				redirect('petugas/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('petugas/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function reset($id=null){
		$petugas = $this->m_petugas->data($id);

		if(!empty($petugas)){
			
			if($this->m_petugas->reset($id)){
				$this->session->set_flashdata('success', 'Berhasil mereset kata sandi ke \''.$this->config->item('default_password').'\'');
				redirect('petugas/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghapus data');
				redirect('petugas/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function lapor($id=null){
		$data['menu'] = 4;

		if(isAuth('petugas')){
			$id = $this->session->userdata('id');
			$data['menu'] = 1;
		}
		
		$petugas = $this->m_petugas->data($id);
		
		if(!empty($petugas)){
			if($this->form_validation->run('tambah_laporan') == FALSE){
				$data['jenis'] = $this->m_petugas->jenis();
				$this->event->view('tambah_laporan', $data);
			}
			elseif(count($_FILES['file']['tmp_name']) > 0){
				if($total = $this->m_petugas->lapor($id)){
					$this->session->set_flashdata('success', 'Berhasil menambah laporan dengan '.$total.' gambar');
					if(isAuth('admin')){
						redirect('petugas/view/'.$id);
					}
					else{
						redirect('home');
					}
				}
				else{
					$this->session->set_flashdata('error', 'Gagal menyimpan laporan');
					redirect('petugas/lapor/'.$id);
				}
			}
			else{
				$this->session->set_flashdata('error', 'Harus berisi minimal 1 gambar');
				redirect('petugas/lapor/'.$id);
			}
		}
		else{
			show_404();
		}
	}

}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */