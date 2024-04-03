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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="card-title">Order for You Now</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No. </th>
                                        <th>Service</th>
                                        <th>Company</th>
                                        <th>Partner</th>
                                        <th>Manager</th>
                                        <th>Supervisor</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($orderDo as $row) {
                                        ?>
                                    <tr>
                                        <td scope="row"><?= $no; ?></td>
                                        <td><?= $row['service_name']; ?></td>
                                        <td><?= $row['company']; ?></td>
                                        <td><?= $row['partner']; ?></td>
                                        <td><?= $row['manager']; ?></td>
                                        <td><?= $row['supervisor']; ?></td>
                                        <td><?= date("F j, Y, g:i a", strtotime($row['create_date'])); ?></td>
                                        <td>
                                            <a href="<?=base_url('Employee/reportReview/'.$row['id'])?>" class="btn btn-sm btn-success"><i class="fas fa-comment-medical mr-2"></i> view review</a>
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
                        <div class="card-header bg-success">
                            <h5 class="card-title">Order for You Done</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No. </th>
                                        <th>Service</th>
                                        <th>Company</th>
                                        <th>Partner</th>
                                        <th>Manager</th>
                                        <th>Supervisor</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no =1;
                                    foreach ($orderDone as $row) {
                                        ?>
                                    <tr>
                                        <td scope="row"><?= $no; ?></td>
                                        <td><?= $row['service_name']; ?></td>
                                        <td><?= $row['company']; ?></td>
                                        <td><?= $row['partner']; ?></td>
                                        <td><?= $row['manager']; ?></td>
                                        <td><?= $row['supervisor']; ?></td>
                                        <td><?= date("F j, Y, g:i a", strtotime($row['create_date'])); ?></td>
                                        <td>
                                            <a href="<?=base_url('Employee/reportReview/'.$row['id'])?>" class="btn btn-sm btn-success"><i class="fa fa-book mr-2"></i> view review</a>
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
                </div>
            </section>
        </div>
    <?php 
include 'footer.php';

?>
</body>

</html>