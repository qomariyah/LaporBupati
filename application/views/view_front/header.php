	<section>
		<div class="mm">
			<div class="mm-inn">
				<div class="mm-logo">
					<a href="<?= site_url()?>"><img src="<?= base_url()?>asset/fe/images/logo.png" alt="">
					</a>
				</div>
				<div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
				</div>
				<div class="mm-menu">
					<div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
					</div>
					<ul>
						<?php
							if ($this->session->userdata('code') == 'loginuserberhasil') { ?>
								<li><a href="<?= site_url()?>">Beranda</a></li>
								<li><a href="<?= site_url('profil')?>">Profil</a></li>
								<li><a href="<?= site_url('aduan-saya')?>">Aduan Saya</a></li>
								<li><a href="<?= site_url('lupa-sandi')?>">Lupa Kata Sandi</a></li>
								<li><a href="<?= site_url('opd')?>">Informasi OPD</a></li>
								<li><a href="<?= site_url('tentang')?>">Tentang Lapor Bupati</a></li>
								<li><a href="<?= site_url('petunjuk-dan-syarat')?>">Petunjuk &amp; Syarat</a></li>
								<li><a href="<?= site_url('kontak')?>">Kontak</a></li>
								<li><a href="<?= site_url('lb/logout')?>">Logout</a></li>
						<?php } else { ?>
							<li><a href="<?= site_url()?>">Beranda</a></li>
							<li><a href="<?= site_url('login')?>">Login</a></li>
							<li><a href="<?= site_url('daftar')?>">Register</a></li>
							<li><a href="<?= site_url('lupa-sandi')?>">Lupa Kata Sandi</a></li>
							<li><a href="<?= site_url('opd')?>">Informasi OPD</a></li>
							<li><a href="<?= site_url('tentang')?>">Tentang Lapor Bupati</a></li>
							<li><a href="<?= site_url('petunjuk-dan-syarat')?>">Petunjuk &amp; Syarat</a></li>
							<li><a href="<?= site_url('kontak')?>">Kontak</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</section>