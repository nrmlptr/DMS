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
        <h2 class="content-heading">Proses WWT - EHS Dept</h2>

        <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Input Proses WWT<small></small></h3>
                <a class="close-link" href="<?= base_url('ShowWWT')?>"><i class="fa fa-close"></i></a>
            </div>
            <div class="block-content block-content-full">
                <div class="col-12">
                    <br>
                </div>
                <div class="col-12">
                    <br>
                </div>
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <div>
                    <div>
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
                                <div class="justify-content-center mt-8">
                                    <form id="demo-form" method="POST" action="<?= base_url('loadMat');?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id" id="">
                                        <div class="table-responsive">
                                            <table class="table" id="multiple_input">
                                                <tr>
                                                    <td>
                                                        <select name="addmore[][material_id]" id="material_id" class="form-control material_id_list">
                                                            <option value="0">-PILIH-</option>
                                                            <?php foreach($dataMaterial as $row):?>
                                                                <option value="<?php echo $row->id_material;?>"><?php echo $row->material;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="addmore[][nm_user]" placeholder="Nama User" class="form-control nm_user_list" required="" /></td>
                                                    <td><input type="text" name="addmore[][jml_pemakaian]" placeholder="Jumlah Pemakaian" class="form-control jml_pemakaian_list" required="" /></td>
                                                    <td><input type="date" name="addmore[][tanggal_pemakaian]" placeholder="Tanggal Pemakaian" class="form-control tanggal_pemakaian_list" required="" /></td>
                                                    <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>
                                                </tr>
                                            </table>
                                            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Simpan" />
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
<script src="<?= base_url(). 'assets/js/codebase.core.min.js'?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('#btnAlert').on('click',function(){
        Swal.fire({
            title: 'Menambah Data',
            text: "Tambah Data Karyawan ?",
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

    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#multiple_input').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="addmore[][material_id]" id="material_id" class="form-control material_id_list"><option value="0">-PILIH-</option><?php foreach($dataMaterial as $row):?><option value="<?php echo $row->id_material;?>"><?php echo $row->material;?></option><?php endforeach;?></select></td><td><input type="text" name="addmore[][nm_user]" placeholder="Nama User" class="form-control nm_user_list" required="" /></td><td><input type="text" name="addmore[][jml_pemakaian]" placeholder="Jumlah Pemakaian" class="form-control jml_pemakaian_list" required="" /></td><td><input type="date" name="addmore[][tanggal_pemakaian]" placeholder="Tanggal Pemakaian" class="form-control tanggal_pemakaian_list" required="" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
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
