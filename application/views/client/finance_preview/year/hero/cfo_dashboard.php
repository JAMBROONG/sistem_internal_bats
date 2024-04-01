<style>
    #costs3 {
        width: 100%;
        height: 300px;
    }
</style>

<div class="text-center bg-dark pb-3 pt-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
    <h1 class=" d-none d-md-block">CFO DASHBOARD</h1>
    <h6 class="d-md-none">CFO DASHBOARD</h6>
</div>
<div class="card shadow-none mt-3">
    <div class="p-0 d-flex justify-content-between bg-danger rounded-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="p-3">CFO COCKPIT</div>
        <div class="p-3  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
            <?=$date?>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="card rounded-0 shadow-none bg-transparent" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-header  rounded-0  text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                        Key Metrics
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-md-6 pt-3">
                                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                                    <div class="card-body p-0">
                                    <div class="d-flex justify-content-end" >
                                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdREVENUE" style=" cursor: pointer;">explanation</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse p-3">
                                            <div class="d-flex flex-column justify-content-between">
                                                <div class=" p-2">
                                                    <h5 class="text-bold">REVENUE</h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= format_angka($cfo_dashboard['revenue']['value'])?> <br><small class=" <?= getcolor($cfo_dashboard['revenue']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['revenue']['realization'])['num']?>%)</small></h5>
                                                </div>
                                                <div class="p-2">Target <?= format_angka($cfo_dashboard['revenue']['target'])?></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="text" id="knob5" class="knob3" value="<?=$cfo_dashboard['revenue']['realization']?>" data-skin="tron" data-max="<?php
                                                if ($cfo_dashboard['revenue']['realization'] > 100) {
                                                  echo $cfo_dashboard['revenue']['realization'];
                                                } else{
                                                  echo 100;
                                                }
                                                ?>" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-min="<?=getvalknob($cfo_dashboard['revenue']['realization'])['min']?>" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['revenue']['realization'])['hex'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                                    <div class="card-body p-0">
                                    <div class="d-flex justify-content-end" >
                                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdGROSSPROFIT" style=" cursor: pointer;">explanation</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse p-3">
                                            <div class="d-flex flex-column justify-content-between">
                                                <div class=" p-2">
                                                    <h5 class="text-bold">GROSS PROFIT</h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= format_angka($cfo_dashboard['gross_p']['value'])?> <br><small class="<?= getcolor($cfo_dashboard['gross_p']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['gross_p']['realization'])['num']?>%)</small></h5>
                                                </div>
                                                <div class="p-2">Target <?= format_angka($cfo_dashboard['gross_p']['target'])?></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="text" id="knob6" class="knob3" value="<?=$cfo_dashboard['gross_p']['realization']?>" data-max="<?php
                                                if ($cfo_dashboard['gross_p']['realization'] > 100) {
                                                  echo $cfo_dashboard['gross_p']['realization'];
                                                } else{
                                                  echo 100;
                                                }
                                                ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($cfo_dashboard['gross_p']['realization'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['gross_p']['realization'])['hex'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-end" >
                                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdEBIT" style=" cursor: pointer;">explanation</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse p-3">
                                            <div class="d-flex flex-column justify-content-between">
                                                <div class=" p-2">
                                                    <h5 class="text-bold">EBIT</h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= format_angka($cfo_dashboard['ebit']['value'])?> <br><small class="<?= getcolor($cfo_dashboard['ebit']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['ebit']['realization'])['num']?>%)</small></h5>
                                                </div>
                                                <div class="p-2">Target <?= format_angka($cfo_dashboard['ebit']['target'])?></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="text" id="knob7" class="knob3" value="<?=$cfo_dashboard['ebit']['realization']?>" data-max="<?php
                                                if ($cfo_dashboard['ebit']['realization'] > 100) {
                                                  echo $cfo_dashboard['ebit']['realization'];
                                                } else{
                                                  echo 100;
                                                }
                                                ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($cfo_dashboard['ebit']['realization'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['ebit']['realization'])['hex'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-end" >
                                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdOPERATINGEXPENSES" style=" cursor: pointer;">explanation</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse p-3">
                                            <div class="d-flex flex-column justify-content-between">
                                                <div class=" p-2">
                                                    <h5 class="text-bold">OPERATING EXPENSES</h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= format_angka($cfo_dashboard['operating_e']['value'])?> <br><small class="<?= getcolor($cfo_dashboard['operating_e']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['operating_e']['realization'])['num']?>%)</small></h5>
                                                </div>
                                                <div class="p-2">Target <?= format_angka($cfo_dashboard['operating_e']['target'])?></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="text" id="knob8" class="knob3" value="<?=$cfo_dashboard['operating_e']['realization']?>" data-max="<?php
                                                if ($cfo_dashboard['operating_e']['realization'] > 100) {
                                                  echo $cfo_dashboard['operating_e']['realization'];
                                                } else{
                                                  echo 100;
                                                }
                                                ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-min="<?=getvalknob($cfo_dashboard['operating_e']['realization'])['min']?>" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['operating_e']['realization'])['hex'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pt-3">
                                <div class="card rounded-0 h-100" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                                    <div class="card-body p-0">
                                        <div class="d-flex justify-content-end" >
                                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdNETINCOME" style=" cursor: pointer;">explanation</button>
                                        </div>
                                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse p-3">
                                            <div class="d-flex flex-column justify-content-between">
                                                <div class=" p-2">
                                                    <h5 class="text-bold">NET INCOME</h5>
                                                </div>
                                                <div class="p-2">
                                                    <h5><?= format_angka($cfo_dashboard['net_income']['value'])?> <br><small class="<?= getcolor($cfo_dashboard['net_income']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['net_income']['realization'])['num']  ?>%)</small></h5>
                                                </div>
                                                <div class="p-2">Target <?= format_angka($cfo_dashboard['net_income']['target'])?></div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <input type="text" id="knob9" class="knob3" value="<?= $cfo_dashboard['net_income']['realization'] ?>" data-max="<?php
                                              if ($cfo_dashboard['net_income']['realization'] > 100) {
                                                echo $cfo_dashboard['net_income']['realization'];
                                              } else{
                                                echo 100;
                                              }
                                              ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" data-min="<?=getvalknob($cfo_dashboard['net_income']['realization'])['min']?>" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['net_income']['realization'])['hex'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card  rounded-0 shadow-none" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                    <div class="card-header  rounded-0 text-white" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
                        Breakdowns
                    </div>
                    <div class="card-body bg-white p-0">
                        <div class="d-flex justify-content-end" >
                            <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdBreakdowns" style=" cursor: pointer;">explanation</button>
                        </div>
                        <div id="costs3"></div>
                    </div>
                </div>
                    <div class="card rounded-0 rounded-0 d-none">
                        <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdEVA" style=" cursor: pointer;">explanation</button>
                            </div>
                            <p class=" m-0">EVA</p>
                            <small class="card-text">Economic Value Add</small>
                            <h5>Rp. 20,000,000,00</h5>
                        </div>
                    </div>
                    <div class="card rounded-0 rounded-0 d-none">
                        <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdBERRYRATIO" style=" cursor: pointer;">explanation</button>
                            </div>
                            <p class=" m-0">BERRY RATIO</p>
                            <h5>2.2</h5>
                        </div>
                    </div>
                    <div class="card rounded-0 rounded-0 d-none">
                        <div class="card-body p-0 text-center">
                            <div class="d-flex justify-content-end" >
                                <button style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color5'")['code'];?>" class="p-0 pl-1 pr-1 border-0 text-sm" data-toggle="modal" data-target="#cdPAYROLLHEADCOUNTRATIO" style=" cursor: pointer;">explanation</button>
                            </div>
                            <p class=" m-0">PAYROLL HEADCOUNT RATIO</p>
                            <h5>0.02</h5>
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
                $explanation = $this->M_table->getByCon("finance_explanation_year", "user_id", $user_id." AND date_year = '".$date."' AND category_id = 4 AND items_name = 'PAGE DESCRIPTION'");

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
                    <li><a class="text-white"> Payroll Headcount Ratio</a></li>
                    <li><a class="text-white"> Economic Value Added (EVA)</a></li>
                    <li><a class="text-white"> Employee Satisfaction</a></li>
                    <li><a class="text-white"> Vendor Payment Error Rate</a></li>
                </ul>
            </div>
        </div>
        <blockquote class="quote-card border-left-0 m-0">
            <p class="text-justify"><?= (!empty($quote['CFO DASHBOARD'])) ? $quote['CFO DASHBOARD'] : "Quote not yet" ?>
            </p>
            <cite>~ BATS Consulting</cite>
        </blockquote>
    </div>
</div>

<!-- Modal -->
<?php
$data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 4");

if (!empty($data)) {
    foreach ($data as $key) {
        $id_modal = str_replace(' ', '', $key['items_name']);
        $id_modal = str_replace('|', '', $id_modal);
        $id_modal = str_replace('.', '', $id_modal);
        $id_modal = str_replace('&', '', $id_modal);
        ?>
        <div class="modal fade" id="cd<?=$id_modal?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" style="background-color:#<?=$this->M_table->getByCon("color_theme","name","'color1'")['code'];?>">
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
include 'formulas/formula_cfo_dashboard.php';
?>

<script>
const selectedBtn = document.getElementById("cd");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>