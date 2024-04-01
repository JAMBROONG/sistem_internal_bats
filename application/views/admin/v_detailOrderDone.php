<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progress Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php' ?>
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper">
        <?php include'top_nav.php'; ?>
        <aside class="main-sidebar bg-white elevation-2 layout-fixed">
            <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                <img src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class="text-white font-weight-light">Admin</small>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item rounded">
                            <a href="<?php echo base_url('Admin'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataProject'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-microchip"></i>
                                <p> Services </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p> Workflow </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataInformation'); ?>" class="nav-link">
                                <i class=" nav-icon fab fa-pied-piper-square"></i>
                                <p> Seminar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Users </p>
                            </a>
                        </li>
                        <li class="nav-header text-black  pt-2">EXTERNAL</li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user nav-icon"></i>
                                <p>
                                    Client
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link bg-info">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p> Order
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataChatt'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-comments"></i>
                                        <p> Chat
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-muted">
                                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                        <p> Finance
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataCompany'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-building"></i>
                                        <p> Company </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataRecommendation'); ?>" class="nav-link">
                                        <i class=" nav-icon fa fa-record-vinyl"></i>
                                        <p> Service Recommendation </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-envelope"></i>
                                        <p> Feedback </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                       <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user-clock nav-icon"></i>
                                <p>
                                    Guest
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/guestTHC'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-book-medical"></i>
                                        <p> Tax Health Check
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">INTERNAL</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user-friends nav-icon"></i>
                                <p>
                                    Employee
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataEmployee'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-user"></i>
                                        <p> Data Employee </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dailyReport'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-calendar-check"></i>
                                        <p> Daily Report </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/specialTask'); ?>" target="blank" class="nav-link">
                                        <i class="nav-icon fa fa-book-reader"></i>
                                        <p> Special Task </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/training'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                        <p> Training</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">OTHER</li>
                        <?php include 'navbar_comingsoon.php'; ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataHistory'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-history"></i>
                                <p> History </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none"> <?php 
                            if (empty($dataOrder)) {
                            echo '
                            <div class="card-body text-center">
                                <div>
                                    <h2 class=" text-danger">Sorry, your order is not yet available <i class="fa fa-smile-beam text-danger"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            } else{
                                $doReport = [];
                                $doProcess = [];
                                foreach ($report as $row) {
                                    array_push($doReport,$row['order_step_id']);
                                }
                                foreach ($dataProcess as $row) {
                                    array_push($doProcess,$row['order_step_id']);
                                }
                            ?> <div class="card-header bg-danger pb-1">
                                    <div class="d-flex justify-content-between">
                                        <h5>Input</h5>
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
                                    <div class="card">
                                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                                            <h3 class="card-title">
                                                <i class="ion ion-clipboard mr-1"></i> Data List
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('Admin/processUpdateData/'.$dataOrder['id']) ?>" method="post">
                                                        <ul class="todo-list ui-sortable" data-widget="todo-list"> <?php
                                                        $no = 1;
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
                                                                            <input type="checkbox" value="<?= $row['id'] ?>" name="status[]" id="todoCheck<?=$no;?>" checked="" disabled>
                                                                            <label for="todoCheck<?=$no;?>"></label>
                                                                        </div>
                                                                        <span class="text"><?= $row['data'] ?></span>
                                                                    </div>
                                                                </div>
                                                            </li> <?php
                                                            }
                                                            if ($row['status'] == "not yet") {
                                                                ?> <li class="">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="">
                                                                        <span class="handle ui-sortable-handle">
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                            <i class="fas fa-ellipsis-v"></i>
                                                                        </span>
                                                                        <div class="icheck-primary d-inline ml-2">
                                                                            <input type="checkbox" value="<?= $row['id'] ?>" name="status[]" id="todoCheck<?=$no;?>" disabled>
                                                                            <label for="todoCheck<?=$no;?>"></label>
                                                                        </div>
                                                                        <span class="text"><?= $row['data'] ?></span>
                                                                    </div>
                                                                </div>
                                                            </li> <?php
                                                            }
                                                            $no++;
                                                        }
                                                        ?>
                                                        </ul>
                                                        <a href="<?=base_url('Admin/dataOrder') ?>" class="btn btn-danger  btn-sm mt-3"><i class="fa fa-arrow-left pr-1"></i> back</a>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('Admin/processCreateData/'.$dataOrder['id'].'/'.$dataOrder['user_id']) ?>" method="post">
                                                        <label for="">Add data to <strong class="text-danger"><?= $dataOrder['name']?></strong> order <strong class="text-danger"><?= $dataOrder['service_name']?></strong> </label>
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" class=" form-control" name="data" placeholder="data name.." disabled>
                                                            <span class="input-group-append">
                                                                <button type="submit" class="btn btn-secondary btn-flat" disabled>save</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default shadow-none">
                        <div class="card-header bg-danger border-0">
                            <h3 class="card-title">Process</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Progress this service</h3>
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
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                                $no = 1;
                                                foreach ($dataProcess as $row) {
                                                    ?> <tr>
                                                <td><?=$no;?></td>
                                                <td>
                                                    <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <?=$row['employee_name'];?>
                                                </td>
                                                <td>
                                                    <strong><?= $row['step']?></strong><br> <?= $row['subStep']?>
                                                </td>
                                                <td> <?php
                                                        if ($row['status']=='done') {
                                                            echo 'done <i class="fas fa-check-square text-success"></i>';
                                                        }
                                                        else{
                                                            echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                                        }
                                                    ?> </td>
                                                <td> <?= date("F j, Y", strtotime($row['estimasi']))?> </td>
                                                <td>
                                                    <a href="<?= base_url('Admin/detailProgress/'.$row['id']).'/'.$dataOrder['id'];?>" class="btn btn-sm btn-success"><i class="fa fa-book"></i> detail</a>
                                                </td>
                                            </tr> <?php
                                                    $no++;
                                                }
                                                ?> </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-default shadow-none">
                        <div class="card-header bg-danger border-0">
                            <h3 class="card-title">Output</h3>
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
                            <div class="card card-warning">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Report this service</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus text-white"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
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
                                            ?> <tr>
                                                <td><?=$no?></td>
                                                <td><?=$row['subStep']?></td>
                                                <td><?=$row['message']?></td>
                                                <td><?=$row['update_date']?></td>
                                                <td class="d-flex">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary mr-2" download><i class="fa fa-download"></i></a>
                                                    <button href="<?= base_url('Admin/updateReport/'.$row['id']) ?>" class="btn btn-sm btn-secondary mr-2" disabled>update</button>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-delete-report<?=$row['id']?>" disabled><i class="fa fa-trash"></i></button>

                                                </td>
                                            </tr>
                                            <!-- modal for delete report -->
                                            <div class="modal fade " id="modal-delete-report<?=$row['id']?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-danger">Are you sure delete this report?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-dark">Sub Step: <br><strong><?= $row['subStep'] ?></strong> </p>
                                                            <p class="text-dark">Message: <br><strong><?= $row['message'] ?> </strong> </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('Admin/deleteReport/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal --> <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default shadow-none">
                            <div class="card-body">
                                <div class="card card-blue">
                                    <div class="card-header border-0">
                                        <h3 class="card-title">Review this service</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Activities</th>
                                                    <th>Message</th>
                                                    <th>Estimasi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> <?php
                                            $no = 1;
                                            foreach ($review as $row) {
                                            ?> <tr>
                                                    <td><?=$no?></td>
                                                    <td><?=$row['subStep']?></td>
                                                    <td><?=$row['message']?></td>
                                                    <td><?=$row['ending_date']?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"></i></a>
                                                            <button href="<?= base_url('Admin/updateReport/'.$row['report_id']) ?>" class="btn btn-sm btn-secondary ml-2" disabled>update</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- modal for delete report -->
                                                <div class="modal fade " id="modal-delete-report<?=$row['id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-danger">Are you sure delete this report?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-dark">Sub Step: <br><strong><?= $row['subStep'] ?></strong> </p>
                                                                <p class="text-dark">Message: <br><strong><?= $row['message'] ?> </strong> </p>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('Admin/deleteReport/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal --> <?php
                                            $no++;
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-none">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Meeting room</h5>
                                                        <p class="card-text  text-muted"><?=$meeting['via']?></p>
                                                        <h5 class="card-title">Link/Address</h5>
                                                        <p class="card-text  text-muted"><?=$meeting['link']?></p>
                                                        <h5 class="card-title">Date</h5>
                                                        <p class="card-text  text-muted"><?=$meeting['date']?></p>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Permission display</h5> <?php
                                                        if ($meeting['permission'] == 'no') {
                                                            ?> <small class="text-danger ml-3"><strong>not approved </strong>
                                                                    <i class="fas fa-times-circle"></i>
                                                                </small>
                                                                <br>
                                                                <button data-toggle="modal" data-target="#modal-updatePermission" class="btn btn-sm btn-secondary" disabled>turn on</button> <?php
                                                        } else
                                                        {
                                                            ?> <small class="text-success ml-3"><strong>approved </strong>
                                                                    <i class="fa fa-check-circle"></i>
                                                                </small>
                                                                <br>
                                                                <button href="<?= base_url('Admin/updateStatusMeetingP/'.$meeting['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-secondary" disabled>turn off</button>
                                                                <p class="text-danger">if it is disabled, the user cannot specify the meeting.</p> <?php
                                                        }
                                                        ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5 class="card-title">Fixed meeting</h5> <?php
                                                        if ($meeting['fixed'] == 'no') {
                                                            ?> <small class="text-danger ml-3"><strong>not fixed </strong>
                                                                    <i class="fas fa-times-circle"></i>
                                                                </small>
                                                                <br>
                                                                <button data-toggle="modal" data-target="#modal-updateFixed" class="btn btn-sm btn-secondary" disabled>turn on</button> <?php
                                                        } else
                                                        {
                                                            ?> <small class="text-success ml-3"><strong>fixed </strong>
                                                                    <i class="fa fa-check-circle"></i>
                                                                </small>
                                                                <br>
                                                                <button href="<?= base_url('Admin/updateStatusMeetingF/'.$meeting['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-secondary" disabled>turn off</button>
                                                                <p class="text-danger">if it is deactivated, the meeting schedule can be changed again.</p><?php
                                                        }
                                                        ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-info">
                                                    <div class="card-body"> <?php
                                                        if ($meeting['fixed'] == 'yes') {
                                                            ?> <form action="<?=base_url('Admin/updateMeeting')?>" method="post">
                                                            <div class="form-group">
                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$meeting['id']?>">
                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                <label for="my-input">Meeting room</label>
                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$meeting['via']?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Link/address</label>
                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control" disabled><?=$meeting['link']?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Date</label>
                                                                <div class="d-flex">
                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($meeting['date'])); ?>" disabled>
                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i:s", strtotime($meeting['date'])); ?>" disabled>
                                                                </div>
                                                            </div>
                                                            <p class="text-danger">the final meeting has been agreed</p>
                                                        </form> <?php
                                                        } else
                                                        {
                                                            ?> <form action="<?=base_url('Admin/updateMeeting')?>" method="post">
                                                            <div class="form-group">
                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$meeting['id']?>">
                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                <label for="my-input">Meeting room</label>
                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$meeting['via']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Link/address</label>
                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control"><?=$meeting['link']?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Date</label>
                                                                <div class="d-flex">
                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($meeting['date'])); ?>">
                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i:s", strtotime($meeting['date'])); ?>">
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-sm btn-secondary" type="submit" disabled><i class="fa fa-save mr-2"></i> save</button>
                                                        </form> <?php
                                                        }
                                                        ?> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-5">
                                    <div class="card-body text-center">
                                        <h4>Back to Do Order</h4>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-turnFinish">Back to Do <i class="fa fa-backspace ml-2"></i></button>
                                    </div>
                                </div>
                            </div> <?php
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php' ?>

    <div class="modal fade " id="modal-turnFinish">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Are you sure to turn Do?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="">with this order will be categorized as <strong class="text-danger">in progress</strong></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Admin/turnDoOrder/'.$dataOrder['id']) ?>" class="btn btn-success">Yes Update</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
    <script>
        $(document).on("click", "#pilih_gambar", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            var reader = new FileReader();
            reader.onload = function(e) {
                // document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>