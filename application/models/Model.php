<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function auth(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array('username' => $username);
		$user = $this->db->get_where('user', $where)->row();

		if(!empty($user)){
			if(password_verify($password, $user->password) === TRUE){
				$token = md5($user->username.$user->password.time());
				$this->db
					->set('token', $token)
					->where('id_user', $user->id_user)
					->update('user');

				$session = array(
					'id' => $user->id_user,
					'username' => $user->username,
					'role' => $user->role,
					'valid' => TRUE,
					'logged' => time(),
					'token' => $token,
					'lock' => FALSE,
					'avatar' => $user->avatar
				);

				$this->session->set_userdata($session);

				return TRUE;
			}
			else{
				return 'Kata sandi salah';
			}
		}
		else{
			return 'Akun tidak ditemukan';
		}
	}

	public function slider(){
		return $this->db
			->order_by('urutan')
			->order_by('id_slider')
			->get('slider')
			->result();
	}

	public function get_permission($file){
		$this->load->helper('file');

		$dir = './application/controllers/';
		$controllers = get_filenames($dir);

		$currentFile = basename($file);
		array_splice($controllers, array_search($currentFile, $controllers), 1);

		$methods = [];
		foreach ($controllers as $key => $c){
			if(preg_match('(.php)', $c)){
				include $dir.$c;

				$class = basename($c, '.php');
				$method = get_class_methods($class);
				array_splice($method, array_search('__construct', $method), 1);
				array_splice($method, array_search('get_instance', $method), 1);

				$methods[strtolower($class)] = $method;
			}
		}

		dump($methods);
	}

	public function dashboardAdmin(){

		$stat = array();
		$stat[0] = $this->db
			->from('pelanggan')
			->count_all_results();
		$stat[1] = $this->db
			->where('status', 'aktif')
			->from('tagihan')
			->count_all_results();
		$stat[2] = $this->db
			->from('petugas')
			->count_all_results();
		$stat[3] = $this->db
			->where('isVerified', '0')
			->from('laporan')
			->count_all_results();

		$tagihan = $this->db
			->select('tagihan.*, pelanggan.nama')
			->join('pelanggan', 'pelanggan.id_user = tagihan.id_user', 'inner')
			->where('status', 'aktif')
			->where('tanggal_tenggat < ', 'CURDATE()', FALSE)
			->get('tagihan')
			->result();

		$laporan = $this->db
			->select('laporan.id_laporan, petugas.nama, jenis.nama AS jenis, count(id_detail) AS total, tanggal')
			->join('user', 'user.id_user = laporan.id_user', 'inner')
			->join('petugas', 'petugas.id_user = laporan.id_user', 'inner')
			->join('jenis', 'jenis.id_jenis = laporan.id_jenis', 'inner')
			->join('detail_laporan', 'detail_laporan.id_laporan = laporan.id_laporan')
			->group_by('id_laporan')
			->where('isVerified', '0')
			->get('laporan')
			->result();

		return array(
			'stat' => $stat,
			'tagihan' => $tagihan,
			'laporan' => $laporan
		);
	}

	public function openLock(){
		$password = $this->input->post('password');
		$id = $this->session->userdata('id');

		$data = $this->db
			->where('id_user', $id)
			->get('user')
			->row();

		if(!empty($data)){
			if(password_verify($password, $data->password)){
				$this->session->set_userdata('lock', FALSE);
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


/* End of file Model.php */
/* Location: ./application/models/Model.php */