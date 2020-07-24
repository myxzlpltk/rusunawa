<aside id="left-sidebar-nav">
	<ul id="slide-out" class="side-nav fixed leftside-navigation">
		<li class="user-details cyan darken-2">
			<div class="row">
				<div class="col col s4 m4 l4">
					<img src="<?= assets('materialize/images/avatar/'.$this->session->userdata('avatar')) ?>" alt="" class="circle responsive-img valign profile-image cyan">
				</div>
				<div class="col col s8 m8 l8">
					<ul id="profile-dropdown-nav" class="dropdown-content">
						<li>
							<a href="<?= base_url('profil') ?>" class="grey-text text-darken-1">
								<i class="material-icons">face</i> Profil
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="<?= base_url('lock?redirect='.$this->uri->uri_string()) ?>" class="grey-text text-darken-1">
								<i class="material-icons">lock_outline</i> Kunci
							</a>
						</li>
						<li>
							<a href="<?= base_url('logout') ?>" class="grey-text text-darken-1">
								<i class="material-icons">exit_to_app</i> Keluar
							</a>
						</li>
					</ul>
					<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown-nav"><?= $this->session->userdata('username') ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
					<p class="user-roal"><?= role() ?></p>
				</div>
			</div>
		</li>
		<li class="no-padding">
			<ul class="collapsible" data-collapsible="accordion">
				<li class="bold <?php if($menu==1) echo 'active' ?>">
					<a href="<?= base_url('home') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">dashboard</i>
						<span class="nav-text">Dashboard</span>
					</a>
				</li>
				<?php if(isAuth('admin')){ ?>
				<li class="bold <?php if($menu==2) echo 'active' ?>">
					<a href="<?= base_url('pelanggan') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">people</i>
						<span class="nav-text">Pelanggan</span>
					</a>
				</li>
				<?php } ?>
				<?php if(isAuth('admin,user')){ ?>
				<li class="bold <?php if($menu==3) echo 'active' ?>">
					<a href="<?= base_url('tagihan') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">payment</i>
						<span class="nav-text">Tagihan</span>
					</a>
				</li>
				<?php } ?>
				<?php if(isAuth('admin')){ ?>
				<li class="bold <?php if($menu==4) echo 'active' ?>">
					<a href="<?= base_url('petugas') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">people_outline</i>
						<span class="nav-text">Petugas</span>
					</a>
				</li>
				<?php } ?>
				<?php if(isAuth('admin,petugas')){ ?>
				<li class="bold <?php if($menu==5) echo 'active' ?>">
					<a href="<?= base_url('laporan') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">show_chart</i>
						<span class="nav-text">Laporan Petugas</span>
					</a>
				</li>
				<?php } ?>
				<?php if(isAuth('admin')){ ?>
				<li class="bold <?php if($menu==6) echo 'active' ?>">
					<a href="<?= base_url('slider') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">view_carousel</i>
						<span class="nav-text">Slide Foto</span>
					</a>
				</li>
				<li class="bold <?php if($menu==7) echo 'active' ?>">
					<a href="<?= base_url('berita') ?>" class="waves-effect waves-cyan">
						<i class="material-icons">view_compact</i>
						<span class="nav-text">Berita</span>
					</a>
				</li>
				<?php } ?>
			</ul>
		</li>
	</ul>
	<a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
		<i class="material-icons">menu</i>
	</a>
</aside>