<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Chatt</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <?php include 'header.php' ?>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataChat')?>">Chat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Selected</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                <?php
                        if ($validate == false) {
                            ?>
                            <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not found</p>
                                <hr class="my-4">   
                                <a href="<?php echo base_url('Admin/dataChatt'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                            <?php
                            return false;
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Message</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center">
                                                <strong>User Information</strong>
                                            </p>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card shadow-none">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                                            <p class="text-muted"><?= $dataOrder['name'] ?></p>
                                                            <hr>
                                                            <strong><i class="fa fa-phone mr-1"></i> Phone/Email</strong>
                                                            <p class="text-muted"><?= $dataOrder['phone'].'/'.$dataOrder['email'] ?></p>
                                                            <hr>
                                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                                            <p class="text-muted"><?= $dataOrder['address'] ?></p>
                                                            <hr>
                                                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                                            <p class="text-muted"><?= $dataOrder['message'] ?></p>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="card shadow-none">
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <strong><i class="fas fa-building mr-1"></i> Company</strong>
                                                            <p class="text-muted"> <?= $dataOrder['company'] ?></p>
                                                            <hr>
                                                            <strong><i class="fas fa-user-lock mr-1"></i> Position</strong>
                                                            <p class="text-muted"><?= $dataOrder['position'] ?></p>
                                                            <hr>
                                                            <strong><i class="fa fa-wrench mr-1"></i> Service</strong>
                                                            <p class="text-muted"><?= $dataOrder['service_name'] ?></p>
                                                            <hr>
                                                            <strong><i class="far fa-calendar mr-1"></i> Order date</strong>
                                                            <p class="text-muted"><?= date('d F Y', strtotime($dataOrder['create_date']));?></p>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <strong>Chat</strong>
                                            </p>
                                            <div class="card direct-chat direct-chat-warning shadow-none">
                                                <div class="card-body" style="display: block;">
                                                <?php
                                                    if (empty($chatt)) {
                                                ?> 
                                                    <div class="d-flex justify-content-center p-4">
                                                        <div class="text-center">
                                                            <h4>Chat not yet</h4>
                                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg">
                                                                Start message
                                                            </button>
                                                        </div>
                                                    
                                                    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
                                                    <!-- Bootstrap 4 -->
                                                    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                                                    <div class="modal fade" id="modal-lg">
                                                        <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <form action="<?php echo site_url('admin/addChatt/'.$dataOrder['id'])?>" method="post">
                                                            <div class="modal-header">
                                                            <h4 class="modal-title">Start chat to <strong class="text-warning"><?= $dataOrder['name']?></strong></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <textarea name="chatt" placeholder="message.." id="" class="form-control border-0" cols="30" rows="10"></textarea>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-warning">send</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                            return false;
                                                        }else{
                                                    ?> 
                                                    <div class="direct-chat-messages" id="yourDiv">
                                                <?php
                                                foreach ($chatt as $row) {
                                                if ($row['user_id'] != 0) {
                                                    ?> 
                                                        <div class="direct-chat-msg">
                                                            <div class="direct-chat-infos clearfix">
                                                                <span class="direct-chat-name float-left"><?=$row['name']?></span>
                                                                <span class="direct-chat-timestamp float-right"><?=$row['create_date']?></span>
                                                            </div>
                                                            <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/upload/images/<?=$row['image']?>" alt="message user image">
                                                            <div class="direct-chat-text"> <?=$row['chatt']?> </div>
                                                        </div> 
                                                        <?php
                                                        }
                                                        else{
                                                            ?> 
                                                        <div class="direct-chat-msg right">
                                                            <div class="direct-chat-infos clearfix">
                                                                <span class="direct-chat-name float-right"><?=$row['name']?></span>
                                                                <span class="direct-chat-timestamp float-left"><?=$row['create_date']?></span>
                                                            </div>
                                                            <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$user['image_user']?>" alt="message user image">
                                                            <div class="direct-chat-text"> <?=$row['chatt']?> </div>
                                                        </div> 
                                                        <?php
                                                            }
                                                        }
                                                    }
                                                        ?> 
                                                    </div>
                                                </div>
                                                <div class="card-footer bg-white" style="display: block;">
                                                    <form action="<?php echo site_url('admin/addChatt/'.$dataOrder['id'])?>" method="post">
                                                        <div class="input-group">
                                                            <input type="text" name="chatt" placeholder="Type Message ..." class="form-control">
                                                            <span class="input-group-append">
                                                                <button type="submit" class="btn btn-warning">Send</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- ./card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
            </section>
        </div> 
    <script>
        var element = document.getElementById("yourDiv");
        element.scrollTop = element.scrollHeight;

    </script>
    
    <?php include 'footer.php' ?>
</body>

</html>