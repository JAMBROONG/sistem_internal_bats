<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail News</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>

<body class="hold-transition">
    <div class="wrapper">
    <?php
        include'navbar.php';
        ?>

        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/daN')?>">All Information</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                              <img src="<?php echo base_url(); ?>assets/upload/images/news/<?=$dataNews['image']?>" alt="" class="rounded">
                            </div>
                            <a href="<?php echo base_url(); ?>assets/upload/images/news/<?=$dataNews['image']?>" download="" class="btn btn-sm text-white"style="background-color: #2F2F2F;"><i class="fa fa-download mr-2"></i> download</a>
                        
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $dataNews['title'] ?></h5>
                                    <br>
                                    <hr>
                                    <?= $dataNews['description'] ?> 
                                </div>
                                <div class=" p-3 d-flex justify-content-between">
                                    <div class="">
                                        <a href="<?php echo base_url('Client'); ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                        <a href="<?=$dataNews['link']?>" class="btn btn-sm btn-primary"><i class="fab fa-whatsapp mr-2"></i> Join Group</a>
                                    </div>
                                    <div class="">
                                    <a href="https://wa.me/6288290222512" class="btn btn-sm btn-success"><i class="fab fa-whatsapp mr-2"></i> contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
        <script>
                        $('#nav_dashboard').addClass('nav_select');
        </script>
</body>

</html>