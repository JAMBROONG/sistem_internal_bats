<style>
    .dot {
        width: 100px;
        height: 100px;
        line-height: 100px;
        border-radius: 50%;
        color: #000;
        text-align: center;
    }

    #myChart8,
    #myChart9,
    #myChart10,
    #breakdowns1,
    #breakdowns2,
    #breakdowns3,
    #breakdowns4,
    #breakdowns5,
    #breakdowns6,
    #breakdowns7,
    #breakdowns8,
    #breakdowns9,
    #breakdowns10,
    #breakdowns11,
    #breakdowns12,
    #breakdowns13 {
        width: 100%;
        height: 100%;
    }

    #myChart11 {
        width: 100%;
        height: 100%;
        padding: 0;
    }
</style>
<?php
function thousandsCurrencyFormat($num) {
    if($num>1000) {
          $x = round($num);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('k', 'm', 'b', 't');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
          $x_display .= $x_parts[$x_count_parts - 1];
          return $x_display;
    }
    return $num;
  }
?>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

<div class="text-center bg-dark pb-3 pt-3">

    <h1 class=" d-none d-md-block">FINANCIAL PERFORMANCE DASHBOARD</h1>
    <h6 class="d-md-none">FINANCIAL PERFORMANCE DASHBOARD</h6>
