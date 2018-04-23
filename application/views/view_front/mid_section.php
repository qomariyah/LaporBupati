<?php if ($content == 'home') { ?>
	<!--Form Section-->
		<div class="inn-body-section inn-booking">
			<div class="container">
				<div class="row">
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-6">
						<div class="book-title">
							<h2>Lapor Bupati</h2>
							<p>Sistem Informasi Pengaduan Masyarakat di Kabupaten Pekalongan Berbasis Android dan Website.</p>
							<br>
							<br>
							<br>
							<br>
							<p>Aplikasi <strong>Lapor Bupati </strong>tersedia di perangkat mobile Android! Download sekarang.</p>
							<a href="#"><img width="70%" height="70%" src="<?= base_url() ?>/asset/fe/images/ps.png" class="img-responsive"></a>
						</div>
					</div>
					<div class="col-md-6" id="form-register">
						<?php if ($this->session->userdata('code') == 'loginuserberhasil') { ?>
						<div class="book-form inn-com-form">
							<form class="col s12" method="POST" action="<?= site_url('front/aduan/tambah') ?>" enctype="multipart/form-data">
								<p><strong>Penting!</strong> Pastikan isi aduan menggunakan bahasa yang baik dan santun.</p><br>
								<div class="row">
									<div class="col s12">
										<textarea id="textarea" minlength="50" name="aduan" required placeholder="Pesan Aduan"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col s12">
										<select required name="kategori">
											<option value="Non Infrastruktur">Non Infrastruktur</option>
											<option value="Infrastruktur">Infrastruktur</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="file-field input-field col s12">
										<div class="btn" id="pro-file-upload"> <span>File</span>
											<input type="file" name="lampiran">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path" type="text" placeholder="Unggah Foto">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" value="kirim" class="form-btn">
									</div>
								</div>
							</form>
						</div>
						<?php }else{ ?>
						<div class="book-form inn-com-form">
							<form class="col s12" method="POST">
								<p><strong>Daftar!</strong> dan ikut serta dalam pembangunan Kabupaten Pekalongan.</p><br>
								<div>
									<label class="col s4">NO. KTP</label>
									<input type="text" maxlength="16" required placeholder="contoh : 12345678901234" class="validate">
								</div>
								<div>
									<label class="col s4">Nama Lengkap</label>
									<input type="text" maxlength="50" required placeholder="Contoh : Erik Wibowo" class="validate" maxlength="12">
								</div>
								<div>
									<label class="col s4">No. Telepon</label>
									<input type="text" maxlength="15" required placeholder="contoh : 081510815414" class="validate">
								</div>
								<div>
									<label class="col s4">Email</label>
									<input type="email" maxlength="50" required placeholder="erik@gmail.com" class="validate">
								</div>
								<div>
									<label class="col s4">Kata Sandi</label>
									<input type="password" minlength="6" required placeholder="Kata Sandi" class="validate">
								</div>
								<br>
								<div class="row">
									<input type="submit" value="Daftar" class="form-btn">
								</div>
							</form>
						</div>
						<?php } ?>
					</div>

					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
	<!--End Form Section-->

	<!--Second Section-->
		<div class="blog hom-com pad-bot-0">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2>Pengaduan Terkini</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<div class="center">
							<form method="GET" action="<?= site_url('aduan/data') ?>">
								<ul class="foot-subsc">
									<li>
										<span class="fa fa-search"></span>&nbsp;&nbsp;
										<input type="text" name="cari" placeholder="Cari...">
									</li>
								</ul>
							</form>
						</div>
						<br>
					</div>
				</div>
				<div class="row">
					<?php foreach ($aduan as $row) { ?>
					<div class="room-rat-inn room-rat-bor col-md-4">
						<div class="room-rat-body">
							<div class="room-rat-img">
								<img class="img-responsive" width="50px" height="50px" <?php
                                            if ($row->foto == "") {
                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                            }else{
                                                echo "src='".base_url()."files/user/thumb/".$row->thumb."'";
                                            }
                                        ?>
                                    alt="<?= $row->thumb ?>" alt="<?= $row->foto ?>">
								<p><a href="<?= base_url('aduan/detail/').base64_encode($row->id_aduan) ?>"><?= $row->nama_user?></a> <small><?= $row->jmladuan ?></small><span><?= time_ago($row->tanggal) ?></span>
								</p>
							</div>
							<p style="font-size: 14px"><?php
                                if (strlen($row->aduan) <= 150) {
                                    echo p($row->aduan);
                                }else{
                                    echo substr($row->aduan, 0, 150)." ..."; ?>
                                    <a href="<?= site_url('aduan/detail/').base64_encode($row->id_aduan) ?>"> Selengkapnya</a>
                                <?php }
                            ?></p>
							<ul>
								<li> <i class="fa fa-tag"></i> <span><?= $row->kategori ?></span></li>
								<li> <i class="fa fa-comments"> <span><?= $row->jmlkomen ?></i> </span></li>
								<li class="pull-right"><span><i class="fa fa-info-circle"></i> <?= $row->status ?></span></li>
							</ul>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="db-pagi">
					<center><a href="<?= site_url('aduan') ?>" class="btn btn-sm waves-effect">Selengkapnya...</a></center>
				</div>
				<br>
				<br>
			</div>
		</div>
	<!--End Second Section-->
<?php } ?>

<?php if ($content == 'aduan') { ?>
	<!--ABOUT SECTION-->
			<br>
			<br>
			<br>
			<br>
		<div class="inn-body-section">
			<div class="container">
				<div class="row">
					<div class="hom1-title">
						<h2>Pengaduan Terkini</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<div class="center">
							<form method="GET" action="">
								<ul class="foot-subsc">
									<li>
										<span class="fa fa-search"></span>&nbsp;&nbsp;
										<input type="text" name="cari" placeholder="Cari...">
									</li>
								</ul>
							</form>
						</div>
						<p><?= $this->session->flashdata('q'); ?></p>
					</div>
				</div>
				<div class="row">
					<?php if ($jml_data == 0) { ?>
					<center><p>Data aduan tidak ditemukan</p></center>
					<?php }else{ ?>
					<?php foreach ($data_aduan as $row) { ?>
					<div class="room-rat-inn room-rat-bor col-md-4">
						<div class="room-rat-body">
							<div class="room-rat-img">
								<img class="img-responsive" width="50px" height="50px" <?php
                                            if ($row->foto == "") {
                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                            }else{
                                                echo "src='".base_url()."files/user/thumb/".$row->thumb."'";
                                            }
                                        ?>
                                    alt="<?= $row->thumb ?>" alt="<?= $row->foto ?>">
								<p><a href="<?= base_url('aduan/detail/').base64_encode($row->id_aduan) ?>"><?= $row->nama_user?></a> <small><?= $row->jmladuan ?></small><span><?= time_ago($row->tanggal) ?></span>
								</p>
							</div>
							<p style="font-size: 14px"><?php
                                if (strlen($row->aduan) <= 150) {
                                    echo p($row->aduan);
                                }else{
                                    echo substr($row->aduan, 0, 150)." ..."; ?>
                                    <a href="<?= site_url('aduan/detail/').base64_encode($row->id_aduan) ?>"> Selengkapnya</a>
                                <?php }
                            ?></p>
							<ul>
								<li> <i class="fa fa-tag"></i> <span><?= $row->kategori ?></span></li>
								<li> <i class="fa fa-comments"> <span><?= $row->jmlkomen ?></i> </span></li>
								<li class="pull-right"><span><i class="fa fa-info-circle"></i> <?= $row->status ?></span></li>
							</ul>
						</div>
					</div>
					<?php } ?>
					<?php } ?>
				</div>
				<div class="db-pagi">
					<?= $pagination ?>
				</div>
				<br>
				<br>
			</div>
		</div>
	<!--END ABOUT SECTION-->
<?php } ?>

<?php if ($content == 'tentang-lb') { ?>
	<!--ABOUT SECTION-->
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4><?= $judul; ?></h4>
					<p>Laporkan Permasalahan di Sekitarmu Untuk Kemajuan Kotamu</p>
					<p> </p>
					<ul>
						<li><a href="<?= site_url() ?>">Home</a>
						</li>
						<li><a href="<?= site_url('tentang_lb')?>"><?= $judul; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="inn-body-section">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2>Tentang Lapor Bupati</h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="about-left">
							<h2>Lapor <span>Bupati</span></h2>
							<h4>Laporkan Permasalahan di Sekitarmu Untuk Kemajuan Kotamu</h4>
							<p align="justify">Lapor Bupati merupakan sistem informasi pengaduan masyarakat berbasis android dan web yang digunakan sebagai sarana penyampaian laporan, keluhan, maupun aspirasi masyarakat Kabupaten Pekalongan.</p>
							
							<p align="justify">Lapor Bupati melibatkan partisipasi publik dan bersifat dua arah sehingga dapat tercipta komunikasia antara masyarakat dengan penyelenggara. Masyarakat dapat menyampaikan pengaduan yang nantinya akan ditindaklanjuti oleh Organisasi Perangkat Daerah (OPD) terkait. Lapor Bupati dikembangkan dalam rangka peningkatan kualitas pelayanan publik di Kabupaten Pekalongan.</p>

							<a href="#" class="link-btn">Kontak : 085 600 900 300</a> </div>
					</div>
					<div class="col-md-6">
						<div class="about-right"> <img src="<?= base_url()?>asset/fe/images/about.jpg" alt=""> </div>
					</div>
				</div>
			</div>
		</div>
	<!--END ABOUT SECTION-->
<?php } ?>

<?php if ($content == 'kontak') { ?>
	<!--CONTACT US SECTION-->
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4><?= $judul; ?></h4>
					<p>Curabitur auctor, massa sed interdum ornare, nulla sem vestibulum purus, eu maximus magna urna eu nunc.</p>
					<ul>
						<li><a href="<?= site_url() ?>">Home</a>
						</li>
						<li><a href="<?= site_url('kontak') ?>"><?= $breadcrumb; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="inn-body-section">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2><?= $judul; ?></h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 new-con">
						<h2><span>Lapor</span> Bupati</h2>
						<p>Sistem Informasi Pengaduan Masyarakat di Kabupaten Pekalongan Berbasis Android dan Web.</p>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url()?>asset/fe/images/icon/20.png" alt="">
						<h4>Sekretariat Daerah</h4>
						<p>Jalan Alun-Alun Utara No.1 Kajen 51161 Pekalongan, Jawa Tengah</p>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url()?>asset/fe/images/icon/22.png" alt="">
						<h4>Kontak</h4>
						<p> <a href="tel://0099999999" class="contact-icon">Telepon: 0285 381000, 381001</a>
							<br> <a href="tel://0099999999" class="contact-icon">Fax: 0285 381006</a>
							<br> <a href="<?= prep_url("mailto:mytestmail@gmail.com") ?>" class="contact-icon">Email: info@pekalongankab.go.id</a> </p>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 new-con"> <img src="<?= base_url()?>asset/fe/images/icon/21.png" alt="">
						<h4>Website</h4>
						<p> <a href="<?= prep_url('indonesia.go.id/') ?>" target="_blank">Pemerintah Pusat Republik Indonesi</a>
							<br> <a href="<?= prep_url('jatengprov.go.id') ?>" target="_blank">Pemerintah Provinsi Jawa Tengah</a>
							<br> <a href="<?= prep_url('pekalongankab.go.id') ?>" target="_blank">Pemerintah Daerah Kab. Pekalongan</a>
							<br> <a href="<?= prep_url('dinkominfo.pekalongankab.go.id') ?>" target="_blank">DINKOMINFO Kabupaten Pekalongan</a> </p>
					</div>
				</div>
				<?php if ($this->session->userdata('code') == 'loginuserberhasil') { ?>
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
						<div class="book-form inn-com-form">
							<center><h3>MASUKAN</h3></center>
							<center><p>Bantu kami dalam menyempurnakan aplikasi dengan memberikan masukan, kritik, dan saran.</p></center>
							<form action="<?= site_url('front/kontak/kirimmasukan') ?>" class="col s12" method="POST">
								<div class="row">
									<div class="input-field col s12">
										<input type="email" class="validate" readonly name="email" value="<?= $this->session->userdata('email')?>">
										<label data-error="wrong" data-success="right">Email</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<textarea id="textarea" required autofocus class="materialize-textarea" placeholder="Masukan, kritik dan saran anda" name="masukan"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input type="submit" value="kirim" class="form-btn">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5600.09178216648!2d109.58844134093758!3d-7.025400089047388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e701fed3ba6949f%3A0x44ae395888b82ded!2sKantor+Sekretariat+Daerah+Kabupaten+Pekalongan!5e0!3m2!1sid!2sid!4v1516677149016" allowfullscreen></iframe>
			</div>
		</div>
		<!--END CONTACT US SECTION-->
<?php } ?>

<?php if ($content == 'profil') { ?>
	<!--DASlbOARD SECTION-->
		<div class="db-cent col-md-12">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="db-profile">
				<center>
					<img class="materialboxed" <?php
	                        if ($this->session->userdata('foto') == "") {
	                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
	                        }else{
	                            echo "src='".base_url()."files/user/source/".$this->session->userdata('foto')."'";
	                        }
	                    ?> alt="<?= $this->session->userdata('foto') ?>" />
				</center>
				<h4><?= $this->session->userdata('nama_user')?></h4>
				<p><?= $this->session->userdata('alamat') ?></p>
			</div>

			<div class="db-profile-view">
				<table>
					<thead>
						<tr>
							<th>Aduan</th>
							<th>Level</th>
							<th>Bergabung</th>
							<th>Kiriman</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>32</td>
							<td>Citizen</td>
							<td><?= $this->session->userdata('dibuat') ?></td>
							<td><a href="<?= site_url('aduan-saya')?>" class="waves-effect waves-light event-regi">Lihat aduan saya</a></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="db-profile-edit">
				<form class="col s12" method="POST" action="#">
					<div>
						<label class="col s4">No. KTP</label>
						<div class="input-field col s8">
							<input type="number" value="<?= $this->session->userdata('no_ktp') ?>" class="validate">
						</div>
					</div>
					<div>
						<label class="col s4">Nama Lengkap</label>
						<div class="input-field col s8">
							<input type="text" value="<?= $this->session->userdata('nama_user') ?>" class="validate">
						</div>
					</div>
					<div>
						<label class="col s4">Password</label>
						<div class="input-field col s8">
							<input type="password" value="<?= $this->session->userdata('password') ?>" class="validate">
						</div>
					</div>
					<div>
						<label class="col s4">Jenis Kelamin</label>
						<div class="input-field col s8">
							<select>
								<option>Laki - Laki</option>
								<option>Perempuan</option>
							</select>
						</div>
					</div>
					<div>
						<label class="col s4">Tempat Lahir</label>
						<div class="input-field col s8">
							<input type="text" value="<?= $this->session->userdata('tmp_lahir') ?>" class="validate">
						</div>
					</div>
					<div>
						<label class="col s4">Tanggal Lahir</label>
						<div class="input-field col s8">
							<input type="text" id="from" name="from" value="<?= $this->session->userdata('tgl_lahir') ?>">
						</div>
					</div>
					<div>
						<label class="col s4">Email</label>
						<div class="input-field col s8">
							<input type="email" value="<?= $this->session->userdata('email') ?>" class="validate">
						</div>
					</div>
					<div>
						<label class="col s4">No. Telepon</label>
						<div class="input-field col s8">
							<input type="text" value="<?= $this->session->userdata('no_telepon') ?>" class="validate">
						</div>
					</div>
					<div>
						<div class="file-field input-field">
							<div class="btn" id="pro-file-upload"> <span>Foto</span>
								<input type="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Unggah Foto Profil">
							</div>
						</div>
					</div>
					<div>
						<label class="col s4">Alamat</label>
						<div class="input-field col s8">
							<input type="text" value="<?= $this->session->userdata('alamat') ?>" class="validate">
						</div>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="submit" value="Perbarui data" class="waves-effect waves-light pro-sub-btn" id="pro-sub-btn">
						</div>
					</div>
				</form>
			</div>
		</div>
	<!--END DASlbOARD SECTION-->
<?php } ?>

<?php if ($content == 'lihat-aduan-saya') { ?>
	<!--DASlbOARD SECTION-->
		<div class="db-cent col-md-12">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="page-head">
				<h2>Aduan Saya</h2>
				<div class="head-title">
					<div class="hl-1"></div>
					<div class="hl-2"></div>
					<div class="hl-3"></div>
				</div>
			</div>
				<div class="container-fluid">
					<div class="row">
						<!--TYPOGRAPHY SECTION-->
						<div class="col-md-4">
							<div class="db-profile">
								<center>
									<img src="<?= base_url() ?>asset/fe/images/no-image-male-no-frame.png" alt="" class="materialboxed">
								</center>
								<h4>Qomariyah</h4>
								<p>Bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio bio</p>
							</div>
						</div>
						<div class="col-md-8">
							<div class="head-typo typo-com">
								<!--<h2>Aduan Saya</h2>-->
								<!--EVENT-->
								<div class="aminities">
									<ul>
										<?php for($i = 0; $i < 4; $i++) { ?>
											<li class="aminities-line"> <i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="row amini-body">
													<div class="col-md-4"> <img class="materialboxed" src="<?= base_url() ?>asset/fe/images/no-image.png" alt="" /> </div>
													<div class="col-md-8">
														<h4><a href="<?= site_url('detail-aduan') ?>">Nama Pengirim</a> <span>19th January, 2017</span></h4>
														<p>It is a  Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' wills still in their infancy. long established fact that a reader will be distracted by the readable ... <a href="<?= site_url('detail-aduan')?>"> Selengkapnya</a></p>
													</div>
												</div>
											</li>
										<?php } ?>
									</ul>
								</div>
								<!--END EVENT-->
							</div>
						</div>
						<!--END TYPOGRAPHY SECTION-->
					</div>
				</div>

		</div>
	<!--END DASlbOARD SECTION-->
<?php } ?>

<?php if ($content == 'detail-aduan') { ?>
		<!--TOP BANNER-->
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4>Detail Aduan</h4>
					<p>Detail aduan yang telah masyarakat kirimkan.<p>
							<ul>
								<li><a href="<?= site_url() ?>">Beranda</a>
								</li>
								<li><a href="#">Aduan</a>
								</li>
								<li class="active"><a href="#">Detail Aduan</a>
								</li>
							</ul>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
		<div class="inn-body-section pad-bot-55">
			<div class="container">
				<div class="row">
					<!--TYPOGRAPHY SECTION-->
					<?php foreach ($aduan as $data) { ?>
						<?php if ($data->lampiran != '') { ?>
							<div class="col-md-4">
								<div class="gall-grid">
										<img data-caption="Caption foto aduan" src="<?= base_url() ?>files/aduan/source/<?= $data->lampiran ?>" class="materialboxed" alt="Foto Aduan" />
								</div>
							</div>
						<?php } ?>
					<div class="col-md-8
					<?php if ($data->lampiran != ''){
							echo "";
						}else{
							echo "col-md-offset-2";
						} ?>">
						<div class="head-typo typo-com">
							<div class="room-rat-img">
								<?php if ($data->foto != "") { ?>
									<img class="materialboxed" data-caption="<?= p($data->nama_user) ?>" width="50px" height="50px" src="<?= base_url() ?>files/user/thumb/<?= $data->thumb ?>" alt="<?= p($data->nama_user)." ".$data->jmladuan ?>">
								<?php } else { ?>
									<img class="materialboxed" width="50px" height="50px" src="<?= base_url() ?>asset/fe/images/no-image-male-no-frame.png" alt="<?= p($data->nama_user)." ".$data->jmladuan ?>">
								<?php } ?>
								<h2>
									<?= p($data->nama_user) ?> 
									<small><?= $data->jmladuan ?></small>
									<small><?= time_ago($data->tanggal) ?></small> &nbsp; 
									<?php
										if ($data->status == "masuk") {
	                                       echo "<label class='label label-masuk'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "diverifikasi"){
	                                        echo "<label class='label label-info'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "didisposisikan"){
	                                        echo "<label class='label label-yellow'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "penanganan"){
	                                        echo "<label class='label label-warning'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "sampah"){
	                                        echo "<label class='label label-sampah'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "bukan kewenangan"){
	                                        echo "<label class='label label-danger'><b style='color:white'>".$data->status."</b></label>";
	                                    }elseif($data->status == "selesai"){
	                                        echo "<label class='label label-success'><b style='color:white'>".$data->status."</b></label>";
	                                    }
									?>
								</h2>
							</div>
							<p style="font-size: 20px"><?= $data->aduan ?></p>
							<!--EVENT-->
							<div class="aminities">
								<ul>
									<?php foreach ($komentar as $key) { ?>
									<li class="aminities-line"> <i class="fa fa-clock-o" aria-hidden="true"></i>
										<div class="room-rat-img">
											<img class="materialboxed" width="30px" height="30px"
		                                    <?php
		                                        if (!empty($key->id_admin)) {
		                                            if (!empty($key->foto_admin)) {
		                                                echo "src='".base_url()."files/administrator/thumb/".$key->foto_admin."'";
		                                            }else{
		                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
		                                            }
		                                        }elseif (!empty($key->id_opd)){
		                                            if (!empty($key->foto_opd)) {
		                                                echo "src='".base_url()."files/opd/thumb/".$key->foto_opd."'";
		                                            }else{
		                                                echo "src='".base_url()."asset/fe/images/no-image.png'" ;
		                                            }
		                                        }elseif (!empty($key->id_user)) {
		                                            if (!empty($key->foto_user)) {
		                                                echo "src='".base_url()."files/user/thumb/".$key->foto_user."'";
		                                            }else{
		                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
		                                            }
		                                        }
		                                    ?>>
											<h5>
												<?php
			                                        if (!empty($key->id_admin)) {
			                                        	if ($key->id_admin == 'ADM004') {
				                                            echo "Bupati Kab. Pekalongan";
				                                        }else{
			                                            	echo "Admin Lapor Bupati";
			                                        	}
			                                        }elseif (!empty($key->id_opd)){
			                                            echo $key->singkatan;
			                                        }elseif (!empty($key->id_user)) {
			                                            echo $key->nama_user;
			                                        }
			                                    ?>
			                                    <small>
			                                    	<?php
				                                    if (!empty($key->id_admin)) {
				                                        
				                                    }elseif (!empty($key->id_opd)){
				                                        
				                                    }elseif (!empty($key->id_user)) {

				                                    }
				                                ?>
			                                    </small>
												<small><?= time_ago($key->tanggal) ?></small>
												<?php if ($key->id_user == $this->session->userdata('id_user')) { ?>
													<div class="pull-right">
														<a href="<?= site_url('front/komentar/delete/'.$key->id_komentar.'/'.$this->uri->segment(3)) ?>"><span class="fa fa-trash-o"></span></a>&nbsp;&nbsp;
														<a href="#"><span class="fa fa-pencil"></span></a>
													</div>
												<?php } ?>
											</h5>
										</div>
										<p><?= $key->komentar ?>.</p>
									</li>
									<?php } ?>
								</ul>
							</div>
							<?php if ($this->session->userdata('code') == 'loginuserberhasil') {
								if ($data->status != 'selesai') { ?>
								<form method="POST" action="<?= site_url('front/komentar/tambah') ?>">
									<div class="input-field col s9">
										<textarea class="materialize-textarea" name="komentar" required placeholder="Tulis Komentar..."></textarea>
									</div>
									<div class="input-field col s2">
										<input type="hidden" name="uri" value="<?= $this->uri->segment(2) ?>">
										<input type="hidden" name="id_aduan" value="<?= $data->id_aduan ?>">
										<input type="hidden" name="id_user" value="<?= $this->session->userdata('id_user'); ?>">
										<input class="waves-effect waves-light form-btn" type="submit" value="KIRIM">
									</div>
									<div class="file-field input-field col s9">
										<div class="btn" id="pro-file-upload"> <span>File</span>
											<input type="file" name="lampiran">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path" type="text" placeholder="Lampirkan Foto">
										</div>
									</div>
							</form>
							<?php }} ?>
							<!--END EVENT-->
						</div>
					<?php } ?>
					</div>
					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
<?php } ?>

<?php if ($content == 'petunjuk-dan-syarat') { ?>
	<div class="inn-banner">
		<div class="container">
			<div class="row">
				<h4>Petunjuk &amp; Syarat</h4>
				<p>Petunjuk dan syarat penggunaan Lapor Bupati.</p>
				<p> </p>
				<ul>
					<li><a href="<?= site_url() ?>">Home</a>
					</li>
					<li><a href="<?= site_url('petunjuk_syarat') ?>">Petunjuk &amp; Syarat</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="hom-com">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="hp-section">
							<div class="hp-over">
								<ul class="nav nav-tabs hp-over-nav">
									<li class="active">
										<a data-toggle="tab" href="#menu1"><img src="<?= base_url() ?>asset/fe/images/icon/syarat.png" alt=""> <span class="tab-hide">Petunjuk &amp; Syarat</span>
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#menu2"><img src="<?= base_url() ?>asset/fe/images/icon/faq.png" alt=""> <span class="tab-hide">FAQs</span>
										</a>
									</li>
									<li>
										<a data-toggle="tab" href="#menu3"><img src="<?= base_url() ?>asset/fe/images/icon/dasar-hukum.png" alt=""> <span class="tab-hide">Dasar Hukum</span>
										</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="menu1" class="tab-pane fade in active tab-space">
										<div class="row">
											<div class="col-md-6 hp-ov-fac"> <img src="<?= base_url() ?>asset/fe/images/hotel/1.jpg" alt=""> </div>
											<div class="col-md-6">
												<p align="justify">Untuk dapat mengirimkan pengaduan, masyarakat dapat mengunjungi website Lapor Bupati di http://www.laporbupati.pekalongankab.go.id atau dengan mengunduh aplikasi Lapor Bupati di Google Playstore.</p>

												<p align="justify">Pelapor harus membuat akun dengan mengisi form yang telah disediakan dengan mengisi data diri atau identitas yang jelas dan dapat dipertanggungjawabkan.</p>

												<p align="justify">Masyarakat dapat mengirimkan pengaduan melalui website maupun aplikasi android Lapor Bupati. Aduan akan diverifikasi oleh Administrator Lapor Bupati kemudian akan diteruskan ke Organisasi Perangkat Daerah (OPD) terkait paling lambat 5 hari setelah aduan diterima.Setiap aduan yang telah diverifikasi oleh admin akan dipublikasikan. OPD diberi waktu paling lambat 7 hari untuk menindaklanjuti aduan yang disampaikan masyarakat.</p>

												<p align="justify">Pelapor akan menerima pemberitahuan mengenai tindaklanjut dari aduan yang sudah disampaikan.</p>

												<p align="justify">Indikator warna aduan menunjukkan status tindak lanjut dari setiap aduan.<br>Biru : aduan telah diverifikasi<br>Kuning : aduan telah didisposisikan<br>Merah : aduan yang bukan kewenangan Pemerintah Kabupaten Pekalongan<br>Hijau : aduan telah selesai ditangani</p>

												<p align="justify">Substansi dari aduan yang dikirmkan berkaitan dengan pembangunan daerah, pelayanan publik yang merupakan kewenangan Pemerintah Kabupaten Pekalongan.</p>

												<p align="justify">Pembatasan pada Penggunaan Anda <br>Anda diperbolehkan untuk mengakses layanan untuk penggunaan pribadi dengan tunduk pada ketentuan kami ubah atau perbarui dari waktu ke waktu. Anda dilarang untuk :<br>a. Menggunakan layanan untuk tujuan melawan hukum;
													<br>b. Menggunakan layanan untuk memposting atau mengomunikasikan materi materi yang berisi hal-hal yang melanggar hukum, melecehkan, memfitnah, melanggar privasi, kasar, membahayakan, vulgar, mengandung pornografi, cabul, tidak senonoh, rahasia, tertutup atau pantas dipertanyakan. Material apapun yang bersifat komersial. Materi yang menyalahi, mengambil alih secara tidak sah atau melanggar hak cipta, merek dagang, hak paten, atau hak kepemilikan apapun dari pihak ketiga manapun. Materi yang dapat menimbulkan keresahan di masyarakat dan bersifat SARA;
													<br>c. Menggunakan layanan untuk kepentingan komersial;
													<br>d. Memposting tautan ke website eksternal yang tidak senonoh dan mengandung  pornografi ataupun memposting atau mengkounikasikan iklan komersial, surat berantai, tawaran pekerjaan, atau iklan baris atau iklan pribadi;
													<br>e. Menggunakan layanan untuk menyediakan materi yang mengandung virus atau fitur lainnya yang mencemari atau merusak;
													<br>f. Menipu atau menyalin dalam bentuk apapun yang berkenaan dengan layanan yang ditawarkan.
													<br>g. Membuat sebuah atau memberikan sebuah informasi lainnya dengan alasa palsu, dengan informasi yang salah atau tidak lengkap, atau menyestkan orang lain.
													<br>h. Menggunakan aplikasi dan website Lapor Bupati secara bertentangan dengan perjanjian lain yang anda punya, termasuk tanpa batasan, perjanjian kerja.
													<br>i. Menyebabkan, memungkinkan, atau membantu orang lain untuk menggunakan akun anda atau berkedok sebagai anda, atau akun yang anda tidak diijinkan untuk mengakses.
													<br>j. Memalsukan username, memanipulasi pengidentifikasi, atau meniru orang lain atau mengaburkan identitas anda atau afiliasi anda dengan orang atau identitas tertentu.
													<br>k. Meniru atau memalsukan penggunaan aplikasi Lapor Bupati.
													<br>l. Merusak, atau mencoba mengganggu fungsi, operasi, atau keamanan dari Lapor Bupati, termasuk, namun tidak terbatas pada memperkenalkan virus, worm, Trojan horse, atau kode berbahaya lainnya yang serupa ke dalam layanan Lapor Bupati atau sistem yang berhubungan dengan jaringan, atau apabila ada pelanggaran keamanan, otentikasi atau aturan penggunaan materi atau tindakan, atau overloading, flooding, spamming, mail bombing, pinging atau crashing layanan Lapor Bupati.
													<br>m. Mengumpulkan alamat email atau informasi kontak lainnya dari pengguna lain atau klien dari Lapor Bupati dengan cara elektronik lainnya.
													<br>n. Melakukan reverse engineering, decompling, disassembling, deciphering, atau mencoba untuk memperoleh source code untuk setiap kekayaan intelektual yang digunakan untuk menyediakan Lapor Bupati.
													<br>o. Terlibat framing, mirroring, atau mensimulasikan tampilan atau fungsi dari Lapor Bupati.</p>
											</div>
										</div>
									</div>
									<div id="menu2" class="tab-pane fade tab-space">
										<ul class="collapsible popout" data-collapsible="accordion">
											<li>
												<div class="collapsible-header">Bagaimana cara menggunakan Lapor Bupati?</div>
												<div class="collapsible-body"><span>Kunjungi website Lapor Bupati di http://www.laporbupati.pekalongankab.go.id atau dapat mengunduhnya di Google Playstore.</span>
												</div>
											</li>
											<li>
												<div class="collapsible-header">Bagaimana alur sistem Lapor Bupati?</div>
												<div class="collapsible-body"><span>Gambar Alur Lapor Bupati</span>
												</div>
											</li>
											<li>
												<div class="collapsible-header">Bagaimana cara membuat aduan pada Lapor Bupati?</div>
												<div class="collapsible-body"><span>- Uraikanlah aduan secara jelas, lengkap, dan kronologis.<br>- Gunakan bahasa Indonesia yang baik dan benar.<br>- Lampirkan bukti pendukung seperti foto.<br>- Substansi dari aduan berkaitan dengan pembangunan daerah dan pelayanan publik yang menjadi kewenangan Pemerintah Kabupaten Pekalongan.</span>
												</div>
											</li>
											<li>
												<div class="collapsible-header">Apakah identitas dari pelapor dapat terjaga kemanannya ketika menyampaikan aduan?</div>
												<div class="collapsible-body"><span>Terdapat fitur Aduan Rahasia yang dapat digunakan oleh pelapor untuk melindung identitas ketika mengirimkan aduan. Dengan menggunakan fitur aduan rahasia, aduan yang disampaikan tidak akan dipublikasikan. Aduan hanya dilihat oleh pelapor, administrator, dan instansi yang berkaitan.</span>
												</div>
											</li>
											<li>
												<div class="collapsible-header">Bagaimana cara agar aduan yang disampaikan dapat segera diverifikasi?</div>
												<div class="collapsible-body"><span>Aduan yang telah dikirimkan akan diverifikasi oleh admin paling lambat 5 hari setelah dikirmkannya aduan. Pastikan bahwa aduan yang disampaikan mempunyai substansi yang jelas memuat informasi 5W + 1H (what, where, when, who, why, how) secara lengkap.</span>
												</div>
											</li>
										</ul>
									</div>
									<div id="menu3" class="tab-pane fade tab-space">
										<p>Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik.</p>
										<p>Peraturan Pemerintah Nomor 96 Tahun 2012 tentang Pelaksanaan Undang-Undang Nomor 25 Tahun 2009 tentang Pelayanan Publik.</p>
										<p>Peraturan Presiden Nomor 76 Tahun 2013 tentang Pengelolaan Pengaduan Pelayanan Publik.</p>
										<p>Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
										<p>Peraturan Pemerintah Nomor 61 Tahun 2010 tentang Pelaksanaan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'data-opd') { ?>
	<!--TOP SECTION-->
		<!--TOP BANNER-->
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4><?= $judul; ?></h4>
					<p>Informasi mengenai Organisasi Perangkat Daerah (OPD) yang terdapat di Kabupaten Pekalongan.<p>
					<ul>
						<li><a href="<?= site_url() ?>">Home</a>
						</li>
						<li><a href="<?= site_url('data-opd') ?>"><?= $breadcrumb; ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--TOP SECTION-->
		<div class="inn-body-section pad-bot-55">
			<div class="container">
				<div class="row">
					<div class="page-head">
						<h2><?= $judul; ?></h2>
						<div class="head-title">
							<div class="hl-1"></div>
							<div class="hl-2"></div>
							<div class="hl-3"></div>
						</div>
						<p>Informasi mengenai Organisasi Perangkat Daerah (OPD) yang terdapat di Kabupaten Pekalongan.</p>
					</div>
					<!--TYPOGRAPHY SECTION-->
					<div class="col-md-12">
						<div class="head-typo typo-com">
							<!--EVENT-->
							<?php foreach ($data_opd as $row) { ?>
							<div class="row events">
								<div class="col-md-2"> <img <?php
                                            if ($row->foto == "") {
                                                echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                            }else{
                                                echo "src='".base_url()."files/opd/thumb/".$row->thumb."'";
                                            }
                                        ?> alt="<?= $row->foto ?>" />
                                </div>
								<div class="col-md-8">
									<h4><?= $row->nama_opd; ?></h4> <span><?= $row->alamat; ?></span>
									<p>Telepon : <?= $row->no_telp;?> &nbsp; Email : <?= $row->email; ?></p>
								</div>
								<div class="col-md-2"> <a href="<?= site_url('opd/detail/'.$row->id_opd) ?>" class="waves-effect waves-light event-regi">Selengkapnya</a> </div>
							</div>
							<!--END EVENT-->
							<?php } ?>
							<br>
							<center>
								<?= $link_opd; ?>
							</center>
						</div>
					</div>
					<!--END TYPOGRAPHY SECTION-->
				</div>
			</div>
		</div>
	<!--TOP SECTION-->
<?php } ?>

<?php if ($content == 'detail-opd') { ?>
	<!--ABOUT SECTION-->
	<?php foreach ($detailopd as $row) { ?>
		<div class="inn-banner">
			<div class="container">
				<div class="row">
					<h4><?= $row['nama_opd'] ?></h4>
					<p> </p>
					<ul>
						<li><a href="<?= site_url() ?>">Home</a>
						</li>
						<li><a href="<?= site_url('opd')?>">Informasi OPD</a>
						</li>
						<li><a href="#"><?= $row['singkatan'] ?></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="inn-body-section">
			<div class="container">
				<div class="row">
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="about-right">
							<img <?php
                                if ($row['foto']== "") {
                                    echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                }else{
                                    echo "src='".base_url()."files/opd/source/".$row['foto']."'";
                                }
                            ?> alt="<?= $row['foto'] ?>" class="materialboxed" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="about-left">
							<h4><?= $row['nama_opd'] ?></h4>

							<p align="justify"><?= $row['deskripsi'] ?></p>

							<a href="#" class="link-btn">Kontak: <?= $row['no_telp'] ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<!--END ABOUT SECTION-->
<?php } ?>

<?php if ($content == 'login') { ?>
	<!--DASlbOARD SECTION-->
		<div class="db-cent col-md-6 col-md-offset-3">
			<br>
			<br>
			<div class="db-profile-edit">
				<h3>Login untuk melanjutkan mengirim aduan</h3>
				<form class="col s12" method="POST" action="<?= site_url('auth') ?>">
					<div>
						<label class="col s4">Email atau No. Telepon</label>
						<div class="input-field col s8">
							<input type="text" name="email" required placeholder="contoh : erik@gmail.com atau 08151081xxxx" class="validate"> </div>
					</div>
					<div>
						<label class="col s4">Kata Sandi</label>
						<div class="input-field col s8">
							<input type="password" name="pass" required placeholder="Kata Sandi" class="validate"> </div>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="submit" value="Masuk" class="col-md-6 waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
							<input type="reset" class="col-md-6 waves-effect waves-light pro-sub-btn-red" value="Batal" id="pro-sub-btn-red">
					</div>
					<div class="input-field s12"> <a href="<?= site_url('lupa-sandi') ?>">Lupa kata sandi? </a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?= site_url('daftar') ?>" > Belum punya akun?</a> </div>
				</form>
			</div>
		</div>
	<!--END DASlbOARD SECTION-->
<?php } ?>

<?php if ($content == 'forget-password') { ?>
	<!--DASlbOARD SECTION-->
		<div class="db-cent col-md-6 col-md-offset-3">
			<br>
			<br>
			<div class="db-profile-edit">
				<h3>Masukkan email yang sudah terdaftar</h3>
				<form class="col s12">
					<div>
						<label class="col s4">Email</label>
						<div class="input-field col s8">
							<input type="email" placeholder="contoh : erik@gmail.com" class="validate"> </div>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="submit" value="Masuk" class="col-md-6 waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
							<input type="reset" class="col-md-6 waves-effect waves-light pro-sub-btn-red" value="Batal" id="pro-sub-btn-red">
					</div>
					<div class="input-field s12"><a href="<?= site_url('daftar') ?>" > Belum punya akun?</a> </div>
				</form>
			</div>
		</div>
	<!--END DASlbOARD SECTION-->
<?php } ?>

<?php if ($content == 'register') { ?>
	<!--DASlbOARD SECTION-->
		<div class="db-cent col-md-8 col-md-offset-2">
			<br>
			<br>
			<div class="db-profile-edit">
				<h3>Daftar dan ikut serta dalam pembangunan Kabupaten Pekalongan</h3>
				<form class="col s12">
					<div>
						<label class="col s4">NO. KTP</label>
						<div class="input-field col s8">
							<input type="number" placeholder="contoh : 12345678901234" class="validate"> </div>
					</div>
					<div>
						<label class="col s4">Nama Lengkap</label>
						<div class="input-field col s8">
							<input type="text" placeholder="Contoh : Erik Wibowo" class="validate"> </div>
					</div>
					<div>
						<label class="col s4">No. Telepon</label>
						<div class="input-field col s8">
							<input type="number" placeholder="contoh : 081510815414" class="validate"> </div>
					</div>
					<div>
						<label class="col s4">Email</label>
						<div class="input-field col s8">
							<input type="email" placeholder="erik@gmail.com" class="validate"> </div>
					</div>
					<div>
						<label class="col s4">Kata Sandi</label>
						<div class="input-field col s8">
							<input type="password" placeholder="Kata Sandi" class="validate"> </div>
					</div>
					<div>
						<div class="input-field col s8">
							<input type="submit" value="Daftar" class="col-md-6 waves-effect waves-light pro-sub-btn" id="pro-sub-btn"> </div>
							<input type="reset" class="col-md-6 waves-effect waves-light pro-sub-btn-red" value="Batal" id="pro-sub-btn-red">
					</div>
					<div class="input-field s12"> <a href="<?= site_url('lupa-sandi') ?>">Lupa kata sandi? </a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="<?= site_url('login') ?>" > Sudah punya akun?</a> </div>
				</form>
			</div>
		</div>
	<!--END DASlbOARD SECTION-->
<?php } ?>