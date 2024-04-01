<style>
    #chartdiv2,
    #chartdiv3,
    #chartInventory {
        width: 100%;
        height: 300px;
    }

    #chartDiv1,
    #myChart {
        width: 100%;
        height: 100%;
    }

    @media only screen and (max-width: 600px) {

        #myChart {
            width: 600px;
        }

        #myChart2,
        #myChartInventory {
            width: 400px;
        }
    }
</style>

<div class="card shadow-none mt-3">
    <div class="card-header bg-dark">WORKING CAPITAL (<?= date('F, Y', strtotime($date)) ?>)</div>
    <div class="card-body p-0 pt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="row h-100">
                    <div class="col-sm-6 col-md-12 mb-3">
                        <div class="card h-100 shadow">
                            <div class="card-body p-0  d-flex align-items-center justify-content-center">
                                <div>
                                    <h5 class="text-center">QUICK RATIO</h5><br>
                                    <h1 class="text-center"><i class="fas fa-exclamation-circle text-danger mr-2"></i>
                                        <?= substr(number_format($cash_management['quick_ratio'], 10, '.', ''), 0, 3) ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12 mb-2 mb-lg-0">
                        <div class="card h-100 shadow">
                            <div class="card-body p-0 d-flex align-items-center justify-content-center">
                                <div>
                                    <h5 class="text-center">CURRENT RATIO</h5><br>
                                    <h1 class="text-center"><i
                                            class="fa fa-check-circle text-success mr-2"></i><?= substr(number_format($cash_management['current_ratio'], 10, '.', ''), 0, 3) ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card h-100 shadow mt-sm-2 mt-md-0">
                    <div class="card-body">
                        <div class="row h-100">
                            <div class="col-md-4 mb-4">
                                <h5 class="text-center">Cash Balance</h5><br>
                                <h1 class="text-center"><?= format_angka($cash_management['cash_latest']['value']) ?>
                                </h1>
                                <br>
                                <hr>

                                <div class="d-flex justify-content-between">
                                    <div class=" text-wrap">Cash Balance In</div>
                                    <div>
                                        <?= !empty($data_tambahan['Cash Balance In']) ? 'Rp. ' . number_format($data_tambahan['Cash Balance In'], 0, ',', '.') : 0 ?>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class=" text-wrap">Cash Balance Out</div>
                                    <div>
                                        <?= !empty($data_tambahan['Cash Balance Out']) ? 'Rp. ' . number_format($data_tambahan['Cash Balance Out'], 0, ',', '.') : 0 ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h5 class="text-center">CASH | at end of month</h5>
                                <div class="table-responsive">
                                    <div id="chartDiv1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-none">
    <div class="card-header   bg-dark text-center text-md-left">CASH CONVERSION (<?= date('F Y', strtotime($date)) ?>)
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3">DAYS SALES OUTSTANDING <br>
                            <small><?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div id="chartdiv2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3">DAYS INVENTORY OUTSTANDING<br>
                            <small><?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div id="chartInventory"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3">DAYS PAYABLE OUTSTANDING<br>
                            <small><?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div id="chartdiv3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3">AR TURNOVER VS. AP TURNOVER<br> <small>... -
                                <?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div class="table-responsive">
                            <div id="myChart"></div>
                        </div>
                        <div class="d-flex justify-content-around text-center">
                            <small class="mr-2"><i class="fa fa-square mr-2" style=" color:#cee573"></i>Accounts
                                Receivable Turnover</small>
                            <small><i class="fa fa-square mr-2" style=" color:#648405"></i>Accounts Payable
                                Turnover</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3">INVENTORY<br> <small>... -
                                <?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div class="table-responsive mb-2">
                            <div id="myChartInventory"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card h-100 shadow">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3">ACCOUNTS PAYABLE BY PAYMENT TARGET<br>
                            <small><?= date('F Y', strtotime($date)) ?></small></h5><br>
                        <div class=" table-responsive mb-2">
                            <div id="myChart2"></div>
                        </div>
                        <div
                            class=" d-flex justify-content-center flex-column flex-lg-row align-items-center justify-content-lg-around table-responsive flex-column flex-md-row">
                            <small class="mr-2 text-center"><i class="fa fa-square mr-2 text-center"
                                    style=" color:#400030ff"></i>
                                <br>not due</small>
                            <small><i class="fa fa-square mr-2 text-center" style=" color:#6b275aff"></i>
                                < 30 <br> days
                            </small>
                            <small><i class="fa fa-square mr-2 text-center" style=" color:#ba3d5dff"></i>
                                < 60 <br> days
                            </small>
                            <small><i class="fa fa-square mr-2 text-center" style=" color:#e16b5fff"></i>
                                < 90 <br> days
                            </small>
                            <small><i class="fa fa-square mr-2 text-center" style=" color:#fe9085ff"></i> > 90 <br>
                                days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card  shadow-none bg-transparent" id="cash_management_dashboard">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-none bg-white">
                    <div class="card-body">
                        <p class="text-justify">
                            &nbsp; This financial dashboard template provides an overview of your liquidity and current
                            cash flow situation while providing you with a strong indication or how you can improve
                            these metrics situation by optimizing processes handling accounts payable and accounts
                            receivable. In detail, it is giving you a quick overview of the quick ratio, current ratio,
                            cash balance, and your outstanding debts.
                            <br><br>
                            &nbsp; At first, the cash management dashboard examines your current ratio and your quick
                            ratio. The current ratio is a financial metric that indicates the liquidity of a company and
                            its ability to pay short-term liabilities (debt and payables) with its short-term assets
                            (cash, inventory, receivables). This KPI is simply the ratio between current liabilities and
                            current assets and demonstrates the flexibility your company has in immediately using the
                            money for acquisitions or to pay off debts. You should always aim to have a ratio higher
                            than 1:1 to make sure that you can pay your obligations at any time. This financial
                            dashboard affords you the opportunity to immediately ensure that your company has the
                            financial fluidity that it needs to survive and thrive.
                            <br><br>
                            &nbsp; The quick ratio, also referred to as an acid test ratio, gives a more conservative
                            view on the liquidity situation and does not include inventory and other less liquid assets
                            as part of the short-term assets to meet the liabilities. If your current assets include a
                            lot of inventory, your acid test ratio will be much lower than your current ratio. Similar
                            to the current ratio, a quick ratio greater than 1 indicates that your business is able to
                            pay the current liabilities with the most liquid assets. Both ratios in this financial
                            dashboard template are greatly influenced by your accounts payable and accounts receivable
                            turnover, which measure on the one hand at which speed you pay your own bills and on the
                            other hand how fast you are collecting your payments owed.
                            <br><br>
                            &nbsp; Last but not least our financial dashboard example provides immediate visualization
                            of your current accounts payable and accounts receivable situation. It affords you an
                            opportunity to quickly reflect on your current expenditures and money to be collected in
                            order to ensure that no payments remain outstanding for too long, and similarly that
                            payments you owe do not take you into arrears. At the bottom of the dashboard, the accounts
                            receivable information is broken down over the course of a year, whereby you may analyze
                            payment and debt collection patterns as they relate to your current and quick ratios, the
                            two litmus tests of the financial liquidity and stability of your enterprise.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">RELEVANT KPIS AND METRICS</h5> <br> <br>
                        <ul>
                            <!-- <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#current-ratio') ?>"> Current Ratio</a></li>
                                <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#accounts-payable-turnover') ?>"> Accounts Payable Turnover</a></li>
                                <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#accounts-receivable-turnover') ?>"> Accounts Receivable Turnover</a></li> -->

                            <li><a class="text-white"> Current Ratio</a></li>
                            <li><a class="text-white"> Accounts Payable Turnover</a></li>
                            <li><a class="text-white"> Accounts Receivable Turnover</a></li>
                        </ul>
                    </div>
                </div>
                <blockquote class="quote-card border-left-0 m-0">
                    <p class="text-justify">
                        <?= !empty($quote['CASH MANAGEMENT DASHBOARD']) ? $quote['CASH MANAGEMENT DASHBOARD'] : 'Quote not yet' ?>
                    </p>
                    <cite>~ BATS Consulting</cite>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<?php
include 'formulas/formula_cash_management_dashboard.php';
?>

<script>
    const selectedBtn = document.getElementById("cmd");
    selectedBtn.classList.remove("btn-light");
    selectedBtn.classList.add("btn-dark");
</script>
