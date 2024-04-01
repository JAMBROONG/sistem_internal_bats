<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daily Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <style>
    .select2-results__options li{
        color: black;
    }
</style>
<script>
         function selects(){  
            var ele=document.getElementsByName('report[]');  
            for(var i=0; i<18; i++){ 
                if(ele[i].type=='checkbox'){
                    if(ele[i].checked==true){
                        ele[i].checked=false; 
                        document.getElementById('btnSelect').innerHTML = "Select All";
                    } else {
                        ele[i].checked=true;
                        document.getElementById('btnSelect').innerHTML = "Deselect All";
                    }
                }  
            }  
        }  
    </script>

</head>
</style>

<body class="hold-transition sidebar-mini mt-5 bg-info">
    <h3 class="text-center">Daily Report BATS Consulting</h3>
    <div class="wrapper shadow rounded bg-white text-dark" style="margin:2em;">
        <section class="content p-2">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Admin/specialtask')?>">Task</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daily Report</li>
                    </ol>
                </nav>
            </div>
            <div class="card shadow-none">
                <div class="card-body table-responsive">
                    <form action="<?= base_url('Admin/dailyReport'); ?>" method="POST">
                        <div class="row pl-lg-5 pr-lg-5">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select View</label>
                                    <select id="leave" onchange="onklik()" name="type" class="form-control select2" required>
                                        <option value="employee">Show By Employee</option>
                                        <option value="all">Show All Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="selectE">
                                <div class="form-group">
                                    <label>Select Employee</label>
                                    <select class="form-control select2" id="selEmployee" name="employee_id" data-placeholder="select" style="width: 100%;">
                                    <?php
                                        if($employee_id){
                                            ?>
                                            <option value="<?= $employee_id['id']?>"><?=$employee_id['employee_name']?></option>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    foreach ($dataEmployee as $key) {
                                        if ($key['status_id'] == 3 || $key['status_id'] == 4) {
                                            if($key['id'] == $employee_id['id']){
                                                continue;
                                            }
                                        ?>
                                        <option value="<?=$key['id']?>"><?=$key['employee_name']?></option>
                                        <?php
                                        } else{
                                            continue;
                                        }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input type="date" name="date" class="form-control" value="<?= $date ?>" id="" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-search mr-1"></i> search</button>
                                <a href="<?=base_url('Admin/dailyReport')?>" class="btn btn-sm btn-warning"><i class="fa fa-book-reader mr-1"></i> see all</a>
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#deleteDaily"><i class="fa fa-trash-alt mr-1"></i> clean </button>
                                <div id="deleteDaily" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>This action will delete all daily report data outside of <?= date('F-Y') ?></p>
                                                <a href="<?= base_url('Admin/cleanDailyReport') ?>" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt mr-1"></i>clean</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="text-center p-3"><?=$message?></p>
                    <?php 
                    if ($type != 'all' && $dailyReport) {
                        include 'components/form-dailyReport.php';
                    } else {
                        include 'components/dailyReport.php';
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>


    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <script>
        function onklik() {
            if (document.getElementById("leave").value == "all") {
                document.getElementById("selectE").style.display = "none";
                document.getElementById("selEmployee").value = "";
            } else {
                document.getElementById("selectE").style.display = 'block';
            }
        }
        $(function() {
            $('.select2').select2()
        });
    </script>

</body>

</html>