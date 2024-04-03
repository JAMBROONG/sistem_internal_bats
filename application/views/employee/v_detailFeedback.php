<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> <?php include 'header.php';
  ?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
    <?php include'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid">
                    <?php
                    if ($validate == false) {
                        ?>
                    <div class="jumbotron">
                        <h1 class="display-4">Sorry data not yet</h1>
                        <p class="lead">back to see all data</p>
                        <hr class="my-4">
                        <a href="<?=base_url('Employee/feedback')?>" class="btn btn-sm text-white" style="background-color: #D82724;"><i class="fa fa-arrow-left"></i> back</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
                    <?php
                    
include 'footer.php';
return false;
                    } else{
                        ?>

                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                              <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataFeedback['image']?>" alt="" class=" p-3 rounded" style="background-color:#000103;">
                              <div class="card-body">
                                <h5 class="card-title"><strong><?=$dataFeedback['name']?></strong> from</h5> <br>
                                <h5 class="card-title"><strong><?=$dataFeedback['company']?></strong></h5>
                                <p class="card-text">has given you a rating</p>
                                <div class="text-warning">
                                    <?php
                                    for ($i=1; $i <= $dataFeedback['star'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    (<?=$dataFeedback['star']?>/5)
                                </div>
                                <p class="mt-3">Message:</p>
                                <p class="p-2 shadow-sm"><?= $dataFeedback['feedback'] ?></p>
                                <a href="<?= base_url('Employee/feedback') ?>" class="btn mt-2 btn-sm text-white" style="background-color: #D82724;"><i class="fa fa-arrow-left"></i> back</a>
                              </div>
                            </div>
                            <div class="card">
                                <div class="card-header text-white"  style="background-color:#000103;">
                                    <h5 class="card-title">User information</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">NIK
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['email']?></strong></small>
                                    </p>
                                    <p class="card-text">NPWP
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['NPWP']?></strong></small>
                                    </p>
                                    <p class="card-text">Nationality
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['nationality']?></strong></small>
                                    </p>
                                    <p class="card-text">Phone
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['phone']?></strong></small>
                                    </p>
                                    <p class="card-text">Email
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['email']?></strong></small>
                                    </p>
                                    <p class="card-text">Position
                                        <small class="pull-right p-0 m-0"><strong><?=$dataFeedback['position']?></strong></small>
                                    </p>
                                    <p class="card-text">Address <br>
                                      <textarea name="" id="" cols="30" rows="5" class="form-control text-sm bg-white border-0" readonly><?=$dataFeedback['address']?></textarea>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header text-white"  style="background-color:#000103;">
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
        </div> <?php 
include 'footer.php';
?>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
</body>

</html>