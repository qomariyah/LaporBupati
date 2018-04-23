<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title; ?></title>
	<!-- META TAGS -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- FAV ICON(BROWSER TAB ICON) -->
	<link rel="shortcut icon" href="<?php echo base_url() ?>asset/fe/images/fav.ico" type="image/x-icon">
	<!-- GOOGLE FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins%7CQuicksand:500,700" rel="stylesheet">
	<!-- FONTAWESOME ICONS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>asset/fe/css/font-awesome.min.css">
	<!-- ALL CSS FILES -->
	<link href="<?php echo base_url() ?>asset/fe/css/materialize.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asset/fe/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>asset/fe/css/bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
	<link href="<?php echo base_url() ?>asset/fe/css/responsive.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]> 
	<script src="<?php echo base_url() ?>asset/fe/js/html5shiv.js"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/respond.min.js"></script>

	[endif]-->

	<script src="<?php echo base_url() ?>asset/fe/js/jquery.min.js"></script>
</head>

<body data-ng-app="">
	<!--MOBILE MENU-->
	<?php $this->load->view('view_front/header'); ?>
	<!--HEADER SECTION-->

	<section>
		<!--TOP SECTION-->
		<?php $this->load->view('view_front/top_section'); ?>
		<!--TOP SECTION-->

		<!-- Page Content-->
		<?php
			if ($content == 'home'){
				$this->load->view('view_front/mid_section');
			} else if ($content == 'tentang-lb') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'kontak') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'profil') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'aduan') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'detail-aduan') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'petunjuk-dan-syarat') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'data-opd') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'detail-opd') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'lihat-aduan-saya') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'login') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'forget-password') {
				$this->load->view('view_front/mid_section');
			} else if ($content == 'register') {
				$this->load->view('view_front/mid_section');
			}
		?>
		<!-- End Page Content-->
		
		<!-- Bottom Section-->
		<!-- End Bottom Section-->
				
	</section>
	<!--END HEADER SECTION-->
	
	<?php $this->load->view('view_front/footer'); ?>

	<section>
		<!-- LOGIN SECTION -->
		<?php $this->load->view('view_front/login'); ?>
		<!-- END LOGIN SECTION -->

		<!-- REGISTER SECTION -->
		<?php $this->load->view('view_front/register'); ?>
		<!-- END REGISTER SECTION -->

		<!-- FORGOT PASSWORD SECTION -->
		<?php $this->load->view('view_front/lupa_katasandi'); ?>
		<!-- END FORGOT PASSWORD SECTION -->
	</section>

	<!--ALL SCRIPT FILES-->
	<script src="<?php echo base_url() ?>asset/fe/js/jquery-ui.js"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/angular.min.js"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/materialize.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/jquery.mixitup.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() ?>asset/fe/js/custom.js"></script>
	
    <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/jquery.noty.js'></script>
    <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/layouts/topRight.js'></script>           
    <script type='text/javascript' src='<?= base_url()?>asset/be/js/plugins/noty/themes/default.js'></script>

    <?php
        $notif = $this->session->flashdata('notif');
        $type = $this->session->flashdata('type');
        if ($this->session->flashdata('notif')) { ?>
            <script type="text/javascript">    
                noty({
                    text: '<?= $notif ?>',
                    layout: 'topRight',
                    timeout: 5000,
                    type: '<?= $type ?>'
                })                                               
            </script>
    <?php } ?>

</body>

</html>