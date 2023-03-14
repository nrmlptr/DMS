<!--create styling sheet assets/css/radiocustom.css  -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/radiocustom.css" />


<!-- Main Container -->
<main id="main-container" style="min-height: 2130px;">
	<div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/photo34@2x.jpg');">
		<div class="bg-primary-dark-op">
			<div class="content content-top text-center overflow-hidden">
				<div class="pt-50 pb-20">
					<h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Dashboard</h1>
					<h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Welcome to your custom panel!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<h2 class="content-heading">Documents Lisensi K3L</h2>
		
		<!-- Dynamic Table Full -->
		<div class="block">
			<div class="block-header block-header-default">
				<h3 class="block-title">Documents<small></small></h3>
			</div>
			<div class="block-content block-content-full">
				<div class="col-12">
					<br>
				</div>
				<!-- create tombol import to database on right side -->
				<div class="col-12 text-right">
					<button type="button" class="btn btn-alt-primary" id="exports-table-lisensi">Exports All</button>
					<!-- create whitespace -->

				</div>
				<div class="col-12">
					<br>
				</div>
				<!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
				<table class="table table-bordered table-striped table-vcenter js-dataTable-full">
					<thead>
						<tr>
							<th class="text-center"></th>
							<th class="d-none d-sm-table-cell">Jenis Lisensi</th>
							<th class="d-none d-sm-table-cell">Nama</th>
							<th class="d-none d-sm-table-cell" style="width: 15%;">Seksi</th>
							<th class="text-center" style="width: 15%;">NPK</th>
							<th class="text-center" style="width: 15%;">No SIO</th>
							<th class="text-center" style="width: 15%;">Masa Berlaku</th>
							<th class="text-center" style="width: 15%;">Status</th>
							<th class="text-center" style="width: 20%;">Action</th>

						</tr>
					</thead>
					<tbody>
						<?php
							$index = 0;
							foreach ($documents_lisensi as $item) {
								$index++;
							?>
							<tr>
								<td class="text-center"><?php echo $index; ?></td>
								<td class="d-none d-sm-table-cell"><?php echo $item['jenis_lisensi']; ?></td>
								<td class="d-none d-sm-table-cell"><?php echo $item['nama']; ?></td>
								<td class="d-none d-sm-table-cell"><?php echo $item['seksi']; ?></td>
								<td class="d-none d-sm-table-cell"><?php echo $item['npk']; ?></td>
								<td class="d-none d-sm-table-cell"><?php echo $item['no_sio']; ?></td>

								<td class="d-none d-sm-table-cell">
									<!-- if status expired show date iwth badge danger  else primary  when expired this will go to notify/:id  -->
									<?php
										if ($item['status'] == 'expired') {
											// its will go to notify/:id
											echo '<a href="' . base_url('notifyLisensi/' . $item['id_document_lisensi']) . '">';
											echo '<span class="badge badge-danger">' . $item['masa_berlaku'] . '</span>';
											echo '</a>';
										} else {
											echo '<span class="badge badge-primary">' . $item['masa_berlaku'] . '</span>';
										}
									?>

								</td>
								<td class="d-none d-sm-table-cell text-center">
									<?php
										switch ($item['status']) {
											case 'active' :
												echo '<span class="badge badge-success">Aktif</span>';
												break;
											case 'processing':
												echo '<span class="badge badge-warning">Sedang diproses</span>';
												break;
											case 'expired':
												echo '<span class="badge badge-danger">Tidak Aktif</span>';
												break;
										}
									?>
								</td>

								<td class="text-center">
									<!-- create button for flip status from active to processing and vice versa if status is not expired -->
									<?php if ($item['status'] != 'expired') { ?>
										<a href="<?php echo base_url('document/flip_status_lisensi/' . $item['id_document_lisensi']); ?>" data-toggle="tooltip-lisensi" title="Tombol ini digunakan untuk mengubah status dari diproses menjadi aktif ataupun sebaliknya" class="btn btn-sm btn-primary">
											<i class="fa fa-exchange"></i>
										</a>
									<?php } ?>
									<!-- create button for upload when click it will show modal to upload pdf and save by index of documents -->
									<button type="button" class="btn btn-sm btn-primary" data-id="<?php echo $item['id_document_lisensi']; ?>" data-name="<?php echo $item['jenis_lisensi']; ?>" data-toggle="modal" data-target="#modal-block-upload-lisensi">
										<i class="fa fa-upload"></i>
									</button>
									<!-- create button for download if $item['filename'] is not empty or null -->
									<?php if ($item['filename'] != null || $item['filename'] !== '') { ?>
										<a href="<?php echo base_url('uploadLisensi/' . $item['filename']); ?>" class="btn btn-sm btn-primary" download>
											<i class="fa fa-download"></i>
										</a>
									<?php } ?>
									<!-- create button for delete link to /delete/<base64_id> -->
									<a href="<?php echo base_url('deleteLisensi/' . base64_encode($item['id_document_lisensi'])); ?>" class="btn btn-sm btn-danger" data-toggle="tooltip-lisensi" title="Tombol ini digunakan untuk menghapus data">
										<i class="fa fa-trash"></i>
									</a>
									<!-- create button for edit masa berlaku to /editLisensi/(:any) -->
									<?php if($item['status'] == 'expired'){?>
										<a href="<?php echo base_url('document/editLisensi/' . ($item['id_document_lisensi'])); ?>" class="btn btn-sm btn-warning" data-toggle="tooltip-lisensi" title="Tombol ini digunakan untuk edit masa berlaku data">
											<i class="fa fa-edit"></i>
										</a>
									<?php } ?>
								</td>
							</tr>
						<?php }  ?>
					</tbody>
				</table>
			</div>
			<!-- modal for upload file by index of documents  -->
			<!-- using post url 'upload/:id' -->
			<div class="modal" id="modal-block-upload-lisensi" tabindex="-1" role="dialog" aria-labelledby="modal-block-upload-lisensi" aria-hidden="true">
				<div class="modal-dialog modal-dialog-top modal-lg" role="document">
					<div class="modal-content">
						<form action="<?php echo base_url('uploadLisensi'); ?>" id="form-modal-upload-lisensi" method="post" enctype="multipart/form-data">
							<div class="block block-themed block-transparent mb-0">
								<div class="block-header bg-primary-dark">
									<h3 class="block-title">Upload File</h3>
									<div class="block-options">
										<button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
											<i class="fa fa-fw fa-times"></i>
										</button>
									</div>
								</div>
								<div class="block-content">
									<divxw class="form-group">
										<label for="example-file-input">File</label>
										<input type="file" id="example-file-input" name="fileLisensi">
								</div>
							</div>
							<div class="block-content block-content-full text-right border-top">
								<button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-sm btn-primary" id="btn-modal-upload-document-lisensi"><i class="fa fa-check mr-1"></i>Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END Page Content -->
</main>
<script src="<?= base_url(). 'assets/js/codebase.core.min.js'?>"></script>

<!--
Codebase JS

Custom functionality including Blocks/Layout API as well as other vital and optional helpers
webpack is putting everything together at assets/_es6/main/app.js
-->
<!-- <script src="assets/js/codebase.app.min.js"></script>

Page JS Plugins
Page JS Code -->
<!-- <script src="assets/js/pages/be_tables_datatables.min.js"></script>
<script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script> -->

<!-- END Main Container -->
