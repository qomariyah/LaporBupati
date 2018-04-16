<?php if ($content == 'detail-opd') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START SUCCESS PANEL -->
            <?php foreach ($detailopd as $row) { ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center"><?= $row['nama_opd'] ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <img <?php
                                if ($row['foto'] == "") {
                                    echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                }else{
                                    echo "src='".base_url()."files/opd/thumb/".$row['thumb']."'";
                                }
                            ?>" class="img-text post-image"/> 
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="contact-info">
                                <p><small>Nama OPD</small><br/><?= $row['nama_opd'] ?> (<?=$row['singkatan']?>)</p>
                                <p><small>Nama Kepala</small><br/><?= $row['nama_kepala'] ?></p>
                                <p><small>Alamat</small><br/><?= $row['alamat'] ?></p>
                                <p><small>Telepon</small><br/><?= $row['no_telp'] ?></p>
                                <p><small>Fax.</small><br/><?= $row['fax'] ?></p>
                                <p><small>Email</small><br/><a href="<?= prep_url("mailto:".$row['email']) ?>"><?= $row['email'] ?></a></p>
                                <p><small>Website</small><br/><a href="<?= prep_url($row['website']) ?>" target="_blank"><?= $row['website'] ?></a></p>
                                <p><small>Deskripsi</small><br/><?= $row['deskripsi'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="panel-footer">
                    <a href="<?= site_url('lbadmin/edit_opd/'.$row['id_opd']) ?>" class="btn btn-xs btn-rounded btn-info pull-right" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengedit data">Edit</a>
                </div>                            
            </div>
            <?php } ?>            
            <!-- END SUCCESS PANEL -->    
        </div>
    </div>
<?php } ?>

