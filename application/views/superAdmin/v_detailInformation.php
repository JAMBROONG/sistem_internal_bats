<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Seminar</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <?php include 'header.php'; ?> 
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataInformation')?>">Seminar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <?php
                        if (empty($info)) {
                            redirect('SuperAdmin/lock');
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo base_url(); ?>assets/upload/images/news/<?=$info['image']?>" alt="" class="rounded">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $info['title'] ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Description:</h5>
                                    <br>
                                    <p><?= $info['description'] ?></p>
                                    <br>
                                    <h5 class="card-title">Latest Update:</h5>
                                    <br>
                                    <p><?= date("F j, Y, g:i a",strtotime($info['update_date'])); ?></p>
                                    <br>
                                    <a href="<?=base_url('SuperAdmin/dataInformation')?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                    <a type="button"data-toggle="modal" data-target="#modal-delete" class="btn btn-sm btn-danger"><i class="fa fa-trash mr-2"></i> delete</a>
                                    <a href="<?=$info['link']?>" class="btn btn-sm btn-success"><i class="fab fa-whatsapp mr-2"></i> Join Group</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <!-- modal for update order -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Are you sure to delete this news?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Title: <strong><?= $info['title'] ?></strong> </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                    <a href="<?php echo base_url('superAdmin/deleteInformation/'.$info['id']); ?>" class="btn btn-danger">Yes delete</a>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?> 

</body>

</html>