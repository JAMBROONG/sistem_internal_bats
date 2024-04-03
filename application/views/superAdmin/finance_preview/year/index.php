<?php
function format_angka($angka) {
  $satuan = ['', 'k', 'M', 'B', 'T', 'Q', 'Qt', 'Sx', 'Sp', 'Oc', 'No', 'De'];
  $ukuran = count($satuan) - 1;
  $i = 0;
  $abs_angka = abs($angka);
  if ($angka < 0) {
    $tanda = '-';
  } else {
    $tanda = '';
  }
  while ($abs_angka >= 1000 && $i < $ukuran) {
    $abs_angka /= 1000;
    $i++;
  }
  return 'Rp. '. $tanda . round($abs_angka, 1) . '' . $satuan[$i];
} 
?>

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
      
        background-color:black;
    
    }
  </style>
</head>

<body>
  <div class="d-flex fixed-top justify-content-between p-2 bg-black">
    <div class="">
      
        <a href="#cash_md" style="padding:2px;" class="btn btn-default">Cash Management Dashboard <img src="https://img.icons8.com/cotton/256/area-chart.png" width="20px" alt=""> </a>
        <a href="#fkd" style="padding:2px;" class="btn btn-default ml-3">Financial KPI Dashboard  <img src="https://img.icons8.com/cotton/256/area-chart.png" width="20px" alt=""></a>
        <a href="#pald" style="padding:2px;" class="btn btn-default ml-3">Profit and Loss Dashboard  <img src="https://img.icons8.com/cotton/256/area-chart.png" width="20px" alt=""></a>
        <a href="#cd" style="padding:2px;" class="btn btn-default ml-3">CFO Dashboard  <img src="https://img.icons8.com/cotton/256/area-chart.png" width="20px" alt=""></a>
        <a href="#fpd" style="padding:2px;" class="btn btn-default ml-3">Financial Performance Dashboard  <img src="https://img.icons8.com/cotton/256/area-chart.png" width="20px" alt=""></a>
    </div>
    <div class="">
      
    <button  style="padding:2px;" onclick="window.location = '<?= base_url('SuperAdmin/finance_input_year?user_id='.$user_id.'&date='.$date) ?>';" class="btn btn-sm btn-default align-items-center mr-2 "> Input Data <img src="https://img.icons8.com/cotton/1x/edit--v2.png" class="mr-2" width="15px" alt=""></button>
        <button  style="padding:2px;" onclick="window.location = '<?=base_url('SuperAdmin/finance_manage_year?user_id='.$user_id.'&date='.$date)?>'" class="btn btn-sm btn-default align-items-center mr-2 "> Set Default <img src="https://img.icons8.com/cotton/1x/folder-invoices--v2.png" class="mr-2" width="15px" alt=""></button>
        <button  style="padding:2px;" onclick="window.location = '<?=base_url('SuperAdmin/finance_core?type=year&user_id='.$user_id.'&date='.$date)?>'" class="btn btn-sm btn-default align-items-center"> Home <img src="https://img.icons8.com/cotton/1x/home-page.png" class="mr-2" width="15px" alt=""></button>

    </div>
  </div>
  <section class="content">
    <div class="m-1 m-lg-5 mt-4" id="cash_md">
        <div class="card rounded-0 text-left shadow-none">
          <div class="card-body">
        <h6>Displays the financial dashboard of <b><?=$client['company']?></b> </h6>
        <hr>
        <div class="d-flex justify-content-between">
          <table>
              <tr>
                  <td>Type</td>
                  <td>: <b class="bg-warning rounded" style="padding:3px; font-size:12px">Year</b></td>
              </tr>
              <tr>
                  <td>Date</td>
                  <td>: <b> <?= $date?></b></td>
              </tr>
          </table>
          <div class="form-group">
            <select class="form-control" style="width:200px;" name="date" id="years"  onchange="redirectToPage()">
              <option value="<?= $date ?>"><?= $date ?></option>
                <?php
                foreach ($list_year as $key) {
                  if ($key['tahun'] == $date) {
                    continue;
                  }
                  ?>
                <option value="<?=$key['tahun']?>"><?=$key['tahun']?></option>
                <?php
                }
                ?>
              </select>
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
  </section>
  <script>
    function close_window() {
      if (confirm("Close Window?")) {
        close();
      }
    }
    
function redirectToPage() {
  var year = document.getElementById("years").value;
  window.location.href = "<?= base_url()?>SuperAdmin/finance-year?show=y&user_id=<?=$client['id']?>&date=" + year;
}

</script>
</body>

</html>