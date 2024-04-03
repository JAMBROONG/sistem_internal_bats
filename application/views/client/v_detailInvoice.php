<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Invoice</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php';
  ?>

    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition">
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
                                <li class="breadcrumb-item"><a href="<?=base_url('Client/invoice')?>">Invoices</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="card card-dark">
                        <div class="card-header">
                            <h5 class="card-title">From Admin</h5>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Hardfile</th>
                                        <th>Filename</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                          $no = 1;
                          foreach ($dataInvoice as $key) {
                              ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td>
                                            <?php 
                                             if ($key['sent_hardfile'] == "no") {
                                                echo'not yet sent';
                                            } else if ($key['sent_hardfile'] == "yes" && $key['status'] == "do" ) {
                                                if ($key['receive_hardfile'] == "no") {
                                                    echo 'sent <small class="text-primary"> ('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                                    ?>
                                            <a href="<?=base_url('Client/updateStatusInvoice/'.$key['id'])?>" class="btn btn-sm btn-success ml-2">mark receive</a>
                                            <?php
                                                } elseif ($key['receive_hardfile'] == "yes") {
                                                        echo 'accepted <small class="text-primary"> ('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                                        ?>
                                            <a href="<?= base_url('Client/updateStatusInvoice/'.$key['id'])?>" class="btn btn-sm btn-danger ml-2">mark not receive</a>
                                            <?php
                                                }
                                            } else{
                                                echo 'accepted <small class="text-primary"> ('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                            }
                                    ?>
                                        </td>
                                        <td>
                                            <p><?=$key['filename']?></p>
                                        </td>
                                        <td><?=$key['message']?></td>
                                        <td>
                                            <?php 
                                            if ($key['sent_hardfile'] == "no") {
                                                echo '<p class="text-warning">not fixed</p>';
                                            } else if ($key['receive_hardfile'] == "yes"){
                                                if ($key['status'] == "do") {
                                                    echo '<p class="text-warning">not fixed</p>';
                                                    ?>
                                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-approved<?=$key['id']?>">approved</button>
                                            <?php
                                                } else{
                                                    echo '<p class="text-success">fixed <i class="fa fa-check"></i></p>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($key['softfile'] != "") { ?>
                                            <a class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#modal-download<?=$key['id']?>"><i class="fa fa-download"></i></a>
                                            <?php
                                                } else{?>
                                            <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <div class="modal fade " id="modal-download<?=$key['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Explanation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">The file will be deleted automatically if it is downloaded, are you sure you want to download it now?</p>
                                                    <button class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> cancel</button>
                                                    <a href="<?= base_url();?>assets/upload/invoice/<?=$key['softfile']?>" download class="btn btn-sm btn-success mr-2" id="click<?=$key['id']?>"><i class="fa fa-save mr-2"></i>yes download</a>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById("click<?=$key['id']?>").onclick = function() {
                                            window.location.href = "<?= base_url('Client/deleteInvoiceOnly/'.$key['id']).'/'.$order_id?>";
                                        }
                                    </script>
                                    <div class="modal fade " id="modal-approved<?=$key['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Explanation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">You hereby approve the files you receive.</p>
                                                    <a href="<?= base_url('Client/turnFixInvoice/'.$key['id']);?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-save mr-2"></i>approved</a>
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
                        </div>
                    </div>
                    <div class="card card-dark">
                        <div class="card-header">
                            <h5 class="card-title">From Me</h5>
                        </div>
                        <div class="card-body  table-responsive">

                            <h3>upload proof of payment</h3>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#modal-addData"><i class="fa fa-plus"></i> add data</button>
                            </div>
                            <table id="table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Filename</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                          $no = 1;
                          foreach ($dataFile as $key) {
                              ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td>
                                            <p><?=$key['filename']?></p>
                                        </td>
                                        <td><?=$key['message']?></td>
                                        <td>
                                            <?php
                                            echo '<small class="text-primary">'. date("F j, Y H:i a", strtotime($key['create_date'])).'</small>';
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($key['softfile'] != "") { ?>
                                            <a class="btn btn-sm btn-primary mr-2" href="<?= base_url();?>assets/upload/doc/<?=$key['softfile']?>" download><i class="fa fa-download"></i></a>
                                            <?php
                                                } else{?>
                                            <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <div class="modal fade " id="modal-approved<?=$key['id']?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Explanation</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-danger">You hereby approve the files you receive.</p>
                                                    <a href="<?= base_url('Client/turnFixInvoice/'.$key['id']);?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-save mr-2"></i>approved</a>
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
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
        <div class="modal fade " id="modal-noDownload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center text-danger">
                        <p>The data has been downloaded</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-dark" id="modal-addData">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Upload File</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Client/processCreatePayment') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Filename</label>
                                <input type="text" name="filename" id="" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Message to this report</label>
                                <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="message.." required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="file" id="file2" required>
                                <input type="hidden" name="order_id" value="<?=$order_id?>" class="file" id="file2" required>
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
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                            <button class="btn btn-sm btn-success" type="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
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
            $(function() {
                $("#table").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
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
            $('#nav_invoice').addClass('nav_select')
        </script>
</body>

</html>