<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Pembayaran Tagihan</title>

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

				<?= sidebar(3) ?>

				<section id="content">
					
					<?= breadcrumb('Pembayaran Tagihan') ?>
					
					<div class="container">
						<div class="row">
							<div class="col s12 m8 l8">
								<div id="payment-box" class="py-2">
									<?= form_open() ?>
										<div class="input-field">
											<input type="number" name="month" min="1" step="1">
											<label>Jumlah Bulan</label>
										</div>
										<div class="table">
											<table>
												<thead>
													<tr>
														<th>No.</th>
														<th>Per-Tanggal</th>
														<th>Nominal</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
										</div>
										<div class="right">
											<button type="submit" class="btn waves-effect waves-light blue" name="submit" value="cetak"><i class="material-icons left">print</i>Cetak & Simpan</button>
											<button type="submit" class="btn waves-effect waves-light blue" name="submit" value="simpan"><i class="material-icons left">save</i>Simpan</button>
										</div>
									<?= form_close("\n") ?>
								</div>
							</div>
							<div class="col s12 m4 l4">
								<div id="profile-card" class="card">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator" src="<?= assets('materialize/images/gallary/3.png') ?>" alt="user bg">
									</div>
									<div class="card-content">
										<img src="<?= assets('materialize/images/avatar/'.html_escape($tagihan->pemilik->avatar)) ?>" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2">
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
		<?= script('moment/moment.min.js') ?>
		<?= script('moment/id.js') ?>
		<script>
			$(document).ready(function() {
				var config = {
					tanggalTenggat: <?= json_encode(html_escape($tagihan->tanggal_tenggat)) ?>,
					tunggakan: <?= json_encode(html_escape($tagihan->tunggakan)) ?>,
					nominal: <?= json_encode(html_escape($tagihan->nominal)) ?>
				};
				App.event.paymentBox('#payment-box', config);
			});
		</script>
	</body>
</html>