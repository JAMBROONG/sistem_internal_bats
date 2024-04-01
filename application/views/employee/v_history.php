<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include 'header.php' ?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <section class="container-fluid">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="card-title">History Login</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Login Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Logout Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $no = 1;
                                    foreach ($history as $row) {
                                        ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $no ?></td>
                                            <td><?= date("l, d F Y H:i:s a", strtotime($row['login_date'])); ?></td>
                                            <td><?= date("l, d F Y H:i:s a", strtotime($row['logout_date']));  ?></td>
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
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="card-title">History Activites</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Action Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $no = 1;
                                    foreach ($action as $row) {
                                        ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $no ?></td>
                                            <td><?= $row['action'] ?></td>
                                            <td><?= date("l, d F Y H:i:s a", strtotime($row['update_date']));  ?></td>
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
                </section>
            </section>
        </div>
        <?php include 'footer.php' ?>
        <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $("#example2").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
</body>

</html>