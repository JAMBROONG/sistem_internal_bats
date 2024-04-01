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
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">To</span>
                                    <span class="info-box-number"><?= $dataFeedback['employee_name'] ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="far fa-heart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Rating</span>
                                    <span class="info-box-number">
                                    <?php
                                    for ($i=1; $i <= $dataFeedback2['star'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star" aria-hidden="true"></i>';
                                    }
                                    ?>
                                        (<?=$dataFeedback2['star']?>/5)
                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon">
                                    <i class="fas fa-clock"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Date</span>
                                    <span class="info-box-number"><?= date("F j, Y. g:i a",strtotime($dataFeedback['update_date'])); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Message</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0" style="display: block;">
                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                        <li class="item p-3"> <?= $dataFeedback['feedback'] ?> </li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('SuperAdmin/feedbackOrder/'.$dataFeedback['order_id']) ?>" type="button" class="btn bg-danger btn-sm"><i class="fa fa-arrow-left mr-2"></i>back</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="text-success"><strong>Thank You!</strong></h4>
                                        <p>You have sent feedback for the employee.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataFeedback2['image']?>" alt="" class=" p-3 rounded" style="background-color:#000103;">
                                <div class="card-body">
                                    <h5 class="card-title"><strong><?=$dataFeedback2['name']?></strong> from</h5> <br>
                                    <h5 class="card-title"><strong><?=$dataFeedback2['company']?></strong></h5>
                                    <p class="card-text">has given you a rating</p>
                                    <div class="text-warning">
                                    <?php
                                    for ($i=1; $i <= $dataFeedback2['star'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star" aria-hidden="true"></i>';
                                    }
                                    ?>
                                        (<?=$dataFeedback2['star']?>/5)
                                    </div>
                                    <p class="mt-3">Message:</p>
                                    <p class="p-2 shadow-sm"><?= $dataFeedback2['feedback'] ?></p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-white" style="background-color:#000103;">
                                    <h5 class="card-title">User information</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">NIK
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['email']?></strong></small>
                                    </p>
                                    <p class="card-text">NPWP
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['NPWP']?></strong></small>
                                    </p>
                                    <p class="card-text">Nationality
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['nationality']?></strong></small>
                                    </p>
                                    <p class="card-text">Phone
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['phone']?></strong></small>
                                    </p>
                                    <p class="card-text">Email
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['email']?></strong></small>
                                    </p>
                                    <p class="card-text">Position
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback2['position']?></strong></small>
                                    </p>
                                    <p class="card-text">Address <br>
                                        <textarea name="" id="" cols="30" rows="5" class="form-control text-sm bg-white border-0" readonly><?=$dataFeedback2['address']?></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-white" style="background-color:#000103;">
                                    <h5 class="card-title">Feedback Criteria</h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $bantu = "";
                                    foreach ($dataCriteria as $row) {
                                        if ($bantu == $row['category_criteria']) {
                                            ?>
                                    <p class="card-text"><?=$row['criteria']?>
                                        <small class="pull-right p-0 m-0">
                                            <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                            (<?=$row['rating']?>/5)
                                        </small>
                                    </p>
                                    <?php
                                        }
                                        else{
                                            ?>
                                    <h5 class=" text-bold mt-4"><?=$row['category_criteria']?></h5>
                                    <p class="card-text"><?=$row['criteria']?>
                                        <small class="pull-right p-0 m-0">
                                            <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                            (<?=$row['rating']?>/5)
                                        </small>
                                    </p>
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