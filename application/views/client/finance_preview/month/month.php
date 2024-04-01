<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Order</title>

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
  <style>
    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    }
  </style>
</head>

<body>
  <section class="content">
    <div class="container">
      
    <?php include 'formulas.php' ?>  
      <div class="alert alert-info alert-dismissible mt-5 p-3">
        <div class="d-flex flex-row justify-content-between">
        <h5><i class="icon fas fa-info"></i> <?= $user['company'] ?> </h5>
        <h5><?= $company_type['type_en'] ?></h5>
        </div>
        Display monthly data by month: <strong><?= date('F, Y', strtotime($date)) ?></strong> 
      </div>
    </div>
    <div class="container shadow">
      <?php
        include 'hero/cash_management_dashboard.php';
      ?>
    </div>

    </div>
    <!-- <div class="container shadow"> -->
      <?php
        // include 'hero/financial_kpi_dashboard.php';
      ?>
    <!-- </div> -->
    
    <!-- <div class="container shadow"> -->
      <?php
        // include 'hero/profit_and_loss_dashboard.php';
      ?>
    <!-- </div> -->
    
    <!-- <div class="container shadow"> -->
      <?php
        // include 'hero/cfo_dashboard.php';
      ?>
    <!-- </div> -->
    
    <!-- <div class="container shadow"> -->
      <?php
        // include 'hero/finance_peformance_dashboard.php';
      ?>
    <!-- </div> -->
  </section>
  <script>
    function close_window() {
      if (confirm("Close Window?")) {
        close();
      }
    }
    // Scroll to specific values
    // scrollTo is the same
    window.scroll({
      top: 2500,
      left: 0,
      behavior: 'smooth'
    });

    // Scroll certain amounts from current position 
    window.scrollBy({
      top: 100, // could be negative value
      left: 0,
      behavior: 'smooth'
    });

    // Scroll to a certain element
    document.querySelector('.hello').scrollIntoView({
      behavior: 'smooth'
    });
  </script>
</body>

</html>