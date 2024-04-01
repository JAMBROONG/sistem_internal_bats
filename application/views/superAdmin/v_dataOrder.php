<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <?php include 'header.php'; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include 'template/v_navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="card-title"><a href="<?php echo base_url('superAdmin/addOrder'); ?>"
                                                class="btn btn-sm btn-success"><i class="fa fa-plus"></i> add data </a>
                                        </div>
                                        <div class="card-title"><strong class="text-warning">ON PROGRESS <i
                                                    class="fa fa-spinner"></i></strong></div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                                <div class="col-sm-12 table-responsive">
                                                    <table id="example1"
                                                        class="table border-0 table-striped dataTable dtr-inline text-sm"
                                                        role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>No.</th>
                                                                <th>Name</th>
                                                                <th>Service</th>
                                                                <th>Description</th>
                                                                <th>Partner</th>
                                                                <th>Book Year</th>
                                                                <th>Work Year</th>
                                                                <th>Due Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            if (empty($orderOn)) {
                                                               ?>
                                                            <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1"
                                                                    tabindex="0"colspan="6">
                                                                    <h5 class="text-center">Data not yet</h5>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            else{
                                                            foreach ($orderOn as $row) {
                                                        ?>
                                                            <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0">
                                                                    <?= $no ?></td>
                                                                <td><?= $row['name'] ?></td>
                                                                <td><?= $row['service_name'] ?></td>
                                                                <td><?= $row['description'] ?></td>
                                                                <td><?= $row['employee_name'] ?></td>
                                                                <td><?= $row['message'] ?></td>
                                                                <td><?= date('d M Y', strtotime($row['create_date'])) ?>
                                                                </td>
                                                                <?php
                                                                $due_date = strtotime($row['due_date']);
                                                                $current_date = time();
                                                                $days_difference = floor(($due_date - $current_date) / (60 * 60 * 24));
                                                                
                                                                if ($days_difference < 0) {
                                                                    // Tampilkan jumlah hari yang terlewat dengan latar belakang danger
                                                                    echo '<td>' . date('d M Y', strtotime($row['due_date'])) . '<br> <small class="bg-danger text-white">' . abs($days_difference) . ' days overdue </small></td>';
                                                                } elseif ($days_difference <= 14) {
                                                                    // Tampilkan jumlah hari dalam bentuk teks dengan latar belakang warning
                                                                    echo '<td>'.date('d M Y', strtotime($row['due_date'])).' <br> <small  class="bg-warning" >' . $days_difference . ' days left</small></td>';
                                                                } else {
                                                                    // Tampilkan jumlah hari dalam bentuk teks biasa jika tidak memenuhi kondisi di atas
                                                                    echo '<td>' . date('d M Y', $due_date) . '</td>';
                                                                }
                                                                ?>

                                                                <td>
                                                                    <a href="<?= base_url('superAdmin/detailOrder/' . $row['id']) ?>"
                                                                        class="btn-sm btn btn-success d-flex align-items-center text-nowrap mb-1">
                                                                        <i class="fa fa-book-open mr-2"></i>update
                                                                        order</a>
                                                                    <a href="<?= base_url('superAdmin/progressOrder/' . $row['id']) ?>"
                                                                        class="btn btn-sm btn-primary d-flex align-items-center text-nowrap mb-1"><i
                                                                            class="fa fa-project-diagram mr-2"></i>update
                                                                        progress</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $no++;
                                                            }
                                                            }
                                                        ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-end">
                                        <h3 class="card-title"><strong class="text-success">DONE <i
                                                    class="fa fa-check-circle"></i></strong></h3>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12 table-responsive">
                                                    <table id="example2"
                                                        class="table border-0 table-striped dataTable dtr-inline text-sm"
                                                        role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">

                                                                <th>No.</th>
                                                                <th>Name</th>
                                                                <th>Service</th>
                                                                <th>Description</th>
                                                                <th>Partner</th>
                                                                <th>Book Year</th>
                                                                <th>Work Year</th>
                                                                <th>Due Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            if (empty($orderOff)) {
                                                               ?>
                                                            <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1"
                                                                    tabindex="0"colspan="9">
                                                                    <h5 class="text-center">Data not yet</h5>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                            else{
                                                            foreach ($orderOff as $row) {
                                                        ?>
                                                            <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1" tabindex="0">
                                                                    <?= $no ?></td>
                                                                <td><?= $row['name'] ?></td>
                                                                <td><?= $row['service_name'] ?></td>
                                                                <td><?= $row['description'] ?></td>
                                                                <td><?= $row['employee_name'] ?></td>
                                                                <td><?= $row['message'] ?></td>
                                                                <td><?= date('F Y', strtotime($row['create_date'])) ?>
                                                                </td>
                                                                <td><?= date('F Y', strtotime($row['due_date'])) ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="<?= base_url('superAdmin/detailOrderDone/' . $row['id']) ?>"
                                                                            class="btn btn-sm btn-success"><i
                                                                                class="fa fa-book-open mr-2"></i>
                                                                            detail</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $no++;
                                                            }
                                                            }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
</body>

</html>
