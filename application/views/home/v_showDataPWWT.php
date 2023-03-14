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
        <h2 class="content-heading">Data WWT - EHS Dept</h2>

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Data Penggunaan Material - Proses WWT<small></small></h3>
                <!-- <a class="btn btn-app" href="<?= base_url('addKar');?>">
                    <i class="fa fa-plus"></i> Add
                </a> -->
            </div>
            <div class="block-content block-content-full">
                <div class="col-12">
                    <br>
                </div>
                <!-- create tombol import to database on right side -->
                <div class="col-12 text-right">
                    <button type="button" class="btn btn-alt-primary" id="exports-table-proseswwt">Exports All</button>
                    <!-- create whitespace -->
                </div>
                <div class="col-12">
                    <br>
                </div>
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr align="center">
                            <!-- <th class="text-center"></th> -->
                            <th class="d-none d-sm-table-cell" style="width: 5%;">No</th>
                            <th class="d-none d-sm-table-cell" style="width: 7%;">Tanggal Pemakaian</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Nama Karyawan</th>
                            <th class="text-center">Nama Material</th>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Jumlah Pemakaian</th>
                            <!-- <th class="text-center" style="width: 15%;">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $loop = 1;

                            foreach($dataProses as $row){ ?>
                            <tr>
                                <td><?= $loop++?></td>
                                <td><?= date('d-m-Y', strtotime($row->tanggal_pemakaian))?></td>
                                <td><?= $row->nm_user?></td>
                                <td><?= $row->material?></td>
                                <td><?= $row->jml_pemakaian?></td>
                                <!-- <td align="center">
                                    <a class="btn btn-app" href="<?= base_url('Produksi/editProsesWWT/'.$row->id);?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-app" href="<?= base_url('Produksi/deleteProsesWWTById/'.$row->id);?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td> -->
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
