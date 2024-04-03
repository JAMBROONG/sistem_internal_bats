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
         <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="main-body">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button> Financial Audit
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataProject as $row) {
                                                  if ($row['category_service_id']== 1) {
                                              ?> 
                                                                <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                                <td> <?= $row['service_name']?></td>
                                                                <td class=" text-justify text-sm"><?= $row['description']?></td>
                                                                
                                                            </tr> <?php
                                              $no++;
                                                  }
                                              }
                                              ?> </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button> Taxation
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="example2" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody> <?php
                                        $no = 1;
                                        foreach ($dataProject as $row) {
                                            if ($row['category_service_id']== 2) {
                                            ?>
                                                    <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                    <td> <?= $row['service_name']?></td>
                                                    <td class=" text-justify text-sm"><?= $row['description']?></td>
                                                    
                                                </tr> <?php
                                        $no++;
                                            }
                                        }
                                        ?> </tbody>
                                            </table>
                                        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button> Accounting
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="example3" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example3_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody> <?php
                                        $no = 1;
                                        foreach ($dataProject as $row) {
                                            if ($row['category_service_id']== 3) {
                                    ?> 
                                                    <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                    <td> <?= $row['service_name']?></td>
                                                    <td class=" text-justify text-sm"><?= $row['description']?></td>
                                                    
                                                </tr> <?php
                                        $no++;
                                            }
                                        }
                                        ?> </tbody>
                                            </table>
                                        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button> Corporate Action
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <table id="example4" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example4_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody> <?php
                                        $no = 1;
                                        foreach ($dataProject as $row) {
                                            if ($row['category_service_id']== 4) {
                                    ?> 
                                                    <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                    <td> <?= $row['service_name']?></td>
                                                    <td class=" text-justify text-sm"><?= $row['description']?></td>
                                                    
                                                </tr> <?php
                                        $no++;
                                            }
                                        }
                                        ?> </tbody>
                                            </table>
                                        
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button> Other
                                </h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div id="example5_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="row col-12">
                                        <div class="col-sm-12">
                                            <table id="example5" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example5_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Type of Service</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody> <?php
                                        $no = 1;
                                        foreach ($dataProject as $row) {
                                            if ($row['category_service_id']==0) {
                                    ?> 
                                                    <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                    <td> <?= $row['service_name']?></td>
                                                    <td class=" text-justify text-sm"><?= $row['description']?></td>
                                                    
                                                </tr> <?php
                                        $no++;
                                            }
                                        }
                                        ?> </tbody>
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
            </section>
        </div>
        <?php include 'footer.php';
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