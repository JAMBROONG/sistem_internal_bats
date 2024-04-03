<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Sub Step</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed">
    <div class="wrapper shadow">
        <?php include 'template/v_navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataWorkflow') ?>">Service</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/workflow/' . $service['id']) ?>"><?= $service['service_name'] ?></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Sub Step &nbsp
                                    <b><?= $step['step'] ?></b>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container"> <?php
                                        if (empty($step)) {
                                            $service['service_name'] = "selected";
                                        ?> <div class="card shadow-none">
                            <div class="card-body text-center">
                                <h1 class="display-4 ">Sorry!</h1>
                                <p class="lead ">Sub Step for <strong><?= $service['service_name'] ?></strong> not yet</p>
                            </div>
                            <div class="card-footer bg-white">
                                <a href="<?= base_url('SuperAdmin/workflow/' . $service['id']) ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                        </div> <?php
                                            return false;
                                        }
                                        if ($validate == false) {

                                            include 'script.php';
                                ?> <div class="card shadow-none">
                            <div class="card-body text-center">
                                <h1 class="display-4 ">Sorry!</h1>
                                <p class="lead ">Sub Step for <strong><?= $step['step'] ?></strong> not yet</p>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-excel" type="button"><i class="fa fa-file-excel pr-1"></i>Import Excel</button>
                            </div>
                            <div class="modal fade" id="modal-excel">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">

                                        <form action="<?= site_url('superAdmin/excel-sub-step/' . $step['id']) ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <div class="modal-title">Upload Excel File <strong class="text-danger"><?= $step['step'] ?></strong></div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex justify-content-between">

                                                    <div class="label text-dark">Upload file</div>
                                                    <a href="<?= base_url() ?>assets/upload/excel/template/template_sub_step.xlsx" download=""><i class="fa fa-download" aria-hidden="true"></i>template</a>
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
                                <a href="<?= base_url('SuperAdmin/workflow/' . $service['id']) ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= site_url('superAdmin/processCreateSubStep') ?>" method="post">
                                        <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Sub-Step Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><?php
                                            return false;
                                        }
                                ?>
                </div>
                <div class="container"> <?php
                                        if (empty($subStep)) {
                                        ?> <div class="jumbotron">
                            <h1 class="display-4">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                            <p class="lead">Your data is not yet available</p>
                            <hr class="my-4">
                            <a href="<?= base_url('SuperAdmin/workflow/' . $service['id']) ?>" class="btn btn-danger"><i class="fa fa-arrow-left mr-1"></i> Back</a>
                        </div> <?php
                                            return false;
                                        }
                                ?> <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                </div>
                                <div class="">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add
                                        data</button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-excel" type="button"><i class="fa fa-file-excel pr-1"></i>Import Excel</button>
                                    <button class="btn btn-success btn-sm" onclick="exportToExcel()"><i class="fa fa-file-excel pr-1"></i> Export</button>
                                </div>

                                <div class="modal fade" id="modal-excel">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">

                                            <form action="<?= site_url('superAdmin/excel-sub-step/' . $step['id']) ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-header">
                                                    <div class="modal-title">Upload Excel File <strong class="text-danger"><?= $step['step'] ?></strong></div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="label text-dark">Upload file</div>
                                                        <a href="<?= base_url() ?>assets/upload/excel/template/template_sub_step.xlsx" download=""><i class="fa fa-download" aria-hidden="true"></i>template</a>
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
                                                    <button type="submit" class="btn btn-primary">Upload
                                                        Excel</button>
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
                            <form action="<?= base_url('SuperAdmin/deleteSelectedSubStep/' . $step['id']) ?>" method="post" id="formDeleteSelect">
                                <button class="btn btn-primary mb-3" type="button" onclick="selectAll()" id="checkboxAllButton"> Select All
                                </button>

                                <button class="btn btn-danger mb-3" form="formDeleteSelect">Delete selected</button>
                                <table id="example1" class="table table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Select</th>
                                            <th>No.</th>
                                            <th>Sub Step</th>
                                            <th>Update Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($subStep as $row) {
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
                                                <td scope="row" class="text-center"><?= $no ?></td>
                                                <td><?= $row['subStep'] ?></td>
                                                <td><?= $row['update_date'] ?></td>
                                                <td class=" d-flex justify-content-between">
                                                    <span class="info-box-number d-flex justify-content-end"><small><a type="button" data-toggle="modal" data-target="#modal-delete<?= $row['id'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></small>
                                                        <small><a href="#" class="ml-2 btn btn-sm btn-primary update-modal" data-id="<?= $row['id'] ?>" data-substep="<?= $row['subStep'] ?>" data-stepid="<?= $row['step_id'] ?>" data-toggle="modal" data-target="#modal-update">
                                                                <i class="fa fa-eye"></i>
                                                            </a></small>

                                                </td>
                                            </tr>

                                            <div class="modal fade" id="modal-delete<?= $row['id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Are you sure delete this sub step?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-dark">Sub Step:<br><?= $row['subStep'] ?></p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('SuperAdmin/deleteSubStep/' . $row['id'] . '/' . $step['id']) ?>" class="btn btn-sm btn-danger">Yes delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="modal fade " id="modal-update<?= $row['id'] ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Activities</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= site_url('SuperAdmin/updateSubStep') ?>"
                                                            method="post" id="form<?= $row['id'] ?>">
                                                            <div class="form-group">
                                                                <label for="">Activities</label>
                                                                <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                <input type="hidden" name="subStep_id"
                                                                    value="<?= $row['id'] ?>">
                                                                <input type="hidden" name="step_id"
                                                                    value="<?= $row['step_id'] ?>">
                                                            </div>
                                                            <button class="btn btn-success btn-sm" type="submit"
                                                                form="form<?= $row['id'] ?>"><i
                                                                    class="fa fa-save mr-1"></i>save</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <table id="exportTable" class="d-none ">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Sub Step</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($subStep as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $row['subStep'] ?></td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="<?= site_url('superAdmin/processCreateSubStep') ?>" method="post">
                                    <div class="modal-header">
                                        <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                                        <h4 class="modal-title">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Sub-Step Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
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
        <!-- Modal Update Activities -->
        <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="modal-update-label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Activities</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm" action="<?= site_url('SuperAdmin/updateSubStep') ?>" method="post">
                            <div class="form-group">
                                <label for="updateActivities">Activities</label>
                                <textarea name="subStep" class="form-control" id="updateActivities" cols="30" rows="10"></textarea>
                                <input type="hidden" name="subStep_id" id="subStepId">
                                <input type="hidden" name="step_id" id="stepId">
                            </div>
                            <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <?php include 'footer.php'; ?>

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

                const filename = 'sub_step_<?= $step['step'] ?>.xlsx';

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