<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Informasi Tagihan</title>

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

				<?= sidebar(3) ?>

				<section id="content">
					
					<?= breadcrumb('Data Tagihan') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($tagihan->pemilik->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
										<a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right" href="<?= base_url('pelanggan/edit/'.(isAuth('admin') ? html_escape($tagihan->pemilik->id_user) : '')) ?>">
											<i class="material-icons">edit</i>
										</a>
										<span class="card-title activator grey-text text-darken-4"><?= html_escape($tagihan->pemilik->nama) ?></span>
										<p>
											<i class="material-icons left">perm_identity</i> <?= html_escape($tagihan->pemilik->username) ?>
										</p>
										<p>
											<i class="material-icons left">perm_phone_msg</i> <?= html_escape($tagihan->pemilik->telepon) ?>
										</p>
									</div>
									<div class="card-reveal">
										<span class="card-title grey-text text-darken-4"><?= html_escape($tagihan->pemilik->nama) ?>
											<i class="material-icons right">close</i>
										</span>
										<p>Berikut informasi mengenai identitas.</p>
										<p>ID: <?= html_escape($tagihan->pemilik->id_user) ?></p>
										<p>Username: <?= html_escape($tagihan->pemilik->username) ?></p>
										<p>Nama: <?= html_escape($tagihan->pemilik->nama) ?></p>
										<p>Telepon: <?= html_escape($tagihan->pemilik->telepon) ?></p>
										<p>No Identitas: <?= html_escape($tagihan->pemilik->no_identitas) ?></p>
										<p>Jenis Identitas: <?= strtoupper(html_escape($tagihan->pemilik->jenis_identitas)) ?></p>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l8">
								<?php if(count($tagihan->tunggakan) > 0){ ?>
								<div class="card-panel red">
									<h5 class="white-text"><i class="material-icons left">warning</i>Tunggakan</h5>
									<ul>
									<?php foreach($tagihan->tunggakan as $t){ ?>
										<li class="white-text"><?= fix_date($t) ?></li>
									<?php } ?>
									</ul>
								</div>
								<?php } ?>

								<?php if(isAuth('admin')){ ?>
								<div class="py-1 z-depth-0">
									<a href="<?= base_url('tagihan/bayar/'.$tagihan->id_tagihan) ?>" class="btn waves-effect waves-light blue"><i class="material-icons left">add</i>Bayar</a>
									<a href="<?= base_url('tagihan/edit/'.$tagihan->id_tagihan) ?>" class="btn waves-effect waves-light orange"><i class="material-icons left">edit</i>Edit</a>
									<?php if($tagihan->status == 'aktif'){ ?>
									<a href="<?= base_url('tagihan/stop/'.$tagihan->id_tagihan) ?>" class="btn waves-effect waves-light red tooltipped" data-tooltip="Stop Tagihan" data-prevent="Apakah anda yakin?"><i class="material-icons">delete</i></a>
									<?php } ?>
									<a href="<?= base_url('tagihan/delete/'.$tagihan->id_tagihan) ?>" class="btn waves-effect waves-light red tooltipped" data-tooltip="Hapus Permanen" data-prevent="Apakah anda yakin?"><i class="material-icons">delete_forever</i></a>
								</div>
								<?php } ?>

								<ul class="collection z-depth-1">
									<li class="collection-item">
										<span class="blue-text">Nama Tagihan :</span> <?= html_escape($tagihan->nama_tagihan) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Deskripsi :</span> <?= html_escape($tagihan->deskripsi) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Nominal :</span> <?= idr(html_escape($tagihan->nominal)) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Jatuh Tempo Berikutnya :</span> <?= fix_date(html_escape($tagihan->tanggal_tenggat)) ?>
									</li>
									<li class="collection-item">
										<span class="blue-text">Status :</span> <?= ucwords(html_escape($tagihan->status)) ?>
									</li>
								</ul>
							</div>
							<div class="col s12">
								<div class="card-panel">
									<table class="dataTable" data-ajax="<?= base_url('tagihan/pembayaran/'.$tagihan->id_tagihan) ?>">
										<thead>
											<tr>
												<th>#</th>
												<th>Nominal</th>
												<th>Per-Tanggal</th>
												<th>Tanggal Transaksi</th>
												<?php if(isAuth('admin')){ ?>
												<th>Aksi</th>
												<?php } ?>
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