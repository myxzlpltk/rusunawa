<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Dashboard</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
		<?= css('datatables/datatables.min.css') ?>
		<?= css('datatables/materialize.datatables.min.css') ?>
	</head>
	<body>
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<div id="main" class="white">

			<div class="wrapper">

				<?= sidebar(1) ?>

				<section id="content">
					<div id="breadcrumbs-wrapper">

					</div>
					<div class="container">
						
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
		<?= script('datatables/datatables.min.js') ?>
		<?= script('datatables/materialize.datatables.min.js') ?>
	</body>
</html>