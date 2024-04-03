<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Change Password</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?> <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
</head>

<body class="hold-transition">
    <div class="wrapper">        
        <?php
        include'navbar.php';
        ?>

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
            $('#nav_profile').addClass('nav_select');
        </script>
</body>

</html>