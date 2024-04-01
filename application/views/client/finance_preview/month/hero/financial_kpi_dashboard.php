<!-- Styles -->
<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

    #cash_conversion {
        width: 100%;
        height: 500px;
    }

    .chartCcc {
        width: 100%;
        height: 100%;
        min-height: 300px;
    }

    .chart_vendor_payment {
        width: 100%;
    }

    @media only screen and (max-width: 600px) {
        #cash_conversion {
            width: 600px;
            height: 500px;
        }

        .chart_vendor_payment {
            width: 500px;
        }

        .chartCcc {
            width: 500px;
            height: 100%;
            min-height: 300px;
        }
    }
</style>

<div class="card rounded-0 mt-3 bg-transparent">
    <div class="card-header  bg-dark rounded-0">
        Current Working Capital (<?= date('F Y', strtotime($date)) ?>)
    </div>
    <div class="card-body p-0 pt-3">
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-responsive-md">
                    <tbody>
                        <tr class="bg-dark">
                            <th>Current Assets (Rp.)</th>
                            <th class=" text-right text-nowrap">
                                <?= number_format($cash_management['num_current_aset'], 0, ',', '.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td> Cash and Cash Equivalents</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'KAS DAN SETARA KAS')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Temporary Investment</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'INVESTASI SEMENTARA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Account Receivable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PIUTANG USAHA PIHAK KETIGA')['value'] + $this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>

                        <tr class="bg-light">
                            <td>Other Receivable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PIUTANG LAIN-LAIN PIHAK KETIGA')['value'] + $this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>

                        <tr class="bg-light">
                            <td>Allowance For Doubtful Accounts </td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PENYISIHAN PIUTANG RAGU-RAGU')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Inventory</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'PERSEDIAAN')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Advance and Pre-Paid Expenses</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'BEBAN DIBAYAR DI MUKA')['value'] + $this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'UANG MUKA PEMBELIAN')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Other Current Assets</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'AKTIVA LANCAR LAINNYA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6">
                <table class="table table-responsive-md">
                    <tbody>
                        <tr class="bg-dark">
                            <th>Current Liabilities (Rp.)</th>
                            <th class=" text-right text-nowrap">
                                <?= number_format($cash_management['num_current_liabilities'], 0, ',', '.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Account Payable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG USAHA PIHAK KETIGA')['value'] + $this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Interest Payable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG BUNGA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Tax Payable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG PAJAK')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Dividend Payable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG DIVIDEN')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>

                        <tr class="bg-light">
                            <td>Accrued Expenses</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'BIAYA YANG MASIH HARUS DIBAYAR')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>

                        <tr class="bg-light">
                            <td>Loan Payable</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'HUTANG BANK')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>

                        <tr class="bg-light">
                            <td>Due Date - Long Term Debts</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Customer Advances</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'UANG MUKA PELANGGAN')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-light">
                            <td>Other Current Liabilities</td>
                            <th class=" text-right text-nowrap">
                                <?= number_format($this->M_finance->get_days_sales_outstanding2($user_id, $date . '-02', 'KEWAJIBAN LANCAR LAINNYA')['value'], 0, ',', '.') ?>
                            </th>
                        </tr>


                        <tr class="bg-dark">
                            <th>Working Capital (Rp.)</th>
                            <th class=" text-right text-nowrap">
                                <?= number_format($cash_management['num_current_aset'] - $cash_management['num_current_liabilities'], 0, ',', '.') ?>
                            </th>
                        </tr>
                        <tr class="bg-dark">
                            <th>Current Ratio </th>
                            <th class=" text-right text-nowrap">
                                <?= substr(number_format($cash_management['current_ratio'], 10, '.', ''), 0, 3) ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card rounded-0 h-100">
            <div class="card-header">
                Cash Conversion Cycle Mounth to Mounth (... - <?= date('F Y', strtotime($date)) ?>)
            </div>
            <div class="card-body">
                <div
                    class="d-flex justify-content-around justify-content-md-center align-items-center table-responsive">
                    <div class=" p-md-3 p-1 mr-md-3 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_sales_outstanding']) ?></b> <br> DSO
                    </div>
                    <i class="fa fa-plus mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_inventory_outstanding']) ?></b> <br>
                        DIO
                    </div>
                    <i class="fa fa-minus mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_payable_outstanding']) ?></b> <br>
                        DPO
                    </div>
                    <i class="fa fa-equals mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b
                            class="text-danger h6"><?= round($cash_management['days_sales_outstanding'] + $cash_management['days_payable_outstanding'] - $cash_management['days_inventory_outstanding']) ?></b>
                        <br> CCC
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <div id="chart_conversion" class="chartCcc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-none">
        <div class="card rounded-0 h-100">
            <div class="card-header">
                Vendor Payment Error Rate - Last 12 Months
            </div>
            <div class="card-body">
                <div class="table-responsive rounded ">

                    <div class="chart_vendor_payment"">
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card rounded-0 bg-white shadow-none">
            <div class="card-body">
                <p class="text-justify">
                    &nbsp Our next financial dashboard example provides a general overview of the most prominent KPIs
                    that can be applied to nearly any business or financial department that needs stable and proactive
                    management and operational processes. With the help of financial analytics software, this dashboard
                    was created to answer critical questions on liquidity, invoicing, budgeting, and overall financial
                    stability of a company. Let’s take a closer look at each.
                    <br><br>
                    &nbsp The financial KPI dashboard starts with an overview of your current working capital,
                    consisting of your current assets and current liabilities. This information will provide you with an
                    instant conclusion if your company is liquid, operationally efficient, and financially healthy in
                    short-term. If your working capital is substantially high, you have the potential to invest and
                    grow. On the other hand, if your current assets don’t exceed your current liabilities, the risk of
                    going bankrupt is higher. We can see that on our finance dashboard example, the working capital is
                    $61000, and the current ratio 1.90, which means that the company has enough financial resources to
                    remain solvent in short-term, and on this dashboard, you can conclude that immediately.
                    <br><br>
                    &nbsp The central part of this dashboard focuses on the cash conversion cycle (CCC) in the last 3
                    years. It is important to track trends in the CCC to be able to spot if the cycle is decreasing or
                    increasing. A compact overview on these charts shows us that in the last 3 years, the company has
                    been efficient in converting its investments, inventory, and resources into cash flows since the
                    cash cycle was steadily decreasing over time. Great management indeed.
                    <br><br>
                    &nbsp Below the cash conversion cycle, this dashboard depicts the state of invoicing and paying
                    processes. Wrong address, duplicate payments, incorrect amounts all affect the vendor payment error
                    rate and increase it if the accounts payable department doesn’t control these processes effectively.
                    We can see that in the last year, this rate had few spikes that increased the overall average and
                    affected the department, especially in September. It would be wise to dig deeper into this month to
                    see what exactly happened and what kind of processes need to be updated or adjusted. The next months
                    brought a general decline, which could mean that the lesson has been learned.
                    <br><br>
                    &nbsp We finish our finance dashboard example with stats on net profit margin, quick and current
                    ratio, followed by the budget variance. The full scope can be accessed on our dashboard in
                    full-screen mode. The quick and current ratio will show us the liquidity status of our company while
                    the net profit margin is one of the most important indicators of a company’s financial status and
                    health. It basically shows how much net income is generated as a percentage of revenue. This part of
                    the dashboard clearly demonstrates that the financial state of the company is on track and going
                    well. The budget variance below shows us if our gains are positive or negative. Errors while
                    creating the budget such as wrong assumptions, faulty mathematics or relying on stale data can all
                    lead to changes in the variance. Therefore, it is important to create it as accurately as possible,
                    and this financial reporting dashboard will help you in the process.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card rounded-0 bg-dark">
            <div class="card-body">
                <h5 class="card-title">RELEVANT KPIS AND METRICS</h5> <br> <br>
                <ul>
                    <li><a class="text-white"> Working Capital</a></li>
                    <li><a class="text-white"> Quick Ratio / Acid Test</a></li>
                    <li><a class="text-white"> Cash Conversion Cycle</a></li>
                    <li><a class="text-white"> Vendor Payment Error Rate</a></li>
                    <li><a class="text-white"> Budget Variance</a></li>
                    <!-- <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#working-capital') ?>"> Working Capital</a></li>
                                    <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#quick-ratio') ?>"> Quick Ratio / Acid Test</a></li>
                                    <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#cash-conversion-cycle') ?>"> Cash Conversion Cycle</a></li>
                                    <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#vendor-payment-error-rate') ?>"> Vendor Payment Error Rate</a></li>
                                    <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/' . $user_id . '/#budget-variance') ?>"> Budget Variance</a></li> -->
                </ul>
            </div>
        </div>
        <blockquote class="quote-card border-left-0 m-0">
            <p class="text-justify">
                <?= !empty($quote['FINANCIAL KPI DASHBOARD']) ? $quote['FINANCIAL KPI DASHBOARD'] : 'Quote not yet' ?>
            </p>
            <cite>~ BATS Consulting</cite>
        </blockquote>
    </div>
</div>

<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<?php
include 'formulas/formula_financial_kpi_dashboard.php';
?>

<script>
    const selectedBtn = document.getElementById("fkd");
    selectedBtn.classList.remove("btn-light");
    selectedBtn.classList.add("btn-dark");
</script>
