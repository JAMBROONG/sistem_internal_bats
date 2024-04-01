<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="user-panel d-flex align-items-center">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" class=" elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-dark"><?= $user['company']; ?></a>
                    </div>
                </div>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1 position-fixed" style="background-color: #2F2F2F;">
            <div class="sidebar">
                <div class="user-panel d-flex align-items-center mt-3">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-white"><?= $user['name']; ?></a>
                    </div>
                </div>
                <hr class="m-0 mt-2 border-white">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                            <a href="<?php echo base_url('Client/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/profile'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/file'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>My Files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/ourServices'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>BATS Consulting Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/whatsNew'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>What's New?</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/typeOfData'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-book"></i>
                                <p>General Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/contract'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Service Contract</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/invoice'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/jobTrack'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>Job track</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/report'); ?>" class="nav-link text-white"  style="background-color: #C1272D;">
                                <i class="nav-icon fas fa-edit"></i>
                                <p> Work Report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/feedback'); ?>" class="nav-link text-white">
                                <i class="nav-icon far fa-envelope"></i>
                                <p> Feedback </p>
                            </a>
                        </li>
                        <?php include 'navbar_new.php' ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/report')?>">Work Report</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
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
                                                            
                                                            <a href="<?= base_url('Client/jobTrack/'.$dataReport['order_id']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
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
        </div> <?php include 'footer.php';?>
</body>

</html>