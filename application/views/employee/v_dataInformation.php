<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php 
include 'header.php';
?>
<style>
    .card {
        border-radius: 4px;
        background: #fff;
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
    }
</style>

</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
    <?php include'component/v_navbar.php'; ?>
        <div class="content-wrapper bg-white pt-3" >
            <section class="content">
                <div class="container-fluid">
                <div class="row">
                        <?php
                                $no = 1;
                                foreach ($seminar as $row) {
                                    ?>
                        <div class="col-md-12 col-lg-6 col-xl-3 mt-2 scale-up-ver-top">
                            <a href="<?= base_url('Employee/detailInformation/'.$row['id'])?>" class="card h-100 mb-2 text-dark">
                                <img class="card-img-top rounded" src="<?php echo base_url(); ?>assets/upload/images/news/<?=$row['image']?>" alt="Dist Photo 3" style="height: 150px;object-fit: cover; overflow: hidden; ">
                                <div class="card-body">
                                    <p class="text-sm"><?=$row['title']?></p>
                                </div>
                                <div class="card-footer">
                                    <small>created : <?= date("F j, Y h:m a", strtotime( $row['create_date']))?></small>
                                </div>
                            </a>
                        </div>
                        <?php
                                    $no++;
                                }
                                ?>
                        </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>