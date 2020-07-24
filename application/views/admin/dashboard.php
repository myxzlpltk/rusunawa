<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Dashboard</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
		<?= css('datatables/datatables.min.css') ?>
		<?= css('datatables/materialize.datatables.min.css') ?>
	</head>
	<body>
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<div id="main" class="white">

			<div class="wrapper">

				<?= sidebar(1) ?>

				<section id="content">
					<?= breadcrumb('Dashboard') ?>

					<div class="container">
						<div id="card-stats">
							<div class="row mt-1">
								<div class="col s12 m6 l3">
									<div class="card light-blue min-height-100 white-text">
										<div class="padding-4">
											<div class="col s7 m7">
												<i class="material-icons background-round mt-5">people</i>
												<p>Pelanggan</p>
											</div>
											<div class="col s5 m5 right-align">
												<h5 class="mb-0"><?= $stat[0] ?></h5>
												<p class="no-margin">Total</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col s12 m6 l3">
									<div class="card red min-height-100 white-text">
										<div class="padding-4">
											<div class="col s7 m7">
												<i class="material-icons background-round mt-5">payment</i>
												<p>Tagihan</p>
											</div>
											<div class="col s5 m5 right-align">
												<h5 class="mb-0"><?= $stat[1] ?></h5>
												<p class="no-margin">Aktif</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col s12 m6 l3">
									<div class="card amber min-height-100 white-text">
										<div class="padding-4">
											<div class="col s7 m7">
												<i class="material-icons background-round mt-5">people_outline</i>
												<p>Petugas</p>
											</div>
											<div class="col s5 m5 right-align">
												<h5 class="mb-0"><?= $stat[2] ?></h5>
												<p class="no-margin">Total</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col s12 m6 l3">
									<div class="card green min-height-100 white-text">
										<div class="padding-4">
											<div class="col s7 m7">
												<i class="material-icons background-round mt-5">show_chart</i>
												<p>Laporan</p>
											</div>
											<div class="col s5 m5 right-align">
												<h5 class="mb-0"><?= $stat[3] ?></h5>
												<p class="no-margin">Baru</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card-panel">
							<h5>Tagihan Telat Pembayaran</h5>
							<table class="browser-default dataTable">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Tagihan</th>
										<th>Nominal</th>
										<th>Tanggal Tenggat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($tagihan as $t){ ?>
									<tr>
										<td><?= html_escape($t->id_tagihan) ?></td>
										<td><?= html_escape($t->nama) ?></td>
										<td><?= html_escape($t->nama_tagihan) ?></td>
										<td><?= idr(html_escape($t->nominal)) ?></td>
										<td><?= fix_date(html_escape($t->tanggal_tenggat)) ?></td>
										<td><a href="<?= base_url('tagihan/view/'.html_escape($t->id_tagihan)) ?>" class="btn waves-effect waves-light">Lihat</a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>

						<div class="card-panel">
							<h5>Laporan Terbaru</h5>
							<table class="browser-default dataTable">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Jenis</th>
										<th>File</th>
										<th>Tanggal</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($laporan as $l){ ?>
									<tr>
										<td><?= html_escape($l->id_laporan) ?></td>
										<td><?= html_escape($l->nama) ?></td>
										<td><?= html_escape($l->jenis) ?></td>
										<td><?= html_escape($l->total) ?> Berkas</td>
										<td><?= fix_datetime(html_escape($l->tanggal)) ?></td>
										<td>
											<a href="<?= base_url('laporan/verify/'.html_escape($l->id_laporan)) ?>" class="btn green waves-effect waves-light">Verifikasi</a>
											<a href="<?= base_url('laporan/view/'.html_escape($l->id_laporan)) ?>" class="btn blue waves-effect waves-light" target="_blank"><i class="material-icons">visibility</i></a>
											<a href="<?= base_url('laporan/delete/'.html_escape($l->id_laporan)) ?>" class="btn red waves-effect waves-light"><i class="material-icons">delete_forever</i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<?= footer() ?>

		<?= material('vendors/jquery-3.2.1.min.js') ?>
		<?= material('js/materialize.min.js') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>
		<?= material('js/plugins.js') ?>
		<?= material('js/custom-script.js') ?>
		<?= script('datatables/datatables.min.js') ?>
		<?= script('datatables/materialize.datatables.min.js') ?>
	</body>
</html>