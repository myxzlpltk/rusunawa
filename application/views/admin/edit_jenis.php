<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Edit Jenis</title>

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

				<?= sidebar(5) ?>

				<section id="content">
					
					<?= breadcrumb('Edit Jenis') ?>
					
					<div class="container py-2">
						<?= form_open() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="nama" class="counter" data-length="255" maxlength="255" value="<?= set_value('nama') ? set_value('nama') : html_escape($jenis->nama) ?>" required>
										<label for="">Nama Jenis</label>
									</div>
								</div>
							</div>
							<button type="submit" class="btn blue waves-effect waves-light"><i class="material-icons left">save</i>Simpan</button>
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
		<?= script('ckeditor/ckeditor.js') ?>
		<?= script('ckeditor/adapters/jquery.js') ?>
	</body>
</html>