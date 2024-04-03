<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Employee</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';?>
</head>

<body class="hold-transition">
    <div class="wrapper">
        
    <?php
        include'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                    <div class="container">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('Client/typeOfData')?>">General Information</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Employee</li>
                                </ol>
                            </nav>
                        </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-denger card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img border-0 p-1 rounded mb-4" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$data_employee['image']?>" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $data_employee['employee_name']; ?></h3>
                                    <p class="text-muted text-center"><?= $data_employee['position']; ?></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <i class="fa fa-phone mr-2"></i> <b><?= $data_employee['phone']; ?></b>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="mailto:<?= $data_employee['email']; ?>" class="btn  btn-block btn-danger"><i class="fa fa-paper-plane mr-3"> send email</i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#resume" data-toggle="tab">Resume</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="timeline timeline-inverse">
                                                    <div>
                                                        <i class="fas fa-user bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Name: </small>
                                                                <a><?=$data_employee['employee_name'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-mars-stroke-v bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Gender: </small>
                                                                <a><?=$data_employee['gender'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-phone bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Phone: </small>
                                                                <a><?=$data_employee['phone'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-envelope bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Email: </small>
                                                                <a><?=$data_employee['email'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <!-- <div>
                                                        <i class="fa fa-home bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info">
                                                                <small class="text-dark text-bold">Address: </small>
                                                            </h3>
                                                            <div class="timeline-body text-info"> 
                                                                <?php // $data_employee['address'] ?> 
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="timeline timeline-inverse">
                                                    <div>
                                                        <i class="fas fa-calendar bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Date of Birth: </small>
                                                                <a><?=
                                                                date("l, j F Y", strtotime($data_employee['date_of_birth']));?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-user-cog bg-info"></i>
                                                        <div class="timeline-item border-0">
                                                            <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                <small class="text-dark text-bold">Position: </small>
                                                                <a><?=$data_employee['position'];?></a>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="tab-pane" id="resume">
                                            <div class="row">
                                                
                                                <div class="col-md-4">
                                                    <div class="card shadow-none">
                                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$data_employee['image']?>" alt="" class="rounded" style="height: auto;object-fit: cover;">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <h4 style=" font-family:  monospace;" class=" text-danger"><?=$data_employee['employee_name']?></h4>
                                                    <h6><?=$data_employee['position']?></h6>
                                                    <h6><?=$data_employee['phone']?></h6>
                                                    <h6 href="mailto:<?=$data_employee['email']?>"><?=$data_employee['email']?></h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Gender</label>
                                                    <p><?= $data_employee['gender'] ?></p>
                                                    <label for="">Address</label>
                                                    <p><?= $data_employee['address'] ?></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php
                                                if (empty($sub_resume)) {
                                                    ?>
                                                    <div class="d-flex justify-content-center">
                                                        <p>Data not yet.</p>
                                                    </div>
                                                    <?php
                                                } else{
                                                    $bantu = "";
                                                    foreach ($scr as $row) {
                                                       foreach ($sub_resume as $key) {
                                                            if ($key['subCategory_id']==$row['id']) {
                                                                if ($key['subCategory_id'] == $bantu) {
                                                                    ?>
                                                                    <p>
                                                                        <i class="fas fa-angle-double-right"></i> 
                                                                        <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>
                                                                    </p>
                                                                    
                                                                    <?php
                                                                    }else{
                                                                        $bantu = $key['subCategory_id'];
                                                                        ?>
                                                                    <label for=""><?=$key['subCategory']?></label>
                                                                    <p>
                                                                        <i class="fas fa-angle-double-right"></i> 
                                                                        <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>
                                                                        
                                                                    </p>
                                                                    <?php
                                                                    }
                                                            }
                                                       }
                                                    }
                                                    ?>
                                                    
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
                </div>
                </div>
            </section>
        </div>
    </div> <?php include 'footer.php';?>
    <script>
        
        $('#nav_information').addClass('nav_select');
    </script>
</body>

</html>