<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <?php include 'header.php' ?>
</head>

<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper bg-white">
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
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p> Users </p>
                                </a>
                            </li>
                            <li class="nav-header text-black  pt-2">EXTERNAL</li>
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>
                                        Client
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link bg-info">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid"><?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?> 
                    <div class="jumbotron bg-light pt-2 pb-2 text-center">
                        <h1 class="display-5 text-danger"><?= $dataOrder['service_name']?></h1>
                        <p class="lead">order date <?= date("F j, Y.", strtotime($dataOrder['create_date']));?></p>
                        <a type="button"data-toggle="modal" data-target="#modal-updateOrder" class="btn btn-sm btn-warning"><i class="fas fa-cogs mr-2"></i>Update Order</a>
                        <a href="<?= base_url('Admin/updateOrderStep/'.$dataOrder['id']); ?>" class="btn btn-sm btn-success text-light"><i class="fas fa-cog mr-2"></i>Update Workflow</a>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-primary pt-3">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title">User Information</h5>
                                    <div class="">
                                        <button type="button" class="btn bg-white  btn-sm pr-5" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus text-primary"></i>
                                        </button>
                                        <button type="button" class="btn bg-white btn-sm pr-5" data-card-widget="remove">
                                            <i class="fas fa-times text-danger"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-4">
                                    <div class="card card-widget widget-user">
                                        <div class="widget-user-header bg-primary">
                                            <h3 class="widget-user-username"><?= $dataOrder['name']?></h3>
                                            <h5 class="widget-user-desc"><?= $dataOrder['client_position']?></h5>
                                        </div>
                                        <div class="widget-user-image">
                                            <img class="img-circle elevation-2 bg-primary" src="<?php echo base_url(); ?>assets/upload/images/<?=$dataOrder['company_image']?>" alt="User Avatar">
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-sm-6 border-right">
                                                    <div class="description-block">
                                                        <h6><?= $dataOrder['client_phone']?></h6>
                                                        <span class="description-text">WhatsApp</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="description-block">
                                                        <h6><?= $dataOrder['email']?></h6>
                                                        <span class="description-text">Email</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Address:</h5>
                                            <p class="card-text"><?= $dataOrder['client_address']?></p>
                                            <hr>
                                            <h5 class="card-title">Message:</h5>
                                            <p class="card-text"><?= $dataOrder['message']?></p>
                                            <hr>
                                            <a href="<?= base_url('Admin/dataOrder') ?>" class="btn btn-default text-danger">
                                            <i class="fa fa-arrow-left mr-1 pr-1 "></i>Back
                                            </a>
                                            <button type="button" class="btn btn-default text-danger" data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-trash mr-1 pr-1 "></i>Delete Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6 row">
                                    <div class="col-md-12 text-center">
                                        <h5>Data Director</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Name</h6>
                                                <input type="text" class=" form-control" value="<?= $person['name'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Phone</h6>
                                                <input type="text" class=" form-control" value="<?= $person['phone'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Email</h6>
                                                <input type="text" class=" form-control" value="<?= $person['email'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NIK</h6>
                                                <input type="text" class=" form-control" value="<?= $person['NIK'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NPWP</h6>
                                                <input type="text" class=" form-control" value="<?= $person['NPWP'] ?>" disabled>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Position</h6>
                                                <input type="text" class=" form-control" value="<?= $person['position'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Nationality</h6>
                                                <input type="text" class=" form-control" value="<?= $person['nationality'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Address</h6>
                                                <textarea name="" id="" cols="30" rows="5" class=" form-control" disabled><?= $person['address'] ?></textarea>
                                                <h6 class="mt-2 mb-0">Financial statements</h6>
                                                <input type="text" class=" form-control" value="<?= $dataOrder['financial_statements'] ?>" disabled>
                                                <a type="button"data-toggle="modal" data-target="#modal-updateOrder" class="btn btn-sm btn-warning mt-2"><i class="fas fa-cogs mr-2"></i>Update</a>
                                                <button class="btn btn-sm btn-success mt-2" data-toggle="modal" data-target="#modal-createPIC"><i class="fa fa-plus mr-2"></i> add PIC</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                    if (empty($pic)) {
                                        ?>
                                        <div class="col-md-12 text-center">
                                        <h5>Data PIC</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card shadow-none">
                                                <div class="card-body text-center">
                                                    <h6>PIC data doesn't exist yet</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else{
                                        $no = 1;
                                        foreach ($pic as $row) {
                                        ?>
                                        <div class="col-md-6">
                                        <div class="col-md-12 text-center">
                                            <h5>Data PIC <?=$no?></h5>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card shadow-none">
                                                        <div class="card-body ">
                                                            <h6 class="mt-2 mb-0">Name</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['pic_name'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">Phone</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['phone'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">Email</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['email'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">NIK</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['NIK'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">NPWP</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['NPWP'] ?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card shadow-none">
                                                        <div class="card-body ">
                                                            <h6 class="mt-2 mb-0">Position</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['position'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">Nationality</h6>
                                                            <input type="text" class=" form-control" value="<?= $row['nationality'] ?>" disabled>
                                                            <h6 class="mt-2 mb-0">Address</h6>
                                                            <textarea name="" id="" cols="30" rows="7" class=" form-control" disabled><?= $row['address'] ?></textarea>
                                                            <a href="<?=base_url('Admin/updatePIC/'.$row['id'])?>" class="btn btn-sm btn-primary mt-2"><i class="fas fa-cogs mr-2"></i>Update</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $no++;
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title">BATS Consulting Team</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                                    <div class="row">
                                        <div class="card col-md-4 shadow-none">
                                            <img class="" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['manager_image']?>" alt="User profile picture">
                                            <div class="card-body box-profile  rounded">
                                                <h3 class="profile-username text-center"><?= $dataOrder['manager_name']?></h3>
                                                <p class="text-muted text-center">Manager</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 shadow-none">
                                            <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['partner_image']?>" alt="">
                                            <div class="card-body box-profile  rounded">

                                                <h3 class="profile-username text-center"><?= $dataOrder['partner_name']?></h3>
                                                <p class="text-muted text-center">Partner</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 shadow-none"> <img class="" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['supervisor_image']?>" alt="User profile picture">

                                            <div class="card-body box-profile  rounded">

                                                <h3 class="profile-username text-center"><?= $dataOrder['supervisor_name']?></h3>
                                                <p class="text-muted text-center">Supervisor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <?php
                                foreach ($dataStaff as $row) {
                                    if ($dataOrder['supervisor_id'] == $row['id_employee']) {
                                        continue;
                                    }
                                ?> <div class="col-md-3 rounded card shadow-none">
                                    <img   src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" alt="User profile picture">
                                            <div class="card-body box-profile">
                                                <h3 class="profile-username text-center"><?=$row['employee_name']?></h3>
                                                <p class="text-muted text-center">Staff</p>
                                            </div>
                                        </div> <?php
                                }
                                ?> </div>
                        </div>
                    </div>
                        <div class="card"> <?php
                            if (empty($step)) {
                                ?> <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not yet</p>
                                <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                                <hr class="my-4">
                            </div> <?php
                                
                            } else{
                            ?> <div class="card-header bg-info">
                                    <h5 class="card-title">Flow <?= $dataOrder['service_name']?></h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-head-fixed text-wrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Control Item</th>
                                            <th>Description</th>
                                            <th>Activities</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        
                                        $no2 = 1;
                                        $step = "";
                                        foreach ($substep as $row) {
                                            if ($row['step'] == $step) {
                                            ?>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td><?= $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                                <?php
                                                $no2++;
                                                }
                                                else{
                                                    $no2 = 1;
                                                    $step = $row['step'];
                                                
                                                ?>
                                                <td><?=$no;?></td>
                                                <td><?=$row['step'];?></td>
                                                <td><?=$row['description'];?></td>
                                                <td><?=  $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                            <?php
                                            $no++; 
                                            $no2++;    
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                        
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                </div>
            </section>
        </div>

        <!-- modal for delete order -->
        <div class="modal fade bg-danger" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Are you sure delete this order?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Service <strong><?= $dataOrder['service_name'] ?></strong> </p>
                        <p class="text-dark">Client <strong><?= $dataOrder['name'] ?> </strong> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('Admin/deleteOrder/'.$dataOrder['id']); ?>" class="btn btn-danger">Yes delete</a>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.modal -->

      <!-- modal for update order -->
      <div class="modal fade" id="modal-updateOrder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary">Are you sure to update this order?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Service <strong><?= $dataOrder['service_name'] ?></strong> </p>
                        <p class="text-dark">Client <strong><?= $dataOrder['name'] ?> </strong> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('Admin/updateOrder/'.$dataOrder['id']); ?>" class="btn btn-primary">Yes update</a>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.modal -->
      
            <!-- modal for update order -->
        <div class="modal fade" id="modal-createPIC">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create PIC</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <form action="<?= site_url('Admin/processCreatePIC') ?>" method="post" class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="order_id" value="<?=$dataOrder['id']?>">
                                        <input type="text" class="form-control" name="person_responsible" placeholder="ex: alex.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" name="phone" placeholder="ex: 0822.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="ex: @gmail.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="NIK" placeholder="ex: 3212.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP</label>
                                        <input type="text" class="form-control" name="NPWP" placeholder="ex: 3.22-1.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="position" placeholder="ex: marketing.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <select name="nationality" id="" class=" form-control select2" required style="width: 100%;">
                                            <?php
                                            foreach ($country as $row) {
                                                echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                            ?>    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control" placeholder="Jl. Sudirman.." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-1"></i> save</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <?php include 'footer.php' ?>
</body>

</html>