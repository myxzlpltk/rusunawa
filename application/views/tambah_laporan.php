<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tambah Laporan</title>

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

				<?= sidebar(isset($menu) ? $menu : 4 ) ?>

				<section id="content">
					
					<?= breadcrumb('Tambah Laporan') ?>
					
					<div class="container py-2">
						<?= form_open_multipart() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<select name="id_jenis">
											<?php foreach($jenis as $j){ ?>
											<option value="<?= $j->id_jenis ?>"><?= $j->nama ?></option>
											<?php } ?>
										</select>
										<label for="">Jenis</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="file-field input-field">
										<div class="btn">
											<span>File</span>
											<input type="file" name="file[]" accept="image/*" multiple>
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text">
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn blue right waves-effect waves-light"><i class="material-icons left">save</i>Simpan</button>
						<?= form_close("\n") ?>
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