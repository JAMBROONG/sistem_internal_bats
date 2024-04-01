<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client JobTrack</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <?php include'header.php'; ?>
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                 ['Task', 'Hours per Day'],
                ['Input', <?= $percentinput ?> ],
                ['Progress', <?= $percentprocess ?> ],
                ['Output', <?= $percentoutput ?> ],
                ['Unprocessed', 100 - <?= $percentall ?> ]
            ]);

            var options = {
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>
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
                            <a href="<?php echo base_url('Client/ourServices'); ?>" class="nav-link text-white">
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
                            <a href="<?php echo base_url('Client/jobTrack'); ?>" class="nav-link text-white" style="background-color: #C1272D;">
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
            <section class="content bg-white">
                <div class="container-fluid row">
                    <div class="col-md-12">
                        <div class="container pt-3">
                            <div class="main-body">
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Job Track</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="card">
                            <?php 
                            if (empty($selectedService)) {
                            echo '
                            <div class="card-header pt-3"style="background-color: #2F2F2F;">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 style="color: #2F2F2F;">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam "></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            } else{
                            ?>
                            <div class="card-header text-white pt-3" style="background-color: #1A1A1A;">
                                <div class="d-flex justify-content-between">
                                    <h5>Select your services</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus text-white"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="<?= site_url('Client/jobTrack') ?>" method="post">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="id_order" id="" class="form-control select2" style="width: 100%;">
                                                    <option value="<?= $selectedService['id'] ?>"><?= $selectedService['service_name'] .' - '. date("F, Y", strtotime($selectedService['update_date'])) ?></option>
                                                    <?php
                                                foreach ($dataOrder2 as $row) {
                                                    if ($row['service_name'] == $selectedService['service_name']) {
                                                        continue;
                                                    }
                                                    echo '<option value="'.$row['id'].'">'.$row['service_name'].' - '. date("F, Y", strtotime($row['update_date'])).'</option>';
                                                }
                                                ?>
                                                </select>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-sm text-center btn-success mt-3">SELECT</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-4">
                                        <div class="card">
                                        <div id="piechart_3d"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card shadow-none">
                                            <div class="card-body table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="bg-danger text-center">Step</th>
                                                            <th class="bg-warning text-center">Percentage</th>
                                                            <th class="bg-orange text-center">Achievement</th>
                                                            <th class="bg-success text-center">Target</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-danger text-center" scope="row">Input</td>
                                                            <td class="text-warning text-center"><?= round(($percentinput / $percentall) * 100 ,0)?>%</td>
                                                            <td class="text-orange text-center"><?= $percentinput ?>%</td>
                                                            <td class="text-success text-center">20%</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-danger text-center" scope="row">Progress</td>
                                                            <td class="text-warning text-center"><?= round(($percentprocess / $percentall) * 100 ,0) ?>%</td>
                                                            <td class="text-orange text-center"><?= $percentprocess ?>%</td>
                                                            <td class="text-success text-center">60%</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-danger text-center" scope="row">Output</td>
                                                            <td class="text-warning text-center"><?= round(($percentoutput / $percentall) * 100 ,0) ?>%</td>
                                                            <td class="text-orange text-center"><?= $percentoutput ?>%</td>
                                                            <td class="text-success text-center">20%</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td class="text-danger text-bold text-center" colspan="2" scope="row">Total</td>
                                                            <th class="text-orange text-center"><?= round($percentall,0)?>%</th>
                                                            <th class="text-success text-center">100%</th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white pt-3" style="background-color: #1A1A1A;">
                                <div class="d-flex justify-content-between">
                                    <h5>Your service is <strong><?= $selectedService['service_name']; ?></strong> </h5>
                                    <h5>Percentage <strong><?= round($percentall,1); ?>%</strong></h5>
                                </div>
                            </div>
                            <div class="card-header  p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item col-md-4"><a class="nav-link active d-flex justify-content-between" href="#input" data-toggle="tab">Input <strong><?= $percentinput; ?>%</strong></a></li>
                                    <li class="nav-item col-md-4"><a class="nav-link d-flex justify-content-between" href="#prosess" data-toggle="tab">Process <strong><?= $percentprocess; ?>%</strong></a></li>
                                    <li class="nav-item col-md-4"><a class="nav-link d-flex justify-content-between" href="#output" data-toggle="tab">Output <strong><?= $percentoutput; ?>%</strong></a></li>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="input">
                                        <!-- active -->
                                        <p>Complete the following data, then send it via <a href="mailto:data.batsinternationalgroup@gmail.com">data.batsinternationalgroup@gmail.com</a></p>
                                        <div class="card">
                                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                                                <h3 class="card-title">
                                                    <i class="ion ion-clipboard mr-1"></i> Data List
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <ul class="todo-list ui-sortable" data-widget="todo-list"> <?php
                                                foreach ($letter as $row) {
                                                    if ($row['status']=="done") {
                                                        ?> <li class="">

                                                        <div class="d-flex justify-content-between">
                                                            <div class="">
                                                                <span class="handle ui-sortable-handle">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </span>
                                                                <div class="icheck-primary d-inline ml-2">
                                                                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="" disabled>
                                                                    <label for="todoCheck2"></label>
                                                                </div>
                                                                <span class="text"><?= $row['data'] ?></span>
                                                                <small class="badge badge-success"><i class="far fa-check-circle"></i> done</small>
                                                            </div>
                                                            <div class="">
                                                                <small class=" m-auto"><?=  date("F j, Y, g:i a", strtotime($row['update_date'])); ?></small>
                                                            </div>
                                                        </div>
                                                    </li> <?php
                                                    }
                                                    if ($row['status'] == "not yet") {
                                                        ?> <li class="">
                                                        <!-- drag handle -->
                                                        <span class="handle ui-sortable-handle">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </span>
                                                        <!-- checkbox -->
                                                        <div class="icheck-primary d-inline ml-2">
                                                            <input type="checkbox" value="" name="todo1" id="todoCheck1" disabled>
                                                            <label for="todoCheck1"></label>
                                                        </div>
                                                        <!-- todo text -->
                                                        <span class="text"><?= $row['data'] ?></span>
                                                        <!-- Emphasis label -->
                                                        <small class="badge badge-danger"><i class="far fa-clock"></i> not yet</small>
                                                    </li> <?php
                                                    }
                                                }
                                                ?> </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="prosess">
                                        <div class="card">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Progress your service: <?= $totalDone.' of '.$total ?> processes</h3>
                                            </div>
                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Employee</th>
                                                            <th>Activities</th>
                                                            <th>Status</th>
                                                            <th>Estimasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                $no = 1;
                                                foreach ($dataProcess as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?=$no;?></td>
                                                            <td>
                                                                <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                                <?=$row['employee_name'];?>
                                                            </td>
                                                            <td>

                                                                <strong><?= $row['step']?></strong><br>
                                                                <?= $row['subStep']?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                            if ($row['status']=='done') {
                                                                echo 'done <i class="fas fa-check-square text-success"></i> <br> <small>('.date("F j, Y", strtotime($row['update_date'])).')</small>';
                                                            }
                                                            else{
                                                                echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                                            }
                                                            
                                                            ?>

                                                            </td>
                                                            <td>
                                                                <?= date("F j, Y", strtotime($row['estimasi']))?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    $no++;
                                                }
                                                ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="output">
                                        <?php
                                            if ($selectedService['statusOrder_id'] == 2) {
                                                ?>
                                        <div class="jumbotron bg-success">
                                            <h1 class="display-4">Congratulations,</h1>
                                            <p class="lead">your service has been completed.</p>
                                            <hr class="my-4">
                                            <p>Send your feedback</p>
                                            <a href="<?=base_url('Client/feedback/'.$idOrder)?>" class="btn btn-sm btn-warning"><i class="fa fa-envelope mr-2"></i> send</a>
                                        </div>
                                        <?php
                                            }
                                        ?>
                                        <div class="card card-dark">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Report on process <button class="btn btn-sm bg-transparent text-warning p-1 ml-2"  data-toggle="modal" data-target="#modal-warning"><i class="fa fa-question"></i></button> </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="table_reportDo" class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Activities</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_ceo'] != "done") {
                                            ?> <tr>
                                                            <td><?=$no?></td>
                                                            <td><?=$row['subStep']?></td>
                                                            <td><?=$row['message']?></td>
                                                            <td><?= date("l, j F Y H:i a", strtotime($row['update_date']));?></td>
                                                            <td class="d-flex justify-content-beetween">
                                                                <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">Download</small></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php

                                            $no++;
                                                }
                                            }
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card card-dark">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Final Report <button class="btn btn-sm bg-transparent text-warning p-1 ml-2"  data-toggle="modal" data-target="#modal-warning2"><i class="fa fa-question"></i></button> </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="table_reportDone" class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Activities</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_ceo'] != "do") {
                                            ?> <tr>
                                                            <td><?=$no?></td>
                                                            <td><?=$row['subStep']?></td>
                                                            <td><?=$row['message']?></td>
                                                            <td><?= date("l, j F Y H:i a", strtotime($row['update_date']));?></td>
                                                            <td class="d-flex justify-content-beetween">
                                                                <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">Download</small></i></a>
                                                                <a href="<?=base_url('Client/detailReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2"><i class="fa fa-eye"><small class="ml-2">Detail</small></i></a>
                                                                <?php
                                                                if ($row['review_status']== "done") { ?>
                                                                <a href="<?=base_url('Client/approveReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2 disabled"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                <?php
                                                                } else{ ?>
                                                                
                                                                <a type="button"   data-toggle="modal" data-target="#modal-done<?=$row['id']?>" class="btn btn-sm btn-outline-success ml-2"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade " id="modal-done<?=$row['id']?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Explanation</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-danger">Make sure you have reviewed the final report, if you are approved it cannot be changed and this report is fixed.</p>
                                                                        <a href="<?=base_url('Client/approveReport/'.$row['review_id'].'/'.$idOrder)?>" class="btn btn-sm btn-outline-success "><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php

                                            $no++;
                                                }
                                            }
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card card-dark">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Schedule Meeting</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times text-white"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <table id="table_meeting" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Room</th>
                                                            <th>Link</th>
                                                            <th>Date</th>
                                                            <th>Message</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                              $no = 1;
                                              foreach ($dataMeeting as $row) {
                                              ?>
                                                        <tr>
                                                            <td><?=$no?></td>
                                                            <td><?=$row['via']?></td>
                                                            <td><?=$row['link']?></td>
                                                            <td><?= date("l, j F Y H:i a", strtotime($row['date']));?></td>
                                                            <td><?=$row['message']?></td>
                                                            <td><?=$row['status']?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-editMeeting<?=$row['id']?>"><i class="fa fa-eye"></i></button>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade " id="modal-editMeeting<?=$row['id']?>">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Are you sure to Update?</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card shadow-none">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Meeting room</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['via']?></p>
                                                                                        <h5 class="card-title">Link/Address</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['link']?></p>
                                                                                        <h5 class="card-title">Date</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['date']?></p>
                                                                                        <hr>
                                                                                        <h5 class="card-title">Status Meeting</h5>
                                                                                        <?php
                                                                        if ($row['status'] == 'do') {
                                                                            ?> <small class="text-warning ml-3"><strong>do</strong>
                                                                                            <i class="fas fa-times-circle"></i>
                                                                                        </small>
                                                                                        <?php
                                                                        } else
                                                                        {
                                                                            ?> <small class="text-success ml-3"><strong>done</strong>
                                                                                            <i class="fa fa-check-circle"></i>
                                                                                        </small>
                                                                                        <?php
                                                                        }
                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card shadow-none">
                                                                                    <div class="card-body"> <?php
                                                        if ($row['fixed'] == 'yes') {
                                                            ?> <form action="<?=base_url('Client/updateMeeting')?>" method="post">
                                                                                            <div class="form-group">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder3['id'] ?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?=$dataOrder3['service_id']?>">
                                                                                                <label for="my-input">Meeting room</label>
                                                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>" disabled>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Link/address</label>
                                                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control" disabled><?=$row['link']?></textarea>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Date</label>
                                                                                                <div class="d-flex">
                                                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>" disabled>
                                                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i", strtotime($row['date'])); ?>" disabled>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="text-danger">the final meeting has been agreed</p>
                                                                                        </form> <?php
                                                        } else
                                                        {
                                                            ?>
                                                                                        <form action="<?=base_url('Client/updateMeeting')?>" method="post">
                                                                                            <div class="form-group">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?=$dataOrder3['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?=$dataOrder3['service_id']?>">
                                                                                                <label for="my-input">meeting room</label>
                                                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Link/address</label>
                                                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control"><?=$row['link']?></textarea>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Date</label>
                                                                                                <div class="d-flex">
                                                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>">
                                                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i", strtotime($row['date'])); ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-2"></i> save</button>
                                                                                        </form> <?php
                                                        }
                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 d-flex justify-content-center align-items-center text-center">
                                        <div class="">
                                            <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card direct-chat direct-chat-primary">
                                            <div class="card-header ui-sortable-handle pt-3" style="cursor: move;">
                                                <h3 class="card-title">Chat Admin now!</h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="direct-chat-messages" id="yourDiv"> <?php
                                                    foreach ($chatt as $row) {
                                                        if ($row['user_id'] == 0) {
                                                            ?> <div class="direct-chat-msg">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-left">Admin</span>
                                                            <span class="direct-chat-timestamp float-right"><?= date('l jS \of F Y h:i:s A', strtotime($row['create_date'])); ?></span>
                                                        </div>
                                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/image/logo/icon.png" alt="message user image">
                                                        <div class="direct-chat-text"> <?= $row['chatt'] ?></div>
                                                    </div> <?php
                                                        }
                                                        else{
                                                            ?> <div class="direct-chat-msg right">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-right"><?= $user['name'] ?></span>
                                                            <span class="direct-chat-timestamp float-left"><?= date('l jS \of F Y h:i:s A', strtotime($row['create_date'])); ?></span>
                                                        </div>
                                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" alt="message user image">
                                                        <div class="direct-chat-text"> <?= $row['chatt'] ?></div>
                                                    </div> <?php
                                                        }
                                                    }
                                                    ?> </div>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                                <form action="<?= site_url('Client/addChatt/'.$idOrder.'/'.$selectedService['service_name']) ?>" method="post">
                                                    <div class="input-group">
                                                        <input type="text" name="chatt" placeholder="Type Message ..." class="form-control" required>
                                                        <span class="input-group-append">
                                                            <button type="submit" class="btn btn-primary">Send</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>
        
    <?php include'footer.php'; ?>
    <div class="modal fade " id="modal-warning">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">This report is still in process, not the final report. To see the final report, see the final report table.</p>
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="modal-warning2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">This table contains the final report, if you are approved then this final report has been marked complete.</p>
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
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
        var element = document.getElementById("yourDiv");
        element.scrollTop = element.scrollHeight;
        $(function() {
            $("#table_meeting").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_reportDo").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_reportDone").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>