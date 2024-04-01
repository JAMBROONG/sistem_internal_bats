<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Administrasi</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataUser')?>">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Administrasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h3 class="card-title">DataTable Administrasi</h3>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-addData"><i class="fa fa-plus"></i> add data</button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phone</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Update Date</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                                $no = 1;
                                                foreach ($dataAdministrasi as $row) {
                                                ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                                <td><?= $row['name']?></td>
                                                                <td><?= $row['phone']?></td>
                                                                <td><?= $row['email']?></td>
                                                                <td><?= date("F j, Y, g:i a",strtotime($row['update_date'])); ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?=$row['id']?>"><i class="fa fa-eye mr-1"></i> detail / edit</button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade " id="modal-detail<?=$row['id']?>">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Detail information</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h5 class="text-center">Data User</h5>
                                                                                    <div class="timeline timeline-inverse">
                                                                                        <div>
                                                                                            <i class="fas fa-user bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Name: </small>
                                                                                                    <a><?=$row['name'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-phone bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                                                    <a><?=$row['phone'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-envelope bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Email: </small>
                                                                                                    <a><?=$row['email'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-user-lock bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Position: </small>
                                                                                                    <a><?=$row['position'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-id-card bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">NIK: </small>
                                                                                                    <a><?=$row['NIK'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-credit-card bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                                                    <a><?=$row['NPWP'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-globe bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Nationality: </small>
                                                                                                    <a><?=$row['nationality'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fa fa-home bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info">
                                                                                                    <small class="text-dark text-bold">Address: </small>
                                                                                                </h3>
                                                                                                <div class="timeline-body"> <?= $row['address'] ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-center">
                                                                                        <button class="ml-1 btn btn-danger pl-3 pr-3" style="background-color: #D82724; color:white" data-toggle="modal" data-target="#modal-updateP<?=$row['id']?>"><i class="fa fa-key mr-1"></i>change password</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade " id="modal-updateP<?=$row['id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-danger">Update Password</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('SuperAdmin/processUpdatePassword/'.$row['id'])?>" method="post" id="form1">
                                                                                    <div class="form-group">
                                                                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                                                            </div>
                                                                                            <input type="password" id="pswd1" name="password" value="" class="form-control" data-original-title="" title="" placeholder="New Password">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-between">
                                                                                        <input class="btn btn-success " type="submit" value="update">
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                $no++;
                                                }
                                                ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="d-flex justify-content-start">
                                                        <a href="<?php echo base_url('Admin/dataUser')?>" class="btn btn-danger pl-3 pr-3"><i class="mr-2 fa fa-arrow-left"></i> back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <!-- modal for delete order -->
        <div class="modal fade" id="modal-addData">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header d-flex justify-content-center">
                        <h4 class="modal-title">Create Administrasi</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="<?= site_url('superAdmin/processCreateAdministrasi') ?>" method="post" enctype="multipart/form-data">
                            <div class="d-flex justify-content-center">
                                <div class="col-sm-6 text-center">
                                    <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <label for="inputName" class="col-sm-2 col-form-label">Profile</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="file">
                                    <div class="input-group">
                                        <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                        <div class="input-group-append">
                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label text-black">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label text-black">Client To</label>
                                <div class="col-sm-10">
                                    <select name="user_to_company_id" id="" class="form-control">
                                        <option value="1">PT BATS INTERNATIONAL GROUP</option>
                                        <option value="2">KAP AHR</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label text-black">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" value="" name="position" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label text-black">Phone</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputName2" value="" name="phone" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label text-black">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" value="" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label text-black">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputEmail" value="" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label text-black">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="inputEmail" value="" name="NIK" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label text-black">NPWP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" value="" name="NPWP" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label text-black">Company</label>
                                <div class="col-sm-10">
                                    <select name="company_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                        <?php
                        foreach ($company as $row) {
                            ?>
                                        <option value="<?= $row['id'] ?>">
                                            <?= $row['company'] ?>
                                        </option>
                                        <?php
                        }
                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label text-black">Nationality</label>
                                <div class="col-sm-10">
                                    <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                        <?php
                        foreach ($country as $row) {
                            
                            ?> <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> <?php
                        }
                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label text-black">Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" name="address" placeholder="Address" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        $(document).on("click", "#pilih_gambar", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>