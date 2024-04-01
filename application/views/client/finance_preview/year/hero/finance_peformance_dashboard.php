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
<div class="text-center bg-dark pb-3 pt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
    <h1 class=" d-none d-md-block">FINANCIAL PERFORMANCE DASHBOARD</h1>
    <h6 class="d-md-none">FINANCIAL PERFORMANCE DASHBOARD</h6>
</div>
<div class="card shadow-none mt-3">
    <div class="p-0 d-flex justify-content-between bg-danger rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="p-3">FINANCIAL PERFORMANCE DASHBOARD</div>
        <div class="p-3  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
            <?=$date?>
        </div>
    </div>
    <div class="card-body  p-0">
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="card-header text-center rounded-0  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">RETURN ON ASSETS</div>
                            <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fpdRETURNONASSETS" style=" cursor: pointer;">explanation</button>
                            </div>
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
                        <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="card-header text-center rounded-0  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">WORKING CAPITAL RATIO</div>
                            <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fpdWORKINGCAPITALRATIO" style=" cursor: pointer;">explanation</button>
                            </div>
                                <?php
                                foreach ($financial_performance_dashboard['wcr'] as $key) {
                                    if ($key['tahun'] == $date) {
                                        echo '<span class="dot h1 p-0" style="height:auto">'. round($key['value'],1).'</span>';
                                    }
                                }
                                ?>
                                <div id="myChart9"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="card-header text-center rounded-0  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">RETURN ON EQUITY</div>
                            <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fpdWORKINGCAPITALRATIO" style=" cursor: pointer;">explanation</button>
                            </div>
                                <?php
                                foreach ($financial_performance_dashboard['roe'] as $key) {
                                    if ($key['tahun'] == $date) {
                                        echo '<span class="dot h1 p-0" style="height:auto">'. round($key['value'],1).'%</span>';
                                    }
                                }
                                ?>
                                <div id="myChart10"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="card-header text-center rounded-0  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">DEBT-EQUITY RATIO</div>
                            <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fpdDEBT-EQUITYRATIO" style=" cursor: pointer;">explanation</button>
                            </div>
                                <?php
                                foreach ($financial_performance_dashboard['der'] as $key) {
                                    if ($key['tahun'] == $date) {
                                        echo '<span class="dot h1 p-0" style="height:auto">'. round($key['value'],1).'</span>';
                                    }
                                }
                                ?>
                                <div id="myChart11"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="card h-100 rounded-0 h-100 mt-3 mt-lg-0">
                    <div class="card-header text-center rounded-0  text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                        BALANCE SHEET
                    </div>
                    <div class="card-body table-responsive">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fpdBALANCESHEET" style=" cursor: pointer;">explanation</button>
                            </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Total Assets<br><small>Rp. <?php foreach ($financial_performance_dashboard['total_aset'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns1"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Current Assets <br><small>Rp. <?php foreach ($financial_performance_dashboard['current_aset'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns2"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Cash <br><small>Rp. <?php foreach ($financial_performance_dashboard['cash'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns3"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Account Receivable <br><small>Rp. <?php foreach ($financial_performance_dashboard['a_receivable'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns4"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Inventory <br><small>Rp. <?php foreach ($financial_performance_dashboard['inventory'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns5"></div>
                            </div>
                        </div>
                        <div class="row mb-4 mb-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Long-Term Assets <br><small>Rp. <?php foreach ($financial_performance_dashboard['long_term_asset'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small></div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Total Liabilities <br><small>Rp. <?php foreach ($financial_performance_dashboard['t_liabilities'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns7"></div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Current Liabilities<br> <small>Rp. <?php foreach ($financial_performance_dashboard['current_liabilities'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns8"></div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Accounts Payable <br><small> Rp. <?php foreach ($financial_performance_dashboard['account_payable'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns9"></div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Other Liabilities <br><small>Rp. <?php foreach ($financial_performance_dashboard['other_liabilities'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns10"></div>
                            </div>
                        </div>

                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Shareholder Equity <br><small>Rp. <?php foreach ($financial_performance_dashboard['shareholder_equity'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns11"></div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Common Stock <br> <small>Rp. <?php foreach ($financial_performance_dashboard['common_stock'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div id="breakdowns12"></div>
                            </div>
                        </div>
                        <div class="row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                            <div class="col-md-3 d-flex align-items-center">
                                <div>Current Earnings <br><small> Rp. <?php foreach ($financial_performance_dashboard['current_earnings'] as $key) { if ($key['tahun'] == $date) { echo number_format($key['value'],0,',','.'); } } ?></small>
                                </div>
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
                <?php
                $explanation = $this->M_table->getByCon("finance_explanation_year", "user_id", $user_id." AND date_year = '".$date."' AND category_id = 5 AND items_name = 'PAGE DESCRIPTION'");

                if (!$explanation) {
                echo '<p style="color: red; font-weight: bold;">Data tidak tersedia</p>';
                } else {
                echo $explanation['explanation'];
                }
                ?>
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
        <blockquote class="quote-card border-left-0 m-0">
            <p class="text-justify"><?= (!empty($quote['FINANCIAL PERFORMANCE DASHBOARD'])) ? $quote['FINANCIAL PERFORMANCE DASHBOARD'] : "Quote not yet" ?>
            </p>
            <cite>~ BATS Consulting</cite>
        </blockquote>
    </div>
</div>

<!-- Modal -->
<?php
$data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 5");

if (!empty($data)) {
    foreach ($data as $key) {
        $id_modal = str_replace(' ', '', $key['items_name']);
        $id_modal = str_replace('|', '', $id_modal);
        $id_modal = str_replace('.', '', $id_modal);
        $id_modal = str_replace('&', '', $id_modal);
        ?>
        <div class="modal fade" id="fpd<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?=$key['items_name']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <?= $key['explanation'] ?>
                </div>
            </div>
        </div>
    </div>
        <?php
    }  
}
include 'formulas/formula_financial_performance_dashboard.php';
?>

<script>
const selectedBtn = document.getElementById("fpd");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>