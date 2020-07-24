<header id="header" class="page-topbar">
	<div class="navbar-fixed">
		<nav class="navbar-color blue">
			<div class="nav-wrapper">
				<a href="<?= base_url() ?>" class="brand-logo darken-1 hide-on-med-and-down">Rusunawa</a>
				<ul class="right">
					<li>
						<a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen tooltipped" data-tooltip="Layar penuh">
							<i class="material-icons">fullscreen</i>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
							<span class="avatar-status avatar-online">
								<img src="<?= base_url('assets/materialize/images/avatar/'.($this->session->userdata('avatar') ? $this->session->userdata('avatar') : 'avatar-1.png')) ?>" alt="avatar">
								<i></i>
							</span>
						</a>
					</li>
				</ul>
				<ul id="profile-dropdown" class="dropdown-content">
					<?php if(isAuth('admin,user,petugas')){ ?>
					<li>
						<a href="<?= base_url('profil') ?>" class="grey-text text-darken-1">
							<i class="material-icons">face</i> Profil</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="<?= base_url('lock?redirect='.$this->uri->uri_string()) ?>" class="grey-text text-darken-1">
							<i class="material-icons">lock_outline</i> Kunci</a>
					</li>
					<li>
						<a href="<?= base_url('logout') ?>" class="grey-text text-darken-1">
							<i class="material-icons">exit_to_app</i> Keluar</a>
					</li>
					<?php }else{ ?>
					<li>
						<a href="<?= base_url('login') ?>" class="grey-text text-darken-1">Masuk</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</div>
</header>