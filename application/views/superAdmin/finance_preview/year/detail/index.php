<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Detail Finance</title>
   <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
   <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>

   <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
   <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
   <script src="<?php echo base_url();?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
   <?php
   include 'formulas.php';
   ?>

   <style>
      canvas {
         -moz-user-select: none;
         -webkit-user-select: none;
         -ms-user-select: none;
      }
      html {
         scroll-behavior: smooth;
      }

      body {
         font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      }

      /* .chart--{
            width: 100%;
            min-height: 250px;
        } */

      #chartdiv3,
      #chartdiv3A,
      #chartdiv3B,
      #chartdiv3C,
      #myChart14,#myChart16   {
         width: 100%;
         height: 300px;
      }
      .chart--{
         width: 100%;
         min-height: 400px;
      }

      .chart-berryratio, #myChart15 {
         width: 100%;
         min-height: 200px;
      }
      .chart-roa {
         width: 100%;
         min-height: 300px;
      }

      .zc-ref {
         display: none;
      }
      #roa_chart {
        width: 100%;
        height: 400px;
    }
    #cash_conversion {
        width: 100%;
        height: 500px;
    }
   #chartAccountPayableTurnover {
   width:100%;
   height:100%;
   min-height:400px;
   }
   
   .chartCcc {
        width: 100%;
        height: 100%;
        min-height: 300px;
    }
    .chart_vendor_payment{
        width: 100%;
    }
    @media only screen and (max-width: 600px) {
    .chartCcc {
        width: 500px;
        height: 100%;
        min-height: 300px;
    }
   }
   </style>
</head>

