<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Chatt</title>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataChatt')?>">Chat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Selected</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <?php
                        if ($validate == false) {
                            redirect('SuperAdmin/Lock');
                        }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Message</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="text-center">
                                        <strong>User Information</strong>
                                    </p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow-none">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class="fas fa-user mr-1"></i> Name</strong>
                                                    <p class="text-muted"><?= $dataOrder['name'] ?></p>
                                                    <hr>
                                                    <strong><i class="fa fa-phone mr-1"></i> Phone/Email</strong>
                                                    <p class="text-muted"><?= $dataOrder['phone'].'/'.$dataOrder['email'] ?></p>
                                                    <hr>
                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                                    <p class="text-muted"><?= $dataOrder['address'] ?></p>
                                                    <hr>
                                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                                    <p class="text-muted"><?= $dataOrder['message'] ?></p>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-none">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class="fas fa-building mr-1"></i> Company</strong>
                                                    <p class="text-muted"> <?= $dataOrder['company'] ?></p>
                                                    <hr>
                                                    <strong><i class="fas fa-user-lock mr-1"></i> Position</strong>
                                                    <p class="text-muted"><?= $dataOrder['position'] ?></p>
                                                    <hr>
                                                    <strong><i class="fa fa-wrench mr-1"></i> Service</strong>
                                                    <p class="text-muted"><?= $dataOrder['service_name'] ?></p>
                                                    <hr>
                                                    <strong><i class="far fa-calendar mr-1"></i> Order date</strong>
                                                    <p class="text-muted"><?= date('d F Y', strtotime($dataOrder['create_date']));?></p>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4">
                                    <p class="text-center">
                                        <strong>Chat</strong>
                                    </p>
                                    <div class="card direct-chat direct-chat-warning shadow-none">
                                        <div class="card-body" style="display: block;">
                                            <?php
                                                    if (empty($chatt)) {
                                                ?>
                                            <div class="d-flex justify-content-center p-4">
                                                <div class="text-center">
                                                    <h4>Chat not yet</h4>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg">
                                                        Start message
                                                    </button>
                                                </div>

                                                <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
                                                <!-- Bootstrap 4 -->
                                                <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                                                <div class="modal fade" id="modal-lg">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <form action="<?php echo site_url('superAdmin/addChatt/'.$dataOrder['id'])?>" method="post">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Start chatt to <strong class="text-warning"><?= $dataOrder['name']?></strong></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <textarea name="chatt" placeholder="message.." id="" class="form-control border-0" cols="30" rows="10"></textarea>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-warning">send</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                                <!-- /.modal -->
                                                <?php
                                                            return false;
                                                        }else{
                                                    ?>
                                                <div class="direct-chat-messages" id="yourDiv">
                                                    <?php
                                                foreach ($chatt as $row) {
                                                if ($row['user_id'] != 0) {
                                                    ?>
                                                    <div class="direct-chat-msg">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-left"><?=$row['name']?></span>
                                                            <span class="direct-chat-timestamp float-right"><?=$row['create_date']?></span>
                                                        </div>
                                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/upload/images/<?=$row['image']?>" alt="message user image">
                                                        <div class="direct-chat-text"> <?=$row['chatt']?> </div>
                                                    </div>
                                                    <?php
                                                        }
                                                        else{
                                                            ?>
                                                    <div class="direct-chat-msg right">
                                                        <div class="direct-chat-infos clearfix">
                                                            <span class="direct-chat-name float-right"><?=$row['name']?></span>
                                                            <span class="direct-chat-timestamp float-left"><?=$row['create_date']?></span>
                                                        </div>
                                                        <img class="direct-chat-img" src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" alt="message user image">
                                                        <div class="direct-chat-text"> <?=$row['chatt']?> </div>
                                                    </div>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-white" style="display: block;">
                                                <form action="<?php echo site_url('superAdmin/addChatt/'.$dataOrder['id'])?>" method="post">
                                                    <div class="input-group">
                                                        <input type="text" name="chatt" placeholder="Type Message ..." class="form-control">
                                                        <span class="input-group-append">
                                                            <button type="submit" class="btn btn-warning">Send</button>
                                                        </span>
                                                    </div>
                                                </form>
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
        <script>
            var element = document.getElementById("yourDiv");
            element.scrollTop = element.scrollHeight;
        </script>
</body>

</html>