<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sub Step</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php 
include 'header.php';
?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
        <div class="content-wrapper bg-white pt-3" >
            <section class="content">
                <div class="container-fluid">
                <div class="container-fluid"> <?php
                    if (empty($step)) {
                        redirect('Employee/lock');
                    }
                            if ($validate == false) {
                                
                        include 'script.php';
                                ?> <div class="card shadow-none">
                        <div class="card-body text-center">
                            <h1 class="display-4 ">Sorry!</h1>
                            <p class="lead ">Sub Step for <strong><?= $step['step']?></strong> not yet</p>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="<?php echo base_url('Employee/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="<?= site_url('Employee/processCreateSubStep') ?>" method="post">
                                    <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Sub-Step Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><?php
                                return false;
                            }
                        ?>
                </div>
                <div class="container-fluid"> <?php
                    if (empty($subStep)) {
                        ?> <div class="jumbotron">
                        <h1 class="display-4">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead">Your data is not yet available</p>
                        <hr class="my-4">
                        <a href="<?= base_url('Employee/dataWorkflow') ?>" class="btn btn-danger"><i class="fa fa-arrow-left mr-1"></i> Back</a>
                    </div> <?php
                        return false;
                    }
                    ?> <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="">
                                Sub Step for <strong><?= $step['step']?></strong>
                                </div>
                                <div class="">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No.</th>
                                            <th>Sub Step</th>
                                            <th>Update Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($subStep as $row) {
                                                ?>
                                        <tr>
                                            <td scope="row" class="text-center"><?=$no;?></td>
                                            <td><?= $row['subStep']?></td>
                                            <td><?=$row['update_date']?></td>
                                            <td class=" d-flex justify-content-between">
                                                <span class="info-box-number d-flex justify-content-end"><small><a type="button" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></small>
                                                    <small><a type="button" data-toggle="modal" data-target="#modal-update<?=$row['id']?>" class="ml-2 btn btn-sm btn-primary"><i class="fa fa-eye"></i></a></small>

                                            </td>
                                        </tr>
                                        
                                        <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this sub step?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Sub Step:<br><?= $row['subStep'] ?></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('Employee/deleteSubStep/'.$row['id'].'/'.$step['id'])?>" class="btn btn-sm btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade " id="modal-update<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Activities</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=site_url('Employee/updateSubStep')?>" method="post" id="form<?=$row['id']?>">
                                                            <div class="form-group">
                                                                <label for="">Activities</label>
                                                                <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                <input type="hidden" name="subStep_id" value="<?= $row['id'] ?>">
                                                                <input type="hidden" name="step_id" value="<?= $row['step_id'] ?>">
                                                            </div>
                                                            <button class="btn btn-success btn-sm" type="submit" form="form<?=$row['id']?>"><i class="fa fa-save mr-1"></i>save</button>
                                                        </form>
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
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form action="<?= site_url('Employee/processCreateSubStep')?>" method="post">
                                        <div class="modal-header">
                                            <input type="hidden" name="step_id" value="<?= $step['id'] ?>">
                                            <h4 class="modal-title">Create sub step to step <strong class="text-danger"><?= $step['step'] ?></strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Sub-Step Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php';?>

</body>

</html>