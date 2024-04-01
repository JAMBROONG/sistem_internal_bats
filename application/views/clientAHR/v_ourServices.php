<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?> <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
  
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="user-panel d-flex align-items-center">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" class=" elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-dark"><?= $user['company']; ?></a>
                    </div>
                </div>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1 position-fixed" style="background-color: #2F2F2F;">
            <div class="sidebar"> 
                <div class="user-panel d-flex align-items-center mt-3">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-white"><?= $user['name']; ?></a>
                    </div>
                </div>
                <hr class="m-0 mt-2 border-white">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/profile'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/file'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>My Files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/ourServices'); ?>" class="nav-link text-white"  style="background-color: #C1272D;">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>BATS Consulting Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/whatsNew'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>What's New?</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/typeOfData'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-book"></i>
                                <p>General Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/contract'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Service Contract</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/invoice'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/jobTrack'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>Job track</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/report'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-edit"></i>
                                <p> Work Report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/feedback'); ?>" class="nav-link text-white">
                                <i class="nav-icon far fa-envelope"></i>
                                <p> Feedback </p>
                            </a>
                        </li>
                        <?php include 'navbar_new.php' ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">BATS Consulting Services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #1A1A1A; color:white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Financial Audit
                                        </h3>
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
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']== 1) {
                                                        if (in_array($row['id'],$youServices)) {
                                                            echo '<tr role="row" class="odd bg-success">';
                                                            } else{
                                                                echo '<tr role="row" class="odd">';
                                                            }
                                              ?> 
                                                                <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                                <td> <?= $row['service_name']?></td>
                                                                <td class=" text-justify"><?= $row['description']?></td>
                                                                <?php
                                                                if (in_array($row['id'],$youServices)) {
                                                                echo '<td>you have chosen</td>';
                                                                } else{
                                                                    echo '<td class="text-danger">you haven`t chosen</td>';
                                                                }
                                                                ?>
                                                            </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #1A1A1A; color:white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Taxation
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']== 2) {
                                                    if (in_array($row['id'],$youServices)) {
                                                        echo '<tr role="row" class="odd bg-success">';
                                                        } else{
                                                            echo '<tr role="row" class="odd">';
                                                        }
                                                    ?> 
                                                            <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                            <td> <?= $row['service_name']?></td>
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            <?php
                                                            if (in_array($row['id'],$youServices)) {
                                                            echo '<td>you have chosen</td>';
                                                            } else{
                                                                echo '<td class="text-danger">you haven`t chosen</td>';
                                                            }
                                                            ?>
                                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #1A1A1A; color:white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Accounting
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example3_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']== 3) {
                                                    if (in_array($row['id'],$youServices)) {
                                                        echo '<tr role="row" class="odd bg-success">';
                                                        } else{
                                                            echo '<tr role="row" class="odd">';
                                                        }
                                          ?> 
                                                            <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                            <td> <?= $row['service_name']?></td>
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            <?php
                                                            if (in_array($row['id'],$youServices)) {
                                                            echo '<td>you have chosen</td>';
                                                            } else{
                                                                echo '<td class="text-danger">you haven`t chosen</td>';
                                                            }
                                                            ?>
                                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #1A1A1A; color:white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Corporate Action
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example4" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example4_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']== 4) {
                                                    if (in_array($row['id'],$youServices)) {
                                                        echo '<tr role="row" class="odd bg-success">';
                                                        } else{
                                                            echo '<tr role="row" class="odd">';
                                                        }
                                          ?> 
                                                            <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                            <td> <?= $row['service_name']?></td>
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            <?php
                                                            if (in_array($row['id'],$youServices)) {
                                                            echo '<td>you have chosen</td>';
                                                            } else{
                                                                echo '<td class="text-danger">you haven`t chosen</td>';
                                                            }
                                                            ?>
                                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="background-color: #1A1A1A; color:white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Other
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example5_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example5" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example5_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']==0) {
                                                    if (in_array($row['id'],$youServices)) {
                                                        echo '<tr role="row" class="odd bg-success">';
                                                        } else{
                                                            echo '<tr role="row" class="odd">';
                                                        }
                                          ?> 
                                                            <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                            <td> <?= $row['service_name']?></td>
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            <?php
                                                            if (in_array($row['id'],$youServices)) {
                                                            echo '<td>you have chosen</td>';
                                                            } else{
                                                                echo '<td class="text-danger">you haven`t chosen</td>';
                                                            }
                                                            ?>
                                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
        <?php 
include 'footer.php';
?>
 <!-- DataTables  & Plugins -->
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
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#example2").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#example5").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>