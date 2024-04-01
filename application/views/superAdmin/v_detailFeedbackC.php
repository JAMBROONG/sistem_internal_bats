<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Feedback</title>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataFeedback')?>">Feedback</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container"> <?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('superAdmin/dataFeedback'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?> <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Feedback</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">
                                    <a>Home/Data Feedback/</a>
                                    <a href="">Detail</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center p-2 pt-3 bg-info">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <h3>Detail Feedback</h3>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane  active" id="about">
                                        <h3>User Information</h3>
                                        <hr>
                                        <div class="timeline timeline-inverse">
                                            <div>
                                                <i class="fas fa-user bg-danger"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 text-danger">
                                                        <a><?=$feedbackEmployee['name'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-phone bg-info"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 text-info">
                                                        <a><?=$feedbackEmployee['phone'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-envelope bg-info"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0 text-info">
                                                        <a><?=$feedbackEmployee['email'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fa fa-home bg-info"></i>
                                                <div class="timeline-item">
                                                    <div class="timeline-body"> <?= $feedbackEmployee['address'] ?> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Feedback Information</h3>
                                        <hr>
                                        <div class="timeline timeline-inverse">
                                            <div>
                                                <i class="fas fa-user-lock bg-info"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0"> To: <br> <a class="text-info">BATS Consulting</a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-envelope bg-info"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0"> Create date: <br> <a class="text-info"><?= date("F j, Y", strtotime($feedbackEmployee['create_date']));?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div>
                                                <i class="fas fa-envelope bg-info"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header border-0"> Feedback: <br> <?php
                                                        for ($i=0; $i < $feedbackEmployee['star']; $i++) { 
                                                            echo'<i class="fa text-warning fa-star"></i>';
                                                        }
                                                        ?> <br><a class="text-info"><?=$feedbackEmployee['feedback'];?></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <a href="<?php echo base_url('superAdmin/feedbackOrder/'.$feedbackEmployee['order_id']); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
    <?php include 'footer.php'; ?>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
</body>

</html>