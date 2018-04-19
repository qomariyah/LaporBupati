<?php if ($content == 'tambah-administrator') { ?>
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
				<div class="panel-heading">                                
					<h3 class="panel-title"><?= $breadcrumb ?></h3>
				</div>   
				<div class="panel-body">
					<form enctype="multipart/form-data" method="POST" action="<?= site_url('sysadmin/administrator/create') ?>">
						<div class="col-md-5">
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
		                            <input type="text" name="id_admin" value="<?= $id_admin ?>" minlength="6" maxlength="6" class="form-control" required readonly placeholder="ID Admin" />
		                        </div>
		                        <span class="help-block">Hanya 6 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" autofocus name="nama_admin" maxlength="50" class="form-control" required placeholder="Nama Lengkap" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>	
		                	<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" name="username" minlength="8" maxlength="20" class="form-control" required placeholder="Username" />
		                        </div>
		                        <span class="help-block">Minimal 8 & maksimal 20 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-key"></span></span>
		                            <input type="password" name="pass" minlength="8" class="form-control" required placeholder="Password" />
		                        </div>
		                        <span class="help-block">Minimal 8 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
		                            <input type="text" name="no_telepon" maxlength="15" class="form-control number" required placeholder="No. Telepon" />
		                        </div>
		                        <span class="help-block">Maksimal 15 karakter</span>
		                	</div>
		                	<div class="form-group">                                         
			                    <div class="input-group">
			                        <select class="select" id="formGender" name="jk">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
		                        </div>
		                        <span class="help-block">Jenis Kelamin</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-align-right"></span></span>
		                            <select class="form-control select" name="level">
	                                    <option value="Super Admin">Super Admin</option>
	                                    <option value="Administartor">Administrator</option>
	                                    <option value="Admin OPD">Admin OPD</option>
	                                    <option value="Bupati">Bupati</option>
	                                </select>
		                        </div>
		                        <span class="help-block">Level user</span>
		                	</div>
		                	<div class="form-group">                                          
			                    <div class="input-group">
		                            <input type="submit" class="btn btn-success btn-rounded"  data-toggle="tooltip" data-placement="top" title="Tekan untuk menyimpan data" value="Simpan" /> &nbsp;
		                            <input type="reset" class="btn btn-danger btn-rounded" value="Reset" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengosongkan inputan" /> &nbsp;
		                            <a href="" class="btn btn-warning btn-rounded" data-toggle="tooltip" data-placement="top" title="Tekan untuk membatalkan">Batal</a>                          
		                        </div>
		                	</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" name="tmp_lahir" maxlength="50" class="col-md-6 form-control" required placeholder="Tempat Lahir" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" name="tgl_lahir" maxlength="50" class="datepicker form-control" required placeholder="Tanggal Lahir" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
		                            <input type="email" name="email" maxlength="50" class="form-control" required placeholder="Email" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-home"></span></span>
		                            <input type="text" name="alamat" maxlength="100" class="form-control" required placeholder="Alamat" />
		                        </div>
		                        <span class="help-block">Maksimal 100 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group col-md-12">
			                        <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
		                            <input type="file" name="foto" multiple class="file" data-preview-file-type="any" required />
		                        </div>
		                        <span class="help-block">Mendukung file JPG dan PNG maksimal 500KB</span>
		                	</div>
						</div>
					</form>
				</div>                         
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'edit-administrator') { ?>
	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-warning">
				<div class="panel-heading">                                
					<h3 class="panel-title"><?= $breadcrumb ?></h3>
				</div>   
				<div class="panel-body">
					<form enctype="multipart/form-data" method="POST" action="<?= site_url('sysadmin/administrator/update') ?>">
						<?php foreach ($data_admin as $row) { ?>
						<div class="col-md-5">
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
			                        <input type="hidden" name="ft" value="<?= $row->foto ?>">
			                        <input type="hidden" name="tm" value="<?= $row->thumbnail ?>">
		                            <input type="text" name="id_admin" minlength="6" maxlength="6" class="form-control" required placeholder="ID Admin" readonly value="<?= $row->id_admin ?>" />
		                        </div>
		                        <span class="help-block">Hanya 6 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" name="nama_admin" maxlength="50" class="form-control" required placeholder="Nama Lengkap" value="<?= $row->nama_admin?>" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-user"></span></span>
		                            <input type="text" name="username" minlength="8" maxlength="20" class="form-control" required placeholder="Username" value="<?= $row->username ?>" />
		                        </div>
		                        <span class="help-block">Minimal 8 & maksimal 20 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-key"></span></span>
		                            <input type="password" name="pass" minlength="8" class="form-control" placeholder="Password" />
		                        </div>
		                        <span class="help-block">Minimal 8 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-phone"></span></span>
		                            <input type="number" name="no_telepon" maxlength="15" class="form-control" required placeholder="No. Telepon" value="<?= $row->no_telepon ?>" />
		                        </div>
		                        <span class="help-block">Maksimal 15 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-align-right"></span></span>
		                            <select class="form-control select" name="level">
	                                    <option><?= $row->level ?></option>
	                                    <option>Super Admin</option>
	                                    <option>Administrator</option>
	                                    <option>Bupati</option>
	                                </select>
		                        </div>
		                        <span class="help-block">Level user</span>
		                	</div>
		                	<div class="form-group">                                          
			                    <div class="input-group">
		                            <input type="submit" class="btn btn-success btn-rounded"  data-toggle="tooltip" data-placement="top" title="Tekan untuk menyimpan data" value="Simpan" /> &nbsp;
		                            <input type="reset" class="btn btn-danger btn-rounded" value="Reset" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengosongkan inputan" /> &nbsp;
		                            <a href="" class="btn btn-warning btn-rounded" data-toggle="tooltip" data-placement="top" title="Tekan untuk membatalkan">Batal</a>                          
		                        </div>
		                	</div>
						</div>
						<div class="col-md-7">
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
		                            <input type="email" name="email" maxlength="50" class="form-control" required placeholder="Email" value="<?= $row->email ?>" />
		                        </div>
		                        <span class="help-block">Maksimal 50 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group">
			                        <span class="input-group-addon"><span class="fa fa-home"></span></span>
		                            <input type="text" name="alamat" maxlength="100" class="form-control" required placeholder="Alamat" value="<?= $row->alamat ?>" />
		                        </div>
		                        <span class="help-block">Maksimal 100 karakter</span>
		                	</div>
							<div class="form-group">                                         
			                    <div class="input-group col-md-12">
			                        <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
		                            <input type="file" name="foto" multiple class="file" data-preview-file-type="any" />
		                        </div>
		                        <span class="help-block">Mendukung file JPG dan PNG maksimal 500KB</span>
		                	</div>
						</div>
						<?php } ?>
					</form>
				</div>                         
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'tambah-sektor') { ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form class="form-horizontal" method="POST" action="<?= site_url('sysadmin/sektor/create') ?>">
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">                                                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Sektor</label>
                            <div class="col-md-6 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="text" class="form-control" name="sektor" placeholder="Nama Sektor" autofocus />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="reset" class="btn btn-danger btn-rounded" value="Kosongkan">  
                        <input type="reset" class="btn btn-warning btn-rounded" value="Batal">                                  
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Tambah">
                    </div>
                </div>
            </form>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'edit-sektor') { ?>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php foreach($data_sektor as $row) { ?>
			<form class="form-horizontal" method="POST" action="<?= site_url('sysadmin/sektor/update') ?>">
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Sektor</label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="hidden" name="id_sektor" value="<?= $row['id_sektor'] ?>">
                                    <input type="hidden" name="sektor_lama" value="<?= $row['sektor'] ?>">
                                    <input type="text" class="form-control" value="<?= $row['sektor'] ?>" name="sektor" placeholder="Nama Sektor" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Simpan" data-toggle="tooltip" data-placement="top" title="Tekan untuk menambahkan data"/>
                    </div>
                </div>
            </form>
            <?php } ?>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'tambah-opd') { ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?= site_url('sysadmin/opd/create') ?>">
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">ID. OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="text" class="form-control" value="<?= $id_opd ?>" required readonly name="id_opd" maxlength="6" minlength="6" placeholder="ID. OPD" />
                                </div>                                            
                                <span class="help-block">Hanya 6 Karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" maxlength="150" name="nama_opd" autofocus required placeholder="Nama OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 150 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Singkatan OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="singkatan_opd" required placeholder="Singkatan OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Kepala</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="kepala_opd" required placeholder="Nama Kepala" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    <input type="text" class="form-control" maxlength="100" name="alamat_opd" required placeholder="Alamat OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 100 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Foto OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
                                    <input type="file" class="form-control" name="foto" placeholder="Foto OPD" />
                                </div>                                            
                                <span class="help-block">Mendukung file JPG, JPEG dan PNG maksimal 2MB</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. Telepon OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    <input type="text" class="form-control" maxlength="15" name="telp_opd" required placeholder="No. Telepon OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email OPD</label>
                            <div class="col-md-8 col-xs-12">       
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" class="form-control" maxlength="50" name="email_opd" required placeholder="Email OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Fax OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-inbox"></span></span>
                                    <input type="text" class="form-control" maxlength="15" name="fax_opd" placeholder="Fax OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Website OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="website_opd" placeholder="Website OPD" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Deskripsi OPD</label>
                            <div class="col-md-8 col-xs-12">        
                                <div class="input-group col-md-12">
                                    <textarea class="form-control" rows="5" name="deskripsi_opd"></textarea>
                                </div>                                            
                                <span class="help-block">Deskripsi</span>
                            </div>
                        </div>
                    </div>
					<div class="form-group">   
                        <label class="col-md-3 col-xs-12 control-label">Admin OPD</label>
                        <div class="col-md-8 col-xs-12">    
	                        <div class="input-group">
	                        	<span class="input-group-addon"><span class="fa fa-align-right"></span></span>
	                            <select class="form-control select" name="id_admin">
	                        	<?php foreach ($adminopd as $opd) { ?>
	                                <option value="<?= $opd->id_admin ?>"><?= $opd->nama_admin ?></option>
	                            <?php } ?>
	                            </select>
	                        </div>
                       		<span class="help-block">Pilih Admin OPD</span>
                        </div>
                	</div>
                    <div class="panel-footer">
                        <input type="reset" class="btn btn-danger btn-rounded" value="Kosongkan" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengosongkan form">                                  
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Tambah" data-toggle="tooltip" data-placement="top" title="Tekan untuk menambahkan data">
                    </div>
                </div>
            </form>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'edit-opd') { ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?= site_url('sysadmin/opd/update') ?>">
				<?php foreach ($dataopd as $row) { ?>
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">ID. OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="hidden" name="ft_opd" value="<?= $row['foto'] ?>">
			                        <input type="hidden" name="tm_opd" value="<?= $row['thumb'] ?>">
                                    <input type="text" class="form-control" name="id_opd" placeholder="ID. OPD" required readonly value="<?= $row['id_opd'] ?>" />
                                </div>                                            
                                <span class="help-block">ID. OPD tidak dapat diubah</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" maxlength="150" name="nama_opd" placeholder="Nama OPD" required autofocus value="<?= $row['nama_opd'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 150 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Singkatan OPD</label>
                            <div class="col-md-8 col-xs-12">        
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" name="singkatan_opd" placeholder="Singkatan OPD" required maxlength="50" value="<?= $row['singkatan'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Kepala</label>
                            <div class="col-md-8 col-xs-12">       
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control" name="kepala_opd" placeholder="Nama Kepala" required maxlength="50" value="<?= $row['nama_kepala'] ?>"/>
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat OPD</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    <input type="text" class="form-control" name="alamat_opd" placeholder="Alamat OPD" required maxlength="100" value="<?= $row['alamat'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 100 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Foto OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
                                    <input type="file" class="form-control" name="foto" placeholder="Foto OPD" />
                                </div>                                            
                                <span class="help-block">Mendukung file JPG, JPEG dan PNG maksimal 2MB</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. Telepon</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    <input type="text" class="form-control" name="telp_opd" placeholder="No. Telepon" required maxlength="15" value="<?= $row['no_telp'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" class="form-control" name="email_opd" placeholder="Email OPD" required maxlength="50" value="<?= $row['email'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Fax OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-inbox"></span></span>
                                    <input type="text" class="form-control" name="fax_opd" maxlength="15" placeholder="Fax OPD" value="<?= $row['fax'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Website OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-globe"></span></span>
                                    <input type="text" class="form-control" name="website_opd" placeholder="Website OPD" maxlength="50" value="<?= $row['website'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Deskripsi OPD</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group col-md-12">
                                    <textarea class="form-control" rows="5" name="deskripsi_opd"><?= $row['deskripsi'] ?></textarea>
                                </div>                                            
                                <span class="help-block">Deskripsi</span>
                            </div>
                        </div>
                    </div>
					<div class="form-group">   
                        <label class="col-md-3 col-xs-12 control-label">Admin OPD</label>
                        <div class="col-md-8 col-xs-12">    
	                        <div class="input-group">
	                        	<span class="input-group-addon"><span class="fa fa-align-right"></span></span>
	                            <select class="form-control select" name="id_admin">
	                        	<?php foreach ($adminopd as $opd) { ?>
	                                <option value="<?= $opd->id_admin ?>"><?= $opd->nama_admin ?></option>
	                            <?php } ?>
	                            </select>
	                        </div>
                       		<span class="help-block">Pilih Admin OPD</span>
                        </div>
                	</div>
                    <div class="panel-footer">                                  
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Simpan" data-toggle="tooltip" data-placement="top" title="Tekan untuk menyimpan data">
                    </div>
                </div>
            <?php } ?>
            </form>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'tambah-user') { ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?= site_url('lbadmin/create_user') ?>">
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. KTP</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="text" class="form-control" required autofocus name="no_ktp" maxlength="16" minlength="16" placeholder="No. KTP" />
                                </div>                                            
                                <span class="help-block">Hanya 16 Karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="nama_user" required placeholder="Nama Lengkap" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-eye-slash"></span></span>
                                    <input type="password" class="form-control" maxlength="50" name="password" required placeholder="Password" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
		                            <select class="select" id="formGender" name="jk">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select> 
                                </div>                                            
                                <span class="help-block">Pilih jenis kelamin</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Tempat Lahir</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="tmp_lahir" required placeholder="Tempat Lahir" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
		                            <input type="text" name="tgl_lahir" maxlength="50" class="datepicker form-control" required placeholder="Tanggal Lahir" />
                                </div>                                            
                                <span class="help-block">Pilih tanggal lahir</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-8 col-xs-12">       
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" class="form-control" maxlength="50" name="email_user" required placeholder="Email" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. Telepon</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    <input type="text" class="form-control" maxlength="15" name="telp_user" required placeholder="No. Telepon" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="alamat" placeholder="Alamat" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Foto</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
                                    <input type="file" class="form-control" name="foto" placeholder="Foto" />
                                </div>                                            
                                <span class="help-block">Mendukung file JPG, JPEG dan PNG maksimal 1MB</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bio</label>
                            <div class="col-md-8 col-xs-12">        
                                <div class="input-group col-md-12">
                                    <textarea class="form-control" rows="5" name="bio"></textarea>
                                </div>                                            
                                <span class="help-block">Bio</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <input type="reset" class="btn btn-danger btn-rounded" value="Kosongkan" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengosongkan form">                                  
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Tambah" data-toggle="tooltip" data-placement="top" title="Tekan untuk menambahkan data">
                    </div>
                </div>
            </form>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'edit-user') { ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<form enctype="multipart/form-data" class="form-horizontal" method="POST" action="<?= site_url('lbadmin/update_user') ?>">
				<?php foreach ($datauser as $row) { ?>
                <div class="panel panel-colorful">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $breadcrumb ?></h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. KTP</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-tags"></span></span>
                                    <input type="hidden" name="ft_user" value="<?= $row['foto'] ?>">
			                        <input type="hidden" name="tm_user" value="<?= $row['thumb'] ?>">
			                        <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                                    <input type="text" class="form-control" required autofocus name="no_ktp" maxlength="16" minlength="16" placeholder="No. KTP" value="<?= $row['no_ktp'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 16 Karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama Lengkap</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="nama_user" required placeholder="Nama Lengkap" value="<?= $row['nama_user'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Password</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-eye-slash"></span></span>
                                    <input type="password" class="form-control" maxlength="50" name="password" required placeholder="Nama Lengkap" value="<?= $row['password'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Jenis Kelamin</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
		                            <select class="select" id="formGender" name="jk">
		                            	<?php if($row['jk'] == "L") {
						                	echo '<option value="L">Laki-Laki</option>';
						                	} else if($row['jk'] == "P") {
						                	echo '<option value="P">Perempuan</option>';
						                } ?>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select> 
                                </div>                                            
                                <span class="help-block">Pilih jenis kelamin</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Tempat Lahir</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-building-o"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="tmp_lahir" required placeholder="Tempat Lahir" value="<?= $row['tmp_lahir'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Tanggal Lahir</label>
                            <div class="col-md-8 col-xs-12">                                            
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
		                            <input type="text" name="tgl_lahir" maxlength="50" class="datepicker form-control" required placeholder="Tanggal Lahir" value="<?= $row['tgl_lahir'] ?>" />
                                </div>                                            
                                <span class="help-block">Pilih tanggal lahir</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Email</label>
                            <div class="col-md-8 col-xs-12">       
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                                    <input type="email" class="form-control" maxlength="50" name="email_user" required placeholder="Email" value="<?= $row['email'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No. Telepon</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                                    <input type="text" class="form-control" maxlength="15" name="telp_user" required placeholder="No. Telepon" value="<?= $row['no_telepon'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 15 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Alamat</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-home"></span></span>
                                    <input type="text" class="form-control" maxlength="50" name="alamat" placeholder="Alamat" value="<?= $row['alamat'] ?>" />
                                </div>                                            
                                <span class="help-block">Maksimal 50 karakter</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Foto</label>
                            <div class="col-md-8 col-xs-12">         
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-picture-o"></span></span>
                                    <input type="file" class="form-control" name="foto" placeholder="Foto" />
                                </div>                                            
                                <span class="help-block">Mendukung file JPG, JPEG dan PNG maksimal 1MB</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Bio</label>
                            <div class="col-md-8 col-xs-12">        
                                <div class="input-group col-md-12">
                                    <textarea class="form-control" rows="5" name="bio"><?= $row['bio'] ?></textarea>
                                </div>                                            
                                <span class="help-block">Bio</span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">                                 
                        <input type="submit" class="btn btn-success btn-rounded pull-right" value="Simpan" data-toggle="tooltip" data-placement="top" title="Tekan untuk menyimpan data">
                    </div>
                </div>
            <?php } ?>
            </form>
		</div>
	</div>
<?php } ?>

<?php if ($content == 'tambah-masukan') { ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="">
	            <div class="panel panel-colorful">
	                <div class="panel-body">
	                    <h3 align="center"><?= $breadcrumb ?></h3>
	                    <p>Bantu kami dalam menyempurnakan aplikasi dengan memberikan masukan, kritik, dan saran</p>
	                    <div class="form-group">
	                        <label>E-mail</label>
	                        <input type="email" class="form-control" placeholder="youremail@domain.com">
	                    </div>
	                    <div class="form-group">
	                        <label>Subject</label>
	                        <input type="email" class="form-control" placeholder="Message subject">
	                    </div>                                
	                    <div class="form-group">
	                        <label>Pesan</label>
	                        <textarea class="form-control" placeholder="Pesan" rows="5"></textarea>
	                    </div>                                
	                </div>
	                <div class="panel-footer">
	                    <a class="btn btn-success pull-right"><span class="fa fa-envelope-o"></span> Kirim</a>
	                </div>
	            </div>
            </form>>
        </div>
    </div>
<?php } ?>