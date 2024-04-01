<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Report</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
</head>
<style>
    .file {
        visibility: hidden;
        position: absolute;
    }
</style>
<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none"> <?php
                            if (empty($dataReport)) {
                            echo '
                            <div class="card-body text-center">
                                <div>
                                    <h2 class=" text-primary">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam text-primary"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            return false;
                            }
                            ?> <div class="card-header bg-info">
                                    <div class="d-flex justify-content-between">
                                        <div class=""></div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-white"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times text-white"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?=site_url('Employee/processUpdateReport/'.$dataReport['id'])?>" method="post"  enctype="multipart/form-data">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-4 card">
                                                <div class="card-body">
                                                    <h5 class="text-center">Form Update</h5>   
                                                    <div class="form-group">
                                                        <input type="hidden" name="report_id" value="<?=$dataReport['id']?>">
                                                        <input type="hidden" name="order_id" value="<?=$dataReport['order_id']?>">
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
                                                            <input required type="text" class="form-control border-0" disabled placeholder="Upload Gambar" id="file">
                                                            <div class="input-group-append">
                                                                <button type="button" id="pilih_gambar" class="browse btn btn-dark border-0">select report</button>
                                                            </div>
                                                        </div>
                                                        <a href="<?= base_url('Employee/orderReport/'.$dataReport['order_id']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                                        <button class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save</button>
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
                                                                            echo '<a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-file-pdf"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        case 'jpg':
                                                                        case 'png':
                                                                        case 'jpeg':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-image "></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                            
                                                                        case 'docx':
                                                                        case 'odt':
                                                                        case 'doc':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-primary" download><i class="far fa-fw fa-file-word"></i>'.$dataReport['report'].'</a>';
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
<?php 
include 'footer.php';
?>
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