<div id="modal1" class="modal fade" role="dialog">
			<div class="log-in-pop">
				<div class="log-in-pop-left">
					<h1>Hallo... <span>{{ name }}</span></h1>
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
					<a href="#" class="pop-close" data-dismiss="modal"><img src="<?= base_url() ?>asset/fe/images/cancel.png" alt="" />
					</a>
					<h4>Login</h4>
					<p>Belum punya akun? Buat akunmu sekarang</p>
					<form class="s12">
						<div>
							<div class="input-field s12">
								<input type="text" data-ng-model="name" class="validate">
								<label>Username</label>
							</div>
						</div>
						<div>
							<div class="input-field s12">
								<input type="password" class="validate">
								<label>Password</label>
							</div>
						</div>
						<div>
							<div class="input-field s4">
								<input type="submit" value="Login" class="waves-effect waves-light log-in-btn"> </div>
						</div>
						<div>
							<div class="input-field s12"> <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal3">Lupa kata sandi </a> | <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal2"> Buat akun baru</a> </div>
						</div>
					</form>
				</div>
			</div>
		</div>