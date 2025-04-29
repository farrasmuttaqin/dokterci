<script type="text/javascript">
	function hapusobat(noreg, pasien_id, obat_id){
		if(confirm('Yakin mau menghapus data ini?')){
			$(document).ready(function(){
				$.ajax({
					url : '<?php echo site_url();?>/terapi/hapusobat/'+noreg+'/'+pasien_id+'/'+ obat_id,
					beforeSend:function(){
						$('#dataobat').html('<center><img src="<?php echo base_url();?>assets/img/loading-gede.gif"></center>');
						$('#dataobat').fadeIn(2500);
					},
					success:function(){
						$("#dataobat").load("<?php echo site_url(); ?>/terapi/tampilobat/"+noreg);
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
			<td><?php echo $row->nama_obat;?></td>
			<td>
				<a href="#" onclick="hapusobat('<?php echo $row->no_reg;?>','<?php echo $row->pasien_id;?>','<?php echo $row->obat_id ?>')" title="Hapus Data Obat" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
		<?php
	endforeach;
}
?>
</table>