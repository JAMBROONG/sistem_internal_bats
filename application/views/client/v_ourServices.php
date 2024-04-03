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

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">BATS Consulting Services</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card border-0 shadow-none">
                        <div class="card-header" style="background-color: #1A1A1A; color:white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"> Financial Audit
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 pt-3">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-nowrap  d-none d-md-block">No.</th>
                                            <th class="text-nowrap">Type of Service</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap  d-none d-md-block">Status</th>
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
                                        <td class=" d-none d-md-block dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                        <td> <?= $row['service_name']?></td>
                                        <td class=" text-justify"><?= $row['description']?></td>
                                        <?php
                                                                if (in_array($row['id'],$youServices)) {
                                                                echo '<td class=" d-none d-md-block">you have chosen</td>';
                                                                } else{
                                                                    echo '<td class=" d-none d-md-block text-danger">you haven`t chosen</td>';
                                                                }
                                                                ?>
                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none border-0">
                        <div class="card-header" style="background-color: #1A1A1A; color:white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"> Taxation
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 pt-3">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-nowrap  d-none d-md-block">No.</th>
                                            <th class="text-nowrap">Type of Service</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap  d-none d-md-block">Status</th>
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
                                        <td class=" d-none d-md-block dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                        <td> <?= $row['service_name']?></td>
                                        <td class=" text-justify"><?= $row['description']?></td>
                                        <?php
                                                            if (in_array($row['id'],$youServices)) {
                                                            echo '<td class=" d-none d-md-block">you have chosen</td>';
                                                            } else{
                                                                echo '<td class=" d-none d-md-block text-danger">you haven`t chosen</td>';
                                                            }
                                                            ?>
                                        </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="card shadow-none border-0 ">
                        <div class="card-header" style="background-color: #1A1A1A; color:white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"> Accounting
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 pt-3">
                            <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example3_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-nowrap  d-none d-md-block">No.</th>
                                            <th class="text-nowrap">Type of Service</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap  d-none d-md-block">Status</th>
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
                                        <td class=" d-none d-md-block dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                        <td> <?= $row['service_name']?></td>
                                        <td class=" text-justify"><?= $row['description']?></td>
                                        <?php
                                                if (in_array($row['id'],$youServices)) {
                                                echo '<td class=" d-none d-md-block">you have chosen</td>';
                                                } else{
                                                    echo '<td class=" d-none d-md-block text-danger">you haven`t chosen</td>';
                                                }
                                                ?>
                                        </tr> <?php
                                    $no++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 shadow-none">
                        <div class="card-header" style="background-color: #1A1A1A; color:white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"> Corporate Action
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 pt-3">
                            <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example4" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example4_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-nowrap  d-none d-md-block">No.</th>
                                            <th class="text-nowrap">Type of Service</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap  d-none d-md-block">Status</th>
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
                                        <td class=" d-none d-md-block dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                        <td> <?= $row['service_name']?></td>
                                        <td class=" text-justify"><?= $row['description']?></td>
                                        <?php
                                                if (in_array($row['id'],$youServices)) {
                                                echo '<td class=" d-none d-md-block">you have chosen</td>';
                                                } else{
                                                    echo '<td class=" d-none d-md-block text-danger">you haven`t chosen</td>';
                                                }
                                                ?>
                                        </tr> <?php
                                    $no++;
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border-0 shadow-none">
                        <div class="card-header" style="background-color: #1A1A1A; color:white">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title"> Other
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0 pt-3">
                            <div id="example5_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example5" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example5_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-nowrap  d-none d-md-block">No.</th>
                                            <th class="text-nowrap">Type of Service</th>
                                            <th class="text-nowrap">Description</th>
                                            <th class="text-nowrap  d-none d-md-block">Status</th>
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
                                        <td class=" d-none d-md-block dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                        <td> <?= $row['service_name']?></td>
                                        <td class=" text-justify"><?= $row['description']?></td>
                                        <?php
                                        if (in_array($row['id'],$youServices)) {
                                        echo '<td class=" d-none d-md-block">you have chosen</td>';
                                        } else{
                                            echo '<td class=" d-none d-md-block text-danger">you haven`t chosen</td>';
                                        }
                                        ?>
                                        </tr> <?php
                            $no++;
                                }
                            }
                            ?>
                                    </tbody>
                                </table>
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
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $(function() {
                $("#example2").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $(function() {
                $("#example3").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $(function() {
                $("#example4").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $(function() {
                $("#example5").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $('#nav_service').addClass('nav_select');
        </script>
</body>

</html>