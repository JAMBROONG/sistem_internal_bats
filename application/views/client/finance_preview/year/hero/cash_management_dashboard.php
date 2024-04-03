<style>
    #chartdiv2,
    #chartdiv3,
    #chartInventory {
        width: 100%;
        height: 400px;
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
<div class="text-center bg-dark pb-3 pt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
    <h1 class=" d-none d-md-block">CASH MANAGEMENT DASHBOARD</h1>
    <h6 class="d-md-none">CASH MANAGEMENT DASHBOARD</h6>
</div>
<div class="card shadow-none rounded-0 mt-3">
    <div class="p-0 d-flex justify-content-between bg-danger rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="p-3">WORKING CAPITAL</div>
        <div class="p-3 text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
            <?=$date?>
        </div>
    </div>
    <div class="card-body p-0 pt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="row h-100">
                    <div class="col-sm-6 col-md-12 mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                        <div class="card rounded-0 h-100">
                            <div class="card-body d-flex p-0 flex-column" style="background-color:#070A52; color: white">
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdQuickRatio" style=" cursor: pointer;">explanation</button>
                                </div>
                                <div>
                                    <h5 class="text-center">QUICK RATIO</h5><br>

                                    <h1 class="text-center">
                                        <!-- <i class="fas fa-exclamation-circle mr-2"></i> -->
                                        <?=  substr(number_format($cash_management['quick_ratio'], 10, '.', ''), 0, 3);?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-12 mb-2 mb-lg-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                        <div class="card rounded-0 h-100">
                            <div class="card-body d-flex p-0 flex-column" style="background-color:#070A52; color: white">
                                <div class="d-flex justify-content-end">
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdCurrentRatio" style=" cursor: pointer;">explanation</button>
                                </div>
                                <div>
                                    <h5 class="text-center">CURRENT RATIO</h5><br>
                                    <h1 class="text-center">
                                        <?= substr(number_format($cash_management['current_ratio'], 10, '.', ''), 0, 3);?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card rounded-0 h-100 mt-sm-2 mt-md-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-body pt-0 pr-0">
                        <div class="row h-100">
                            <div class="col-md-4 mb-4">
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdCashBalance" style=" cursor: pointer;">explanation</button>
                                </div>
                                <h5 class="text-center">Cash Balance</h5><br>
                                <h1 class="text-center"><?= format_angka($cash_management['cash_latest']['value']) ; ?></h1>
                                <br>
                                <hr>
                                <div class="d-flex justify-content-between mr-3">
                                    <div class=" text-wrap">Cash Balance In</div>
                                    <div>
                                        <?= (!empty($data_tambahan['Cash Balance In'])) ?"Rp. " . number_format($data_tambahan['Cash Balance In'],0,',','.')  : 0 ?></div>
                                </div>
                                <div class="d-flex justify-content-between mr-3">
                                    <div class=" text-wrap">Cash Balance Out</div>
                                    <div>
                                        <?= (!empty($data_tambahan['Cash Balance Out'])) ? "Rp. " . number_format($data_tambahan['Cash Balance Out'],0,',','.')   : 0 ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdCASHatendofyears" style=" cursor: pointer;">explanation</button>
                                </div>
                                <h5 class="text-center">CASH | at end of years</h5>
                                <div class="table-responsive">
                                    <div id="chartDiv1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="col-md-6">
                <div class="card rounded-0">
                    <div class="card-body p-0">
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdQUICKRATIOatendofyears" style=" cursor: pointer;">explanation</button>
                                </div>
                        <h5 class="text-center">QUICK RATIO | at end of years</h5>
                        <div class="table-responsive">
                            <div id="chartquickratioyear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card rounded-0">
                    <div class="card-body p-0">
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdCURRENTRATIOatendofyears" style=" cursor: pointer;">explanation</button>
                                </div>
                        <h5 class="text-center">CURRENT RATIO | at end of years</h5>
                        <div class="table-responsive">
                            <div id="chartcurrentratioyear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow-none rounded-0">
    <div class="p-0 d-flex justify-content-between bg-danger rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="p-3">CASH CONVERSION</div>
        <div class="p-3 text-white"style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
            <?=$date?>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-4 mt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="card rounded-0 h-100">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3 mb-0">DAYS SALES OUTSTANDING</h5>
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdDAYSSALESOUTSTANDING" style=" cursor: pointer;">explanation</button>
                                </div>
                        <div id="chartdiv2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="card rounded-0 h-100">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3 mb-0">DAYS INVENTORY OUTSTANDING</h5>
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdDAYSINVENTORYOUTSTANDING" style=" cursor: pointer;">explanation</button>
                                </div>
                        <div id="chartInventory"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="card rounded-0 h-100">
                    <div class="card-body p-0">
                        <h5 class="text-center bg-dark p-3 mb-0">DAYS PAYABLE OUTSTANDING</h5>
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdDAYSPAYABLEOUTSTANDING" style=" cursor: pointer;">explanation</button>
                                </div>
                        <div id="chartdiv3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mt-3">
                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3 mb-0">AR TURNOVER VS. AP TURNOVER </h5>
                        <div class="d-flex justify-content-end">
                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdARTURNOVERVSAPTURNOVER" style=" cursor: pointer;">explanation</button>
                        </div>
                        <div class="table-responsive">
                            <div id="myChart" class="mr-3"></div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <small class="mr-2"><i class="fa fa-square mr-2" style=" color:#8a8ef5"></i>Accounts Receivable Turnover</small>
                            <small><i class="fa fa-square mr-2" style=" color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>"></i>Accounts Payable Turnover</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3 mb-0">INVENTORY</h5>
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdINVENTORY" style=" cursor: pointer;">explanation</button>
                                </div>
                        <div class="table-responsive mb-2">
                            <div id="myChartInventory"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-3">
                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-body p-0">
                        <h5 class="text-center  bg-dark p-3 mb-0">ACCOUNTS PAYABLE BY PAYMENT TARGET</h5>
                                <div class="d-flex justify-content-end">
                                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cmdACCOUNTSPAYABLEBYPAYMENTTARGET" style=" cursor: pointer;">explanation</button>
                                </div>
                        <div class=" table-responsive mb-2">
                            <div id="myChart2"></div>
                        </div>
                        <div class=" d-flex justify-content-center justify-content-lg-around table-responsive flex-column flex-md-row">
                            <small class="mr-2"><i class="fa fa-square mr-2" style=" color:#400030ff"></i>not due</small>
                            <small><i class="fa fa-square mr-2" style=" color:#6b275aff"></i>< 30 days</small>    
                            <small><i class="fa fa-square mr-2" style=" color:#ba3d5dff"></i>< 60 days</small>    
                            <small><i class="fa fa-square mr-2" style=" color:#e16b5fff"></i>< 90 days</small>            
                            <small><i class="fa fa-square mr-2" style=" color:#fe9085ff"></i>> 90 days</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card  rounded-0 shadow-none bg-transparent" id="cash_management_dashboard">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="card rounded-0 shadow-none bg-white">
                    <div class="card-body">
                    <?php
                        $explanation = $this->M_table->getByCon("finance_explanation_year", "user_id", $user_id." AND date_year = '".$date."' AND category_id = 1 AND items_name = 'PAGE DESCRIPTION'");

                        if (!$explanation) {
                        echo '<p style="color: red; font-weight: bold;">Data tidak tersedia</p>';
                        } else {
                        echo $explanation['explanation'];
                        }
                        ?>
    
                    </div>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="card rounded-0 bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">RELEVANT KPIS AND METRICS</h5><br>
                        <ul>
                            <li><a class="text-white"> Current Ratio</a></li>
                            <li><a class="text-white"> Accounts Payable Turnover</a></li>
                            <li><a class="text-white"> Accounts Receivable Turnover</a></li>
                        </ul>
                    </div>
                </div>
                <blockquote class="quote-card border-left-0 m-0">
                    <p class="text-justify"><?= (!empty($quote['CASH MANAGEMENT DASHBOARD'])) ? $quote['CASH MANAGEMENT DASHBOARD'] : "Quote not yet" ?>
                    </p>
                    <cite>~ BATS Consulting</cite>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<!-- // modal cmd -->

<!-- Modal -->
<?php
$data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 1");

if (!empty($data)) {
    foreach ($data as $key) {
        $id_modal = str_replace(' ', '', $key['items_name']);
        $id_modal = str_replace('|', '', $id_modal);
        $id_modal = str_replace('.', '', $id_modal);
        ?>
        <div class="modal fade" id="cmd<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
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
include 'formulas/formula_cash_management_dashboard.php';
?>
<script>
const selectedBtn = document.getElementById("cmd");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>