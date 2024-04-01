<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Admin</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

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
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataUser')?>">Users</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataAdmin')?>">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-center bg-info">
                                    <div class="card-title">
                                        Detail Admin
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            <div class="text-center">
                                                <img class="profile-user-img border-0 p-2 bg-info rounded mb-4" src="<?php echo base_url(); ?>assets/upload/images/<?=$dataClient['image']?>" alt="User profile picture">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="text-center">Data User</h5>
                                                    <div class="timeline timeline-inverse">
                                                        <div>
                                                            <i class="fas fa-user bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Name: </small>
                                                                    <a><?=$dataClient['name'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-phone bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                    <a><?=$dataClient['phone'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-envelope bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Email: </small>
                                                                    <a><?=$dataClient['email'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-user-lock bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Position: </small>
                                                                    <a><?=$dataClient['position'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-id-card bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NIK: </small>
                                                                    <a><?=$dataClient['NIK'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                        <i class="fas fa-credit-card bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                    <a><?=$dataClient['NPWP'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-globe bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Nationality: </small>
                                                                    <a><?=$dataClient['nationality'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-home bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info">
                                                                    <small class="text-dark text-bold">Address: </small>
                                                                </h3>
                                                                <div class="timeline-body"> <?= $dataClient['address'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="text-center">Data Company</h5>
                                                    <div class="timeline timeline-inverse">
                                                        <div>
                                                            <i class="fas fa-building bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Company: </small>
                                                                    <a><?=$dataClient['company'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-phone bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                    <a><?=$dataClient['company_phone'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-envelope bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Email: </small>
                                                                    <a><?=$dataClient['company_email'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                        <i class="fas fa-credit-card bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                    <a ><?=$dataClient['company_NPWP'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-angle-up bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Type of Business Entity: </small>
                                                                    <a><?=$dataClient['typeBusiness'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-angle-up bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Form of Business Entity: </small>
                                                                    <a><?=$dataClient['businessEntity'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-home bg-primary"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info">
                                                                    <small class="text-dark text-bold">Address of Domicile: </small>
                                                                </h3>
                                                                <div class="timeline-body"> <?= $dataClient['addressOfDomicile'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('Admin/dataAdmin'); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                        </div>
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