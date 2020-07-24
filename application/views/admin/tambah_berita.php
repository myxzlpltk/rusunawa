<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tambah Berita</title>

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

				<?= sidebar(7) ?>

				<section id="content">
					
					<?= breadcrumb('Tambah Berita') ?>
					
					<div class="container py-2">
						<?= form_open_multipart() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="title" class="counter" data-length="255" maxlength="255" value="<?= set_value('title') ?>" required>
										<label for="">Judul</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="py-2">
										<p>Konten</p>
										<textarea name="isi" class="browser-default ckeditor" required><?= set_value('isi') ?></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="file-field input-field">
										<div class="btn">
											<span>Sampul Berita</span>
											<input type="file" name="file" accept="image/*">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" required>
										</div>
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