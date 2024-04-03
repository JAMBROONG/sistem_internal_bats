<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Contract</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service Contract</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" style="background-color: #2F2F2F; color:white;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Select Order</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                        <div class="table-responsive">
                                <table class="table table-striped table-inverse mb-0">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-nowrap">No.</th>
                                            <th class="text-nowrap">Service</th>
                                            <th class="text-nowrap">PIC</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($dataOrder)) {?>
                                            <tr>
                                                <td colspan="4">
                                                    <div class="container text-center mt-5 mb-5">
                                                        <h1>404 Service Not Found</h1>
                                                        <p class="lead">We're sorry, the service you are looking for could not be found.</p>
                                                        <!-- <a href="/" class="btn btn-primary">Go to Home</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            $no = 1;
                                            foreach ($dataOrder as $key) {
                                                ?>
                                                
                                            <tr>
                                                <td scope="row"><?= $no ?></td>
                                                <td><?= $key['service_name'] ?></td>
                                                <td class="text-nowrap"><?= $key['supervisor_name'] ?></td>
                                                <td class="text-nowrap">
                                                    <?php
                                                    if ($key['service_name'] == 'Monthly Accounting and Tax Compliance') {
                                                        ?>
                                                         <button  class="btn btn-sm btn-default d-flex align-items-center" data-toggle="modal" data-target="#modelId<?=$no?>">Select Month <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>
                                                         <div class="modal fade" id="modelId<?=$no?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <form action="<?=base_url('Client/detailContract')?>" method="get">
                                                                            <input type="hidden" value="<?=md5($key['id'])?>" name="detail" required class="form-control" id="">
                                                                            <input type="month" value="<?= date('Y-m') ?>" name="date" required class="form-control" id="">
                                                                            <button class="btn btn-sm mt-3 btn-default d-flex align-items-center">Detail <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <?php
                                                    } else{
                                                        ?>
                                                        
                                                    <button onclick="window.location='<?=base_url('Client/detailContract?detail='.md5($key['id'])) ?>'" class="btn btn-sm btn-default d-flex align-items-center">Detail <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                                        
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>

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
            $(function() {
                $("#table").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            
            $('#nav_service_contract').addClass('nav_select');
        </script>
</body>

</html>