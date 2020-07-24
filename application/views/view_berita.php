<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title><?= html_escape($berita->judul) ?></title>

		<?= css('sweetalert2/sweetalert2.min.css') ?>
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

		<main style="min-height: calc(100vh - 100px)">
			<section id="news">
				<div class="container py-2">
					<div class="row">
						<div class="col s12">
							<div class="clearfix">
								<div class="left">
									<a href="<?= base_url() ?>">
										<div class="card-panel hoverable waves-effect waves-light" style="display: inline-block;">
											<i class="material-icons">arrow_back</i>
										</div>
									</a>
								</div>
								<div class="right">
									<div class="card-panel waves-effect waves-light" style="display: inline-block;">
										<i class="material-icons left">visibility</i><?= $berita->viewer ?> Hits
									</div>
									<div class="card-panel waves-effect waves-light" style="display: inline-block;">
										<i class="material-icons left">access_time</i><?= fix_datetime($berita->tanggal) ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col s12">
							<div class="card-panel">
								<h5 class="center-align"><?= html_escape($berita->judul) ?></h5>
								<div class="py-2">
									<img src="<?= base_url('uploads/berita/'.$berita->image) ?>" class="responsive-img materialboxed center-block" style="max-width: 600px;">
								</div>
								<div class="content">
									<?= $berita->isi ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		
		<footer class="page-footer blue" style="padding-left: 0px">
			<div class="footer-copyright">
				<div class="container">
					<span>Copyright &copy;
						2018 <a class="grey-text text-lighten-2" href="http://localhost/rusunawa/" target="_blank">Rusunawa Jepun</a> All rights reserved.</span>
					<span class="right hide-on-small-only"> Design and Developed by <a class="grey-text text-lighten-2" href="https://instagram.com/saddamazyazy">Saddam Azy</a></span>
				</div>
			</div>
		</footer>

		<?= material('vendors/jquery-3.2.1.min.js') ?>
		<?= material('js/materialize.min.js') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>
		<?= material('js/plugins.js') ?>
		<?= material('js/custom-script.js') ?>
		<?= script('sweetalert2/sweetalert2.min.js') ?>
	</body>
</html>