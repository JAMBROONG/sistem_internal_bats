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
        .select2-results__option{
            color: black;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card card-default ">
                        <div class="card-body">
                            <form action="<?= site_url('superAdmin/processCreateOrder') ?>" method="post" class="row">
                                <div class="col-md-6">
                                    <h5 class="text-center">Data Responsible Person</h5>
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
                                        <a href="<?=base_url('superAdmin/createEmployee')?>" class="btn btn-sm text-success"><i class="fa fa-plus"></i> add staff</a>
                                        </div>
                                    </div>
                                    <a href="<?=base_url('superAdmin/dataOrder') ?>" class="btn btn-danger pl-3 pr-3 btn-sm"><i class="fa fa-arrow-left pr-1"></i> Back</a>
                                    <button class="btn btn-success pl-3 pr-3 btn-sm"><i class="fa fa-save pr-1"></i> SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!-- ./wrapper -->]
    <?php include 'footer.php'; ?> 
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>