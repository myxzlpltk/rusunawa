<?php

$config = array(
	'login' => array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|max_length[25]'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric'
		)
	),
	'lockscreen' => array(
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric'
		)
	),
	'tambah_tagihan' => array(	
		array(
			'field' => 'id_user',
			'label' => 'Nama Pelanggan',
			'rules' => array(
				'required',
				array(
					'valid_pelanggan',
					function($str){
						$CI =& get_instance();
						
						$str = explode(' - ', $str);
						if(count($str) >= 2){
							$id = array_shift($str);
							$nama = implode(' - ', $str);

							$pelanggan = $CI->db
								->where('id_user', $id)
								->where('nama', $nama)
								->get('pelanggan')
								->row();

							if(empty($pelanggan)){
								$CI->form_validation->set_message('valid_pelanggan', 'Bidang {field} harus pelanggan yang sudah terdaftar.');
								return FALSE;
							}
							else{
								return TRUE;
							}
						}
						else{
							$CI->form_validation->set_message('valid_pelanggan', 'Bidang {field} harus pelanggan yang sah.');
							return FALSE;
						}
					}
				)
			)
		),
		array(
			'field' => 'nama_tagihan',
			'label' => 'Nama Tagihan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'nominal',
			'label' => 'Nominal Tagihan',
			'rules' => 'required|integer|is_natural_no_zero'
		),
		array(
			'field' => 'date',
			'label' => 'Tanggal Tenggat',
			'rules' => array(
				'required',
				array(
					'valid_date',
					function($str){
						if(date_create($str) != FALSE){
							return TRUE;
						}
						else{
							$CI =& get_instance();
							$CI->form_validation->set_message('valid_date', 'Bidang {field} harus berisi format tanggal yang sah.');
							return FALSE;
						}
					}
				)
			)
		)
	),
	'bayar' => array(
		array(
			'field' => 'month',
			'label' => 'Jumlah Bulan',
			'rules' => 'required|is_natural_no_zero|greater_than[0]'
		),
		array(
			'field' => 'submit',
			'label' => 'Metode Formulir',
			'rules' => 'required|in_list[cetak,simpan]'
		)
	),
	'edit_tagihan' => array(
		array(
			'field' => 'nama_tagihan',
			'label' => 'Nama Tagihan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'nominal',
			'label' => 'Nominal Tagihan',
			'rules' => 'required|integer|is_natural_no_zero'
		)
	),
	'tambah_pelanggan' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Pelanggan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'telepon',
			'label' => 'Nomor Telepon',
			'rules' => 'required|max_length[15]|numeric'
		),
		array(
			'field' => 'jenis_identitas',
			'label' => 'Jenis Identitas',
			'rules' => 'required|in_list[ktp]'
		),
		array(
			'field' => 'no_identitas',
			'label' => 'Nomor Identitas',
			'rules' => 'required|max_length[25]|numeric'
		),
		array(
			'field' => 'avatar',
			'label' => 'Avatar',
			'rules' => 'required|in_list[avatar-1.png,avatar-2.png,avatar-3.png,avatar-4.png,avatar-5.png,avatar-6.png,avatar-7.png,avatar-8.png,avatar-9.png,avatar-10.png,avatar-11.png,avatar-12.png,avatar-13.png,avatar-14.png,avatar-15.png,avatar-16.png,avatar-17.png]'
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|max_length[25]|alpha_dash|is_unique[user.username]'
		),
		array(
			'field' => 'password',
			'label' => 'Kata Sandi',
			'rules' => 'required|alpha_numeric'
		)
	),
	'edit_pelanggan' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Pelanggan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'telepon',
			'label' => 'Nomor Telepon',
			'rules' => 'required|max_length[15]|numeric'
		),
		array(
			'field' => 'jenis_identitas',
			'label' => 'Jenis Identitas',
			'rules' => 'required|in_list[ktp]'
		),
		array(
			'field' => 'no_identitas',
			'label' => 'Nomor Identitas',
			'rules' => 'required|max_length[25]|numeric'
		),
		array(
			'field' => 'avatar',
			'label' => 'Avatar',
			'rules' => 'required|in_list[avatar-1.png,avatar-2.png,avatar-3.png,avatar-4.png,avatar-5.png,avatar-6.png,avatar-7.png,avatar-8.png,avatar-9.png,avatar-10.png,avatar-11.png,avatar-12.png,avatar-13.png,avatar-14.png,avatar-15.png,avatar-16.png,avatar-17.png]'
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => array(
				'required',
				'max_length[25]',
				'alpha_dash',
				array(
					'is_valid_username',
					function($str){
						$CI =& get_instance();

						$data = $CI->db
							->where('username', $str)
							->get('user')
							->row();

						$id = $CI->input->post('id');

						if(empty($data) || $data->id_user == $id){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_valid_username', 'Username '.html_escape($str).' telah dipakai');
							return FALSE;
						}
					}
				)
			)
		)
	),
	'tambah_petugas' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Pelanggan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'telepon',
			'label' => 'Nomor Telepon',
			'rules' => 'required|max_length[15]|numeric'
		),
		array(
			'field' => 'jenis_identitas',
			'label' => 'Jenis Identitas',
			'rules' => 'required|in_list[ktp]'
		),
		array(
			'field' => 'no_identitas',
			'label' => 'Nomor Identitas',
			'rules' => 'required|max_length[25]|numeric'
		),
		array(
			'field' => 'avatar',
			'label' => 'Avatar',
			'rules' => 'required|in_list[avatar-1.png,avatar-2.png,avatar-3.png,avatar-4.png,avatar-5.png,avatar-6.png,avatar-7.png,avatar-8.png,avatar-9.png,avatar-10.png,avatar-11.png,avatar-12.png,avatar-13.png,avatar-14.png,avatar-15.png,avatar-16.png,avatar-17.png]'
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|max_length[25]|alpha_dash|is_unique[user.username]'
		),
		array(
			'field' => 'password',
			'label' => 'Kata Sandi',
			'rules' => 'required|alpha_numeric'
		)
	),
	'edit_petugas' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Pelanggan',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'telepon',
			'label' => 'Nomor Telepon',
			'rules' => 'required|max_length[15]|numeric'
		),
		array(
			'field' => 'jenis_identitas',
			'label' => 'Jenis Identitas',
			'rules' => 'required|in_list[ktp]'
		),
		array(
			'field' => 'no_identitas',
			'label' => 'Nomor Identitas',
			'rules' => 'required|max_length[25]|numeric'
		),
		array(
			'field' => 'avatar',
			'label' => 'Avatar',
			'rules' => 'required|in_list[avatar-1.png,avatar-2.png,avatar-3.png,avatar-4.png,avatar-5.png,avatar-6.png,avatar-7.png,avatar-8.png,avatar-9.png,avatar-10.png,avatar-11.png,avatar-12.png,avatar-13.png,avatar-14.png,avatar-15.png,avatar-16.png,avatar-17.png]'
		),
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => array(
				'required',
				'max_length[25]',
				'alpha_dash',
				array(
					'is_valid_username',
					function($str){
						$CI =& get_instance();

						$data = $CI->db
							->where('username', $str)
							->get('user')
							->row();

						$id = $CI->input->post('id');

						if(empty($data) || $data->id_user == $id){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_valid_username', 'Username '.html_escape($str).' telah dipakai');
							return FALSE;
						}
					}
				)
			)
		)
	),
	'tambah_laporan' => array(
		array(
			'field' => 'id_jenis',
			'label' => 'Jenis',
			'rules' => array(
				'required',
				array(
					'is_valid_jenis',
					function($str){
						$CI =& get_instance();

						$data = $CI->db
							->get('jenis')
							->result();

						$jenis = array_column($data, 'id_jenis');

						if(in_array($str, $jenis)){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_valid_jenis', 'Bidang {field} harus salah satu dari '.implode(',', array_column($data, 'nama')));
							return FALSE;
						}
					}
				)
			)
		)
	),
	'tambah_slider' => array(
		array(
			'field' => 'title',
			'label' => 'Judul',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'deskripsi',
			'label' => 'Deskripsi',
			'rules' => 'required'
		)
	),
	'berita' => array(
		array(
			'field' => 'title',
			'label' => 'Judul',
			'rules' => 'required|max_length[255]'
		),
		array(
			'field' => 'isi',
			'label' => 'Konten',
			'rules' => 'required'
		)
	),
	'updateUsername' => array(	
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => array(
				'required',
				'max_length[25]',
				'min_length[5]',
				'alpha_dash',
				array(
					'is_unique_username',
					function($str){
						$CI =& get_instance();

						$data = $CI->db
							->where('username', $str)
							->from('user')
							->count_all_results();

						$username = $CI->session->userdata('username');

						if($username == 0 || $str===$username){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_unique_username', 'Username telah digunakan.');
							return FALSE;
						}
					}
				)
			)
		)
	),
	'updatePassword' => array(
		array(
			'field' => 'old_password',
			'label' => 'Kata Sandi Lama',
			'rules' => array(
				'required',
				'alpha_numeric',
				array(
					'is_my_password',
					function($str){
						$CI =& get_instance();

						$id = $CI->session->userdata('id');
						$data = $CI->db
							->where('id_user', $id)
							->get('user')
							->row();

						if(password_verify($str, $data->password)){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_my_password', 'Kata sandi lama salah.');
							return FALSE;
						}
					}
				)
			)
		),
		array(
			'field' => 'new_password',
			'label' => 'Kata Sandi Baru',
			'rules' => 'required|alpha_numeric|min_length[6]'
		),
		array(
			'field' => 'retype_password',
			'label' => 'Ketik Kata Sandi Baru',
			'rules' => 'required|alpha_numeric|min_length[6]'
		)
	),
	'tambahJenis' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Jenis',
			'rules' => 'required|max_length[255]|is_unique[jenis.nama]'
		)
	),
	'editJenis' => array(
		array(
			'field' => 'nama',
			'label' => 'Nama Jenis',
			'rules' => array(
				'required',
				'max_length[255]',
				array(
					'is_unique_jenis',
					function($str){
						$CI =& get_instance();

						$id = $CI->input->post('id');
						$data = $CI->db
							->where('nama', $str)
							->get('jenis')
							->row();

						if(empty($data) || $data->id_jenis == $id){
							return TRUE;
						}
						else{
							$CI->form_validation->set_message('is_unique_jenis', 'Nama jenis laporan sudah dipakai');
							return FALSE;
						}
					}
				)
			)
		)
	)
);
