<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Service Recommendation</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                    <div class="container">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                    <div class="row">
                        
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $sr['service_name'] ?></h5>
                                    <br>
                                    <hr>
                                    <p class="card-text text-justify"><?= $sr['reason'] ?></p>   
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('Client'); ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                    <a href="https://wa.me/6288290222512" class="btn btn-sm btn-success"><i class="fab fa-whatsapp mr-2"></i> contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
        <script>
            $('#nav_dashboard').addClass('nav_select')
        </script>
</body>

</html>