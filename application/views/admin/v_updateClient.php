<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Client</title>
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataClient')?>">Client</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                <div class="container-fluid">
                    <?php
                        if ($validate == false) {
                            ?>
                            <div class="jumbotron bg-white">
                                <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                                <p class="lead text-center">data not found</p>
                                <hr class="my-4">
                                <a href="<?php echo base_url('Admin/dataClient'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                            <?php
                            return false;
                        }
                    ?>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active btn-sm" href="#about" data-toggle="tab">Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn-sm" href="#user" data-toggle="tab">Update User</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane  active" id="about">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card shadow-none">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Client for company:</h5>
                                                            <p class="card-text text-bold"><?=$dataClient['to_company']?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <img class="profile-user-img border-0 p-2 rounded" src="<?php echo base_url(); ?>assets/upload/images/client/<?=$dataClient['image_user']?>" alt="User profile picture">
                                                        <h5 class="p-3">Data User</h5>
                                                    </div>
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
                                                                <div class="timeline-body text-info"> <?= $dataClient['address'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <img class="profile-user-img border-0 p-2 rounded" src="<?php echo base_url(); ?>assets/upload/images/<?=$dataClient['image']?>" alt="User profile picture">
                                                        <h5 class="p-3">Data Company</h5>
                                                    </div>
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
                                                                <div class="timeline-body text-primary"> <?= $dataClient['addressOfDomicile'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="user">
                                            <form class="form-horizontal" action="<?= site_url('Admin/processUpdateClient') ?>" method="post" enctype="multipart/form-data">
                                                <div class="d-flex justify-content-center">
                                                    <div class="col-sm-6 text-center">
                                                        <img id="preview" src="<?php echo base_url(); ?>assets/upload/images/client/<?=$dataClient['image_user']?>" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                                    </div>
                                                </div>
                                                <div class="form-group row pt-2">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Profile</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="image" class="file">
                                                        <div class="input-group">
                                                            <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                                            <div class="input-group-append">
                                                                <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" value="<?= $dataClient['name'] ?>" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Client To</label>
                                                    <div class="col-sm-10">
                                                        <select name="user_to_company_id" id="" class="form-control">
                                                            <option value="1">PT BATS INTERNATIONAL GROUP</option>
                                                            <option value="2">KAP AHR</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Position</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" value="<?= $dataClient['position'] ?>" name="position">
                                                    </div>
                                                </div>  
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" value="<?= $dataClient['phone'] ?>" name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" value="<?= $dataClient['email'] ?>" name="email">
                                                        <input type="hidden" name="user_id" value="<?= $dataClient['id'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail" value="<?= $dataClient['NIK'] ?>" name="NIK">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">NPWP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" value="<?= $dataClient['NPWP'] ?>" name="NPWP" placeholder="NPWP">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Company</label>
                                                    <div class="col-sm-10">
                                                        <select name="company_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                                            <option value="<?= $dataClient['company_id'] ?>"><?= $dataClient['company'] ?></option> <?php
                                            foreach ($company as $row) {
                                                if ($row['company'] == $dataClient['company'] ) {
                                                    continue;
                                                }
                                                ?> <option value="<?= $row['id'] ?>"><?= $row['company'] ?></option> <?php
                                            }
                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Nationality</label>
                                                    <div class="col-sm-10">
                                                        <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                                            <option value="<?= $dataClient['nationality'] ?>"><?= $dataClient['nationality'] ?></option> <?php
                                            foreach ($country as $row) {
                                                if ($row['name'] == $dataClient['nationality'] ) {
                                                    continue;
                                                }
                                                ?> <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> <?php
                                            }
                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $dataClient['address'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="<?php echo base_url('Admin/dataClient'); ?>" class="btn btn-sm btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                            <a href="<?php echo base_url('Admin/updatePassword/'.$dataClient['id']); ?>" class="ml-1 btn btn-sm btn-danger pl-3 pr-3"><i class="fa fa-key mr-1"></i>change password</a>
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
    <script>
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