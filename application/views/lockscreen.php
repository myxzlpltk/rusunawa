<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Kunci Layar</title>

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
							<p class="center-align">Silahkan masuk untuk membuka kunci</p>
							<?= form_open($url) ?>
								<div>
									<img src="<?= base_url('assets/materialize/images/avatar/'.$this->session->userdata('avatar')) ?>" class="responsive-img circle center-block" style="max-width: 100px;max-height: 100px;">
									<h6 class="center-align grey-text"><?= html_escape($this->session->userdata('username')) ?></h6>
								</div>
								<div class="input-field">
									<input id="password5" type="password" class="validate center-align" name="password" placeholder="Kata Sandi" required>
								</div>
								<button class="btn btn-block" type="submit" name="action">Buka Kunci</button>
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