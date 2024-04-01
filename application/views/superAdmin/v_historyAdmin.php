<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History superAdmin</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataHistory')?>">History</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <a href="<?= base_url('superAdmin/loginAdmin')?>" class="col-12 col-sm-6 col-md-3 link-black">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-sign-in-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">History Login</span>
                                    <span class="info-box-number"><?=$login?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('superAdmin/activityAdmin')?>" class="col-12 col-sm-6 col-md-3 link-black">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fingerprint"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">History Activity</span>
                                    <span class="info-box-number"><?=$activity?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <a href="<?php echo base_url('superAdmin/dataHistory')?>" class="btn btn-danger pl-3 pr-3"><i class="mr-2 fa fa-arrow-left"></i> back</a>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>