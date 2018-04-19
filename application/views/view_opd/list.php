<?php if ($content == 'aduan-hari-ini') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="GET">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>     
                    <h3 class="panel-title pull-right"><?= $this->session->flashdata('query'); ?></h3>                       
                </div>
                <div class="panel-body list-group list-group-contacts">
                    <table>
                    <?php
                    if ($jml_data_aduan_disposisi <= 0) { ?>
                        <tr class="col-md-12">
                            <center>
                                <td>
                                    <a href="#" class="list-group-item"> <b>Tidak ada data aduan.</b></a>
                                </td>
                            </center>
                        </tr>
                    <?php }else {
                        foreach ($data_aduan as $key) { 
                            if ($key->jmlkomen == 0) {
                                $jmlkomen = 0;
                            }else{
                                $jmlkomen = $key->jmlkomen;
                            } ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->userfoto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->userfoto."'";
                                        }
                                    ?>
                                alt="<?= $key->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($key->nama_user);
                                        echo " <i class='fa fa-comments'> ".$jmlkomen."</i>";
                                    ?>
                                </span>
                                <p><?= time_ago($key->tanggal);
                                    if (!empty($key->lampiran)) {
                                        echo " <i class='fa fa-paperclip'></i>";
                                    }
                                 ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysopd/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-yellow"><b><?= $key->singkatan ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysadmin/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('lbadmin/verifikasi/'.$content.'/'.$key->id_aduan)?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                            <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                <li><a href="#">Di disposisikan ke...</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>
                                <!-- Modal disposisi begin -->
                                <div class="modal" id="<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= $opd->id_opd ?>">
                                                                <?php echo $opd->singkatan ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select><br><br>
                                                        <select name="id_sektor" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih Sektor --</option>
                                                            <?php foreach($daftar_sektor as $sektor) { ?>
                                                            <option value="<?= $sektor->id_sektor ?>">
                                                                <?php echo $sektor->sektor ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
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
                                <!-- Modal disposisi end -->
                            </td>
                        </tr>
                    <?php } } ?>
                    </table>               
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $pagination ?>  
                    </center> 
                </div>
        </div>
    </div>
<?php } ?>

<?php if ($content == 'aduan-masuk') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="GET">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>     
                    <h3 class="panel-title pull-right"><?= $this->session->flashdata('query'); ?></h3>                       
                </div>
                <div class="panel-body list-group list-group-contacts">
                    <table>
                    <?php
                    if ($jml_data_aduan_disposisi <= 0) { ?>
                        <tr class="col-md-12">
                            <center>
                                <td>
                                    <a href="#" class="list-group-item"> <b>Tidak ada data aduan.</b></a>
                                </td>
                            </center>
                        </tr>
                    <?php }else {
                        foreach ($data_aduan as $key) { 
                            if ($key->jmlkomen == 0) {
                                $jmlkomen = 0;
                            }else{
                                $jmlkomen = $key->jmlkomen;
                            } ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->userfoto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->userfoto."'";
                                        }
                                    ?>
                                alt="<?= $key->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($key->nama_user);
                                        echo " <i class='fa fa-comments'> ".$jmlkomen."</i>";
                                    ?>
                                </span>
                                <p><?= time_ago($key->tanggal);
                                    if (!empty($key->lampiran)) {
                                        echo " <i class='fa fa-paperclip'></i>";
                                    }
                                 ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysopd/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-yellow"><b><?= $key->singkatan ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysadmin/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('lbadmin/verifikasi/'.$content.'/'.$key->id_aduan)?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                            <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                <li><a href="#">Di disposisikan ke...</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>
                                <!-- Modal disposisi begin -->
                                <div class="modal" id="<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= $opd->id_opd ?>">
                                                                <?php echo $opd->singkatan ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select><br><br>
                                                        <select name="id_sektor" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih Sektor --</option>
                                                            <?php foreach($daftar_sektor as $sektor) { ?>
                                                            <option value="<?= $sektor->id_sektor ?>">
                                                                <?php echo $sektor->sektor ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
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
                                <!-- Modal disposisi end -->
                            </td>
                        </tr>
                    <?php } } ?>
                    </table>               
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $pagination ?>  
                    </center> 
                </div>
        </div>
    </div>
<?php } ?>

<?php if ($content == 'aduan-penanganan') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="GET">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>     
                    <h3 class="panel-title pull-right"><?= $this->session->flashdata('query'); ?></h3>                       
                </div>
                <div class="panel-body list-group list-group-contacts">
                    <table>
                    <?php
                    if ($jml_data_aduan_disposisi <= 0) { ?>
                        <tr class="col-md-12">
                            <center>
                                <td>
                                    <a href="#" class="list-group-item"> <b>Tidak ada data aduan.</b></a>
                                </td>
                            </center>
                        </tr>
                    <?php }else {
                        foreach ($data_aduan as $key) { 
                            if ($key->jmlkomen == 0) {
                                $jmlkomen = 0;
                            }else{
                                $jmlkomen = $key->jmlkomen;
                            } ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->userfoto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->userfoto."'";
                                        }
                                    ?>
                                alt="<?= $key->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($key->nama_user);
                                        echo " <i class='fa fa-comments'> ".$jmlkomen."</i>";
                                    ?>
                                </span>
                                <p><?= time_ago($key->tanggal);
                                    if (!empty($key->lampiran)) {
                                        echo " <i class='fa fa-paperclip'></i>";
                                    }
                                 ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysopd/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-warning"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysadmin/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('lbadmin/verifikasi/'.$content.'/'.$key->id_aduan)?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                            <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                <li><a href="#">Di disposisikan ke...</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>
                                <!-- Modal disposisi begin -->
                                <div class="modal" id="<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= $opd->id_opd ?>">
                                                                <?php echo $opd->singkatan ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select><br><br>
                                                        <select name="id_sektor" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih Sektor --</option>
                                                            <?php foreach($daftar_sektor as $sektor) { ?>
                                                            <option value="<?= $sektor->id_sektor ?>">
                                                                <?php echo $sektor->sektor ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
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
                                <!-- Modal disposisi end -->
                            </td>
                        </tr>
                    <?php } } ?>
                    </table>               
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $pagination ?>  
                    </center> 
                </div>
        </div>
    </div>
