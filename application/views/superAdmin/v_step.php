<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Step</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include 'template/v_navbar.php'; ?>
        <?php
        if (empty($service)) {
            redirect('SuperAdmin/lock');
        }
        ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataWorkflow') ?>">Service</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Step &nbsp;
                                    <b><?= $service['service_name'] ?></b>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <?php
                    if ($validate == false) {
                    ?>
                        <div class="card shadow-none">
                            <div class="card-body text-center">
                                <h1 class="display-4 ">Sorry!</h1>
                                <p class="lead ">Step for <strong><?= $service['service_name'] ?></strong> not yet</p>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>Add Manual</button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-excel" type="button"><i class="fa fa-file-excel pr-1"></i>Import Excel</button>
                               
                            </div>

                            <div class="modal fade" id="modal-excel">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">

                                        <form action="<?= site_url('superAdmin/excel-step/' . $service['id']) ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <div class="modal-title">Upload Excel File <strong class="text-danger"><?= $service['service_name'] ?></strong></div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-between">

                                                    <div class="label text-dark">Upload file</div>
                                                    <a href="<?= base_url() ?>assets/upload/excel/template/template_step.xlsx" download=""><i class="fa fa-download" aria-hidden="true"></i>template</a>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="excel_file" accept=".xls, .xlsx" required>
                                                        <label class="custom-file-label text-nowrap" for="inputGroupFile01">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Upload Excel</button>
                                            </div>
                                        </form>

                                        <script>
                                            // Update the label text with the selected file name
                                            document.querySelector('.custom-file-input').addEventListener('change', function(e) {
                                                var fileName = e.target.files[0].name;
                                                var label = document.querySelector('.custom-file-label');
                                                label.textContent = fileName;
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?php echo base_url('superAdmin/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= site_url('superAdmin/processCreateStep/' . $service['id']) ?>" method="post">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create step to <strong class="text-danger"><?= $service['service_name'] ?></strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Step Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description for Step</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </section>
        </div>
    <?php
                        include 'footer.php';
                        return false;
                    }
    ?>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h5 class="card-title">Select a step to view the sub-steps.</h5>
                    </div>
                    <div class="">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-excel" type="button"><i class="fa fa-file-excel pr-1"></i>Import Excel</button>
                        <button class="btn btn-success btn-sm" onclick="exportToExcel()"><i class="fa fa-file-excel pr-1"></i> Export</button>
                    </div>

                    <div class="modal fade" id="modal-excel">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">

                                <form action="<?= site_url('superAdmin/excel-step/' . $service['id']) ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <div class="modal-title">Upload Excel File <strong class="text-danger"><?= $service['service_name'] ?></strong></div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-between">

                                            <div class="label text-dark">Upload file</div>
                                            <a href="<?= base_url() ?>assets/upload/excel/template/template_step.xlsx" download=""><i class="fa fa-download" aria-hidden="true"></i>template</a>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="excel_file" accept=".xls, .xlsx" required>
                                                <label class="custom-file-label text-nowrap" for="inputGroupFile01">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload Excel</button>
                                    </div>
                                </form>

                                <script>
                                    // Update the label text with the selected file name
                                    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
                                        var fileName = e.target.files[0].name;
                                        var label = document.querySelector('.custom-file-label');
                                        label.textContent = fileName;
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <form action="<?= base_url('SuperAdmin/deleteSelectedStep/' . $service['id']) ?>" method="post" id="formDeleteSelect">
                    <button class="btn btn-primary mb-3" type="button" onclick="selectAll()" id="checkboxAllButton"> Select All
                    </button>
                    <button class="btn btn-danger mb-3" form="formDeleteSelect">Delete selected</button>
                    <table id="example1" class="table table-striped table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Select</th>
                                <th>No.</th>
                                <th>Step</th>
                                <th>Description</th>
                                <th class="exclude-export">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($selected as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" name="itemsDelete[]" value="<?= $row['id'] ?>" aria-label="Radio button for following text input">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row"><?= $no ?></td>
                                    <td><?= $row['step'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td class=" d-flex justify-content-between exclude-export">
                                        <a type="button" data-toggle="modal" data-target="#modal-delete<?= $row['id'] ?>" class="btn btn-sm btn-danger mr-1"><i class="fa fa-trash"></i></a>
                                        <a type="button" data-toggle="modal" data-target="#modal-update<?= $row['id'] ?>" class=" btn btn-sm btn-primary mr-1"><i class="fa fa-pen"></i></a>
                                        <a href="<?= base_url('SuperAdmin/detailStep/' . $row['id']) ?>" class="btn btn-success btn-sm mr-1">detail</a>
                                        <?php
                                        if ($row['drive'] == 'not avaliable') {
                                        ?>
                                            <a type="button" class="btn btn-sm bg-secondary disabled"><i class="fab fa-google-drive"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a type="button" class="btn btn-sm bg-warning" href="<?= $row['drive'] ?>" target="blank"><i class="fab fa-google-drive"></i></a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-delete<?= $row['id'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure delete this step?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-dark"> Step:<br><?= $row['step'] ?></p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('SuperAdmin/deleteStep/' . $row['id'] . '/' . $service['id']) ?>" class="btn btn-sm btn-danger">Yes delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modal-update<?= $row['id'] ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure delete this step?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('SuperAdmin/updateDataStep') ?>" method="post">
                                                    <div class="form-group">
                                                        <label for="my-input">Step</label>
                                                        <input id="my-input" class="form-control" type="text" name="step" value="<?= $row['step'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="my-input">Drive</label>
                                                        <input id="my-input" class="form-control" type="text" name="drive" value="<?= $row['drive'] ?>">
                                                        <input id="my-input" class="form-control" type="hidden" name="id" value="<?= $row['id'] ?>">
                                                        <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?= $row['service_id'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="my-input">Description</label>
                                                        <textarea name="description" id="" class="form-control" cols="30" rows="10"><?= $row['description'] ?></textarea>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
                <table id="exportTable" class="d-none ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Step</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($selected as $row) {
                        ?>
                            <tr>
                                <td><?= $row['step'] ?></td>
                                <td><?= $row['description'] ?></td>
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
    </div>

    <?php include 'footer.php'; ?>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?= site_url('SuperAdmin/processCreateStep/' . $service['id']) ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Create step to <strong class="text-danger"><?= $service['service_name'] ?></strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="textarea" name="description" rows="3" placeholder="Enter ..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Drive (opsional) </label>
                            <input type="text" name="drive" placeholder="drive.google/" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cl ose</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saver"></script>
    <script>
        function exportToExcel() {
            const table = document.getElementById('exportTable');
            const sheetName = 'Daily Report';

            const wb = XLSX.utils.table_to_book(table, {
                sheet: sheetName
            });


            const wbout = XLSX.write(wb, {
                bookType: 'xlsx',
                type: 'array'
            });

            const filename = 'sub_step_<?= $service['service_name'] ?>.xlsx';

            saveAs(new Blob([wbout], {
                type: 'application/octet-stream'
            }), filename);
        }

        function selectAll() {
            $('table tbody tr').each(function() {
                var checkbox = $(this).find('input[type="checkbox"]');
                checkbox.prop('checked', !checkbox.prop('checked'));
            });
        }
        $(document).ready(function() {
            // Saat tombol 'update-modal' diklik, isi data modal dan tampilkan modal
            $('.update-modal').on('click', function() {
                var subStepId = $(this).data('id');
                var subStepText = $(this).data('substep');
                var stepId = $(this).data('stepid');

                $('#subStepId').val(subStepId);
                $('#updateActivities').val(subStepText);
                $('#stepId').val(stepId);
            });
        });
    </script>

</body>

</html>