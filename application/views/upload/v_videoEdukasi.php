 <!--create styling sheet assets/css/radiocustom.css  -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/radiocustom.css" />

 <!-- Main Container -->
 <main id="main-container" style="min-height: 2130px;">
     <div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/wwt3.jpg');">
         <div class="bg-primary-dark-op">
             <div class="content content-top text-center overflow-hidden">
                 <div class="pt-50 pb-20">
                     <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear"
                         data-class="animated fadeInUp">Dashboard</h1>
                     <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear"
                         data-class="animated fadeInUp">Welcome to your custom panel!</h2>
                 </div>
             </div>
         </div>
     </div>
     <div class="content">
         <h2 class="content-heading">Management K3L</h2>

         <!-- Dynamic Table Full -->
         <div class="block">
             <div class="block-header block-header-default">
                 <h3 class="block-title">Video Edukasi LK3<small></small></h3>
             </div>
             <div class="block-content block-content-full">
                 <div class="col-12">
                     <br>
                 </div>
                 <!-- create tombol import to database on right side -->
                 <div class="col-12 text-right">
                     <!-- <button type="button" class="btn btn-alt-primary" id="exports-table">Exports All</button> -->
                     <!-- create whitespace -->
                 </div>
                 <div class="col-12">
                     <br>
                 </div>
                 <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                 <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                     <thead>
                         <tr>
                             <!-- <th class="text-center"></th> -->
                             <th class="d-none d-sm-table-cell" style="width: 5%;">No</th>
                             <th class="d-none d-sm-table-cell" style="width: 20%;">Kode Video</th>
                             <th class="d-none d-sm-table-cell" style="width: 20%;">Nomor Video</th>
                             <th class="text-center">Nama Video</th>
                             <th class="text-center">Keterangan</th>
                             <th class="text-center" style="width: 15%;">Action</th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php
							$loop = 1;

							foreach ($videoEdukasi->result() as $row) { ?>
                         <tr>
                             <td class="d-none d-sm-table-cell"><?= $loop++ ?></td>
                             <td class="d-none d-sm-table-cell"><?= $row->kd_video ?></td>
                             <td class="d-none d-sm-table-cell"><?= $row->no_video ?></td>
                             <td class="d-none d-sm-table-cell"><?= $row->judul_video ?></td>
                             <td class="d-none d-sm-table-cell"><?= $row->keterangan_video ?></td>
                             <td class="d-none d-sm-table-cell" align="center">
                                 <a href="<?= base_url('Unggah/downloadVIDEO/' . $row->id_video) ?>"
                                     class="btn btn-success" title="Download Video Edukasi">
                                     <i class="fa fa-download"></i>
                                 </a>
                                 <a href="<?= base_url('Unggah/deleteVideoById/' . $row->id_video) ?>"
                                     class="btn btn-danger" title="Delete Video Edukasi"
                                     onclick="return confirm('Yakin Akan Menghapus Video Edukasi?')">
                                     <i class="fa fa-trash"></i>
                                 </a>
                             </td>
                         </tr>
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <!-- END Page Content -->


 </main>
 <script src="assets/js/codebase.core.min.js"></script>

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