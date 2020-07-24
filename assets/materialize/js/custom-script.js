/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 4.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

var App = {
	config: {
		dataTable: {
			"language": {
				"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
				"sProcessing":   "Sedang memproses...",
				"sLengthMenu":   "Tampilkan _MENU_ entri",
				"sZeroRecords":  "Tidak ditemukan data yang sesuai",
				"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
				"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
				"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
				"sInfoPostFix":  "",
				"sSearch":       "Cari:",
				"sUrl":          "",
				"oPaginate": {
					"sFirst":    "Pertama",
					"sPrevious": "Sebelumnya",
					"sNext":     "Selanjutnya",
					"sLast":     "Terakhir"
				}
			},
			"dom": '<"overflow-table"<"top"i>rt<"bottom"flp><"clear">>',
			"order": [[0, "desc"]]
		},
		pickadate: {
			selectMonths: true,
			selectYears: 15,
			today: 'Hari ini',
			clear: 'Reset',
			close: 'Pilih',
			closeOnSelect: false,
			container: undefined,
			format: 'yyyy-mm-dd',
			monthsFull: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
			weekdaysFull: ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'],
			weekdaysLetter: ['Mg', 'Sn', 'Sl', 'Rb', 'Km', 'Jm', 'Sb'],
			weekdaysShort: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab']
		}
	}
};

function idr(param){
	var money = param.toString().split('').reverse();
	var output = [];
	var max = money.length-1;

	for(i=0;i<max;i++){
		output.push(money[i]);
		if((i+1)%3==0){
			output.push('.');
		}
	}
	output.push(money.pop());

	output = 'Rp. '+output.reverse().join('');

	return output;
}

(function($){

	$(document).ready(function() {
		App.UI.startEvent();
	});

	App.UI = {
		startEvent: function(){
			_startsEvent();
			_callableEvent();
		}
	};

	function _startsEvent(){		
		if($('.app.validation').length > 0){
			$('.app.validation').children('[data-type="toast"]').each(function(i){
				var toast = this;

				setTimeout(function(){
					Materialize.toast(
						$(toast).html(),
						4000,
						$(toast).data('color')
					);
				}, i*300 );
			});
			
			$('.app.validation').children('[data-type="link"]').each(function(i){
				window.open($(this).html());
			});

			$('.app.validation').remove();
		}

		if(jQuery().dataTable){
			App.dataTable = [];

			$('table.dataTable').each(function(){
				var config = Object.assign({}, App.config.dataTable);

				if($(this).data('ajax')){
					config["processing"] = true;
					config["serverSide"] = true;
					config["ajax"] = $(this).data('ajax');
				}

				if($(this).data('order-asc')){
					config["order"] = [[$(this).data('order-asc'), "asc"]];
				}

				var dataTable = $(this).dataTable(config);

				App.dataTable.push(dataTable);
				
			});
		}

		$('input.autocomplete').each(function(){
			var input = this;

			$(this).autocomplete();
			$(this).on('input change', function(){

				$.ajax({
					url: $(this).data('ajax'),
					method: 'post',
					data: $(this).val(),
					success: function(result){
						$(input).autocomplete({
							data: result
						});
					},
					error: function(result, status, xhr){
						Materialize.toast(status, 1000, 'red');
					}
				});
			});
		});

		$('.counter').characterCounter();

		$('.datepicker').pickadate(App.config.pickadate);

		$('.carousel').carousel({
			fullWidth: true
		});

		if(typeof swal == "function"){
			$('[data-prevent]').click(function(event){
				event.preventDefault();

				var message = $(this).data('prevent');
				var button = this;
				swal({
					text: message,
					type: 'question',
					showCancelButton: true,
					confirmButtonText: 'Ya',
					cancelButtonText: 'Tidak'
				}).then((result) => {
					if(result.value == true){
						$(button).off('click');
						button.click();
					}
				});
			});
		}
	}

	function _callableEvent(){
		App.event = {};

		App.event.paymentBox = function(box, config){
			box = $(box);
			var table = $(box).find('table');
			var input = $(box).find('input[type="number"]');
			clean();

			input.on('input change', function(){
				var value = $(this).val();

				if(value > 0){
					process(value);
				}
				else{
					clean(value);
				}
			});

			function process(value){
				var startDate = config.tanggalTenggat;

				var data = '';
				var total = 0;
				for(var i=0;i<value;i++){
					var date = moment(startDate).add(i, 'month');
					data += '<tr><td>'+(i+1)+'</td><td>'+date.format('D MMMM YYYY')+'</td><td>'+idr(config.nominal)+'</td></tr>';
					total += parseInt(config.nominal);
				}
				data += '<tr><td colspan="2" align="right">Total : </td><td>'+idr(total)+'</td></tr>';


				table.find('tbody').empty().html(data);
			}

			function clean(){
				table.find('tbody').empty().html('<tr><td colspan="3" align="center">Tidak ada data</td></tr>');
			}

			var total = config.tunggakan.length > 0 ? config.tunggakan.length : 1;
			$(input).val(total);
			process(total);
		}
	}
}(jQuery));