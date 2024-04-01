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
<div class="text-center bg-dark pb-3 pt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
    <h1 class=" d-none d-md-block">FINANCIAL KPI DASHBOARD</h1>
    <h6 class="d-md-none">FINANCIAL KPI DASHBOARD</h6>
</div>
<div class="card rounded-0 shadow-none mt-3 bg-transparent">
    <div class="p-0 d-flex justify-content-between bg-danger rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="p-3">Current Working Capital</div>
        <div class="p-3 text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
            <?=$date?>
        </div>
    </div>
    <div class="card-body p-0 pt-3">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fkdCurrentAssets" style=" cursor: pointer;">explanation</button>
                </div>
                <table class="table table-responsive-md">
                    <tbody>
                        <tr class=" text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                            <th>Current Assets (Rp.)</th>
                            <th class=" text-right text-nowrap"><?= number_format( $cash_management['num_current_aset'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td> Cash and Cash Equivalents</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"KAS DAN SETARA KAS")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Temporary Investment</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"INVESTASI SEMENTARA")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Account Receivable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'],0,',','.') ?></th>
                        </tr>

                        <tr class="bg-light">
                            <td>Other Receivable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG LAIN-LAIN PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'],0,',','.') ?></th>
                        </tr>

                        <tr class="bg-light">
                            <td>Allowance For Doubtful Accounts </td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PENYISIHAN PIUTANG RAGU-RAGU")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Inventory</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"PERSEDIAAN")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Advance and Pre-Paid Expenses</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BEBAN DIBAYAR DI MUKA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"UANG MUKA PEMBELIAN")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Other Current Assets</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"AKTIVA LANCAR LAINNYA")['value'],0,',','.') ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="d-flex justify-content-end">
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fkdCurrentLiabilities" style=" cursor: pointer;">explanation</button>
                </div>
                <table class="table table-responsive-md">
                    <tbody>
                        <tr class=" text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                            <th>Current Liabilities (Rp.)</th>
                            <th class=" text-right text-nowrap"><?= number_format( $cash_management['num_current_liabilities'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Account Payable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG USAHA PIHAK KETIGA")['value'] + $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Interest Payable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG BUNGA")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Tax Payable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG PAJAK")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Dividend Payable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG DIVIDEN")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Accrued Expenses</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BIAYA YANG MASIH HARUS DIBAYAR")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Loan Payable</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"HUTANG BANK")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Due Date - Long Term Debts</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Customer Advances</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"UANG MUKA PELANGGAN")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class="bg-light">
                            <td>Other Current Liabilities</td>
                            <th class=" text-right text-nowrap"><?= number_format( $this->M_finance->get_days_sales_outstanding2_year($user_id,$date,"KEWAJIBAN LANCAR LAINNYA")['value'],0,',','.') ?></th>
                        </tr>
                        <tr class=" text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                            <th>Working Capital (Rp.)</th>
                            <th class=" text-right text-nowrap"><?= number_format( $cash_management['num_current_aset'] - $cash_management['num_current_liabilities'],0,',','.') ?></th>
                        </tr>
                        <tr class=" text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                            <th>Current Ratio </th>
                            <th class=" text-right text-nowrap"><?= substr(number_format($cash_management['current_ratio'], 1, '.', ''), 0, 3);?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-6">
        <div class="card rounded-0 h-100 shadow-none" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header  rounded-0 text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                Cash Conversion Cycle Year
            </div>
            <div class="card-body p-0">
                <div class="d-flex justify-content-end" >
                    <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#fkdCashConversionCycleYear" style=" cursor: pointer;">explanation</button>
                </div>
                <div class="d-flex justify-content-around justify-content-md-center align-items-center table-responsive">
                    <div class=" p-md-3 p-1 mr-md-3 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_sales_outstanding']) ?></b> <br> DSO
                    </div>
                    <i class="fa fa-plus mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_inventory_outstanding']) ?></b> <br> DIO
                    </div>
                    <i class="fa fa-minus mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-primary h6"><?= round($cash_management['days_payable_outstanding']) ?></b> <br> DPO
                    </div>
                    <i class="fa fa-equals mr-md-3 fa-1x text-secondary"></i>
                    <div class=" p-md-3 mr-md-3 p-1 rounded text-center" style="background-color: #E9ECEF;">
                        <b class="text-danger h6"><?= round( $cash_management['days_sales_outstanding'] +  $cash_management['days_payable_outstanding']  - $cash_management['days_inventory_outstanding'])?></b> <br> CCC
                    </div>
                </div>
                <div class="table-responsive mt-3">
                    <div id="chart_conversion" class="chartCcc"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 d-none">
        <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
            <div class="card-header">
                Vendor Payment Error Rate - Last 12 Months
            </div>
            <div class="card-body">
                <div class="table-responsive rounded ">

                    <div class="chart_vendor_payment">
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
            <?php
                $explanation = $this->M_table->getByCon("finance_explanation_year", "user_id", $user_id." AND date_year = '".$date."' AND category_id = 2 AND items_name = 'PAGE DESCRIPTION'");

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
                    <li><a class="text-white"> Working Capital</a></li>
                    <li><a class="text-white"> Quick Ratio / Acid Test</a></li>
                    <li><a class="text-white"> Cash Conversion Cycle</a></li>
                    <li><a class="text-white"> Vendor Payment Error Rate</a></li>
                    <li><a class="text-white"> Budget Variance</a></li>
                </ul>
            </div>
        </div>
        <blockquote class="quote-card border-left-0 m-0">
            <p class="text-justify"><?= (!empty($quote['FINANCIAL KPI DASHBOARD'])) ? $quote['FINANCIAL KPI DASHBOARD'] : "Quote not yet" ?>
            </p>
            <cite>~ BATS Consulting</cite>
        </blockquote>
    </div>
</div>

<!-- Modal -->
<?php
$data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 2");

if (!empty($data)) {
    foreach ($data as $key) {
        $id_modal = str_replace(' ', '', $key['items_name']);
        $id_modal = str_replace('|', '', $id_modal);
        $id_modal = str_replace('.', '', $id_modal);
        ?>
        <div class="modal fade" id="fkd<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
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
