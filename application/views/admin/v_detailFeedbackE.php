<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Feedback</title>
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
                                        <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link bg-info">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataFeedback')?>">Feedback</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <?php
                    if ($validate == false) {
                        ?>
                        <div class="jumbotron bg-warning text-center m-2">
                            <h1 class="display-6">Data not Yet</h1>
                            <hr class="my-4">
                        </div>
                        <?php
                    } else{
                        ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            <h4>User Information</h4>
                                            <hr>
                                            <div class="timeline timeline-inverse">
                                                <div>
                                                    <i class="fas fa-user bg-danger"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0 text-danger">
                                                            <a><?=$feedbackEmployee['name'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-phone bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0 text-info">
                                                            <a><?=$feedbackEmployee['phone'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-envelope bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0 text-info">
                                                            <a><?=$feedbackEmployee['email'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fa fa-home bg-info"></i>
                                                    <div class="timeline-item">
                                                        <div class="timeline-body"> <?= $feedbackEmployee['address'] ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Feedback Information</h4>
                                            <hr>
                                            <div class="timeline timeline-inverse">
                                                <div>
                                                    <i class="fas fa-user-lock bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> To: <br> <a class="text-info"><?=$feedbackEmployee['employee_name'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fa fa-address-card bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Position: <br> <a class="text-info"><?=$feedbackEmployee['position'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fa fa-phone bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Phone: <br> <a class="text-info"><?=$feedbackEmployee['e_phone'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-envelope bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Create date: <br> <a class="text-info"><?= date("F j, Y", strtotime($feedbackEmployee['create_date']));?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div>
                                                    <i class="fas fa-envelope bg-info"></i>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"> Feedback: <br> <?php
                                                        for ($i=0; $i < $feedbackEmployee['star']; $i++) { 
                                                            echo'<i class="fa text-warning fa-star"></i>';
                                                        }
                                                        ?> <br><a class="text-info"><?=$feedbackEmployee['feedback'];?></a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('Admin/feedbackOrder/'.$feedbackEmployee['order_id']); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    $bantu = "";
                                    foreach ($dataCriteria as $row) {
                                        if ($bantu == $row['category_criteria']) {
                                            ?>
                                            <div class="d-flex justify-content-between">
                                            <p class="card-text"><?=$row['criteria']?>
                                            </p>
                                            <small class="pull-right p-0 m-0">
                                                <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    (<?=$row['rating']?>/5)
                                                </small>
                                            </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <h5 class=" text-bold mt-4"><?=$row['category_criteria']?></h5>
                                             <div class="d-flex justify-content-between">
                                             <p class="card-text"><?=$row['criteria']?>
                                            </p>
                                            <small class="pull-right p-0 m-0">
                                                <?php
                                    for ($i=1; $i <= $row['rating'] ; $i++) { 
                                        echo '
                                        <i class="fa fa-star text-warning" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    (<?=$row['rating']?>/5)
                                                </small>
                                             </div>
                                            <?php
                                            $bantu = $row['category_criteria'];
                                        }
                                        ?>
                                        
                                    <hr>
                                        <?php
                                    }
                                   
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div><?php
                    }
                    ?>
            </section>
        </div>
    <?php include 'footer.php' ?>
</body>

</html>