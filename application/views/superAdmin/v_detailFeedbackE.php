<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Feedback</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png"/>
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
                    ?> 
                    <div class="row mb-2">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            <h4>User Information</h4>
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
                                            <h4>Feedback Information</h4>
                                            <hr>
                                            <div class="timeline timeline-inverse">
                                                <div>
                                                    <i class="fas fa-user-lock bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> To: <br> <a class="text-info"><?=$feedbackEmployee['employee_name'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fa fa-address-card bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Position: <br> <a class="text-info"><?=$feedbackEmployee['position'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fa fa-phone bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Phone: <br> <a class="text-info"><?=$feedbackEmployee['e_phone'];?></a>
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
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $bantu = "";
                                    foreach ($dataCriteria as $row) {
                                        if ($bantu == $row['category_criteria']) {
                                            ?>
                                            <div class="d-flex justify-content-between">
                                            <p class="card-text"><?=$row['criteria']?>
                                            </p>
                                            <small class="pull-right p-0 m-0">
                                                <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    (<?=$row['rating']?>/5)
                                                </small>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <h5 class=" text-bold mt-4"><?=$row['category_criteria']?></h5>
                                             <div class="d-flex justify-content-between">
                                             <p class="card-text"><?=$row['criteria']?>
                                            </p>
                                            <small class="pull-right p-0 m-0">
                                                <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    (<?=$row['rating']?>/5)
                                                </small>
                                             </div>
                                            <?php
                                            $bantu = $row['category_criteria'];
                                        }
                                        ?>
                                        
                                    <hr>
                                        <?php
                                    }
                                   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
    <?php include 'footer.php'; ?>
</body>

</html>