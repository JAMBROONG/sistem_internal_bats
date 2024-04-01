<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Step</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php 
include 'header.php';
?>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
        <?php
        if(empty($service)){
            redirect('Employee/lock');
        }
        ?>
         <div class="content-wrapper bg-white" >
            <section class="content">   
                <div class="container-fluid">
                    <?php
                            if ($validate == false) {
                                ?>
                    <div class="card shadow-none">
                        <div class="card-body text-center h-1">
                            <h1 class="display-4 ">Sorry!</h1>
                            <p class="lead ">Step for <strong><?= $service['service_name']?></strong> not yet</p>
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="<?php echo base_url('Employee/dataWorkflow'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                        </div>
                    </div>
                    <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="<?= site_url('Employee/processCreateStep/'.$service['id']) ?>" method="post">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create step to <strong class="text-danger"><?= $service['service_name'] ?></strong></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." required></textarea>
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
            </section>
        </div>
        <?php
                    include 'footer.php';
                                return false;
                            }
                        ?>
    </div>
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h5 class="card-title">Select a step to view the sub-steps.</h5>
                    </div>
                    <div class="">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg" type="button"><i class="fa fa-plus pr-1"></i>add data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example1" class="table table-striped table-inverse ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Step</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                        $no = 1;
                                        foreach ($selected as $row) {
                                            ?>
                        <tr>
                            <td scope="row"><?=$no;?></td>
                            <td><?= $row['step']?></td>
                            <td><?=$row['description']?></td>
                            <td class=" d-flex justify-content-between">
                                <a type="button" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="btn btn-sm btn-danger mr-1"><i class="fa fa-trash"></i></a>
                                <a type="button" data-toggle="modal" data-target="#modal-update<?=$row['id']?>" class=" btn btn-sm btn-primary mr-1"><i class="fa fa-pen"></i></a>
                                <a href="<?= base_url('Employee/detailStep/'.$row['id'])?>" class="btn btn-success btn-sm mr-1">detail</a>
                                <?php
                                            if ($row['drive'] == 'not avaliable' || $row['drive'] == '') {
                                                ?>
                                <a type="button" class="btn btn-sm bg-secondary disabled"><i class="fab fa-google-drive"></i></a>
                                <?php
                                            } else{
                                                ?>
                                <a type="button" class="btn btn-sm bg-warning" href="<?=$row['drive']?>" target="blank"><i class="fab fa-google-drive"></i></a>
                                <?php
                                            }
                                            ?>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-delete<?=$row['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure delete this step?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-dark"> Step:<br><?= $row['step'] ?></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('Employee/deleteStep/'.$row['id'].'/'.$service['id'])?>" class="btn btn-sm btn-danger">Yes delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-update<?=$row['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure delete this step?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('Employee/updateDataStep') ?>" method="post">
                                            <div class="form-group">
                                                <label for="my-input">Step</label>
                                                <input id="my-input" class="form-control" type="text" name="step" value="<?= $row['step'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="my-input">Drive</label>
                                                <input id="my-input" class="form-control" type="text" name="drive" value="<?= $row['drive'] ?>">
                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?= $row['service_id'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="my-input">Description</label>
                                                <textarea name="description" id="" class="textarea" cols="30" rows="10"><?= $row['description'] ?></textarea>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Save</button>
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
    </section>
    </div>
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="<?= site_url('Employee/processCreateStep/'.$service['id']) ?>" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Create step to <strong class="text-danger"><?= $service['service_name'] ?></strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Service Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="textarea" name="description" rows="3" placeholder="Enter ..." required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Drive (opsional) </label>
                            <input type="text" name="drive" placeholder="drive.google/" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cl ose</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php';?>

</body>

</html>