</div>
<div class="card shadow-none mt-3">
    <div class="card-header bg-danger rounded-0 text-lg-left text-center">FINANCIAL PERFORMANCE DASHBOARD</div>
    <div class="card-body  p-0" style="background-color: black;">
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card rounded-0 h-100 shadow-none">
                            <div class="card-header text-center bg-dark rounded-0">RETURN ON ASSETS (<?=$date?>)</div>
                            <div class="card-body text-center">

                                <?php
                                            foreach ($financial_performance_dashboard['roa'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo '<span class="dot h1 p-0" style="height:auto">'. $key['value'].'%</span>';
                                                }
                                            }
                                            ?>
                                <div id="myChart8"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card rounded-0 h-100 shadow-none">
                            <div class="card-header text-center bg-dark rounded-0">WORKING CAPITAL RATIO (<?=$date?>)</div>
                            <div class="card-body text-center">
                                <?php
                                            foreach ($financial_performance_dashboard['wcr'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo '<span class="dot h1 p-0">'. round($key['value'],1).'</span>';
                                                }
                                            }
                                            ?>
                                <div id="myChart9"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded-0 h-100 shadow-none">
                            <div class="card-header text-center bg-dark rounded-0">RETURN ON EQUITY (<?=$date?>)</div>
                            <div class="card-body text-center">
                                <?php
                                            foreach ($financial_performance_dashboard['roe'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo '<span class="dot h1 p-0">'. round($key['value'],1).'%</span>';
                                                }
                                            }
                                            ?>
                                <div id="myChart10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded-0 h-100 shadow-none">
                            <div class="card-header text-center bg-dark rounded-0">DEBT-EQUITY RATIO (<?=$date?>)</div>
                            <div class="card-body text-center">
                                <?php
                                            foreach ($financial_performance_dashboard['der'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo '<span class="dot h1 p-0">'. round($key['value'],1).'</span>';
                                                }
                                            }
                                            ?>
                                <div id="myChart11"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card rounded-0 h-100 shadow-none mt-3 mt-lg-0">
                    <div class="card-header text-center bg-dark rounded-0">
                        BALANCE SHEET (<?=$date?>)
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="text-bold">
                                    Total Assets<br>Rp.
                                    <?php foreach ($financial_performance_dashboard['total_aset'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns1"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3 d-flex align-items-center">
                                <div class="text-bold">Current Assets <br>Rp.
                                    <?php
                                            foreach ($financial_performance_dashboard['current_aset'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?> </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns2"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Cash <br>
                                    Rp.
                                    <?php
                                            foreach ($financial_performance_dashboard['cash'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?> </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns3"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Account Receivable <br>
                                    Rp. <?php
                                            foreach ($financial_performance_dashboard['a_receivable'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns4"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Inventory <br>Rp.
                                    <?php
                                            foreach ($financial_performance_dashboard['inventory'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?> </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns5"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0">
                            <div class="col-md-3  d-flex align-items-center">
                                <div class="text-bold">Long-Term Assets <br>Rp. <?php
                                            foreach ($financial_performance_dashboard['long_term_asset'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 rounded-0  shadow-none">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div class="text-bold">Total Liabilities <br>Rp.
                                    <?php
                                            foreach ($financial_performance_dashboard['t_liabilities'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?> </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns7"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div class="text-bold">Current Liabilities <br>
                                    Rp. <?php
                                    foreach ($financial_performance_dashboard['current_liabilities'] as $key) {
                                        if ($key['tahun'] == $date) {
                                            echo number_format($key['value'],0,',','.');
                                        }
                                    }
                                ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns8"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Accounts Payable <br>
                                    Rp. <?php
                                    foreach ($financial_performance_dashboard['account_payable'] as $key) {
                                        if ($key['tahun'] == $date) {
                                            echo number_format($key['value'],0,',','.');
                                        }
                                    }
                                ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns9"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Other Liabilities <br> Rp. <?php
                                            foreach ($financial_performance_dashboard['other_liabilities'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns10"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div class="text-bold">Shareholder Equity <br> Rp. <?php
                                            foreach ($financial_performance_dashboard['shareholder_equity'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns11"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Common Stock <br>Rp. <?php
                                            foreach ($financial_performance_dashboard['common_stock'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns12"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3  d-flex align-items-center">
                                <div>Current Earnings <br>Rp. <?php
                                            foreach ($financial_performance_dashboard['current_earnings'] as $key) {
                                                if ($key['tahun'] == $date) {
                                                    echo number_format($key['value'],0,',','.');
                                                }
                                            }
                                            ?></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns13"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card rounded-0 shadow-none">
            <div class="card-body">
                <p class="text-justify">
                    &nbsp; Our last financial dashboard example gives you an overview of how efficiently you spend your capital and gives you an overview of the main metrics on your balance sheet. It is broken down into four visualizations of your return on assets (ROA), working capital ratio (WCR), return on equity (ROE) and debt-equity ratio (DER). These four key performance indicators give an immediate understanding of trends in how your company’s assets are being managed. The balance sheet breakdown shows how your current assets (cash, account receivable, inventory) as well as your long-term assets, and it also provides information about your total liabilities, depicted by the two subcomponents of current liabilities and shareholder equity.
                    <br><br>
                    &nbsp; This financial dashboard template provides you valuable information about the capital structure of your company. The debt-equity ratio measures how much debt you are using to finance your assets and operations in comparison to the equity available. It is calculated by dividing your total liabilities by your shareholders’ equity. return on assets, and even more importantly return on equity, are key figures on the stock market when it comes to evaluating your company as an investment opportunity. The more debt a company has, the larger is its ROE compared to its ROA.
                    <br><br>
                    &nbsp; This financial dashboard example closely monitors these two ratios to ensure that you can maintain control over these extremely important financial aspects of your company in real-time. Letting these ratios go unchecked is a recipe for disaster and can lead to unexpected losses, bankruptcy, and loss of client base or assets. Furthermore, return on assets is a critical litmus-test of your company’s success and is a major indicator to potential investors. Companies with low return on assets face severe difficulties whilst attempting to attract investors. Shareholders and investors will further be aware of your return on equity, which ultimately represents to them how much money your company will return on their investments. Use this financial performance dashboard to keep a close eye on these essential aspects of your company’s progress and ensure its long-term viability and success.
                    <br><br>
                    &nbsp; We have demonstrated the power of data visualization in financial performance, monitoring, and analysis. These dashboards can be used by c-level management, department managers, professionals, and finance experts that need a clear overview and mastery over their data. Whether you need to build your own financial reporting dashboard, select and combine own KPIs and strategies or simply have an accurate representation and monitoring processes, try our software for a 14-day trial, completely free!
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card rounded-0 bg-danger">
            <div class="card-body">
                <h5 class="card-title">RELEVANT KPIS AND METRICS</h5> <br> <br>
                <ul>
                    <li><a class="text-white"> Return on Assets</a></li>
                    <li><a class="text-white"> Return on Equity</a></li>
                    <li><a class="text-white"> Working Capital</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
include 'formulas/formula_financial_performance_dashboard.php';
?>