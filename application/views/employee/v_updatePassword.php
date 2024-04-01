<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Password</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
  <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center mt-5">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header text-center bg-info">
                                    Update Password
                                </div>
                                <div class="card-body">
                                    <form onsubmit="return validateForm()" id="form1">
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" name="oldPassword" id="oldPassword" placeholder="..." class="form-control">
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
                                        <div class="form-group">
                                                <a href="<?= base_url('Employee/profile')?>" class="btn btn-sm" style="background-color:#D82724; color:white">cancel</a>
                                                <button  type="submit" href="" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
        </div> 
<?php 
include 'footer.php';
$str = site_url('Employee/processUpdatePassword/');
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