<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>General Information</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include'header.php'; ?>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Client/general_information')?>">General Information</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                                <h5 class="card-title">Hi <strong><?= $user['name'] ?></strong> <i class="fa fa-smile-beam"></i></h5>
                        </div>
                        <div class="card-body row  d-flex align-items-center"> <?php 
                            if (empty($selected)) {
                            echo '
                            <div class="col-12 text-center">
                                <div class="">
                                    <h2 style="color: #2F2F2F;">Sorry, your service is not yet available <i class="fa fa-smile-beam"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            } else{
                            ?> <div class="col-5 text-center">
                                <div class="">
                                    <h2>Select your <strong>project</strong></h2>
                                    <p class="lead">Let Us Know Your Problem!<br><a href="https://wa.me/628161105174" class="btn btn-sm btn-success mt-2">Contact us<i class="fab fa-whatsapp ml-2"></i></a></p>
                                </div>
                            </div>
                            <div class="col-7">
                                <form class="form-horizontal" action="<?= site_url('Client/typeOfData') ?>" method="post">
                                    <div class="form-group">
                                        <label for="inputName">Service name</label>
                                        <select name="id_order" id="" class=" form-control select2" style="width: 100%;">
                                            <option value="<?= $selected['id'] ?>"><?= $selected['service_name'].' - '. date("F, Y", strtotime($selected['update_date'])) ?></option> <?php 
                                        foreach ($dataOrder as $row) {
                                            if ($row['service_name'] == $selected['service_name']) {
                                                continue;
                                            }
                                            echo '<option value="'.$row['id'].'">'.$row['service_name'].' - '. date("F, Y", strtotime($row['update_date'])).'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="SELECT">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow-none border-0">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">BATS Consulting Team</h5>
                            </div>
                        </div>
                        <div class="card-body p-0 pt-3">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['manager_image']?>" alt="User profile picture">
                                        <div class="card-body box-profile">
                                            <div class=" d-flex h-100 flex-column justify-content-between">
                                                 <div>
                                                <h3 class="profile-username"><?= $dataOrder2['manager_name']?></h3>
                                                <small class="text-bold p-2 bg-dark">MANAGER</small>
                                            </div>
                                            <div class="d-flex justify-content-between mt-5 align-items-center">
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['manager_id']?>">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-user-alt mr-2"></i>Profile</button>
                                            </form>
                                            <a class="mt-1 btn btn-sm btn-success" href="https://wa.me/<?= '62'.substr(str_replace('-','',$dataOrder2['manager_phone']),1) ?>"><?= $dataOrder2['manager_phone']?><i class="fab ml-2 fa-whatsapp"></i></a>
                                            </div>    
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['partner_image']?>" alt="">
                                        <div class="card-body">
                                            <div class=" d-flex h-100 flex-column justify-content-between">
                                            <div>
                                            <h4 class="profile-username"><?= $dataOrder2['partner_name']?> </h4>
                                            <small class="text-bold p-2 bg-dark">PARTNER</small>
                                            </div>
                                            <div class="d-flex justify-content-between mt-5 align-items-center">
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['partner_id']?>">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-user-alt mr-2"></i>Profile</button>
                                            </form>
                                            <a  href="https://wa.me/<?= '62'.substr(str_replace('-','',$dataOrder2['partner_phone']),1) ?>" class="mt-1 btn btn-sm btn-success"><?= $dataOrder2['partner_phone']?><i class="fab ml-2 fa-whatsapp"></i></a>
                                            </div>    
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder2['supervisor_image']?>" alt="User profile picture">
                                        <div class="card-body box-profile">
                                            <div class=" d-flex h-100 flex-column justify-content-between">
                                                 <div>
                                                <h3 class="profile-username"><?= $dataOrder2['supervisor_name']?></h3>
                                                <small class="text-bold p-2 bg-dark">supervisor</small>
                                            </div>
                                          
                                            <div class="d-flex justify-content-between mt-5 align-items-center">
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$dataOrder2['supervisor_id']?>">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-user-alt mr-2"></i>Profile</button>
                                            </form>
                                            <a  href="https://wa.me/<?= '62'.substr(str_replace('-','',$dataOrder2['supervisor_phone']),1) ?>" class="mt-1 btn btn-sm btn-success"><?= $dataOrder2['supervisor_phone']?><i class="fab ml-2 fa-whatsapp"></i></a>
                                            </div>    
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="text-center">
                            STAFF</h5>
                            <hr> 
                            <div class="row">
                                <?php
                                foreach ($dataStaff as $row) {
                                    $img = $this->config->item('base_url').'/assets/upload/images/employee/'.$row['image'];
                                    if (!$row['image']) {
                                        $img = $this->config->item('base_url').'/assets/icon/usergif.gif';
                                    }
                                
                                ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <img src="<?php echo $img;?>" class="rounded" alt="">
                                        <div class="card-body">
                                            
                                        <div class=" d-flex h-100 flex-column justify-content-between">
                                                 <div>
                                                <h3 class="profile-username"><?= $row['employee_name']?></h3>
                                                <small class="text-bold p-2 bg-yellow">STAFF</small>
                                            </div>
                                          
                                            <div class="d-flex justify-content-between mt-5 align-items-center">
                                            <form action="<?=base_url('Client/desc')?>" method="post">
                                                <input type="hidden" name="employee_id" value="<?=$row['id_employee']?>">
                                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-user-alt mr-2"></i>Profile</button>
                                            </form>
                                            <a class="mt-1 btn btn-sm btn-success"  href="https://wa.me/<?= '62'.substr(str_replace('-','',$row['phone']),1) ?>"><?= $row['phone']?><i class="fab ml-2 fa-whatsapp"></i></a>
                                            </div>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header pt-3 text-white" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Detail</h5>
                                <p class="card-text"><?= date('d M Y,h:i A', strtotime($selected['create_date'])); ?></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container pt-3">
                                <div class="timeline timeline-inverse">
                                    <div>
                                        <i class="fas fa-book bg-primary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header border-0 text-primary"><a><strong><?= $selected['service_name'] ?></strong></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fas fa-info bg-primary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header border-0 text-primary"><a>Description</a>
                                            </h3>
                                            <p class="timeline-header border-0"><?= $selected['description'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 row">
                                    <div class="col-md-12 text-center">
                                        <h5>Data Director</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Name</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['name'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Phone</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['phone'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Email</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['email'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NIK</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['NIK'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NPWP</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['NPWP'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Position</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['position'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Nationality</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $person['nationality'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Address</h6>
                                                <textarea name="" id="" cols="30" rows="5" class=" form-control border-0 " disabled><?= $person['address'] ?></textarea>
                                                <h6 class="mt-2 mb-0">Financial statements</h6>
                                                <input type="text" class=" form-control border-0 " value="<?= $selected['financial_statements'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if (empty($pic)) {
                                        ?>
                                <div class="col-md-12 text-center">
                                    <h5>Data PIC</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="card shadow-none">
                                        <div class="card-body text-center">
                                            <h6>PIC data doesn't exist yet</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    } else{
                                        $no = 1;
                                        foreach ($pic as $row) {
                                        ?>
                                <div class="col-md-6">
                                    <div class="col-md-12 text-center">
                                        <h5>Data PIC <?=$no?></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card shadow-none">
                                                <div class="card-body ">
                                                    <h6 class="mt-2 mb-0">Name</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['pic_name'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Phone</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['phone'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Email</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['email'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">NIK</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['NIK'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">NPWP</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['NPWP'] ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card shadow-none">
                                                <div class="card-body ">
                                                    <h6 class="mt-2 mb-0">Position</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['position'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Nationality</h6>
                                                    <input type="text" class=" form-control border-0" value="<?= $row['nationality'] ?>" disabled>
                                                    <h6 class="mt-2 mb-0">Address</h6>
                                                    <textarea name="" id="" cols="30" rows="7" class=" form-control border-0" disabled><?= $row['address'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        $no++;
                                        }
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="car"> <?php
                            if (empty($step)) {
                                ?> <div class="jumbotron bg-white">
                            <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                            <p class="lead text-center">data not yet</p>
                            <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            <hr class="my-4">
                        </div> <?php
                                
                            } else{
                            ?>
                            <div class="card-header pt-3" style="background-color: #1A1A1A;">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title text-white">Flow <?= $dataOrder2['service_name']?></h5>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 pt-3">
                                    <table class="table table-striped text-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Control Item</th>
                                                <th>Description</th>
                                                <th>Activities</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                
                                                $no2 = 1;
                                                $step = "";
                                                foreach ($substep as $row) {
                                                    if ($row['step'] == $step) {
                                                    ?>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td><?= $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                            <?php
                                                        $no2++;
                                                        }
                                                        else{
                                                            $no2 = 1;
                                                            $step = $row['step'];
                                                        
                                                        ?>
                                            <td><?=$no;?></td>
                                            <td><?=$row['step'];?></td>
                                            <td><?=$row['description'];?></td>
                                            <td><?=  $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                            <?php
                                                    $no++; 
                                                    $no2++;    
                                                    }
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                        </div>
                        <?php
                            }
                        }
                            ?>
                    </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://bats-consulting.com/">Bats Consulting</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
            $('#nav_information').addClass('nav_select');
        });
    </script>
</body>

</html>