<?php if ($content == 'detail-user') { ?>
<div class="row">
    <div class="col-md-12">
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <?php foreach ($detailuser as $row) { ?>
                        <div class="panel-body profile" style="background: base_url('asset/be/assets/images/gallery/music-4.jpg') center center no-repeat;">
                            <div class="profile-image">
                                <img 
                                    <?php
                                        if ($row['foto'] == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$row['thumb']."'";
                                        }
                                    ?>
                                alt="<?= $row['foto'] ?>">
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= $row['nama_user'] ?></div>
                            </div>                                    
                        </div>                                
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h4 align="center">Aduan</h4>
                                    <h3 align="center" class="text-warning">34</h3>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h4 align="center">Level</h4>
                                    <h3 align="center" class="text-warning">Rookie</h3>
                                </div>
                            </div>                                    
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="<?= site_url('lbadmin/edit_user/'.$row['id_user'])?>" class="btn btn-info btn-rounded btn-block" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengedit data"><span class="fa fa-pencil"></span> Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body list-group border-bottom">
                            <a href="#" class="list-group-item" style="text-align: center;"><?= $row['bio']?></a>
                            <a href="#" class="list-group-item"><span class="fa fa-credit-card"></span> <?= $row['no_ktp'] ?></a>
                            <a href="#" class="list-group-item"><span 
                                    class="
                                    <?php if($row['jk'] == 'L'){
                                        echo 'fa fa-male';
                                    }else{
                                        echo 'fa fa-female';
                                    } ?>"
                                    ></span> 
                                    <?php if($row['jk'] == 'L'){
                                        echo 'Laki-laki';
                                    }else{
                                        echo 'Perempuan';
                                    } ?></a>
                            <a href="#" class="list-group-item"><span class="fa fa-calendar-o"></span> <?= $row['tmp_lahir'] ?>, <?= $row['tgl_lahir']?></a>
                            <a href="#" class="list-group-item"><span class="fa fa-phone"></span> <?= $row['no_telepon'] ?></a>
                            <a href="<?= prep_url("mailto:".$row['email']) ?>" class="list-group-item"><span class="fa fa-envelope-o"></span> <?= $row['email'] ?></a>
                            <a href="#" class="list-group-item"><span class="fa fa-home"></span> <?= $row['alamat'] ?></a>
                            <a href="#" class="list-group-item" style="text-align: center;">Bergabung pada 22 November 2018</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="col-md-9">
                    <!-- START TIMELINE -->
                    <div class="timeline timeline-right">

                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">11 Jan 2018</div>
                            <div class="timeline-item-icon"><span class="fa fa-info-circle"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading padding-bottom-0">
                                    <img src="<?= base_url()?>asset/be/assets/images/users/user2.jpg"/> <a href="#">John Doe</a>
                                </div>                                        
                                <div class="timeline-body">                                                                                        
                                    <img src="<?= base_url()?>asset/be/assets/images/gallery/nature-6.jpg" width="200" class="img-text" align="left"/> 
                                    <h4>Lorem ipsum dolor</h4>
                                    <p>Aenean ultricies condimentum pellentesque. Maecenas pulvinar arcu vel tortor aliquet commodo. Phasellus dapibus nisl quis nunc pharetra, id lobortis arcu sagittis. Nunc facilisis nibh non diam dictum, vitae iaculis tellus egestas. Curabitur vitae dui tempus, tempus metus vitae, cursus nunc. In cursus odio vitae metus commodo, in posuere ante varius.</p> 
                                    <p>Mauris sodales faucibus est, eu consequat dolor tristique in. Quisque at lacus sed ligula semper iaculis. In eu imperdiet ipsum. Ut vestibulum ornare venenatis.</p>           
                                    <ul class="list-tags push-up-10">                                            
                                        <li><a href="#"><strong>#</strong>tempor</a></li>
                                        <li><a href="#"><strong>#</strong>eros</a></li>
                                        <li><a href="#"><strong>#</strong>suspendisse</a></li>
                                        <li><a href="#"><strong>#</strong>dolor</a></li>
                                    </ul>
                                </div>                
                                <div class="timeline-footer">
                                    <a href="#">Details</a>
                                    <div class="pull-right">
                                        <a href="#"><span class="fa fa-comments"></span> 35</a> 
                                        <a href="#"><span class="fa fa-eye"></span> 1,432</a>
                                    </div>
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->
                        
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info">15:21</div>
                            <div class="timeline-item-icon"><span class="fa fa-users"></span></div>                                   
                            <div class="timeline-item-content">
                                <div class="timeline-heading" style="padding-bottom: 10px;">
                                    <img src="assets/images/users/user3.jpg"/>
                                    <a href="#">Nadia Ali</a> added to friends 
                                    <img src="<?= base_url()?>asset/be/assets/images/users/user5.jpg"/>
                                    <img src="<?= base_url()?>asset/be/assets/images/users/user6.jpg"/>
                                    <img src="<?= base_url()?>asset/be/assets/images/users/user7.jpg"/>
                                </div>                                        
                                <div class="timeline-body comments">
                                    <div class="comment-item">
                                        <img src="<?= base_url()?>asset/be/assets/images/users/user6.jpg"/>
                                        <p class="comment-head">
                                            <a href="#">Darth Vader</a> <span class="text-muted">@darthvader</span>
                                        </p>
                                        <p>Hello, honey!</p>
                                        <small class="text-muted">15min ago</small>
                                    </div>       
                                    <div class="comment-write">                                                
                                        <textarea class="form-control" placeholder="Write a comment" rows="1"></textarea>
                                    </div>
                                </div>
                            </div>                                    
                        </div>       
                        <!-- END TIMELINE ITEM -->

                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-main">
                            <div class="timeline-date"><a href="#"><span class="fa fa-ellipsis-h"></span></a></div>
                        </div>                                
                        <!-- END TIMELINE ITEM -->
                    </div>
                    <!-- END TIMELINE -->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
</div>
<?php } ?>

<?php if ($content == 'detail-data-aduan') { ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <?php foreach($data_aduan as $key){ ?>
                    <div class="panel-heading">
                        <div class="pull-left">
                            <img 
                                <?php
                                    if ($key->foto == "") {
                                        echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                    }else{
                                        echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
                                    }
                                ?>
                            alt="<?= p($key->thumb) ?>" class="panel-title-image">
                            <h3 class="panel-title"><?= p($key->nama_user) ?> <small><?= time_ago($key->tanggal) ?></small></h3>
                        </div>
                        <div class="pull-right">
                            <?php 
                                if ($key->status == "masuk") {
                                   echo "<span class='badge badge-masuk'><b>".$key->status."</b></span>";
                                }elseif($key->status == "diverifikasi"){
                                    echo "<span class='badge badge-info'><b>".$key->status."</b></span>";
                                }elseif($key->status == "didisposisikan"){
                                    echo "<span class='badge badge-yellow'><b>".$key->status."</b></span>";
                                }elseif($key->status == "penanganan"){
                                    echo "<span class='badge badge-warning'><b>".$key->status."</b></span>";
                                }elseif($key->status == "sampah"){
                                    echo "<span class='badge badge-sampah'><b>".$key->status."</b></span>";
                                }elseif($key->status == "bukan kewenangan"){
                                    echo "<span class='badge badge-danger'><b>".$key->status."</b></span>";
                                }elseif($key->status == "selesai"){
                                    echo "<span class='badge badge-success'><b>".$key->status."</b></span>";
                                }
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                }
                            ?>
                            <div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-success btn-xs dropdown-toggle">Pilihan <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" data-toggle="modal" data-target="#edit<?= p($key->id_aduan) ?>">Edit Aduan</a></li>
                                    <li><a href="<?= site_url('sysadmin/aduan/verifikasi/'.$key->id_aduan.'/detail')?>">Verifikasi</a></li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#sampah<?= p($key->id_aduan) ?>">Ke tempat sampah</a>
                                    </li>                                                    
                                </ul>
                            </div>       
                            <!-- Modal sampah begin -->
                                <div class="modal" id="sampah<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Tuliskan alasan mengapa aduan ini dimasukkan ke sampah</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/sampah') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Alasan/komentar</label>
                                                            <textarea class="form-control" rows="5" name="komentar" placeholder="Tanggapan..." autofocus required></textarea>
                                                        </div>
                                                        <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                        <input type="hidden" name="id_aduan" value="<?= $key->id_aduan ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-rounded btn-success" value="Kirim">
                                                    </div>
                                                </form>        
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Modal sampah end -->  
                                <!-- Modal edit begin -->
                                <div class="modal" id="edit<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Edit aduan untuk mencegah kata-kata tidak pantas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/edit') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Isi aduan</label>
                                                            <textarea class="form-control" rows="5" name="aduan" placeholder="Tanggapan..." autofocus required><?= p($key->aduan) ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                        <input type="hidden" name="id_aduan" value="<?= $key->id_aduan ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-rounded btn-success" value="Edit">
                                                    </div>
                                                </form>        
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Modal edit end -->                                
                        </div>
                    </div>
                    <div class="panel-body">
                         <?php if (!empty($key->lampiran)) { ?>
                            <center>
                                <img class="img-responsive" src="<?= base_url() ?>/files/aduan/source/<?= $key->lampiran ?>">
                            </center>
                        <?php } ?><br>
                        <p style="font-size: 20px" align="justify">
                            <?= p($key->aduan) ?>
                        </p><br>

                        <p>
                            <?php if ($key->jmlkomen == 0) {
                                echo "Belum ada tanggapan";
                            }else{
                                echo $key->jmlkomen." tanggapan";
                            } ?>
                        </p>
                        <div class="timeline-body comments">
                            <?php foreach($data_komentar as $komen){ ?>
                                <div class="comment-item"><div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-xs dropdown-toggle"><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" data-toggle="modal" data-target="#edit<?= p($komen->id_komentar) ?>"><i class="fa fa-pencil"></i> Edit</a></li>
                                        <li>
                                            <a href="#" class="mb-control" data-box="#mb<?= p($komen->id_komentar) ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <!-- Modal delete SEKTOR -->
                                            <div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb<?= $komen->id_komentar ?>">
                                                <div class="mb-container">
                                                    <div class="mb-middle">
                                                        <div class="mb-title"><span class="fa fa-trash-o"></span> Hapus <strong>Data</strong> ?</div>
                                                        <div class="mb-content">
                                                            <p>Apakah Anda yakin akan menghapus data dari sistem?</p>                    
                                                            <p>Berhati-hatilah, data mungkin tidak bisa dikembalikan!.</p>
                                                        </div>
                                                        <div class="mb-footer">
                                                            <div class="pull-right">
                                                                <form action="<?= site_url('sysadmin/komentar/delete') ?>" method="POST">
                                                                    <input type="hidden" name="id" value="<?= $komen->id_komentar ?>">
                                                                    <input type="hidden" name="id_aduan" value="<?= $key->id_aduan ?>">
                                                                    <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                                    <input type="submit" class="btn btn-danger btn-lg" value="Ya">
                                                                    <button class="btn btn-info btn-lg mb-control-close">Tidak</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal delete SEKTOR -->
                                        </li>                                                  
                                    </ul>
                                </div>
                                <!-- Modal edit begin -->
                                <div class="modal" id="edit<?= p($komen->id_komentar) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Edit tanggapan untuk mencegah kata-kata tidak pantas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/komentar/update') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggapan</label>
                                                            <textarea class="form-control" rows="3" name="komentar" placeholder="Tanggapan..." autofocus required><?= p($komen->komentar) ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                        <input type="hidden" name="id_aduan" value="<?= $key->id_aduan ?>">
                                                        <input type="hidden" name="id_komentar" value="<?= p($komen->id_komentar) ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Lampiran</label>
                                                        <input type="file" class="form-control pull-left" name="" style="margin-top: 5px">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" style="margin-top: 10px" class="btn btn-success" value="Edit">
                                                    </div>
                                                </form>        
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Modal edit end -->      
                                    <?php
                                        if (!empty($komen->id_admin)) { ?>
                                            <img 
                                                <?php
                                                    if ($komen->foto_admin == "") {
                                                        echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                                    }else{
                                                        echo "src='".base_url()."files/administrator/thumb/".$komen->foto_admin."'";
                                                    }
                                                ?>
                                            alt="<?= p($komen->foto_admin) ?>">
                                            <p class="comment-head">
                                                <a href="#"><?= p($komen->nama_admin) ?></a> <span class="text">Administrator</span>
                                            </p>
                                    <?php }elseif (!empty($komen->id_opd)) { ?>
                                            <img 
                                                <?php
                                                    if ($komen->foto_opd == "") {
                                                        echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                                    }else{
                                                        echo "src='".base_url()."files/opd/thumb/".$komen->foto_opd."'";
                                                    }
                                                ?>
                                            alt="<?= p($komen->foto_opd) ?>">
                                            <p class="comment-head">
                                                <a href="#"><?= p($komen->singkatan) ?></a> <span class="text">Administrator</span>
                                            </p>
                                    <?php }elseif (!empty($komen->id_user)) { ?>
                                            <img 
                                                <?php
                                                    if ($komen->foto_user == "") {
                                                        echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                                    }else{
                                                        echo "src='".base_url()."files/user/thumb/".$komen->foto_user."'";
                                                    }
                                                ?>
                                            alt="<?= p($komen->foto_user) ?>">
                                            <p class="comment-head">
                                                <a href="#"><?= p($komen->singkatan) ?></a> <span class="text">Administrator</span>
                                            </p>
                                    <?php } ?>
                                    <p style="font-size: 14px; ;line-height: 20px"><?= p($komen->komentar) ?></p>
                                    <small class="text"><?= time_ago($komen->tanggal) ?></small>
                                </div>
                            <?php } ?>
                        </div>
                        <form method="POST" action="<?= site_url('sysadmin/komentar/tambah') ?>">
                            <div class="form-group push-up-20">
                                <input type="hidden" name="id" value="<?= $this->uri->segment(4) ?>">
                                <textarea class="form-control" rows="2" name="komentar" placeholder="Ketikkan tanggapan anda tentang aduan ini..." required></textarea>
                                <input type="file" class="pull-left" name="" style="margin-top: 5px">
                                <input type="submit" value="Balas" style="margin-top: 5px" class="btn btn-success pull-right">
                            </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                        </form>
                <?php } ?>
            </div> 
        </div>
    </div>
<?php } ?>

