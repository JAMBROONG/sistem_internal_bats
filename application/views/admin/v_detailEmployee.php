<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Employee</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }

    .file2 {
        visibility: hidden;
        position: absolute;
    }
</style>

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
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link bg-info">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p> Users </p>
                                </a>
                            </li>
                            <li class="nav-header text-black  pt-2">EXTERNAL</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>
                                        Client
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link">
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
                                        <a href="#" class="nav-link">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataUser')?>">Users</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataEmployee')?>">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="container pt-3">
                                <div class="main-body">
                                    <div class="row gutters-sm">
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataEmployee['image']?>" alt="Admin" class="rounded-circle" width="150">
                                                        <div class="mt-3">
                                                            <h4><?= $dataEmployee['employee_name'] ?></h4>
                                                            <p class="text-secondary mb-1"><?= $dataEmployee['position'] ?></p>
                                                            <a href="mailto:<?= $dataEmployee['email'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-envelope mr-1"></i> send mail</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mt-3">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                        <h6 class="mb-0">Address</h6>
                                                        <span class="text-secondary"><?= $dataEmployee['address'] ?></span>
                                                        <a href="https://www.google.co.id/maps/place/<?=$dataEmployee['address']?>" target="blank" class="btn btn-sm btn-default">open maps<i class="ml-1 fa fa-location-arrow"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Full Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['employee_name'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Position</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['position'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['email'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['phone'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Gender</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['gender'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Date of Birth</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <?= $dataEmployee['date_of_birth'] ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-update">Edit</button>
                                                            <a href="<?php echo base_url('Admin/updatePasswordEmployee/'.$dataEmployee['id'])?>" class="btn btn-sm btn-danger">update password</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    <div class="card-title">Resume</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h4 style=" font-family:  monospace;" class=" text-danger"><?=$dataEmployee['employee_name']?></h4>
                                                            <h6><?=$dataEmployee['position']?></h6>
                                                            <h6><?=$dataEmployee['phone']?></h6>
                                                            <h6 href="mailto:<?=$dataEmployee['email']?>"><?=$dataEmployee['email']?></h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Gender</label>
                                                            <p><?= $dataEmployee['gender'] ?></p>
                                                            <label for="">Address</label>
                                                            <p><?= $dataEmployee['address'] ?></p>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php
if (empty($sub_resume)) {
    ?>
                                                            <div class="d-flex justify-content-center">
                                                                <p>Data not yet.</p>
                                                            </div>
                                                            <?php
} else{
    $bantu = "";
    foreach ($scr as $row) {
       foreach ($sub_resume as $key) {
            if ($key['subCategory_id']==$row['id']) {
                if ($key['subCategory_id'] == $bantu) {
                    ?>
                                                            <p>
                                                                <i class="fas fa-angle-double-right"></i>
                                                                <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>
                                                            </p>

                                                            <?php
                    }else{
                        $bantu = $key['subCategory_id'];
                        ?>
                                                            <label for=""><?=$key['subCategory']?></label>
                                                            <p>
                                                                <i class="fas fa-angle-double-right"></i>
                                                                <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>

                                                            </p>
                                                            <?php
                    }
            }
       }
    }
    ?>

                                                        </div>
                                                        <?php
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
                    </section>
                    <div class="content-header">
                        <div class="container-fluid">
                            <?php
                        if ($validate == false) {
                            ?>
                            <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not found</p>
                                <hr class="my-4">
                                <a href="<?php echo base_url('Admin/dataEmployee'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                            <?php
                            return false;
                        }
                    ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade " id="modal-update">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Update Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="main-body">
                                <form action="<?= site_url('Admin/processUpdateEmployee/'.$dataEmployee['id']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img id="preview2" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataEmployee['image']?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                                        <div class="mt-3">
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                            <input type="file" name="image" class="file2">
                                                            <div class="input-group">
                                                                <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file2">
                                                                <div class="input-group-append">
                                                                    <button type="button" id="pilih_gambar2" class="browse btn btn-dark">Pilih Gambar</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Full Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input required type="text" name="name" class="form-control" value="<?= $dataEmployee['employee_name'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Date of Birth</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input required type="date" name="birth" class="date form-control" value="<?= $dataEmployee['date_of_birth'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Gender</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <select class="custom-select form-control-border border-width-2" name="gender" id="exampleSelectBorderWidth2"> <?php 
                                                            if ($dataEmployee['gender'] == 'male') {
                                                                echo '<option value="male">Male</option><option value="female">Female</option>';
                                                            } else{
                                                                echo '<option value="female">Female</option><option value="male">Male</option>';
                                                            }
                                                            ?> 
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Position</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input required type="text" name="position" class="form-control" value="<?= $dataEmployee['position'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input required type="email" class="form-control" name="email" value="<?= $dataEmployee['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Status</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <select class="custom-select form-control-border border-width-2" name="status_id" id="exampleSelectBorderWidth2">
                                                                <option value="<?=$dataEmployee['status_id'];?>"><?=$dataEmployee['status'];?></option>
                                                                <?php 
                                                   foreach ($position as $row) {
                                                       if ($row['id'] == $dataEmployee['status_id']) {
                                                           continue;
                                                       }
                                                       echo '<option value="'.$row['id'].'">'.$row['status'].'</option>';
                                                   }
                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Cell Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input required type="number" name="phone" class="form-control" value="<?= $dataEmployee['phone'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Company</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <select id="my-select" class="form-control" name="company_id">
                                                                <option value="<?=$dataEmployee['company_id']?>"><?=$dataEmployee['company']?></option>
                                                                <?php
                                                                foreach ($company as $key) {
                                                                    if ($dataEmployee['company_id'] == $key['id']) {
                                                                        continue;
                                                                    }
                                                                    echo '<option value="'.$key['id'].'">'.$key['company'].'</option>';
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Address</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $dataEmployee['address'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-1"></i> save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
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
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
            $(document).on("click", "#pilih_gambar2", function() {
                var file = $(this).parents().find(".file2");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview2").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
        </script>
</body>

</html>