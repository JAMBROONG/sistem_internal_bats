<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Profile</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php'; ?>

    <style>
        .file {
            visibility: hidden;
            position: absolute;
        }

        .select2-results__option {
            color: black;
        }
    </style>

</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <div class="content-wrapper bg-white" style="min-height: 1665.5px;">
            <section class="content">
                <div class="container-fluid">
                    <div class="container pt-3">
                        <div class="main-body">
                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                </ol>
                            </nav>
                            <!-- /Breadcrumb -->

                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="<?php echo base_url(); ?>assets/upload/images/client/<?= $dataUser['image_user'] ?>"
                                                    alt="Admin" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <h4><?= $dataUser['name'] ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <small class="text-secondary"><?= $dataUser['address'] ?></small>
                                                <br><br>
                                                <a href="https://www.google.co.id/maps/place/<?= $dataUser['address'] ?>"
                                                    target="blank" class="btn btn-sm btn-default">open maps<i
                                                        class="ml-1 fa fa-location-arrow"></i></a>
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
                                                    <button class="btn btn-info btn-sm " data-toggle="modal"
                                                        data-target="#modal-update">Edit</button>
                                                    <a href="<?= base_url('Client/updatePassword') ?>"
                                                        class="btn btn-sm btn-danger">update password</a>
                                                </div>
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
                                                <img src="<?php echo base_url(); ?>assets/upload/images/<?= $dataUser['image'] ?>"
                                                    alt="Admin" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <h4><?= $dataUser['company'] ?></h4>
                                                    <p class="text-secondary mb-1"><?= $dataUser['website_cpmpany'] ?>
                                                    </p>
                                                    <a href="mailto:<?= $dataUser['company_email'] ?>"
                                                        class="btn text-danger btn-outline-danger btn-sm">send mail <i
                                                            class="fa fa-envelope-open ml-1"></i></a>
                                                    <a href="<?= $dataUser['website_cpmpany'] ?>" target="blank"
                                                        class="btn text-success btn-outline-success ml-2 btn-sm">website
                                                        <i class="fas fa-location-arrow"></i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">Address</h6>
                                                <span
                                                    class="text-secondary"><?= $dataUser['addressOfDomicile'] ?></span>
                                                <a href="https://www.google.co.id/maps/place/<?= $dataUser['addressOfDomicile'] ?>"
                                                    target="blank" class="btn btn-sm btn-default">open maps<i
                                                        class="ml-1 fa fa-location-arrow"></i></a>
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
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
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
                                <form action="<?= site_url('Client/updateProfile') ?>" method="post"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img id="preview"
                                                            src="<?php echo base_url(); ?>assets/upload/images/client/<?= $dataUser['image_user'] ?>"
                                                            alt="Admin" class="rounded-circle p-1 bg-primary"
                                                            width="110">
                                                        <div class="mt-3">
                                                        </div>
                                                    </div>
                                                    <hr class="my-4">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                            <input type="file" name="image" class="file">
                                                            <div class="input-group">
                                                                <input required type="text" class="form-control"
                                                                    disabled placeholder="Upload Gambar"
                                                                    id="file">
                                                                <div class="input-group-append">
                                                                    <button type="button" id="pilih_gambar"
                                                                        class="browse btn btn-dark">Pilih
                                                                        Gambar</button>
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
                                                            <input type="text" name="name" class="form-control"
                                                                value="<?= $dataUser['name'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input disabled type="text" class="form-control"
                                                                value="<?= $dataUser['email'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Position</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input name="position" type="text"
                                                                class="form-control"
                                                                value="<?= $dataUser['position'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Cell Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="number" name="phone" class="form-control"
                                                                value="<?= $dataUser['phone'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">NIK</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="number" name="NIK" class="form-control"
                                                                value="<?= $dataUser['NIK'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">NPWP</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" name="NPWP" class="form-control"
                                                                value="<?= $dataUser['NPWP'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0 text-dark">Nationality</h6>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <select name="nationality"
                                                                class="bg-dark select2 text-dark">
                                                                <option value="<?= $dataUser['nationality'] ?>"
                                                                    style="color: black;">
                                                                    <?= $dataUser['nationality'] ?></option>
                                                                <?php
                                                            foreach ($country as $row) {
                                                                if ($row['name'] == $dataUser['nationality'] ) {
                                                                    continue;
                                                                }
                                                                ?> <option
                                                                    value="<?= $row['name'] ?>"><small
                                                                        class="text-dark"><?= $row['name'] ?></small>
                                                                </option> <?php
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
                                                    <button class="btn btn-sm btn-success" type="submit"><i
                                                            class="fa fa-save mr-1"></i> save</button>
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
</body>
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
    $(function() {
        $('.select2').select2()
    });


    $('#nav_profile').addClass('nav_select')
</script>

</html>
