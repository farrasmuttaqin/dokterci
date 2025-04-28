<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
	  		<div class="panel-heading">
	    		<h3 class="panel-title"><b>Data Master obat</b></h3>
	  		</div>
	  		<div class="panel-body">
		  		<?php echo anchor('master_obat/tambah_obat','<i class="glyphicon glyphicon-ok"></i> Tambah Data Master obat',array('class'=>'btn btn-primary btn-md'));?>
		  		<?php echo anchor('master_obat/cetak','<i class="glyphicon glyphicon-print"></i> Cetak Data Master obat',array('class'=>'btn btn-primary btn-md', 'target'=>'_blank'));?>
	  			
	  			<hr>
	  			<?php echo $this->session->flashdata('pesan');?>
		  		<div id="unseen">
	    		<table class="table table-bordered table-hover table-condensed order-table" id="master-obat">
				<thead>
					<tr>
					<th width="12%">Nama</th>
					<th>Harga</th>
                    <th>Cara pakai</th>
					<th width="15%">Kelola</th>
		 			</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
			<ul class="pagination pagination-large pull-right">
				<?php // echo $halaman;?>
			</ul>
			</div>
	 	</div>
	</div>
</div>

	</div>
</div>