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
                                <li class="breadcrumb-item"><a href="<?=base_url('Admin/training')?>">Training</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Content</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- <h1>How to disable downloading of the PDF document</h1>
                    <div class="d-flex p-5" style="height:600px;">
                    <iframe class="border-0 rounded" src="https://drive.google.com/viewerng/viewer?embedded=true&url=http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&scrollbar=0" width="100%" height="100%">
                    </iframe>
                    </div> -->
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon text-danger bg-white">
                                PDF
                            </div>
                        </div>
                        <div class="card-header bg-orange">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContent"><i class="fa fa-plus mr-1"></i> Content</button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_pdf as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a href="<?=$row['content']?>" class="btn btn-sm bg-orange" target="blank"><i class="fa fa-eye mr-1"></i> view content</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updatepdf<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deletepdf<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade text-dark" id="modal-deletepdf<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Admin/delete_content/'.$row['id'].'/'.'pdf/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade text-dark" id="modal-updatepdf<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('Admin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="pdf">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url PDF</label>
                                                                <h5 class="text-sm">ex: <small>https://drive.google.com/file/d/1eT4AbPGVEnyq/</small><small class="text-danger">view?usp=sharing</small></h5>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
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
                        </div>
                    </div>
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-white">
                                POWER POINT
                            </div>
                        </div>
                        <div class="card-header bg-warning">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContentPPT"><i class="fa fa-plus mr-1"></i> Content </button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi2" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_ppt as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a href="<?=$row['content']?>" class="btn btn-sm btn-warning" target="blank"><i class="fa fa-eye mr-1"></i> view content</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updateppt<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deleteppt<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade text-dark" id="modal-updateppt<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content POWER POINT</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('Admin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="ppt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url Power Point</label>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade text-dark" id="modal-deleteppt<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Admin/delete_content/'.$row['id'].'/'.'ppt/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
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
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-white">
                                Youtube
                            </div>
                        </div>
                        <div class="card-header bg-danger">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContentYT"><i class="fa fa-plus mr-1"></i> Content</button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi3" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_yt as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a href="<?=$row['content']?>" class="btn btn-sm btn-danger" target="blank"><i class="fa fa-eye mr-1"></i> view content</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updateyt<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deleteyt<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade text-dark" id="modal-updateyt<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content YOUTUBE</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('Admin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="yt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url Youtube</label> <small>make sure the link format is <b class="text-danger">(https://youtu.be/)</b></small>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade text-dark" id="modal-deleteyt<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Admin/delete_content/'.$row['id'].'/'.'yt/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
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
                </div>
            </section>
        </div>

    <?php include 'footer.php';?>
    <div class="modal fade text-dark" id="modal-addContent">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content PDF</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Admin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="pdf">
                            </div>
                            <div class="form-group">
                                <label for="">Url Drive</label>
                                <h5 class="text-sm">ex: <small>https://drive.google.com/file/d/1eT4AbPGVEnyq/</small><small class="text-danger">view?usp=sharing</small></h5>
                                <input type="text" class="form-control" name="content" placeholder="https://drive.google.com/..">
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
        <div class="modal fade text-dark" id="modal-addContentPPT">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content POWER POINT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Admin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="ppt">
                            </div>
                            <div class="form-group">
                                <label for="">Url Power Point</label>
                                <h5 class="text-sm">ex: <small>https://docs.google.com/document/jnwdw/
                                        <input type="text" class="form-control" name="content" placeholder="https://docs.google.com/.."></small></h5>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit"  class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-dark" id="modal-addContentYT">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content YOUTUBE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Admin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="yt">
                            </div>
                            <div class="form-group">
                                <label for="">Url Youtube</label> <small>make sure the link format is <b class="text-danger">(https://youtu.be/)</b></small>
                                <input type="text" class="form-control" name="content" placeholder="https://youtu.be/YViM..">
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