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

<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper">
            <?php include'top_nav.php'; ?>
            <aside class="main-sidebar bg-white elevation-2 layout-fixed">
                <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center bg-info">
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
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('Admin/profile')?>">Profile</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Update Password</li>
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
                <div class="container-fluid d-flex justify-content-center">
                <div class="col-md-5">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="card-body">
                    <form onsubmit ="return validateForm()" id="form1">
                    <div class="form-group">
                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div> 
                        <input type="password" id = "pswd0" value = "" class="form-control" data-original-title="" title="" placeholder="Old Password">
                        </div>
                        <span id = "message0" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div> 
                        <input type="password" name="password" id = "pswd1" value = "" class="form-control" data-original-title="" title="" placeholder="New Password">
                        </div>
                        <span id = "message1" style="color:red"></span>
                    </div>
                    <div class="form-group">
                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id = "pswd2" value = "" class="form-control" data-original-title="" title="" placeholder="Confirm Password">
                        </div>
                        <span id = "message2" style="color:red"></span>
                    </div>
                    <div class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-2"></i> save</button>
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
$str = site_url('Admin/processUpdatePasswordA/'.$user['id']);
$pw  = $user['password'];
?>
<script> 

function validateForm(){
    var pw0 = document.getElementById("pswd0").value;
    var pw1 = document.getElementById("pswd1").value;  
    var pw2 = document.getElementById("pswd2").value;

var str = "<?php echo $str ?>";
var pw = "<?php echo $pw ?>";
    if(pw0 == "") {  
      document.getElementById("message0").innerHTML = "*";  
      toastr.error('Fill the old password please!');
      return false;  
    }
    document.getElementById("message0").innerHTML = "";  
    var pw0 = md5(pw0);
    if(pw1 == "") {  
      document.getElementById("message1").innerHTML = "*";  
      toastr.error('Fill the password please!');
      return false;  
    }
    document.getElementById("message1").innerHTML = "";  
    if(pw2 == "") {  
      document.getElementById("message2").innerHTML = "*";  
      toastr.error('Enter the password please!');
      return false;  
    }
      document.getElementById("message2").innerHTML = "";  
    if(pw1.length < 8) {  
      document.getElementById("message1").innerHTML = "*";  
      toastr.error('Password length must be atleast 8 characters');
      return false;  
    } 
      document.getElementById("message1").innerHTML = "";  
    if(pw1.length > 15) {  
      document.getElementById("message1").innerHTML = "*";  
      toastr.error('Password length must not exceed 15 characters');
      return false;  
    }  
      document.getElementById("message1").innerHTML = "";
    if(pw1 != pw2) {  
      document.getElementById("message2").innerHTML = "*";
      toastr.error('Passwords are not same');  
      return false;  
    } 
    if( pw0 != pw ){
      document.getElementById("message0").innerHTML = "*";  
      toastr.error('Wrong old password');  
        return false;  
    }else {  
      document.getElementById('form1').setAttribute('method',"post");
      document.getElementById('form1').setAttribute('action', str);
    }
 }  
</script>  

</body>

</html>