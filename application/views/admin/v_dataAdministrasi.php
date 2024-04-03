<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Administrasi</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper">
        <?php include'top_nav.php'; ?>
            <aside class="main-sidebar bg-white elevation-2 layout-fixed">
                <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                    <img src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                    <small class="text-white font-weight-light">Admin</small>
                </a>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item rounded">
                                <a href="<?php echo base_url('Admin'); ?>" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p> Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataProject'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-microchip"></i>
                                    <p> Services </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-project-diagram"></i>
                                    <p> Workflow </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataInformation'); ?>" class="nav-link">
                                    <i class=" nav-icon fab fa-pied-piper-square"></i>
                                    <p> Seminar </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link bg-info">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p> Users </p>
                                </a>
                            </li>
                            <li class="nav-header text-black  pt-2">EXTERNAL</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>
                                        Client
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link">
                                            <i class="nav-icon fas fa-book"></i>
                                            <p> Order
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataChatt'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-comments"></i>
                                            <p> Chat
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                            <p> Finance
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataCompany'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-building"></i>
                                            <p> Company </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataRecommendation'); ?>" class="nav-link">
                                            <i class=" nav-icon fa fa-record-vinyl"></i>
                                            <p> Service Recommendation </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-envelope"></i>
                                            <p> Feedback </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                       <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user-clock nav-icon"></i>
                                <p>
                                    Guest
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/guestTHC'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-book-medical"></i>
                                        <p> Tax Health Check
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">INTERNAL</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-user-friends nav-icon"></i>
                                    <p>
                                        Employee
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataEmployee'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-user"></i>
                                            <p> Data Employee </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dailyReport'); ?>" class="nav-link">
                                            <i class="nav-icon fa fa-calendar-check"></i>
                                            <p> Daily Report </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/specialTask'); ?>" target="blank" class="nav-link">
                                            <i class="nav-icon fa fa-book-reader"></i>
                                            <p> Special Task </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/training'); ?>" class="nav-link">
                                            <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                            <p> Training</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header text-black  pt-2">OTHER</li>
                            <?php include 'navbar_comingsoon.php'; ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataHistory'); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-history"></i>
                                    <p> History </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        <div class="content-wrapper bg-white">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataUser')?>">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Administrasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h3 class="card-title">DataTable with Admin</h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Phone</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Update Date</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataAdministrasi as $row) {
                                              ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                                <td><?= $row['name']?></td>
                                                                <td><?= $row['phone']?></td>
                                                                <td><?= $row['email']?></td>
                                                                <td><?= date("F j, Y, g:i a",strtotime($row['update_date'])); ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?=$row['id']?>"><i class="fa fa-eye mr-1"></i> detail / edit</button>
                                                                    </div>
                                                                </td>
                                                            </tr> 
                                                            <div class="modal fade " id="modal-detail<?=$row['id']?>">
                                                                <div class="modal-dialog ">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Detail information</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <h5 class="text-center">Data User</h5>
                                                                                    <div class="timeline timeline-inverse">
                                                                                        <div>
                                                                                            <i class="fas fa-user bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Name: </small>
                                                                                                    <a><?=$row['name'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-phone bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                                                    <a><?=$row['phone'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-envelope bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Email: </small>
                                                                                                    <a><?=$row['email'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-user-lock bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Position: </small>
                                                                                                    <a><?=$row['position'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-id-card bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">NIK: </small>
                                                                                                    <a><?=$row['NIK'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                        <i class="fas fa-credit-card bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                                                    <a><?=$row['NPWP'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fas fa-globe bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                                                    <small class="text-dark text-bold">Nationality: </small>
                                                                                                    <a><?=$row['nationality'];?></a>
                                                                                                </h3>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <i class="fa fa-home bg-info"></i>
                                                                                            <div class="timeline-item border-0">
                                                                                                <h3 class="timeline-header border-0 text-info">
                                                                                                    <small class="text-dark text-bold">Address: </small>
                                                                                                </h3>
                                                                                                <div class="timeline-body"> <?= $row['address'] ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-center">
                                                                                        <button class="ml-1 btn btn-danger pl-3 pr-3" style="background-color: #D82724; color:white" data-toggle="modal"  data-target="#modal-updateP<?=$row['id']?>"><i class="fa fa-key mr-1"></i>change password</button>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade " id="modal-updateP<?=$row['id']?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title text-danger">Update Password</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                        <form action="<?=site_url('Admin/processUpdatePassword/'.$row['id'])?>" method="post" id="form1">
                                                                            <div class="form-group">
                                                                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                                                    </div>
                                                                                    <input type="password" id="pswd1" name="password" value="" class="form-control" data-original-title="" title="" placeholder="New Password">
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex justify-content-between">
                                                                                <input class="btn btn-success " type="submit" value="update">
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                              $no++;
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
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>