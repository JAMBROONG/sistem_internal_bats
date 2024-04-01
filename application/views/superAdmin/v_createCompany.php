<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Company</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';?> 
        <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
      <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataCompany')?>">Company</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-header p-2 bg-dark">
                            <div class="d-flex justify-content-center p-2">
                                <a class="card-title text-white" data-toggle="tab">Create Company</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" action="<?= site_url('superAdmin/processCreateCompany') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company Name</label>
                                                <input type="text" id="name" name="company" value="" class="form-control" data-original-title="" title="" placeholder="ex: PT. BATS INTERNATIONAL GROUP">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company Brand</label>
                                                <input type="text" id="name" name="brand" value="" class="form-control" data-original-title="" title="" placeholder="ex: BATS Consulting">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company Phone</label>
                                                <input type="number" id="name" name="company_phone" value="" class="form-control" data-original-title="" title="" placeholder="ex: 082312xxxxxx">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company Email</label>
                                                <input type="email" id="name" name="company_email" value="" class="form-control" data-original-title="" title="" placeholder="ex: info.bats@mail.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company NPWP</label>
                                                <input type="text" id="name" name="company_NPWP" value="" class="form-control" data-original-title="" title="" placeholder="ex: 321.12xxxxxxx">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Form of Business Entity</label>
                                                <input type="text" id="name" name="businessEntity" value="" class="form-control" data-original-title="" title="" placeholder="ex: PT..">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Type of Business Entity</label>
                                                <input type="text" id="name" name="typeBusiness" value="" class="form-control" data-original-title="" title="" placeholder="ex: accounting">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">SKMHHAM</label>
                                                <input type="text" id="name" name="SKMHHAM" class="form-control" data-original-title="" title="" placeholder="ex: 34332">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Deeds of Establishment</label>
                                                <input type="text" id="name" name="deeds_of_establishment" class="form-control" data-original-title="" title="" placeholder="ex: 17">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Deeds of Revisions</label>
                                                <input type="text" id="name" name="deeds_of_revisions" class="form-control" data-original-title="" title="" placeholder="ex: 14">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Company Website</label>
                                                <input type="text" id="name" name="website" class="form-control" data-original-title="" title="" placeholder="ex: bats.consulting.com">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea name="addressOfDomicile" id="" cols="30" rows="10" class="form-control" placeholder="ex: Jl. Al-islamiyah..."></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Logo</label>
                                            <div class="col-sm-12">
                                                <div id="msg"></div>
                                                <input type="file" name="image" class="file">
                                                <div class="input-group my-3">
                                                    <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                                    <div class="input-group-append">
                                                        <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                                <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                        </div>
                                        <div class="form-group">
                                            <a href="<?php echo base_url('superAdmin/dataCompany'); ?>" class="btn btn-danger btn-sm pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>cancel</a>
                                            <button type="submit" class="btn btn-success ml-1 btn-sm">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
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