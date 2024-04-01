<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php'; ?>
    <style>
        .select2-results__options li{
            color: black;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="jumbotron bg-info">
                        <h1 class="display-6">Create Order</h1>
                        <p class="lead">Pastiin data yang mau di input udah lengkap, biar ga terjadi kesalahpahaman nanti. SEMANGAT!! :D</p>
                        <hr class="my-4">
                    </div>
                    <div class="card card-default shadow-none">
                        <div class="card-body">
                            <form action="<?= site_url('Admin/processCreateOrder') ?>" method="post" class="row">
                                <div class="col-md-6">
                                    <h5 class="text-center">Data Director</h5>
                                    <div class="form-group">
                                        <label>Name</label>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <h5 class="text-center">Data Order</h5>
                                        <label>Client Name</label>
                                        <select class="form-control select2" name="client" style="width: 100%;"> <?php
                                        foreach ($dataClient as $row) {
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                        ?> </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Services</label>
                                        <select class="form-control select2" name="service" style="width: 100%;"> <?php
                                        foreach ($dataService as $row) {
                                            echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                                        }
                                        ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Financial statements</label>
                                        <select class="form-control select2" name="financial_statements" style="width: 100%;"> 
                                            <option value="Audited">Audited</option>                               
                                            <option value="Non Audited">Non Audited</option>             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" id="" cols="30" rows="5" placeholder="enter.." class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Partner</label>
                                        <select class="form-control select2" name="partner" style="width: 100%;"> <?php
                                        foreach ($partner as $row) {
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Manager</label>
                                        <select class="form-control select2" name="manager" style="width: 100%;"> <?php
                                        foreach ($partner as $row) {
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Supervisor</label>
                                        <select class="form-control select2" name="supervisor" style="width: 100%;"> <?php
                                        foreach ($supervisor as $row) {
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?> 
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Staff
                                            
                                        </label>
                                        <div class="form-group clearfix">
                                        <?php
                                        $no = 1;
                                        foreach ($staff as $row) {
                                            ?>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" name="staff[]" value="<?= $row['id'];?>" id="checkboxPrimary<?=$no;?>">
                                                <label for="checkboxPrimary<?=$no;?>"><?=$row['employee_name'];?></label>
                                            </div><br>
                                            <?php
                                            $no++;
                                        }
                                        
                                        foreach ($supervisor as $row) {
                                            ?>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" name="staff[]" value="<?= $row['id'];?>" id="checkboxPrimary<?=$no;?>">
                                                <label for="checkboxPrimary<?=$no;?>"><?=$row['employee_name'];?></label>
                                            </div><br>
                                            <?php
                                            $no++;
                                        }
                                        ?> 
                                        <a href="<?=base_url('Admin/createEmployee')?>" class="btn btn-sm text-success"><i class="fa fa-plus"></i> add staff</a>
                                        </div>
                                    </div>
                                    <a href="<?=base_url('Admin/dataOrder') ?>" class="btn btn-danger pl-3 pr-3 btn-sm"><i class="fa fa-arrow-left pr-1"></i> Back</a>
                                    <button class="btn btn-success pl-3 pr-3 btn-sm"><i class="fa fa-save pr-1"></i> SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!-- Select2 -->
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <?php include 'footer.php'; ?>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>