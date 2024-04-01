<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Feedback</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';?>
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
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
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
                            <a href="<?php echo base_url('Client/feedback'); ?>" class="nav-link text-white"  style="background-color: #C1272D;">
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
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('Client/feedback')?>">Feedback</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">To</span>
                                    <span class="info-box-number"><?= $dataFeedback['employee_name'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="far fa-heart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Rating</span>
                                    <span class="info-box-number"> <?php 
                                for ($i=0; $i < $dataFeedback['star']; $i++) { 
                                echo '<i class="fas fa-star"></i>';
                                }
                                ?> </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Date</span>
                                    <span class="info-box-number"><?= date("F j, Y. g:i a",strtotime($dataFeedback['update_date'])); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Message</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="display: block;">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <li class="item p-3"> <?= $dataFeedback['feedback'] ?> </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('Client/feedback/'.$dataFeedback['order_id']) ?>" type="button" class="btn bg-danger btn-sm"><i class="fa fa-arrow-left mr-2"></i>back</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="text-success"><strong>Thank You!</strong></h4>
                                        <p>You have sent feedback for the employee.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataFeedback2['image']?>" alt="" class=" p-3 rounded" style="background-color:#000103;">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?=$dataFeedback2['name']?></strong> from</h5> <br>
                                    <h5 class="card-title"><strong><?=$dataFeedback2['company']?></strong></h5>
                                    <p class="card-text">has given you a rating</p>
                                    <div class="text-warning">
                                        <?php
                                    for ($i=1; $i <= $dataFeedback2['star'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star" aria-hidden="true"></i>';
                                    }
                                    ?>
                                        (<?=$dataFeedback2['star']?>/5)
                                    </div>
                                    <p class="mt-3">Message:</p>
                                    <p class="p-2 shadow-sm"><?= $dataFeedback2['feedback'] ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-white" style="background-color:#000103;">
                                    <h5 class="card-title">User information</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">NIK
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['email']?></strong></small>
                                    </p>
                                    <p class="card-text">NPWP
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['NPWP']?></strong></small>
                                    </p>
                                    <p class="card-text">Nationality
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['nationality']?></strong></small>
                                    </p>
                                    <p class="card-text">Phone
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['phone']?></strong></small>
                                    </p>
                                    <p class="card-text">Email
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['email']?></strong></small>
                                    </p>
                                    <p class="card-text">Position
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['position']?></strong></small>
                                    </p>
                                    <p class="card-text">Address <br>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control text-sm bg-white border-0" readonly><?=$dataFeedback2['address']?></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-white" style="background-color:#000103;">
                                    <h5 class="card-title">Feedback Criteria</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $bantu = "";
                                    foreach ($dataCriteria as $row) {
                                        if ($bantu == $row['category_criteria']) {
                                            ?>
                                    <p class="card-text"><?=$row['criteria']?>
                                        <small class="pull-right p-0 m-0">
                                            <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                            (<?=$row['rating']?>/5)
                                        </small>
                                    </p>
                                    <?php
                                        }
                                        else{
                                            ?>
                                    <h5 class=" text-bold mt-4"><?=$row['category_criteria']?></h5>
                                    <p class="card-text"><?=$row['criteria']?>
                                        <small class="pull-right p-0 m-0">
                                            <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                            (<?=$row['rating']?>/5)
                                        </small>
                                    </p>
                                    <?php
                                            $bantu = $row['category_criteria'];
                                        }
                                        ?>

                                    <hr>
                                    <?php
                                    }
                                   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><?php include 'footer.php';?>
</body>

</html>