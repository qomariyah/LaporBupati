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
                    if ($jml_data_aduan_hari_ini <= 0) { ?>
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
                            }
                         ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
                                        }
                                    ?>
                                alt="<?= p($key->thumb) ?>" class="pull-left">
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-masuk"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('sysbupati/aduan/verifikasi/'.$key->id_aduan.'/hari-ini')?>">Verifikasi</a></li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#<?= p($key->id_aduan) ?>">Disposisikan ke...</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#sampah<?= p($key->id_aduan) ?>">Ke tempat sampah</a>
                                        </li>                                                    
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
                                                    <div class="form-group">                                     
                                                        <select name="id_opd" class="form-control select" required data-live-search="true"">
                                                            <option value="">-- Pilih OPD --</option>
                                                            <?php foreach($daftar_opd as $opd) { ?>
                                                            <option value="<?= p($opd->id_opd) ?>">
                                                                <?= p($opd->singkatan) ?>
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

                                <!-- Modal sampah begin -->
                                <div class="modal" id="sampah<?= p($key->id_aduan) ?>" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                <h4 class="modal-title" id="smallModalHead">Tuliskan alasan mengapa aduan ini dimasukkan ke sampah</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/sampah') ?>">
                                                    <div class="form-group">                                     
                                                        <div class="form-group">
                                                            <label class="control-label">Alasan/komentar</label>
                                                            <textarea class="form-control" rows="5" name="komentar" required></textarea>
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
                    if ($jml_data_aduan_masuk <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-masuk"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
                                        <li><a href="<?= site_url('sysbupati/aduan/verifikasi/'.$key->id_aduan.'/masuk')?>">Verifikasi</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-diverifikasi') { ?>
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
                    if ($jml_data_aduan_diverifikasi <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-info"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-didisposisikan') { ?>
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-yellow"><b><?= $key->status." ke ".$key->singkatan ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-dalam-penanganan') { ?>
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
                    if ($jml_data_aduan_penanganan <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
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
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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
                    if ($jml_data_aduan_selesai <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item"><b>
                                <span class="badge badge-success"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-bukan-kewenangan') { ?>
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
                    if ($jml_data_aduan_bukan_kewenangan <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-danger"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-tempat-sampah') { ?>
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
                    if ($jml_data_aduan_sampah <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
                                <span class="badge badge-sampah"><b><?= $key->status ?></b></span>
                                <?php 
                                if ($key->rahasia == 1) {
                                    echo "&nbsp<span class='badge badge-danger'><b>rahasia</b></span>";
                                } ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'semua-aduan') { ?>
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
                    if ($jml_semua_aduan <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
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
                                        echo "<span class='badge badge-danger'><b>rahasia</b></span>&nbsp";
                                    }
                                ?>
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'aduan-rahasia') { ?>
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
                    if ($jml_semua_aduan <= 0) { ?>
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
                                        if ($key->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$key->thumb."'";
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
                                <a href="<?= site_url('sysbupati/aduan/detail/'.$key->id_aduan)?>"><?= p($key->aduan) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item">
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
                            </td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/detail/')?>">Detail Aduan</a></li>
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
                                                <form method="POST" action="<?= site_url('sysbupati/aduan/disposisi') ?>">
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

<?php if ($content == 'user') { ?>
    <div class="row">                     
        <div class="col-md-12">
            <!-- CONTACTS WITH CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Data User</h3>
                    <form method="GET" action="">
                        <div class="col-md-3">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari <?= $content ?>" />
                                </div>
                            </div>
                        </div>
                        <h3 class="panel-title"><?= $this->session->flashdata('query'); ?></h3>
                    </form>
                    <ul class="panel-controls">                                             
                        <a href="<?= site_url('lbadmin/tambah_user') ?>" class="btn btn-rounded btn-success" data-toggle="tooltip" data-placement="left" title="Tekan untuk menambah data">Tambah</a>
                    </ul>         
                </div>
                <div class="panel-body list-group list-group-contacts">
                <table>
                    <?php foreach ($data_user as $row) { ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if ($row->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$row->thumb."'";
                                        }
                                    ?>
                                alt="<?= $row->thumb ?>" class="pull-left">
                                <span class="contacts-title">
                                    <?= p($row->nama_user) ?>&nbsp;
                                    <i class="fa fa-envelope-o"> <?= $row->jmladuan ?></i>
                                </span>
                                <p><?= p($row->no_telepon) ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="<?= site_url('sysbupati/user/detail/'.$row->id_user)?>">
                                    <?php
                                        if (empty($row->alamat)) {
                                            echo $row->email." - alamat belum ditambahkan";
                                        }else{
                                            echo $row->email." - ".$row->alamat;
                                        }
                                    ?>
                                </a>
                            </td>
                            <td class="col-md-2 list-group-item"><b><?= time_ago($row->dibuat) ?></b></td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i> <!-- <span class="caret"></span> --></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/user/detail/'.$row->id_user) ?>"><i class="fa fa-eye"></i> Lihat Profil</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/edit/'.$row->id_user) ?>"><i class="fa fa-pencil"></i> Edit</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/delete/'.$row->id_user) ?>"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/blokir/'.$row->id_user) ?>"><i class="fa fa-lock"></i> Blokir</a></li>
                                    </ul>
                                </div>      
                            </td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
                <div class="panel-footer">
                    <center>
                        <?= $link_user ?> 
                    </center>   
                </div>
            </div>
            <!-- END CONTACTS WITH CONTROLS -->
        </div>
    </div>
<?php } ?>

<?php if ($content == 'semua-masukan') { ?>
    <!-- START CONTENT FRAME -->
    <div class="content-frame">                                    
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-file-text"></span> <?= $breadcrumb ?></h2>
            </div>                                                                                
            
            <div class="pull-right">                                                                                    
                <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
            </div>                        
        </div>
        <!-- END CONTENT FRAME TOP -->
        
        <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left">
            <div class="block">
                <div class="list-group border-bottom">
                    <a href="<?= site_url('lbadmin/masukan_hari_ini')?>" class="list-group-item"><span class="fa fa-clock-o"></span> Hari ini <span class="badge badge-success">3</span></a>
                    <a href="<?= site_url('lbadmin/masukan_bulan_ini')?>" class="list-group-item"><span class="fa fa-clock-o"></span> Bulan ini </a>
                    <a href="<?= site_url('lbadmin/masukan')?>" class="list-group-item active"><span class="fa fa-dropbox"></span> Semua Masukan <span class="badge badge-success">1.4k</span></a>                            
                </div>                        
            </div>
        </div>
        <!-- END CONTENT FRAME LEFT -->
        
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body">
            <div class="panel panel-default">
                <div class="panel-heading">                                    
                    <div class="pull-right" style="width: 150px;">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                        </div>
                    </div>
                </div>
                <div class="panel-body list-group">
                    <table>
                    <?php for ($i=0; $i < 10 ; $i++) {  ?>
                        <tr>
                            <td class="col-md-3">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item"><b>Email Pengirim</b></a>
                            </td>
                            <td class="col-md-6">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item">Lorem ipsum dolor sit adipiscing elit. suscipit eros ...</a>
                            </td>
                            <td class="col-md-2"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_masukan')?>">Lihat selengkapnya</a></li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>     
                            </td>
                        </tr>
                    <?php } ?>
                    </table>           
                </div>
                <div class="panel-footer">
                    <ul class="pagination pagination-sm pull-right">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>                                    
                        <li><a href="#">»</a></li>
                    </ul>
                </div>                            
            </div>
            
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME --> 
<?php } ?>

<?php if ($content == 'masukan-hari-ini') { ?>
    <!-- START CONTENT FRAME -->
    <div class="content-frame">                                    
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-file-text"></span> <?= $breadcrumb ?></h2>
            </div>                                                                                
            
            <div class="pull-right">                                                                                    
                <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
            </div>                        
        </div>
        <!-- END CONTENT FRAME TOP -->
        
        <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left">
            <div class="block">
                <div class="list-group border-bottom">
                    <a href="<?= site_url('lbadmin/masukan_hari_ini')?>" class="list-group-item active"><span class="fa fa-clock-o"></span> Hari ini <span class="badge badge-success">3</span></a>
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
                    <div class="pull-right" style="width: 150px;">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                        </div>
                    </div>
                </div>
                <div class="panel-body list-group">
                    <table>
                    <?php for ($i=0; $i < 10 ; $i++) {  ?>
                        <tr>
                            <td class="col-md-3">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item"><b>Email Pengirim</b></a>
                            </td>
                            <td class="col-md-6">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item">Lorem ipsum dolor sit adipiscing elit. suscipit eros ...</a>
                            </td>
                            <td class="col-md-2"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_masukan')?>">Lihat selengkapnya</a></li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>     
                            </td>
                        </tr>
                    <?php } ?>
                    </table>           
                </div>
                <div class="panel-footer">
                    <ul class="pagination pagination-sm pull-right">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>                                    
                        <li><a href="#">»</a></li>
                    </ul>
                </div>                            
            </div>
            
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME --> 
<?php } ?>

<?php if ($content == 'masukan-bulan-ini') { ?>
    <!-- START CONTENT FRAME -->
    <div class="content-frame">                                    
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-file-text"></span> <?= $breadcrumb ?></h2>
            </div>                                                                                
            
            <div class="pull-right">                                                                                    
                <button class="btn btn-default"><span class="fa fa-print"></span> Print</button>
                <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
            </div>                        
        </div>
        <!-- END CONTENT FRAME TOP -->
        
        <!-- START CONTENT FRAME LEFT -->
        <div class="content-frame-left">
            <div class="block">
                <div class="list-group border-bottom">
                    <a href="<?= site_url('lbadmin/masukan_hari_ini')?>" class="list-group-item"><span class="fa fa-clock-o"></span> Hari ini <span class="badge badge-success">3</span></a>
                    <a href="<?= site_url('lbadmin/masukan_bulan_ini')?>" class="list-group-item active"><span class="fa fa-clock-o"></span> Bulan ini </a>
                    <a href="<?= site_url('lbadmin/masukan')?>" class="list-group-item"><span class="fa fa-dropbox"></span> Semua Masukan <span class="badge badge-success">1.4k</span></a>                            
                </div>                        
            </div>
        </div>
        <!-- END CONTENT FRAME LEFT -->
        
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body">
            <div class="panel panel-default">
                <div class="panel-heading">                                    
                    <div class="pull-right" style="width: 150px;">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                            <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                        </div>
                    </div>
                </div>
                <div class="panel-body list-group">
                    <table>
                    <?php for ($i=0; $i < 10 ; $i++) {  ?>
                        <tr>
                            <td class="col-md-3">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item"><b>Email Pengirim</b></a>
                            </td>
                            <td class="col-md-6">
                                <a href="<?= site_url('lbadmin/detail_masukan')?>" class="list-group-item">Lorem ipsum dolor sit adipiscing elit. suscipit eros ...</a>
                            </td>
                            <td class="col-md-2"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_masukan')?>">Lihat selengkapnya</a></li>
                                        <li><a href="#">Ke tempat sampah</a></li>                                                    
                                    </ul>
                                </div>     
                            </td>
                        </tr>
                    <?php } ?>
                    </table>           
                </div>
                <div class="panel-footer">
                    <ul class="pagination pagination-sm pull-right">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>                                    
                        <li><a href="#">»</a></li>
                    </ul>
                </div>                            
            </div>
            
        </div>
        <!-- END CONTENT FRAME BODY -->
    </div>
    <!-- END CONTENT FRAME --> 
<?php } ?>

<?php if ($content == 'komentar') { ?>
    <div class="row">                     
        <div class="col-md-12">
            <!-- CONTACTS WITH CONTROLS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Komentar</h3>
                    <form method="GET" action="">
                        <div class="col-md-3">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari <?= $content ?>" />
                                </div>
                            </div>
                        </div>
                        <h3 class="panel-title"><?= $this->session->flashdata('query'); ?></h3>
                    </form>
                    <ul class="panel-controls">                                             
                        <a href="<?= site_url('lbadmin/tambah_user') ?>" class="btn btn-rounded btn-success" data-toggle="tooltip" data-placement="left" title="Tekan untuk menambah data">Tambah</a>
                    </ul>         
                </div>
                <div class="panel-body list-group list-group-contacts">
                <table>
                    <?php if ($jml_data_komentar == 0) { ?>
                        <tr>
                            <td class="col-md-3 list-group-item"><b>Data Komentar ditemukan</b></td>
                        </tr>
                    <?php }else{ 
                        foreach ($data_komentar as $row) { ?>
                        <tr>
                            <td class="col-md-3 list-group-item">
                                <img 
                                    <?php
                                        if (!empty($row->id_admin)) {
                                            if (!empty($row->foto_admin)) {
                                                echo "src='".base_url()."files/administrator/thumb/".$row->foto_admin."'";
                                            }else{
                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                            }
                                        }elseif (!empty($row->id_opd)){
                                            if (!empty($row->foto_opd)) {
                                                echo "src='".base_url()."files/opd/thumb/".$row->foto_opd."'";
                                            }else{
                                                echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                            }
                                        }elseif (!empty($row->id_user)) {
                                            if (!empty($row->foto_user)) {
                                                echo "src='".base_url()."files/user/thumb/".$row->foto_user."'";
                                            }else{
                                                echo "src='".base_url()."asset/fe/images/no-image-male-no-frame.png'" ;
                                            }
                                        }
                                    ?>
                                class="pull-left">
                                <span class="contacts-title">
                                    <?php
                                        if (!empty($row->id_admin)) {
                                            echo $row->nama_admin;
                                        }elseif (!empty($row->id_opd)){
                                            echo $row->singkatan;
                                        }elseif (!empty($row->id_user)) {
                                            echo $row->nama_user;
                                        }
                                    ?>
                                </span>
                                <p><?php
                                    if (!empty($row->id_admin)) {
                                        echo "Administrator";
                                    }elseif (!empty($row->id_opd)){
                                        echo "Admin OPD ".$row->singkatan;
                                    }elseif (!empty($row->id_user)) {
                                        echo "User";
                                    }
                                ?></p>
                            </td>
                            <td class="col-md-7 list-group-item">
                                <a href="#"><?= p($row->komentar) ?></a>
                            </td>
                            <td class="col-md-2 list-group-item"><b><?= time_ago($row->tanggal) ?></b></td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i> <!-- <span class="caret"></span> --></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('sysbupati/user/detail/'.$row->id_user) ?>"><i class="fa fa-eye"></i> Lihat Profil</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/edit/'.$row->id_user) ?>"><i class="fa fa-pencil"></i> Edit</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/delete/'.$row->id_user) ?>"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                        <li><a href="<?= site_url('sysbupati/user/blokir/'.$row->id_user) ?>"><i class="fa fa-lock"></i> Blokir</a></li>
                                    </ul>
                                </div>      
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
            <!-- END CONTACTS WITH CONTROLS -->
        </div>
    </div>
<?php } ?>

<?php if ($content == 'komentar-hari-ini') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="POST">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>                          
                </div>
                <div class="panel-body list-group">
                    <table>
                    <?php for ($i=0; $i < 15 ; $i++) {  ?>
                        <tr>
                            <td class="col-md-3">
                                <a href="<?= site_url('sysbupati/detail/')?>" class="list-group-item"><b>EmailPengirim@gmail.com</b></a>
                            </td>
                            <td class="col-md-7">
                                <a href="<?= site_url('sysbupati/detail/')?>" class="list-group-item">Lorem ipsum dolor sit Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                            </td>
                            <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_komentar')?>">Lihat selengkapnya</a></li>
                                        <li><a href="#">Ke tempat sampah</a></li>          
                                    </ul>
                                </div>      
                            </td>
                        </tr>
                    <?php } ?>
                    </table>           
                </div>
                <div class="panel-footer">
                    <center>
                        <ul class="pagination pagination-sm">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul> 
                    </center>   
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($content == 'komentar-kemarin') { ?>
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    <form method="POST">
                        <div class="col-md-2 pull-right">
                            <div class="form-group">                                         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Aduan..." />
                                </div>
                            </div>
                        </div>
                    </form>                          
                </div>
                <div class="panel-body list-group">
                    <table>
                    <?php for ($i=0; $i < 15 ; $i++) {  ?>
                        <tr>
                            <td class="col-md-3">
                                <a href="<?= site_url('sysbupati/detail/')?>" class="list-group-item"><b>EmailPengirim@gmail.com</b></a>
                            </td>
                            <td class="col-md-7">
                                <a href="<?= site_url('sysbupati/detail/')?>" class="list-group-item">Lorem ipsum dolor sit Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                            </td>
                            <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle"><i class="fa fa-bars"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_komentar')?>">Lihat selengkapnya</a></li>
                                        <li><a href="#">Ke tempat sampah</a></li>          
                                    </ul>
                                </div>      
                            </td>
                        </tr>
                    <?php } ?>
                    </table>           
                </div>
                <div class="panel-footer">
                    <center>
                        <ul class="pagination pagination-sm">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul> 
                    </center>   
                </div>
            </div>
        </div>
    </div>
<?php } ?>