<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Chatt</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <?php include 'header.php'; ?> 
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                                <li class="breadcrumb-item active" aria-current="page">Chat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow-none">
                                <div class="card-header">
                                    <h3 class="card-title">Messages</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0"> <?php
                                if (empty($order)) {
                                    ?> <div class="d-flex justify-content-center p-4">
                                        <h4>Order not yet</h4>
                                    </div> <?php
                                }else{
                                
                                ?> <ul class="products-list product-list-in-card pl-2 pr-2"> <?php
                               
                               foreach ($order as $row) {
                                   ?> <li class="item">
                                            <div class="product-img">
                                                <img src="<?php echo base_url(); ?>assets/upload/images/<?=$row['image']?>" alt="Product Image" class="img-size-50">
                                            </div>
                                            <div class="product-info">
                                                <div class="direct-chat-infos">
                                                    <a href="<?php echo base_url('superAdmin/selectedChatt/'.$row['id']); ?>" class="product-title"><?=$row['name']?> <span class="direct-chat-timestamp float-right"><?= date('h:m, d F', strtotime($row['create_date']));?></span>
                                                </div>
                                                <span class="product-description"> <?=$row['service_name']?> </span>
                                            </div>
                                        </li> <?php
                               }
                            }
                               ?> </ul>
                                </div>
                                <div class="card-footer bg-white">
                                    <a class="uppercase"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="jumbotron bg-white text-center">
                                <h1 class="display-6"><i class="fa fa-arrow-left"></i> Select message</h1>
                                <p class="lead">Select to start</p>
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
</body>

</html>