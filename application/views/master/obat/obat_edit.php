<div class="container">
	<div class="row">

		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Edit Data Master obat</b></h3>
				</div>
				<div class="panel-body">
					<?php echo form_open('master_obat/ubah/'.$query->obat_id);?>
					<table class="table table-striped">
						<tr>
							<th>Nama Obat</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'nama_obat',
								'class'=>'form-control',
								'id'=>'nama_obat',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'value' => $query->nama_obat));?>
							</th>
						</tr>
                        <tr>
                            <th>Harga Obat</th>
                            <th>:</th>
                            <th><?php echo form_input(array(
                                    'name'=>'harga_obat',
                                    'class'=>'form-control',
                                    'id'=>'harga_obat',
                                    'autofocus'=>'autofocus',
                                    'required'=>'required',
                                    'value' => $query->harga_obat));?>
                            </th>
                        </tr>
						<tr>
							<th>Cara pakai obat</th>
							<th>:</th>
							<th><?php echo form_input(array(
								'name'=>'cara_pakai_obat',
								'class'=>'form-control',
								'id'=>'cara_pakai_obat',
								'autofocus'=>'autofocus',
								'required'=>'required',
								'value' => $query->cara_pakai_obat));?>
							</th>
						</tr>
							
										<tr>
											<th colspan="3">
												<?php echo form_submit(array(
													'name'=>'submit',
													'id'=>'submit',
													'value'=>'Simpan Data',
													'class'=>'btn btn-success'
													));?>
													<?php echo anchor('master_obat','Kembali',array('class'=>'btn btn-danger'));?>
												</th>
											</tr>

										</table>
									</div>
								</div>
							</div>

						</div>
					</div>