<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php $this->load->view('client/header'); ?>
    <style>
        .select2-results__options li{
            color: black;
        }
    </style>
</head>
<?php
    $url = "https://www.bats-consulting.com/news/";
?>
<body class="hold-transition">
    <div class="wrapper">
        <?php $this->load->view('client/navbar'); ?>
        <div class="content-wrapper bg-white d-flex align-items-center justify-content-center">
            <section class="content h-100  d-flex align-items-center">
            <div class="container py-4 py-xl-5">
                <div class="row">
                    <div class="col-md-6 text-center text-md-left d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center mb-4">
                        <div style="max-width: 500px;">
                            <h2 class="text-uppercase font-weight-bold">FINANCIAL DASHBOARD</h2>
                            <p class="text-justify my-3">Financial Dashboard is a website designed to provide a comprehensive overview of the financial condition of a company or individual. Through Financial Dashboard, users can visualize and analyze financial data in real-time, including information on revenue, expenses, profitability, balance sheets, and cash flow. The dashboard also provides interactive graphs and tables, allowing users to compare historical data and track financial performance over time. By using Financial Dashboard, users can make better and faster decisions based on accurate and up-to-date financial data.</p>
                            <a class="btn btn-primary btn-lg mr-2" role="button" href="#" data-toggle="modal" data-target="#month">Monthly <i class="fa fa-calendar-alt ml-2"></i></a>
                            <a class="btn btn-outline-primary btn-lg" role="button" href="#" data-toggle="modal" data-target="#year">Annual<i class="fa fa-globe ml-2"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;" src="<?=base_url()?>assets/image/financial_dashboard/hero01.svg" /></div>
                    </div>
                </div>
            </div>
            <div class="m-1 m-lg-5 mt-4" id="cash_md">
        <div class="card rounded-0 text-left shadow-none">
          <div class="card-body">
        <h6>Displays the financial dashboard of <b><?=$user['company']?></b> </h6>
        <hr>
        <div class="d-flex justify-content-between">
          <table>
              <tr>
                  <td>Type</td>
                  <td>: <b class="bg-warning rounded" style="padding:3px; font-size:12px">Monthly</b></td>
              </tr>
              <tr>
                  <td>Date</td>
                  <td>: <b> <?= date('F, Y' , strtotime($date)) ?></b></td>
              </tr>
          </table>
          <div class="form-group">
            <label for=""></label>
            <input type="month" id="bulan" name="bulan" class="form-control tanggal_show2" value="<?= $date ?>" onchange="redirectToPage()">
            <small id="helpId" class="text-muted">Change Date</small>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          
        </div>
          </div>

        </div>
      <?php
        include 'hero/cash_management_dashboard.php';
      ?>
    </div>

    <div class="m-1 m-lg-5" id="fkd">
      <?php
        include 'hero/financial_kpi_dashboard.php';
      ?>
    </div>
    
    <div class="m-1 m-lg-5"  id="pald">
      <?php
        include 'hero/profit_and_loss_dashboard.php';
      ?>
    </div>
    
    <div class="m-1 m-lg-5"  id="cd">
      <?php
        include 'hero/cfo_dashboard.php';
      ?>
    </div>
    
    <div class="m-1 m-lg-5"  id="fpd">
      <?php
        include 'hero/finance_peformance_dashboard.php';
      ?>
    </div>
    
    <div class="m-1 m-lg-5" >

  <div class="p-3 mb-3 bg-white text-center">
    <h2>OUR RECOMMENDATION</h2>
  </div>
  <?php
  $this->load->view('superAdmin/components/our_recommendation.php');
 ?>
 
 <div class="p-3 mb-3 bg-white text-center">
    <h2>DATA TAX</h2>
  </div>
  <div class="bg-light">
    
 <?php
 $this->load->view('superAdmin/finance_month/element_table_tax.php');
 ?>
  </div>
    </div>
            </section>
        </div>
        
        <?php include 'footer.php';?>
        
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
        function fun_submit(x, y) {
            var y = document.getElementById(y).value;
            if (y == "") {
                alert('Field tidak boleh kosong');
            } else {
                $(x).submit();
            }
        }
            $('#nav_financial_dashboard').addClass('nav_select');
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        </script>
</body>

</html>