<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="<?= site_url('sysopd') ?>">Lapor Bupati</a>
            <a href="<?= site_url('sysopd') ?>" class="x-navigation-control"></a>
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
            <a href="<?= site_url('sysopd')?>"><span class="fa fa-home"></span> <span class="xn-text">Dashboard</span></a>
            <?php
                $id = $this->session->userdata('id_opd');
                $hari = $this->maduan->jmlAduanOpdHari($id, 'didisposisikan', date('Y-m-d'));
                $masuk = $this->maduan->jmlAduanOpd($id, 'didisposisikan');
                $penanganan = $this->maduan->jmlAduanOpd($id, 'penanganan');
                $selesai = $this->maduan->jmlAduanOpd($id, 'selesai');
                $semua = $this->maduan->jmlAduanOpdSemua($id);
            ?>           
        </li>              
        <li class="xn-openable <?= @$Aduan ?>">
            <a href="#"><span class="fa fa-envelope"></span> <span class="xn-text">Aduan</span></a>
            <ul>
                <li class="<?= @$aduan_hari_ini ?>"><a href="<?= site_url('sysopd/aduan/hari-ini')?>"><span class="fa fa-clock-o"></span> Hari Ini<span class="pull-right badge badge-info"><?= $hari ?></span></a></li>
                <li class="<?= @$aduan_masuk ?>"><a href="<?= site_url('sysopd/aduan/masuk')?>"><span class="fa fa-download"></span> Masuk<span class="pull-right badge badge-danger"><?= $masuk ?></span></a></li>
                <li class="<?= @$aduan_dalam_penanganan ?>"><a href="<?= site_url('sysopd/aduan/penanganan')?>"><span class="fa fa-cogs"></span> Penanganan<span class="pull-right badge badge-warning"><?= $penanganan ?></span></a></li>
                <li class="<?= @$aduan_selesai ?>"><a href="<?= site_url('sysopd/aduan/selesai')?>"><span class="fa fa-check"></span> Selesai<span class="pull-right badge badge-success"><?= $selesai ?></span></a></li>
                <li class="<?= @$semua_aduan ?>"><a href="<?= site_url('sysopd/aduan/semua')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-success"><?= $semua ?></span></a></li>
            </ul>
        </li>                         
        <li class="xn-openable <?= @$opd ?>">
            <a href="<?= site_url('sysopd/opd')?>"><span class="fa fa-building"></span> <span class="xn-text">OPD</span></a>
            <ul>
                <li class="<?= @$dopd ?>"><a href="<?= site_url('sysopd/opd')?>"><span class="fa fa-table"></span> Data OPD</a></li>
            </ul>
        </li>                       
        <li class="xn-openable <?= @$Sektor ?>">
            <a href="#"><span class="fa fa-tags"></span> <span class="xn-text">Sektor</span></a>
            <ul>
                <li class="<?= @$ssektor ?>"><a href="<?= site_url('sysopd/sektor')?>"><span class="fa fa-table"></span> Data Sektor</a></li>
            </ul>
        </li>
        <li class="xn-openable <?= @$masukan ?>">
            <a href="#"><span class="fa fa-dropbox"></span> <span class="xn-text">Masukan</span></a>
            <ul>
                <li class="<?= @$tmasukan ?>"><a href="<?= site_url('sysopd/masukan/tambah')?>"><span class="fa fa-plus"></span> Tambah Masukan</a></li>
            </ul>
        </li>   
        <li class="xn-openable <?= @$Laporan ?>">
            <a href="#"><span class="fa fa-file-text"></span> <span class="xn-text">Laporan</span></a>
            <ul>
                <li class="<?= @$komentar_hari_ini ?>"><a href="<?= site_url('sysopd/komentar_hari_ini')?>"><span class="fa fa-clock-o"></span> Mingguan<span class="pull-right badge badge-info">14</span></a></li>
                <li><a href="<?= site_url('sysopd/tambah_administrator')?>"><span class="fa fa-clock-o"></span> Bulanan<span class="pull-right badge badge-danger">14</span></a></li>
                <li><a href="<?= site_url('sysopd/tambah_administrator')?>"><span class="fa fa-clock-o"></span> Tahunan<span class="pull-right badge badge-danger">14</span></a></li>
                <li><a href="<?= site_url('sysopd/tambah_administrator')?>"><span class="fa fa-table"></span> Semua<span class="pull-right badge badge-warning">14</span></a></li>
            </ul>
        </li> 
    </ul>
    <!-- END X-NAVIGATION -->
</div>