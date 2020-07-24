<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Laporan</title>

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

				<?= sidebar(5) ?>

				<section id="content">
					<?= breadcrumb('Data Laporan') ?>

					<div class="container">
						<div class="card-panel">
							<table class="browser-default dataTable" data-ajax="<?= base_url('laporan/data') ?>">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Jenis</th>
										<th>File</th>
										<th>Tanggal</th>
										<th>Status</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>

						<?php if(isAuth('admin')){ ?>
						<div class="card-panel">
							<div class="clearfix">
								<a href="<?= base_url('laporan/tambah_jenis') ?>" class="btn blue right waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a>
								<h5 class="left">Jenis Laporan</h5>
							</div>
							<table class="browser-default dataTable">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($jenis as $j){ ?>
									<tr>
										<td><?= html_escape($j->id_jenis) ?></td>
										<td><?= html_escape($j->nama) ?></td>
										<td><?= html_escape($j->total) ?> Laporan</td>
										<td>
											<a href="<?= base_url('laporan/edit_jenis/'.html_escape($j->id_jenis)) ?>" class="btn orange waves-effect waves-light"><i class="material-icons">edit</i></a>
											<a href="<?= base_url('laporan/delete_jenis/'.html_escape($j->id_jenis)) ?>" class="btn red waves-effect waves-light" <?php if($j->total > 0) echo 'disabled' ?>><i class="material-icons">delete_forever</i></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<?php } ?>
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