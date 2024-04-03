<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Report</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    
    <?php include 'header.php';?>
    <style>
    .file {
        visibility: hidden;
        position: absolute;
    }
    </style>
</head>
<?php
// $doReport = [];
// $doProcess = [];
// foreach ($report as $row) {
//     array_push($doReport,$row['order_step_id']);
// }
// foreach ($dataProcess as $row) {
//     array_push($doProcess,$row['order_step_id']);
// }
?>
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
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none"> <?php
                            if (empty($dataReport)) {
                            echo '
                            <div class="card-header bg-primary pt-3">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 class=" text-primary">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam text-primary"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            return false;
                            }
                            ?> 
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-4 card">
                                                <div class="card-body">
                                                    <h5 class="text-center">Form Update</h5>   
                                                    <div class="form-group">
                                                        <label for="">Sub Step</label>
                                                        <textarea name="" class="form-control border-0" id="" cols="30" rows="4" readonly><?=$dataReport['subStep']?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Message</label>
                                                        <textarea name="message" class="form-control " id="" cols="30" rows="4" placeholder="<?=$dataReport['message']?>"><?=$dataReport['message']?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Report</label>
                                                        <input type="file" name="image" class="file">
                                                        <div class="input-group my-3">
                                                            <input required type="text" class="form-control border-0" disabled placeholder="Upload File" id="file">
                                                            <div class="input-group-append">
                                                                <button type="button" id="pilih_gambar" class="browse btn btn-dark border-0">Select File</button>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-block btn-success"><i class="fa fa-upload mr-2"></i> update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 card">
                                                <div class="card-body">
                                                    <h5 class="text-center">Data Report</h5>   
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Employee</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['employee_name']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Step</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['step']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Service</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['service_name']?>">
                                                            </div>
                                                            
                                                            <a href="<?= base_url('superAdmin/progressOrder/'.$dataReport['order_id']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Files</label>
                                                                <ul class="list-unstyled">
                                                                    <?php
                                                                    $type = pathinfo($dataReport['report'], PATHINFO_EXTENSION);
                                                                    $url = base_url().'assets/upload/report/'.$dataReport['report'];
                                                                    switch ($type) {
                                                                        case "pdf":
                                                                            echo '<a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-file-pdf"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        case 'jpg':
                                                                        case 'png':
                                                                        case 'jpeg':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-image "></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                            
                                                                        case 'docx':
                                                                        case 'odt':
                                                                        case 'doc':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-file-word"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        
                                                                        default:
                                                                            echo'';
                                                                      }
                                                                    ?>
                                                                    <li>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Latest Update</label>
                                                                <input type="text" readonly class="form-control" value="<?= date("F j, Y, g:i a", strtotime( $dataReport['update_date'])); ?>">
                                                            </div>
                                                        </div>
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
        </div>
    
    <?php include 'footer.php';?>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- BS-Stepper -->
    <script src="<?php echo base_url(); ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo base_url(); ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $('.select2').select2()
        });
    </script>
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
            // document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    </script>
</body>

</html>