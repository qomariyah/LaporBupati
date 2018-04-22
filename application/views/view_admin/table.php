<?php if ($content == 'sektor') { ?>	
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title"><?= $breadcrumb ?></h3>
					<?= @$status ?>
					<div class="pull-right">
						<a href="<?= site_url('sysadmin/sektor/tambah') ?>" class="btn btn-rounded btn-success" data-toggle="tooltip" data-placement="left" title="Tekan untuk menambah data">Tambah</a>
					</div>                              
				</div>
				<div class="panel-body">
					<table class="table datatable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Sektor</th>
								<th>Dibuat</th>
								<th>Diubah</th>
								<th>Oleh</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($data_sektor as $row) { ?>
							<tr>
								<td><?php p($no) ?></td>
								<td><?php p($row->sektor) ?></td>
								<td><?= time_ago($row->dibuat) ?></td>
								<td><?= time_ago($row->diubah) ?></td>
								<td><?= $row->nama_admin ?></td>
								<td>
									<a href="<?= site_url('sysadmin/sektor/edit/'.$row->id_sektor) ?>" class="btn btn-xs btn-rounded btn-info" data-toggle="tooltip" data-placement="top" title="Tekan untuk mengedit data">Edit</a>
									<a href="#" class="btn btn-xs btn-rounded btn-danger mb-control" data-toggle="tooltip" data-placement="top" title="Tekan untuk menghapus data" data-box="#mb-<?= $no ?>">Hapus</a> 
									
									<!-- Modal delete SEKTOR -->
							        <div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb-<?= $no ?>">
							            <div class="mb-container">
							                <div class="mb-middle">
							                    <div class="mb-title"><span class="fa fa-trash-o"></span> Hapus <strong>Data</strong> ?</div>
							                    <div class="mb-content">
							                        <p>Apakah Anda yakin akan menghapus data dari sistem?</p>                    
							                        <p>Berhati-hatilah, data mungkin tidak bisa dikembalikan!.</p>
							                    </div>
							                    <div class="mb-footer">
							                        <div class="pull-right">
							                            <form action="<?= site_url('sysadmin/sektor/delete') ?>" method="POST">
															<input type="hidden" name="id_sektor" value="<?php p($row->id_sektor) ?>">
															<input type="hidden" name="sektor" value="<?php p($row->sektor) ?>">
															<input type="submit" class="btn btn-danger btn-lg" value="Ya">
							                            	<button class="btn btn-info btn-lg mb-control-close">Tidak</button>
														</form>
							                        </div>
							                    </div>
							                </div>
							            </div>
							        </div>
							        <!-- Modal delete SEKTOR -->
							    </td>
							</tr>
							<?php $no++; } ?>
                        </tbody>
					</table>
				</div>
			</div>
        <!-- END DEFAULT DATATABLE -->               
      	</div>
    </div>
<?php } ?>

<?php if ($content == 'masukan') { ?>	
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title"><?= $breadcrumb ?></h3>
					<?= @$status ?>
					<div class="pull-right">
						<a href="<?= site_url('sysadmin/masukan/tambah') ?>" class="btn btn-rounded btn-success" data-toggle="tooltip" data-placement="left" title="Tekan untuk menambah data">Tambah</a>
					</div>                              
				</div>
				<div class="panel-body">
					<table class="table datatable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Email</th>
								<th>Masukan</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($datamasukan as $row) { ?>
							<tr>
								<td><?= p($no) ?></td>
								<td><?= p($row->email) ?></td>
								<td><?= p($row->masukan) ?></td>
								<td><?= time_ago($row->dibuat) ?></td>
								<td>
									<a href="#" class="btn btn-xs btn-rounded btn-danger mb-control" data-toggle="tooltip" data-placement="top" title="Tekan untuk menghapus data" data-box="#mb-<?= $no ?>">Hapus</a> 
									
									<!-- Modal delete MASUKAN -->
							        <div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb-<?= $no ?>">
							            <div class="mb-container">
							                <div class="mb-middle">
							                    <div class="mb-title"><span class="fa fa-trash-o"></span> Hapus <strong>Data</strong> ?</div>
							                    <div class="mb-content">
							                        <p>Apakah Anda yakin akan menghapus data dari sistem?</p>                    
							                        <p>Berhati-hatilah, data mungkin tidak bisa dikembalikan!.</p>
							                    </div>
							                    <div class="mb-footer">
							                        <div class="pull-right">
							                            <form action="<?= site_url('sysadmin/masukan/delete') ?>" method="POST">
															<input type="hidden" name="id" value="<?php p($row->id_masukan) ?>">
															<input type="submit" class="btn btn-danger btn-lg" value="Ya">
							                            	<button class="btn btn-info btn-lg mb-control-close">Tidak</button>
														</form>
							                        </div>
							                    </div>
							                </div>
							            </div>
							        </div>
							        <!-- Modal delete MASUKAN -->
							    </td>
							</tr>
							<?php $no++; } ?>
                        </tbody>
					</table>
				</div>
			</div>
        <!-- END DEFAULT DATATABLE -->               
      	</div>
    </div>
<?php } ?>