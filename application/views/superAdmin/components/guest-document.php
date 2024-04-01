<!doctype html>
<html lang="en">

<head>
    <title>Tax Health Check</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <style>
        button.btn.btn-secondary {
            background-color: #17a2b8 !important;
            border: 0;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card shadow-none border-0">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12">
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="<?php echo base_url(); ?>assets/upload/images/client/<?=$client['image_user']?>" alt="user image">
                                    <span class="username">
                                        <a href="#"><?=$client['name']?></a>
                                    </span>
                                    <span class="description">Registered on -
                                        <?= ($client['create_date'] == date('Y-m-d')) ? "today" : date('F j, Y', strtotime($client['create_date']))?></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-muted">
                                            <p class="text-sm">Client Company
                                                <b class="d-block"><?= $client['company'] ?></b>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="text-muted">
                                            <p class="text-sm">Position
                                                <b class="d-block"><?= $client['position'] ?></b>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="text-muted">
                                            <p class="text-sm">Phone
                                                <b class="d-block"><?= $client['phone'] ?></b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <a href="<?=base_url('SuperAdmin/guestTHC')?>" class="link-black text-danger text-sm ml-3">
                                        <i class="fas fa-arrow-left mr-1"></i>
                                        back</a>
                                    <a type="button" data-toggle="modal" data-target="#my-modal" class="link-black text-success text-sm ml-3">
                                        <i class="fas fa-cog mr-1"></i>
                                        update status</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="<?=base_url('SuperAdmin/updateStatusThc')?>" method="post">
                                    <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                    <div class="form-group">
                                        <label for="password">Update status</label>
                                        <select name="status" class="form-control" id="">
                                            <option value="<?= $thc_guest_status['thc_status_id'] ?>"><?= $thc_guest_status['status'] ?></option>
                                            <?php
                                        foreach ($thc_status as $key) {
                                        if($key['id'] == $thc_guest_status['thc_status_id']){
                                            continue;
                                        };
                                        ?>
                                            <option value="<?= $key['id'] ?>"><?= $key['status'] ?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h5>Tahap :
                        <small class="<?= $thc_guest_status['text-color'] ?>"><?= $thc_guest_status['status'] ?></small>
                    </h5>
                    <p class="text-muted"><?= $thc_guest_status['description'] ?></p>
                    <h5 class="mt-5 text-muted">Project files</h5>
                    <ul class="list-unstyled">
                        <?php
                    if ($thc_guest['lk_audited'] != "") {
                    ?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['lk_audited']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Laporan Keuangan Audited</a>
                        </li>
                        <?php
                    } if ($thc_guest['gl'] != "") {
                    ?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['gl']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                Buku Besar</a>
                        </li>
                        <?php
                    } if ($thc_guest['spt_masa_ppn'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_masa_ppn']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Masa PPN</a>
                        </li>
                        <?php
                    } if ($thc_guest['spt_masa_pph'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_masa_pph']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Masa PPh</a>
                        </li>
                        <?php
                    }
                    if ($thc_guest['spt_tahunan'] != "") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['spt_tahunan']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                SPT Tahunan PPh Badan</a>
                        </li>
                        <?php
                    }if ($thc_guest['tipidok'] != "not yet") {?>
                        <li>
                            <a href="<?= base_url(); ?>assets/upload/thc/<?=$thc_guest['tipidok']?>" download class="btn-link text-secondary">
                                <i class="far fa-fw fa-file-pdf"></i>
                                PT Doc</a>
                        </li>
                        <?php
                    }
                    ?>
                        <li>
                            <a class="btn-link text-secondary">
                                Tahun Pajak <b><?= $thc_guest['tahunan_check'] ?></b></a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        Tabs Content
                    </h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-content-above-nda-tab" data-toggle="pill" href="#custom-content-above-nda" role="tab" aria-controls="custom-content-above-nda" aria-selected="true">NDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-home-tab" data-toggle="pill" href="#custom-content-above-home" role="tab" aria-controls="custom-content-above-home" aria-selected="true">Q & A</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-profile-tab" data-toggle="pill" href="#custom-content-above-profile" role="tab" aria-controls="custom-content-above-profile" aria-selected="false">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-content-above-meeting-tab" data-toggle="pill" href="#custom-content-above-meeting" role="tab" aria-controls="custom-content-above-meeting" aria-selected="false">Meeting</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="custom-content-above-tabContent">
                        <div class="tab-pane fade active show" id="custom-content-above-nda" role="tabpanel" aria-labelledby="custom-content-above-nda-tab">
                            <p class="lead mb-2 mt-3">Table NDA</p>
                            <table  class="table table-striped mt-5 table-light table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">NDA</th>
                                        <th class="text-center">Upload date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($thc_nda as $key) {
                                        ?>
                                    <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><a href="<?=base_url()?>assets/upload/nda/<?= $key['nda'] ?>" download=""><?= $key['nda'] ?></a></td>
                                    <td><?= $key['upload_date'] ?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-home" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
                            <p class="lead mb-2 mt-3">Table Question and Answer</p>
                            <table id="example1" class="table table-striped mt-5 table-light table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Question</th>
                                        <th class="text-center">Answer</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">File</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($thc_guest_answer as $key) {
                                        if ($key['status'] == "false") {
                                            echo '<tr style="background-color:#F48B8B">';
                                        } else{
                                            echo '<tr>';
                                        }
                                        ?>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $key['question'] ?></td>
                                    <td><?= $key['answer_guest'] ?></td>
                                    <td><?= $key['description'] ?></td>
                                    <td class="text-center"><?= ($key['files_guest'] != "file tidak ada") ? '<a href="'.base_url('').'assets/upload/question/'.$key['files_guest'].'">'.$key['files_guest'].'</a>': '<small><i>no file</i></small>'  ?></td>
                                    <td class="text-center"><?= ($key['status'] == "true") ? '<small class="text-success">true</small>' : '<small class="text-white">false</small>' ?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-profile" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
                            <div class="d-flex justify-content-between mt-2">
                                <p class="lead mb-2 mt-2">Table Report Tax Health Check</p>
                                <button class="btn btn-success btn-small mb-2"  data-toggle="modal" data-target="#addFiles"><i class="fa fa-plus mr-2"></i>add report</button>
                            </div>
                            <table id="example2" class="table table-striped mt-5 table-light table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Files</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $no = 1;
                                    foreach ($thc_report as $key) {
                                        ?>
                                    <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $key['title'] ?></td>
                                    <td>  <a href="<?=base_url()?>assets/upload/thc/report/<?= $key['report'] ?>" download="download"><i class="fa fa-download mr-2"></i>download</a></td>
                                    <td><?= $key['description'] ?></td>
                                    <td>action</td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="custom-content-above-meeting" role="tabpanel" aria-labelledby="custom-content-above-meeting-tab">
                            <div class="d-flex justify-content-between mt-2">
                            <p class="lead mb-2 mt-2 text-center">Table Schedule Meeting</p>
                                <button class="btn btn-success btn-sm mb-2" type="button" data-toggle="modal" data-target="#addMeeting"><i class="fa fa-plus mr-2"></i>add meeting</button>
                            </div>
                            <table id="example2" class="table table-striped mt-5 table-light table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Meet</th>
                                        <th class="text-center">Link/Address</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                    $no = 1;
                                    foreach ($thc_meeting as $key) {
                                        ?>
                                    <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td><?= $key['title'] ?></td>
                                    <td><?= $key['description'] ?></td>
                                    <td><?= $key['meet'] ?></td>
                                    <td><?= $key['link'] ?></td>
                                    <td><?= date('l, j F Y G:i a') ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">update</button>
                                        <button class="btn btn-sm btn-danger">delete</button>
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
        </div>
    </div>
    <div id="addMeeting" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="jumbotron">
                        <h1 class="display-6">Schedule meeting for <?= $client['name'] ?></h1>
                        <hr class="my-4">
                    </div>
                    <form action="<?=base_url('SuperAdmin/addMeetingThc')?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="hidden" name="guest_id" value="<?= $client['id'] ?>">
                                    <input id="title" class="form-control" type="text" placeholder=".." name="title">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="" cols="30" rows="5" placeholder=".." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="title">Meet</label>
                                            <select name="meet" id="meet" onchange="onklik()" class="form-control">
                                                <option value="offline">Offline</option>
                                                <option value="online">Online</option>
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <label for="date">Date and Time</label>
                                            <input type="datetime-local" name="date" class="form-control">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-group" id="link" style="display: none;">
                                    <label for="link">Link</label>
                                    <input id="link" class="form-control" type="text" placeholder="https://.." name="link">
                                </div>
                                <div class="form-group" id="location">
                                    <label for="location">Location</label>
                                    <textarea name="location" id="" cols="30" rows="5" class="form-control" placeholder="jl.."></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i>save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="addFiles" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="<?=base_url('SuperAdmin/addReportThc')?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="guest_id" value="<?= $client['id'] ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" class="form-control" type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" class="file" id="file2" required>
                            <label for="">Upload File <small>(max. size 10Mb)</small></label>
                            <p>Format: <small class=" text-danger">pdf / jpg / png / jpeg / xlsx / doc / odt</small></p>
                            <div class="input-group">
                                <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file" required>
                                <div class="input-group-append">
                                    <button type="button" id="pilih_gambar" class="browse btn btn-info">Select File</button>
                                </div>
                            </div>
                            <p id="message" class=" text-danger"></p>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
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
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <script>
        function onklik() {
            if (document.getElementById("meet").value == "offline") {
                document.getElementById("location").style.display = "block";
                document.getElementById("link").style.display = "none";
            } else {
                document.getElementById("location").style.display = "none";
                document.getElementById("link").style.display = "block";
            }
        }
        $(function() {
            $("#example1")
                .DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "paging": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                })
                .buttons()
                .container()
                .appendTo('#example1_wrapper .col-md-6:eq(0)');
          
        });
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
                if (file && file.size < 10485760) {
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