<?= doctype() ?>
<html lang="id">
	<head>
		<?= metas() ?>
		<title>Rusunawa Jepun</title>

		<?= css('bootstrap/css/bootstrap-grid.css') ?>
		<?= css('sweetalert2/sweetalert2.min.css') ?>
		<?= material('css/materialize.css"') ?>
		<?= material('css/style.css"') ?>
		<?= material('css/custom/custom.css"') ?>
		<?= material('vendors/perfect-scrollbar/perfect-scrollbar.css"') ?>
		<?= material('vendors/flag-icon/css/flag-icon.min.css"') ?>
		<style type="text/css" media="screen">
			.carousel-item{
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				cursor: move;
			}
			.carousel-item .card-panel{
				display: inline-block;
				background-color: rgba(255,255,255,0.3);
			}
			main{
				min-height: calc(100vh - 100px);
			}
		</style>
	</head>
	<body style="min-height: 100vh">
		
		<?= loader() ?>
		<?= head() ?>
		<?= flash() ?>

		<main>
			<section id="carousel">
				<div class="carousel carousel-slider">
					<?php foreach($slider as $k => $s){ ?>
					<div class="carousel-item" style="background-image: url(<?= base_url('uploads/slider/'.$s->image) ?>);">
						<div class="container py-2">
							<div class="card-panel">
								<h2><?= $s->title ?></h2>
								<p class="flow-text"><?= $s->deskripsi ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</section>

			<section id="berita" class="white">
				<div class="container py-2">
					<h5 class="center-align">Daftar Berita</h5>
					<div id="searchBox">
						<?= form_open('', array('method' => 'get')) ?>
							<div class="row">
								<div class="col-0 col-md-6 col-lg-9"></div>
								<div class="col-12 col-md-6 col-lg-3">
									<div class="input-field">
										<i class="material-icons prefix">search</i>	
										<input type="text" name="q" value="<?= $this->input->get('q') ?>">
										<label>Cari</label>
									</div>
								</div>
							</div>
							<button type="submit" hidden></button>
						<?= form_close("\n") ?>
					</div>
					<div class="row" id="listBerita">
						<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 berita-item" style="display: none;">
							<div class="card sticky-action small">
								<div class="card-image">
									<img src="" class="materialboxed">
								</div>
								<div class="card-content">
									<i class="grey-text right-align"></i>
									<p></p>
								</div>
								<div class="card-action">
									<a href="#" class="red-text">Baca</a>
								</div>
							</div>
						</div>
					</div>
					<p class="center-align"><button type="button" class="btn blue waves-effect waves-light" id="loadMore"><i class="material-icons left">refresh</i>Muat Lagi</button></p>
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
		<script>
			var __node = $('.berita-item').removeAttr('style').first().clone();
			$('.berita-item').remove();

			var Buku = {
				query: <?= json_encode($this->input->get('q')) ?>,
				lastID: undefined,
				urlAjax: '<?= base_url('berita/list') ?>',
				urlCover: '<?= base_url('uploads/berita/') ?>',
				urlView: '<?= base_url('berita/baca/') ?>',
				node: __node,
				isReady: true,
				sendAjax: function(){
					let self = this;

					if(self.isReady){
						$.ajax({
							url: self.urlAjax,
							method: 'post',
							data: {
								id: self.lastID,
								q: self.query
							},
							dataType: 'json',
							beforeSend: function(){
								self.statusAjax(false);
							},
							success: function(data){
								self.result(data);
							},
							error: function(xhr, status, error){
								self.throwError(error);
							},
							complete: function(){
								self.statusAjax(true);
							},
						});
					}
				},
				statusAjax: function(isReady){
					if(isReady){
						this.isReady = true;
						$('#loadMore i').removeClass('spin');
					}
					else{
						this.isReady = false;
						$('#loadMore i').addClass('spin');
					}
				},
				result: function(data){
					let self = this;

					if(Array.isArray(data)){
						if(data.length > 0){
							$.each(data, function(){
								self.parse(this.id, this.image, this.judul, this.tanggal, this.slug);
							});
						}
						else{
							$('#loadMore').addClass('disabled');
						}
					}
					else{
						self.throwError('Tidak dapat mengolah data');
					}
				},
				parse: function(id, image, judul, tanggal, slug){
					let self = this;

					var data = self.node.clone();
					data.find('.card-image img').attr('src', self.urlCover+image).materialbox();
					data.find('.card-content i').text(tanggal);
					data.find('.card-content p').text(judul);
					data.find('.card-action a').attr('href', self.urlView+slug);

					$('#listBerita').append(data);
					self.lastID = id;
				},
				throwError: function(text){
					swal({
						type: 'error',
						text: 'Ups. Terjadi kesalahan. '+text
					});
				}
			}

			$(document).ready(function(){
				Buku.sendAjax();

				$('#loadMore').click(function(){
					Buku.sendAjax();
				});

				$(document).scroll(function(){
					if($(document).scrollTop() > ($(document).height() - $(window).height() - 100)){
						Buku.sendAjax();
					}
				});

			});
		</script>
	</body>
</html>