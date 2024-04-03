<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Client</title>
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
                                <li class="breadcrumb-item"><a href="<?=base_url('SuperAdmin/dataUser')?>">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create Admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-title text-center text-dark">Create Admin</a>
                                </div>
                                <div class="card-body">
                                        <form class="form-horizontal" action="<?= site_url('superAdmin/processCreateAdmin') ?>" method="post">
                                            <div class="form-group">
                                                    <label for="inputName">Name</label>
                                                    
                                                        <input type="text" class="form-control" id="inputName" value="" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName">Position</label>
                                                    
                                                        <input type="text" class="form-control" id="inputName" value="" name="position" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName2">Phone</label>
                                                    
                                                        <input type="number" class="form-control" id="inputName2" value="" name="phone" placeholder="Phone" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Email</label>
                                                    
                                                        <input type="email" class="form-control" id="inputEmail" value="" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Password</label>
                                                    
                                                        <input type="password" class="form-control" id="inputEmail" value="" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">NIK</label>
                                                    
                                                        <input type="number" class="form-control" id="inputEmail" value="" name="NIK" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputName2">NPWP</label>
                                                    
                                                        <input type="text" class="form-control" id="inputName2" value="" name="NPWP" placeholder="NPWP">
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Company</label>
                                                    
                                                        <select name="company_id" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2" required>
                                                            <?php
                                            foreach ($company as $row) {
                                                ?> 
                                                <option value="<?= $row['id'] ?>">
                                                <?= $row['company'] ?>
                                                </option> 
                                            <?php
                                            }
                                            ?>
                                                        </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputEmail">Nationality</label>
                                                    
                                                        <select name="nationality" class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                                                        <?php
                                            foreach ($country as $row) {
                                                
                                                ?> <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option> <?php
                                            }
                                            ?>
                                                        </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label for="inputExperience">Address</label>
                                                    
                                                        <textarea class="form-control" id="inputExperience" name="address" placeholder="Address" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <a href="<?php echo base_url('superAdmin/dataClient'); ?>" class="btn btn-danger pl-3 pr-3"><i class="fa fa-arrow-left mr-1"></i>back</a>
                                                    <button type="submit" class="btn btn-success">Create</button>
                                                </div>
                                            </form>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> <?php include 'footer.php';?>
</body>

</html>