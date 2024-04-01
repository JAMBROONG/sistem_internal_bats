<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data History</title>
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
                                <li class="breadcrumb-item active" aria-current="page">History</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <a href="<?= base_url('superAdmin/historyAdmin')?>" class="col-12 col-sm-6 col-md-3 link-black">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fingerprint"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Admin Activity</span>
                                    <span class="info-box-number"><?=$admin?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('superAdmin/historyClient')?>" class="col-12 col-sm-6 col-md-3 link-black">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fingerprint"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Client Activity</span>
                                    <span class="info-box-number"><?=$client?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a href="<?= base_url('superAdmin/historyEmployee')?>" class="col-12 col-sm-6 col-md-3 link-black">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fingerprint"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Employee Activity</span>
                                    <span class="info-box-number"><?=$employee?>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>