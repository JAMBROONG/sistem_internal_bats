<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>


<body class="hold-transition sidebar-mini lyt">
    <div class="wrapper shadow rounded">

        <section class="content">
            <div class="containe-fluid">
                <div class="main-body">
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Default</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="container">
                <div class="card shadow-none">
                    <div class="card-header">
                        <div class="card-title"><strong><?=$dataType['type']?></strong></div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    create data
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?=base_url('SuperAdmin/processCreateSpt')?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Description (Indonesia)</label>
                                                <input type="text" name="description" placeholder="KAS DAN..." id="" class="form-control" required>
                                                <input type="hidden" value="<?=$dataType['id']?>" name="type_company_id" id="" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description (English)</label>
                                                <input type="text" name="description-en" placeholder="CASH AND..." id="" class="form-control" required>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="">(Japanese)</label>
                                                <input type="text" name="description-jpn" placeholder="現金と..." id="" class="form-control" required>
                                            </div>   -->
                                        </div>
                                        <!-- <div class="col">
                                            <div class="form-group">
                                                <label for="">(Korean)</label>
                                                <input type="text" name="description-kor" placeholder="현금과..." id="" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">(Chinese)</label>
                                                <input type="text" name="description-cna" placeholder="現金和..." id="" class="form-control" required>
                                            </div>
                                        </div> -->
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="my-select">Elemen</label>
                                                <select class="form-control" id="leave" name="category_element" onchange="leaveChange()">
                                                    <option value="Elemen dari Neraca">Elemen dari Neraca</option>
                                                    <option value="Elemen dari laporan Laba/Rugi">Elemen dari laporan Laba/Rugi</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="jumlah">
                                                <label for="my-select">Elemen dari Neraca</label>
                                                <select id="category_jumlah" class="form-control" name="category_jumlah">
                                                    <option value="Jumlah Asset">Jumlah Aktiva</option>
                                                    <option value="Jumlah Kewajiban dan Ekuitas">Jumlah Kewajiban dan Ekuitas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> save</button>
                                </form>
                            </div>
                        </div>
                        <h5 class="mt-5">1. ELEMEN DARI NERACA</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card table-responsive">
                                    <div class="card-header border-0">
                                        <div class="card-title ">Jumlah Asset</div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table id="table1" class="table table-light table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Description (Indonesian)</th>
                                                    <th>(English)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    $no = 1;
                                    foreach ($dataSpt as $rows) {
                                        if ($rows['category_jumlah'] != "Jumlah Asset") {
                                            continue;
                                        }
                                        ?>
                                                <tr>
                                                    <td class="text-center"><?=$no;?></td>
                                                    <td><?=$rows['description']?></td>
                                                    <td><?=$rows['description_en']?></td>
                                                    <td class="d-flex justify-content-around">
                                                        <button class="btn text-info p-0 mr-2" data-toggle="modal" data-target="#modal-update<?=$rows['id']?>"><i class="fa fa-edit"></i></button>
                                                        <!-- <button class="btn text-danger" data-toggle="modal" data-target="#modal-delete<?=$rows['id']?>"><i class="fa fa-trash"></i></button> -->
                                                    </td>
                                                </tr>
                                                
                                                <div class="modal fade" id="modal-update<?=$rows['id']?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?=base_url('SuperAdmin/processUpdateSpt')?>">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">Description (Indonesia)</label>
                                                                                <input type="text" name="description" placeholder="KAS DAN..." id="" value="<?=$rows['description']?>" class="form-control" required>
                                                                                <input type="hidden" value="<?=$rows['id']?>" name="id" id="" class="form-control">
                                                                                <input type="hidden" value="<?=$rows['type_company_id']?>" name="type_company_id" id="" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(English)</label>
                                                                                <input type="text" name="description-en" placeholder="CASH AND..." id="" value="<?=$rows['description_en']?>" class="form-control" required>
                                                                            </div>
                                                                            <!-- <div class="form-group">
                                                                                <label for="">(Japanese)</label>
                                                                                <input type="text" name="description-jpn" placeholder="現金と..." id="" value="<?=$rows['description_jpn']?>" class="form-control" required>
                                                                            </div> -->
                                                                        </div>
                                                                        <!-- <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">(Korean)</label>
                                                                                <input type="text" name="description-kor" placeholder="현금과..." id="" value="<?=$rows['description_kor']?>" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(Chinese)</label>
                                                                                <input type="text" name="description-cna" placeholder="現金和..." id="" value="<?=$rows['description_cna']?>" class="form-control" required>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="modal fade" id="modal-delete<?=$rows['id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Are you sure to delete?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-dark">Description: <?= $rows['description'] ?></strong></p>
                                                                <p>Action: <b class="text-danger">DELETE DATA</b></p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('superAdmin/deleteSpt/'.$rows['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php
                                    $no++;
                                    }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card table-responsive">
                                    <div class="card-header border-0">
                                        <div class="card-title ">Jumlah Kewajiban dan Ekuitas</div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table id="table2" class="table table-light table-hover text-sm">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Description (Indonesian)</th>
                                                    <th>(English)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    $no = 1;
                                    foreach ($dataSpt as $row) {
                                        if ($row['category_jumlah'] != 'Jumlah Kewajiban dan Ekuitas') {
                                            continue;
                                        }
                                        ?>
                                                <tr>
                                                    <td class=" text-center"><?=$no;?></td>
                                                    <td><?=$row['description']?></td>
                                                    <td><?=$row['description_en']?></td>
                                                    <td class="d-flex ">
                                                        <button class="btn text-info p-0 mr-2" data-toggle="modal" data-target="#modal-update<?=$row['id']?>"><i class="fa fa-edit"></i></button>
                                                        <!-- <button class="btn text-danger" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>"><i class="fa fa-trash"></i></button> -->
                                                    </td>
                                                </tr>
                                                
                                                <div class="modal fade" id="modal-update<?=$row['id']?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?=base_url('SuperAdmin/processUpdateSpt')?>">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">Description (Indonesia)</label>
                                                                                <input type="text" name="description" placeholder="KAS DAN..." id="" value="<?=$row['description']?>" class="form-control" required>
                                                                                <input type="hidden" value="<?=$row['id']?>" name="id" id="" class="form-control">
                                                                                <input type="hidden" value="<?=$row['type_company_id']?>" name="type_company_id" id="" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(English)</label>
                                                                                <input type="text" name="description-en" placeholder="CASH AND..." id="" value="<?=$row['description_en']?>" class="form-control" required>
                                                                            </div>
                                                                            <!-- <div class="form-group">
                                                                                <label for="">(Japanese)</label>
                                                                                <input type="text" name="description-jpn" placeholder="現金と..." id="" value="<?=$row['description_jpn']?>" class="form-control" required>
                                                                            </div> -->
                                                                        </div>
                                                                        <!-- <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">(Korean)</label>
                                                                                <input type="text" name="description-kor" placeholder="현금과..." id="" value="<?=$row['description_kor']?>" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(Chinese)</label>
                                                                                <input type="text" name="description-cna" placeholder="現金和..." id="" value="<?=$row['description_cna']?>" class="form-control" required>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Are you sure to delete?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-dark">Description: <?= $row['description'] ?></strong></p>
                                                                <p>Action: <b class="text-danger">DELETE DATA</b></p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('superAdmin/deleteSpt/'.$row['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php
                                    $no++;
                                    }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-5">2. ELEMEN DARI LAPORAN LABA/RUGI</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card table-responsive">
                                    <div class="card-header border-0">
                                    </div>
                                    <div class="card-body p-0">
                                        <table id="table3" class="table table-light table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Description (Indonesian)</th>
                                                    <th>(English)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                    $no = 1;
                                    foreach ($dataSpt as $rows) {
                                        if ($rows['category_jumlah'] != "") {
                                            continue;
                                        }
                                        ?>
                                                <tr>
                                                    <td class="text-center"><?=$no;?></td>
                                                    <td><?=$rows['description']?></td>
                                                    <td><?=$rows['description_en']?></td>
                                                    <td class="d-flex justify-content-around">
                                                        <button class="btn text-info p-0 mr-2" data-toggle="modal" data-target="#modal-update<?=$rows['id']?>"><i class="fa fa-edit"></i></button>
                                                        <!-- <button class="btn text-danger" data-toggle="modal" data-target="#modal-delete<?=$rows['id']?>"><i class="fa fa-trash"></i></button> -->
                                                    </td>
                                                </tr>
                                                
                                                <div class="modal fade" id="modal-update<?=$rows['id']?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Update Data</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?=base_url('SuperAdmin/processUpdateSpt')?>">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">Description (Indonesia)</label>
                                                                                <input type="text" name="description" placeholder="KAS DAN..." id="" value="<?=$rows['description']?>" class="form-control" required>
                                                                                <input type="hidden" value="<?=$rows['id']?>" name="id" id="" class="form-control">
                                                                                <input type="hidden" value="<?=$row['type_company_id']?>" name="type_company_id" id="" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(English)</label>
                                                                                <input type="text" name="description-en" placeholder="CASH AND..." id="" value="<?=$rows['description_en']?>" class="form-control" required>
                                                                            </div>
                                                                            <!-- <div class="form-group">
                                                                                <label for="">(Japanese)</label>
                                                                                <input type="text" name="description-jpn" placeholder="現金と..." id="" value="<?=$rows['description_jpn']?>" class="form-control" required>
                                                                            </div> -->
                                                                        </div>
                                                                        <!-- <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="">(Korean)</label>
                                                                                <input type="text" name="description-kor" placeholder="현금과..." id="" value="<?=$rows['description_kor']?>" class="form-control" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">(Chinese)</label>
                                                                                <input type="text" name="description-cna" placeholder="現金和..." id="" value="<?=$rows['description_cna']?>" class="form-control" required>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i> save</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- <div class="modal fade" id="modal-delete<?=$rows['id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Are you sure to delete?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-dark">Description: <?= $rows['description'] ?></strong></p>
                                                                <p>Action: <b class="text-danger">DELETE DATA</b></p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('superAdmin/deleteSpt/'.$rows['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <?php
                                    $no++;
                                    }
                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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
    
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

    <script>
        function leaveChange() {
            if (document.getElementById("leave").value != "Elemen dari Neraca") {
                document.getElementById("jumlah").style.display = 'none';
                document.getElementById("category_jumlah").value = "";
            } else {
                document.getElementById("jumlah").style.display = 'block';
            }
        }
        $(function() {
            $("#table1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#table2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#table3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        function close_window() {
            if (confirm("Close Window?")) {
                close();
            }
        }
        $('td').addClass("p-1 align-items-center");
        $('th').addClass("p-2");
        $('table').addClass("text-sm table-striped");
    </script>
</body>

</html>