<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report </title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php 
    include 'header.php';
    $doReport = [];
foreach ($report as $row) {
    array_push($doReport,$row['order_step_id']);
}
  ?>
    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header bg-info border-0">
                            <h3 class="card-title">Report this service</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Activities</th>
                                        <th>Message</th>
                                        <th>Review by Supervisor</th>
                                        <th>Review by Ceo</th>
                                        <th>Review by Client</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                            ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$row['subStep']?></td>
                                        <td><?=$row['message']?></td>
                                        <td>
                                            <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($row['review_ceo'] == 'do') {
                                                    echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                } else{
                                                    echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                }
                                                ?>
                                        </td>
                                        <td>
                                            <?php
                                                if ($row['review_status'] == 'do') {
                                                    echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                } else{
                                                    echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                }
                                                ?>
                                        </td>
                                        <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                        <td>
                                            <div class="d-flex justify-content-around">
                                                <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"></i></a>
                                                <?php
                                                    if ($dataOrder['statusOrder_id'] == 1) {
                                                        if ($row['review_status'] == 'done' && $row['review_ceo'] == 'done' && $row['review_supervisor'] == 'done') {
                                                            ?>
                                                <button class="btn btn-sm btn-success" disabled>fixed <i class="fa fa-check"></i></button>
                                                <?php
                                                        } else{
                                                        ?>
                                                <a href="<?= base_url('Employee/updateReport/'.$row['id']) ?>" class="btn btn-sm btn-success ml-1 mr-1">update</a>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-report<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                                <?php
                                                        }
                                                    }
                                                    ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- modal for delete report -->
                                    <div class="modal fade " id="modal-delete-report<?=$row['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-danger">Are you sure delete this report?</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-dark">Sub Step: <br><strong><?= $row['subStep'] ?></strong> </p>
                                                    <p class="text-dark">Message: <br><strong><?= $row['message'] ?> </strong> </p>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('Employee/deleteReport/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal --> <?php
                                            $no++;
                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Create Report & Timeline Review</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?= site_url('Employee/processCreateReport') ?>" method="post" class="row" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <h5 class="text-center">To Report</h5>
                                        <div class="form-group">
                                            <label>Select Process</label>
                                            <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                            <select class="form-control select2" name="process_id" style="width: 100%;" required> <?php
                                                        foreach ($dataProcessDone as $row) {
                                                            if (in_array($row['order_step_id'],$doReport)) {
                                                                continue;
                                                            }
                                                            echo '<option value="'.$row['id'].'">'.$row['subStep'].'</option>';
                                                        }
                                                        ?> </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Message to this report</label>
                                            <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="message.." required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="image" class="file" id="file2" required>
                                            <label for="">Upload File <small>(max. size 2Mb)</small></label>
                                            <p>Format: <small class=" text-danger">pdf / jpg / png / jpeg / xlsx / doc / odt</small></p>
                                            <div class="input-group">
                                                <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file" required>
                                                <div class="input-group-append">
                                                    <button type="button" id="pilih_gambar" class="browse btn btn-dark">Select File</button>
                                                </div>
                                            </div>
                                            <p id="message" class=" text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h5 class="text-center">To Review</h5>
                                        <div class="form-group">
                                            <label>Ending Date</label>
                                            <input type="date" name="ending_date" class="form-control" id="" required>
                                        </div>
                                        <a href="<?=base_url('Employee/report') ?>" class="btn btn-danger  btn-sm"><i class="fa fa-arrow-left pr-1"></i> back</a>
                                        <?php
                                                if ($dataOrder['statusOrder_id'] == 1) {
                                                        ?>
                                        <button type="submit" class="btn btn-sm pl-1 pr-1 btn-success" name="submit"><i class="fa fa-save pr-1"></i> save</button><?php
                                                    }
                                                    ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php include 'footer.php' ?>
        <script>
            $(function() {
                $('.select2').select2()
            });
            
            function getExtension(filename) {
                var parts = filename.split('.');
                return parts[parts.length - 1];
            }

            function bytesToSize(bytes) {
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
                if (bytes === 0) return 'n/a'
                const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)), 10)
                if (i === 0) return `${bytes} ${sizes[i]})`
                return `${(bytes / (1024 ** i)).toFixed(1)} ${sizes[i]}`
            }
            document.forms[0].addEventListener('submit', function(evt) {
                var file = document.getElementById('file2').files[0];
                var msg = document.getElementById('message');
                if (file && file.size < 2485760) {
                    var ext = getExtension(file.name);
                    switch (ext.toLowerCase()) {
                        case 'jpg':
                        case 'pdf':
                        case 'jpeg':
                        case 'png':
                        case 'xlsx':
                        case 'doc':
                        case 'odt':
                            return true;
                    }
                    msg.innerHTML = "*format not met, your current format: " + ext;
                    evt.preventDefault();
                } else {
                    msg.innerHTML = "*file size exceeds the limit, your current size: " + bytesToSize(file.size);
                    evt.preventDefault();
                }
            }, false);
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