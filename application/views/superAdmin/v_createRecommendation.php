<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seminar Recommendation</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php'; ?>
    <style>
        .select2-results__option {
            color: black;
        }
    </style>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataRecommendation')?>">Service Recommendation</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img class="rounded" src="<?php echo base_url(); ?>assets/image/background/bgServices.jpg" style=" background-size: cover; background-position: center center;" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Create Service Recommendation</h5>
                                    <p class="card-text">The selected service will be recommended for <strong><?=$dataUser['name']?></strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="card p-3 col-md-8">
                            <form action="<?= site_url('superAdmin/processCreateRecommendation') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="my-input">Select Service</label>
                                            <input type="hidden" name="user_id" value="<?= $dataUser['id'] ?>">
                                            <select name="service_id" id="" class="form-control select2" required>
                                                <?php
                                                    foreach ($service as $row) {
                                                        if (in_array($row['id'], $selected)) {
                                                            continue;
                                                        }
                                                        echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="my-input">Reason</label>
                                            <textarea name="reason" id="" cols="30" rows="5" class="form-control" placeholder="Because.." required></textarea>
                                        </div>

                                    </div>
                                </div>
                                <a href="<?= base_url('superAdmin/dataRecommendation') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left mr-2"></i> cancel</a>
                                <button class="btn btn-success btn-sm"><i class="fa fa-save mr-2"></i> save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'footer.php'; ?>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
</body>

</html>