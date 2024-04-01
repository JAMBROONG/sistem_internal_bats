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

    <?php include 'header.php';?>
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
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default shadow-none">
                        <div class="card-header bg-info">
                            <h3 class="card-title">Update Order</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="<?= site_url('Admin/processUpdateOrder') ?>" method="post" class="row">
                                <div class="col-md-6">
                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                    <input type="hidden" name="service_id_s" value="<?= $dataOrder['service_id'] ?>">
                                    <h5 class="text-center">Data Responsible Person</h5>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="person_responsible" value="<?=$person['name']?>" placeholder="ex: alex.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" class="form-control" name="phone" value="<?=$person['phone']?>" placeholder="ex: 0822.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?=$person['email']?>" placeholder="ex: @gmail.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="NIK" value="<?=$person['NIK']?>" placeholder="ex: 3212.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP</label>
                                        <input type="text" class="form-control" name="NPWP" value="<?=$person['NPWP']?>" placeholder="ex: 3.22-1.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control" name="position" value="<?=$person['position']?>" placeholder="ex: marketing.." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <select name="nationality" id="" class=" form-control select2" required style="width: 100%;">
                                            <option value="<?=$person['nationality']?>"><?=$person['nationality']?></option>
                                            <?php
                                            foreach ($country as $row) {
                                                if ($person['nationality'] == $row['name']) {
                                                    continue;
                                                }
                                                echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control" placeholder="Jl. Sudirman.." required><?=$person['address']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center">Data Order</h5>
                                    <div class="form-group">
                                        <label>Client</label>
                                        <select class="form-control select2" name="client" style="width: 100%;">
                                            <option value="<?= $dataOrder['user_id'] ?>"><?= $dataOrder['name'] ?></option>
                                            <?php
                                        foreach ($dataClient as $row) {
                                            if ($row['id'] == $dataOrder['user_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Services</label>
                                        <div class="callout callout-warning">
                                            <h5><i class="fas fa-info text-warning"></i> Note:</h5>
                                            Updating the service will remove all the steps set in this order.
                                        </div>
                                        <select class="form-control select2" name="service" style="width: 100%;">
                                            <option value="<?= $dataOrder['service_id'] ?>"><?= $dataOrder['service_name'] ?></option>
                                            <?php
                                        foreach ($dataService as $row) {
                                            if ($row['id'] == $dataOrder['service_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['service_name'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Financial statements</label>
                                        <select class="form-control select2" name="financial_statements" style="width: 100%;">
                                            <option value="<?= $dataOrder['financial_statements'] ?>"><?= $dataOrder['financial_statements'] ?></option>
                                            <?php
                                            if ($dataOrder['financial_statements'] == "Audited") {
                                                echo '<option value="Non Audited">Non Audited</option>';
                                            }
                                            else{
                                                echo '<option value="Audited">Audited</option>';
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" id="" cols="30" rows="5" placeholder="enter.." class="form-control"><?= $dataOrder['message'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Partner</label>
                                        <select class="form-control select2" name="partner" style="width: 100%;">
                                            <option value="<?= $dataOrder['partner_id'] ?>"><?= $dataOrder['partner_name'] ?></option>
                                            <?php
                                        foreach ($partner as $row) {
                                            if ($row['id'] == $dataOrder['partner_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Manager</label>
                                        <select class="form-control select2" name="manager" style="width: 100%;">
                                            <option value="<?= $dataOrder['manager_id'] ?>"><?= $dataOrder['manager_name'] ?></option>
                                            <?php
                                        foreach ($partner as $row) {
                                            if ($row['id'] == $dataOrder['manager_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Supervisor</label>
                                        <select class="form-control select2" name="supervisor" style="width: 100%;">
                                            <option value="<?= $dataOrder['supervisor_id'] ?>"><?= $dataOrder['supervisor_name'] ?></option>
                                            <?php
                                        foreach ($supervisor as $row) {
                                            if ($row['id'] == $dataOrder['supervisor_id']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Staff

                                        </label>
                                        <p>Data now: (
                                            <?php
                                            foreach ($staffSelected as $row) {
                                                echo '<strong> '.$row['employee_name'].'</strong>'.',';
                                            }
                                            ?>
                                            )
                                        </p>
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
                                    <button class="btn btn-success pl-3 pr-3 btn-sm">SAVE</button>
                                    <a href="<?= base_url('Admin/detailOrder/'.$dataOrder['id']) ?>" class="btn btn-sm btn-danger">cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php'
    ?>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>