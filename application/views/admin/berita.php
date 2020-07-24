<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Berita</title>

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

		<div id="main">

			<div class="wrapper">

				<?= sidebar(7) ?>

				<section id="content">
					
					<?= breadcrumb('Data Berita') ?>
					
					<div class="container py-2">
						<a href="<?= base_url('berita/tambah') ?>" class="btn blue right waves-effect waves-light"><i class="material-icons left">add</i>Tambah</a>
						<table class="browser-default dataTable" data-ajax="<?= base_url('berita/data') ?>">
							<thead>
								<tr>
									<th>#</th>
									<th>Judul</th>
									<th>Image</th>
									<th>Viewer</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
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