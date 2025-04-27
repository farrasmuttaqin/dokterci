<script type="text/javascript">
	function hapus(noreg, pasien_id, diagnosa, tanggal_periksa){
		if(confirm('Yakin mau menghapus data ini?')){
			$(document).ready(function(){
				$.ajax({
					url : '<?php echo site_url();?>/terapi/hapusdiagnosa/'+noreg+'/'+pasien_id+'/'+ diagnosa+'/'+tanggal_periksa,
					beforeSend:function(){
						$('#datadiagnosa').html('<img src="<?php echo base_url();?>assets/img/loading-gede.gif">');
						$('#datadiagnosa').fadeIn(2500);
					},
					success:function(){
						$("#datadiagnosa").load("<?php echo site_url(); ?>/terapi/tampildiagnosa/"+noreg);
						$("#notif").html('Data berhasil dihapus');                  
						$("#notif").fadeIn(2500);
						$("#notif").fadeOut(2500);
					}
				});
			});
		}
	}

</script>
<table class="table table-striped">
<?php
if(empty($query)){
	echo '<tr class="danger"><th>Data tidak tersedia</th></tr>';
}else{
	
	foreach($query as $row):
		?>
		
		<tr>
			<td><?php echo $row->kode_icd;?> - <?php echo $row->nama_penyakit;?></td>
			<td>
				<a href="#" onclick="hapus('<?php echo $row->no_reg;?>','<?php echo $row->pasien_id;?>','<?php echo $row->diagnosa ?>','<?php echo $row->tanggal_periksa ?>')" title="Hapus Data Diagnosa" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
		<?php
	endforeach;
}
?>
</table>