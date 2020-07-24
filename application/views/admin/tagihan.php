<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tagihan</title>

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

				<?= sidebar(3) ?>

				<section id="content">
					<?= breadcrumb('Data Tagihan') ?>

					<div class="container py-2">
						<div class="card-panel">
							<h5>Tagihan Aktif</h5>
							<?php if(isAuth('admin')){ ?>
							<a href="<?= base_url('tagihan/tambah') ?>" class="btn blue right waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a>
							<?php } ?>
							<table class="browser-default dataTable" data-ajax="<?= base_url('tagihan/data_aktif') ?>">
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
								<tbody></tbody>
							</table>
						</div>
						<?php if(isAuth('admin')){ ?>
						<div class="card-panel">
							<h5>Tagihan Tidak Aktif</h5>
							<a href="<?= base_url('tagihan/tambah') ?>" class="btn blue right waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a>
							<table class="browser-default dataTable" data-ajax="<?= base_url('tagihan/data_tidak_aktif') ?>">
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
								<tbody></tbody>
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