<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Feedback</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include 'header.php';?> 
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/')?>">Feedback</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <hr>
                            <h3>From CEO</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header bg-dark">
                                    <h5 class="card-title">Send your feedback to Employye</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <?php
                                                $staffOld = [];
                                                $no=1;
                                                foreach ($staff2 as $key) {
                                                    array_push($staffOld,$key['employee_id']);
                                                }
                                                $staffOld = array_unique($staffOld);
                                                foreach ($staff as $row) {
                                                    if (in_array($row['id_employee'],$staffOld)) {
                                                        continue;
                                                    }
                                                    ?>
                                                    <div class="col-md-2" style="text-align: center;">
                                                        <a href="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" data-toggle="lightbox" data-title="sample '<?=$no?>' - white" data-gallery="gallery">
                                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" class="img-fluid mb-2 rounded" style="height: 150px;" alt="white sample">
                                                        </a><br>
                                                        <label for=""><?=$row['employee_name']?></label>
                                                    </div>
                                                    <?php
                                                    $no++;
                                                }
                                                ?>

                                       
                                    </div>
                                    <div class="row">
                                        <div class="info-box m-2 col">
                                            <span class="info-box-icon bg-success elevation-1">5</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Very Good</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(5/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col">
                                            <span class="info-box-icon bg-primary elevation-1">4</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Good</span>
                                                <span class="info-box-number">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(4/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col">
                                            <span class="info-box-icon bg-warning elevation-1">3</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Moderately Good</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(3/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col">
                                            <span class="info-box-icon bg-orange elevation-1">2</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Bad</span>
                                                <span class="info-box-number">
                                                <i class="fa fa-star text-warning"></i>
                                                <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(2/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col">
                                            <span class="info-box-icon bg-danger elevation-1">1</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Very Bad</span>
                                                <span class="info-box-number">
                                                <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(1/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <form action="<?= site_url('SuperAdmin/processCreateFeedback') ?>" method="post" class="">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Select Employee</label>
                                            <select class="custom-select form-control-border" name="employee_id" id="exampleSelectBorder"> <?php
                                                $staffOld = [];
                                                foreach ($staff2 as $key) {
                                                    array_push($staffOld,$key['employee_id']);
                                                }
                                                $staffOld = array_unique($staffOld);
                                                foreach ($staff as $row) {
                                                    if (in_array($row['id_employee'],$staffOld)) {
                                                        continue;
                                                    }
                                                    echo'<option value="'.$row['id_employee'].'">'.$row['employee_name'].'</option>     ';
                                                }
                                                ?> </select>
                                            <input type="hidden" name="categoryFeedback_id" value="1">
                                            <input type="hidden" name="order_id" value="<?=$selected['id']?>">
                                            <!-- <div class="form-group d-flex justify-content-center">
                                                <span class="myratings">5</span>
                                            </div> -->
                                        </div>
                                        <div class="form-group"> 
                                            <?php
                                            $no = 1;
                                            $no2 = 1;
                                            $no3 =1;
                                            $data = "";
                                            foreach ($criteria as $row) {
                                                if ($row['category_criteria'] != $data) {
                                                    $no = 1;
                                                    echo ' <label for="" class=" mt-2">'. $row['category_criteria'].'</label>';
                                                }
                                                ?> 
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <h6 for="" class="mr-3"><?= $no.'. '. $row['criteria'] ?></h6>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="5<?=$row['id']?>" required id="radioSuccess<?=$no2+1?>">
                                                        <label for="radioSuccess<?=$no2+1?>"> 5 </label>
                                                    </div>
                                                    <div class="icheck-lightblue d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="4<?=$row['id']?>" required id="radioSuccess<?=$no2+2?>">
                                                        <label for="radioSuccess<?=$no2+2?>"> 4 </label>
                                                    </div>
                                                    <div class="icheck-warning d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="3<?=$row['id']?>" required id="radioSuccess<?=$no2+3?>">
                                                        <label for="radioSuccess<?=$no2+3?>"> 3 </label>
                                                    </div>
                                                    <div class="icheck-orange d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="2<?=$row['id']?>" required id="radioSuccess<?=$no2+4?>">
                                                        <label for="radioSuccess<?=$no2+4?>"> 2 </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="1<?=$row['id']?>" required id="radioSuccess<?=$no2+5?>">
                                                        <label for="radioSuccess<?=$no2+5?>"> 1 </label>
                                                    </div>
                                                </div>
                                            </div> <?php
                                                $no++;
                                                $no3++;
                                                $no2 = $no2 +6;
                                                $data = $row['category_criteria'];
                                            }
                                            ?> <input type="hidden" name="total" value="<?=$no3-1?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <textarea class="form-control" rows="3" name="feedback" placeholder="Your feedback ..." style="height: 107px;" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm pr-3 pl-3"><i class="fa fa-save mr-3"></i> send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-dark">
                                <div class="card-header">
                                    <h5 class="card-title">All feedback</h5>
                                </div>
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline " role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Employee</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Star</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Update Date</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              
                                              foreach ($dataFeedback as $row) {
                                              ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                                <td><?= $row['employee_name']?></td>
                                                                <td>
                                                                <?php
                                                                for ($i=1; $i <= $row['star'] ; $i++) { 
                                                                    echo '
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                                                }
                                                                ?>
                                                                    (<?=$row['star']?>/5)
                                                                </td>
                                                                <td><?= date("F j, Y, g:i a",strtotime($row['update_date'])); ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="<?php echo base_url('SuperAdmin/detailFeedback/'.$row['id']); ?>"><i class="fa fa-book-reader p-2 text-primary"></i>detail</a>
                                                                    </div>
                                                                </td>
                                                            </tr> <?php
                                              $no++;
                                              }
                                              ?> </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">No.</th>
                                                                <th rowspan="1" colspan="1">Employee</th>
                                                                <th rowspan="1" colspan="1">Star</th>
                                                                <th rowspan="1" colspan="1">Update Date</th>
                                                                <th rowspan="1" colspan="1">Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <hr>
                            <h3>From Client</h3>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Feedback to Employee</h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example4" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">To</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Rating</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Feedback</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($feedbackEmployee as $row) {
                                              ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                                <td> <?= $row['name']?></td>
                                                                <td><?= $row['employee_name']?></td>
                                                                <td>
                                                                <?php
                                                                for ($i=1; $i <= $row['star'] ; $i++) { 
                                                                    echo '
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                                                }
                                                                ?>
                                                                    (<?=$row['star']?>/5)
                                                                </td>
                                                                <td><?= $row['feedback']?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="<?php echo base_url('SuperAdmin/detailFeedbackEmployee/'.$row['id']); ?>"><i class="btn fas fa-eye text-primary"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr> <?php
                                              $no++;
                                              }
                                              ?> </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">No.</th>
                                                                <th rowspan="1" colspan="1">Name</th>
                                                                <th rowspan="1" colspan="1">To</th>
                                                                <th rowspan="1" colspan="1">Rating</th>
                                                                <th rowspan="1" colspan="1">Feedback</th>
                                                                <th rowspan="1" colspan="1">Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">Feedback to Company</h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example3_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">To</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Rating</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Feedback</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($feedbackCompany as $row) {
                                              ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                                <td> <?= $row['name']?></td>
                                                                <td>BATS Consulting</td>
                                                                <td>
                                                                <?php
                                                                for ($i=1; $i <= $row['star'] ; $i++) { 
                                                                    echo '
                                                                    <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                                                }
                                                                ?>
                                                                    (<?=$row['star']?>/5)
                                                                </td>
                                                                <td><?= $row['feedback']?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="<?php echo base_url('SuperAdmin/detailFeedbackCompany/'.$row['id']); ?>"><i class="btn fas fa-eye text-primary"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr> <?php
                                              $no++;
                                              }
                                              ?> </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th rowspan="1" colspan="1">No.</th>
                                                                <th rowspan="1" colspan="1">Name</th>
                                                                <th rowspan="1" colspan="1">To</th>
                                                                <th rowspan="1" colspan="1">Rating</th>
                                                                <th rowspan="1" colspan="1">Feedback</th>
                                                                <th rowspan="1" colspan="1">Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php'; ?>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>