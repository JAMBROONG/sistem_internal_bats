<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Project</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataProject')?>">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <a class="card-title" href="#settings" data-toggle="tab">Create Project</a>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="settings">
                                            <form class="form-horizontal" action="<?= site_url('superAdmin/processCreateProject') ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="inputName">Name</label>
                                                            <input type="text" class="form-control" id="inputName" value="" name="name" placeholder="ex: Bookkeeping" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail">Category</label>
                                                            <select name="category_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                                                <?php
                                            foreach ($category as $row) {
                                                ?> <option value="<?= $row['id'] ?>"><?php echo $row['category_service']; echo ($row['category_service'] == 'Other') ? " (default)" : "";  ?></option> <?php
                                            }
                                            ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">

                                                        <div class="form-group ">
                                                            <label for="inputName">Description</label>
                                                            <textarea name="description" id="" cols="30" rows="10" class="form-control" required placeholder="Bookkeeping is.."></textarea>
                                                        </div>
                                                        <div class="form-group ">
                                                            <a href="<?php echo base_url('superAdmin/dataProject'); ?>" class="btn btn-danger pl-3 pr-3 btn-sm"><i class="fa fa-arrow-left mr-1"></i>cancel</a>
                                                            <button type="submit" class="btn btn-success ml-1 btn-sm"> <i class="fa fa-save mr-1"></i> Save</button>
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
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>