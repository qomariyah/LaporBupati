		<div id="modal2" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hallo... <span>{{ name1 }}</span></h1>
					<p>Belum punya akun? Buat akunmu sekarang</p>
					<h4>Login dengan social media</h4>
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
						</li>
						<li><a href="#"><i class="fa fa-google"></i> Google+</a>
						</li>
						<li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
						</li>
					</ul>
				</div>
				<div class="log-in-pop-right">
					<a href="#" class="pop-close" data-dismiss="modal"><img src="<?= base_url()?>asset/fe/images/cancel.png" alt="" />
					</a>
					<h4>Buat Akun Baru</h4>
					<form class="col s12" method="POST" action="<?= site_url('hb/register') ?>">
						<div class="row">
							<div class="input-field col s6">
								<input type="number" class="validate" name="ktp">
								<label>No. KTP</label>
							</div>
							<div class="input-field col s6">
								<input type="text" class="validate" name="nama">
								<label>Nama Lengkap</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input type="text" class="validate" name="username">
								<label>Username</label>
							</div>
							<div class="input-field col s6">
								<input type="password" class="validate" name="pass">
								<label>Password</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<input type="email" class="validate" name="email">
								<label>Email</label>
							</div>
							<div class="input-field col s6">
								<input type="text" class="validate" name="telp">
								<label>No. Telepon</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6">
								<?php echo $image; ?>
							</div>
							<div class="input-field col s6">
								<input type="text" class="validate">
								<label>Masukkan Kode</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Register" class="waves-effect waves-light log-in-btn">
							</div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal1">Sudah menjadi member? Login</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>