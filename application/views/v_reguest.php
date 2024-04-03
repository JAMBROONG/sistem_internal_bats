<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Guest</title>
    
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>
<style>
    body {
  min-height:100%;
  background:url("<?php echo base_url(); ?>assets/image/background/bg.jpg") rgba(255, 255, 255, 3);
  background-size:cover;
  background-color: white;
  background-blend-mode: multiply;
}
</style>
<body class="pt-5">
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-none card-default">
                        <div class="card-body">
                                        
                        <div class="d-flex flex-column">
                            
                            <h3 class="text-center text-primary">TAX HEALTH CHECK REGISTRATION</h3>
                            <p class="text-center mb-5 text-dark">Make sure the data you input is correct</p>
                            </div>
                            <form onsubmit="return validateForm()" id="form1" novalidate>
                                <div class="bs-stepper">
                                    <div class="bs-stepper-header" role="tablist">
                                        <div class="step" data-target="#page1">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="page1" id="logins-part-trigger">
                                                <span class="bs-stepper-circle">1</span>
                                                <span class="bs-stepper-label">User</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#page2">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="page2" id="information-part-trigger">
                                                <span class="bs-stepper-circle">2</span>
                                                <span class="bs-stepper-label">Company</span>
                                            </button>
                                        </div>
                                        <div class="line"></div>
                                        <div class="step" data-target="#page3">
                                            <button type="button" class="step-trigger" role="tab" aria-controls="page3" id="akun-part-trigger">
                                                <span class="bs-stepper-circle">3</span>
                                                <span class="bs-stepper-label">Account Settings</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="bs-stepper-content">
                                        <div id="page1" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="name" class="text-dark">Full name</label>
                                                        <input type="text" class="form-control text-dark" name="name" id="name" placeholder="ex: Budi Pangestu" required>
                                                        <small class="text-danger" id="msgname"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telepon" class="text-dark">Mobile</label> <small class="text-danger">*10-15 characther</small>
                                                        <input type="text" onkeypress="return onlyNumberKey(event)"  minlength="10" maxlength="15" class="form-control text-dark" name="phone" id="telepon" placeholder="082119xxxxxx" required>
                                                        <small class="text-danger" id="msgtlp"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="position" class="text-dark">Position</label>
                                                        <input type="text" class="form-control text-dark" id="position" name="position" placeholder="ex: Staff/Supervisor/Manager/Direktur" required>
                                                        <small class="text-danger" id="msgposition"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="jk" class="text-dark">Gender</label> <br>
                                                        <div class="icheck-primary d-inline">
                                                            <input type="radio" name="gender" checked="true" id="radioDanger1" value="male">
                                                            <label for="radioDanger1" class="text-dark">
                                                                Male
                                                            </label>
                                                        </div>
                                                        <div class="icheck-primary d-inline ml-2">
                                                            <input type="radio" name="gender" id="radioDanger2" value="female">
                                                            <label for="radioDanger2" class="text-dark"> Female
                                                            </label>
                                                        </div>
                                                        <small class="text-danger" id="msgjk"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telepon" class="text-dark">Date of birth</label>
                                                        <input type="date" class="form-control text-dark" name="date_of_birth" id="tgl"required>
                                                        <small class="text-danger" id="msgtgl"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telepon" class="text-dark">Home address</label>
                                                        <textarea name="address" id="address" cols="30" rows="5" placeholder="Jl." class="form-control text-dark" required></textarea>
                                                        <small class="text-danger" id="msgaddress"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-info btn-sm d-flex align-items-center" type="button" onclick="step1()">Next <i class="fa fa-arrow-alt-circle-right ml-2"></i></button>
                                        </div>


                                        <div id="page2" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="company" class="text-dark">Company name</label>
                                                        <input id="company" class="form-control" type="text" name="company" id="company" placeholder="PT." required>
                                                        <small class="text-danger" id="msgc"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_phone" class="text-dark">Company phone</label> <small class="text-danger">*max 15 characther</small>
                                                        <input id="company_phone" class="form-control"  type="text" onkeypress="return onlyNumberKey(event)"  minlength="4" maxlength="15" name="company_phone" placeholder="021xxxxxxx" required>
                                                        <small class="text-danger" id="msgcp"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_email" class="text-dark">Company e-mail</label>
                                                        <input id="company_email" class="form-control" type="email" name="company_email" placeholder="mail@..." required>
                                                        <small class="text-danger" id="msgce"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="company_website" class="text-dark">Company website</label>
                                                        <input id="company_website" class="form-control" type="text" name="company_website" placeholder="www.." required>
                                                        <small class="text-danger" id="msgcw"></small>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="company_address" class="text-dark">Company's address</label>
                                                        <textarea name="company_address" id="company_address" cols="30" class="form-control" rows="5" placeholder="Jl" required></textarea>
                                                        <small class="text-danger" id="msgca"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button class="btn mr-2 btn-danger btn-sm d-flex align-items-center" type="button" onclick="stepper.previous()"><i class="fa fa-arrow-alt-circle-left mr-2"></i>Back</button>
                                                <button class="btn btn-info btn-sm d-flex align-items-center" type="button" onclick="step2()">Next <i class="fa fa-arrow-alt-circle-right ml-2"></i></button>
                                            </div>
                                        </div>
                                        <div id="page3" class="content" role="tabpanel" aria-labelledby="akun-part-trigger">
                                            <div class="row d-flex justify-content-center">
                                                <div class="card col-lg-6 bg-info">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="email_akun" class="text-center">Email</label>
                                                            <input id="email_akun" class="form-control text-info" type="text" name="email_akun" placeholder="mail@...">
                                                            <small class="text-danger" id="message0"></small>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="password" class="text-center">Password</label>
                                                            <input id="password" class="form-control text-info" type="password" name="password_akun" placeholder="********">
                                                            <small class="text-danger" id="message1"></small>
                                                        </div>
                                                        <div class="form-group" >
                                                            <label for="password2"class="text-center">Confirm password</label>
                                                            <input id="password2" class="form-control text-info" type="password" placeholder="********">
                                                            <small class="text-danger" id="message2"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button class="btn mr-2 btn-danger btn-sm d-flex align-items-center" type="button" onclick="stepper.previous()"><i class="fa fa-arrow-alt-circle-left mr-2"></i>Back</button>
                                                <button class="btn btn-success btn-sm d-flex align-items-center" type="submit" form="form1">Create Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <?php
        $url = site_url('Reguest/create');
        $data_mail = json_encode($mail);
    ?>
    <script>
            
        function step1(){
            let name        = document.getElementById('name').value;
            let position    = document.getElementById('position').value;
            let telepon     = document.getElementById('telepon').value;
            let jk          = document.getElementsByName('gender').value;
            let tgl         = document.getElementById('tgl').value;
            let address     = document.getElementById('address').value;
            if (name == "") {
                document.getElementById('msgname').innerHTML = "* Name cannot be empty";
            } else if (telepon == "") {
                document.getElementById('msgtlp').innerHTML = "* The phone cannot be empty";
                document.getElementById('msgname').innerHTML = " ";
            } else if (position == "") {
                document.getElementById('msgposition').innerHTML = "* Position cannot be empty";
                document.getElementById('msgtlp').innerHTML = " ";
            }  else if (tgl == "") {
                document.getElementById('msgtgl').innerHTML = "* Date cannot be empty";
                document.getElementById('msgposition').innerHTML = " ";
            } else if (address == "") {
                document.getElementById('msgaddress').innerHTML = "* Address cannot be empty";
                document.getElementById('msgtgl').innerHTML = " ";
            }
            else{
                stepper.next();
            }
        }
        function step2(){
            let company        = document.getElementById('company').value;
            let company_phone    = document.getElementById('company_phone').value;
            let company_email     = document.getElementById('company_email').value;
            let company_website          = document.getElementsByName('company_website').value;
            let company_address         = document.getElementById('company_address').value;
            if (company == "") {
                document.getElementById('msgc').innerHTML = "* Company name cannot be empty";
            } else if (company_phone == "") {
                document.getElementById('msgcp').innerHTML = "* The company phone cannot be empty";
                document.getElementById('msgc').innerHTML = " ";
            } else if (company_email == "") {
                document.getElementById('msgce').innerHTML = "* Company email cannot be empty";
                document.getElementById('msgcp').innerHTML = " ";
            }  else if (company_website == "") {
                document.getElementById('msgcw').innerHTML = "* The company website cannot be empty";
                document.getElementById('msgce').innerHTML = " ";
            } else if (company_address == "") {
                document.getElementById('msgca').innerHTML = "* Company address cannot be empty";
                document.getElementById('msgcw').innerHTML = " ";
            }
            else{
                stepper.next();
            }
        }
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        function validateForm() {
                var pw0 = document.getElementById("email_akun").value;
                var pw1 = document.getElementById("password").value;
                var pw2 = document.getElementById("password2").value;
                
                var str = "<?php echo $url ?>";
                var json_mail = JSON.parse('<?= $data_mail; ?>');
                if(json_mail.indexOf(md5(pw0)) != -1)
                {  
                    document.getElementById("message0").innerHTML = "* Email already registered";
                    return false;
                } else{
                    if (pw0 == "") {
                        document.getElementById("message0").innerHTML = "* Email is required";
                        return false;
                    } else
                    if (pw1 == "") {
                        document.getElementById("message1").innerHTML = "* Password is required";
                        document.getElementById("message0").innerHTML = " ";
                        return false;
                    } else
                    if (pw2 == "") {
                        document.getElementById("message2").innerHTML = "* Password is required";
                        document.getElementById("message1").innerHTML = " ";
                        return false;
                    } else
                    if (pw1.length < 8) {
                        document.getElementById("message1").innerHTML = "* Password must be 8 characters";
                        document.getElementById("message2").innerHTML = " ";
                        return false;
                    } else
                    if (pw1.length > 15) {
                        document.getElementById("message1").innerHTML = "* Password cannot exceed 15 characters";
                        return false;
                    } else
                    if (pw1 != pw2) {
                        document.getElementById("message2").innerHTML = "* Passwords are not the same   ";
                        document.getElementById("message2").innerHTML = " ";
                        return false;
                    } else {    
                        document.getElementById('form1').setAttribute('method', "post");
                        document.getElementById('form1').setAttribute('action', str);
                    }
                }
            }
            function onlyNumberKey(evt) {
          
          // Only ASCII character in that range allowed
          var ASCIICode = (evt.which) ? evt.which : evt.keyCode
          if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
              return false;
          return true;
      }
    </script>
</body>

</html>