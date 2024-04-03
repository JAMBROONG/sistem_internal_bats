<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Review</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid"> <?php
                            if (empty($person)) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('Employee/order'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?>
                    <div class="jumbotron bg-light pt-2 pb-2 text-center">
                        <h1 class="display-5 text-danger"><?= $dataOrder['service_name']?></h1>
                        <p class="lead">order date <?= date("F j, Y.", strtotime($dataOrder['create_date']));?></p>
                    </div>
                    <?php
                    if ($supervisor == "true") {
                        ?>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header border-0 bg-info">
                                <h3 class="card-title">All Report
                                    <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-AllReport"><i class="fa fa-question"></i></a>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="table_AllReport" class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Activities</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Review by Ceo</th>
                                            <th>Review by Supervisor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                            ?> <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['subStep']?></td>
                                            <td><?=$row['message']?></td>
                                            <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                            <td>
                                                <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1"></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info border-0">
                                <h3 class="card-title">Review to Me<a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-ReviewBySupervisor"><i class="fa fa-question"></i></a></h3>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="table_AllReport" class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Activities</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Review by Me</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                            ?> <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['subStep']?></td>
                                            <td><?=$row['message']?></td>
                                            <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                            <td>
                                                <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">download</small></i></a>
                                                    <?php
                                                        if ($row['review_supervisor'] == "done") {
                                                            ?>
                                                    <a type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-NreviewCeo<?=$row['id']?>"><i class="fa fa-ban"><small class="ml-1">Cancel</small></i></a>
                                                    <?php 
                                                        } else{
                                                        ?>
                                                    <a type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-reviewCeo<?=$row['id']?>"><i class="fa fa-check"><small class="ml-1">Approved</small></i></a>
                                                    <?php
                                                        }
                                                        ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- modal for delete report -->
                                        <div class="modal fade " id="modal-reviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Reports that have been approved will be sent directly to the client for approval.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Employee/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Approved</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="modal-NreviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>With this you will remove approval on this report.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Employee/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal --> <?php
                                            $no++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info border-0">
                                <h3 class="card-title">Final Report <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-finalReport"><i class="fa fa-question"></i></a></h3>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="table_AllReport" class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Activities</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Review by Supervisor</th>
                                            <th>Review by Ceo</th>
                                            <th>Review by Client</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_supervisor'] == "done" && $row['review_ceo'] == "done" && $row['review_status'] == "done") {
                                            ?> <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['subStep']?></td>
                                            <td><?=$row['message']?></td>
                                            <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                            <td>
                                                <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_status'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">download</small></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- modal for delete report -->
                                        <div class="modal fade " id="modal-reviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Reports that have been approved will be sent directly to the client for approval.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('superAdmin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Approved</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="modal-NreviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>With this you will remove approval on this report.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('superAdmin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal --> <?php
                                            $no++;
                                                    }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    } else{
                        ?>
                        <div class="card">
                            <div class="card-header bg-info border-0">
                                <h3 class="card-title">All Report
                                    <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-AllReport"><i class="fa fa-question"></i></a>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="table_all" class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Activities</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Review by Ceo</th>
                                            <th>Review by Supervisor</th>
                                            <th>Review by Client</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                            ?> <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['subStep']?></td>
                                            <td><?=$row['message']?></td>
                                            <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                            <td>
                                                <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1"></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_status'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-info border-0">
                                <h3 class="card-title">Final Report <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-finalReport"><i class="fa fa-question"></i></a></h3>
                                </h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table id="table_final" class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Activities</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Review by Supervisor</th>
                                            <th>Review by Ceo</th>
                                            <th>Review by Client</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_supervisor'] == "done" && $row['review_ceo'] == "done" && $row['review_status'] == "done") {
                                            ?> <tr>
                                            <td><?=$no?></td>
                                            <td><?=$row['subStep']?></td>
                                            <td><?=$row['message']?></td>
                                            <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                            <td>
                                                <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if ($row['review_status'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">download</small></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- modal for delete report -->
                                        <div class="modal fade " id="modal-reviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Reports that have been approved will be sent directly to the client for approval.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('superAdmin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Approved</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="modal-NreviewCeo<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>With this you will remove approval on this report.</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('superAdmin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Cancel</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.modal --> <?php
                                            $no++;
                                                    }
                                            }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    </div>
            </section>
        </div>
        
    <!-- MODAL -->
    <div class="modal fade " id="modal-AllReport">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Contains all employee report data</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modal-ReviewBySupervisor">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Contains a report that has been reviewed by the supervisor.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modal-finalReport">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">This is the final report, it has been approved by all parties.</p>
                </div>
            </div>
        </div>
    </div>
        <?php 
include 'footer.php';

?>
</body>

</html>