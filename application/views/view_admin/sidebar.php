<?php if ($this->session->userdata('level') == 'Super Admin') { ?>
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?= site_url('sysadmin') ?>">Lapor Bupati</a>
                <a href="<?= site_url('sysadmin') ?>" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="<?= base_url()?>asset/be/#" class="profile-mini">
                    <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="<?= $this->session->userdata('nama_admin'); ?>"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="John Doe"/>
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
                <a href="<?= site_url('sysadmin')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>            
            <?php
                $hari_ini = $this->maduan->aduanHariIni(date('Y-m-d'))->num_rows();
                $masuk = $this->maduan->aduanMasuk()->num_rows();
                $diverifikasi = $this->maduan->aduanDiverifikasi()->num_rows();

            ?>  
            <li class="xn-openable <?= @$Aduan ?>">
                <a href="<?= site_url('sysadmin/aduan_diterima')?>"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
                <ul>
                    <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('sysadmin/aduan/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info"><?= $hari_ini ?></span></a></li>
                    <li class="<?= @$aduan_masuk ?>"><a href="<?= site_url('sysadmin/aduan/masuk')?>"><span class="fa fa-download"></span> Masuk<span class="pull-right badge badge-danger"><?= $masuk ?></span></a></li>
                    <li class="<?= @$aduan_diverifikasi ?>"><a href="<?= site_url('sysadmin/aduan/diverifikasi')?>"><span class="fa fa-download"></span> Diverivikasi<span class="pull-right badge badge-danger"><?= $diverifikasi ?></span></a></li>
                    <li class="<?= @$aduan_didisposiskan ?>"><a href="<?= site_url('sysadmin/aduan/didisposiskan')?>"><span class="fa fa-upload"></span> Didisposisikan<span class="pull-right badge badge-warning">14</span></a></li>
                    <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('sysadmin/aduan/penanganan')?>"><span class="fa fa-cogs"></span> Dalam Penanganan<span class="pull-right badge badge-warning">14</span></a></li>
                    <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('sysadmin/aduan/selesai')?>"><span class="fa fa-check"></span> Sudah Selesai<span class="pull-right badge badge-success">14</span></a></li>
                    <li class="<?= @$aduan_bukan_kewenangan ?>"><a href="<?= site_url('sysadmin/aduan/bukan-kewenangan')?>"><span class="fa fa-warning"></span> <span class="pull-right badge badge-danger">14</span>Bukan Kewenangan</a></li>
                    <li class="<?= @$aduan_tempat_sampah ?>"><a href="<?= site_url('sysadmin/aduan/tempat-sampah')?>"><span class="fa fa-trash-o"></span> <span class="pull-right badge badge-danger">50</span>Tempat Sampah</a></li>
                    <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('sysadmin/aduan/semua')?>"><span class="fa fa-table"></span> Semua Aduan<span class="pull-right badge badge-success">14</span></a></li>
                </ul>
            </li>                 
            <li class="xn-openable <?= @$Komentar ?>">
                <a href="#"><span class="fa fa-comment"></span> <span class="xn-text">Komentar</span></a>
                <ul>
                    <li class="<?= @$komentar_hari_ini ?>"><a href="<?= site_url('sysadmin/komentar/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari ini<span class="pull-right badge badge-info">14</span></a></li>
                    <li class="<?= @$komentar_kemarin ?>"><a href="<?= site_url('sysadmin/komentar/kemarin')?>"><span class="fa fa-clock-o"></span> Kemarin<span class="pull-right badge badge-danger">14</span></a></li>
                    <li class="<?= @$semua_komentar ?>"><a href="<?= site_url('sysadmin/komentar/semua')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-success">14</span></a></li>
                </ul>
            </li>                
            <li class="xn-openable <?= @$Administrator ?>">
                <a href="#"><span class="fa fa-user"></span> <span class="xn-text">Administrator</span></a>
                <ul>
                    <li class="<?= @$tambah_administrator ?>"><a href="<?= site_url('sysadmin/administrator/tambah')?>"><span class="fa fa-plus"></span> Tambah Administrator</a></li>
                    <li class="<?= @$data_administrator ?>"><a href="<?= site_url('sysadmin/administrator')?>"><span class="fa fa-table"></span> Data Administrator</a></li>
                </ul>
            </li>                        
            <li class="xn-openable <?= @$opd ?>">
                <a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-building"></span> <span class="xn-text">OPD</span></a>
                <ul>
                    <li class="<?= @$topd ?>"><a href="<?= site_url('sysadmin/opd/tambah')?>"><span class="fa fa-plus"></span> Tambah OPD</a></li>
                    <li class="<?= @$dopd ?>"><a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-table"></span> Data OPD</a></li>
                </ul>
            </li>                       
            <li class="xn-openable <?= @$Sektor ?>">
                <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">Sektor</span></a>
                <ul>
                    <li class="<?= @$tsektor ?>"><a href="<?= site_url('sysadmin/sektor/tambah')?>"><span class="fa fa-plus"></span> Tambah Sektor</a></li>
                    <li class="<?= @$ssektor ?>"><a href="<?= site_url('sysadmin/sektor')?>"><span class="fa fa-table"></span> Data Sektor</a></li>
                </ul>
            </li>                 
            <li class="xn-openable <?= @$User ?>">
                <a href="#"><span class="fa fa-users"></span> <span class="xn-text">User</span></a>
                <ul>
                    <li class="<?= @$tuser ?>"><a href="<?= site_url('sysadmin/user/tambah')?>"><span class="fa fa-plus"></span> Tambah User</a></li>
                    <li class="<?= @$duser ?>"><a href="<?= site_url('sysadmin/user')?>"><span class="fa fa-table"></span> Data User</a></li>
                </ul>
            </li>
            <li class="xn-openable <?= @$masukan ?>">
                <a href="#"><span class="fa fa-dropbox"></span> <span class="xn-text">Masukan</span></a>
                <ul>
                    <li class="<?= @$dmasukan ?>"><a href="<?= site_url('sysadmin/masukan')?>"><span class="fa fa-table"></span> Data Masukan</a></li>
                </ul>
            </li>   
            <li class="xn-openable <?= @$Laporan ?>">
                <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
                <ul>
                    <li class="<?= @$laporan_hari_ini ?>"><a href="<?= site_url('sysadmin/laporan')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan/bulanan')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan/tahunan')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan/semua')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
                </ul>
            </li> 
            <li class="<?= @$Filemanager ?>">
                <a href="<?= site_url('sysadmin/filemanager')?>"><span class="fa fa-folder"></span> <span class="xn-text">File Manager</span></a>                        
            </li> 
            <li class="<?= @$Pengaturan ?>">
                <a href="<?= site_url('sysadmin/pengaturan')?>"><span class="fa fa-cogs"></span> <span class="xn-text">Pengaturan</span></a>                        
            </li>  
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
<?php } elseif ($this->session->userdata('level') == 'Bupati') { ?>
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?= site_url('sysadmin') ?>">Lapor Bupati</a>
                <a href="<?= site_url('sysadmin') ?>" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="<?= base_url()?>asset/be/#" class="profile-mini">
                    <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="<?= $this->session->userdata('nama_admin'); ?>"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="John Doe"/>
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
                <a href="<?= site_url('sysadmin')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>              
            <li class="xn-openable <?= @$Aduan ?>">
                <a href="#"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
                <ul>
                    <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('sysadmin/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info">14</span></a></li>
                    <li class="<?= @$aduan_diterima ?>"><a href="<?= site_url('sysadmin/diterima')?>"><span class="fa fa-download"></span> Diterima<span class="pull-right badge badge-danger">14</span></a></li>
                    <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('sysadmin/penanganan')?>"><span class="fa fa-cogs"></span> Dalam Penanganan<span class="pull-right badge badge-warning">14</span></a></li>
                    <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('sysadmin/aduan-selesai')?>"><span class="fa fa-check"></span> Sudah Selesai<span class="pull-right badge badge-success">14</span></a></li>
                    <li class="<?= @$aduan_bukan_kewenangan ?>"><a href="<?= site_url('sysadmin/bukan-kewenangan')?>"><span class="fa fa-warning"></span> <span class="pull-right badge badge-danger">14</span>Bukan Kewenangan</a></li>
                    <li class="<?= @$aduan_tempat_sampah ?>"><a href="<?= site_url('sysadmin/tempat-sampah')?>"><span class="fa fa-trash-o"></span> <span class="pull-right badge badge-danger">50</span>Tempat Sampah</a></li>
                    <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('sysadmin/semua')?>"><span class="fa fa-table"></span> Semua Aduan<span class="pull-right badge badge-success">14</span></a></li>
                </ul>
            </li>                         
            <li class="xn-openable <?= @$opd ?>">
                <a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-building"></span> <span class="xn-text">OPD</span></a>
                <ul>
                    <li class="<?= @$dopd ?>"><a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-table"></span> Data OPD</a></li>
                </ul>
            </li>                       
            <li class="xn-openable <?= @$Sektor ?>">
                <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">Sektor</span></a>
                <ul>
                    <li class="<?= @$ssektor ?>"><a href="<?= site_url('sysadmin/sektor')?>"><span class="fa fa-table"></span> Data Sektor</a></li>
                </ul>
            </li>
            <li class="xn-openable <?= @$masukan ?>">
                <a href="#"><span class="fa fa-dropbox"></span> <span class="xn-text">Masukan</span></a>
                <ul>
                    <li class="<?= @$tmasukan ?>"><a href="<?= site_url('sysadmin/tambah')?>"><span class="fa fa-plus"></span> Tambah Masukan</a></li>
                </ul>
            </li>   
            <li class="xn-openable <?= @$Laporan ?>">
                <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
                <ul>
                    <li class="<?= @$komentar_hari_ini ?>"><a href="<?= site_url('sysadmin/komentar/hari-ini')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/komentar/bulanan')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/kometar/tahunan')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/komentar')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
                </ul>
            </li> 
        </ul>
        <!-- END X-NAVIGATION -->
    </div>

<?php } elseif($this->session->userdata('level') == 'Admin OPD'){ ?>
    <div class="page-sidebar">
        <!-- START X-NAVIGATION -->
        <ul class="x-navigation">
            <li class="xn-logo">
                <a href="<?= site_url('sysadmin') ?>">Lapor Bupati</a>
                <a href="<?= site_url('sysadmin') ?>" class="x-navigation-control"></a>
            </li>
            <li class="xn-profile">
                <a href="<?= base_url()?>asset/be/#" class="profile-mini">
                    <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="<?= $this->session->userdata('nama_admin'); ?>"/>
                </a>
                <div class="profile">
                    <div class="profile-image">
                        <img src="<?= base_url()?>files/administrator/thumb/<?= $this->session->userdata('thumb'); ?>" alt="John Doe"/>
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
                <a href="<?= site_url('sysadmin')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>                        
            </li>              
            <li class="xn-openable <?= @$Aduan ?>">
                <a href="#"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
                <ul>
                    <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('sysadmin/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info">14</span></a></li>
                    <li class="<?= @$aduan_diterima ?>"><a href="<?= site_url('sysadmin/diterima')?>"><span class="fa fa-download"></span> Diterima<span class="pull-right badge badge-danger">14</span></a></li>
                    <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('sysadmin/penanganan')?>"><span class="fa fa-cogs"></span> Dalam Penanganan<span class="pull-right badge badge-warning">14</span></a></li>
                    <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('sysadmin/selesai')?>"><span class="fa fa-check"></span> Sudah Selesai<span class="pull-right badge badge-success">14</span></a></li>
                    <li class="<?= @$aduan_bukan_kewenangan ?>"><a href="<?= site_url('sysadmin/bukan-kewenangan')?>"><span class="fa fa-warning"></span> <span class="pull-right badge badge-danger">14</span>Bukan Kewenangan</a></li>
                    <li class="<?= @$aduan_tempat_sampah ?>"><a href="<?= site_url('sysadmin/tempat-sampah')?>"><span class="fa fa-trash-o"></span> <span class="pull-right badge badge-danger">50</span>Tempat Sampah</a></li>
                    <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('sysadmin/semua')?>"><span class="fa fa-table"></span> Semua Aduan<span class="pull-right badge badge-success">14</span></a></li>
                </ul>
            </li>                         
            <li class="xn-openable <?= @$opd ?>">
                <a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-building"></span> <span class="xn-text">OPD</span></a>
                <ul>
                    <li class="<?= @$dopd ?>"><a href="<?= site_url('sysadmin/opd')?>"><span class="fa fa-table"></span> Data OPD</a></li>
                </ul>
            </li>                       
            <li class="xn-openable <?= @$Sektor ?>">
                <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">Sektor</span></a>
                <ul>
                    <li class="<?= @$ssektor ?>"><a href="<?= site_url('sysadmin/sektor')?>"><span class="fa fa-table"></span> Data Sektor</a></li>
                </ul>
            </li>
            <li class="xn-openable <?= @$masukan ?>">
                <a href="#"><span class="fa fa-dropbox"></span> <span class="xn-text">Masukan</span></a>
                <ul>
                    <li class="<?= @$tmasukan ?>"><a href="<?= site_url('sysadmin/tambah')?>"><span class="fa fa-plus"></span> Tambah Masukan</a></li>
                </ul>
            </li>   
            <li class="xn-openable <?= @$Laporan ?>">
                <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
                <ul>
                    <li class="<?= @$komentar_hari_ini ?>"><a href="<?= site_url('sysadmin/laporan/hari-ini')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan/bulanan')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan/tahunan')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                    <li><a href="<?= site_url('sysadmin/laporan')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
                </ul>
            </li> 
        </ul>
        <!-- END X-NAVIGATION -->
    </div>
<?php } ?>