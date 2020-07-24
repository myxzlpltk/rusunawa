<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->event->auth();

		$this->load->model('m_tagihan');
	}

	public function index(){
		$this->event->view('admin/tagihan');
	}

	public function data_aktif(){
		if($this->input->is_ajax_request()){
			if(isAuth('admin')){
				$this->dataTable->tagihan(TRUE);
			}
			else{
				$id = $this->session->userdata('id');
				$this->dataTable->tagihan(TRUE, $id);
			}
		}
		else{
			show_404();
		}
	}

	public function data_tidak_aktif(){
		if($this->input->is_ajax_request()){
			$this->dataTable->tagihan(FALSE);
		}
		else{
			show_404();
		}
	}

	public function tambah(){
		if($this->form_validation->run('tambah_tagihan') == FALSE){
			$this->event->view('admin/tambah_tagihan');
		}
		else{
			$id = explode(' - ', $this->input->post('id_user'));
			$id = array_shift($id);

			if($id = $this->m_tagihan->insert($id)){
				$this->session->set_flashdata('success', 'Berhasil menyimpan tagihan');
				redirect('tagihan/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menyimpan tagihan');
				redirect('tagihan/tambah');
			}
		}
	}

	public function view($id=null){
		$tagihan = $this->m_tagihan->data($id);

		if(!empty($tagihan)){
			$tagihan->tunggakan = $this->m_tagihan->tunggakan($tagihan);

			$data['tagihan'] = $tagihan;
			$this->event->view('view_tagihan', $data);
		}
		else{
			show_404();
		}
	}

	public function pembayaran($id=null){
		if($this->input->is_ajax_request()){
			if(isAuth('admin')){
				$this->dataTable->pembayaran($id);
			}
			elseif(isAuth('user')){
				$tagihan = $this->m_tagihan->data($id);

				if(!empty($tagihan)){
					$this->dataTable->pembayaran($id);
				}
				else{
					show_404();
				}
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}

	public function bayar($id=null){
		$tagihan = $this->m_tagihan->data($id);
		if(!empty($tagihan)){
			
			if($this->form_validation->run('bayar') == FALSE){
				$tagihan->tunggakan = $this->m_tagihan->tunggakan($tagihan);

				$data['tagihan'] = $tagihan;

				$this->event->view('admin/bayar_tagihan', $data);
			}
			else{
				$month = $this->input->post('month');

				$ids = $this->m_tagihan->bayar($tagihan, $month);

				if($this->input->post('submit') == 'cetak'){
					$this->session->set_flashdata('link', base_url('tagihan/cetak/?id='.implode(',', $ids)));
				}
				$this->session->set_flashdata('success', 'Pembayaran berhasil di proses.');
				redirect('tagihan/view/'.$tagihan->id_tagihan);
			}
		}
		else{
			show_404();
		}
	}

	public function cetak(){
		if($this->input->get('id')){
			$ids = explode(',', $this->input->get('id'));

			if($this->m_tagihan->cetak($ids)){
				exit;
			}
			else{
				show_404();
			}
		}
		else{
			show_404();
		}
	}

	public function edit($id=null){
		$tagihan = $this->m_tagihan->data($id);

		if(!empty($tagihan)){
			if($this->form_validation->run('edit_tagihan') == FALSE){
				$data['tagihan'] = $tagihan;
				$this->event->view('admin/edit_tagihan', $data);
			}
			else{
				if($data = $this->m_tagihan->update($id)){
					if($data['status'] && $data['affected_rows']){
						$this->session->set_flashdata('success', 'Berhasil memperbarui data');
					}
					else{
						$this->session->set_flashdata('success', 'Tidak mengubah apapun');
					}
					redirect('tagihan/view/'.$id);
				}
				else{
					$this->session->set_flashdata('error', 'Gagal memperbarui data');
					redirect('tagihan/edit/'.$id);
				}
			}	
		}
		else{
			show_404();
		}
	}

	public function stop($id=null){
		$tagihan = $this->m_tagihan->data($id);

		if(!empty($tagihan)){
			if($data = $this->m_tagihan->stop($id)){
				if($data['status'] && $data['affected_rows']){
					$this->session->set_flashdata('success', 'Berhasil menghentikan tagihan');
				}
				else{
					$this->session->set_flashdata('success', 'Tidak mengubah apapun');
				}
				redirect('tagihan/view/'.$id);
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghentikan tagihan');
				redirect('tagihan/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

	public function delete($id=null){
		$tagihan = $this->m_tagihan->data($id);

		if(!empty($tagihan)){
			if($data = $this->m_tagihan->delete($id)){
				if($data['status'] && $data['affected_rows']){
					$this->session->set_flashdata('success', 'Berhasil menghapus tagihan');
					redirect('tagihan');
				}
				else{
					$this->session->set_flashdata('success', 'Tidak mengubah apapun');
					redirect('tagihan/view/'.$id);
				}
			}
			else{
				$this->session->set_flashdata('error', 'Gagal menghentikan tagihan');
				redirect('tagihan/view/'.$id);
			}
		}
		else{
			show_404();
		}
	}

}

/* End of file Tagihan.php */
/* Location: ./application/controllers/Tagihan.php */