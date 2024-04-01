<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formula Finance</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini lyt mt-5">
    <div class="wrapper shadow rounded">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/finance_core/'.$user_id)?>">Core</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/finance_formula/'.$user_id)?>">Formula Set</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </nav>
        </div>
        
        <div class="card shadow-none">
            <div class="card-body row">
                <div class="col-md-4">
                    <form action="<?=site_url('SuperAdmin/manageFormula')?>" method="post" id="form1">
                        <div class="form-group">
                            <label for="my-select">Select Data</label>
                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                            <input type="hidden" name="date" value="<?=$date?>">
                            <select id="my-select" class="form-control select2" name="dataName">
                                <option value="<?=$dataName?>"><?= $dataName ?></option>
                                <option value="Current Assets">Current Assets</option>
                                <option value="Cash">Cash</option>
                                <option value="Accounts Receivable">Accounts Receivable</option>
                                <option value="Inventory">Inventory</option>
                                <option value="Pre-Paid Expenses">Pre-Paid Expenses</option>
                                <option value="Working Capital">Working Capital</option>
                                <option value="Current Ratio">Current Ratio</option>
                                <option value="Current Liabilities">Current Liabilities</option>
                                <option value="Accounts Payable">Accounts Payable</option>
                                <option value="Credit Card Debt">Credit Card Debt</option>
                                <option value="Bank Operating Credit">Bank Operating Credit</option>
                                <option value="Accured Expenses">Accured Expenses</option>
                                <option value="Taxes Payable">Taxes Payable</option>
                                <option value="Revenue">Revenue</option>
                                <option value="COGS">COGS</option>
                                <option value="GROSS PROFIT">GROSS PROFIT</option>
                                <option value="GROSS PROFIT MARGIN">GROSS PROFIT MARGIN</option>
                                <option value="OPERATING PROFIT (EBIT)">OPERATING PROFIT (EBIT)</option>
                                <option value="OPERATING PROFIT MARGIN">OPERATING PROFIT MARGIN</option>
                                <option value="Interest and Tax">Interest and Tax</option>
                                <option value="NET PROFIT">NET PROFIT</option>
                                <option value="NET PROFIT MARGIN">NET PROFIT MARGIN</option>
                                <option value="OPEX RATIO">OPEX RATIO</option>
                                <option value="QUICK RATIO">QUICK RATIO</option>
                                <option value="OPEX">OPEX</option>
                                <option value="Sales">Sales</option>
                                <option value="Marketing">Marketing</option>
                                <option value="General & Admin">General & Admin</option>
                                <option value="Other Incomes">Other Incomes</option>
                                <option value="Other Expenses">Other Expenses</option>
                                <option value="Total Liabilities">Total Liabilities</option>
                                <option value="Long Term Assets">Long Term Assets</option>
                            </select>
                        </div>
                        <button class="btn btn-success btn-sm" type="submit" form="form1"><i class="fa fa-cog mr-2"></i>manage</button>
                    </form>
                </div>
                <div class="col-md-8 d-flex align-items-center justify-content-center">
                    <div>
                    SPT <?= $client['name'] .' '.$company_type['type']?> <div>Date: <b><?= date("F Y", strtotime($date));?></b></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card m-3 shadow-none">
            <div class="card-body pt-0">
                <?php
            if (empty($sptClient)) {
                ?>

                <div class="jumbotron text-center">
                    <p class="lead">Not Found</p>
                    <hr class="my-4">
                    <p>404</p>
                </div>

                <?php
                include 'footer.php';
                return false;
            }
            ?>
                <hr class="mt-0">
                <p class="text-muted text-center">manage formula <b><?= $dataName ?></b></p>
                <hr>
                <?php
                if ($value["$dataName"] == 0) {?>
                        <div class="row mb-3 rounded p-3" style="background-color: #e9ecef;">
                            <div class="col-md-6">
                                <div class="card shadow-none mb-0"> 
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $dataName ?> formula now:</h5>
                                        <p class="card-text text-bold"><?= ($formulas['formula']=="") ? '-' : $formulas['formula']  ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Value:</h5>
                                        <p class="card-text text-bold"><?php 
                                        if (count($value) < 0) {
                                            $name = "'$dataName'"; 
                                            $name[strlen($name)] = "'"; 
                                            $name = substr($name, 0, -1);
                                            echo "Rp " . number_format($value[$name],2,',','.');
                                        }else{
                                            echo "Rp " . number_format($value["$dataName"],2,',','.');
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                } else{
                    if ($value[$dataName]) {?>
                        <div class="row mb-3 rounded p-3" style="background-color: #e9ecef;">
                            <div class="col-md-6">
                                <div class="card shadow-none mb-0"> 
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $dataName ?> formula now:</h5>
                                        <p class="card-text text-bold"><?= $formulas['formula'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Value:</h5>
                                        <p class="card-text text-bold"><?= "Rp " . number_format($value[$dataName],2,',','.');  ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <?php
                    }
                }
                ?>
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Rumus 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Rumus 2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Rumus 3</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Rumus 4</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <?php 
                                include'components/rumus1.php';
                            ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                            <?php 
                                include'components/rumus2.php';
                            ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                            <?php 
                                include'components/rumus3.php';
                            ?>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                            <?php 
                                include'components/rumus4.php';
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                $('.select2')
                    .select2()
            });
        </script>
</body>

</html>