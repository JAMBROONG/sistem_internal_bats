<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Workflow</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> 
    <?php include 'header.php'; ?>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataWorkflow')?>">Workflow</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Workflow</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <?php
                        if ($validate == false) {
                            ?>
                            <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not found</p>
                                <hr class="my-4">   
                                <a href="<?php echo base_url('superAdmin/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                            <?php
                            return false;
                        }
                    ?>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                    <h5 class="card-title">You choose category <strong class="text-danger"><?= $selected['category_service']?></strong></h5>
                                </div>
                                <div class="">
                                    <a href="<?= base_url('superAdmin/dataWorkflow')?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left pr-1"></i>back</a>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus pr-1"></i>add data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <?php
                    foreach ($service as $row) {
                        ?> <a class="col-12 col-sm-6 col-md-4 link-black" href="<?= base_url('superAdmin/workflow/'.$row['id']) ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-cog fa-spin"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?=  substr($row['service_name'],0,25); ?></span>
                                    <span class="info-box-number">
                                        <small><?=  substr($row['description'],0,25 ); ?>...</small>
                                    </span>
                                </div>
                            </div>
                        </a> <?php
                    }
                    ?> <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= site_url('superAdmin/processCreateProject/'.$selected['id']) ?>" method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create service <strong class="text-danger"><?= $selected['category_service'] ?></strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Service Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>