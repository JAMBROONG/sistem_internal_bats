<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Training</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php';
  ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/training')?>">Training</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Content</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon text-danger bg-white">
                                PDF
                            </div>
                        </div>
                        <div class="card-header bg-orange">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContent"><i class="fa fa-plus mr-1"></i> Content</button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_pdf as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a type="button" class="btn btn-sm text-primary d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#modal-viewpdf<?=$row['id']?>"><i class="fa fa-eye mr-1"></i> view</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updatepdf<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deletepdf<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-deletepdf<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('SuperAdmin/delete_content/'.$row['id'].'/'.'pdf/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-updatepdf<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content PDF</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('SuperAdmin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="pdf">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url PDF</label>
                                                                <h5 class="text-sm">ex: <small>https://drive.google.com/file/d/1eT4AbPGVEnyq/</small><small class="text-danger">view?usp=sharing</small></h5>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-viewpdf<?=$row['id']?>">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?= $row['title'] ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe class="border-0 rounded" src="<?php echo str_replace("view?usp=sharing","preview",$row['content']); ?>" width="100%" height="450"></iframe>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-white">
                                POWER POINT
                            </div>
                        </div>
                        <div class="card-header bg-warning">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContentPPT"><i class="fa fa-plus mr-1"></i> Content </button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi2" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_ppt as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a target="blank" href="<?=$row['content']?>" class="btn btn-sm text-primary d-flex align-items-center justify-content-center"><i class="fa fa-eye mr-1"></i> view</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updateppt<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deleteppt<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-updateppt<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content POWER POINT</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('SuperAdmin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="ppt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url Power Point</label>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-deleteppt<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('SuperAdmin/delete_content/'.$row['id'].'/'.'ppt/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
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
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-white">
                                Youtube
                            </div>
                        </div>
                        <div class="card-header bg-danger">
                            <button class="btn btn-sm bg-white" data-toggle="modal" data-target="#modal-addContentYT"><i class="fa fa-plus mr-1"></i> Content</button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="tab-content">
                                <table id="tabel_materi3" class="table table-hover border-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Latest Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_yt as $row) {
                                            ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><a type="button" class="btn btn-sm text-primary d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#modal-viewyt<?=$row['id']?>"><i class="fa fa-eye mr-1"></i> view</a></td>
                                            <td><?= date("F j, Y H:i a", strtotime($row['update_date']))?></td>
                                            <td>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-primary m-1" data-toggle="modal" data-target="#modal-updateyt<?=$row['id']?>"> <i class="fa fa-pen mr-1"></i> update</a>
                                                <a type="button" class="btn btn-sm d-flex align-items-center justify-content-center btn-danger m-1" data-toggle="modal" data-target="#modal-deleteyt<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-updateyt<?= $row['id'] ?>">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Content YOUTUBE</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('SuperAdmin/update_content')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Title</label>
                                                                <input type="text" class="form-control" name="title" placeholder="title.." value="<?= $row['title'] ?>">
                                                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                                                <input type="hidden" name="id" value="<?=$row['id']?>">
                                                                <input type="hidden" name="type" value="yt">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Url Youtube</label> <small>make sure the link format is <b class="text-danger">(https://youtu.be/)</b></small>
                                                                <input type="text" class="form-control" name="content" placeholder="https://youtube.com/.." value="<?= $row['content'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-deleteyt<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Content?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Title: <br> <?= $row['title'] ?></p>
                                                        <p class="text-dark text-justify">Url: <br> <small><?= $row['content'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('SuperAdmin/delete_content/'.$row['id'].'/'.'yt/'.$id_title); ?>" class="btn btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-viewyt<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><?= $row['title'] ?></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe width="100%" height="450px" id="frame<?= $row['id'] ?>">
                                                        </iframe>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-lg-start">
                                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                        <a href="<?=$row['content']?>" target="blank" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right mr-2"></i>open in new tab</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function getId(url) {
                                                const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
                                                const match = url.match(regExp);
                                                return (match && match[2].length === 11) ?
                                                    match[2] :
                                                    null;
                                            }
                                            const videoId = 'https://www.youtube.com/embed/' + getId('<?=$row['content ']?>) +');
                                            document.getElementById('frame<?= $row['id '] ?>').src = videoId;
                                        </script>
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
        </div>
        <div class="modal fade" id="modal-addContent">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content PDF</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('SuperAdmin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="pdf">
                            </div>
                            <div class="form-group">
                                <label for="">Url Drive</label>
                                <h5 class="text-sm">ex: <small>https://drive.google.com/file/d/1eT4AbPGVEnyq/</small><small class="text-danger">view?usp=sharing</small></h5>
                                <input type="text" class="form-control" name="content" placeholder="https://drive.google.com/..">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-addContentPPT">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content POWER POINT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('SuperAdmin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="ppt">
                            </div>
                            <div class="form-group">
                                <label for="">Url Power Point</label>
                                <h5 class="text-sm">ex: <small>https://docs.google.com/document/jnwdw/
                                        <input type="text" class="form-control" name="content" placeholder="https://docs.google.com/.."></small></h5>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit"  class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-addContentYT">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Content YOUTUBE</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('SuperAdmin/create_content')?>" method="post">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="title..">
                                <input type="hidden" name="id_content_title" value="<?=$id_title?>">
                                <input type="hidden" name="type" value="yt">
                            </div>
                            <div class="form-group">
                                <label for="">Url Youtube</label> <small>make sure the link format is <b class="text-danger">(https://youtu.be/)</b></small>
                                <input type="text" class="form-control" name="content" placeholder="https://youtu.be/YViM..">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>

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
                $("#tabel_materi").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $("#tabel_materi2").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $("#tabel_materi3").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
</body>

</html>