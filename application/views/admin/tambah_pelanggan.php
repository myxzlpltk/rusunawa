<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Tambah Pelanggan</title>

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

				<?= sidebar(2) ?>

				<section id="content">
					
					<?= breadcrumb('Tambah Pelanggan') ?>
					
					<div class="container py-2">
						<?= form_open() ?>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<input type="text" name="nama" class="counter" value="<?= set_value('nama') ?>" data-length="225" maxlength="225" required>
										<label for="autocomplete-input">Nama Pelanggan</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12 m4">
									<div class="input-field">
										<input type="number" name="telepon" class="counter" value="<?= set_value('telepon') ?>" data-length="15" maxlength="15" required>
										<label for="input">Nomor Telepon</label>
									</div>
								</div>
								<div class="col s12 m4">
									<div class="input-field">
										<select name="jenis_identitas">
											<option value="ktp" <?= set_select('jenis_identitas', 'ktp') ?>>KTP</option>
										</select>
										<label for="select">Jenis Identitas</label>
									</div>
								</div>
								<div class="col s12 m4">
									<div class="input-field">
										<input type="number" name="no_identitas" class="counter" value="<?= set_value('no_identitas') ?>" data-length="25" maxlength="25" required>
										<label for="input">Nomor Identitas</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12 m4">
									<div class="input-field">
										<select name="avatar" required>
											<?php foreach($this->config->item('avatar') as $a){ ?>
											<option value="<?= $a ?>" data-icon="<?= avatar($a) ?>" <?= set_select('avatar', $a) ?>><?= $a ?></option>
											<?php } ?>
										</select>
										<label for="select">Avatar</label>
									</div>
								</div>
								<div class="col s12 m4">
									<div class="input-field">
										<input type="text" name="username" class="counter" value="<?= set_value('username') ?>" data-length="25" maxlength="25" required>
										<label for="input">Username</label>
									</div>
								</div>
								<div class="col s12 m4">
									<div class="input-field">
										<input type="text" name="password" value="<?= set_value('password') ? set_value('password') : $password ?>" required>
										<label for="input">Kata Sandi</label>
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