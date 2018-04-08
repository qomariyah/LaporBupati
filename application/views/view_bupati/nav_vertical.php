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