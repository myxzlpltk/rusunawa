<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTable extends CI_Model {

	private $config;
	private $isConnCalled = FALSE;

	function __construct(){
		parent::__construct();

		$this->load->library('ssp');
		$this->config = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db'   => $this->db->database,
			'host' => $this->db->hostname
		);
	}

	private function connect(){
		$this->isConnCalled = TRUE;
		return $this->ssp->db($this->config);
	}

	private function output($table, $primaryKey, $columns, $where=null){
		if(!$this->isConnCalled) $this->connect();
		
		if(is_null($where)){
			$data = $this->ssp->simple($this->input->get(), $table, $primaryKey, $columns);
		}
		else{
			$data = $this->ssp->complex($this->input->get(), $table, $primaryKey, $columns, $where);
		}

		$this->isConnCalled = FALSE;

		$this->output
			->set_content_type('application/json')
			->set_output(
				json_encode($data)
			);
	}


	public function tagihan($isActive=false, $id=null){
		$table = 'view_tagihan';
		$primaryKey = 'id_tagihan';

		$columns = array(
			array('db' => 'id_tagihan', 'dt' => 0),
			array(
				'db' => 'nama',
				'dt' => 1,
				'formatter' => function($d, $row){
					return html_escape($d);	
				}
			),
			array(
				'db' => 'nama_tagihan',
				'dt' => 2,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'nominal',
				'dt' => 3,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'tanggal_tenggat',
				'dt' => 4,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'id_tagihan',
				'dt' => 5,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('tagihan/view/'.$d).'" class="btn waves-effect waves-light">Lihat</a>';
				}
			),
		);

		$where = $isActive ? "status = 'aktif'" : "status = 'tidak aktif'";
		if(!is_null($id)) $where .= ' AND id_user = '.$this->db->escape($id);

		$this->connect();
		$this->ssp->query("SET lc_time_names = 'id_ID'");
		$this->output($table, $primaryKey, $columns, $where);
	}

	public function pembayaran($id=null){
		$table = 'view_pembayaran';
		$primaryKey = 'id';

		$columns = array(
			array('db' => 'id', 'dt' => 0),
			array(
				'db' => 'nominal_bayar',
				'dt' => 1,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'pertanggal',
				'dt' => 2,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'tanggal',
				'dt' => 3,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'id',
				'dt' => isAuth('admin') ? 4 : null,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('tagihan/cetak/?id='.html_escape($d)).'" class="btn waves-effect waves-light green"><i class="material-icons">print</i></a>';
				}
			)
		);
		$where = 'id_tagihan = '.$this->db->escape($id);

		$this->connect();
		$this->ssp->query("SET lc_time_names = 'id_ID'");
		$this->output($table, $primaryKey, $columns, $where);
	}

	public function pelanggan(){
		$table = 'view_pelanggan';
		$primaryKey = 'id_user';

		$columns = array(
			array('db' => 'id_user', 'dt' => 0),
			array(
				'db' => 'nama',
				'dt' => 1,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'telepon',
				'dt' => 2,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'total_tagihan',
				'dt' => 3,
				'formatter' => function($d, $row){
					return html_escape($d).' Tagihan';
				}
			),
			array(
				'db' => 'id_user',
				'dt' => 4,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('pelanggan/view/'.html_escape($d)).'" class="btn waves-effect waves-light blue">Lihat</a>';
				}
			)
		);

		$this->output($table, $primaryKey, $columns);
	}

	public function petugas($id=null){
		$table = 'view_petugas';
		$primaryKey = 'id_user';

		$columns = array(
			array('db' => 'id_user', 'dt' => 0),
			array(
				'db' => 'nama',
				'dt' => 1,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'telepon',
				'dt' => 2,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'total_laporan',
				'dt' => 3,
				'formatter' => function($d, $row){
					return html_escape($d).' Laporan';
				}
			),
			array(
				'db' => 'id_user',
				'dt' => 4,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('petugas/view/'.$d).'" class="btn waves-effect waves-light blue">Lihat</a>';
				}
			)
		);

		$this->output($table, $primaryKey, $columns);
	}

	public function laporan($id=null){
		$table = 'view_laporan';
		$primaryKey = 'id_laporan';

		$i = 0;

		$columns = array(
			array('db' => 'id_laporan', 'dt' => $i++),
			array(
				'db' => 'nama',
				'dt' => ((is_null($id) || !isAuth('admin')) ? $i++ : NULL),
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'jenis',
				'dt' => $i++,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'total_laporan',
				'dt' => $i++,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'tanggal',
				'dt' => $i++,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'isVerified',
				'dt' => $i++,
				'formatter' => function($d, $row){
					return $d == '1' ? '<i class="material-icons blue-text" title="Terverifikasi">check_circle</i>' : '<i class="material-icons grey-text" title="Belum diverifikasi">check_circle</i>';
				}
			),
			array(
				'db' => 'id_laporan',
				'dt' => $i++,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('laporan/view/'.$d).'" class="btn waves-effect waves-light blue">Lihat</a>';
				}
			)
		);

		$where = is_null($id) ? NULL : 'id_user = '.$this->db->escape($id);


		$this->connect();
		$this->ssp->query("SET lc_time_names = 'id_ID'");
		$this->output($table, $primaryKey, $columns, $where);
	}

	public function berita($id=null){
		$table = 'berita';
		$primaryKey = 'id_berita';

		$columns = array(
			array('db' => 'id_berita', 'dt' => 0),
			array(
				'db' => 'judul',
				'dt' => 1,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'image',
				'dt' => 2,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'viewer',
				'dt' => 3,
				'formatter' => function($d, $row){
					return html_escape($d);
				}
			),
			array(
				'db' => 'id_berita',
				'dt' => 4,
				'formatter' => function($d, $row){
					return '<a href="'.base_url('berita/baca/'.humanize(strtolower($row['judul']))).'" class="btn waves-effect waves-light blue"><i class="material-icons">visibility</i></a> <a href="'.base_url('berita/edit/'.$d).'" class="btn waves-effect waves-light orange"><i class="material-icons">edit</i></a> <a href="'.base_url('berita/delete/'.$d).'" class="btn waves-effect waves-light red"><i class="material-icons">delete_forever</i></a>';
				}
			)
		);

		$this->output($table, $primaryKey, $columns);
	}
}

/* End of file DataTable.php */
/* Location: ./application/models/DataTable.php */