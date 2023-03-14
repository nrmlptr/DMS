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
        <h2 class="content-heading">Upload Document - Management K3L</h2>

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Upload IAD K3 & Lingkungan<small></small></h3>
            </div>
            <div class="block-content block-content-full">
                <div class="col-12">
                    <br>
                </div>
                <div class="col-12">
                    <br>
                </div>
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <!-- <h2>Form Upload Document</h2> -->
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php 
                                    if (isset($error)) {
                                        echo "ERROR UPLOAD : </br>";
                                        print_r($error);
                                        echo "</hr>";
                                    }
                                ?>
                                <!-- start form for validation -->
                                <div class="row col-sm-10 justify-content-center mt-8">
                                    <form id="demo-form" method="POST" action="<?= base_url('prosesUploadIAD');?>" enctype="multipart/form-data">
                                        <div class="container">
                                            <div class="row">
                                                <label for="kd_berkas_iad">Kode Document * :</label>
                                                <input type="text" id="kd_berkas_iad" class="form-control" name="kd_berkas_iad" value="<?= $kd_berkas_iad?>" readonly/>

                                                <label for="no_berkas_iad">Nomor Document * :</label>
                                                <input type="text" id="no_berkas_iad" class="form-control" name="no_berkas_iad" required/>

                                                <label for="judul_berkas_iad">Nama Document * :</label>
                                                <input type="text" id="judul_berkas_iad" class="form-control" name="judul_berkas_iad" required/>

                                                <label for="ik">Berkas * :</label>
                                                <input type="file" id="berkas_iad" class="form-control" name="berkas_iad" required />

                                                <label for="keterangan_berkas_iad">Keterangan * :</label>
                                                <textarea id="keterangan_berkas_iad" required="required" class="form-control" name="keterangan_berkas_iad"></textarea>
                                            </div>
                                        </div>
                                        

                                        
                                        <br />
                                        <!-- <button class="btn btn-primary" type="submit">Simpan</button> -->
                                        <div class="col-md-6 mt-4">
                                            <button type="submit" id="btn" class="form-control btn btn-primary d-none">Upload</button>
                                            <button type="button" id="btnAlert" class="btn btn-primary">Upload</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- end form for validations -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
<script src="assets/js/codebase.core.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('#btnAlert').on('click',function(){
        Swal.fire({
            title: 'Menambah Data',
            text: "Upload Document Pada Sistem ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#btn').click();
                Swal.fire('Berhasil Upload!', '', 'success')
            }
        })
    });
</script>

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
