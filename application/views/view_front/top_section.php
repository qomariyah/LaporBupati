<div class="menu-section">
			<div class="container">
				<div class="row">
					<div class="all-drop-down">
						<!-- Dropdown Structure -->
						<ul id='dropdown1' class='dropdown-content drop-con-man'>
							<?php
								if ($this->session->userdata('code') == 'loginuserberhasil') { ?>
									<li>
										<a href="<?= site_url('profil')?>">Profil</a>
									</li>
									<li>
										<a href="<?= site_url('aduan-saya')?>">Aduan Saya</a>
									</li>
									<li>
										<a href="#!" data-toggle="modal" data-target="#modal3">Lupa Kata Sandi</a>
									</li>
									<li>
										<a href="<?= site_url('lb/logout') ?>">Log Out</a>
									</li>
							<?php } else { ?>
								<li>
									<a href="<?= site_url('login') ?>">Log In</a>
								</li>
								<li>
									<a href="<?= site_url('daftar') ?>">Register</a>
								</li>
								<li>
									<a href="<?= site_url('lupa-sandi') ?>">Lupa Kata Sandi</a>
								</li>

							<?php } ?>
						</ul>
						<!-- ROOM Dropdown Structure -->
						<ul id='drop-room' class='dropdown-content drop-con-man'>
							<li><a href="<?= site_url('data-opd')?>">Data OPD</a>
							</li>
							<li><a href="<?= site_url('tentang')?>">Tentang</a>
							</li>
							<li><a href="<?= site_url('petunjuk-dan-syarat')?>">Petunjuk &amp; Syarat</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="logo">
						<a href="<?= site_url()?>"><img src="<?= base_url() ?>asset/fe/images/logo.png" alt="" />
						</a>
					</div>
					<div class="menu-bar">
						<ul>
							<li><a href="<?= site_url()?>" >Beranda</a>
							</li>
							<li><a href="<?= site_url('kontak')?>">Kontak</a>
							</li>
							<li><a href="#" class='dropdown-button' data-activates='drop-room'>Informasi <i class="fa fa-angle-down"></i></a>
							<li><a class='dropdown-button' href='#' data-activates='dropdown1'> 
								<?php
									if ($this->session->userdata('code') == 'loginuserberhasil') {
										echo $this->session->userdata('nama_user');
									}else {
										echo "Akun Saya";
									}
								?>
								<i class="fa fa-angle-down"></i></a>
							</li>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>