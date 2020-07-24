<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Informasi Laporan</title>

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

				<?= sidebar(5) ?>

				<section id="content">
					
					<?= breadcrumb('Data Laporan') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($laporan->petugas->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
										<a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url('petugas/edit/'.(isAuth('admin') ? html_escape($laporan->petugas->id_user) : '')) ?>">
											<i class="material-icons">edit</i>
										</a>
										<span class="card-title activator grey-text text-darken-4"><?= html_escape($laporan->petugas->nama) ?></span>
										<p>
											<i class="material-icons left">perm_identity</i> <?= html_escape($laporan->petugas->username) ?>
										</p>
										<p>
											<i class="material-icons left">perm_phone_msg</i> <?= html_escape($laporan->petugas->telepon) ?>
										</p>
									</div>
									<?php if(isAuth('admin')){ ?>
									<div class="card-action">
										<?php if($laporan->isVerified == '0'){ ?>
										<a class="blue-text" href="<?= base_url('laporan/verify/'.$laporan->id_laporan) ?>" data-prevent="Apakah anda yakin?">Verifikasi</a>
										<?php } ?>
										<a class="red-text" href="<?= base_url('laporan/delete/'.$laporan->id_laporan) ?>" data-prevent="Apakah anda yakin?">Hapus</a>
									</div>
									<?php } ?>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><?= html_escape($laporan->petugas->nama) ?>
											<i class="material-icons right">close</i>
										</span>
										<p>Berikut informasi mengenai identitas.</p>
										<p>ID: <?= html_escape($laporan->petugas->id_user) ?></p>
										<p>Username: <?= html_escape($laporan->petugas->username) ?></p>
										<p>Nama: <?= html_escape($laporan->petugas->nama) ?></p>
										<p>Telepon: <?= html_escape($laporan->petugas->telepon) ?></p>
										<p>No Identitas: <?= html_escape($laporan->petugas->no_identitas) ?></p>
										<p>Jenis Identitas: <?= strtoupper(html_escape($laporan->petugas->jenis_identitas)) ?></p>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l8">
								<ul class="collection z-depth-1">
									<li class="collection-item">
										<span class="blue-text">Jenis Laporan :</span> <?= html_escape($laporan->nama) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Tanggal Laporan :</span> <?= fix_datetime(html_escape($laporan->tanggal)) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Status :</span> <?= $laporan->isVerified == '0' ? 'Belum di verifikasi' : 'Terverifikasi' ?>
									</li>
								</ul>

								<?php if(count($laporan->detail) > 0){ ?>
								<?php $files = array_chunk($laporan->detail, ceil(count($laporan->detail)/3)) ?>
								<div class="row">
									<?php foreach($files as $f){ ?>
									<div class="col l4 m6 s6">
										<?php foreach($f as $file){ ?>
											<div class="card hoverable">
												<div class="card-image">
													<img src="<?= base_url('laporan/file/'.$file->id_detail) ?>" alt="File" class="materialboxed">
												</div>
											</div>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
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