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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<?php
$dataOld = [];
foreach ($sptClient as $key) {
    array_push($dataOld,$key['spt_tahunan_id']);
}
$checked = "";
?>

<style>
    footer {
        display: none;
    }
</style>

<body class="hold-transition sidebar-mini lyt mt-5">
    <div class="wrapper shadow rounded">

        <section class="content">
            <div class="">
                <div class="main-body">
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/finance_core/'.$user_id)?>">Core</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Formula Set</li>
                        </ol>
                    </nav>
                </div>
                <?php
                if (empty($date)) {
                ?>

                <div class="card shadow-none">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-6 d-flex align-items-center justify-content-center text-center">
                            <p>Input data will be displayed by month and year, <br> please select the month and year you want to display</p>
                        </div>
                        <form action="<?= base_url('SuperAdmin/finance_formula/'. $user_id)?>" class="form col-6" method="post">
                            <div class="form-group">
                                <label for="">Select Date</label>
                                <input type="hidden" name="client_id" value="<?= $user_id ?>">
                                <input type="month" name="date" id="date" value="<?= date('Y-m') ?>" class="form-control date" required>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-eye mr-2"></i> view data</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <?php
    return false;
    } 
?>
        <div class="card shadow-none">
            <div class="card-body d-flex justify-content-center">
                <div class="col-6 d-flex align-items-center justify-content-center text-center">
                    <p>Input data will be displayed by month and year, <br> please select the month and year you want to display</p>
                </div>
                <form action="<?= base_url('SuperAdmin/finance_formula/'. $user_id)?>" class="form col-6" method="post">
                    <div class="form-group">
                        <label for="">Select Date</label>
                        <input type="hidden" name="client_id" value="<?= $user_id ?>">
                        <div class="row">
                            <div class="col">
                                <input type="month" name="date" id="date" value="<?= $date ?>" class="form-control date" required>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success"><i class="fa fa-eye mr-2"></i> view data</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card m-3 shadow-none">
            <div class="card-header">
                <div class="card-title">
                    SPT <?= $client['name'] .' '.$company_type['type']?>
                </div>
                <div class="card-tools">
                    <div class="card-title">Date: <b><?= date("F Y", strtotime($date));?></b></div>
                </div>
            </div>
            <div class="card-body">
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
                <div class="d-flex justify-content-end">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-manage"><i class="fa fa-cog mr-2"></i>manage value</button>
                </div>
                <div class="modal fade " id="modal-manage">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form action="<?=site_url('SuperAdmin/manageFormula')?>" method="post" id="form1">
                                    <div class="form-group">
                                        <label for="my-select">Select Data</label>
                                        <input type="hidden" name="user_id" value="<?=$user_id?>">
                                        <input type="hidden" name="date" value="<?=$date?>">
                                        <select id="my-select" class="form-control select2" name="dataName">
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
                                    <div class="d-flex justify-content-between">
                                        <input class="btn btn-success btn-sm" type="submit" value="manage">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mt-5">1. FINANCIAL KPI</h6>
                <div class="row">
                    <div class="col table-responsive">
                        <table class="table table-hover shadow-sm rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th>Current Assets</th>
                                    <th><?= "Rp " . number_format($formulaFinance['Current Assets'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Cash</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Cash'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Accounts Receivable</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Accounts Receivable'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Inventory</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Inventory'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Pre-Paid Expenses</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Pre-Paid Expenses'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                            </tbody>
                            <tfoot class=" thead-light">
                                <tr>
                                    <th>Working Capital</th>
                                    <th><?= "Rp " . number_format($formulaFinance['Working Capital'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr>
                                    <th>Current Ratio</th>
                                    <th><?= "Rp " . number_format($formulaFinance['Current Ratio'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col table-responsive">
                        <table class="table table-hover shadow-sm rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th>Current Liabilities</th>
                                    <th><?= "Rp " . number_format($formulaFinance['Current Liabilities'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Accounts Payable</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Accounts Payable'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Creadit Card Debt</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Credit Card Debt'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Bank Operating Credit</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Bank Operating Credit'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Accured Expenses</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Accured Expenses'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Taxes Payable</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Taxes Payable'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h6 class="mt-5">2. PROFIT AND LOSS DASHBOARD</h6>
                <div class="row">
                    <div class="col table-responsive">
                        <table class="table table-hover rounded shadow-sm">
                            <tbody>
                                <tr class="thead-light">
                                    <th>Revenue</th>
                                    <th><?= "Rp " . number_format($formulaFinance['Revenue'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr class="thead-light">
                                    <th>COGS</th>
                                    <th><?= "Rp " . number_format($formulaFinance['COGS'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr class="thead-light">
                                    <th>GROSS PROFIT</th>
                                    <th><?= "Rp " . number_format($formulaFinance['GROSS PROFIT'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr class="thead-light">
                                    <th>OPERATING PROFIT (EBIT)</th>
                                    <th><?= "Rp " . number_format($formulaFinance['OPERATING PROFIT (EBIT)'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr>
                                    <td>Interest and Tax</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Interest and Tax'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr class="thead-light">
                                    <th>NET PROFIT</th>
                                    <th><?= "Rp " . number_format($formulaFinance['NET PROFIT'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col table-responsive">
                        <table class="table table-hover rounded shadow-sm">
                            <tbody>
                                <tr class="thead-light">
                                    <th>OPEX</th>
                                    <th><?= "Rp " . number_format($formulaFinance['OPEX'],2,',','.'); ?></th>
                                    <!-- <th><button class="btn btn-sm btn-default">detail</button></th> -->
                                </tr>
                                <tr>
                                    <td>Sales</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Sales'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Marketing</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Marketing'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>General & Admin</td>
                                    <td><?= "Rp " . number_format($formulaFinance['General & Admin'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Other Incomes</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Other Incomes'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                                <tr>
                                    <td>Other Expenses</td>
                                    <td><?= "Rp " . number_format($formulaFinance['Other Expenses'],2,',','.'); ?></td>
                                    <!-- <td><button class="btn btn-sm btn-default">detail</button></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- AdminLTE App -->
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