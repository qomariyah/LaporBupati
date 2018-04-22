<?php if ($this->session->userdata('level') == 'Bupati') { ?>
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?= site_url('sysbupati') ?>">Lapor Bupati</a>
                <a href="<?= site_url('sysbupati') ?>" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="<?= base_url()?>asset/be/#" class="profile-mini">
                    <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="<?= $this->session->userdata('nama_admin'); ?>"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="<?= $this->session->userdata('nama_admin'); ?>"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?= $this->session->userdata('nama_admin'); ?></div>
                        <div class="profile-data-title"><?= $this->session->userdata('level'); ?></div>
                    </div>
                    <div class="profile-controls">
                        <a href="<?= base_url()?>asset/be/pages-profile.html" data-toggle="tooltip" data-placement="top" title="Info Administrator" class="profile-control-left"><span class="fa fa-info"></span></a>
                        <a href="<?= base_url()?>asset/be/pages-messages.html" data-toggle="tooltip" data-placement="top" title="Pesan" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                    </div>
                </div>                                                                        
            </li>
            <li class="<?= @$Dashboard ?>">
                <a href="<?= site_url('sysbupati')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>            
            <?php
                $hari_ini = $this->maduan->rowAduanHariIni(date('Y-m-d'))->num_rows();
                $masuk = $this->maduan->jmlAduanStatus("masuk")->num_rows();
                $diverifikasi = $this->maduan->jmlAduanStatus("diverifikasi")->num_rows();
                $disposisi = $this->maduan->rowAduanDisposisi()->num_rows();
                $penanganan = $this->maduan->jmlAduanStatus("penanganan")->num_rows();
                $selesai = $this->maduan->jmlAduanStatus("selesai")->num_rows();
                $bukankewenangan = $this->maduan->jmlAduanStatus("bukan kewenangan")->num_rows();
                $sampah = $this->maduan->jmlAduanStatus("sampah")->num_rows();
                $semua = $this->maduan->rowAduanSemua()->num_rows();
                $rahasia = $this->maduan->rowAduanRahasia()->num_rows();

            ?>  
            <li class="xn-openable <?= @$Aduan ?>">
                <a href="#"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
                <ul>
                    <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('sysbupati/aduan/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info"><?= $hari_ini ?></span></a></li>
                    <li class="<?= @$aduan_masuk ?>"><a href="<?= site_url('sysbupati/aduan/masuk')?>"><span class="fa fa-arrow-down"></span> Masuk<span class="pull-right badge badge-danger"><?= $masuk ?></span></a></li>
                    <li class="<?= @$aduan_diverifikasi ?>"><a href="<?= site_url('sysbupati/aduan/diverifikasi')?>"><span class="fa fa-check-square-o"></span> Diverifikasi<span class="pull-right badge badge-danger"><?= $diverifikasi ?></span></a></li>
                    <li class="<?= @$aduan_didisposiskan ?>"><a href="<?= site_url('sysbupati/aduan/didisposiskan')?>"><span class="fa fa-arrow-right"></span> Didisposisikan<span class="pull-right badge badge-warning"><?= $disposisi ?></span></a></li>
                    <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('sysbupati/aduan/penanganan')?>"><span class="fa fa-spinner"></span> Penanganan<span class="pull-right badge badge-warning"><?= $penanganan ?></span></a></li>
                    <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('sysbupati/aduan/selesai')?>"><span class="fa fa-check"></span> Selesai<span class="pull-right badge badge-success"><?= $selesai ?></span></a></li>
                    <li class="<?= @$aduan_bukan_kewenangan ?>"><a href="<?= site_url('sysbupati/aduan/bukan-kewenangan')?>"><span class="fa fa-warning"></span> <span class="pull-right badge badge-danger"><?= $bukankewenangan ?></span>Bukan Kewenangan</a></li>
                    <li class="<?= @$aduan_tempat_sampah ?>"><a href="<?= site_url('sysbupati/aduan/sampah')?>"><span class="fa fa-trash-o"></span> <span class="pull-right badge badge-danger"><?= $sampah ?></span>Sampah</a></li> <li class="<?= @$aduan_rahasia ?>"><a href="<?= site_url('sysbupati/aduan/rahasia')?>"><span class="fa fa-lock"></span> <span class="pull-right badge badge-danger"><?= $rahasia ?></span>Rahasia</a></li>
                    <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('sysbupati/aduan/semua')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-success"><?= $semua ?></span></a></li>
                </ul>
            </li>        
            <li class="xn-openable <?= @$Laporan ?>">
                <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
                <ul>
                    <li class="<?= @$laporan_hari_ini ?>"><a href="<?= site_url('sysbupati/laporan')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                    <li><a href="<?= site_url('sysbupati/laporan/bulanan')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysbupati/laporan/tahunan')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysbupati/laporan/semua')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
                </ul>
            </li> 
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
<?php } ?>