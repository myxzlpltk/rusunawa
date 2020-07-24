<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Profil</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
		<?= css('sweetalert2/sweetalert2.min.css') ?>
	</head>
	<body>
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<div id="main">

			<div class="wrapper">

				<?= sidebar(1) ?>

				<section id="content">
					
					<?= breadcrumb('Profil') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($profil->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
										<span class="card-title activator grey-text text-darken-4"><?= html_escape($profil->username) ?></span>
									</div>
								</div>

								<div class="card-panel">
									<h5 class="center-align">Ganti Avatar</h5>
									<div class="row">
										<?php foreach($this->config->item('avatar') as $k => $a){ ?>
										<div class="col s6 m4 l4 h">
											<a href="<?= base_url('profil/avatar/'.$k) ?>" class="z-depth-1 hoverable">
												<img src="<?= assets('materialize/images/avatar/'.$a) ?>" class="responsive-img">
											</a>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l8">
								<div class="card-panel">
									<h5>Perbarui Username</h5>
									<?= form_open('profil/username') ?>
										<div class="row">
											<div class="col s12">
												<div class="input-field">
													<input type="text" name="username" class="counter" value="<?= set_value('username') ? set_value('username') : html_escape($profil->username) ?>" data-length="25" maxlength="25" required>
													<label for="input">Username</label>
												</div>
											</div>
										</div>
										<button type="submit" class="btn blue waves-effect waves-light">Perbarui</button>
									<?= form_close("\n") ?>
								</div>

								<div class="card-panel">
									<h5>Perbarui Kata Sandi</h5>
									<?= form_open('profil/password') ?>
										<div class="row">
											<div class="col s12">
												<div class="input-field">
													<input type="password" name="old_password" value="<?= set_value('old_password') ?>" required>
													<label for="input">Kata Sandi Lama</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col s12">
												<div class="input-field">
													<input type="password" name="new_password" value="<?= set_value('new_password') ?>" required>
													<label for="input">Kata Sandi Baru</label>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col s12">
												<div class="input-field">
													<input type="password" name="retype_password" value="<?= set_value('retype_password') ?>" required>
													<label for="input">Ketik Ulang Kata Sandi Baru</label>
												</div>
											</div>
										</div>
										<button type="submit" class="btn blue waves-effect waves-light">Perbarui</button>
									<?= form_close("\n") ?>
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
		<?= script('sweetalert2/sweetalert2.min.js') ?>
	</body>
</html>