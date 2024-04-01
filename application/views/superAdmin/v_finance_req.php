<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php $this->load->view('superAdmin/header'); ?>
</head>

<body class="hold-transition sidebar-mini lyt mt-5">
    <div class="m-5">

        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url()?>">Home</a></li>
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                    <li class="breadcrumb-item text-sm active" aria-current="page">Month or Year</li>
                </ol>
            </nav>
        </div>
        <?php
        if (empty($company_type)) {
            ?>
            <div class="card shadow-none">
                    <div class="card-header">
                        <div class="card-title">Change Type SPT Company to Start</div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('SuperAdmin/createTypeCompanyClient')?>" method="post">
                            <div class="form-group">
                                <label for="">Select Type SPT</label>
                                <input type="hidden" name="client_id" value="<?= $user_id ?>">
                                <select name="type_company_id" class="form-control" id="">
                                    <?php
                                        foreach ($type as $key) {
                                            echo '<option value="'.$key['id'].'">'.$key['type'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <button type="button" data-toggle="modal" data-target="#my-modal" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save</button>
                            <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>You will not be able to change the type again, are you sure you want to choose it?</p>
                                            
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
        } else{
        ?>
        <h6 class="p-3">
            Select type management:
        </h6>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-dark bg-light" style="cursor: pointer;" data-toggle="modal" data-target="#month">
                        <p class="card-text text-center">MONTH</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-dark bg-light" style="cursor: pointer;" data-toggle="modal" data-target="#year">
                        <p class="card-text text-center">YEAR</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="month" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Month</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?=base_url('SuperAdmin/finance_core')?>" id="form1" method="get">
                                <input type="hidden" name="type" value="month">
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <input type="month" required value="<?=date('Y-m')?>" class="form-control" name="date" id="id_month">
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="return fun_submit('#form1','id_month')" class="btn btn-sm btn-primary">Manage Dashboard <i class="ml-1 fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="year" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Year</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?=base_url('SuperAdmin/finance_core')?>" id="form2" method="get">
                                <input type="hidden" name="type" value="year">
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <select class="js-example-basic-single" style="width:100%;" name="date" id="years">
                                    <?php
                                    for ($i= 2023; $i > 1900 ; $i--) { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="return fun_submit('#form2','years')" class="btn btn-sm btn-primary">Manage Dashboard <i class="ml-1 fa fa-arrow-circle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <script>
        function fun_submit(x, y) {
            var y = document.getElementById(y).value;
            if (y == "") {
                alert('Field tidak boleh kosong');
            } else {
                $(x).submit();
            }
        }
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</body>

</html>