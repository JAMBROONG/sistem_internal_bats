<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Progress</title>
    
    <?php include 'header.php'; ?>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container"> <?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('superAdmin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?> <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Order</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Data Order</li>
                                <li class="breadcrumb-item active">detail</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container -->
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none">
                                <div class="card-header bg-danger pb-1">
                                    <div class="d-flex justify-content-between">
                                        <h5>Detail step</h5>
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
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card card-widget widget-user-2 shadow-sm">
                                                        <!-- Add the bg color to the header using any of the bg-* classes -->
                                                        <div class="widget-user-header bg-warning">
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
                                                    <a href="<?php echo base_url('superAdmin/progressOrder/'.$dataOrder['id']); ?>" class="btn btn-default btn-sm text-danger"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-delete" disabled>
                                                        <i class="fa fa-trash mr-1 pr-1 "></i>Delete Process
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('superAdmin/processUpdateProgress/'.$dataProcess['order_id'].'/'.$dataProcess['id']) ?>" method="post" class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="hidden" name="os_id" value="<?=$dataProcess['os_id']?>" disabled>
                                                                <label>Sub Step</label>
                                                                <select class="form-control select2" name="subStep" style="width: 100%;" disabled>
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
                                                                <label>Estimasi</label>
                                                                <input type="date" name="estimasi" class=" form-control" value="<?= $dataProcess['estimasi'] ?>" id="" required disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Employee</label>
                                                                <select class="form-control select2" name="employee" style="width: 100%;" disabled>
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
                                                                <select class="form-control select2" name="status" style="width: 100%;" disabled> <?php
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
                                                            <button class="btn btn-secondary pl-3 pr-3 btn-sm btn-block" type="submit" disabled>udate</button>
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
    
    <?php include 'footer.php'; ?> 
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>