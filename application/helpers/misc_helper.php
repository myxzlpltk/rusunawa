<?php


/*
* MISC
*/

function dump($data=null){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function flash(){
	$CI =& get_instance();
	$data = array();
	$validation = $CI->form_validation->error_array();
	foreach($validation as $v){
		$data[] = '<span data-color="red" data-type="toast">'.$v.'</span>';
	}

	if($CI->session->flashdata('success')){
		if(is_array($CI->session->flashdata('success'))){
			foreach($CI->session->flashdata('success') as $flash){
				$data[] = '<span data-color="green" data-type="toast">'.$flash.'</span>';
			}
		}
		else{
			$data[] = '<span data-color="green" data-type="toast">'.$CI->session->flashdata('success').'</span>';
		}
	}
	if($CI->session->flashdata('error')){
		if(is_array($CI->session->flashdata('error'))){
			foreach($CI->session->flashdata('error') as $flash){
				$data[] = '<span data-color="red" data-type="toast">'.$flash.'</span>';
			}
		}
		else{
			$data[] = '<span data-color="red" data-type="toast">'.$CI->session->flashdata('error').'</span>';
		}
	}
	if($CI->session->flashdata('link')){
		$data[] = '<span data-type="link">'.$CI->session->flashdata('link').'</span>';
	}

	echo '<div class="app validation">'.join($data).'</div>'."\n";
}

function css($dir){
	return link_tag(
		assets($dir)
	);
}

function assets($dir=''){
	return base_url("assets/$dir");
}

function loader(){
	return '<div id="loader-wrapper"><div id="loader"></div><div class="loader-section section-left"></div><div class="loader-section section-right"></div></div>';
}

function head($data=array()){
	$CI =& get_instance();
	return $CI->load->view('header', $data, TRUE);
}

function sidebar($id=null){
	$CI =& get_instance();
	$data = array(
		'menu' => is_integer($id) ? $id : 0
	);
	return $CI->load->view('sidebar', $data, TRUE);
}

function breadcrumb($title='Judul'){
	$CI =& get_instance();
	$data = array(
		'title' => html_escape($title),
		'breadcrumb' => $CI->uri->segment_array()
	);

	if($data['breadcrumb'][count($data['breadcrumb'])] == 'index'){
		unset($data['breadcrumb'][count($data['breadcrumb'])]);
	}

	return $CI->load->view('breadcrumb', $data, TRUE);
}

function footer($data=array()){
	$CI =& get_instance();
	return $CI->load->view('footer', $data, TRUE);
}

function script($dir=''){
	return '<script type="text/javascript" src="'.assets($dir).'"></script>'."\n";
}

function material($dir){
	if(strtolower(substr($dir, -2)) == 'js'){
		return script("materialize/$dir");
	}
	else{
		return link_tag(
			assets("materialize/$dir")
		);
	}
}

function avatar($file){
	return assets("materialize/images/avatar/$file");
}

function metas(){
	return meta(
		array(
			array(
				'name' => 'viewport',
				'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'
			),
			array(
				'name' => 'description',
				'content' => 'Sistem Informasi Rusunawa Jepun Tulungagung'
			),
			array(
				'name' => 'keywords',
				'content' => 'rusun, jepun, tulungagung, rusunawa'
			),
			array(
				'name' => 'robots',
				'content' => 'no-cache'
			),
			array(
				'name' => 'msapplication-tap-highlight',
				'content' => 'no'
			),
			array(
				'name' => 'Content-type',
				'content' => 'text/html; charset=utf-8',
				'type' => 'equiv'
			),
			array(
				'name' => 'msapplication-TileColo',
				'content' => '#00bcd4'
			),
			array(
				'name' => 'msapplication-TileImage',
				'content' => assets('favicon.png')
			)
		)
	);
}

/*
* MISC
*/

function idr($money=null){
	if(!is_nan($money)){
		return 'Rp. '.str_replace(',', '.', number_format($money, 0));
	}
	else{
		return 'Rp. -';
	}
}

/*
* Auth
*/

function isAuth($permission=''){
	$permission = explode(',', $permission);
	$ci =& get_instance();
	$role = $ci->session->userdata('role');

	if(in_array($role, $permission)){
		return TRUE;
	}
	else{
		return FALSE;
	}
}

function role(){
	$ci =& get_instance();
	$role = $ci->session->userdata('role');

	switch($role){
		case 'admin':
			return 'Administrator';
			break;
		
		case 'user':
			return 'Penghuni';
			break;
		
		case 'petugas':
			return 'Petugas';
			break;

		default:
			# code...
			break;
	}
}