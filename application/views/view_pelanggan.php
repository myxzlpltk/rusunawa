<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Informasi Pelanggan</title>

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
					
					<?= breadcrumb('Data Pelanggan') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($pelanggan->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
										<a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url('pelanggan/edit/'.(isAuth('admin') ? html_escape($pelanggan->id_user) : '')) ?>">
											<i class="material-icons">edit</i>
										</a>
										<span class="card-title activator grey-text text-darken-4"><?= html_escape($pelanggan->nama) ?></span>
										<p>
											<i class="material-icons left">perm_identity</i> <?= html_escape($pelanggan->username) ?>
										</p>
										<p>
											<i class="material-icons left">perm_phone_msg</i> <?= html_escape($pelanggan->telepon) ?>
										</p>
									</div>
									<?php if(isAuth('admin')){ ?>
									<div class="card-action">
										<a class="red-text" href="<?= base_url('pelanggan/delete/'.$pelanggan->id_user) ?>" data-prevent="Apakah anda yakin? Menghapus data pelanggan berarti menghapus data login, tagihan dan pembayaran">Hapus</a>
										<a class="orange-text" href="<?= base_url('pelanggan/toggle/'.$pelanggan->id_user) ?>"><?= $pelanggan->blokir == 'y' ? 'Buka Blokir' : 'Blokir' ?></a>
										<a class="red-text" href="<?= base_url('pelanggan/reset/'.$pelanggan->id_user) ?>" data-prevent="Apakah anda yakin? Mereset kata sandi berarti akan mengembalikan ke default yaitu 'password'">Reset</a>
									</div>
									<?php } ?>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><?= html_escape($pelanggan->nama) ?>
											<i class="material-icons right">close</i>
										</span>
										<p>Berikut informasi mengenai identitas.</p>
										<p>ID: <?= html_escape($pelanggan->id_user) ?></p>
										<p>Username: <?= html_escape($pelanggan->username) ?></p>
										<p>Nama: <?= html_escape($pelanggan->nama) ?></p>
										<p>Telepon: <?= html_escape($pelanggan->telepon) ?></p>
										<p>No Identitas: <?= html_escape($pelanggan->no_identitas) ?></p>
										<p>Jenis Identitas: <?= strtoupper(html_escape($pelanggan->jenis_identitas)) ?></p>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l8">
								<div class="card-panel">
									<table class="dataTable">
										<thead>
											<tr>
												<th>#</th>
												<th>Tagihan</th>
												<th>Nominal</th>
												<th>Tanggal Tenggat</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($tagihan as $t){ ?>
											<tr>
												<td><?= html_escape($t->id_tagihan) ?></td>
												<td><?= html_escape($t->nama_tagihan) ?></td>
												<td><?= idr(html_escape($t->nominal)) ?></td>
												<td><?= fix_date(html_escape($t->tanggal_tenggat)) ?></td>
												<td>
													<a href="<?= base_url('tagihan/view/'.$t->id_tagihan) ?>" class="btn blue waves-effect waves-light">Lihat</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
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