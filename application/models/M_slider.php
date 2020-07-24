<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_slider extends CI_Model {

	public function upload(){
		$config['upload_path'] = './uploads/slider/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10240';
		$config['file_ext_tolower'] = TRUE;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('file')){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			return FALSE;
		}
		else{
			$slider = $this->db
				->order_by('id_slider', 'desc')
				->limit(1)
				->get('slider')
				->row();

			$urutan = empty($slider) ? 1 : $slider->urutan+1;

			$data = array(
				'image' => $this->upload->data('file_name'),
				'title' => $this->input->post('title'),
				'deskripsi' => $this->input->post('deskripsi'),
				'urutan' => $urutan
			);
			
			$this->db
				->set($data)
				->insert('slider');

			return TRUE;
		}
	}

	public function delete($id){
		$slider = $this->db
			->where('id_slider', $id)
			->get('slider')
			->row();

		if(!empty($slider)){
			$image = './uploads/slider/'.$slider->image;
			if(file_exists($image)){
				if(is_file($image)){
					unlink($image);

					$this->db
						->where('id_slider', $id)
						->delete('slider');

					$sliders = $this->model->slider();

					$i = 1;
					foreach($sliders as $s){
						$this->db
							->set('urutan', $i)
							->where('id_slider', $s->id_slider)
							->update('slider');

						$i++;
					}

					return TRUE;
				}
				else{
					return FALSE;
				}
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}

	public function up($id){
		$slider = $this->db
			->where('id_slider', $id)
			->get('slider')
			->row();

		if(!empty($slider)){
			$up = $this->db
				->where('urutan', $slider->urutan-1)
				->get('slider')
				->row();

			if(!empty($up)){
				$this->db
					->set('urutan', $slider->urutan)
					->where('id_slider', $up->id_slider)
					->update('slider');

				$this->db
					->set('urutan', $up->urutan)
					->where('id_slider', $slider->id_slider)
					->update('slider');

				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}

	public function down($id){
		$slider = $this->db
			->where('id_slider', $id)
			->get('slider')
			->row();

		if(!empty($slider)){
			$down = $this->db
				->where('urutan', $slider->urutan+1)
				->get('slider')
				->row();

			if(!empty($down)){
				$this->db
					->set('urutan', $slider->urutan)
					->where('id_slider', $down->id_slider)
					->update('slider');

				$this->db
					->set('urutan', $down->urutan)
					->where('id_slider', $slider->id_slider)
					->update('slider');

				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}
	}

}

/* End of file M_slider.php */
/* Location: ./application/models/M_slider.php */