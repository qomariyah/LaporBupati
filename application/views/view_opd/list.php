<?php if ($content == 'aduan-hari-ini') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'aduan-diterima') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true">
                                                                <option>Dinas Pariwisata dan Olah raga</option>
                                                                <option>Dinas Kependudukan dan catatan sipil</option>
                                                                <option>Dinas Kebersihan Umum</option>
                                                                <option>Dinas Ketenaga Kerjaan</option>
                                                            </select>
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

<?php if ($content == 'aduan-didisposisikan') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'aduan-dalam-penanganan') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'aduan-selesai') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'aduan-bukan-kewenangan') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'aduan-tempat-sampah') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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

<?php if ($content == 'semua-aduan') { ?>
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
                                <td class="col-md-2">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><span class="fa fa-envelope"></span> <b>Nama Pengirim</b></a>
                                </td>
                                <td class="col-md-8">
                                    <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                                </td>
                                <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                                <td class="col-md-1">
                                    <div class="btn-group pull-right">
                                        <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>">Detail Aduan</a></li>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#modal_small">Disposisikan ke...</a>
                                                <ul data-toggle="dropdown" class="dropdown-menu" role="menu">
                                                    <li><a href="#">Di disposisikan ke...</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Ke tempat sampah</a></li>                                                    
                                        </ul>
                                    </div>
                                    <!-- Modal disposisi begin -->
                                    <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title" id="smallModalHead">Di disposisikan ke...</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">                                     
                                                            <select class="form-control select" data-live-search="true"">
                                                                <option value="">-- Pilih OPD --</option>
                                                                <?php foreach($daftar_opd as $daftar_opd) { ?>
                                                                <option value="<?= $daftar_opd->id_opd ?>">
                                                                    <?php echo $daftar_opd->singkatan ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
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
                    </form>
                    <ul class="panel-controls">                                             
                        <a href="<?= site_url('lbadmin/tambah_user') ?>" class="btn btn-rounded btn-success" data-toggle="tooltip" data-placement="left" title="Tekan untuk menambah data">Tambah</a>
                    </ul>         
                </div>
                <div class="panel-body list-group list-group-contacts">
                <table>
                    <?php foreach ($data_user as $row) { ?>
                        <tr>
                            <td class="col-md-2 list-group-item">
                                <img 
                                    <?php
                                        if ($row->foto == "") {
                                            echo "src='".base_url()."asset/fe/images/no-image.png'" ;
                                        }else{
                                            echo "src='".base_url()."files/user/thumb/".$row->thumb."'";
                                        }
                                    ?>
                                alt="<?= $row->thumb ?>" class="pull-left">
                                <span class="contacts-title"><?= $row->nama_user ?></span>
                                <p><?= $row->no_telepon ?></p>
                            </td>
                            <td class="col-md-8 list-group-item">
                                <a href="<?= site_url('lbadmin/detail_user/'.$row->id_user)?>" class="list-group-item"><?= $row->no_ktp." | ".$row->alamat ?></a>
                            </td>
                            <td class="col-md-1 list-group-item"><b><?= date('d-M-Y H:s', strtotime($row->dibuat)) ?></b></td>
                            <td class="col-md-1 list-group-item">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><i class="fa fa-bars"></i> <!-- <span class="caret"></span> --></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= site_url('lbadmin/detail_user/'.$row->id_user) ?>">Lihat Profil</a></li>
                                        <li><a href="<?= site_url('lbadmin/edit_user/'.$row->id_user) ?>">Edit</a></li>
                                        <li><a href="<?= site_url('lbadmin/delete_user/'.$row->id_user) ?>">Hapus</a></li>
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
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
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
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
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
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle"><i class="fa fa-gear"></i> <span class="caret"></span></a>
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

<?php if ($content == 'semua-komentar') { ?>
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
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><b>EmailPengirim@gmail.com</b></a>
                            </td>
                            <td class="col-md-7">
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                            </td>
                            <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
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
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><b>EmailPengirim@gmail.com</b></a>
                            </td>
                            <td class="col-md-7">
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                            </td>
                            <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
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
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item"><b>EmailPengirim@gmail.com</b></a>
                            </td>
                            <td class="col-md-7">
                                <a href="<?= site_url('lbadmin/detail_aduan_hari_ini')?>" class="list-group-item">Lorem ipsum dolor sit Sed facilisis suscipit eros vitae iaculisSed facilisis suscipit eros ...</a>
                            </td>
                            <td class="col-md-1"><b><?= date('d-M-Y') ?></b></td>
                            <td class="col-md-1">
                                <div class="btn-group pull-right">
                                    <a href="#" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Pilihan <span class="caret"></span></a>
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