<?php if ($content == 'detail-masukan') { ?>
    <!-- START CONTENT FRAME -->
    <div class="content-frame">                                    
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-file-text"></span> <?= $breadcrumb ?></h2>
            </div>                        
        </div>
        <!-- END CONTENT FRAME TOP -->
        
        <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left">
            <div class="block">
                <div class="list-group border-bottom">
                    <a href="<?= site_url('lbadmin/masukan_hari_ini')?>" class="list-group-item"><span class="fa fa-clock-o"></span> Hari ini <span class="badge badge-success">3</span></a>
                    <a href="<?= site_url('lbadmin/masukan_bulan_ini')?>" class="list-group-item"><span class="fa fa-clock-o"></span> Bulan ini </a>
                    <a href="<?= site_url('lbadmin/masukan')?>" class="list-group-item"><span class="fa fa-dropbox"></span> Semua Masukan <span class="badge badge-success">1.4k</span></a>                            
                </div>                        
            </div>
        </div>
        <!-- END CONTENT FRAME LEFT -->
        
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="pull-left">
                        <img src="<?= base_url()?>asset/fe/images/no-image.png" class="panel-title-image" alt="John Doe"/>
                        <h3 class="panel-title">EmailPengirim@gmail.com </h3>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Tekan untuk menghapus"><span class="fa fa-trash-o"></span></button>                                    
                    </div>
                </div>
                <div class="panel-body">
                    <h4><span class="fa fa-clock-o"></span> Today, Sep 18, 14:33</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ligula risus, viverra sit amet purus id, ullamcorper venenatis leo. Ut vitae semper neque. Nunc vel lacus vel erat sodales ultricies sed sed massa. Duis non elementum velit. Nunc quis molestie dui. Nullam ullamcorper lectus in mattis volutpat. Nunc egestas felis sit amet ultrices euismod. Donec lacinia neque vel quam pharetra, non dignissim arcu semper. Donec ultricies, neque ut vehicula ultrices, ligula velit sodales purus, eget eleifend libero risus sed turpis. Fusce hendrerit vel dui ut pulvinar. Ut sed tristique ante, sed egestas turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <p>Fusce sit amet dui at nunc laoreet facilisis. Proin consequat orci sollicitudin sem cursus, quis vehicula eros ultrices. Cras fermentum justo at nibh tincidunt, consectetur elementum est aliquam.</p>
                    <p>Nam dignissim convallis nulla, vitae porta purus fringilla ac. Praesent consectetur ex eu dui efficitur sollicitudin. Mauris libero est, aliquam a diam maximus, dignissim laoreet lacus.</p>
                    <p>Nulla ac nisi sodales, auctor dui et, consequat turpis. Cras dolor turpis, sagittis vel elit in, varius elementum arcu. Mauris aliquet lorem ac enim blandit, nec consequat tortor auctor. Sed eget nunc at justo congue mollis eget a urna. Phasellus in mauris quis tortor porta tristique at a risus.</p>
                </div>
            </div>
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME -->    
<?php } ?>