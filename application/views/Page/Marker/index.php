<div class="row">
	<div class="col-md-3">

		<div class="wrapper">
			<!-- Nav 2 - Vertical left -->
			<nav class="nav nav2">
				<a href="<?= base_url('Marker'); ?>" class="nav-item act" data-color="#663399">Pengaturan Marker</a>
				<a href="<?= base_url('Kecamatan'); ?>" class="nav-item" data-color="#446A46">Data Kecamatan</a>
				<a href="<?= base_url('Info_grafis'); ?>" class="nav-item" data-color="#446A46">Informasi</a>
				<a href="<?= base_url('UserRole'); ?>" class="nav-item" data-color="#446A46">User</a>
			</nav>
			<!-- Nav 2 - Vertical left -->
		</div>
	</div>
	<div class="col-md-9">
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
											<th scope="col">Nama Marker</th>
											<th scope="col">Icon</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Nama Marker</th>
											<th scope="col">Icon</th>
											<th scope="col">Aksi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										$no = $this->uri->segment(3) ? $this->uri->segment(3) + 1 : 1;
										foreach ($result as $val) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $val['name'] ?? "" ?></td>
												<td><?= $val['marker'] ?? "" ?></td>
												<td>
													<button type="button" data-id="<?= $val['id_marker']; ?>" class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#m-crud">
														<i class="fa fa-edit"></i>
													</button>
													<button class="btn btn-danger btn-sm delete" data-id="<?= $val['id_marker']; ?>"><i class="fa fa-trash"></i></button>
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
	</div>
</div>


<!-- [ sample-page ] end -->
<div class="section-body">
</div>
</section>
<div class="modal fade" id="m-crud" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-md">
		<form action="<?= base_url('Marker/created'); ?>" method="post" id="formmodal" enctype="multipart/form-data">
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
								<label for="">Nama</label>
								<input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="nama icon maker">
							</div>
							<div class="form-group">
								<label for="">Upload Icon</label>
								<input type="file" class="form-control form-control-sm" name="marker" id="marker">
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