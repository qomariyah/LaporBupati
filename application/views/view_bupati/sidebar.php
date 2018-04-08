<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="<?= site_url('lbbupati') ?>">Lapor Bupati</a>
            <a href="<?= site_url('lbbupati') ?>" class="x-navigation-control"></a>
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
            <a href="<?= site_url('lbbupati')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>                        
        </li>              
        <li class="xn-openable <?= @$Aduan ?>">
            <a href="<?= site_url('lbbupati/aduan-diterima')?>"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
            <ul>
                <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('lbbupati/aduan-hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info">14</span></a></li>
                <li class="<?= @$aduan_diterima ?>"><a href="<?= site_url('lbbupati/aduan-diterima')?>"><span class="fa fa-download"></span> Diterima<span class="pull-right badge badge-danger">14</span></a></li>
                <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('lbbupati/aduan-dalam-penanganan')?>"><span class="fa fa-cogs"></span> Dalam Penanganan<span class="pull-right badge badge-warning">14</span></a></li>
                <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('lbbupati/aduan-selesai')?>"><span class="fa fa-check"></span> Sudah Selesai<span class="pull-right badge badge-success">14</span></a></li>
                <li class="<?= @$aduan_bukan_kewenangan ?>"><a href="<?= site_url('lbbupati/aduan-bukan-kewenangan')?>"><span class="fa fa-warning"></span> <span class="pull-right badge badge-danger">14</span>Bukan Kewenangan</a></li>
                <li class="<?= @$aduan_tempat_sampah ?>"><a href="<?= site_url('lbbupati/tempat-sampah-aduan')?>"><span class="fa fa-trash-o"></span> <span class="pull-right badge badge-danger">50</span>Tempat Sampah</a></li>
                <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('lbbupati/semua-aduan')?>"><span class="fa fa-table"></span> Semua Aduan<span class="pull-right badge badge-success">14</span></a></li>
            </ul>
        </li>                         
        <li class="xn-openable <?= @$opd ?>">
            <a href="<?= site_url('lbbupati/opd')?>"><span class="fa fa-building"></span> <span class="xn-text">OPD</span></a>
            <ul>
                <li class="<?= @$dopd ?>"><a href="<?= site_url('lbbupati/opd')?>"><span class="fa fa-table"></span> Data OPD</a></li>
            </ul>
        </li>                       
        <li class="xn-openable <?= @$Sektor ?>">
            <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">Sektor</span></a>
            <ul>
                <li class="<?= @$ssektor ?>"><a href="<?= site_url('lbbupati/sektor')?>"><span class="fa fa-table"></span> Data Sektor</a></li>
            </ul>
        </li>
        <li class="xn-openable <?= @$masukan ?>">
            <a href="#"><span class="fa fa-dropbox"></span> <span class="xn-text">Masukan</span></a>
            <ul>
                <li class="<?= @$tmasukan ?>"><a href="<?= site_url('lbbupati/tambah_masukan')?>"><span class="fa fa-plus"></span> Tambah Masukan</a></li>
            </ul>
        </li>   
        <li class="xn-openable <?= @$Laporan ?>">
            <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
            <ul>
                <li class="<?= @$komentar_hari_ini ?>"><a href="<?= site_url('lbbupati/komentar_hari_ini')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                <li><a href="<?= site_url('lbbupati/tambah_administrator')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                <li><a href="<?= site_url('lbbupati/tambah_administrator')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                <li><a href="<?= site_url('lbbupati/tambah_administrator')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
            </ul>
        </li> 
    </ul>
    <!-- END X-NAVIGATION -->
</div>