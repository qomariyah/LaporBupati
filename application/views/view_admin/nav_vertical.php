<?php if($this->session->userdata('level') == 'Super Admin'){ ?>
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="<?= base_url()?>asset/be/#" class="x-navigation-minimize"><span class="fa fa-bars"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- SEARCH
        <li class="xn-search">
            <form role="form">
                <input type="text" name="search" placeholder="Search..."/>
            </form>
        </li>    -->
        <!-- END SEARCH -->
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="#" class="mb-control" data-box="#mb-signout" data-toggle="tooltip" data-placement="bottom" title="Sign Out"><span class="fa fa-sign-out"></span></a>                        
        </li> 
        <!-- END SIGN OUT -->
        <!-- MESSAGES -->
        <li class="xn-icon-button pull-right">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Aktivitas"><span class="fa fa-bell"></span></a>
            <div class="informer informer-danger"><?= $this->maktivitas->read()->num_rows() ?></div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-bell"></span> Aktivitas</h3>                                
                    <div class="pull-right">
                        <span class="label label-danger">
                        <?php 
                            if ($this->maktivitas->read()->num_rows() <= 0) {
                                echo "Kosong";
                            }else {
                                echo $this->maktivitas->read()->num_rows();
                            }
                         ?>
                        </span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 400px;">
                    <?php 
                    if ($this->maktivitas->read()->num_rows() <= 0) { ?>
                        <a href="#" class="list-group-item">Tidak ada aktivitas terbaru</a>
                    <?php }else {
                       $aktivitas = $this->maktivitas->read()->result();
                        foreach ($aktivitas as $aktivitas) { ?>
                        <a href="#" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <img src="<?= base_url()?>files/administrator/thumb/<?php p($aktivitas->thumbnail) ?>" class="pull-left" alt="John Doe"/>
                            <span class="contacts-title"><?php p($aktivitas->nama_admin) ?></span><small class="pull-right"><?= date('H:i d-m-Y', strtotime($aktivitas->dibuat)) ?></small>
                            <p><?php p($aktivitas->aktivitas) ?></p>
                        </a>
                    <?php } }?>
                    
                </div>     
                <div class="panel-footer text-center">
                    <a href="<?= base_url()?>asset/be/pages-messages.html">Lihat semua aktivitas</a>
                </div>                            
            </div>                        
        </li>
        <!-- END MESSAGES -->
        <!-- ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Aduan Baru"><span class="fa fa-envelope"></span></a>
            <div class="informer informer-danger"><?= $this->maduan->aduanTerbaru()->num_rows() ?></div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                    <div class="pull-right">
                        <span class="label label-danger">
                        <?php 
                            if ($this->maduan->aduanTerbaru()->num_rows() <= 0) {
                                echo "Kosong";
                            }else {
                                echo $this->maduan->aduanTerbaru()->num_rows()." aduan terbaru";
                            }
                        ?>
                        </span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 400px;">
                    <?php 
                    if ($this->maduan->aduanTerbaru()->num_rows() <= 0) { ?>
                        <a href="#" class="list-group-item">Tidak ada aduan terbaru</a>
                    <?php }else {
                       $aduan = $this->maduan->aduanTerbaru()->result();
                        foreach ($aduan as $key) { ?>
                        <a href="<?= site_url('lbadmin/detail-aduan/'.$key->id_aduan) ?>" class="list-group-item">
                            <div class="list-group-status status-online"></div>
                            <?php if ($key->foto == "") { ?>
                                <img src="<?= base_url()?>asset/fe/images/no-image-male-no-frame.png" class="pull-left" alt="<?= $key->nama_user ?>"/>
                            <?php }else { ?>
                                <img src="<?= base_url()?>files/user/thumb/<?= $key->thumb ?>" class="pull-left" alt="<?= $key->nama_user ?>"/>
                            <?php } ?>
                            <span class="contacts-title"><?= $key->nama_user ?></span><small class="pull-right"><?= date('H:i d-m-Y', strtotime($key->tanggal)) ?></small>
                            <p><?= substr($key->aduan, 0, 40)."..." ?></p>
                        </a>
                    <?php } }?>
                </div>     
                <div class="panel-footer text-center">
                    <a href="<?= base_url()?>asset/be/pages-messages.html">Show all messages</a>
                </div>                            
            </div>                        
        </li>
        <!-- END ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="<?= site_url()?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Lihat Website"><span class="fa fa-globe"></span></a>                        
        </li> 
    </ul>

<?php } elseif($this->session->userdata('level') == 'Bupati'){ ?>
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="<?= base_url()?>asset/be/#" class="x-navigation-minimize"><span class="fa fa-bars"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- SEARCH
        <li class="xn-search">
            <form role="form">
                <input type="text" name="search" placeholder="Search..."/>
            </form>
        </li>    -->
        <!-- END SEARCH -->
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="<?= base_url()?>asset/be/#" class="mb-control" data-box="#mb-signout" data-toggle="tooltip" data-placement="bottom" title="Sign Out"><span class="fa fa-sign-out"></span></a>                        
        </li> 
        <!-- END SIGN OUT -->
        <!-- ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="<?= base_url()?>asset/be/#" data-toggle="tooltip" data-placement="bottom" title="Aduan Baru"><span class="fa fa-envelope"></span></a>
            <div class="informer informer-danger">4</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                    <div class="pull-right">
                        <span class="label label-danger">4 new</span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-online"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                        <span class="contacts-title">John Doe</span>
                        <p>Praesent placerat tellus id augue condimentum</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                        <span class="contacts-title">Dmitry Ivaniuk</span>
                        <p>Donec risus sapien, sagittis et magna quis</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                        <span class="contacts-title">Nadia Ali</span>
                        <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-offline"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                        <span class="contacts-title">Darth Vader</span>
                        <p>I want my money back!</p>
                    </a>
                </div>     
                <div class="panel-footer text-center">
                    <a href="<?= base_url()?>asset/be/pages-messages.html">Show all messages</a>
                </div>                            
            </div>                        
        </li>
        <!-- END ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="<?= site_url()?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Lihat Website"><span class="fa fa-globe"></span></a>                        
        </li> 
    </ul>

<?php } elseif($this->session->userdata('level') == 'Admin OPD'){ ?>
    <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
        <!-- TOGGLE NAVIGATION -->
        <li class="xn-icon-button">
            <a href="<?= base_url()?>asset/be/#" class="x-navigation-minimize"><span class="fa fa-bars"></span></a>
        </li>
        <!-- END TOGGLE NAVIGATION -->
        <!-- SEARCH
        <li class="xn-search">
            <form role="form">
                <input type="text" name="search" placeholder="Search..."/>
            </form>
        </li>    -->
        <!-- END SEARCH -->
        <!-- SIGN OUT -->
        <li class="xn-icon-button pull-right">
            <a href="<?= base_url()?>asset/be/#" class="mb-control" data-box="#mb-signout" data-toggle="tooltip" data-placement="bottom" title="Sign Out"><span class="fa fa-sign-out"></span></a>                        
        </li> 
        <!-- END SIGN OUT -->
        <!-- ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="<?= base_url()?>asset/be/#" data-toggle="tooltip" data-placement="bottom" title="Aduan Baru"><span class="fa fa-envelope"></span></a>
            <div class="informer informer-danger">4</div>
            <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                    <div class="pull-right">
                        <span class="label label-danger">4 new</span>
                    </div>
                </div>
                <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-online"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                        <span class="contacts-title">John Doe</span>
                        <p>Praesent placerat tellus id augue condimentum</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                        <span class="contacts-title">Dmitry Ivaniuk</span>
                        <p>Donec risus sapien, sagittis et magna quis</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-away"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                        <span class="contacts-title">Nadia Ali</span>
                        <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                    </a>
                    <a href="<?= base_url()?>asset/be/#" class="list-group-item">
                        <div class="list-group-status status-offline"></div>
                        <img src="<?= base_url()?>asset/be/assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                        <span class="contacts-title">Darth Vader</span>
                        <p>I want my money back!</p>
                    </a>
                </div>     
                <div class="panel-footer text-center">
                    <a href="<?= base_url()?>asset/be/pages-messages.html">Show all messages</a>
                </div>                            
            </div>                        
        </li>
        <!-- END ADUAN -->
        <li class="xn-icon-button pull-right">
            <a href="<?= site_url()?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Lihat Website"><span class="fa fa-globe"></span></a>                        
        </li> 
    </ul>

<?php } ?>