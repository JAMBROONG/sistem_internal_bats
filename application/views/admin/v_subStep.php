<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Sub Step</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php'; ?>
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <?php
        if (empty($step)) {
            redirect('Admin/Lock');
        }
        ?>
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
                                <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link bg-info ">
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
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
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
                <section class="content">
                    <div class="container pt-3">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataWorkflow')?>">Workflow</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Step <?= $step['step']?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="container-fluid"> <?php
                        if (empty($step)) {
                            $service['service_name'] = "selected";
                            ?> <div class="card shadow-none">
                            <div class="card-body text-center">
                                <h1 class="display-4 ">Sorry!</h1>
                                <p class="lead ">Sub Step for <strong><?= $service['service_name']?></strong> not yet</p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url('Admin/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                        </div> <?php
                            return false;
                        }
                                if ($validate == false) {
                                    
                            include 'script.php';
                                    ?> <div class="card shadow-none">
                            <div class="card-body text-center">
                                <h1 class="display-4 ">Sorry!</h1>
                                <p class="lead ">Sub Step for <strong><?= $step['step']?></strong> not yet</p>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url('Admin/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= site_url('Admin/processCreateSubStep') ?>" method="post">
                                        <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Sub-Step Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal --> <?php
                                    return false;
                                }
                            ?>
                    </div>
            <div class="container-fluid"> <?php
                        if (empty($subStep)) {
                            ?> <div class="jumbotron">
                    <h1 class="display-4">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                    <p class="lead">Your data is not yet available</p>
                    <hr class="my-4">
                    <a href="<?= base_url('Admin/dataWorkflow') ?>" class="btn btn-danger"><i class="fa fa-arrow-left mr-1"></i> Back</a>
                </div> <?php
                            return false;
                        }
                        ?> <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="">
                                <h5 class="card-title">Select a step to view the sub-steps.</h5>
                            </div>
                            <div class="">
                                <a class="btn btn-danger btn-sm" href="<?=base_url('Admin/workflow/'.$step['service_id'])?>"><i class="fa fa-arrow-left pr-1"></i>back</a>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-striped table-inverse">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No.</th>
                                    <th>Sub Step</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($subStep as $row) {
                                    ?>
                                <tr>
                                    <td scope="row" class="text-center"><?=$no;?></td>
                                    <td><?= $row['subStep']?></td>
                                    <td><?=$row['update_date']?></td>
                                    <td class=" d-flex justify-content-between">
                                        <span class="info-box-number d-flex justify-content-end"><small><a type="button" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></small>
                                        <small><a type="button" data-toggle="modal" data-target="#modal-update<?=$row['id']?>" class="ml-2 btn btn-sm btn-primary"><i class="fa fa-edit "></i></a></small>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure delete this sub step?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-dark">Sub Step:<br><?= $row['subStep'] ?></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('Admin/deleteSubStep/'.$row['id'].'/'.$step['id'])?>" class="btn btn-sm btn-danger">Yes delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="modal-update<?=$row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Activities</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?=site_url('Admin/updateSubStep')?>" method="post" id="form<?=$row['id']?>">
                                                    <div class="form-group">
                                                        <label for="">Activities</label>
                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                        <input type="hidden" name="subStep_id" value="<?= $row['id'] ?>">
                                                        <input type="hidden" name="step_id" value="<?= $row['step_id'] ?>">
                                                    </div>
                                                    <button class="btn btn-success btn-sm" type="submit" form="form<?=$row['id']?>"><i class="fa fa-save mr-1"></i>save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="<?= site_url('Admin/processCreateSubStep')?>" method="post">
                        <div class="modal-header">
                            <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                            <h4 class="modal-title text-dark">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="text-dark">Sub-Step Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>

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
            });
        </script>
    </body>

    </html>