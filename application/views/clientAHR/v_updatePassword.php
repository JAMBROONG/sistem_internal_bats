<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Change Password</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?> <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-boxed bg-dark">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="user-panel d-flex align-items-center">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" class=" elevation-1" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-dark"><?= $user['company']; ?></a>
                    </div>
                </div>
            </ul>
        </nav>
        <aside class="main-sidebar elevation-1 " style="background-color: #2F2F2F;">
            <div class="sidebar">
                <div class="user-panel d-flex align-items-center mt-3">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                      <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-white"><?= $user['name']; ?></a>
                    </div>
                </div>
                <hr class="m-0 mt-2 border-white">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                            <a href="<?php echo base_url('Client/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/profile'); ?>" class="nav-link text-white"  style="background-color: #C1272D;">
                                <i class="nav-icon fas fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/file'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-file-upload"></i>
                                <p>My Files</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/ourServices'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>BATS Consulting Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/whatsNew'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p>What's New?</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/typeOfData'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-book"></i>
                                <p>General Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/contract'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-id-badge"></i>
                                <p>Service Contract</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/invoice'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>Invoices</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/jobTrack'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p>Job track</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/report'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-edit"></i>
                                <p> Work Report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Client/feedback'); ?>" class="nav-link text-white">
                                <i class="nav-icon far fa-envelope"></i>
                                <p> Feedback </p>
                            </a>
                        </li>
                        <?php include 'navbar_new.php' ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('Client/profile')?>">User Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-info">
                            <div class="card-header text-white" style="background-color: #1A1A1A;">
                                <h3 class="card-title">Change Password</h3>
                            </div>
                            <div class="card-body">
                                <form onsubmit="return validateForm()" id="form1">
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" id="pswd0" value="" class="form-control" data-original-title="" title="" placeholder="Old Password">
                                        </div>
                                        <span id="message0" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" name="password" id="pswd1" value="" class="form-control" data-original-title="" title="" placeholder="New Password">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input type="password" id="pswd2" value="" class="form-control" data-original-title="" title="" placeholder="Confirm Password">
                                        </div>
                                        <span id="message2" style="color:red"></span>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-sm btn-success mr-2"><i class="fa fa-save mr-1"></i>update</button>
                                        <a href="<?php echo base_url('Client/Profile'); ?>" class="btn btn-danger btn-sm">cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php 
include 'footer.php';
$str = site_url('Client/processUpdatePassword/'.$user['id']);
$pw  = $user['password'];
?> <script>
            function validateForm() {
                var pw0 = document.getElementById("pswd0").value;
                var pw1 = document.getElementById("pswd1").value;
                var pw2 = document.getElementById("pswd2").value;
                var str = "<?php echo $str ?>";
                var pw = "<?php echo $pw ?>";
                if (pw0 == "") {
                    document.getElementById("message0").innerHTML = "**Fill the old password please!";
                    return false;
                }
                var pw0 = md5(pw0);
                if (pw1 == "") {
                    document.getElementById("message1").innerHTML = "**Fill the password please!";
                    return false;
                }
                if (pw2 == "") {
                    document.getElementById("message2").innerHTML = "**Enter the password please!";
                    return false;
                }
                if (pw1.length < 8) {
                    document.getElementById("message1").innerHTML = "**Password length must be atleast 8 characters";
                    return false;
                }
                if (pw1.length > 15) {
                    document.getElementById("message1").innerHTML = "**Password length must not exceed 15 characters";
                    return false;
                }
                if (pw1 != pw2) {
                    document.getElementById("message2").innerHTML = "**Passwords are not same";
                    return false;
                }
                if (pw0 != pw) {
                    alert("Wrong old password")
                } else {
                    document.getElementById('form1').setAttribute('method', "post");
                    document.getElementById('form1').setAttribute('action', str);
                }
            }
        </script>
</body>

</html>