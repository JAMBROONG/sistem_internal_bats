<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Progress</title>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <?php include 'header.php' ?>

    <style>
        .select2-results__options li {
            color: black;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper">
        <?php include'top_nav.php'; ?>
        <aside class="main-sidebar bg-white elevation-2 layout-fixed">
            <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center " style="background-color: #1A1A1A;">
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
                                <li class="breadcrumb-item active" aria-current="page">Update PIC</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid"> <?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none">
                                <div class="card-header bg-info pb-1">
                                    <div class="d-flex justify-content-between">
                                        <h5>Detail step</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card card-widget widget-user-2 shadow-sm">
                                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                                        <div class="widget-user-header bg-info">
                                                            <div class="widget-user-image">
                                                                <img class="img-circle elevation-2" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataProcess['image']?>" alt="User Avatar">
                                                            </div>
                                                            <!-- /.widget-user-image -->
                                                            <h3 class="widget-user-username"><?=$dataProcess['employee_name']?></h3>
                                                            <h5 class="widget-user-desc"><?=$dataProcess['position']?></h5>
                                                        </div>
                                                        <div class="card-footer p-0">
                                                            <ul class="nav flex-column">
                                                                <li class="nav-item">
                                                                    <a class="nav-link link-black"> Step name <span class="float-right"><?=$dataProcess['step']?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link link-black"> Sub name <span class="float-right"><?=$dataProcess['subStep']?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link link-black"> Estimasi <span class="float-right"><?=$dataProcess['estimasi']?></span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link link-black"> Status <span class="float-right"> <?php
                                                                    if ($dataProcess['status'] == "done") {
                                                                        echo 'done <i class="fas fa-check-square text-success"></i>';
                                                                    }
                                                                    else{
                                                                        echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                                                    }
                                                                    ?> </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a href="<?php echo base_url('Admin/progressOrder/'.$dataOrder['id']); ?>" class="btn btn-default btn-sm text-danger"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                                                    <button type="button" class="btn btn-default btn-sm text-danger" data-toggle="modal" data-target="#modal-delete">
                                                        <i class="fa fa-trash mr-1 pr-1 "></i>Delete Process
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('Admin/processUpdateProgress/'.$dataProcess['order_id'].'/'.$dataProcess['id']) ?>" method="post" class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="hidden" name="os_id" value="<?=$dataProcess['os_id']?>">
                                                                <label>Sub Step</label>
                                                                <select class="form-control select2" name="subStep" style="width: 100%;">
                                                                    <option value="<?=$dataProcess['subStep_id']?>"><?=$dataProcess['subStep']?></option> <?php
                                                    foreach ($subStep as $row) {
                                                        if ($row['subStep_id'] == $dataProcess['subStep_id']) {
                                                            continue;
                                                        }
                                                        echo '<option value="'.$row['sub_id'].'">'.$row['subStep'].'</option>';
                                                    }
                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Employee</label>
                                                                <select class="form-control select2" name="employee" style="width: 100%;">
                                                                    <option value="<?=$dataProcess['employee_id']?>"><?=$dataProcess['employee_name']?></option> <?php
                                        foreach ($dataStaff as $row) {
                                            if ($row['id_employee'] == $dataProcess['employee_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id_employee'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control select2" name="status" style="width: 100%;"> <?php
                                                    if ($dataProcess['status'] == "done") {
                                                       echo'
                                                        <option value="done">Done<i class="fas fa-check-square text-success"></i></option>
                                                        <option value="do">Do<i class="fas fa-cog fa-spin text-warning"></i></option>';
                                                    }
                                                    else{
                                                        echo'
                                                        <option value="do">Do<i class="fas fa-cog fa-spin text-warning"></i></option>
                                                        <option value="done">Done<i class="fas fa-check-square text-success"></i></option>';
                                                    }
                                                    ?> </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Estimasi</label>
                                                                <input type="date" name="estimasi" class=" form-control" value="<?= $dataProcess['estimasi'] ?>" id="" required>
                                                            </div>
                                                            <button class="btn btn-success pl-3 pr-3 btn-sm" type="submit"><i class="fa fa-save mr-2"></i>save</button>
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
                </div>
            </section>
        </div>

        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Are you sure to delete this process?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn text-danger btn-default" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('Admin/deleteProgress/'.$dataProcess['id'].'/'.$dataProcess['order_id']) ?>" class="btn btn-success">Yes delete</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php' ?>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
</body>

</html>