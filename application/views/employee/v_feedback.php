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
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="callout callout-warning">
                                <h5>Information!</h5>
                                <p>feedback will be available if the order has been completed completely</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-info">
                            <h5 class="card-title">Find by order</h5>
                        </div>
                        <div class="card-body"> <?php
                            if (empty($orderDone)) {
                                echo"not found";
                                ?>
                        </div>
                    </div>
                </div></section></div>
                                <?php
                                include 'footer.php';
                                exit();
                            }
                            ?> <table class="table table-striped table-inverse table-responsive-lg">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No. </th>
                                        <th>Service</th>
                                        <th>Company</th>
                                        <th>Partner</th>
                                        <th>Manager</th>
                                        <th>Supervisor</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                    $no =1;
                                    foreach ($orderDone as $row) {
                                        ?> <tr>
                                        <td scope="row"><?= $no; ?></td>
                                        <td><?= $row['service_name']; ?></td>
                                        <td><?= $row['company']; ?></td>
                                        <td><?= $row['partner']; ?></td>
                                        <td><?= $row['manager']; ?></td>
                                        <td><?= $row['supervisor']; ?></td>
                                        <td>
                                            <a href="<?=base_url('Employee/detailFeedback/'.$row['id'])?>" class="btn btn-sm btn-success text-white border-0 d-flex align-items-center"><i class="fa fa-eye mr-2"></i> detail</a>
                                        </td>
                                    </tr> <?php
                                        $no++;
                                    }
                                    ?> </tbody>
                            </table>
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