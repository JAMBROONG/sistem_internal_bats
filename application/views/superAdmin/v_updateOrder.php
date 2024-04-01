<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Order</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    
    <?php include 'header.php'; ?> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper bg-white">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default shadow-none">
                        <div class="card-header border-0">
                            <h3 class="card-title">Update Order</h3>
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
                            <form action="<?= site_url('superAdmin/processUpdateOrder') ?>" method="post" class="row">
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
                                        ?> </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Services</label>
                                        <div class="callout callout-danger">
                                            <h5><i class="fas fa-info text-danger"></i> Note:</h5>
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
                                        <a href="<?=base_url('superAdmin/createEmployee')?>" class="btn btn-sm text-success"><i class="fa fa-plus"></i> add staff</a>
                                        </div>
                                    </div>
                                    <button class="btn btn-success pl-3 pr-3 btn-sm">SAVE</button>
                                    <a href="<?= base_url('superAdmin/detailOrder/'.$dataOrder['id']) ?>" class="btn btn-sm btn-danger">cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </section>
        </div>
    
    <?php include 'footer.php'; ?> 
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
</body>

</html>