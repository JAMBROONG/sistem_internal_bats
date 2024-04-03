<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> 

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"><?php include 'header.php';
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
                                    <a href="#" class="nav-link text-muted">
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
                        <li class="nav-item menu-open">
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
                                    <a href="<?php echo base_url('Admin/training'); ?>" class="nav-link bg-info">
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
                                <li class="breadcrumb-item active" aria-current="page">Training</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="d-flex mb-2 justify-content-end">
                        <button class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#modal-crudCategory"><i class="fa fa-pen mr-1"></i> CRUD Category</button>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-crudLevel"><i class="fa fa-pen mr-1"></i> CRUD Level Content</button>
                        <button class="btn btn-sm btn-success ml-2" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus mr-1"></i> Create Title</button>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-row card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Training Material
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card shadow-none">
                                        <ul class="nav nav-pills d-flex justify-content-around">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#tab<?= $data_category[0]['id'] ?>" data-toggle="tab"><?= $data_category[0]['content_training_category'] ?></a>
                                            </li>
                                            <?php
                                                $id = $data_category[0]['id'];
                                                foreach ($data_category as $key) {
                                                    if ($key['id'] == $id) {
                                                        continue;
                                                    } else {?>
                                            <li class="nav-item"><a class="nav-link" href="#tab<?=$key['id']?>" data-toggle="tab"><?= $key['content_training_category'] ?></a></li>
                                            <?php
                                                    }
                                                    ?>
                                            <?php
                                                }
                                                ?>
                                        </ul>
                                        <div class="tab-content pt-4">
                                            <?php
                                        foreach ($data_category as $key) {
                                            if ($key['id'] == $id) {
                                                echo '<div class="tab-pane active " id="tab'.$key['id'].'">';
                                            }
                                            else{
                                                echo '<div class="tab-pane" id="tab'.$key['id'].'">';
                                            }
                                            ?>
                                            <table id="tabel_materi<?=$key['id']?>" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Level</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($title_content as $row) {
                                                        if ($row['id_category'] != $key['id']) {
                                                            continue;
                                                        }
                                                        ?>
                                                    <tr>
                                                        <th scope="row"><?=$no?></th>
                                                        <td><?= $row['content_title'] ?></td>
                                                        <td><?php
                                                echo substr($row['content_description'],0,100);
                                                ?>..
                                                        </td>
                                                        <td><?= $row['content_level'] ?></td>
                                                        <td>
                                                            <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-update<?=$row['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                                            <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                                            <a class="btn btn-sm btn-info m-1" href="<?= base_url('Admin/content_training/'.$row['id']) ?>"> <i class="fa fa-info-circle mr-1"></i> see content</a>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Are you sure delete this Title?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-dark">Title: <br> <?= $row['content_title'] ?></p>
                                                                    <p class="text-dark text-justify">Description: <br> <small><?= $row['content_description'] ?></small></p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                                    <a href="<?= base_url('Admin/delete_content_title/'.$row['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="modal-update<?=$row['id']?>">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Update Title</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?=base_url('Admin/update_content_title')?>" method="post">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Title</label>
                                                                                    <input type="text" class="form-control" value="<?=$row['content_title']?>" name="content_title">
                                                                                    <input type="hidden" class="form-control" value="<?=$row['id']?>" name="id">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Category</label>
                                                                                    <select id="my-select" class="form-control" name="id_category">
                                                                                        <option value="<?= $row['id_category'] ?>"><?= $row['content_training_category'] ?></option>
                                                                                        <?php
                                                                            foreach ($data_category as $key2) {
                                                                                if ($key2['id'] == $row['id_category']) {
                                                                                    continue;
                                                                                }
                                                                                echo '<option value="'.$key2['id'].'">'.$key2['content_training_category'].'</option>';
                                                                            }
                                                                            ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Level</label>
                                                                                    <select id="my-select" class="form-control" name="id_level">
                                                                                        <option value="<?= $row['id_level'] ?>"><?= $row['content_level'] ?></option>
                                                                                        <?php
                                                                            foreach ($data_level as $key3) {
                                                                                if ($key3['id'] == $row['id_level']) {
                                                                                    continue;
                                                                                }
                                                                                echo '<option value="'.$key3['id'].'">'.$key3['content_level'].'</option>';
                                                                            }
                                                                            ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Description</label>
                                                                            <textarea name="content_description" id="" cols="30" rows="10" class="form-control textarea"><?= $row['content_description'] ?></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                            <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                                                        </div>
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
                                        <?php
                                        }
                                            ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>
    <div class="modal fade text-dark" id="modal-add">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Title</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/create_content_title') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="content_title" placeholder="ex: basics of economics">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select id="my-select" class="form-control" name="id_category">
                                        <?php
                                        foreach ($data_category as $key2) {
                                            echo '<option value="'.$key2['id'].'">'.$key2['content_training_category'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Level</label>
                                    <select id="my-select" class="form-control" name="id_level">
                                        <?php
                                        foreach ($data_level as $key3) {
                                            echo '<option value="'.$key3['id'].'">'.$key3['content_level'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="content_description" placeholder="this is.." id="" cols="30" rows="10" class="form-control textarea"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-dark" id="modal-crudCategory">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CRUD Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-addCategory"><i class="fa fa-plus mr-1"></i>create category</button>
                    <table id="tabel_category" class="table table-hover table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no= 1;
                                foreach ($data_category as $key4) {?>
                            <tr>
                                <td class="text-center" scope="row"><?= $no; ?></td>
                                <td><?= $key4['content_training_category'] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-updateCategory<?=$key4['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                    <?php
                                        if ($key4['id'] == 1) {
                                            ?>
                                    <a class="btn btn-sm btn-secondary m-1 disabled"> <i class="fa fa-trash mr-1"></i>(default)</a>
                                    <?php
                                        } else{
                                            ?>
                                    <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-deleteCategory<?=$key4['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                    <?php
                                        }
                                        ?>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-deleteCategory<?=$key4['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure delete this Category?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5><i class="icon fas fa-exclamation-triangle"></i> ATTENTION!</h5>
                                                If you delete this category, all content titles will be moved to the default category (Taxation)
                                            </div>
                                            <p class="text-dark">Category: <br> <?= $key4['content_training_category'] ?></p>
                                            <p class="text-dark text-justify">Latest Update: <br> <small><?= $key4['update_date'] ?></small></p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('Admin/delete_content_category/'.$key4['id']); ?>" class="btn btn-danger">Yes delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-updateCategory<?=$key4['id']?>">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base_url('Admin/update_content_category')?>" method="post">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <input type="text" class="form-control" value="<?=$key4['content_training_category']?>" name="content_training_category">
                                                    <input type="hidden" class="form-control" value="<?=$key4['id']?>" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                    <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                                $no++;
                                }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-dark" id="modal-addCategory">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('Admin/create_content_category')?>" method="post">
                        <div class="form-group">
                            <label for="">Category</label>
                            <input type="text" class="form-control" name="content_training_category">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-dark" id="modal-crudLevel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">CRUD Level</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-addLevel"><i class="fa fa-plus mr-1"></i>create level</button>
                    <table id="tabel_level" class="table table-hover table-striped table-inverse">
                        <thead class="thead-inverse">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no= 1;
                                foreach ($data_level as $key4) {?>
                            <tr>
                                <td class="text-center" scope="row"><?= $no; ?></td>
                                <td><?= $key4['content_level'] ?></td>
                                <td class="d-flex justify-content-end">
                                    <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-updateLevel<?=$key4['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                    <?php
                                        if ($key4['id'] == 1) {
                                            ?>
                                    <a class="btn btn-sm btn-secondary m-1 disabled"> <i class="fa fa-trash mr-1"></i>(default)</a>
                                    <?php
                                        } else{
                                            ?>
                                    <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-deleteLevel<?=$key4['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                    <?php
                                        }
                                        ?>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-deleteLevel<?=$key4['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Are you sure delete this Level?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5><i class="icon fas fa-exclamation-triangle"></i> ATTENTION!</h5>
                                                If you delete this level, all content titles will be moved to the default level (All Level)
                                            </div>
                                            <p class="text-dark">Category: <br> <?= $key4['content_level'] ?></p>
                                            <p class="text-dark text-justify">Latest Update: <br> <small><?= $key4['update_date'] ?></small></p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('Admin/delete_content_level/'.$key4['id']); ?>" class="btn btn-danger">Yes delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal-updateLevel<?=$key4['id']?>">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Update Level</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?=base_url('Admin/update_content_level')?>" method="post">
                                                <div class="form-group">
                                                    <label for="">Category</label>
                                                    <input type="text" class="form-control" value="<?=$key4['content_level']?>" name="content_level">
                                                    <input type="hidden" class="form-control" value="<?=$key4['id']?>" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                    <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                                $no++;
                                }
                                ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-dark" id="modal-addLevel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Level</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?=base_url('Admin/create_content_level')?>" method="post">
                        <div class="form-group">
                            <label for="">Level</label>
                            <input type="text" class="form-control" name="content_level" placeholder="ex: Magister">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php';?>

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
        <?php
        foreach($data_category as $key) {
                ?>
                $(function() {
                    $("#tabel_materi<?=$key['id']?>").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                }); <?php
            }?>
            $(function() {
                $("#tabel_category").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        $(function() {
            $("#tabel_level").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>