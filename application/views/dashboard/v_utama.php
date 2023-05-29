<!--create styling sheet assets/css/radiocustom.css  -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/radiocustom.css" />

<body onload="startTime()">
    <!-- Main Container -->
    <main id="main-container" style="min-height: 2130px;">
        <div class="bg-image bg-image-bottom" style="background-image: url('assets/media/photos/wwt3.jpg');">
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
                            <span class="count_top"><i class="fa fa-user"></i> Total Pengguna Portal</span> : <?= $on.' Orang'?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div  class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-success mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen Manual</h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_manual) as jumlah FROM manual")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-secondary mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen SOP</h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_sop) as jumlah FROM berkas")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-success mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen IK</h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_ik) as jumlah FROM ik")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-secondary mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen Form</h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_form) as jumlah FROM form")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div  class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-secondary mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Video Edukasi K3 </h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_video) as jumlah FROM videoedukasi")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-success mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen IAD K3 & Lingkungan </h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_iad) as jumlah FROM berkas_iad")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="col-md-3 col-sm-2 mt-2">
                        <div class="card text-white bg-secondary mb-3 col-md-3 col-sm-3" style="max-width: 18rem;">
                            <div class="card-header">  <br>
                                <div class="card-body">
                                    <h5 class="card-title">Total Dokumen MSDS & Safety Sign</h5><hr>
                                    <h1 align="center">
                                        <?php
                                            $total = $this->db->query("SELECT COUNT(id_msds) as jumlah FROM berkas_msds")->result();
                                            foreach ($total as $row) {
                                                echo  "<div class='text-value'>$row->jumlah</div>";
                                            }
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
</body>

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
