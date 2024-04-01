<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workflow</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php 
include 'header.php';
?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
    <?php include'component/v_navbar.php'; ?>
        <div class="content-wrapper bg-white pt-3" >
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-danger">Select category</h5>
                            <p class="card-text">Below is the service category, select another if the service does not have a category.</p>
                        </div>
                    </div>
                    <div class="row">
                        <a class="col-12 col-sm-6 col-md-3 link-black" href="<?= base_url('Employee/detailWorkflow/'.$c1['id']) ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog fa-spin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$c1['category_service']?></span>
                                    <span class="info-box-number">
                                        <?=$data1; ?> <small>data</small>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a class="col-12 col-sm-6 col-md-3 link-black" href="<?= base_url('Employee/detailWorkflow/'.$c2['id']) ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog fa-spin"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$c2['category_service']?></span>
                                    <span class="info-box-number">
                                        <?=$data2; ?> <small>data</small>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="clearfix hidden-md-up"></div>

                        <a class="col-12 col-sm-6 col-md-3 link-black" href="<?= base_url('Employee/detailWorkflow/'.$c3['id']) ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog fa-spin"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$c3['category_service']?></span>
                                    <span class="info-box-number">
                                        <?=$data3; ?> <small>data</small>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a class="col-12 col-sm-6 col-md-3 link-black" href="<?= base_url('Employee/detailWorkflow/'.$c4['id']) ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog fa-spin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=$c4['category_service']?></span>
                                    <span class="info-box-number">
                                        <?=$data4; ?> <small>data</small>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a class="col-12 col-sm-6 col-md-3 link-black" href="<?= base_url('Employee/detailWorkflow/0') ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog fa-spin"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Other</span>
                                    <span class="info-box-number">
                                        <?=$data0; ?> <small>data</small>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php';?>

</body>

</html>