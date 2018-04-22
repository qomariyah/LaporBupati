<?php if ($content == 'sektor') { ?>	
    <div class="row">
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
				<div class="panel-heading">                                
					<h3 class="panel-title"><?= $breadcrumb ?></h3>                           
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
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								foreach ($data_sektor as $row) { ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $row->sektor ?></td>
								<td><?= date('H:i d-m-Y', strtotime($row->dibuat)) ?></td>
								<td><?= date('H:i d-m-Y', strtotime($row->diubah)) ?></td>
								<td><?= $row->nama_admin ?></td>
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