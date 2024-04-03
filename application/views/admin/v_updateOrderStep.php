<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
    <?php include 'header.php'
    ?>
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
                                <li class="breadcrumb-item active" aria-current="page">Update step</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                <?php
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
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header bg-info border-0">
                            <h3 class="card-title">Update Workflow : <strong><?= $dataOrder['service_name'] ?></strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?= site_url('Admin/processUpdateOrderStep') ?>" method="post">
                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                    <div class="card shadow-none">
                                        <div class="callout callout-warning">
                                            <h5><i class="fas fa-info text-warning"></i> Note:</h5>
                                            Below are the general steps.
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
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
                                                    $no3 = 1;
                                                    $steps = "";
                                                    $subOld =[];
                                                    foreach ($substepOld as $row) {
                                                        array_push($subOld,$row['subStep_id']);
                                                    }
                                                    foreach ($substep as $row) {
                                                        if ($row['step'] == $steps) {
                                                        ?>
                                                        <tr>
                                                            <td class="border-0"></td>
                                                            <td class="border-0"></td>
                                                            <td class="border-0"></td>
                                                            <td>
                                                                <?php
                                                                if (in_array($row['sub_id'], $subOld))
                                                                {
                                                               ?>
                                                               <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>" checked disabled>
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary"  data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2"  data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('Admin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('Admin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a  class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('Admin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>">
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary"  data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2"  data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('Admin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a  class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('Admin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                 ?>
                                                            </td>
                                                        </tr>
                                                            <?php
                                                            $no2++;
                                                            }
                                                            else{
                                                                $no2 = 1;
                                                                $steps = $row['step'];
                                                            ?>
                                                            <td><?=$no;?></td>
                                                            <td><?=$row['step'];?></td>
                                                            <td><?=$row['description'];?></td>
                                                            <td>
                                                            <?php
                                                                if (in_array($row['sub_id'], $subOld))
                                                                {
                                                               ?>
                                                               <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>" checked disabled>
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary"  data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2"  data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('Admin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit" formaction="<?=site_url('Admin/updateActivities')?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a  class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('Admin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>">
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary"  data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2"  data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('Admin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit" formaction="<?=site_url('Admin/updateActivities')?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a  class="btn btn-sm btn-danger"  data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('Admin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                 ?>
                                                            </td>
                                                        </tr>
                                                        <?php   
                                                        $no++;
                                                        $no2++;
                                                        }
                                                        $no3++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                        <button type="submit" class="btn btn-sm btn-success  pl-3 pr-3">Update Step</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?= site_url('Admin/processCreateStep/'.$dataOrder['service_id']) ?>" method="post" class="border p-3 rounded">
                                        <div class="form-group">
                                            <label>Add Step (public step)</label>
                                            <div class="form-group clearfix">
                                                <input type="text" name="name" class=" form-control" placeholder="step name.." required>
                                                <input type="hidden" name="con" value="true">
                                                <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                            </div>
                                            <div class="form-group clearfix">
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="description.."></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success  pl-3 pr-3">add</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="callout callout-warning">
                                        <h5><i class="fas fa-info text-warning"></i> Note:</h5>
                                            if you want to make a step without a sub step to this order, create a step first and then fill in the name of the sub step the same as the step name.
                                        </div>
                                    <form action="<?= site_url('Admin/processCreateSubStep') ?>" method="post" class="border p-3 rounded">
                                    
                                        <div class="form-group">
                                            <label>Add Substep to this order</label>
                                            <div class="form-group clearfix">
                                                <input type="hidden" name="order_id" value="<?= $dataOrder['id']?>">
                                                <input type="text" name="name" class=" form-control" placeholder="sub step name.." required>
                                            </div>
                                            <div class="form-group clearfix">
                                                <small>Select step</small>
                                                <select id="my-select" class="form-control select2" name="step_id" style="width: 100%;">
                                                    <?php
                                                    foreach ($step as $row) {
                                                        echo '<option value="'.$row['id'].'">'.$row['step'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success  pl-3 pr-3">add</button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php'?>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>