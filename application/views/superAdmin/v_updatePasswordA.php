<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
</head>

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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/profile')?>">Profile</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-danger">
                            <div class="card-header">
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
                                    <div class="d-flex justify-content-between">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i>save</button>
                                        <a href="<?php echo base_url('superAdmin/profile'); ?>" class="btn btn-danger btn-sm">cancle</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php 
include 'footer.php';
$str = site_url('superAdmin/processUpdatePasswordA/'.$user['id']);
$pw  = $user['password'];
?>
    <script>
        function validateForm() {
            var pw0 = document.getElementById("pswd0").value;
            var pw1 = document.getElementById("pswd1").value;
            var pw2 = document.getElementById("pswd2").value;

            var str = "<?php echo $str ?>";
            var pw = "<?php echo $pw ?>";
            if (pw0 == "") {
                document.getElementById("message0").innerHTML = "*";
                toastr.error('Fill the old password please!');
                return false;
            }
            document.getElementById("message0").innerHTML = "";
            var pw0 = md5(pw0);
            if (pw1 == "") {
                document.getElementById("message1").innerHTML = "*";
                toastr.error('Fill the password please!');
                return false;
            }
            document.getElementById("message1").innerHTML = "";
            if (pw2 == "") {
                document.getElementById("message2").innerHTML = "*";
                toastr.error('Enter the password please!');
                return false;
            }
            document.getElementById("message2").innerHTML = "";
            if (pw1.length < 8) {
                document.getElementById("message1").innerHTML = "*";
                toastr.error('Password length must be atleast 8 characters');
                return false;
            }
            document.getElementById("message1").innerHTML = "";
            if (pw1.length > 15) {
                document.getElementById("message1").innerHTML = "*";
                toastr.error('Password length must not exceed 15 characters');
                return false;
            }
            document.getElementById("message1").innerHTML = "";
            if (pw1 != pw2) {
                document.getElementById("message2").innerHTML = "*";
                toastr.error('Passwords are not same');
                return false;
            }
            if (pw0 != pw) {
                document.getElementById("message0").innerHTML = "*";
                toastr.error('Wrong old password');
                return false;
            } else {
                document.getElementById('form1').setAttribute('method', "post");
                document.getElementById('form1').setAttribute('action', str);
            }
        }
    </script>

</body>

</html>