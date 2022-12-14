<section class="section">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">

				<div class="card-header">
					<div class="flex-space-between w-100">
						<strong>Pengaturan</strong>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#m-crud"><i class="fa fa-plus"></i> Tambah Data</button>
					</div>
				</div>
				<div class="card-body">
					<div class="w-100">
						<table id="example" class="display nowrap cell-border" style="width:100%">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Config Key</th>
									<th scope="col">Config Value</th>
									<th scope="col">Table Config</th>
									<th scope="col">Sub Tabel Config</th>
									<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Config Key</th>
									<th scope="col">Config Value</th>
									<th scope="col">Table Config</th>
									<th scope="col">Sub Tabel Config</th>
									<th scope="col">Aksi</th>
								</tr>
							</tfoot>
							<tbody>
								<?php
								$no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
								foreach ($result as $val) : ?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= $val['config_key'] ?? "" ?></td>
										<td>

											<?php if ($val['type_input'] == "color") : ?>
												<span style=" padding: 5px; color: #000; background-color: <?= $val['config_value'] ?>; display: inline-block;"><?= $val['config_value'] ?? "" ?></span>
											<?php else : ?>
												<?= $val['config_value'] ?? "" ?>
											<?php endif ?>
										</td>
										<td><?= $val['table_config'] ?? "" ?></td>
										<td><?= $val['sub_tabel'] ?? "" ?></td>
										<td>
											<button type="button" data-id="<?= $val['id_config']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
												<i class="fa fa-edit"></i>
											</button>
											<button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_config']; ?>"><i class="fa fa-trash"></i></button>
										</td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<?= $this->pagination->create_links(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- [ sample-page ] end -->
<div class="section-body">
</div>
</section>
<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<form action="<?= base_url('Setting/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
			<input type="hidden" name="config" value="map">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row mb-1">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Config Key</label>
								<input type="text" class="form-control form-control-sm" name="config_key" id="config_key" placeholder="Config Key">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Type</label>
								<select class="form-control form-control-sm" name="type" id="typeInput" require>
									<option value="file">Pilih Type Input</option>
									<option value="file">File</option>
									<option value="text">Text</option>
									<option value="color">Color</option>
									<option value="date">Date</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group" id="typeInputs">
								<!-- <label for="">Config Value</label>
                                <input type="text" class="form-control form-control-sm" name="config_value" id="config_value" placeholder="Config Value"> -->
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Table Config</label>
								<input type="text" class="form-control form-control-sm" name="table_config" id="table_config" placeholder="Table Config">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label for="">Sub Tebal</label>
								<small>type json</small>
								<textarea class="form-control form-control-sm text-left" name="sub_tabel" id="sub_tabel" rows="5" placeholder="format json key & value"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>