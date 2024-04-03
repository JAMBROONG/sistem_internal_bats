<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Client</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
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
                            <a href="#" class="nav-link ">
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
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataClient')?>">Data Client</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="jumbotron bg-info">
                        <h1 class="display-6">Create Client</h1>
                        <p class="lead">Pastikan kamu itu udah membuat COMPANY dari klien yang mau dibikin akunnya, oke? SEMANGAT!!</p>
                        <hr class="my-4 border-white">
                        <a href="<?= base_url('Admin/createCompany') ?>" class="btn btn-sm btn-default text-info"><i class="fa fa-plus mr-1 text-info"></i> <small class="text-info text-md">company</small></a>
                    </div>
                    <form action="<?= site_url('Admin/processCreateClient') ?>" enctype="multipart/form-data" method="post">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputName" value="" placeholder="client name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Position</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user-astronaut"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputName" value="" placeholder="client position" name="position" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputName2" value="" name="phone" placeholder="(+__) -____ - ____ - ____" data-inputmask='"mask": "(+ 99) - 9999 - 9999 - 9999"' data-mask required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">NIK</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputEmail" value="" placeholder="__ __ __ - ______ - ____" name="NIK" required  data-inputmask='"mask": "99 99 99 - 999999 - 9999"' data-mask>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">NPWP</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="inputName2" value="" name="NPWP" placeholder="__ . ___ . ___ . _ - ___ . ___" data-inputmask='"mask": "99 . 999 . 999 . 9 - 999 . 999"' data-mask>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-info"><i class="fa fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="inputEmail" value="" placeholder="client email" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-info"><i class="fa fa-key"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="inputEmail" value="" name="password" placeholder="enter password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Client from Company</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-house-damage"></i></span>
                                                </div>
                                                <select name="company_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                                    <?php
                                                        foreach ($company as $row) {
                                                            ?> 
                                                            <option value="<?= $row['id'] ?>">
                                                            <?= $row['company'] ?>
                                                            </option> 
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Client to Company</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-house-damage"></i></span>
                                                </div>
                                                <select name="user_to_company_id" id="" class="custom-select form-control-border border-width-2">
                                                    <option value="1">PT BATS INTERNATIONAL GROUP</option>
                                                    <option value="2">KAP AHR</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Nationality</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                                </div>
                                                <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                                    <?php
                                                    foreach ($country as $row) {
                                                        
                                                        ?> <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
                                                </div>
                                                <textarea class="form-control" id="inputExperience" name="address" placeholder="Address" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Profile</label>
                                            <div class="input-group mb-3">
                                                <input type="file" name="image" class="file">
                                                <div class="input-group">
                                                    <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                                    <div class="input-group-append">
                                                        <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php echo base_url('Admin/dataClient'); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                            <button type="submit" class="btn btn-success">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
    </div> <?php include 'footer.php';?>
    
<!-- InputMask -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script> 
        <script>
            $('[data-mask]').inputmask();
            
    $(document).on("click", "#pilih_gambar", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);
        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>
</body>

</html>