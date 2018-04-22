<!-- START WIDGETS -->  
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">                    
            <div class="panel-title-box">
                <h3>Ikhtisar Data Aduan</h3>
                <span>Status semua aduan</span>
            </div>
            <ul class="panel-controls">
                <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
            </ul>                                
        </div>
        <div class="panel-body">
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-masuk widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-arrow-down"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("masuk")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Masuk</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-info widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-check-square-o"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("diverifikasi")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Diverifikasi</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-yellow widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-arrow-right"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("didisposisikan")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Didisposisikan</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-warning widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-spinner"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("penanganan")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Penanganan</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-success widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-check"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("selesai")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Selesai</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-danger widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-exclamation-circle"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("bukan kewenangan")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Bukan Kewenangan</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-sampah widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-trash-o"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->jmlAduanStatus("sampah")->num_rows() ?></div>
                        <div class="widget-subtitle">Aduan</div>
                        <div class="widget-title">Tempat Sampah</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>

            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-semua widget-item-icon" onclick="location.href='pages-messages.html';">
                    <div class="widget-item-left">
                        <span class="fa fa-table"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count"><?= $this->maduan->rowAduanSemua()->num_rows(); ?></div>
                        <div class="widget-subtitle">Semua</div>
                        <div class="widget-title">Aduan</div>
                    </div>      
                    <div class="widget-controls">                                
                        <a href="<?= base_url()?>joli-admin/#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Hapus Widget"><span class="fa fa-times"></span></a>
                    </div>
                </div>                            
                <!-- END WIDGET MESSAGES -->
        </div>
        <div class="panel-footer">
            <center>
                <a href="#" class="btn btn-rounded btn-danger btn-lg" data-toggle="tooltip" data-placement="top" title="Tekan untuk melihat detail data selengkapnya untuk hari ini">Lihat Selengkapnya</a>
            </center>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
                            
            <!-- START VISITORS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Semua Aduan</h3>
                        <span>Grafik status semua aduan</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END VISITORS BLOCK -->
            
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Grafik Aduan</h3>
                        <span>Grafik semua status aduan</span>
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                </div>
            </div>
            <!-- END SALES & EVENTS BLOCK -->
        </div>
    </div>
</div>
<!-- END WIDGETS -->                 