<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Login</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
	</head>
	<body>
		
		<?= flash() ?>
		<main class="login-box">
			<div class="container">
				<div class="row">
					<div class="col s12 m6 l4 offset-m3 offset-l4">
						<div class="card card-panel">
							<p class="center-align">Silahkan masuk untuk memulai sesi</p>
							<?= form_open() ?>
								<div class="input-field">
									<i class="material-icons prefix">account_circle</i>
									<input id="name4" type="text" class="validate" name="username">
									<label for="first_name">Username</label>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password5" type="password" class="validate" name="password">
									<label for="password">Kata Sandi</label>
								</div>
								<button class="btn btn-block" type="submit" name="action">Masuk</button>
							<?= form_close("\n") ?>
						</div>
					</div>
				</div>
			</div>
		</main>
		
		<?= material('vendors/jquery-3.2.1.min.js') ?>
		<?= material('js/materialize.min.js') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>
		<?= material('js/plugins.js') ?>
		<?= material('js/custom-script.js') ?>
	</body>
</html>