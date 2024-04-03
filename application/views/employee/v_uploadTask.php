<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Review</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/simplemde/simplemde.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header bg-info">
                            Upload Task
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Task</label>
                                    <input type="text" name="" value="<?=$dataTask['task']?>" class="form-control" readonly id="">
                                    <label for="">Estimasi</label>
                                    <input type="text" name="" value="<?php echo date("F j, Y", strtotime($dataTask['estimasi']));?>" class="form-control" readonly id="">
                                    <?php
                                                    $todayDateObj = new \DateTime(date('Y-m-d'));
                                                    $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($dataTask['estimasi'])));
                                                    $interval = $todayDateObj->diff($foundedDateObj);
                                                    $interval = $interval->format('%r%a') . "\n\n";
                                                    if ($interval >= 0 ) {
                                                        echo '<p class="text-success">('.$interval.' more days)</p>';
                                                    } else
                                                    if ($interval == 0) {
                                                        echo '<p class="text-success">Today</p>';
                                                    }
                                                else{
                                                    echo '<p class="text-danger">('.$interval .'days ago)</p>';
                                                        
                                                }
                                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Upload File</label> <small> (max size 2Mb)</small>
                                    <form action="<?= site_url('Employee/processUploadTask') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="file" name="image" id="file2" class="file">
                                            <p>Format: <br><small class=" text-danger">pdf / jpg / png / jpeg / xlsx / doc / odt</small></p>
                                            <div class="input-group">
                                                <input type="hidden" name="task_id" value="<?=$dataTask['id']?>">
                                                <input required type="text" class="form-control" disabled placeholder="Upload Task" id="file">
                                                <div class="input-group-append">
                                                    <button type="button" id="pilih_gambar" class="browse btn btn-dark">Select File</button>
                                                </div>
                                            </div>
                                            <p class="text-danger" id="message"></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" class="form-control text-dark textarea " id="summernote" placeholder="ex: Filenya saya kirim WhatsApp ya pak"><?=$dataTask['description']?></textarea>
                                        </div>
                                        <a href="<?= base_url('Employee/specialTask') ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i>back</a>
                                        <button class="btn btn-sm btn-success ml-2" name="submit" type="submit"><i class="fa fa-save mr-2"></i> save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- CodeMirror -->
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/css/css.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

        <script>
            function getExtension(filename) {
                var parts = filename.split('.');
                return parts[parts.length - 1];
            }
            $(function () {
                $('#summernote').summernote()
            })
            function bytesToSize(bytes) {
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
                if (bytes === 0) return 'n/a'
                const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)), 10)
                if (i === 0) return `${bytes} ${sizes[i]})`
                return `${(bytes / (1024 ** i)).toFixed(1)} ${sizes[i]}`
            }
            document.forms[0].addEventListener('submit', function(evt) {
                var file = document.getElementById('file2').files[0];
                var msg = document.getElementById('message');
                if (file && file.size < 2485760) {
                    var ext = getExtension(file.name);
                    switch (ext.toLowerCase()) {
                        case 'jpg':
                        case 'pdf':
                        case 'jpeg':
                        case 'png':
                        case 'xlsx':
                        case 'doc':
                        case 'odt':
                            return true;
                    }
                    msg.innerHTML = "*format not met, your current format: " + ext;
                    evt.preventDefault();
                } else {
                    msg.innerHTML = "*file size exceeds the limit, your current size: " + bytesToSize(file.size);
                    evt.preventDefault();
                }
            }, false);

            $(document).on("click", "#pilih_gambar", function() {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                var reader = new FileReader();
                reader.onload = function(e) {};
                reader.readAsDataURL(this.files[0]);
            });
        </script>
</body>

</html>