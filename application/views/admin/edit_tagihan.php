<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Edit Tagihan</title>

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

				<?= sidebar() ?>

				<section id="content">
					
					<?= breadcrumb('Edit Tagihan') ?>
					
					<div class="container py-2">
						<?= form_open() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="nama_tagihan" class="counter" value="<?= set_value('nama_tagihan') ? set_value('nama_tagihan') : $tagihan->nama_tagihan ?>" data-length="225" max-length="225" required>
										<label for="input">Nama Tagihan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<textarea name="deskripsi" class="counter materialize-textarea" data-length="225" max-length="225"><?= set_value('deskripsi') ? set_value('deskripsi') : $tagihan->deskripsi ?></textarea>
										<label for="input">Deskripsi Tagihan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="number" name="nominal" min="0" step="1" value="<?= set_value('nominal') ? set_value('nominal') : $tagihan->nominal ?>" required>
										<label for="input">Nominal</label>
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