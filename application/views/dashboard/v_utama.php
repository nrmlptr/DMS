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
        <!-- <h2 class="content-heading">Management K3L</h2> -->

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <!-- <h3 class="block-title">Dashboard EHS System<small></small></h3> -->
                <div class="card">
                    <div class="card-body">
                    <span class="count_top"><i class="fa fa-user"></i> Total Karyawan EHS</span> : <?= $on.' Orang'?>
                    <!-- <div class="count"><?= $on.' Orang'?></div> -->
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="col-12">
                    <br>
                </div>
                <div class="col-12">
                    <br>
                </div>
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <!-- <div class="row" style="display: inline-block;" >
                        <div class="tile_count" style="display: inline-block;" >
                            <div class="col-md-20 col-sm-8  tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i> Total Karyawan EHS</span>
                                <div class="count"><?= $on.' Orang'?></div>
                            </div>
                        </div>
                    </div> -->
                <div class="row">
                    <div class="col-md-10 col-sm-10 mt-4">
                        <div class="">
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <!-- <h2><u>Proses WWT</u></h2> -->
                                        <ul class="nav navbar-right panel_toolbox">
                                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li> -->
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- start pop-over -->
                                        <!-- <div class="bs-example-popovers">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal Pemakaian</th>
                                                            <th>Nama Karyawan</th>
                                                            <th>Nama Material</th>
                                                            <th>Jumlah Pemakaian</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                            $loop = 1;
                                                            foreach($dataProses as $row){?>                                            
                                                                <tr>
                                                                    <td><?= $loop++?></td>
                                                                    <td><?= date('d-m-Y', strtotime($row->tanggal_pemakaian))?></td>
                                                                    <td><?= $row->nm_user?></td>
                                                                    <td><?= $row->material?></td>
                                                                    <td><?= $row->jml_pemakaian?></td>
                                                                </tr>
                                                        <?php }?>    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> -->
                                        <!-- end pop-over -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-md-2 col-sm-2 mt-4">
                        <div class="">
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><u>Stok Material</u></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li> -->
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <!-- start pop-over -->
                                        <div class="bs-example-popovers">
                                            
                                        </div>
                                        <!-- end pop-over -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    
                </div>
                
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
