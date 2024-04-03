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

<body class="hold-transition">
    <div class="wrapper bg-white">
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/report_home')?>">Report</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
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
        <?php
                    } else{
                        
                    ?>
        <div class="card card-dark">
            <div class="card-header border-0">
                <h3 class="card-title">Final Report <button class="btn btn-sm bg-transparent text-warning p-1 ml-2" data-toggle="modal" data-target="#modal-warning2"><i class="fa fa-question"></i></button> </h3>
            </div>
            <div class="card-body table-responsive">
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
    <?php 
                    }
    include 'footer.php';?>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2();
            $('#nav_report').addClass('nav_select');
        });
    </script>
</body>

</html>