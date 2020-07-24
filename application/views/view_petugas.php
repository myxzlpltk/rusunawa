<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Informasi Petugas</title>

		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
		<?= css('sweetalert2/sweetalert2.min.css') ?>
		<?= css('datatables/datatables.min.css') ?>
		<?= css('datatables/materialize.datatables.min.css') ?>
	</head>
	<body>
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<div id="main">

			<div class="wrapper">

				<?= sidebar($menu) ?>

				<section id="content">
					
					<?= breadcrumb('Data Petugas') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($petugas->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
										<a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url('petugas/edit/'.(isAuth('admin') ? html_escape($petugas->id_user) : '')) ?>">
											<i class="material-icons">edit</i>
										</a>
										<span class="card-title activator grey-text text-darken-4"><?= html_escape($petugas->nama) ?></span>
										<p>
											<i class="material-icons left">perm_identity</i> <?= html_escape($petugas->username) ?>
										</p>
										<p>
											<i class="material-icons left">perm_phone_msg</i> <?= html_escape($petugas->telepon) ?>
										</p>
									</div>
									<?php if(isAuth('admin')){ ?>
									<div class="card-action">
										<a class="red-text" href="<?= base_url('petugas/delete/'.$petugas->id_user) ?>" data-prevent="Apakah anda yakin? Menghapus data petugas berarti menghapus data login dan laporan">Hapus</a>
										<a class="orange-text" href="<?= base_url('petugas/toggle/'.$petugas->id_user) ?>"><?= $petugas->blokir == 'y' ? 'Buka Blokir' : 'Blokir' ?></a>
										<a class="red-text" href="<?= base_url('petugas/reset/'.$petugas->id_user) ?>" data-prevent="Apakah anda yakin? Mereset kata sandi berarti akan mengembalikan ke default yaitu 'password'">Reset</a>
									</div>
									<?php } ?>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><?= html_escape($petugas->nama) ?>
											<i class="material-icons right">close</i>
										</span>
										<p>Berikut informasi mengenai identitas.</p>
										<p>ID: <?= html_escape($petugas->id_user) ?></p>
										<p>Username: <?= html_escape($petugas->username) ?></p>
										<p>Nama: <?= html_escape($petugas->nama) ?></p>
										<p>Telepon: <?= html_escape($petugas->telepon) ?></p>
										<p>No Identitas: <?= html_escape($petugas->no_identitas) ?></p>
										<p>Jenis Identitas: <?= strtoupper(html_escape($petugas->jenis_identitas)) ?></p>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l8">
								<div class="card-panel">
								<a href="<?= base_url('petugas/lapor/'.(isAuth('admin') ? html_escape($petugas->id_user) : '')) ?>" class="btn blue waves-effect waves-light right"><i class="material-icons left">add</i>Tambah</a>
									<table class="browser-default dataTable" data-ajax="<?= base_url('laporan/data/'.$petugas->id_user) ?>">
										<thead>
											<tr>
												<th>#</th>
												<th>Jenis</th>
												<th>File</th>
												<th>Tanggal</th>
												<th>Status</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody></tbody>
									</table>
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
		<?= script('datatables/datatables.min.js') ?>
		<?= script('datatables/materialize.datatables.min.js') ?>
	</body>
</html>