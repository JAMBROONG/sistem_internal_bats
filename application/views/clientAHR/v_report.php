<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php';?>
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper bg-white">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
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
                            <a href="<?php echo base_url('Client/report'); ?>" class="nav-link text-white " style="background-color: #C1272D;">
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
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card">
                        <?php 
                            if ($validate == "false") {
                            echo '
                            <div class="card-header pt-3" style="background-color: #2F2F2F;">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 style="color: #2F2F2F;">Sorry, your report is not yet available <i class="fa fa-smile-beam"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            }else{
                            ?>
                        <div class="card-body row  d-flex align-items-center">
                            <div class="col-5 text-center">
                                <div class="">
                                    <h2>Select your
                                        <strong>project</strong>
                                    </h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone:
                                        <a href="https://wa.me/628161105174">+6281 6110 5174</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-7">
                                <form class="form-horizontal" action="<?= site_url('Client/report') ?>" method="post">
                                    <div class="form-group">
                                        <label for="inputName">Service name</label>
                                        <select class="form-control select2" name="id_order" style="width: 100%;">
                                            <option value="<?= $selected['id'] ?>"><?= $selected['service_name'] ?> - <?= date("F, Y", strtotime( $selected['create_date']));?></option>
                                            <?php 
                                        foreach ($dataOrder as $row) {
                                            if ($row['service_name'] == $selected['service_name']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>'; 
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="SELECT">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (empty($report)) {
                        ?>
                    <div class="card">
                        <div class="card-body text-center">
                            <div>
                                <h2 class=" text-danger">Sorry, Your Final Report Data is not yet available
                                    <i class="fa fa-smile-beam text-danger"></i>
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Announcement</h5>
                            <p class="card-text">If there are problems, please contact us via email(<a href="mailto:info.batsinternationalgroup@gmail.com">info.batsinternationalgroup@gmail.com</a>) or you can contact us via whatsapp. Thank you.
                            </p>
                            <a href="https://wa.me/6288290222512" class="btn btn-sm btn-success">
                                <i class="fab fa-whatsapp mr-2"></i>
                                call now!</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
        <?php
                        
                    return false;
                    }
                    ?>
        <div class="card card-dark">
            <div class="card-header border-0">
                <h3 class="card-title">Final Report <button class="btn btn-sm bg-transparent text-warning p-1 ml-2" data-toggle="modal" data-target="#modal-warning2"><i class="fa fa-question"></i></button> </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="table_reportDone" class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Activities</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> <?php
            $no = 1;
            foreach ($report as $row) {
                if ($row['review_ceo'] != "do") {
            ?> <tr>
                            <td><?=$no?></td>
                            <td><?=$row['subStep']?></td>
                            <td><?=$row['message']?></td>
                            <td><?= date("l, j F Y H:i a", strtotime($row['update_date']));?></td>
                            <td class="d-flex justify-content-beetween">
                                <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">Download</small></i></a>
                                <a href="<?=base_url('Client/detailReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2"><i class="fa fa-eye"><small class="ml-2">Detail</small></i></a>
                                <?php
                                if ($row['review_status']== "done") { ?>
                                <a href="<?=base_url('Client/approveReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2 disabled"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                <?php
                                } else{ ?>

                                <a type="button" data-toggle="modal" data-target="#modal-done<?=$row['id']?>" class="btn btn-sm btn-outline-success ml-2"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <div class="modal fade " id="modal-done<?=$row['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Explanation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-danger">Make sure you have reviewed the final report, if you are approved it cannot be changed and this report is fixed.</p>
                                        <a href="<?=base_url('Client/approveReport/'.$row['review_id'].'/'.$idOrder)?>" class="btn btn-sm btn-outline-success "><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

            $no++;
                }
            }
            ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Announcement</h5>
                <p class="card-text">If there are problems, please contact us via email(<a href="mailto:info.batsinternationalgroup@gmail.com">info.batsinternationalgroup@gmail.com</a>) or you can contact us via whatsapp. Thank you.
                </p>
                <a href="https://wa.me/6288290222512" class="btn btn-sm btn-success">
                    <i class="fab fa-whatsapp mr-2"></i>
                    call now!</a>
            </div>
            <?php } ?>
        </div>
        </section>
    </div>
    <div class="modal fade " id="modal-warning2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">This table contains the final report, if you are approved then this final report has been marked complete.</p>
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <script>
        $(function() {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });
        })
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>