<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>superAdmin Profile</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';?>
</head>

<style>
    .file,
    .file2,
    .file3 {
        visibility: hidden;
        position: absolute;
    }
</style>

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
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$dataUser['image_user']?>" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?= $dataUser['name'] ?></h4>
                                            <p class="text-secondary mb-1"><?= $dataUser['position'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address</h6>
                                        <span class="text-secondary"><?= $dataUser['address'] ?></span>
                                        <a href="https://www.google.co.id/maps/place/<?=$dataUser['address']?>" target="blank" class="btn btn-sm btn-default">open maps<i class="ml-1 fa fa-location-arrow"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['name'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['email'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['phone'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">NIK</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['NIK'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">NPWP</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['NPWP'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nationality</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['nationality'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-update">Edit</button>
                                            <a href="<?php echo base_url('SuperAdmin/updatePasswordA')?>" class="btn btn-sm btn-danger">update password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        if (empty($resume)) {
                                            ?>
                                        <form action="<?= site_url('SuperAdmin/processCreateResume') ?>" method="post" enctype="multipart/form-data" method="post" class="col-md-12">
                                            <div class="d-flex justify-content-center">
                                                <p>To make a resume, please upload an image first.</p>
                                            </div>
                                            <div class="form-group">
                                                <div class=" text-center">
                                                    <div id="msg"></div>
                                                    <input type="file" name="image" class="file">
                                                    <div class="input-group my-3">
                                                        <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                                        <div class="input-group-append">
                                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Pilih Gambar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <img id="preview" class=" border-0 shadow-none rounded img-thumbnail w-50">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-success">save</button>
                                            </div>
                                        </form>
                                        <?php
                                        } else{
                                        ?>
                                        <div class="col-md-4">
                                            <div class="card shadow-none">
                                                <img src="<?php echo base_url(); ?>assets/upload/images/resume/<?=$resume['image']?>" alt="" class="rounded" style="height: 150px;object-fit: cover;">
                                                <button class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#modal-updateImage">update image</button>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 style=" font-family:  monospace;" class=" text-danger"><?=$resume['name']?></h4>
                                            <h6><?=$resume['position']?></h6>
                                            <h6><?=$resume['phone']?></h6>
                                            <h6 href="mailto:<?=$resume['email']?>"><?=$resume['email']?></h6>
                                            <button type="button" class="btn btn-sm btn-success text-center" data-toggle="modal" data-target="#modal-addData"><i class="fa fa-plus mr-2"></i> add data</button>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">NIK</label>
                                            <p><?= $resume['NIK'] ?></p>
                                            <label for="">NPWP</label>
                                            <p><?= $resume['NPWP'] ?></p>
                                            <label for="">Nationality</label>
                                            <p><?= $resume['nationality'] ?></p>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                        if (empty($sub_resume)) {
                                            ?>
                                            <div class="d-flex justify-content-center">
                                                <p>To fill out the CV in more detail.</p>
                                            </div>
                                            <?php
                                        } else{
                                            $bantu = "";
                                            foreach ($scr as $row) {
                                                foreach ($sub_resume as $key) {
                                                    if ($key['subCategory_id']==$row['id']) {
                                                        if ($key['subCategory_id'] == $bantu) {
                                                            ?>
                                            <p>
                                                <i class="fas fa-angle-double-right"></i>
                                                <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>
                                                <a type="button" data-toggle="modal" data-target="#modal-updateData<?=$key['id']?>">
                                                    <i class="fa fa-pen text-sm ml-2 text-primary"></i>
                                                </a>
                                                <a href="<?= base_url('SuperAdmin/processDeleteSubR/'.$key['id'])?>">
                                                    <i class="fa fa-trash text-sm ml-2 text-danger"></i>
                                                </a>
                                            </p>
                                            <div class="modal fade" id="modal-updateData<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add data to Resume</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('SuperAdmin/processUpdateSubR')?>" method="post">
                                                                <label for="" class="mr-2">Select Category</label>
                                                                <input type="hidden" name="id" value="<?= $key['id']?>">
                                                                <select name="subCategory_id" id="" class="form-control">
                                                                    <option value="<?=$key['subCategory_id']?>"><?=$key['subCategory']?></option>
                                                                    <?php
                                                                                    foreach ($scr as $value) {
                                                                                        if ($value['id'] == $key['subCategory_id']) {
                                                                                            continue;
                                                                                        }
                                                                                        echo '<option value="'.$value['id'].'">'.$value['subCategory'].'</option>';
                                                                                    }
                                                                                    ?>
                                                                </select>
                                                                <label for="">Experiece</label>
                                                                <input type="text" class=" form-control" name="subResume" value="<?=$key['subResume']?>" placeholder="Web Developer in PT..">
                                                                <label for="">Year</label>
                                                                <input type="date" class=" form-control" value="<?=$key['date']?>" name="date">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-danger btn-sm mt-2" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i> Close</button>
                                                                    <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa fa-save mr-2"></i> save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                            }else{
                                                                $bantu = $key['subCategory_id'];
                                                                ?>
                                            <label for=""><?=$key['subCategory']?></label>
                                            <p>
                                                <i class="fas fa-angle-double-right"></i>
                                                <?=$key['subResume'].' ('.date("Y", strtotime($key['date'])).')'?>
                                                <a type="button" data-toggle="modal" data-target="#modal-updateData<?=$key['id']?>">
                                                    <i class="fa fa-pen text-sm ml-2 text-primary"></i>
                                                </a>
                                                <a href="<?= base_url('SuperAdmin/processDeleteSubR/'.$key['id'])?>">
                                                    <i class="fa fa-trash text-sm ml-2 text-danger"></i>
                                                </a>
                                            </p>
                                            <div class="modal fade" id="modal-updateData<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Add data to Resume</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= base_url('SuperAdmin/processUpdateSubR')?>" method="post">
                                                                <label for="" class="mr-2">Select Category</label>
                                                                <input type="hidden" name="id" value="<?= $key['id']?>">
                                                                <select name="subCategory_id" id="" class="form-control">
                                                                    <option value="<?=$key['subCategory_id']?>"><?=$key['subCategory']?></option>
                                                                    <?php
                                                                                    foreach ($scr as $value) {
                                                                                        if ($value['id'] == $key['subCategory_id']) {
                                                                                            continue;
                                                                                        }
                                                                                        echo '<option value="'.$value['id'].'">'.$value['subCategory'].'</option>';
                                                                                    }
                                                                                    ?>
                                                                </select>
                                                                <label for="">Experiece</label>
                                                                <input type="text" class=" form-control" name="subResume" value="<?=$key['subResume']?>" placeholder="Web Developer in PT..">
                                                                <label for="">Year</label>
                                                                <input type="date" class=" form-control" value="<?=$key['date']?>" name="date">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-danger btn-sm mt-2" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i> Close</button>
                                                                    <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa fa-save mr-2"></i> save</button>
                                                                </div> 
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                            }
                                                    }
                                                }
                                            }
                                            ?>

                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-5">My Company</h4>
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataUser['image']?>" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?= $dataUser['company'] ?></h4>
                                            <p class="text-secondary mb-1"><?= $dataUser['website'] ?></p>
                                            <a href="mailto:<?= $dataUser['company_email'] ?>" class="btn text-danger btn-outline-danger btn-sm">send mail <i class="fa fa-envelope-open ml-1"></i></a>
                                            <a href="<?= $dataUser['website'] ?>" target="blank" class="btn text-success btn-outline-success ml-2 btn-sm">website <i class="fas fa-location-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address</h6>
                                        <span class="text-secondary"><?= $dataUser['addressOfDomicile'] ?></span>
                                        <a href="https://www.google.co.id/maps/place/<?=$dataUser['addressOfDomicile']?>" target="blank" class="btn btn-sm btn-default">open maps<i class="ml-1 fa fa-location-arrow"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Company</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['company'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['company_email'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['company_phone'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">NPWP</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['company_NPWP'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Type of Business Entity</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['typeBusiness'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Form of Business Entity</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['businessEntity'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">SKMHHAM</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['SKMHHAM'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deeds of Establishment</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['deeds_of_establishment'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Deeds of Revision</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $dataUser['deeds_of_revisions'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
        <div class="modal fade" id="modal-addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add data to Resume</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('SuperAdmin/processCreateSubR')?>" method="post">
                            <label for="" class="mr-2">Select Category</label>
                            <input type="hidden" name="resume_id" value="<?= $resume['resume_id'] ?>">
                            <a type="button" class="text-success h6" data-toggle="modal" data-dismiss="modal" data-target="#modal-addCategory"><i class=" fa fa-plus mr-1"></i> add</a>
                            <select name="subCategory_id" id="" class="form-control">
                                <?php
                        foreach ($scr as $row) {
                            echo '<option value="'.$row['id'].'">'.$row['subCategory'].'</option>';
                        }
                        ?>
                            </select>
                            <label for="">Experiece</label>
                            <input type="text" class=" form-control" name="subResume" placeholder="Web Developer in PT..">
                            <label for="">Year</label>
                            <input type="date" class=" form-control" name="date">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm mt-2" data-dismiss="modal"><i class="fas fa-window-close mr-2"></i> Close</button>
                                <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa fa-save mr-2"></i> save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('SuperAdmin/processCreateCategory') ?>" method="post">
                            <label for="" class="mr-2">Category</label>
                            <input type="text" name="subCategory" id="" class=" form-control" placeholder="ex: experience..">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger btn-sm mt-2" data-dismiss="modal" data-toggle="modal" data-target="#modal-addData"><i class="fas fa-window-close mr-2"></i> Close</button>
                                <button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa fa-save mr-2"></i> save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modal-update">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Update Profile</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="main-body">
                                <form action="<?= site_url('SuperAdmin/updateProfile') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img id="preview3" src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$dataUser['image_user']?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                                        <div class="mt-3">
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                            <input type="file" name="image" class="file3">
                                                            <div class="input-group">
                                                                <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file3">
                                                                <div class="input-group-append">
                                                                    <button type="button" id="pilih_gambar3" class="browse btn btn-dark">Pilih Gambar</button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Full Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="name" class="form-control" value="<?= $dataUser['name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" name="email" value="<?= $dataUser['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Position</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="position" type="text" class="form-control" value="<?= $dataUser['position'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Cell Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="number" name="phone" class="form-control" value="<?= $dataUser['phone'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">NIK</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="number" name="NIK" class="form-control" value="<?= $dataUser['NIK'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">NPWP</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="NPWP" class="form-control" value="<?= $dataUser['NPWP'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Nationality</h6>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <select name="nationality" class=" select2 form-control">
                                                                <option value="<?= $dataUser['nationality'] ?>" style="color: black;"><?= $dataUser['nationality'] ?></option> <?php
                                                            foreach ($country as $row) {
                                                                if ($row['name'] == $dataUser['nationality'] ) {
                                                                    continue;
                                                                }
                                                                ?> <option value="<?= $row['name'] ?>"><small class="text-dark"><?= $row['name'] ?></small></option> <?php
                                                            }
                                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Address</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $dataUser['address'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-1"></i> save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-updateImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Update Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('SuperAdmin/processUpdateResume') ?>" method="post" enctype="multipart/form-data" method="post" class="col-md-12">
                            <input type="hidden" value="<?=$resume['resume_id']?>" name="resume_id">
                            <div class="d-flex justify-content-center">
                                <p class="text-dark">Update your profile</p>
                            </div>
                            <div class="form-group">
                                <div class=" text-center">
                                    <div id="msg"></div>
                                    <input type="file" name="image" class="file2">
                                    <div class="input-group my-3">
                                        <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file2">
                                        <div class="input-group-append">
                                            <button type="button" id="pilih_gambar2" class="browse btn btn-dark">Pilih Gambar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <img id="preview2" class=" border-0 shadow-none rounded img-thumbnail w-100">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-success">save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
        <script>
            $(document).on("click", "#pilih_gambar", function() {
                var file = $(this).parents().find(".file");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file").val(fileName);
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
            $(document).on("click", "#pilih_gambar2", function() {
                var file = $(this).parents().find(".file2");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file2").val(fileName);
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview2").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });
            $(document).on("click", "#pilih_gambar3", function() {
                var file = $(this).parents().find(".file3");
                file.trigger("click");
            });
            $('input[type="file"]').change(function(e) {
                var fileName = e.target.files[0].name;
                $("#file3").val(fileName);
                var reader = new FileReader();
                reader.onload = function(e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview3").src = e.target.result;
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });

            $(function() {
                $('.select2').select2()
            });
        </script>
</body>

</html>