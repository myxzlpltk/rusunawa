<?php

class Event{
	
	private $ci;
	private $data;

	function __construct(){
		$this->ci =& get_instance();
	}

	public function view($view, $data=null){
		$this->_data = $data;
		$this->_get_data();

		$this->ci->load->view($view, $this->_data);
	}

	public function auth(){
		$session = $this->ci->session->userdata();

		if($session['lock'] == FALSE){
			if($session['valid'] === TRUE){
				$user = $this->ci->db
					->where('id_user', $this->ci->session->userdata('id'))
					->get('user')
					->row();

				if(!empty($user)){
					if($user->blokir === 'n'){
						if($user->token === $this->ci->session->userdata('token')){
							$in = array(
								'*/*',
								$this->ci->router->class.'/*',
								$this->ci->router->class.'/'.$this->ci->router->method
							);

							$permission = $this->ci->db
								->where_in('module', $in)
								->where('role', $this->ci->session->userdata('role'))
								->from('permission')
								->count_all_results();

							if($permission == 0){
								$this->show_401();
							}
							else{
								return TRUE;
							}
						}
						else{
							$this->ci->session->sess_destroy();
							$this->ci->session->set_flashdata('error', 'Akun anda di blokir');
							redirect('login');
						}
					}
					else{
						$this->ci->session->sess_destroy();
						$this->ci->session->set_flashdata('error', 'Akun anda di blokir');
						redirect('login');
					}
				}
				else{
					$this->ci->session->sess_destroy();
					$this->ci->session->set_flashdata('error', 'Akun tidak ditemukan');
					redirect('login');
				}
			}
			else{
				$this->ci->session->sess_destroy();
				$this->ci->session->set_flashdata('error', 'Kamu harus login terlebih dahulu');
				redirect('login');
				return FALSE;
			}
		}
		else{
			$uri = $this->ci->uri->uri_string();
			redirect("lock?redirect=$uri");
		}
	}

	public function get_password($len=8){
		$alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$pass = array();
		$alphaLength = strlen($alpha)-1;
		for($i=0;$i<$len;$i++){
			$n = rand(0, $alphaLength);
			$pass[] = $alpha[$n];
		}

		return implode($pass);
	}

	private function _get_data(){

	}

	public function show_401(){
		ob_clean();
		$this->ci->output->set_status_header(401, 'Anda tidak berhak mengakses menu ini.');
		echo $this->ci->load->view('unauthorized', NULL, TRUE);
		exit;
	}

	public function show_406(){
		ob_clean();
		$this->ci->output->set_status_header(406, 'Tidak dapat diterima');
		echo $this->ci->load->view('unauthorized', NULL, TRUE);
		exit;
	}

}