<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Create Client</title>
   <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>

   <style>
      .file {
         visibility: hidden;
         position: absolute;
      }
   </style>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
   <div class="wrapper bg-white">
      <?php include'template/v_navbar.php' ?>
      <div class="content-wrapper bg-white">
         <section class="content">
            <div class="container pt-3">
               <div class="main-body">
                  <nav aria-label="breadcrumb" class="main-breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataUser')?>">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Client</li>
                     </ol>
                  </nav>
               </div>
            </div>
            <div class="container">
               <form class="form-horizontal" action="<?= site_url('superAdmin/processCreateClient') ?>" method="post" enctype="multipart/form-data">
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="inputName">Name</label>
                                 <input type="text" class="form-control" id="inputName" value="" name="name" required placeholder="ex: Mr. X..">
                              </div>
                              <div class="form-group">
                                 <label for="inputName">Client To</label>
                                 <select name="user_to_company_id" id="" class="custom-select form-control-border border-width-2">
                                    <option value="1">PT BATS INTERNATIONAL GROUP</option>
                                    <option value="2">KAP AHR</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="inputName">Position</label>
                                 <input type="text" class="form-control" id="inputName" value="" name="position" required placeholder="ex: Marketing">
                              </div>
                              <div class="form-group">
                                 <label for="inputName2">Phone</label>
                                 <input type="number" class="form-control" id="inputName2" value="" name="phone" placeholder="ex: 0822xxxx" required>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail">NIK</label>
                                 <input type="number" class="form-control" id="inputEmail" value="" name="NIK" required placeholder="ex: 321xxxxxx">
                              </div>
                              <div class="form-group">
                                 <label for="inputName2">NPWP</label>
                                 <input type="text" class="form-control" id="inputName2" value="" name="NPWP" placeholder="ex: 334.32xxxxxx" required>
                              </div>
                           </div>
                           <div class="col-md-6">

                              <div class="form-group">
                                 <label for="inputEmail">Company</label>
                                 <select name="company_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                    <?php
                                            foreach ($company as $row) {
                                                ?>
                                    <option value="<?= $row['id'] ?>">
                                       <?= $row['company'] ?>
                                    </option>
                                    <?php
                                            }
                                            ?>
                                 </select>
                              </div>

                              <div class="form-group">
                                 <label for="inputEmail">Nationality</label>
                                 <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                    <?php
                                       foreach ($country as $row) {
                                          
                                          ?> <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> <?php
                                       }
                                       ?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label for="inputExperience">Address</label>
                                 <textarea class="form-control" id="inputExperience" name="address" placeholder="Jl. Sudirman...." required></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail">Email</label>
                                 <input type="email" class="form-control" id="inputEmail" value="" name="email" required placeholder="ex: ..@email.com">
                              </div>
                              <div class="form-group">
                                 <label for="inputEmail">Password</label>
                                 <input type="password" class="form-control" id="inputEmail" value="" name="password" required placeholder="*****">
                              </div>
                              <div class="form-group">
                                 <label for="inputName">Profile</label>
                                 <input type="file" name="image" class="file">
                                 <div class="input-group">
                                    <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                    <div class="input-group-append">
                                       <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="d-flex justify-content-center">
                                    <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                              </div>
                              <div class="form-group">
                                 <div>
                                    <a href="<?php echo base_url('superAdmin/dataClient'); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                    <button type="submit" class="btn btn-success">Create</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </div> 
      <?php include 'footer.php';?>
   <script>
      $(document).on("click", "#pilih_gambar", function() {
         var file = $(this).parents().find(".file");
         file.trigger("click");
      });
      $('input[type="file"]').change(function(e) {
         var fileName = e.target.files[0].name;
         $("#file").val(fileName);
         var reader = new FileReader();
         reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
         };
         // read the image file as a data URL.
         reader.readAsDataURL(this.files[0]);
      });
   </script>
</body>

</html>