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
                            <h3 class="panel-title"><a href="<?= site_url('sysadmin/user/detail/').$key->id_user ?>"><?= p($key->nama_user) ?></a> <small><?= time_ago($key->tanggal) ?></small></h3>
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
                                <a href="#" data-toggle="dropdown" class="btn btn-info btn-xs dropdown-toggle">Pilihan <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= site_url('sysadmin/aduan/verifikasi/'.p($key->id_aduan).'/detail')?>">Verifikasi</a></li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#ubah<?= p($key->id_aduan) ?>">Ubah status</a>
                                    </li>                                                    
                                </ul>
                            </div>       
                            <!-- Modal sampah begin -->
                                <div class="modal" id="ubah<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Ubah status aduan</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysopd/aduan/status') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Pilih status aduan</label>
                                                            <select name="status" class="form-control select" required data-live-search="true">
                                                                <option value="penanganan">Penanganan</option>
                                                                <option value="selesai">Selesai</option>
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                        <input type="hidden" name="id_aduan" value="<?= p($key->id_aduan) ?>">
                                                        <input type="hidden" name="id_opd" value="<?= $this->session->userdata('id_opd') ?>">
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
                        </div>
                    </div>
                    <div class="panel-body">
                         <?php if (!empty($key->lampiran)) { ?>
                            <center>
                                <img class="img-responsive" src="<?= base_url() ?>/files/aduan/source/<?= p($key->lampiran) ?>">
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
                            <div class="comment-item">
                                <?php if ($komen->id_opd == $this->session->userdata('id_opd')) { ?>
                                    <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-xs"><span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#" data-toggle="modal" data-target="#edit<?= p($komen->id_komentar) ?>"><i class="fa fa-pencil"></i> Edit</a></li>
                                        <li>
                                            <a href="#" class="mb-control" data-box="#mb<?= p($komen->id_komentar) ?>"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <!-- Modal delete SEKTOR -->
                                            <div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb<?= p($komen->id_komentar) ?>">
                                                <div class="mb-container">
                                                    <div class="mb-middle">
                                                        <div class="mb-title"><span class="fa fa-trash-o"></span> Hapus <strong>Data</strong> ?</div>
                                                        <div class="mb-content">
                                                            <p>Apakah Anda yakin akan menghapus data dari sistem?</p>                    
                                                            <p>Berhati-hatilah, data mungkin tidak bisa dikembalikan!.</p>
                                                        </div>
                                                        <div class="mb-footer">
                                                            <div class="pull-right">
                                                                <form action="<?= site_url('sysopd/komentar/delete') ?>" method="POST">
                                                                    <input type="hidden" name="id" value="<?= p($komen->id_komentar) ?>">
                                                                    <input type="hidden" name="id_aduan" value="<?= p($key->id_aduan) ?>">
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
                                <?php } ?>
                                <!-- Modal edit begin -->
                                <div class="modal" id="edit<?= p($komen->id_komentar) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Edit tanggapan untuk mencegah kata-kata tidak pantas</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysopd/komentar/update') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggapan</label>
                                                            <textarea class="form-control" rows="3" name="komentar" placeholder="Tanggapan..." autofocus required style="resize: none"><?= p($komen->komentar) ?></textarea>
                                                        </div>
                                                        <input type="hidden" name="uri" value="<?= $this->uri->segment(3) ?>">
                                                        <input type="hidden" name="id_aduan" value="<?= p($key->id_aduan) ?>">
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
                                                <a href="#"><?= p($komen->singkatan) ?></a> <span class="text">Admin OPD</span>
                                            </p>
                                    <?php }elseif ($komen->id_user != 0) { ?>
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
                                                <a href="#"><?= p($komen->nama_user) ?></a> <span class="text">User</span>
                                            </p>
                                    <?php } ?>
                                    <p style="font-size: 14px; ;line-height: 20px"><?= p($komen->komentar) ?></p>
                                    <small class="text"><?= time_ago($komen->tanggal) ?></small>
                                </div>
                            <?php } ?>
                        </div>
                        <form method="POST" action="<?= site_url('sysopd/komentar/tambah') ?>">
                            <div class="form-group push-up-20">
                                <input type="hidden" name="id" value="<?= $this->uri->segment(4) ?>">
                                <textarea class="form-control" rows="2" name="komentar" placeholder="Ketikkan tanggapan anda tentang aduan ini..." required style="resize: none"></textarea>
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