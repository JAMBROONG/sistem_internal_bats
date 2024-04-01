<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Employee</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';?>
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
                        <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataUser['image']?>" class=" elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-dark"><?= $dataUser['company']; ?></a>
                    </div>
                </div>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1 position-fixed" style="background-color: #2F2F2F;">
            <div class="sidebar">
                 <div class="user-panel d-flex align-items-center mt-3">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$dataUser['image_user']?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-white"><?= $dataUser['name']; ?></a>
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
                            <a href="<?php echo base_url('Client/typeOfData'); ?>" class="nav-link text-white" style="background-color: #C1272D;">
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
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('Client/typeOfData')?>">General Information</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Employee</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-denger card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img border-0 p-1 rounded mb-4" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $user['employee_name']; ?></h3>
                                    <p class="text-muted text-center"><?= $user['position']; ?></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <i class="fa fa-phone mr-2"></i> <b><?= $user['phone']; ?></b>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="mailto:<?= $user['email']; ?>" class="btn  btn-block btn-danger"><i class="fa fa-paper-plane mr-3"> send email</i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#resume" data-toggle="tab">Resume</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="timeline timeline-inverse">
                                                    <div>
                                                        <i class="fas fa-user bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Name: </small>
                                                                <a><?=$user['employee_name'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-mars-stroke-v bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Gender: </small>
                                                                <a><?=$user['gender'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-phone bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Phone: </small>
                                                                <a><?=$user['phone'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-envelope bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Email: </small>
                                                                <a><?=$user['email'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <!-- <div>
                                                        <i class="fa fa-home bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info">
                                                                <small class="text-dark text-bold">Address: </small>
                                                            </h3>
                                                            <div class="timeline-body text-info"> 
                                                                <?php // $user['address'] ?> 
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="timeline timeline-inverse">
                                                    <div>
                                                        <i class="fas fa-calendar bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Date of Birth: </small>
                                                                <a><?=
                                                                date("l, j F Y", strtotime($user['date_of_birth']));?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-user-cog bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Position: </small>
                                                                <a><?=$user['position'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="tab-pane" id="resume">
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="card shadow-none">
                                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="" class="rounded" style="height: auto;object-fit: cover;">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 style=" font-family:  monospace;" class=" text-danger"><?=$user['employee_name']?></h4>
                                                    <h6><?=$user['position']?></h6>
                                                    <h6><?=$user['phone']?></h6>
                                                    <h6 href="mailto:<?=$user['email']?>"><?=$user['email']?></h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Gender</label>
                                                    <p><?= $user['gender'] ?></p>
                                                    <label for="">Address</label>
                                                    <p><?= $user['address'] ?></p>
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
                </div>
            </section>
        </div>
    </div> <?php include 'footer.php';?>
</body>

</html>