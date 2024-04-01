<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Employee</title>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataEmployee')?>">Data employee</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <div class="card-title">Create Employee</div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <span class="text-danger">if it is returned to the dashboard, then the image size does not match</span>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-sm-4 text-center">
                                            <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                        </div>
                                    </div>
                                    <form class="row" action="<?= site_url('superAdmin/processCreateEmployee') ?>" method="post" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <div class="form-group pl-5 pr-5">
                                                <input type="file" name="image" class="file" required>
                                                <div class="input-group my-3">
                                                    <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                                    <div class="input-group-append">
                                                        <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class=" col-form-label">Name</label>
                                                <input type="text" class="form-control" id="inputName" value="" placeholder="ex: fulan.." name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class=" col-form-label">Date of Birth</label>
                                                <input type="date" class="form-control" value="" name="birth" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class=" col-form-label">Gender</label>
                                                <select class="custom-select form-control-border border-width-2" name="gender" required>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName2" class=" col-form-label">Phone</label>
                                                <input type="number" class="form-control" id="inputName2" value="" name="phone" placeholder="ex: 082xxx" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="d-flex justify-content-start">
                                                    <a href="<?php echo base_url('superAdmin/dataEmployee'); ?>" class="btn btn-danger btn-sm pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                                    <button type="submit" class="btn btn-success ml-1 btn-sm">Create</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputEmail" class=" col-form-label">Position</label>
                                                <input type="text" class="form-control" id="inputEmail" value="" placeholder="ex: marketing.." name="position" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExperience" class=" col-form-label">Address</label>
                                                <textarea class="form-control" id="inputExperience" name="address" placeholder="ex: Jl. rambutan No. 210 ...." required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExperience" class=" col-form-label">Status</label>
                                                <select class="custom-select form-control-border border-width-2" name="status_id" id="exampleSelectBorderWidth2">
                                                    <?php
                                                            foreach ($status as $row) {
                                                                echo ' <option value="'.$row['id'].'">'.$row['status'].'</option>';
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class=" col-form-label text-danger">Email</label>
                                                <input type="email" class="form-control text-danger" id="inputEmail" value="" placeholder="ex: @gmail.." name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class=" col-form-label text-danger">Password</label>
                                                <input type="password" class="form-control text-danger" id="inputEmail" value="" placeholder="*****" name="password" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>
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

</html>