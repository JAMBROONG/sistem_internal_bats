    
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