<body>
   <section class="content">
      <div class="" id="up-hero">
         <div class="jumbotron bg- m-0 pt-5 rounded-0 text-center slide-top">
        <h1 class=" d-none d-md-block">FINANCIAL KEY PERFORMANCE INDICATORS AND METRICS</h1>
        <h4 class="d-md-none">FINANCIAL KEY PERFORMANCE INDICATORS AND METRICS</h4>
            <p class="lead">✔ SEE DIFFERENT TEMPLATES & DESIGNS ✔ FIND & TRACK THE RIGHT FINANCE KPIS TO MEET YOUR CORPORATE OBJECTIVES</p>
            <div class="container-lg">
               <div class="box shadow border bg-white rounded p-3 mt-5">
                  <p class="text-muted text-justify">A financial KPI or metric is a measurable value that indicates a company’s financial results and performance, provides information about expenses, sales, profit, and cash flow, in order to optimize and achieve business’ financial goals and objectives.</p>
               </div>
            </div>
         </div>
         <div class="mt-5 p-3">
            <p class="text-muted mt-5 container text-justify">
               &nbsp; The financial sector needs to regularly track, monitor, and analyze a company’s performance in order to keep a healthy status and avoid monetary bottlenecks. That’s why financial metrics have a special significance in every company, and the team that deals with them, needs proper dashboard reporting to effectively manage and optimize those processes. With the help of our list, you can create a complete financial dashboard that will enable you to interact with each metric and automate most of your reporting and analysis processes. By implementing these KPIs through the power of financial business intelligence, you have the opportunity to make your financial data and insights better, more informative, and easier to manage.
            </p>

            <h5 class="text-center mt-5 mb-5"><i>Here is the complete list of the top 18 finance KPIs and metrics, that every financial professional needs to know:</i></h5>
            <div class="d-flex justify-content-center">
               <div>
                  <ul>
                     <li><a href="#gross-profit-margin" class="text-warning">Gross Profit Margin</a>: How much revenue you have left after COGS?</li>
                     <li><a href="#operating-profit-margin" class="text-warning">Operating Profit Margin</a>: How is your EBIT developing over time?</li>
                     <li><a href="#operating-expense-ratio" class="text-warning">Operating Expense Ratio</a>: How do you optimize your operating expenses?</li>
                     <li><a href="#net-profit-margin" class="text-warning">Net Profit Margin</a>: How well your company increases its net profit?</li>
                     <li><a href="#working-capital" class="text-warning">Working Capital</a>: Is your company in stable financial health?</li>
                     <li><a href="#current-ratio" class="text-warning">Current Ratio</a>: Can you pay your short-term obligations?</li>
                     <li><a href="#quick-ratio" class="text-warning">Quick Ratio / Acid Test</a>: Is your company’s liquidity healthy?</li>
                     <li><a href="#berry-ratio" class="text-warning">Berry Ratio</a>: Are you losing money or generating profit?</li>
                     <li><a href="#cash-conversion-cycle" class="text-warning">Cash Conversion Cycle</a>: How fast can you convert resources into cash?</li>
                     <li><a href="#accounts-payable-turnover" class="text-warning">Accounts Payable Turnover</a>: Are you paying expenses at a reasonable speed?</li>
                     <li><a href="#accounts-receivable-turnover" class="text-warning">Accounts Receivable Turnover</a> : How quickly do you collect payments?</li>
                     <li><a href="#vendor-payment-error-rate" class="text-warning">Vendor Payment Error Rate</a>: Are you processing your invoices productively?</li>
                     <li><a href="#budget-variance" class="text-warning">Budget Variance</a>: Is your budgeting accurate and realistic?</li>
                     <li><a href="#return-on-assets" class="text-warning">Return on Assets</a>: Do you utilize your company’s assets efficiently?</li>
                     <li><a href="#return-on-equity" class="text-warning">Return on Equity</a> : How much profit do you generate for shareholders?</li>
                     <li><a href="#economic-value-added" class="text-warning">Economic Value Added</a>: How much profit do you generate for shareholders?</li>
                     <li><a href="#employee-statisfaction" class="text-warning">Employee Satisfaction</a>: Will your team recommend you as a workplace?</li>
                     <li><a href="#payroll-headcount-ratio" class="text-warning">Payroll Headcount Ratio</a> : How do you utilize your labor force?</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-dark mt-5" id="gross-profit-margin">
         <div class="container-lg">
            <div class="row p-md-5">
               <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center mb-lg-0 mb-md-5">
                  <div class="text-center">
                     <input type="text" id="knob1" class="knob" value="<?= $GROSSPROFITMARGIN ?>" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                     <div class="knob-label text-bold">GROSS PROFIT MARGIN</div>
                  </div>
               </div>
               <div class="col-lg-6 text-left">
                  <h1>GROSS PROFIT MARGIN</h1>
                  <h6>How much revenue you have left after COGS?</h6>
                  <p class="text-justify">This financial KPI refers to your total revenue minus the cost of goods sold (COGS) or service delivered, divided by your total sales revenue. This KPI signifies the percent of total sales revenue that you keep after accounting for all direct costs associated with producing your goods and is an important measure of the production efficiency of your company. Direct costs include the price of materials and labor but exclude expenses such as distribution and rent. Let’s look at an example: If your gross profit margin last year was <?= $GROSSPROFITMARGIN ?>%, you would keep <?= $GROSSPROFITMARGIN ?> cents out of every dollar earned and put it towards running your company by taking care of administration cost, marketing cost, and rent, among others.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher the gross profit margin you earn, the more income you retain for every dollar of your sales.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="operating-profit-margin">
         <div class="container-lg">
            <div class="row p-md-5">
               <div class="col-lg-6 text-right">
                  <h1>OPERATING PROFIT MARGIN</h1>
                  <h6>How is your EBIT developing over time?</h6>
                  <p class="text-justify">This financial KPI refers to your total revenue minus the cost of goods sold (COGS) or services provided, divided by your total sales revenue. This KPI signifies the percentage of total sales revenue that you save after taking into account all direct costs associated with the production of your goods and is an important measure of your company's production efficiency. Direct costs include the price of materials and labor but do not include costs such as distribution and rent. Let's see your gross profit margin last month was 40%, you will save 40 cents of every rupiah earned and use it to run your company by taking care of among others administrative costs, marketing costs and rent.</h6>
                  <p class="text-justify">The higher the operating income, the more profitable you company is likely to be. If this number is declining then you need to quickly identify the reasons and take action.</p>
               </div>
               <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center mb-lg-0 mt-md-5">
                  <div class="text-center">
                     <input type="text" id="knob3" class="knob" value="20" data-skin="tron" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" data-width="120" readonly data-height="120" data-fgColor="#00c0ef">
                     <div class="knob-label text-bold">OPERATING PROFIT MARGIN</div>
                  </div>
                  <div id="myChart2" class="chart--container"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-dark mt-5" id="operating-expense-ratio">
         <div class="container-lg">
            <div class="row p-md-5">
               <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center mt-5 mt-md-0">
                  <h6>Operating Expenses Ratio</h6>
                  <div class="display-4 text-bold">40%</div>
                  <div id="chartdiv3"></div>
               </div>
               <div class="col-lg-6 text-left mb-lg-0 mt-md-5">
                  <h1>OPERATING EXPENSE RATIO</h1>
                  <h6>How do you optimize your operating expenses?</h6>
                  <p class="text-justify">TOne of our next finance KPI examples, the operating expense ratio (OER), shows the operational efficiency of your company by comparing operating expenses (the cost associated with running your core operations) to your total revenue. The lower your company's operating expenses are, the more profitable your company will be. With modern KPI dashboards, you can easily analyze and track your operating costs in detail. These breakdowns are also useful when benchmarking your company against other organizations. As these numbers vary wildly by industry, when benchmarking please make sure to survey companies in a similar field. Investors are often interested in the operating ratio to specifically examine how high your operating costs are in relation to generated revenue.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Over time, changes in your company’s OER should inform you whether or not your company is scalable. Can you increase sales without increasing operating expenses?</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="net-profit-margin">
         <div class="container-lg">
            <div class="row p-md-5">
               <div class="col-lg-6 text-right">
                  <h1>NET PROFIT MARGIN</h1>
                  <h6>How well your company increases its net profit?</h6>
                  <p class="text-justify">Net profit margin measures your profit after subtracting all operating expenses, depreciation, interest and taxes divided by the total revenue (net income x 100 / total revenue). The net profit margin is one of the most closely tracked KPIs in finance. It measures how well your company does at turning revenue into profits. As a percentage of sales, not an absolute number, it is often used to compare different companies and see which of them are most effective at converting sales into a profit.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher your net profit margin, the better off you are. Review any decline with a fine-toothed comb to fix any problems from decreased sales to unsatisfied customers ASAP.</p>
               </div>
               <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center pl-3 pr-3  mb-lg-0 mt-md-5">
                  <h6>NET PROFIT MARGIN</h6>
                  <div id="chartdiv3A"></div>
                  <div class="display-4 text-bold p-3 w-100 text-center rounded" style="background-color: #24D627;">17%</div>
               </div>
            </div>
         </div>
      </div>
      <div class="jumbotron mt-5 text-center">
        <h1 class=" d-none d-md-block">VISUALIZE AND TRACK YOUR FINANCE KPIS WITH A FEW CLICKS</h1>
        <h4 class="d-md-none">VISUALIZE AND TRACK YOUR FINANCE KPIS WITH A FEW CLICKS</h4>
      </div>
      <div class="mt-5" id="working-capital">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 table-responsive  p-md-5">
                  <table class="table">
                     <tbody>
                        <tr class="bg-primary">
                           <th>Current Assets</th>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Current Assets'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Cash</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Cash'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Accounts Receivable</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Accounts Receivable'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Inventory</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Inventory'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Pre-Paid Expenses</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Pre-Paid Expenses'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-primary">
                           <th>Current Liabilities</th>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Current Liabilities'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Account Payable</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Accounts Payable'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Credit Card Debt</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Credit Card Debt'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Bank Operating Credit</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Bank Operating Credit'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Accured Expenses</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Accured Expenses'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-light">
                           <td>&nbsp; &nbsp; &nbsp;Taxes Payable</td>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Taxes Payable'],2,',','.'); ?></th>
                        </tr>
                        <tr class="bg-primary">
                           <th>Working Capital</th>
                           <th class=" text-right"><?= "Rp " . number_format($finance['Working Capital'],2,',','.'); ?></th>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="col-lg-6 bg-dark p-3 p-md-5 rounded d-flex flex-column justify-content-center">
                  <h1>WORKING CAPITAL</h1> <br>
                  <h6>Is your company in stable financial health?</h6>
                  <p class="text-justify">The top financial KPIs wouldn’t be complete without the working capital. This KPI is not a ratio or proportion, but solely the number of dollars remaining after you subtract your current liabilities from current assets. Your assets include your cash, inventory, accounts receivable or prepaid expenses etc. and empower you to pay for ongoing operating expenses and fund standard business operations. On the other hand, current liabilities represent all the obligations or debts that are due within 12 months. That can include accounts payable, bank operating credit, accrued expenses, taxes payable, etc. This is one of our KPI examples that illustrates a company’s operational efficiency and short-term financial health, which is important in the process of financial reporting and analysis.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">High working capital doesn’t automatically mean the company is performing extremely well. It can also mean that is not investing the excess cash.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="bg-dark mt-5" id="current-ratio">
         <div class="container-lg">
            <div class="row pt-4">
               <div class="col-lg-6  text-right p-3 p-md-5">
                  <h1>OPERATING EXPENSE RATIO</h1>
                  <h6>How do you optimize your operating expenses?</h6>
                  <p class="text-justify">TOne of our next finance KPI examples, the operating expense ratio (OER), shows the operational efficiency of your company by comparing operating expenses (the cost associated with running your core operations) to your total revenue. The lower your company's operating expenses are, the more profitable your company will be. With modern KPI dashboards, you can easily analyze and track your operating costs in detail. These breakdowns are also useful when benchmarking your company against other organizations. As these numbers vary wildly by industry, when benchmarking please make sure to survey companies in a similar field. Investors are often interested in the operating ratio to specifically examine how high your operating costs are in relation to generated revenue.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Over time, changes in your company’s OER should inform you whether or not your company is scalable. Can you increase sales without increasing operating expenses?</p>
               </div>
               <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">

                  <h6>Current Ratio</h6>
                  <div class="display-4 mb-4 text-bold">1.3</div>
                  <div id="myChart10" class="chart--rounded"><a class="zc-ref" href="https://www.zingchart.com/">Powered by ZingChart</a></div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="quick-ratio">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6  p-5">
                  <div class="d-flex justify-content-around flex-column flex-lg-row align-items-center">
                     <div class="text-center w-100">
                        <h6>Quick Ratio</h6>
                        <div id="chartdiv3B"></div>
                     </div>

                     <div class="w-100 text-center">
                        <h6>Current Ratio</h6>
                        <div id="chartdiv3C"></div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center">
                  <h1>QUICK RATIO / ACID TEST</h1> <br>
                  <h6>Is your company’s liquidity healthy?</h6>
                  <p class="text-justify">We continue our finance KPI examples with the quick ratio. This metric takes into account just the short-term liquidity positions (the so-called near-cash assets) that you can convert into cash quickly. It is much more conservative about the assets since it doesn’t include all of them. It is also known as the acid test ratio, as it produces instant results. This KPI also expounds on the liquidity of a company but it should consider assets that can be easily converted into cash, usually within 90 days or so, such as accounts receivable.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher the ratio, the better your liquidity and financial health. In comparison to the current ratio your quick ratio will be always smaller, because it just includes near-cash assets. Your goal should be to have at minimum a quick ratio of 1,0.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5 bg-dark" id="berry-ratio">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center text-right">
                  <h1>BERRY RATIO</h1> <br>
                  <h6>Are you losing money or generating profit?</h6>
                  <p class="text-justify">Our list of the most important financial key performance indicators wouldn’t be complete without the berry ratio. This metric compares the gross profit of a company with its operating expenses, and you can use it to indicate the profit in a specific time period. If the coefficient is above 1, it means that your company is making profit above all variable expenses, while a coefficient below 1 will indicate that your company is losing money, therefore, it would make sense to look into this metric over a timeframe in order to monitor if the performance starts to drop. In our example, we can see that the ratio is above 2 which means that the company is generating a healthy amount of profit.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Track this metric over a set timeframe and ensure your coefficient stays above 1 in order to keep generating profit against variable expenses.</p>
               </div>
               <div class="col-lg-6  p-md-5">
                     <div class="mb-4">
                        <small>Compares gross profit to operating expenses. <br>Target > 1.0</small>
                     </div>
                     <div class="w-100">
                        <div id="myChart11" class="chart-berryratio rounded">
                        </div>
                        <div class="rounded mt-3 bg-success w-100 p-3 text-center mb-3">
                           <h1>2.2</h1>
                        </div>
                     </div>
               </div>
            </div>
         </div>
      </div>
      <div class="jumbotron mt-5 text-center">
        <h1 class=" d-none d-md-block">SEE RICH EXAMPLES OF INTERACTIVE REAL-TIME KPIS IN DATAPINE</h1>
        <h4 class="d-md-none">SEE RICH EXAMPLES OF INTERACTIVE REAL-TIME KPIS IN DATAPINE</h4>
      </div>
      <div class="mt-5" id="cash-conversion-cycle">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6">
                  <div class="card shadow-none">
                        <div class="card-header">
                           Cash Conversion Cycle in Days - Last 3 Years
                        </div>
                        <div class="card-body">
                           <div class="d-flex justify-content-around table-responsive flex-column flex-md-row align-items-center">
                              <div class="p-3 rounded text-center" style="background-color: #E9ECEF;">
                                    <b class="text-primary h3">59.0</b> <br> DSO
                              </div>
                              <i class="fa fa-plus fa-2x text-secondary"></i>
                              <div class="p-3 rounded text-center" style="background-color: #E9ECEF;">
                                    <b class="text-primary h3">59.0</b> <br> DIO
                              </div>
                              <i class="fa fa-minus fa-2x text-secondary"></i>
                              <div class="p-3 rounded text-center" style="background-color: #E9ECEF;">
                                    <b class="text-primary h3">59.0</b> <br> DPO
                              </div>
                              <i class="fa fa-equals fa-2x text-secondary"></i>
                              <div class="p-3 rounded text-center" style="background-color: #E9ECEF;">
                                    <b class="text-danger h3">59.0</b> <br> CCC
                              </div>
                           </div>
                           
                           <div class="table-responsive mt-5">
                              <div id="chart_conversion" class="chartCcc"></div>
                           </div>
                        </div>
                     </div>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center">
                  <h1>CASH CONVERSION CYCLE</h1> <br>
                  <h6>How fast can you convert resources into cash?</h6>
                  <p class="text-justify">The cash conversion cycle (or CCC) is a quantitative measure that helps to evaluate how efficient a company’s operations and management processes are. It basically measures how long does it take for a company to convert its inventory investments and other resources into cash flows from sales. The mathematical formula for calculating CCC = DIO (days of inventory outstanding) + DSO (days sales outstanding) – DPO (days payable outstanding). A steady or decreasing CCC is a fairly good sign, but if it starts to rise, an additional analysis should be made. It also differs across industries based on the nature of business operations.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">If a company is efficiently managing the requirements of the market and its customers, the cash conversion cycle will have a lower value.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5 bg-dark" id="accounts-payable-turnover">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column text-right justify-content-center">
                  <h1>ACCOUNTS PAYABLE TURNOVER</h1> <br>
                  <h6>Are you losing money or generating profit?</h6>
                  <p class="text-justify">Accounts payable turnover is a short-term liquidity financial metric and shows how quickly you pay off suppliers and other bills. It is derived from your total purchases from vendors, divided by your average accounts payable, over a set period (total supplier purchases / avg. accounts payable). In other words, the accounts payable turnover ratio indicates how many times a company can pay off its average accounts payable balance during the course of a defined period, such as one year. For example, if your company purchases $10 million worth of goods in a year, and holds average accounts payable of $2 million, the ratio would be five. If your accounts payable turnover ratio is increasing, it means that you are paying your suppliers at a faster rate. The opposite would be the case when the turnover ratio is decreasing.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">A higher ratio shows suppliers and creditors that your company pays its bills frequently and facilitates when negotiating a credit line with a supplier. On the other hand, paying your bills fast reduces your available cash.</p>
               </div>
               <div class="col-lg-6 pt-lg-5">
                  <div class="text-center">
                     <div class="mb-4">
                        <h4>Account Payable Turnover</h4>
                        <h1>6,6 Times <b class="text-success">(+2%)</b></h1>
                        <small>Account Payable Turnover Ratio</small>
                     </div>
                     <div class="row">
                           <div class="col-md-12">
                              <div id="myChart2A" class="rounded"></div>
                           </div>
                        
                     </div><div class="d-flex justify-content-around p-3 rounded bg-white mt-3 mb-3">
                              <small class="mr-2"><i class="fa fa-square mr-2" style=" color:#400030ff"></i><br class="d-block d-md-none"> not due</small>
                              <small><i class="fa fa-square mr-2" style=" color:#6b275aff"></i><br class="d-block d-md-none"> < 30 days</small>
                              <small><i class="fa fa-square mr-2" style=" color:#ba3d5dff"></i><br class="d-block d-md-none"> < 60 days</small>
                              <small><i class="fa fa-square mr-2" style=" color:#e16b5fff"></i><br class="d-block d-md-none"> < 90 days</small>
                              <small><i class="fa fa-square mr-2" style=" color:#fe9085ff"></i><br class="d-block d-md-none"> > 90 days</small>
                           </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="accounts-receivable-turnover">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 text-center">
                  <h5>ACCOUNTS RECEIVABLE TURNOVER</h5>
                  <div class="w-100 p-md-5 d-flex justify-content-center flex-column">
                     <div class="rounded ml-md-5 mr-md-5 d-flex justify-content-between p-3" style="background-color: #DFF5FF;">
                        <div>Ar Turnover:</div>
                        <div>30.8 days</div>
                     </div>
                     <div class="rounded mt-2 ml-md-5 mr-md-5 d-flex justify-content-between p-3" style="background-color: #DFF5FF;">
                        <div class="text-right">Ar Turnover Ratio:</div>
                        <div>11.8</div>
                     </div>
                     <small class="mt-3">AR TURNOVER BY PAYMENT TARGET</small>
                     <div id="chartAccountPayableTurnover">
                  </div>
                  </div>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded">
                  <h1>ACCOUNTS RECEIVABLE TURNOVER</h1> <br>
                  <h6>How quickly do you collect payments?</h6>
                  <p class="text-justify">Our next KPI for finance is the accounts receivable turnover which measures how quickly you collect your payments owed and displays a company’s effectiveness in extending credits. This KPI measures the number of times that a company can collect its average accounts receivable and is calculated by dividing the amount of all supplier purchases by the average amount of accounts receivable for a given period. The faster your company can turn credit sales into cash, the higher your liquidity. A low accounts receivable turnover ratio signifies that there is a need to revise the company’s credit policies to ensure a more timely collection of payments.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher the accounts receivable turnover ratio, the better and the more liquidity you have available to finance your short-term liabilities.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="jumbotron mt-5 text-center">
        <h1 class=" d-none d-md-block">VISUALIZE AND TRACK YOUR FINANCE KPIS WITH A FEW CLICKS</h1>
        <h4 class="d-md-none">VISUALIZE AND TRACK YOUR FINANCE KPIS WITH A FEW CLICKS</h4>
      </div>
      <div class="mt-5 bg-dark" id="vendor-payment-error-rate">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center text-right">
                  <h1>VENDOR PAYMENT ERROR RATE</h1> <br>
                  <h6>Are you processing your invoices productively?</h6>
                  <p class="text-justify">This is one of our financial KPI templates that focuses on the company’s diligence in issuing and paying vendors (creditors, suppliers) invoices. These errors may include payments made to the wrong entity, underpayments or overpayments, and fundamentally, it shows if the company has a stable accounts payable department. It is calculated with the total number of payments that contained an error divided by the total number of transactions over a period of time and expressed as a percentage. The goal is to keep this percentage as low as possible and deliver accurate and timely invoices (and payments). This will create stronger partnerships between companies.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">A high percentage of the error rate clearly indicates that the controlling of procurement functions lacks efficiency. This can lead to vendor disputes.</p>
               </div>
               <div class="col-lg-6  p-md-5">
                  <div class="card">
                     <div class="card-header text-dark">
                        Vendor Payment Error Rate - Last 12 Months
                     </div>
                     <div class="card-body table-responsive">
                        <div style="width:100%;">
                           <canvas id="canvas" width="100%" height="100%"></canvas>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="budget-variance">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 table-responsive  m-lg-0 m-md-5">
                     <table class="table table-light table-striped table-bordered rounded">
                        <tbody>
                           <tr>
                              <th>Property</th>
                              <th>Actual</th>
                              <th>Budget</th>
                              <th>Variance</th>
                           </tr>
                           <tr>
                              <td class="text-danger">Front Fairway</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                           </tr>
                           <tr>
                              <td class="text-success">Lakeside Appartement</td>
                              <td class="text-success">Rp. 20M</td>
                              <td class="text-success">Rp. 20M</td>
                              <td class="text-success">Rp. 20M</td>
                           </tr>
                           <tr>
                              <td class="text-danger">Proactive Company</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                           </tr>
                           <tr>
                              <td class="text-danger">Result Consulting</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                              <td class="text-danger">Rp. 20M</td>
                           </tr>
                           <tr>
                              <th>Total</th>
                              <th>Rp. 20M</th>
                              <th>Rp. 20M</th>
                              <th>Rp. 20M</th>
                           </tr>
                        </tbody>
                     </table>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded">
                  <h1>BUDGET VARIANCE</h1> <br>
                  <h6>Is your budgeting accurate and realistic?</h6>
                  <p class="text-justify">The budget variance is one of our next financial KPI examples which expresses the difference between budgeted and actual figures for a specific accounting category. It can be favorable or unfavorable, each caused by various internal and external factors such as labor costs, poorly planned budget, natural disasters, changing business conditions, etc. The goal is to keep the revenue that comes in higher than budgeted, or expenses lower than originally predicted. That would ensure a greater income than expected. On the other hand, if revenues fall short of the budgeted amounts, expenses get higher, and the variance becomes unfavorable.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Keep your budgeting and assumptions realistic and accurate as possible to avoid unfavorable budget variance and, consequently, increase your expenses.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5 bg-dark" id="return-on-assets">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center text-right">
                  <h1>RETURN ON ASSETS (ROA)</h1> <br>
                  <h6>Do you utilize your company’s assets efficiently?</h6>
                  <p class="text-justify">Return on assets is an indicator of how profitable companies are in relation to their total assets. This financial KPI is calculated by dividing your net income by the total assets. The assets of a company include both, debt and equity. The increasing ROA is a good indication since it states that either the company is earning more money with the same account of assets or it generates equal profits with fewer assets required. This KPI is important to potential investors because it gives them a solid insight into how efficiently management is using their assets to generate earnings or in other words, how effectively they are converting investments into net income.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher the return on assets (ROA) the better, especially compared to other companies in the same industry.</p>
               </div>
               <div class="col-lg-6  p-5">
                  <div class="card">
                     <div class="card-header text-dark">
                        Return on Assets (%)
                     </div>
                     <div class="card-body table-responsive">
                        
                        <div id="myChart12" class="chart-roa rounded">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="return-on-equity">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 d-flex align-items-center justify-content-center">
                  <div class="card w-100">
                     <div class="card-header text-dark">
                        Return on Equity
                     </div>
                     <div class="card-body table-responsive">
                        <div id="myChart13" class="chart-roa rounded">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center">
                  <h1>RETURN ON EQUITY (ROE)</h1> <br>
                  <h6>How much profit do you generate for shareholders?</h6>
                  <p class="text-justify">Return on equity (ROE) measures how much profit your company generates for your shareholders. In other words, management often utilizes it to measure how effectively a company is using its assets to create profits. This metric can be calculated by dividing your company’s net income (minus dividends to preferred stocks) by your shareholder’s equity (excluding preferred shares). It is often used to compare the profitability among certain companies within the same industry. For example, if a tech company has a ROE of 20% compared to its peers that have an average of 17%, an investor can conclude that the management has above average results in using the assets to create profits.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">The higher the return on equity, the more value you are generating for your shareholders. Keep in mind to compare the results within your industry.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5 bg-dark" id="economic-value-added">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center text-right">
                  <h1>ECONOMIC VALUE ADDED (EVA)</h1> <br>
                  <h6>Do you generate true economic profit?</h6>
                  <p class="text-justify">To calculate the economic value added (EVA), you need to deduct the costs of capital from the operating profit and adjust for taxes on a cash basis. This finance KPI example shows the value a company generates from funds invested into it. If the value is negative, the company is not generating value, and, on the other hand, if it’s positive, the company generates value from the funds invested. The basic formula to calculate EVA is as follows: net operating profit after taxes (NOPAT) - invested capital * weighted average cost of capital (WACC). You can see in our example an automatic calculation and immediately spot that the company generates value and has a positive EVA which is a positive sign of development.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Monitor EVA on a regular basis so that you get aware of the company’s wealth through assets and expenses in order to make better managerial decisions.</p>
               </div>
               <div class="col-lg-6  p-3 p-md-5">
                  <div class="card bg-dark shadow-none">
                     <div class="card-header border-0">
                        ECONOMIC VALUE ADDED
                     </div>
                     <div class="card-body table-responsive">
                        <div id="myChart14" class="chart-roa rounded"></div>
                        <div class="w-100 rounded bg-success p-4 text-center mt-3">
                           <h2>Rp. 20.000.000,00</h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5" id="employee-statisfaction">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 d-flex align-items-center justify-content-center">
                  <div class="card w-100 shadow-none">
                     <div class="card-header text-dark border-0">
                        EMPLOYEE SATISFACTION
                        <small>(NPS)</small>
                     </div>
                     <div class="card-body table-responsive">
                        <div id="myChart4" class="chart-roa rounded">
                        </div>
                        <div class="row">
                           <div class="col-lg-6 d-flex flex-column justify-content-center">
                              <h6>TREND</h6>
                              <h2 style="color: #219ebc;">POSITIVE <i class="fa fa-arrow-alt-circle-up"></i></h2>
                           </div>
                           <div class="col-lg-6">
                              <div id="myChart15" class="chart-roa rounded"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center">
                  <h1>EMPLOYEE SATISFACTION</h1> <br>
                  <h6>Will your team recommend you as a workplace?</h6>
                  <p class="text-justify">We continue our financial metrics examples with the employee satisfaction levels depicted through the net promoter score (NPS) in our visual on the right. This isn’t a financial KPI per se, but it’s important to keep employees and customers satisfied as the ultimate goal, since low satisfaction levels from both will end up in worse financial metrics. We have also visualized the development over the course of a year so you can also use it as a trend indicator. That way, you can see which months have performed better or if you need some adjustments in your talent management processes. A quick trend overview, whether positive or negative, will enable you to immediately spot if your employees (or customers) are satisfied or not. Consequently, you can adjust your strategies, examine your data and people management, if you see that the satisfaction levels drop.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Use this metric to get a better overview of your people management processes, but dig deeper with other HR metrics in order to gain a complete overview.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="mt-5 bg-dark" id="payroll-headcount-ratio">
         <div class="container-lg">
            <div class="row">
               <div class="col-lg-6 p-3 p-md-5 rounded d-flex flex-column justify-content-center text-right">
                  <h1>PAYROLL HEADCOUNT RATIO</h1> <br>
                  <h6>How do you utilize your labor force?</h6>
                  <p class="text-justify">The payroll headcount ratio is a metric you can calculate by dividing HR full-time positions with the total number of employees. You can include freelancers, part-time employees, and contractors, for example, to be able to evaluate, in the best possible manner, how well your company is utilizing its workforce. This metric basically shows how many people are engaged in the payroll process in comparison to the total number of employees. If the ratio is rising, it means that you’re adding labor costs so it might make sense to keep an eye on this metric so that you don’t experience potential financial difficulties.</p>
                  <h6>Performance Indicators</h6>
                  <p class="text-justify">Make sure your labor costs are well invested and bring positive financial gain. If you spend more than you earn, you need to reconsider your employment strategies.</p>
               </div>
               <div class="col-lg-6  p-5">
                  <div class="card w-100 shadow-none bg-dark">
                     <div class="card-header border-0">
                        PAYROLL HEADCOUNT RATIO
                     </div>
                     <div class="card-body table-responsive">
                           <div id="myChart16" class="chart-roa rounded"></div>
                           <div class="w-100 mt-3 p-3 rounded bg-success text-center">
                              <h2>0.1</h2>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   
   <a href="#up-hero" class=" p-3 bg-danger" style="position: fixed; bottom: 20px; right: 20px; border-radius:5%"><i class="fa fa-arrow-up"></i></a>
   <script src="<?php echo base_url(); ?>assets/dist/js/finance/detail_finance.js"></script>
</body>

</html>