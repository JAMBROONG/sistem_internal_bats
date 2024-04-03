<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <?php include 'header.php';?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1" style="background-color: #2F2F2F;">
            <a href="<?php echo base_url('Client/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class=" text-white font-weight-light text-wrap" style="line-break:auto;"><?= $user['company']; ?></small>
            </a>
            <hr class="m-0 border-white">
            <a href="<?php echo base_url('Client/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #2F2F2F; color:white;">
                <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class=" text-white font-weight-light text-wrap" style="line-break:auto;"><?= $user['name']; ?></small>
            </a>
            <hr class="m-0 border-white">
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> My Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/profile'); ?>" class="nav-link" style="background-color: #C1272D; color:white;">
                                <i class="nav-icon fas fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/contract'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Service Contract</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/invoice'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Administrasi/file'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>Other Files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content mt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-denger card-outline">
                                <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>">
                                <div class="card-body box-profile">
                                    <h3 class="profile-username text-center"><?= $dataUser['name']; ?></h3>
                                    <p class="text-muted text-center"><?= $dataUser['status']; ?></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <i class="fa fa-phone mr-2"></i> <b><?= $dataUser['phone']; ?></b>
                                        </li>
                                        <li class="list-group-item">
                                            <i class="fa fa-mail-bulk mr-2"></i> <b><?= $dataUser['email']; ?></b>
                                        </li>
                                    </ul>
                                    <a href="<?php echo base_url('Logout'); ?>" class="btn btn-danger btn-block"><b>Logout</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#about" data-toggle="tab">About Me</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="about">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5 class="text-center p-3">Data User</h5>
                                                    <div class="timeline timeline-inverse">
                                                        <div>
                                                            <i class="fas fa-user bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Name: </small>
                                                                    <a class="text-dark"><?=$dataUser['name'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-phone bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                    <a class="text-dark"><?=$dataUser['phone'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-envelope bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Email: </small>
                                                                    <a class="text-dark"><?=$dataUser['email'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-user-lock bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Position: </small>
                                                                    <a class="text-dark"><?=$dataUser['position'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-id-card bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NIK: </small>
                                                                    <a class="text-dark"><?=$dataUser['NIK'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-credit-card bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                    <a class="text-dark"><?=$dataUser['NPWP'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-globe bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Nationality: </small>
                                                                    <a class="text-dark"><?=$dataUser['nationality'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-home bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info">
                                                                    <small class="text-dark text-bold">Address: </small>
                                                                </h3>
                                                                <div class="timeline-body text-dark"> <?= $dataUser['address'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="text-center p-3">Data Company</h5>
                                                    <div class="timeline timeline-inverse">
                                                        <div>
                                                            <i class="fas fa-building bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Company: </small>
                                                                    <a class="text-dark"><?=$dataUser['company'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-phone bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Phone: </small>
                                                                    <a class="text-dark"><?=$dataUser['company_phone'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-envelope bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Email: </small>
                                                                    <a class="text-dark"><?=$dataUser['company_email'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-credit-card bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">NPWP: </small>
                                                                    <a class="text-dark"><?=$dataUser['company_NPWP'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-angle-up bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Type of Business Entity: </small>
                                                                    <a class="text-dark text-right"><?=$dataUser['typeBusiness'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fas fa-angle-up bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info d-flex justify-content-between align-items-center">
                                                                    <small class="text-dark text-bold">Form of Business Entity: </small>
                                                                    <a class="text-dark"><?=$dataUser['businessEntity'];?></a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <i class="fa fa-home bg-info"></i>
                                                            <div class="timeline-item border-0">
                                                                <h3 class="timeline-header border-0 text-info">
                                                                    <small class="text-dark text-bold">Address of Domicile: </small>
                                                                </h3>
                                                                <div class="timeline-body text-dark"> <?= $dataUser['addressOfDomicile'] ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" action="<?= site_url('Administrasi/updateProfile') ?>" method="post">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" value="<?= $dataUser['name'] ?>" name="name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Position</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName" value="<?= $dataUser['position'] ?>" name="position">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputName2" value="<?= $dataUser['phone'] ?>" name="phone" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" value="<?= $dataUser['email'] ?>" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">NIK</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" id="inputEmail" value="<?= $dataUser['NIK'] ?>" name="NIK">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">NPWP</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" value="<?= $dataUser['NPWP'] ?>" name="NPWP" placeholder="NPWP">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Company</label>
                                                    <div class="col-sm-10">
                                                        <input type="hidden" class="form-control" id="inputName2" value="<?= $dataUser['company_id']?>" name="company_id" placeholder="NPWP">
                                                        <input type="text" class="form-control" id="inputName2" value="<?= $dataUser['company']?>" placeholder="NPWP" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Nationality</label>
                                                    <div class="col-sm-10">
                                                        <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                                            <option value="<?= $dataUser['nationality'] ?>"><?= $dataUser['nationality'] ?></option> <?php
                                            foreach ($country as $row) {
                                                if ($row['name'] == $dataUser['nationality'] ) {
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
                                                        <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $dataUser['address'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-updatePassword"><i class="fa fa-key ml-1"></i> Update Password</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <a href="<?php echo base_url('superAdmin/dataClient'); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                                    <!-- <a href=" -->
                                                    <?php 
                                                    // echo base_url('superAdmin/updatePasswordA')
                                                    ?>
                                                    <!-- " class="ml-1 btn btn-danger pl-3 pr-3"><i class="fa fa-key mr-1"></i>change password</a> -->
                                                </div>
                                            </form>
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
    <!-- modal for delete report -->
    <div class="modal fade " id="modal-updatePassword">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form onsubmit="return validateForm()" id="form1">
                        <div class="form-group">
                            <label for="">Old Password</label>
                            <input type="password" name="oldPassword" id="oldPassword" placeholder="..." class="form-control">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>" placeholder="..." class="form-control">
                            <span id="message0" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" name="password" id="newPw" placeholder="..." class="form-control">
                            <span id="message1" style="color:red"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" name="" id="newPw2" placeholder="..." class="form-control">
                            <span id="message2" style="color:red"></span>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <a href="<?= base_url('Employee/profile')?>" class="btn btn-block" style="background-color:#D82724; color:white">cancel</a>
                            </div>
                            <div class="col-md-8">
                                <button  type="submit" href="" class="btn btn-block btn-success"><i class="fa fa-save mr-2"></i> save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
<?php 
$str = site_url('Administrasi/processUpdatePassword/');
$pwold = $user['password'];
?>
<script>
    function validateForm() {
                var oldPw = document.getElementById("oldPassword").value;
                var newPw = document.getElementById("newPw").value;
                var newPw2 = document.getElementById("newPw2").value;
                var str = "<?php echo $str ?>";
                var pw = "<?php echo $pwold ?>";
                if (oldPw == "") {
                    document.getElementById("message0").innerHTML = "**Fill the old password please!";
                    return false;
                }
                var oldPw = md5(oldPw);
                if (newPw == "") {
                    document.getElementById("message0").innerHTML = "";
                    document.getElementById("message1").innerHTML = "**Fill the password please!";
                    document.getElementById("message2").innerHTML = "";
                    return false;
                }
                if (newPw2 == "") {
                    document.getElementById("message0").innerHTML = "";
                    document.getElementById("message1").innerHTML = "";
                    document.getElementById("message2").innerHTML = "**Enter the password please!";
                    return false;
                }
                if (newPw.length < 8) {
                    document.getElementById("message0").innerHTML = "";
                    document.getElementById("message2").innerHTML = "";
                    document.getElementById("message1").innerHTML = "**Password length must be atleast 8 characters";
                    return false;
                }
                if (newPw.length > 15) {
                    document.getElementById("message0").innerHTML = "";
                    document.getElementById("message2").innerHTML = "";
                    document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";
                    return false;
                }
                if (newPw != newPw2) {
                    document.getElementById("message0").innerHTML = "";
                    document.getElementById("message1").innerHTML = "";
                    document.getElementById("message2").innerHTML = "**Passwords are not same";
                    return false;
                }
                if (oldPw != pw) {
                    alert("Wrong old password")
                } else {
                    document.getElementById('form1').setAttribute('method', "post");
                    document.getElementById('form1').setAttribute('action', str);
                }
            }
</script>
</body>

</html>