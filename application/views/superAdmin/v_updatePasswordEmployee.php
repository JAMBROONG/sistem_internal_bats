<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataEmployee')?>">Employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                        <div class="col-md-5">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Change Password to <strong><?= $employee['employee_name'] ?></strong></h3>
                                </div>
                                <div class="card-body">
                                    <form onsubmit="return validateForm()" id="form1">
                                        <div class="form-group">
                                            <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                </div>
                                                <input type="password" id="pswd1" name="password" value="" class="form-control" data-original-title="" title="" placeholder="New Password">
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
                                            <a href="<?php echo base_url('superAdmin/detailEmployee/'.$id); ?>" class="btn btn-danger">cancle</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
        <?php 
$str = site_url('superAdmin/processUpdatePasswordE/'.$id);
?> <script>
            function validateForm() {
                var pw1 = document.getElementById("pswd1").value;
                var pw2 = document.getElementById("pswd2").value;
                var str = "<?php echo $str ?>";
                //check empty password field  
                if (pw1 == "") {
                    toastr.error('Fill the password please!');
                    return false;
                }
                //minimum password length validation  
                if (pw1.length < 8) {
                    toastr.error('Password length must be atleast 8 characters');
                    return false;
                }
                //check empty confirm password field  
                if (pw2 == "") {
                    toastr.error('Enter the password please!');
                    return false;
                }
                //maximum length of password validation  
                if (pw1.length > 15) {
                    toastr.error('Password length must not exceed 15 characters');
                    return false;
                }
                if (pw1 != pw2) {
                    toastr.error('Passwords are not same');
                    return false;
                }
                else {
                    document.getElementById('form1').setAttribute('method', "post");
                    document.getElementById('form1').setAttribute('action', str);
                }
            }
        </script>
        <?php include 'footer.php';?>
</body>

</html>