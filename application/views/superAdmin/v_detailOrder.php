<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include 'template/v_navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder') ?>">Order</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container"> <?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('superAdmin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?>
                    <div class="jumbotron bg-light pt-2 pb-2 text-center">
                        <h1 class="display-5 text-danger"><?= $dataOrder['service_name'] ?></h1>
                        <p class="lead">order date <?= date('F j, Y.', strtotime($dataOrder['create_date'])) ?></p>
                        <a type="button"data-toggle="modal" data-target="#modal-updateOrder"
                            class="btn btn-sm btn-default"><i class="fas fa-cogs mr-2"></i>Update Order</a>
                        <a href="<?= base_url('superAdmin/updateOrderStep/' . $dataOrder['id']) ?>"
                            class="btn btn-sm btn-default"><i class="fas fa-cog mr-2"></i>Update Workflow</a>

                        <!-- Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Bookkeeping Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateForm"
                                            action="<?= site_url('SuperAdmin/bookkeeping_date/' . $dataOrder['id']) ?>"
                                            method="post">
                                            <div class="form-group">
                                                <textarea class="form-control" id="bookkeepingDate" name="bookkeepingDate" rows="4"><?= $dataOrder['message'] ?></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="updateForm" class="btn btn-primary"
                                            id="submitForm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updateDueDate" tabindex="-1" role="dialog"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Due Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateFormDueDate"
                                            action="<?= site_url('SuperAdmin/due_date/' . $dataOrder['id']) ?>"
                                            method="post">
                                            <div class="form-group">
                                                <input class="form-control" id="dueDate" name="dueDate"
                                                    value="<?= $dataOrder['due_date'] ?>" type="date">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="updateFormDueDate" class="btn btn-primary"
                                            id="submitForm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="updatedescription" tabindex="-1" role="dialog"
                            aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Description</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="updateFormdescription"
                                            action="<?= site_url('SuperAdmin/descriptionOrder/' . $dataOrder['id']) ?>"
                                            method="post">
                                            <div class="form-group">
                                                <textarea class="form-control" id="description" name="description" rows="4"><?= $dataOrder['description'] ?></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="updateFormdescription" class="btn btn-primary"
                                            id="submitForm">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="card-title">General Information</div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header bg-dark">
                                        <h3 class="widget-user-username"><?= $dataOrder['name'] ?></h3>
                                        <h5 class="widget-user-desc"><?= $dataOrder['client_position'] ?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2 bg-dark"
                                            src="<?php echo base_url(); ?>assets/upload/images/<?= $dataOrder['company_image'] ?>"
                                            alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h6><?= $dataOrder['client_phone'] ?></h6>
                                                    <span class="description-text">WhatsApp</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h6><?= $dataOrder['email'] ?></h6>
                                                    <span class="description-text">Email</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Address:</h5>
                                        <p class="card-text"><?= $dataOrder['client_address'] ?></p>
                                        <hr>
                                        <h5 class="card-title">Book Year: <b><?= $dataOrder['message'] ?> </b>
                                        </h5>
                                        <p class="card-text">
                                            <button class="btn btn-sm btn-default " data-toggle="modal"
                                                data-target="#updateModal">
                                                <i class="fas fa-pen mr-2 fa-sm"> </i>update
                                            </button>
                                        </p>
                                        <hr>
                                        <h5 class="card-title">Due Date:
                                            <b><?= !$dataOrder['due_date'] ? $dataOrder['due_date'] : date('d M Y', strtotime($dataOrder['due_date'])) ?>
                                            </b>
                                        </h5>
                                        <p class="card-text">
                                            <button class="btn btn-sm btn-default " data-toggle="modal"
                                                data-target="#updateDueDate">
                                                <i class="fas fa-pen mr-2 fa-sm"> </i>update
                                            </button>
                                        </p>
                                        <hr>
                                        <h5 class="card-title">Description: <b><?= $dataOrder['description'] ?> </b>
                                        </h5>
                                        <p class="card-text">
                                            <button class="btn btn-sm btn-default " data-toggle="modal"
                                                data-target="#updatedescription">
                                                <i class="fas fa-pen mr-2 fa-sm"> </i>update
                                            </button>
                                        </p>
                                        <hr>
                                        <a href="<?= base_url('superAdmin/dataOrder') ?>"
                                            class="btn btn-default text-danger">
                                            <i class="fa fa-arrow-left mr-1 pr-1 "></i>Back
                                        </a>
                                        <button type="button" class="btn btn-default text-danger"
                                            data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-trash mr-1 pr-1 "></i>Delete Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center p-3 ">
                                <hr>
                                <h5>Data Responsible Person</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-none">
                                    <div class="card-body ">
                                        <h5 class="card-title">Name</h5>
                                        <p class="card-text text-bold"><?= $person['name'] ?></p>
                                        <h5 class="card-title">Phone</h5>
                                        <p class="card-text text-bold"><?= $person['phone'] ?></p>
                                        <h5 class="card-title">Email</h5>
                                        <p class="card-text text-bold"><?= $person['email'] ?></p>
                                        <h5 class="card-title">NIK</h5>
                                        <p class="card-text text-bold"><?= $person['NIK'] ?></p>
                                        <h5 class="card-title">NPWP</h5>
                                        <p class="card-text text-bold"><?= $person['NPWP'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-none">
                                    <div class="card-body ">
                                        <h5 class="card-title">Position</h5>
                                        <p class="card-text text-bold"><?= $person['position'] ?></p>
                                        <h5 class="card-title">Nationality</h5>
                                        <p class="card-text text-bold"><?= $person['nationality'] ?></p>
                                        <h5 class="card-title">Address</h5>
                                        <p class="card-text text-bold"><?= $person['address'] ?></p>
                                        <hr>
                                        <h5 class="card-title">Financial Statement</h5>
                                        <p class="card-text text-bold"><?= $dataOrder['financial_statements'] ?></p>
                                        <a type="button"data-toggle="modal" data-target="#modal-updateOrder"
                                            class="btn btn-sm btn-warning"><i class="fas fa-cogs mr-2"></i>Update
                                            Data</a>
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#modal-createPIC"><i class="fa fa-plus mr-2"></i> add
                                            PIC</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h5 class="card-title">BATS Consulting Team</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card rounded">
                                        <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $dataOrder['partner_image'] ?>"
                                            alt="">
                                        <div class="card-body">
                                            <strong><i class="fas fa-book mr-1"></i> Name</strong>
                                            <p class="text-muted"><?= $dataOrder['partner_name'] ?> </p>
                                            <hr>
                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                            <p class="text-muted"><?= $dataOrder['partner_address'] ?></p>
                                            <hr>
                                            <strong><i class="fas fa-phone mr-1"></i>WhatsApp</strong>
                                            <p class="text-muted"><?= $dataOrder['partner_phone'] ?></p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row d-flex justify-content-around">
                                        <div class="card col-md-4 p-0">
                                            <img class=""
                                                src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $dataOrder['manager_image'] ?>"
                                                alt="User profile picture">
                                            <div class="card-body">
                                                <h3 class="profile-username text-center">
                                                    <?= $dataOrder['manager_name'] ?></h3>
                                                <p class="text-muted text-center">Manager</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>WhatsApp</b> <a
                                                            class="float-right"><?= $dataOrder['manager_phone'] ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 p-0">
                                            <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $dataOrder['supervisor_image'] ?>"
                                                alt="User profile picture">
                                            <div class="card-body box-profile  rounded">
                                                <h3 class="profile-username text-center">
                                                    <?= $dataOrder['supervisor_name'] ?></h3>
                                                <p class="text-muted text-center">Supervisor</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>WhatsApp</b> <a
                                                            class="float-right"><?= $dataOrder['supervisor_phone'] ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-3"> <?php
                                foreach ($dataStaff as $row) {
                                ?> <div class="col-md-3 rounded card">
                                            <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?= $row['image'] ?>"
                                                alt="User profile picture">
                                            <div class="card-body box-profile">
                                                <h3 class="profile-username text-center"><?= $row['employee_name'] ?>
                                                </h3>
                                                <p class="text-muted text-center">Staff</p>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <ul class="list-group list-group-unbordered">
                                                    <li class="list-group-item">
                                                        <b>WhatsApp</b> <a class="float-right"><?= $row['phone'] ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> <?php
                                }
                                ?> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card"> <?php
                            if (empty($step)) {
                                ?> <div class="jumbotron bg-white">
                            <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                            <p class="lead text-center">data not yet</p>
                            <a href="<?php echo base_url('superAdmin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                            <hr class="my-4">
                        </div> <?php
                                
                            } else{
                            ?> <div class="card-header bg-dark">
                            <h5 class="card-title">Flow <?= $dataOrder['service_name'] ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-wrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Control Item</th>
                                            <th>Description</th>
                                            <th>Activities</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                    $no = 1;
                                                    
                                                    $no2 = 1;
                                                    $step = "";
                                                    foreach ($substep as $row) {
                                                        if ($row['step'] == $step) {
                                                        ?>
                                        <tr>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td class="border-0"></td>
                                            <td><?= $no2 . '. ' . $row['subStep'] ?></td>
                                        </tr>
                                        <?php
                                                            $no2++;
                                                            }
                                                            else{
                                                                $no2 = 1;
                                                                $step = $row['step'];
                                                            
                                                            ?>
                                        <td><?= $no ?></td>
                                        <td><?= $row['step'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td><?= $no2 . '. ' . $row['subStep'] ?></td>
                                        </tr>
                                        <?php
                                                        $no++; 
                                                        $no2++;    
                                                        }
                                                    }
                                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
            </section>
        </div>

        <!-- modal for delete order -->
        <div class="modal fade bg-danger" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Are you sure delete this order?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Service <strong><?= $dataOrder['service_name'] ?></strong> </p>
                        <p class="text-dark">Client <strong><?= $dataOrder['name'] ?> </strong> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('superAdmin/deleteOrder/' . $dataOrder['id']) ?>"
                            class="btn btn-danger">Yes delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <!-- modal for update order -->
        <div class="modal fade" id="modal-updateOrder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Are you sure to update this order?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">Service <strong><?= $dataOrder['service_name'] ?></strong> </p>
                        <p class="text-dark">Client <strong><?= $dataOrder['name'] ?> </strong> </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('superAdmin/updateOrder/' . $dataOrder['id']) ?>"
                            class="btn btn-dark">Yes update</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-createPIC">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-dark">Create PIC</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('Admin/processCreatePIC') ?>" method="post" class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="text-dark">Name</label>
                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                    <input type="text" class="form-control" name="person_responsible"
                                        placeholder="ex: alex.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Phone</label>
                                    <input type="number" class="form-control" name="phone"
                                        placeholder="ex: 0822.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="ex: @gmail.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">NIK</label>
                                    <input type="number" class="form-control" name="NIK"
                                        placeholder="ex: 3212.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">NPWP</label>
                                    <input type="text" class="form-control" name="NPWP"
                                        placeholder="ex: 3.22-1.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Position</label>
                                    <input type="text" class="form-control" name="position"
                                        placeholder="ex: marketing.." required>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Nationality</label>
                                    <select name="nationality" id="" class=" form-control select2" required
                                        style="width: 100%;">
                                        <?php
                                        foreach ($country as $row) {
                                            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="text-dark">Address</label>
                                    <textarea name="address" id="" cols="30" rows="10" class="form-control"
                                        placeholder="Jl. Sudirman.." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-1"></i>
                                    save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php'; ?>

        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                $('.select2').select2()
            });
        </script>
</body>

</html>
