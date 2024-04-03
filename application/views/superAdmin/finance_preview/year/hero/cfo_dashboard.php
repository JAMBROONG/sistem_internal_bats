<style>
  #costs3 {
    width: 100%;
    height: 300px;
  }
</style>
<?php
function getcolor($num)
{
  if ($num < 0) {
    return array(
      'color' => 'text-danger',
      'bg_color' => 'bg-danger',
      'hex' => '#D82724',
      'num' => $num
    );
  } if ($num == 0) {
    return array(
      'color' => 'text-dark',
      'bg_color' => 'bg-dark',
      'hex' => '#000000',
      'num' => $num
    );
  } 
  else{
    return array(
      'color' => 'text-success',
      'bg_color' => 'bg-success',
      'hex' => '#24D627',
      'num' => '+'.$num
    );
  }
}

function getvalknob($num)
{
  if ($num < 0) {
    return array(
      'max' => 100,
      'min' => $num
    );
  } if ($num > 100) {
    return array(
      'max' => $num,
      'min' => 0
    );
  } 
  else{
    return array(
      'max' => 100,
      'min' => 0
    );
  }
}
?>

<div class="text-center bg-dark pb-3 pt-3">
      <h1 class=" d-none d-md-block">CFO DASHBOARD</h1>
      <h6 class="d-md-none">CFO DASHBOARD</h6>
        </div>
