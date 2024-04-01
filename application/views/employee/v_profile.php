<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
    <style>
        .file,
        .file2,
        .file3 {
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
                <div class="container-fluid">
                    <div class="row gutters-sm">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4><?= $user['employee_name'] ?></h4>
                                            <p class="text-secondary mb-1"><?= $user['position'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0">Address</h6>
                                        <span class="text-secondary"><?= $user['address'] ?></span>
                                        <a href="https://www.google.co.id/maps/place/<?=$user['address']?>" target="blank" class="btn btn-sm btn-default">open maps<i class="ml-1 fa fa-location-arrow"></i></a>
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
                                            <?= $user['employee_name'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user['gender'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user['email'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user['phone'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Date of Birth</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <?= $user['date_of_birth'] ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-info btn-sm " data-toggle="modal" data-target="#modal-update">Edit</button>
                                            <a href="<?php echo base_url('Employee/updatePassword')?>" class="btn btn-sm btn-danger">update password</a>
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
                                        <form action="<?= site_url('Employee/processCreateResume') ?>" method="post" enctype="multipart/form-data" method="post" class="col-md-12">
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
                                                <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="user image" class="rounded" style="height: 150px;object-fit: cover;">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h4 style=" font-family:  monospace;" class=" text-danger"><?=$resume['employee_name']?></h4>
                                            <h6><?=$resume['position']?></h6>
                                            <h6><?=$resume['phone']?></h6>
                                            <h6 href="mailto:<?=$resume['email']?>"><?=$resume['email']?></h6>
                                            <button type="button" class="btn btn-sm btn-success text-center" data-toggle="modal" data-target="#modal-addData"><i class="fa fa-plus mr-2"></i> add data</button>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Gender</label>
                                            <p><?= $resume['gender'] ?></p>
                                            <label for="">Address</label>
                                            <p><?= $resume['address'] ?></p>
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
                                                <a href="<?= base_url('Employee/processDeleteSubR/'.$key['id'])?>">
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
                                                            <form action="<?= base_url('Employee/processUpdateSubR')?>" method="post">
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
                                                <a href="<?= base_url('Employee/processDeleteSubR/'.$key['id'])?>">
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
                                                            <form action="<?= base_url('Employee/processUpdateSubR')?>" method="post">
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

                </div>
                <!-- Modal -->
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
                                <form action="<?= base_url('Employee/processCreateSubR')?>" method="post">
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
                                <form action="<?= base_url('Employee/processCreateCategory') ?>" method="post">
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
            </section>
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
                                <form action="<?= site_url('Employee/processUpdateProfile') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img id="preview3" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
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
                                                            <input type="text" name="employee_name" class="form-control" value="<?= $user['employee_name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Position</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="position" type="text" class="form-control" value="<?= $user['position'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Cell Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="number" name="phone" class="form-control" value="<?= $user['phone'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Date of Birt</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="date" name="date_of_birth" class="form-control" value="<?= $user['date_of_birth'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Gender</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <select name="gender" id="" class="form-control">
                                                                <?php
                                                                    if ($user['gender'] == "male") {
                                                                        echo '<option value = "male">Male</option>';
                                                                        echo '<option value = "female">Female</option>';
                                                                    } else{
                                                                        echo '<option value = "female">Female</option>';
                                                                        echo '<option value = "male">Male</option>';
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
                                                            <textarea class="form-control" id="inputExperience" name="address" placeholder="Experience"><?= $user['address'] ?></textarea>
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
                    document.getElementById("preview").src = e.target.result;
                };
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
                    document.getElementById("preview3").src = e.target.result;
                };
                reader.readAsDataURL(this.files[0]);
            });
        </script>
</body>

</html>