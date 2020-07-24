<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Slider</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
	</head>
	<body>
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<div id="main">

			<div class="wrapper">

				<?= sidebar(6) ?>

				<section id="content">
					
					<?= breadcrumb('Data Slider') ?>
					
					<div class="container py-2">
						<a href="<?= base_url('slider/tambah') ?>" class="btn blue right waves-effect waves-light">Tambah</a>
						<table class="highlight">
							<thead>
								<tr>
									<th>#</th>
									<th>Gambar</th>
									<th>Title</th>
									<th>Deskripsi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($slider as $k => $s){ ?>
								<tr>
									<td><?= html_escape($s->id_slider) ?></td>
									<td><img src="<?= base_url('uploads/slider/'.$s->image) ?>" class="responsive-img" style="max-height: 50px;"></td>
									<td><?= html_escape($s->title) ?></td>
									<td><?= html_escape($s->deskripsi) ?></td>
									<td>
										<a href="<?= base_url('slider/delete/'.$s->id_slider) ?>" class="btn red waves-light waves-effect tooltipped" data-tooltip="Hapus Permanen"><i class="material-icons">delete_forever</i></a>
										<a href="<?= base_url('slider/up/'.$s->id_slider) ?>" class="btn blue waves-light waves-effect tooltipped" data-tooltip="Naikkan" <?php if($k==0){echo'disabled';}?>><i class="material-icons">arrow_upward</i></a>
										<a href="<?= base_url('slider/down/'.$s->id_slider) ?>" class="btn blue waves-light waves-effect tooltipped" data-tooltip="Turunkan" <?php if($k==count($slider)-1){echo'disabled';}?>><i class="material-icons">arrow_downward</i></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
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
	</body>
</html>