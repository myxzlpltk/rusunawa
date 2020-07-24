<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tambah Tagihan</title>

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

				<?= sidebar(3) ?>

				<section id="content">
					
					<?= breadcrumb('Tambah Tagihan') ?>
					
					<div class="container py-2">
						<?= form_open() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="id_user" class="autocomplete" value="<?= set_value('id_user') ?>" data-ajax="<?= base_url('pelanggan/autocomplete') ?>" required>
										<label for="autocomplete-input">Nama Pelanggan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="nama_tagihan" class="counter" value="<?= set_value('nama_tagihan') ?>" data-length="225" maxlength="225" required>
										<label for="input">Nama Tagihan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<textarea name="deskripsi" class="counter materialize-textarea" data-length="225" maxlength="225"><?= set_value('deskripsi') ?></textarea>
										<label for="input">Deskripsi Tagihan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12 m6">
									<div class="input-field">
										<input type="number" name="nominal" min="0" step="1" value="<?= set_value('nominal') ?>" required>
										<label for="input">Nominal</label>
									</div>
								</div>
								<div class="col s12 m6">
									<div class="input-field">
										<input type="text" name="date" class="datepicker" value="<?= set_value('date') ?>" required>
										<label for="input">Tanggal Tenggat</label>
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