<?php } ?>

<?php if ($content == 'aduan-selesai') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="GET">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>     
                    <h3 class="panel-title pull-right"><?= $this->session->flashdata('query'); ?></h3>                       
                </div>
                <div class="panel-body list-group list-group-contacts">
                    <table>
                    <?php
                    if ($jml_data_aduan_disposisi <= 0) { ?>
                        <tr class="col-md-12">
                            <center>
                                <td>
                                    <a href="#" class="list-group-item"> <b>Tidak ada data aduan.</b></a>
                                </td>
                            </center>
                        </tr>
                    <?php }else {
                        foreach ($data_aduan as $key) { 
                            if ($key->jmlkomen == 0) {
                                $jmlkomen = 0;
                            }else{
                                $jmlkomen = $key->jmlkomen;
                            } ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->userfoto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->userfoto."'";
                                        }
                                    ?>
                                alt="<?= $key->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($key->nama_user);
                                        echo " <i class='fa fa-comments'> ".$jmlkomen."</i>";
                                    ?>
                                </span>
                                <p><?= time_ago($key->tanggal);
                                    if (!empty($key->lampiran)) {
                                        echo " <i class='fa fa-paperclip'></i>";
                                    }
                                 ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysopd/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-warning"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysadmin/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('lbadmin/verifikasi/'.$content.'/'.$key->id_aduan)?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                            <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                <li><a href="#">Di disposisikan ke...</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>
                                <!-- Modal disposisi begin -->
                                <div class="modal" id="<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= $opd->id_opd ?>">
                                                                <?php echo $opd->singkatan ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select><br><br>
                                                        <select name="id_sektor" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih Sektor --</option>
                                                            <?php foreach($daftar_sektor as $sektor) { ?>
                                                            <option value="<?= $sektor->id_sektor ?>">
                                                                <?php echo $sektor->sektor ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
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
                                <!-- Modal disposisi end -->
                            </td>
                        </tr>
                    <?php } } ?>
                    </table>               
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $pagination ?>  
                    </center> 
                </div>
        </div>
    </div>
<?php } ?>

<?php if ($content == 'aduan-semua') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="GET">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>     
                    <h3 class="panel-title pull-right"><?= $this->session->flashdata('query'); ?></h3>                       
                </div>
                <div class="panel-body list-group list-group-contacts">
                    <table>
                    <?php
                    if ($jml_data_aduan_disposisi <= 0) { ?>
                        <tr class="col-md-12">
                            <center>
                                <td>
                                    <a href="#" class="list-group-item"> <b>Tidak ada data aduan.</b></a>
                                </td>
                            </center>
                        </tr>
                    <?php }else {
                        foreach ($data_aduan as $key) { 
                            if ($key->jmlkomen == 0) {
                                $jmlkomen = 0;
                            }else{
                                $jmlkomen = $key->jmlkomen;
                            } ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->userfoto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->userfoto."'";
                                        }
                                    ?>
                                alt="<?= $key->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($key->nama_user);
                                        echo " <i class='fa fa-comments'> ".$jmlkomen."</i>";
                                    ?>
                                </span>
                                <p><?= time_ago($key->tanggal);
                                    if (!empty($key->lampiran)) {
                                        echo " <i class='fa fa-paperclip'></i>";
                                    }
                                 ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysopd/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <?php if ($key->status == 'didisposisikan') { ?>
                                    <span class="badge badge-yellow"><b><?= $key->status ?></b></span>
                                <?php }elseif ($key->status == 'penanganan') { ?>
                                    <span class="badge badge-warning"><b><?= $key->status ?></b></span>
                                <?php }elseif ($key->status == 'selesai') { ?>
                                    <span class="badge badge-success"><b><?= $key->status ?></b></span>
                                <?php } ?>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysadmin/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('lbadmin/verifikasi/'.$content.'/'.$key->id_aduan)?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                            <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                <li><a href="#">Di disposisikan ke...</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>
                                <!-- Modal disposisi begin -->
                                <div class="modal" id="<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysadmin/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= $opd->id_opd ?>">
                                                                <?php echo $opd->singkatan ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select><br><br>
                                                        <select name="id_sektor" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih Sektor --</option>
                                                            <?php foreach($daftar_sektor as $sektor) { ?>
                                                            <option value="<?= $sektor->id_sektor ?>">
                                                                <?php echo $sektor->sektor ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
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
                                <!-- Modal disposisi end -->
                            </td>
                        </tr>
                    <?php } } ?>
                    </table>               
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $pagination ?>  
                    </center> 
                </div>
        </div>
    </div>
<?php } ?>