<style>
    #opex_chart,#chart_montOpex,#chartCOGS {
        width: 90%;
        height: 400px;
    }

    #earning_chart {
        width: 100%;
        height: 300px;
    }

    @media only screen and (max-width: 600px) {

        #opex_chart,#chartCOGS,
        #chart_montOpex,
        #earning_chart {
            width: 600px;
        }
    }
</style>
<?php
function v($num){
  if ($num < 0) {
    $num = abs($num);
    return '('.number_format($num,0,',','.').')';
  } else {
  return number_format($num,0,',','.');
  }
}
?>

<div class="text-center bg-dark pb-3 pt-3">
    
<h1 class=" d-none d-md-block">PROFIT AND LOSS DASHBOARD</h1>
            <h6 class="d-md-none">PROFIT AND LOSS DASHBOARD</h6>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-lg-6">
                <div class="card rounded-0 h-100">
                    <div class="card-header bg-danger rounded-0">
                        INCOME STATEMENT (<?=$date?>) (Rp.)
                    </div>
                    <div class="card-body pb-0">
                        <div class="table-responsive">
                            <dl>
                                <dd class=" d-flex justify-content-between p-2">Net Sales
                                    <small><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENJUALAN BERSIH")['value'])?></small>
                                </dd>
                                <dd class=" d-flex justify-content-between p-2">COGS
                                    <small><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HARGA POKOK PENJUALAN")['value'])?></small>
                                </dd>
                                <dt class=" d-flex justify-content-between bg-light p-2">GROSS PROFIT
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA KOTOR")['value'])?></small>
                                </dt>
                                <dt class=" d-flex justify-content-between bg-light p-2">OPEX
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN PENJUALAN")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'])?></small>
                                </dt>
                                <dd class=" d-flex justify-content-between p-2">&nbsp;&nbsp; Marketing & Sales
                                    <small><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN PENJUALAN")['value'])?></small>
                                </dd>
                                <dd class=" d-flex justify-content-between p-2">&nbsp;&nbsp; General & Admin
                                    <small><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN ADMINISTRASI DAN UMUM")['value'])?></small>
                                </dd>
                             
                                <dt class=" d-flex justify-content-between bg-light p-2">OPERATING PROFIT (EBIT)
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA USAHA")['value'])?></small>
                                </dt>
                                <dt class=" d-flex justify-content-between bg-light p-2">OTHER INCOME/(EXPENSES)
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENGHASILAN/(BEBAN) LAIN")['value'])?></small>
                                </dt>
                                <dt class=" d-flex justify-content-between bg-light p-2">PROFIT/LOSS BEFORE INCOME TAX
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA/RUGI SEBELUM PAJAK PENGHASILAN")['value'])?></small>
                                </dt>
                                <dd class=" d-flex justify-content-between p-2">&nbsp;&nbsp; Interest and Tax
                                    <small><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN (MANFAAT) PAJAK PENGHASILAN")['value'])?></small>
                                </dd>
                                <dt class=" d-flex justify-content-between bg-light p-2">NET PROFIT
                                    <small class="text-bold"><?= format_angka($this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"LABA BERSIH")['value'])?></small>
                                </dt>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 rounded-0">
                  <div class="card-body">
                  <div class="d-flex justify-content-around align-items-center h-100">
                    <div class="d-flex justify-content-around align-items-center flex-column h-100">
                        <div class="text-center">
                            <input type="text" id="knob1" class="knob" value="<?=$profit_and_loss_dashboard['gpm']?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                            <div class="knob-label text-sm">GROSS PROFIT MARGIN</div>
                        </div>
                        <div class="text-center">
                            <input type="text" id="knob2" class="knob" value="<?=$profit_and_loss_dashboard['opex']?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                            <div class="knob-label text-sm">OPEX RATIO</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around align-items-center flex-column h-100">
                        <div class="text-center">
                            <input type="text" id="knob3" class="knob" value="<?=$profit_and_loss_dashboard['opm']?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                            <div class="knob-label text-sm">OPERATING PROFIT MARGIN</div>
                        </div>
                        <div class="text-center">
                            <input type="text" id="knob4" class="knob" value="<?=$profit_and_loss_dashboard['npm']?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                            <div class="knob-label text-sm">NET PROFIT MARGIN</div>
                        </div>
                    </div>
                </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
              <div class="card p-0 h-100 rounded-0">
                  <div class="card-header text-center text-md-left  bg-danger rounded-0">
                      <h4>Net Sales & COGS (<?=$date?>)</h4>
                      <small>Year-to-Year | YTD</small>
                  </div>
                  <div class="card-body p-0 d-flex justify-content-center">
                        <div id="chartCOGS"></div>
                  </div>
              </div>
            </div>
            <div class="col-md-6 mt-3 mt-lg-0">
              <div class="card p-0 h-100 rounded-0">
                  <div class="card-header text-center text-md-left  bg-danger rounded-0">
                      <h4>OPEX (<?=$date?>)</h4>
                      <small>In Year | YTD</small>
                  </div>
                  <div class="card-body p-0  d-flex justify-content-center">
                        <div id="chart_montOpex"></div>
                  </div>
              </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
              <div class="card p-0 h-100 rounded-0">
                  <div class="card-header text-center text-md-left  bg-danger rounded-0">
                      <h4>OPEX (<?=$date?>)</h4>
                      <small>Year-to-Year | YTD</small>
                  </div>
                  <div class="card-body p-0  d-flex justify-content-center">
                        <div id="earning_chart"></div>
                  </div>
              </div>
            </div>
            <div class="col-md-6 mt-3 mt-lg-0">
              <div class="card p-0 h-100 rounded-0">
                  <div class="card-header text-center text-md-left  bg-danger rounded-0">
                      <h4>Earning before Interest and Taxes (<?=$date?>)</h4>
                      <small>Year-to-Year | YTD</small>
                  </div>
                  <div class="card-body p-0  d-flex justify-content-center">
                          <div id="opex_chart"></div>
                  </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="card rounded-0 shadow-none">
                    <div class="card-body">
                        <p class="text-justify">
                            &nbsp; This finance dashboard example provides an easy to understand overview of the income statement from revenue to net profit, enhanced by relevant performance ratios. The finance dashboard centers around four important financial indicators; gross profit margin, OPEX ratio, operating profit margin, and net profit margin. The heads-up information, right at your fingertips, can be further utilized to reveal month-to-month trends in the OPEX ratio and the constituent subcomponents of that ratio, as well as year-to-date statistics of earnings before interest and taxes (EBIT). Finally, the financial dashboard gives a succinct breakdown of the four financial category subcomponents of the overall income statement.
                            <br><br>
                            &nbsp; We start with revenue which is mainly influenced by selling price and number of units sold and is indicated without taking into account other expenditures or taxes. Subtracting the cost of goods sold shows the gross profit of your company and indicates the earnings after expenditures. OPEX refers to the costs that your company incurs as a result of performing its normal business operations. These “unavoidable” costs are inherent in any business operation but imperative to understand completely. In this finance dashboard template, we specifically look at the OPEX for sales, marketing, it, and general & administrative expenses. We also include other income and expenses in the P&L statement which might include costs incurred from restructuring and currency exchange, amongst others. The resulting earnings before interest and taxes (EBIT) and especially its trend is one of the main metrics to describe the financial situation of a company. At the end - after (subtracting) all cost related to interest and tax payments - you have your net profit. The net profit is the standard calibration for evaluating the success or failure of a company or certain aspects of its operations.
                            <br><br>
                            &nbsp; Next to the profit & loss statement, this profit and loss dashboard shows important performance metrics that describe the health of your business and the profitability of your operations. When comparing these KPIs across companies, it is important to consider that the figures might change significantly across different industries, however, this is a standard means of evaluating financial company performance so comparisons can be made equitably and reliable. With this finance dashboard template, you have this crucial information at your fingertips for real-time monitoring, which enables you to take the right actions at the right time.
                            <br><br>
                            &nbsp; The gross profit margin shows the percentage of total sales revenue remaining after accounting for all direct costs associated with producing your goods or services. It indicates to what extent your efforts in this company, investments, R&D, etc. are actually contributing towards earning a profit. The operating profit margin or EBIT margin is calculated by dividing your EBIT by the revenue generated in the same period. The net profit ratio indicates how well your company does at turning revenue into profits - how much percent of every dollar generated will be remaining in your company as profit. The net profit ratio is an excellent yardstick to evaluate performance in light of investments, market fluctuations and other operational considerations.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card rounded-0 bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">RELEVANT KPIS AND METRICS</h5> <br> <br>
                        <ul>
                            <li><a class="text-white"> Gross Profit Margin Percentage</a></li>
                            <li><a class="text-white"> Operating Profit Margin Percentage</a></li>
                            <li><a class="text-white"> Operating Expense Ratio</a></li>
                            <li><a class="text-white"> Net Profit Margin Percentage</a></li>
                            <!-- <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#gross-profit-margin') ?>"> Gross Profit Margin Percentage</a></li>
                            <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/') ?>#operating-profit-margin"> Operating Profit Margin Percentage</a></li>
                            <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#operating-expense-ratio') ?>"> Operating Expense Ratio</a></li>
                            <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#net-profit-margin') ?>"> Net Profit Margin Percentage</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<?php
include 'formulas/formula_profit_and_loss_dashboard.php';
?>