<div class="card shadow-none mt-3" style="background-color:#000000;">
      <div class="card-header bg-danger rounded-0 ">CFO COCKPIT |  (<?=$date?>)</div>
      <div class="card-body p-0">
        <div class="row mt-3">
          <div class="col-lg-8">
            <div class="card rounded-0 shadow-none bg-transparent">
              <div class="card-header  rounded-0 bg-dark">
                Key Metrics (<?=$date?>)
              </div>
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-md-6 pt-3">
                    <div class="card rounded-0 h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse">
                          <div class="d-flex flex-column justify-content-between">
                            <div class=" p-2">
                              <h5 class="text-bold">REVENUE (<?=$date?>)</h5>
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
                            ?>" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120"  data-min="<?=getvalknob($cfo_dashboard['revenue']['realization'])['min']?>"  disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['revenue']['realization'])['hex'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pt-3">
                    <div class="card rounded-0 h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse">
                          <div class="d-flex flex-column justify-content-between">
                            <div class=" p-2">
                              <h5 class="text-bold">GROSS PROFIT (<?=$date?>)</h5>
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
                            ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-min="<?=getvalknob($cfo_dashboard['gross_p']['realization'])['min']?>" data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['gross_p']['realization'])['hex'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pt-3">
                    <div class="card rounded-0 h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse">
                          <div class="d-flex flex-column justify-content-between">
                            <div class=" p-2">
                              <h5 class="text-bold">EBIT (<?=$date?>)</h5>
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
                            ?>"  data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125"  data-min="<?=getvalknob($cfo_dashboard['ebit']['realization'])['min']?>"  data-width="120" disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['ebit']['realization'])['hex'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pt-3">
                    <div class="card rounded-0 h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse">
                          <div class="d-flex flex-column justify-content-between">
                            <div class=" p-2">
                              <h5 class="text-bold">OPERATING EXPENSES (<?=$date?>)</h5>
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
                            ?>" 
                             data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120"  data-min="<?=getvalknob($cfo_dashboard['operating_e']['realization'])['min']?>"  disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['operating_e']['realization'])['hex'] ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pt-3">
                    <div class="card rounded-0 h-100">
                      <div class="card-body">
                        <div class="d-flex justify-content-between flex-lg-row flex-column-reverse">
                          <div class="d-flex flex-column justify-content-between">
                            <div class=" p-2">
                              <h5 class="text-bold">NET INCOME (<?=$date?>)</h5>
                            </div>
                            <div class="p-2">
                              <h5><?= format_angka($cfo_dashboard['net_income']['value'])?> <br><small class="<?= getcolor($cfo_dashboard['net_income']['realization'])['color'] ?> text-sm">(<?= getcolor($cfo_dashboard['net_income']['realization'])['num']  ?>%)</small></h5>
                            </div>
                            <div class="p-2">Target <?= format_angka($cfo_dashboard['net_income']['target'])?></div>
                          </div>
                          <div class="d-flex justify-content-end">
                            <input type="text" id="knob9" class="knob3" value="<?= $cfo_dashboard['net_income']['realization'] ?>"  data-max="<?php
                            if ($cfo_dashboard['net_income']['realization'] > 100) {
                              echo $cfo_dashboard['net_income']['realization'];
                            } else{
                              echo 100;
                            }
                            ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120"  data-min="<?=getvalknob($cfo_dashboard['net_income']['realization'])['min']?>"  disabled readonly data-height="120" data-fgColor="<?= getcolor($cfo_dashboard['net_income']['realization'])['hex'] ?>">
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
            <div class="card  rounded-0 shadow-none" style="background-color: #0000 ;">
              <div class="card-header  rounded-0 bg-dark mb-3">
                Breakdowns
              </div>
              <div class="card-body bg-white p-0">
                  <div id="costs3"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card rounded-0 rounded-0">
                  <div class="card-body p-1 text-center">
                    <p class=" m-0">EVA</p>
                    <small class="card-text">Economic Value Add</small>
                    <h5>Rp. 20,000,000,00</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card rounded-0 rounded-0">
                  <div class="card-body p-1 text-center">
                    <p class=" m-0">BERRY RATIO</p>
                    <h5>2.2</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card rounded-0 rounded-0">
                  <div class="card-body p-1 text-center">
                    <p class=" m-0">PAYROLL HEADCOUNT RATIO</p>
                    <h5>0.02</h5>
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
              &nbsp; Our rundown of the best financial dashboards continues with CFOs (Chief Financial Officers). They usually focus on high-level metrics that expands outside of a pure financial focus so you can also find employee or customer satisfaction metrics, as depicted in our visual example. To see the full scope of this CFO dashboard, please open it in full-screen mode but now we will go through some relevant details.
              <br><br>
              &nbsp; The dashboard focuses on 4 primary areas that CFOs can find relevant and interesting: costs, sales goals, gross profit, customer and/or employee satisfaction levels. You can easily connect another dashboard within, and additionally implement specific areas of interest such as market indicators, customer analysis, investor relations, cash management, etc. Key metrics that are depicted at the top left of this financial analysis dashboard include the revenue, gross profit, EBIT, operating expenses, and net income. That way, every CFO can have a clear overview of the financial performance within the first quarter of the year. You can see how you performed against set targets and conclude that operating expenses are actually higher than planned. Then you can easily dig deeper, start asking questions, and analyze why this happened in order to avoid such scenarios in the future. We have included simple gauge charts in our visual example so that you can immediately spot if the metric is developing well or it’s in the “red zone.”
              <br><br>
              &nbsp; On the right side the dashboard shows the breakdown of costs with an additional tab that focuses on the revenue. We can see that, in this case, sales have generated the highest costs within this quarter followed by general and admin. This can give you an idea where your expenses are allocated and if you have the opportunity to lower them as much as possible. We have also added 3 additional metrics: economic value added (EVA), berry ratio, and the payroll headcount ratio, but you can customize your KPIs as needed. These 3 metrics will show you the true economic profit of your company, indication if you’re losing or generating money, and how many employees support your payroll efforts.
              <br><br>
              &nbsp; Finally, we can take a closer look at the bottom part of the dashboard where we can see details on the employee and customer satisfaction levels expressed also with a 3-month trend. These are non-traditional metrics but every modern CFO needs to keep track of satisfaction levels since lower values could cause additional financial hardships. In this case, the trend in employee satisfaction is negative so you might want to examine what happened and how you can change it. Finally, we can see other connected dashboards which you can customize based on your own requirements, and quickly go through more data as questions arise.
            </p>
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
              <!-- <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#payroll-headcount-ratio') ?>"> Payroll Headcount Ratio</a></li>
              <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#economic-value-added') ?>"> Economic Value Added (EVA)</a></li>
              <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#employee-statisfaction') ?>"> Employee Satisfaction</a></li>
              <li><a class="text-white" href="<?= base_url('SuperAdmin/detail_preview/'.$user_id.'/#vendor-payment-error-rate') ?>"> Vendor Payment Error Rate</a></li> -->
            </ul>
          </div>
        </div>
      </div>
    </div>

<?php
include 'formulas/formula_cfo_dashboard.php';
?>