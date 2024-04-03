<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>General Information</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> 
    <?php include'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
                            <a href="<?php echo base_url('Client/typeOfData'); ?>" class="nav-link text-white"  style="background-color: #C1272D;">
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
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container-fluid ">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">General Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Hi <strong><?= $user['name'] ?></strong> <i class="fa fa-smile-beam"></i></h5>
                                <div class="">
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus text-white"></i>
                                    </button>
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="remove">
                                        <i class="fas fa-times text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body row  d-flex align-items-center"> <?php 
                            if (empty($selected)) {
                            echo '
                            <div class="col-12 text-center">
                                <div class="">
                                    <h2 style="color: #2F2F2F;">Sorry, your service is not yet available <i class="fa fa-smile-beam"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            } else{
                            ?> <div class="col-5 text-center">
                                <div class="">
                                    <h2>Select your <strong>project</strong></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            <div class="col-7">
                                <form class="form-horizontal" action="<?= site_url('Client/typeOfData') ?>" method="post">
                                    <div class="form-group">
                                        <label for="inputName">Service name</label>
                                        <select name="id_order" id="" class=" form-control select2" style="width: 100%;">
                                            <option value="<?= $selected['id'] ?>"><?= $selected['service_name'].' - '. date("F, Y", strtotime($selected['update_date'])) ?></option> <?php 
                                        foreach ($dataOrder as $row) {
                                            if ($row['service_name'] == $selected['service_name']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['service_name'].' - '. date("F, Y", strtotime($row['update_date'])).'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="SELECT">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">BATS Consulting Team</h5>
                                <div class="">
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus text-white"></i>
                                    </button>
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="remove">
                                        <i class="fas fa-times text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card rounded">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['manager_image']?>" alt="User profile picture">
                                        <div class="card-body box-profile  rounded">
                                            <h3 class="profile-username text-center"><?= $dataOrder2['manager_name']?></h3>
                                            <p class="text-muted text-center">MANAGER</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Phone</b> <a class="float-right"><?= $dataOrder2['manager_phone']?></a>
                                                </li>
                                            </ul>
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['manager_id']?>">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user-alt mr-2"></i>view profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['partner_image']?>" alt="">
                                        <div class="card-body">
                                            <h4 class="profile-username text-center"><?= $dataOrder2['partner_name']?> </h4>
                                            <p class="text-bold text-center">PARTNER</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Phone</b> <a class="float-right"><?= $dataOrder2['partner_phone']?></a>
                                                </li>
                                            </ul>
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['partner_id']?>">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user-alt mr-2"></i>view profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card rounded">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['supervisor_image']?>" alt="User profile picture">
                                        <div class="card-body box-profile  rounded">
                                            <h3 class="profile-username text-center"><?= $dataOrder2['supervisor_name']?></h3>
                                            <p class="text-muted text-center">SUPERVISOR</p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Phone</b> <a class="float-right"><?= $dataOrder2['supervisor_phone']?></a>
                                                </li>
                                            </ul>
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['supervisor_id']?>">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user-alt mr-2"></i>view profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                foreach ($dataStaff as $row) {
                                ?>
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" class="rounded" alt="">
                                        <div class="card-body">
                                            <h3 class="profile-username text-center"><?=$row['employee_name']?></h3>
                                            <p class="text-muted text-center">Staff</p>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <ul class="list-group list-group-unbordered">
                                                <li class="list-group-item">
                                                    <b>Phone</b> <a class="float-right"><?=$row['phone']?></a>
                                                </li>
                                            </ul>
                                            <form action="<?=base_url('Client/desc')?>" method="post" class=" mt-3">
                                                <input type="hidden" name="employee_id" value="<?=$row['id_employee']?>">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-user-alt mr-2"></i>view profile</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Detail</h5>
                                <p class="card-text"><?= date('d M Y,h:i A', strtotime($selected['create_date'])); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container pt-3">
                                <div class="timeline timeline-inverse">
                                    <div>
                                        <i class="fas fa-book bg-primary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header border-0 text-primary"><a><strong><?= $selected['service_name'] ?></strong></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fas fa-info bg-primary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header border-0 text-primary"><a>Description</a>
                                            </h3>
                                            <p class="timeline-header border-0"><?= $selected['description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-12 text-center">
                                        <h5>Data Director</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Name</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['name'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Phone</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['phone'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Email</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['email'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NIK</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['NIK'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NPWP</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['NPWP'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Position</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['position'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Nationality</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['nationality'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Address</h6>
                                                <textarea name="" id="" cols="30" rows="5" class=" form-control border-0 " disabled><?= $person['address'] ?></textarea>
                                                <h6 class="mt-2 mb-0">Financial statements</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $selected['financial_statements'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if (empty($pic)) {
                                        ?>
                                <div class="col-md-12 text-center">
                                    <h5>Data PIC</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow-none">
                                        <div class="card-body text-center">
                                            <h6>PIC data doesn't exist yet</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    } else{
                                        $no = 1;
                                        foreach ($pic as $row) {
                                        ?>
                                <div class="col-md-6">
                                    <div class="col-md-12 text-center">
                                        <h5>Data PIC <?=$no?></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card shadow-none">
                                                <div class="card-body ">
                                                    <h6 class="mt-2 mb-0">Name</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['pic_name'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Phone</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['phone'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Email</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['email'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">NIK</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['NIK'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">NPWP</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['NPWP'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none">
                                                <div class="card-body ">
                                                    <h6 class="mt-2 mb-0">Position</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['position'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Nationality</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['nationality'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Address</h6>
                                                    <textarea name="" id="" cols="30" rows="7" class=" form-control border-0" disabled><?= $row['address'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        $no++;
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                        <div class="car"> <?php
                            if (empty($step)) {
                                ?> <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not yet</p>
                                <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                                <hr class="my-4">
                            </div> <?php
                                
                            } else{
                            ?> <div class="card-header pt-3" style="background-color: #1A1A1A;">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title text-white">Flow <?= $dataOrder2['service_name']?></h5>
                                    <div class="">
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus text-white"></i>
                                    </button>
                                    <button type="button" class=" border-0" style="background-color: #1A1A1A;" data-card-widget="remove">
                                        <i class="fas fa-times text-white"></i>
                                    </button>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-head-fixed text-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Control Item</th>
                                                        <th>Description</th>
                                                        <th>Activities</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $no = 1;
                                                    
                                                    $no2 = 1;
                                                    $step = "";
                                                    foreach ($substep as $row) {
                                                        if ($row['step'] == $step) {
                                                        ?>
                                                    <tr>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                        <td><?= $no2.'. '.$row['subStep'];?></td>
                                                    </tr>
                                                    <?php
                                                            $no2++;
                                                            }
                                                            else{
                                                                $no2 = 1;
                                                                $step = $row['step'];
                                                            
                                                            ?>
                                                    <td><?=$no;?></td>
                                                    <td><?=$row['step'];?></td>
                                                    <td><?=$row['description'];?></td>
                                                    <td><?=  $no2.'. '.$row['subStep'];?></td>
                                                    </tr>
                                                    <?php
                                                        $no++; 
                                                        $no2++;    
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        }
                            ?>
                        </div>
                    </div>
            </section>
        </div>
        <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://bats-consulting.com/">Bats Consulting</a>.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
        </footer>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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