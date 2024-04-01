<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Employee</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataEmployee')?>">Data Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-denger card-outline">
                                <img class="rounded" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataEmployee['image']?>" alt="User profile picture">
                                <div class="card-body box-profile">
                                    <h3 class="profile-username text-center"><?= $dataEmployee['employee_name']; ?></h3>
                                    <p class="text-muted text-center"><?= $dataEmployee['position']; ?></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <i class="fa fa-phone mr-2"></i> <b><?= $dataEmployee['phone']; ?></b>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fa fa-mail-bulk mr-2"></i> <b><?= $dataEmployee['email']; ?></b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active btn-sm" href="#about" data-toggle="tab">Detail</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn-sm" href="#settings" data-toggle="tab">Update</a>
                                        </li>
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
                                                                    <a><?=$dataEmployee['employee_name'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-mars-stroke-v bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Gender: </small>
                                                                    <a><?=$dataEmployee['gender'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-phone bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                    <a><?=$dataEmployee['phone'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-envelope bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Email: </small>
                                                                    <a><?=$dataEmployee['email'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-home bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info">
                                                                    <small class="text-dark text-bold">Address: </small>
                                                                </h3>
                                                                <div class="timeline-body text-info"> <?= $dataEmployee['address'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="timeline timeline-inverse">
                                                        <div>
                                                            <i class="fas fa-calendar bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Date of Birth: </small>
                                                                    <a><?=$dataEmployee['date_of_birth'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-user-cog bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Position: </small>
                                                                    <a><?=$dataEmployee['position'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-edit bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Latest Update: </small>
                                                                    <a><?=$dataEmployee['update_date'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-house-damage bg-danger"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-bold text-danger">Company: </small>
                                                                    <a class=" text-danger text-right"><?=$dataEmployee['company'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="<?php echo base_url('superAdmin/dataEmployee'); ?>" class="btn btn-danger pl-3 pr-3" style="background-color: #D82724; color:white"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid border-0 mb-4" id="preview" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataEmployee['image']?>" alt="User profile picture">
                                            </div>
                                            <form class="form-horizontal" action="<?= site_url('superAdmin/processUpdateEmployee/'.$dataEmployee['id']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Photo</label>
                                                    <div class="col-sm-10">
                                                        <div id="msg"></div>
                                                        <input type="file" name="image" class="file">
                                                        <div class="input-group my-3">
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
                                                        <input type="text" class="form-control" id="inputName" value="<?= $dataEmployee['employee_name'] ?>" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-10">
                                                        <input type="date" class="form-control" value="<?= $dataEmployee['date_of_birth'] ?>" name="birth">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select form-control-border border-width-2" name="gender" id="exampleSelectBorderWidth2"> <?php 
                                                if ($dataEmployee['gender'] == 'male') {
                                                    echo '<option value="male">Male</option><option value="female">Female</option>';
                                                } else{
                                                    echo '<option value="female">Female</option><option value="male">Male</option>';
                                                }
                                                ?> </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputName2" value="<?= $dataEmployee['phone'] ?>" name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName2" value="<?= $dataEmployee['email'] ?>" name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Position</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail" value="<?= $dataEmployee['position'] ?>" name="position">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Status</label>
                                                    <div class="col-sm-10">
                                                        <select class="custom-select form-control-border border-width-2" name="status_id" id="exampleSelectBorderWidth2">
                                                            <option value="<?=$dataEmployee['status_id'];?>"><?=$dataEmployee['status'];?></option>
                                                            <?php 
                                                foreach ($position as $row) {
                                                    if ($row['id'] == $dataEmployee['status_id']) {
                                                        continue;
                                                    }
                                                    echo '<option value="'.$row['id'].'">'.$row['status'].'</option>';
                                                }
                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $dataEmployee['address'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Company</label>
                                                    <div class="col-sm-10">
                                                        <select id="my-select" class="form-control" name="company_id">
                                                            <option value="<?=$dataEmployee['company_id']?>"><?=$dataEmployee['company']?></option>
                                                            <?php
                                                        foreach ($company as $key) {
                                                            if ($dataEmployee['company_id'] == $key['id']) {
                                                                continue;
                                                            }
                                                            echo '<option value="'.$key['id'].'">'.$key['company'].'</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="">
                                                        <a href="<?php echo base_url('superAdmin/dataEmployee'); ?>" class="btn btn-danger pl-3 pr-3" style="background-color: #D82724; color:white"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                    <a href="<?php echo base_url('superAdmin/updatePasswordEmployee/'.$dataEmployee['id'])?>" class="ml-1 btn btn-danger pl-3 pr-3" style="background-color: #D82724; color:white"><i class="fa fa-key mr-1"></i>change password</a>
                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>
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

</html>