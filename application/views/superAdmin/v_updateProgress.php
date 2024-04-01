<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Progress</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <?php include 'header.php';?>
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
                                <li class="breadcrumb-item active" aria-current="page">Update Progress</li>
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
                        ?>
            </div>
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
                                                    <button type="button" class="btn btn-default btn-sm text-danger" data-toggle="modal" data-target="#modal-delete" >
                                                        <i class="fa fa-trash mr-1 pr-1 "></i>Delete Process
                                                    </button>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="<?= site_url('superAdmin/processUpdateProgress/'.$dataProcess['order_id'].'/'.$dataProcess['id']) ?>" method="post" class="row">
                                                        <div class="col-md-6">
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
                                                                <label>Estimasi</label>
                                                                <input type="date" name="estimasi" class=" form-control" value="<?= $dataProcess['estimasi'] ?>" id="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
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
                                                            <button class="btn btn-success pl-3 pr-3 btn-sm btn-block" type="submit">update</button>
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
    
    <?php include 'footer.php';?>
    <!-- modal for update order -->
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
                    <a href="<?= base_url('superAdmin/deleteProgress/'.$dataProcess['id'].'/'.$dataProcess['order_id']) ?>" class="btn btn-success">Yes delete</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>