<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client JobTrack</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
    <?php include'header.php'; ?>
</head>

<body class="hold-transition  bg-dark">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Client/report_home')?>">Report</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="error-template text-center">
                                <h1>
                                    Oops!</h1>
                                <h2>
                                    404 Not Found</h2>
                                <div class="error-details">
                                    Sorry, an error has occured, Requested page not found!
                                </div>
                                <a href="<?=base_url('Client/report_home')?>" class="btn btn-sm btn-default align-middle mt-3"><i class="fa fa-arrow-alt-circle-left mr-2"></i> back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
    <?php include'footer.php'; ?>
   
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        
        $(function() {
            $('.select2').select2()
        });
            $('#nav_jobtrack').addClass('nav_select');
    </script>
</body>

</html>