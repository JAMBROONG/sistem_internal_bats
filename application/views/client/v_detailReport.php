<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Report</title>
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/report?detail='.md5($dataReport['order_id']))?>">Report</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                            <div class="card shadow-none"><?php
                            if (empty($dataReport)) {
                            echo '
                            <div class="card-header bg-primary pt-3">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 class=" text-primary">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam text-primary"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            return false;
                            }
                            ?> 
                                <div class="card-body p-0">
                                    <form action="<?=base_url('Client/updateReview')?>" method="post">
                                        <div class="row">
                                            <div class="col-md-4 card shadow-none">
                                                <div class="card-body">
                                                    <h5 class="text-center">Send you Review</h5>
                                                    <p class="text-center">Status <small>
                                                        <input type="hidden" name="report_id" value="<?= $review['report_id'] ?>">
                                                        <?php 
                                                        if ($review['review_status']=="done") {
                                                            echo '<strong class="text-success">reviewed</strong>';
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="">Message</label>
                                                                <textarea name="message" class="form-control border-0" id="" cols="30" rows="4" placeholder="it's.." disabled><?= $review['message']?></textarea>
                                                            </div>
                                                            <?php
                                                        }
                                                        else{
                                                            $ending =  date("Y-m-d", strtotime($review['ending_date']));
                                                            $todayDateObj = new \DateTime(date('Y-m-d'));
                                                            $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($review['ending_date'])));
                                                            $interval = $todayDateObj->diff($foundedDateObj);
                                                            $interval = $interval->format('%r%a') . "\n\n";

                                                        if ($interval < 0) {
                                                                echo '<strong class="text-danger">expired</strong>('.$interval.' days ago)</br>
                                                                <small class="text-danger text-center">'.date("l, j F Y", strtotime($review['ending_date'])).'</small>';
                                                            ?>
                                                            <div class="form-group">
                                                                <label for="">Message</label>
                                                                <textarea name="message" class="form-control border-0" id="" cols="30" rows="4" placeholder="it's.." disabled><?= $review['message']?></textarea>
                                                            </div>
                                                            <?php
                                                        }
                                                        else{
                                                            echo '<strong class="text-danger">not reviewed</strong>';
                                                            ?>
                                                            <div class="alert alert-warning alert-dismissible">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                                <h5><i class="icon fas fa-exclamation-triangle"></i> announcement</h5>
                                                                you can only post a review before <strong class="text-white"><?= date("l, j F Y", strtotime($review['ending_date']));?></strong>
                                                            </div>
                                                        
                                                             <div class="form-group">
                                                                <label for="">Message</label>
                                                                <textarea name="message" class="form-control " id="" cols="30" rows="4" placeholder="it's.."><?= $review['message']?></textarea>
                                                            </div>
                                                            <button class="btn btn-sm btn-success"><i class="fa fa-upload mr-2"></i> send</button>
                                                            <?php
                                                        }
                                                        }
                                                            
                                                        ?>
                                                        </small></p>
                                                </div>
                                            </div>
                                            <div class="col-md-8 card shadow-none">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Employee</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['employee_name']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Sub Step</label>
                                                                <textarea type="text" readonly class="form-control" rows="4"><?=$dataReport['subStep']?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Service</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['service_name']?>">
                                                            </div>
                                                            
                                                            <a href="<?= base_url('Client/report?detail='.md5($dataReport['order_id'])) ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Final Files</label>
                                                                <ul class="list-unstyled">
                                                                    <?php
                                                                    $type = pathinfo($dataReport['report'], PATHINFO_EXTENSION);
                                                                    $url = base_url().'assets/upload/report/'.$dataReport['report'];
                                                                    switch ($type) {
                                                                        case "pdf":
                                                                            echo '<a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-file-pdf"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        case 'jpg':
                                                                        case 'png':
                                                                        case 'jpeg':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-image "></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                            
                                                                        case 'docx':
                                                                        case 'odt':
                                                                        case 'doc':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-file-word"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        
                                                                        default:
                                                                            echo'';
                                                                      }
                                                                    ?>
                                                                    <li>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Latest Update</label>
                                                                <input type="text" readonly class="form-control" value="<?= date("F j, Y, g:i a", strtotime( $dataReport['update_date'])); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Message</label>
                                                                <textarea type="text" readonly class="form-control" rows="4"><?= $review['message'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                </div>
            </section>
        </div> 
        <?php include 'footer.php';?>
        <script>
            $('#nav_report').addClass('nav_select');
        </script>
</body>

</html>