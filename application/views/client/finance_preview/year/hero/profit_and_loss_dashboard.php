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
<div class="text-center bg-dark pb-3 pt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
    <h1 class=" d-none d-md-block">PROFIT AND LOSS DASHBOARD</h1>
    <h6 class="d-md-none">PROFIT AND LOSS DASHBOARD</h6>
</div>
<div class="row mt-3 mb-3">
    <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="card rounded-0 h-100">
            <div class="p-0 d-flex justify-content-between bg-danger rounded-0">
                <div class="p-3">INCOME STATEMENT(Rp.)</div>
                <div class="p-3 text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                    <?=$date?> 
                </div>
            </div>
            <div class="card-body p-0">
                <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldINCOMESTATEMENT" style=" cursor: pointer;">explanation</button>
                </div>
                <div class="table-responsive p-3">
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
        <div class="card h-100 rounded-0"  data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-body">
            <div class="d-flex justify-content-around align-items-center h-100">
            <div class="d-flex justify-content-around align-items-center flex-column h-100"> 
                <div class="text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <input type="text" id="knob1" class="knob" value="<?=$profit_and_loss_dashboard['gpm']?>" data-max="<?php
                    if ($profit_and_loss_dashboard['gpm'] > 100) {
                        echo $profit_and_loss_dashboard['gpm'];
                    } else{
                        echo 100;
                    }
                    ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($profit_and_loss_dashboard['gpm'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($profit_and_loss_dashboard['gpm'])['hex'] ?>">
                    <div class="knob-label text-sm">GROSS PROFIT MARGIN</div>
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldGROSSPROFITMARGIN" style=" cursor: pointer;">explanation</button>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <input type="text" id="knob2" class="knob" value="<?=$profit_and_loss_dashboard['opex']?>" data-max="<?php
                    if ($profit_and_loss_dashboard['opex'] > 100) {
                        echo $profit_and_loss_dashboard['opex'];
                    } else{
                        echo 100;
                    }
                    ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($profit_and_loss_dashboard['opex'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($profit_and_loss_dashboard['opex'])['hex'] ?>">
                    <div class="knob-label text-sm">OPEX RATIO</div>
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldOPEXRATIO" style=" cursor: pointer;">explanation</button>
                </div>
            </div>
            <div class="d-flex justify-content-around align-items-center flex-column h-100">
                <div class="text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <input type="text" id="knob3" class="knob" value="<?=$profit_and_loss_dashboard['opm']?>" data-max="<?php
                    if ($profit_and_loss_dashboard['opm'] > 100) {
                        echo $profit_and_loss_dashboard['opm'];
                    } else{
                        echo 100;
                    }
                    ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($profit_and_loss_dashboard['opm'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($profit_and_loss_dashboard['opm'])['hex'] ?>">
                    <div class="knob-label text-sm">OPERATING PROFIT MARGIN</div>
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldOPERATINGPROFITMARGIN" style=" cursor: pointer;">explanation</button>
                </div>
                <div class="text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <input type="text" id="knob4" class="knob" value="<?=$profit_and_loss_dashboard['npm']?>" data-max="<?php
                    if ($profit_and_loss_dashboard['npm'] > 100) {
                        echo $profit_and_loss_dashboard['npm'];
                    } else{
                        echo 100;
                    }
                    ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($profit_and_loss_dashboard['npm'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($profit_and_loss_dashboard['npm'])['hex'] ?>">
                    <div class="knob-label text-sm">NET PROFIT MARGIN</div>
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldNETPROFITMARGIN" style=" cursor: pointer;">explanation</button>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <div class="card p-0 h-100 rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header text-center text-md-left rounded-0  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                <h4>Net Sales & COGS</h4>
                <small>Year-to-Year</small>
            </div>
            <div class="card-body p-0 d-flex justify-content-start flex-column ">
                
            <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldNetSalesCOGS" style=" cursor: pointer;">explanation</button>
                </div>
                <div id="chartCOGS"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3 mt-lg-0">
        <div class="card p-0 h-100 rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header text-center text-md-left rounded-0  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                <h4>OPEX</h4>
                <small>In Year | YTD</small>
            </div>
            <div class="card-body p-0  d-flex justify-content-start flex-column">
            <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldOPEXinYear" style=" cursor: pointer;">explanation</button>
                </div>
                <div id="chart_montOpex"></div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <div class="card p-0 h-100 rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header text-center text-md-left rounded-0  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                <h4>OPEX</h4>
                <small>Year-to-Year</small>
            </div>
            <div class="card-body p-0  d-flex justify-content-start flex-column">
            <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldOPEXYeartoYear" style=" cursor: pointer;">explanation</button>
                </div>
                <div id="earning_chart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3 mt-lg-0">
        <div class="card p-0 h-100 rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header text-center text-md-left rounded-0  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                <h4>Earning before Interest and Taxes</h4>
                <small>Year-to-Year</small>
            </div>
            <div class="card-body p-0  d-flex justify-content-start flex-column">
            <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#paldEarningbeforeInterestandTaxes" style=" cursor: pointer;">explanation</button>
                </div>
                    <div id="opex_chart"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card rounded-0 shadow-none">
            <div class="card-body">
            <?php
                $explanation = $this->M_table->getByCon("finance_explanation_year", "user_id", $user_id." AND date_year = '".$date."' AND category_id = 3 AND items_name = 'PAGE DESCRIPTION'");

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
                    <li><a class="text-white"> Gross Profit Margin Percentage</a></li>
                    <li><a class="text-white"> Operating Profit Margin Percentage</a></li>
                    <li><a class="text-white"> Operating Expense Ratio</a></li>
                    <li><a class="text-white"> Net Profit Margin Percentage</a></li>
                </ul>
            </div>
        </div>
        <blockquote class="quote-card border-left-0 m-0">
            <p class="text-justify"><?= (!empty($quote['PROFIT AND LOSS DASHBOARD'])) ? $quote['PROFIT AND LOSS DASHBOARD'] : "Quote not yet" ?>
            </p>
            <cite>~ BATS Consulting</cite>
        </blockquote>
    </div>
</div>

<!-- Modal -->
<?php
$data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 3");

if (!empty($data)) {
    foreach ($data as $key) {
        $id_modal = str_replace(' ', '', $key['items_name']);
        $id_modal = str_replace('|', '', $id_modal);
        $id_modal = str_replace('.', '', $id_modal);
        $id_modal = str_replace('&', '', $id_modal);
        ?>
        <div class="modal fade" id="pald<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
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
?>
<?php
include 'formulas/formula_profit_and_loss_dashboard.php';
?>


<script>
const selectedBtn = document.getElementById("pald");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>