<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete extends CI_Model {

	public function pelanggan($nama=null){
		$data = $this->db
			->select('pelanggan.id_user, nama')
			->like('pelanggan.nama', $nama)
			->join('user', 'user.id_user = pelanggan.id_user', 'inner')
			->get('pelanggan')
			->result_array();

		$output = array();
		foreach($data as $d){
			$key = implode(' - ', $d);
			$output[$key] = null;
		}

		return $output;
	}	

}

/* End of file Autocomplete.php */
/* Location: ./application/libraries/Autocomplete.php */