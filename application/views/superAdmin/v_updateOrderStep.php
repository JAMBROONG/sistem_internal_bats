<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper bg-white">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Step</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default shadow-none">
                        <div class="card-header border-0">
                            <h3 class="card-title">Update Workflow : <strong><?= $dataOrder['service_name'] ?></strong></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="<?= site_url('SuperAdmin/processUpdateOrderStep') ?>" method="post" id="formCore" class="border p-3 rounded">
                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                        <div class="card border-0 shadow-none">
                                            <div class="callout callout-danger">
                                                <h5><i class="fas fa-info text-danger"></i> Note:</h5>
                                                Below are the general steps.
                                            </div>
                                            <!-- /.card-header -->
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
                                                    $no3 = 1;
                                                    $steps = "";
                                                    $subOld =[];
                                                    foreach ($substepOld as $row) {
                                                        array_push($subOld,$row['subStep_id']);
                                                    }
                                                    foreach ($substep as $row) {
                                                        if ($row['step'] == $steps) {
                                                        ?>
                                                        <tr>
                                                            <td class="border-0"></td>
                                                            <td class="border-0"></td>
                                                            <td class="border-0"></td>
                                                            <td>
                                                                <?php
                                                                if (in_array($row['sub_id'], $subOld))
                                                                {
                                                               ?>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>" checked disabled>
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary" data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2" data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('SuperAdmin/updateActivities')?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('SuperAdmin/updateActivities')?>" id="form<?=$row['sub_id']?>" method="post">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit" form="form<?=$row['sub_id']?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('SuperAdmin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>">
                                                                    <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                    <a type="button" class="text-primary" data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                    <a type="button" class="text-danger ml-2" data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                                <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title">Update Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?=site_url('SuperAdmin/updateActivities')?>" method="post" id="form<?=$row['sub_id']?>">
                                                                                    <div class="form-group">
                                                                                        <label for="">Activities</label>
                                                                                        <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                        <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                        <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                    </div>
                                                                                    <button class="btn btn-success btn-sm" type="submit" form="form<?=$row['sub_id']?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header bg-danger">
                                                                                <h4 class="modal-title">Delete Activities</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Are you sure you want to delete this data?</p>
                                                                                <p><strong><?= $row['subStep']?></strong></p>
                                                                                <a class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</a>
                                                                                <a href="<?= base_url('SuperAdmin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                }
                                                                 ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            $no2++;
                                                            }
                                                            else{
                                                                $no2 = 1;
                                                                $steps = $row['step'];
                                                            ?>
                                                        <td><?=$no;?></td>
                                                        <td><?=$row['step'];?></td>
                                                        <td><?=$row['description'];?></td>
                                                        <td>
                                                            <?php
                                                                if (in_array($row['sub_id'], $subOld))
                                                                {
                                                               ?>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>" checked disabled>
                                                                <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                <a type="button" class="text-primary" data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                <a type="button" class="text-danger ml-2" data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                            <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Update Activities</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?=site_url('SuperAdmin/updateActivities')?>" method="post" id="form<?=$row['sub_id']?>">
                                                                                <div class="form-group">
                                                                                    <label for="">Activities</label>
                                                                                    <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                    <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                </div>
                                                                                <button class="btn btn-success btn-sm" type="submit" formaction="<?=site_url('SuperAdmin/updateActivities')?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger">
                                                                            <h4 class="modal-title">Delete Activities</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to delete this data?</p>
                                                                            <p><strong><?= $row['subStep']?></strong></p>
                                                                            <a class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</a>
                                                                            <a href="<?= base_url('SuperAdmin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                }
                                                                else
                                                                {
                                                                ?>
                                                            <div class="icheck-primary d-inline">
                                                                <input type="checkbox" name="step[]" value="<?= $row['sub_id'];?>" id="checkboxPrimary<?=$no3;?>">
                                                                <label for="checkboxPrimary<?=$no3;?>"><?=$row['subStep'];?></label>
                                                                <a type="button" class="text-primary" data-toggle="modal" data-target="#modal-update<?=$row['sub_id']?>"><i class="fa fa-edit"></i></a>
                                                                <a type="button" class="text-danger ml-2" data-toggle="modal" data-target="#modal-delete<?=$row['sub_id']?>"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                            <div class="modal fade " id="modal-update<?=$row['sub_id']?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Update Activities</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?=site_url('SuperAdmin/updateActivities')?>" method="post" id="form<?=$row['sub_id']?>">
                                                                                <div class="form-group">
                                                                                    <label for="">Activities</label>
                                                                                    <textarea name="subStep" class="form-control" id="" cols="30" rows="10"><?= $row['subStep'] ?></textarea>
                                                                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                                    <input type="hidden" name="subStep_id" value="<?= $row['sub_id'] ?>">
                                                                                </div>
                                                                                <button class="btn btn-success btn-sm" type="submit" formaction="<?=site_url('SuperAdmin/updateActivities')?>"><i class="fa fa-save mr-1"></i>save</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal fade" id="modal-delete<?=$row['sub_id']?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header bg-danger">
                                                                            <h4 class="modal-title">Delete Activities</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Are you sure you want to delete this data?</p>
                                                                            <p><strong><?= $row['subStep']?></strong></p>
                                                                            <a class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</a>
                                                                            <a href="<?= base_url('SuperAdmin/deleteActivities/'.$row['sub_id'].'/'.$dataOrder['id'])?>" class="btn btn-sm btn-success">Yes Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                }
                                                                 ?>
                                                        </td>
                                                        </tr>
                                                        <?php   
                                                        $no++;
                                                        $no2++;
                                                        }
                                                        $no3++;
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <button type="submit" form="formCore" class="btn btn-sm btn-success  pl-3 pr-3">Update Step</button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?= site_url('SuperAdmin/processCreateStep/'.$dataOrder['service_id']) ?>" method="post" class="border p-3 rounded">
                                        <div class="form-group">
                                            <label>Add Step (public step)</label>
                                            <div class="form-group clearfix">
                                                <input type="text" name="name" class=" form-control" placeholder="step name.." required>
                                                <input type="hidden" name="con" value="true">
                                                <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                            </div>
                                            <div class="form-group clearfix">
                                                <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="description.."></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success  pl-3 pr-3">add</button>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="callout callout-danger">
                                        <h5><i class="fas fa-info text-danger"></i> Note:</h5>
                                        if you want to make a step without a sub step to this order, create a step first and then fill in the name of the sub step the same as the step name.
                                    </div>
                                    <form action="<?= site_url('SuperAdmin/processCreateSubStep') ?>" method="post" class="border p-3 rounded">

                                        <div class="form-group">
                                            <label>Add Substep to this order</label>
                                            <div class="form-group clearfix">
                                                <input type="hidden" name="order_id" value="<?= $dataOrder['id']?>">
                                                <input type="text" name="name" class=" form-control" placeholder="sub step name.." required>
                                            </div>
                                            <div class="form-group clearfix">
                                                <small>Select step</small>
                                                <select id="my-select" class="form-control select2" name="step_id" style="width: 100%;">
                                                    <?php
                                                    foreach ($step as $row) {
                                                        echo '<option value="'.$row['id'].'">'.$row['step'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-success  pl-3 pr-3">add</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>]
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