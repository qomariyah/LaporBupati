<?php if ($content == 'tambah-masukan') { ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form method="POST" action="<?= site_url('sysopd/masukan/create') ?>">
	            <div class="panel panel-colorful">
	                <div class="panel-body">
	                    <h3 align="center"><?= $breadcrumb ?></h3>
	                    <p>Bantu kami dalam menyempurnakan aplikasi dengan memberikan masukan, kritik, dan saran</p>
	                    <div class="form-group">
	                        <label>E-mail</label>
	                        <input type="email" class="form-control" name="email" required readonly value="<?= $this->session->userdata('email_opd') ?>">
	                    </div>                              
	                    <div class="form-group">
	                        <label>Pesan</label>
	                        <textarea class="form-control" required autofocus name="masukan" placeholder="Pesan" rows="5"></textarea>
	                    </div>                                
	                </div>
	                <div class="panel-footer">
	                    <input type="submit" class="btn btn-success pull-right" value="Kirim">
	                </div>
	            </div>
            </form>>
        </div>
    </div>
<?php } ?>