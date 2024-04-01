<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini bg-dark sidebar-collapse">
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
                    <div class="info">
                        <a href="<?php echo base_url('Guest'); ?>" class="d-block text-wrap text-dark"><?= $user['name']; ?></a>
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
                        <a href="<?php echo base_url('Guest'); ?>" class="d-block text-wrap text-white">Guest</a>
                    </div>
                </div>
                <hr class="m-0 mt-2 border-white">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/ourServices'); ?>" class="nav-link"  style="background-color: #C1272D; color:white;">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>BATS Consulting Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/training'); ?>" class="nav-link" style="color:white;">
                                <i class="nav-icon fas fa-book"></i>
                                <p> Training </p>
                            </a>
                        </li>
                        <li class="nav-header text-black  pt-2">Special Fitur Client</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-warning">
                                <i class="fa fa-user nav-icon"></i>
                                <p>
                                    Client
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none;">
                            
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>My Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-file-upload"></i>
                                        <p>My Files</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>General Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-id-badge"></i>
                                        <p>Service Contract</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Invoices</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-project-diagram"></i>
                                        <p>Job track</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p> Work Report </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon far fa-envelope"></i>
                                        <p> Feedback </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
        <div class="content-wrapper bg-white pl-5 pr-5 pt-3">
            <section class="content ml-5 mr-5">
            <div class="container-fluid">
                    <div class="main-body">
                        <div class="jumbotron" style="background-color: #2F2F2F;">
                            <h1 class="display-6 text-white">Our Services</h1>
                            <p class="text-white">We provide a wide range of services.</p>
                            <hr class="my-4 border-white">
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"  style="background-color: #2F2F2F; color:white;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Financial Audit
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
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
                                                                <td class=" text-justify"><?= $row['description']?></td>
                                                                
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"   style="background-color: #2F2F2F; color:white;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Taxation
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
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
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"   style="background-color: #2F2F2F; color:white;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Accounting
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
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
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"   style="background-color: #2F2F2F; color:white;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Corporate Action
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example4_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
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
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"   style="background-color: #2F2F2F; color:white;">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button> Other
                                        </h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
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
                                                            <td class=" text-justify"><?= $row['description']?></td>
                                                            
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
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
</body>

</html>