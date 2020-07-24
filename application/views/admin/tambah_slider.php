<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tambah Slider</title>

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
					
					<?= breadcrumb('Tambah Slider') ?>
					
					<div class="container py-2">
						<?= form_open_multipart() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="title" class="counter" data-length="255" maxlength="255" value="<?= set_value('title') ?>">
										<label for="">Judul</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<textarea name="deskripsi" class="materialize-textarea"><?= set_value('deskripsi') ?></textarea>
										<label for="">Deskripsi</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="file-field input-field">
										<div class="btn">
											<span>File</span>
											<input type="file" name="file" accept="image/*">
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