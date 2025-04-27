<script type="text/javascript">
	function hapus(noreg, pasien_id, tindakan, tanggal_periksa){
		if(confirm('Yakin mau menghapus data ini?')){
			$(document).ready(function(){
				$.ajax({
					url : '<?php echo site_url();?>/terapi/hapustindakan/'+noreg+'/'+pasien_id+'/'+ tindakan+'/'+tanggal_periksa,
					beforeSend:function(){
						$('#datatindakan').html('<center><img src="<?php echo base_url();?>assets/img/loading-gede.gif"></center>');
						$('#datatindakan').fadeIn(2500);
					},
					success:function(){
						$("#datatindakan").load("<?php echo site_url(); ?>/terapi/tampiltindakan/"+noreg);
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
<tr></tr>
<?php
if(empty($query)){
	echo '<tr class="danger"><th>Data tidak tersedia</th></tr>';
}else{
	
	foreach($query as $row):
		?>
		
		<tr>
			<td><?php echo $row->nama_tindakan;?></td>
			<td>
				<a href="#" onclick="hapus('<?php echo $row->no_reg;?>','<?php echo $row->pasien_id;?>','<?php echo $row->tindakan ?>','<?php echo $row->tanggal_periksa ?>')" title="Hapus Data Diagnosa" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
		<?php
	endforeach;
}
?>
</table>