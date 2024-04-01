<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper">
        <!-- Navbar -->
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
                            <a href="<?php echo base_url('Client/'); ?>" class="nav-link" style="background-color: #C1272D; color:white;">
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
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="card" style="background: url(<?php echo base_url(); ?>assets/image/background/bgDashboard.jpg); background-position:center center; background-size:cover; box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <div class="row rounded">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <h1 class=" display-5 text-bold text-white">BATS <br> INTEGRATION <br> SYSTEM</h1>
                                    <h4 class="text-white text-justify">&nbsp;&nbsp;&nbsp;&nbsp;This application was developed to make it easier for us to see the workflow and be able to see the progress of the project. In addition, it is hoped that us can easily get information related to taxes that is updated by the BATS Consulting company.</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box pt-5" style="background-color: #C1272D; color:white;">
                                <div class="inner pt-5">
                                </div>
                                <a href="<?php echo base_url('Client/jobTrack'); ?>" class="small-box-footer text-left pl-2"><i class="fas fa-project-diagram mr-1"></i> Job Track</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box pt-5" style="background-color: #C1272D; color:white;">
                                <div class="inner pt-5">
                                </div>
                                <a href="<?php echo base_url('Client/typeOfData'); ?>" class="small-box-footer text-left pl-2"><i class="fas fa-book mr-1"></i> Generel Information</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box pt-5" style="background-color: #C1272D; color:white;">
                                <div class="inner pt-5">
                                </div>
                                <a href="<?php echo base_url('Client/report'); ?>" class="small-box-footer text-left pl-2"><i class="fas fa-edit mr-1"></i> Report</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box pt-5" style="background-color: #C1272D; color:white;">
                                <div class="inner pt-5">
                                </div>
                                <a href="<?php echo base_url('Client/feedback'); ?>" class="small-box-footer text-left pl-2"><i class="far fa-envelope mr-1"></i> Feedback</a>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none">
                        <div class="card-body p-0">
                            <h4 class="mb-3 mt-5">Seminar Information</h4>
                            <?php
                             if (empty($news)) {
                                echo '<h5 class="text-center">Information not yet available</h5>';
                            }
                            ?>
                            <div class="row">
                                <?php
                                $no = 1;
                                foreach ($news as $row) {
                                    ?>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="<?php echo base_url(); ?>assets/upload/images/news/<?=$row['image']?>" alt="Dist Photo 3" style="height: 150px;object-fit: cover; overflow: hidden; ">
                                        <div class="card-img-overlay" style="background: rgba(0, 0, 0, 0.73);">
                                            <h5 class="card-title text-white"><?=$row['title']?></h5>
                                            <a href="<?= base_url('Client/deN/'.$row['id'])?>"> read more</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $no++;
                                    if ($no >=7) {
                                        ?>
                                <div class="col-md-12 text-center">
                                    <a href="<?= base_url('Client/daN')?>">see more >>></a>
                                </div>
                                <?php
                                        break;
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none">
                        <h4 class="mb-3 mt-5">Service Recommendation</h4>
                        <div class="card-body p-0">
                            <?php
                             if (empty($serv)) {
                                echo '<h5 class="text-center">Service not yet available</h5>';
                            }
                            ?>
                            <div class="row">
                                <?php
                                $no = 1;
                                foreach ($serv as $row) {
                                    ?>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <span class="info-box-icon elevation-1" style="background-color: #2F2F2F; color:white;"><i class="fas fa-cog"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text"><?= $row['service_name'] ?></span>
                                            <span class="info-box-number">
                                                <a href="<?= base_url('Client/deR/'.$row['id'])?>">read reason..</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $no++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
</body>

</html>