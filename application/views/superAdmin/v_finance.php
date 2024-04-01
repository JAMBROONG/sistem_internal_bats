<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <?php $this->load->view('superAdmin/header'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
    <?php $this->load->view('superAdmin/template/v_navbar'); ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Finance</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card shadow-none">
                        <div class="card-header mb-3">
                            <div class="card-title">
                                Select Client
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table id="table-client" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Update Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                    $no = 1;
                                    foreach ($dataClient as $row) {
                                    ?> <tr role="row" class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                        <td><?= $row['name']?></td>
                                        <td><?= $row['company']?></td>
                                        <td><?= $row['email']?></td>
                                        <td><?= date("F j, Y, g:i a",strtotime($row['update_date'])); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a href="<?php echo base_url('superAdmin/finance_req/'.$row['id']); ?>" class="btn btn-sm btn-default text-primary d-flex align-items-center mr-1"><i class="fa fa-cogs mr-2"></i>manage</a>
                                                <!-- <a href="<?php echo base_url('superAdmin/finance_preview/'.$row['id']); ?>" target="blank" class="btn btn-sm text-warning btn-default d-flex align-items-center"><i class="fa fa-eye mr-2"></i>preview</a> -->
                                            </div>
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
                    <h4 class="p-3 text-center">Data Default</h4>
                    <?php
                        foreach ($type as $row) {
                            $data = [];
                            foreach ($spt as $key) {
                                if ($key['type_company_id'] == $row['id']) {
                                    array_push($data, $key['id']);
                                }
                            }
                            ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?= $row['type'] ?></div>
                                    <small class="text-primary ml-2"> (<?= count($data); ?>) data</small>
                                <div class="card-tools">
                                    <a href="<?=base_url('SuperAdmin/finance_default/'.$row['id'])?>" target="blank" class="btn btn-sm btn-default m-0"><i class="fa fa-edit mr-1"></i> Manage</a>
                                </div>
                            </div>
                        </div>
                            <?php
                            $data = [];
                        }
                        ?>
                </div>
            </section>
        </div>

        <?php $this->load->view('superAdmin/footer'); ?>

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
        <?php
        foreach ($type as $rows) {
            ?>
            <script>
            $(function() {
                $("#table<?=$rows['id']?>").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
            <?php
        }
        ?>
        <script>
            $('table').addClass('p-2 text-sm');
            $(function() {
                $("#table-client").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
</body>

</html>