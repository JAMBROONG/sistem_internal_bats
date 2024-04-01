<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Company</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?> <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
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
                                <li class="breadcrumb-item active" aria-current="page">Update Company</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">Update Company</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center bg-gradient-navy rounded p-3">
                                    <img class="profile-user-img img-fluid border-0" id="preview" src="<?php echo base_url(); ?>assets/upload/images/<?=$dataUser['image']?>" alt="User profile picture">
                                </div>
                                <form onsubmit="return validateForm()" id="form1" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div id="msg"></div>
                                            <input type="file" name="image" class="file">
                                            <div class="input-group my-3">
                                                <input required type="text" class="form-control bg-white" disabled placeholder="Upload Gambar" id="file">
                                                <div class="input-group-append">
                                                    <button type="button" id="pilih_gambar" class="browse btn btn-success">Pilih Gambar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Name</span>
                                            </div>
                                            <input type="text" id="name" name="company" value="<?= $dataUser['company'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Phone</i></span>
                                            </div>
                                            <input type="number" id="name" name="company_phone" value="<?= $dataUser['company_phone'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Email</i></span>
                                            </div>
                                            <input type="email" id="name" name="company_email" value="<?= $dataUser['company_email'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">NPWP</i></span>
                                            </div>
                                            <input type="text" id="name" name="company_NPWP" value="<?= $dataUser['NPWP'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Form of Business Entity</i></span>
                                            </div>
                                            <input type="text" id="name" name="businessEntity" value="<?= $dataUser['businessEntity'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Type of Business Entity</i></span>
                                            </div>
                                            <input type="text" id="name" name="typeBusiness" value="<?= $dataUser['typeBusiness'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">SKMHHAM</i></span>
                                            </div>
                                            <input type="text" id="name" name="SKMHHAM" value="<?= $dataUser['SKMHHAM'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Deeds of Establishment</i></span>
                                            </div>
                                            <input type="text" id="name" name="deeds_of_establishment" value="<?= $dataUser['deeds_of_establishment'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Deeds of Revisions</i></span>
                                            </div>
                                            <input type="text" id="name" name="deeds_of_revisions" value="<?= $dataUser['deeds_of_revisions'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Website</i></span>
                                            </div>
                                            <input type="text" id="name" name="website" value="<?= $dataUser['website'] ?>" class="form-control text-right" data-original-title="" title="">
                                        </div>
                                        <span id="message1" style="color:red"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="addressOfDomicile" id="" cols="30" rows="10" class="form-control"><?= $dataUser['addressOfDomicile'] ?></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <input class="btn btn-success " type="submit" value="update">
                                        <a href="<?php echo base_url('superAdmin/dataCompany'); ?>" class="btn btn-danger">cancle</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php 
$str = site_url('superAdmin/processUpdateCompany/'.$id);
?> 
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

            function validateForm() {
                var name = document.getElementById("name").value;
                var str = "<?php echo $str ?>";
                //check empty password field  
                if (name == "") {
                    toastr.error('Name cannot be empty!');
                    return false;
                } else {
                    document.getElementById('form1').setAttribute('method', "post");
                    document.getElementById('form1').setAttribute('action', str);
                }
            }
        </script> 
</body>

</html>