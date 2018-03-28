
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?= $title ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url() ?>asset/be/Favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url() ?>asset/be/css/theme-blue.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <div class="login-container">
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <?php $notif = $this->session->flashdata('error') ?>
                <div class="login-body">
                    <div class="login-title"><strong>Selamat Datang</strong>, Silahkan login</div>
                    <form action="<?= base_url('sysadminlogin/auth') ?>" class="form-horizontal" method="POST">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" name="username" required class="form-control" placeholder="Username" autocomplete="off" autofocus />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" name="password" required class="form-control" placeholder="Password" autocomplete="off" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <?= $image ?>
                                <div class="col-md-7 pull-right">
                                    <input type="text" name="captcha" required class="form-control" placeholder="Ketikkan kode" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <a href="#" class="btn btn-link btn-block">Lupa kata sandi? klik di sini.</a>
                            </div>
                            <div class="col-md-6">
                                <input type="submit" class="btn btn-info btn-block" value="Log In">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?= date('Y') ?> Lapor Bupati
                    </div>
                    <div class="pull-right">
                        <a href="#">Tentang</a> |
                        <a href="#">Privacy Policy</a> |
                        <a href="#">Hubungi Kami</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
        <script type="text/javascript" src="<?= base_url()?>asset/be/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url()?>asset/be/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url()?>asset/be/js/plugins/bootstrap/bootstrap.min.js"></script>   
        <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/jquery.noty.js'></script>
        <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/layouts/topRight.js'></script>           
        <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/themes/default.js'></script>
        <?php
            if ($this->session->flashdata('error')) { ?>
                <script type="text/javascript">    
                    noty({
                        text: '<?php echo $notif ?>',
                        layout: 'topRight',
                        timeout: 3000,
                        type: 'error'
                    })                                               
                </script>
        <?php } ?>
</html>