<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Petugas</title>

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

				<?= sidebar(4) ?>

				<section id="content">
					<?= breadcrumb('Data Petugas') ?>

					<div class="container">
						<div class="row">
							<div class="col s12">
								<div class="card-panel">
									<a href="<?= base_url('petugas/tambah') ?>" class="btn blue right waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a>
									<table class="browser-default dataTable" data-ajax="<?= base_url('petugas/data') ?>">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama</th>
												<th>No Telp</th>
												<th>Total Laporan</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
								</div>
							</div>
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