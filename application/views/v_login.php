<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title>BATS Integration System</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="We are not only focused on the past, but on the future of your business, We provide services including accounting services such as bookkeeping services, financial report compilation services, services management, 
management accounting, management consulting, taxation services, procedural services as agreed upon financial information, and information technology system services" name="description">
    <meta content="BATS Consulting, tax consultant, consultant tax, tax, taxation, client bats, system bats consulting, client bats consulting, konsultan pajak di indonesia, consulting, bats, bat, bat consulting, bats consulting, konsultan pajak, pajak indonesia, kantor akuntan, kantor pajak, kantor akuntan pajak, jasa konsultan pajak, kantor konsultan pajak, konsultan adalah, konsultan pajak adalah, biaya konsultan pajak, tugas konsultan pajak, tarif konsultan pajak" name="keywords">
    <meta name="author" content="BATS-Consulting">
    <meta name="generator" content="FrontPage 4.0">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">
    <style>
        body {
            background-image: url('<?=base_url();?>/assets/image/background/bg1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        .l_login {
            width: 50%;
        }

        @media (max-width: 767px) {

            .l_login {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>

<body class="d-flex flex-column justify-content-center">
    <div class="row">
        <div class="col-md-6 d-flex flex-column align-items-center">
            <div class="text-center d-flex l_login">
                <img src="<?=base_url()?>/assets/image/logo/bats200px.png" style="width: 50%;" class="pr-2 pl-0" alt="">
                <img src="<?=base_url()?>/assets/image/logo/ahr200px.png" style="width: 50%;" alt="">
            </div>
            <div class="card card-outline card-danger">
                <div class="card-header text-center">
                    <a href="" class="h2"><b>BATS</b><br> INTEGRATION SYSTEM</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form onsubmit="return validateForm()" id="form1" class="">
                        <div class="input-group mb-3">
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="checkbox" id="show-password-checkbox" onclick="showPassword()">
                                <label for="show-password-checkbox">Show password</label>
                                <button type="submit" class="btn btn-danger btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <a href="<?= base_url('Reguest') ?>" class="mt-2 mb-2">create a guest account?</a>
                    </div>
                </div>
            </div>
            <h5 class="text-center mt-3 l_login "><b>WWW.BATS-CONSULTING.COM</b></h5>
            <p class="text-center m-1  l_login">A member of BATS International Group | Independent Accounting & Tax Firm</p>
            <p class="text-center m-1 l_login">©2022 - BATS Consulting</p>
        </div>

        <div class="col-md-6">

        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <?php 
    $str = site_url('Login/proses_login');
    ?> <script>
        document.getElementById("email").focus();

        function validateForm() {
            var email = document.getElementById("email").value;
            var pass = document.getElementById("pass").value;
            var str = "<?= $str; ?>";
            if (email == "") {
                toastr.error('Email and Password cannot be empty!');
                return false;
            }
            if (pass == "") {
                toastr.error('Password cannot be empty!');
                return false;
            } else {
                document.getElementById('form1').setAttribute('method', "post");
                document.getElementById('form1').setAttribute('action', str);
            }
        }

        <?php
        if ($this->session->flashdata('msg')) {
            ?>
            toastr.warning('Wrong Email and Password!'); <?php
        } ?>
        function showPassword() {
            var passwordInput = document.getElementById("pass");
            var showPasswordCheckbox = document.getElementById("show-password-checkbox");
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
            }
    </script>
</body>

</html>