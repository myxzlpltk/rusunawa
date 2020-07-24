<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>401 Unauthorized</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
	</head>
	<body>
		
		<?= flash() ?>
		<main class="valign-wrapper h-100">
			<div class="container">
				<div class="row">
					<div class="col s12 m6 l4 offset-m3 offset-l4">
						<div class="card card-panel red">
							<p class="center-align white-text">Anda tidak berhak untuk mengakses menu ini!</p>
							<p class="center-align"><a href="<?= base_url('home') ?>" class="btn blue z-depth-0"><i class="material-icons left">home</i> Kembali ke beranda</a></p>
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