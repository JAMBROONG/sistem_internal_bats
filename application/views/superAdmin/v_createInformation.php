<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seminar Information</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include 'header.php'; ?> 
    <style>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataInformation')?>">Seminar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                              <img class="rounded" src="<?php echo base_url(); ?>assets/image/background/bgServices.jpg"style=" background-size: cover; background-position: center center;" alt="">
                              <div class="card-body">
                                <h5 class="card-title">Create Seminar Information</h5>
                                <p class="card-text">This seminar information will be displayed to all users</p>
                              </div>
                            </div>
                        </div>
                        <div class="card p-3 col-md-8">
                            <form action="<?= site_url('SuperAdmin/processCreateInformation') ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="my-input">Title</label>
                                            <input id="my-input" class="form-control" type="text" name="title" placeholder="ex: Carbon Trading..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Link Group WhatsaApp</label>
                                            <input id="my-input" class="form-control" type="text" name="link" placeholder="https://chat.whatsapp.com/" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="alert alert-warning alert-dismissible p-2">
                                                <button type="button" class="close p-2" data-dismiss="alert" aria-hidden="true">×</button>
                                                <small><i class="icon fas fa-info"></i> <br> photo is recommended to use landscape format</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="my-input">Description</label>
                                            <textarea name="description" id="" cols="30" rows="5" class="form-control textarea" placeholder="ex: Carbon Trading is.." required></textarea>
                                        </div><div class="form-group">
                                            <label for="inputName">Image(landscape)</label>
                                            <input type="file" name="image" class="file">
                                            <div class="input-group">
                                                <input required type="text" class="form-control" disabled placeholder="Upload image" id="file" required>
                                                <div class="input-group-append">
                                                    <button type="button" id="pilih_gambar" class="browse btn btn-dark btn-sm">Upload image</button>
                                                </div>
                                            </div>
                                            <small class="text-danger"><i>png,jpeg,jpg</i></small>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('SuperAdmin/dataInformation') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left mr-2"></i> cancel</a>
                                <button class="btn btn-success btn-sm"><i class="fa fa-save mr-2"></i> save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php'; ?> 
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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