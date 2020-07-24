<?php


if (!function_exists('bulan')) {
	function bulan($bulan){
		switch ($bulan) {
			case 1:
				$bulan = " Januari ";
				break;
			case 2:
				$bulan = " Februari ";
				break;
			case 3:
				$bulan = " Maret ";
				break;
			case 4:
				$bulan = " April ";
				break;
			case 5:
				$bulan = " Mei ";
				break;
			case 6:
				$bulan = " Juni ";
				break;
			case 7:
				$bulan = " Juli ";
				break;
			case 8:
				$bulan = " Agustus ";
				break;
			case 9:
				$bulan = " September ";
				break;
			case 10:
				$bulan = " Oktober ";
				break;
			case 11:
				$bulan = " November ";
				break;
			case 12:
				$bulan = " Desember ";
				break;

			default:
				$bulan = Date('F');
				break;
		}
		return $bulan;
	}
}

function fix_date($date=null) {
	if($date = date_create($date)){
		return date_format($date,"d").bulan(date_format($date,"m")).date_format($date,"Y");
	}
	else{
		return 'Tidak Ada';
	}
}

function fix_datetime($date=null) {
	if($date = date_create($date)){
		return date_format($date,"d").bulan(date_format($date,"m")).date_format($date,"Y H:i:s");
	}
	else{
		return 'Tidak Ada';
	}
}