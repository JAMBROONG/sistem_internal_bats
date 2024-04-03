<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <?php
    function getExpiredData($date) {
      $days = abs($date);
    // Menghitung tahun dan bulan
    $years = floor($days / 365);
    $remainingDays = $days % 365;
    $months = floor($remainingDays / 30);
    $days = $remainingDays % 30;

    // Output hasil konversi
    if ($years > 0) {
        echo $years . " year ";
    }
    if ($months > 0) {
        echo $months . " month ";
    }
    if ($days > 0) {
        echo $days . " days ";
    }
    echo "ago";
  }
    function getExpired($date)
    {
      $todayDateObj = new \DateTime(date('Y-m-d'));
      $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($date)));
      $interval = $todayDateObj->diff($foundedDateObj);
      $interval = $interval->format('%r%a') . "\n\n";
      if ($interval < 0) {
        $status = '<small style="padding:2px;" class="rounded bg-danger">Expired</small>';
      } else if ($interval > 28 && $interval < 35) {
        $status = '<small style="padding:2px;" class="rounded bg-warning">Expired in <b>1 month</b> </small>';
      } else if ($interval <= 28) {    
        $status = '<small style="padding:2px;" class="rounded bg-orange">Expired in <b>1 day</b> </small>';

      } else {
        $status = '<small style="padding:2px;" class="rounded bg-success">has not expired</small>';
      }

      // Tampilkan status keterlambatan
      return array(
        'status' => $status,
        'interval' => $interval
      );
    }
    ?>

    <?php $this->load->view('superAdmin/header'); ?>
</head>
<body class="hold-transition sidebar-mini lyt">
    <div class="m-5">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url()?>">Home</a></li>
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                    <li class="breadcrumb-item text-sm">
                        <a href="<?= base_url('SuperAdmin/finance_req/'.$user_id)?>">Month or Year</a>
                    </li>
                    <li class="breadcrumb-item text-sm">
                        <a href="<?= base_url('SuperAdmin/finance_core?user_id='.$user_id.'&&type=year&date='.$date)?>">Core</a>
                    </li>
                    <li class="breadcrumb-item text-sm active" aria-current="page">Inventory</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-3" onclick="window.location = '<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date.'')?>&show=medicine'">
                <button type="button" name="" class="btn btn-light text-center btn-lg btn-block d-flex justify-content-center p-4" id="navMedicine">Medicine</button>
            </div>
            <div class="col-md-3" onclick="window.location = '<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date.'')?>&show=consumable-shemicals'">
                <button type="button" na~me="" class="btn btn-light text-center btn-lg btn-block d-flex justify-content-center p-4">Consumable Shemicals</button>
            </div>
            <div class="col-md-3" onclick="window.location = '<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date.'')?>&show=laboratory'">
                <button type="button" name="" class="btn btn-light text-center btn-lg btn-block d-flex justify-content-center p-4">Laboratory</button>
            </div>
            <div class="col-md-3" onclick="window.location = '<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date.'')?>&show=radiology'">
                <button type="button" name="" class="btn btn-light text-center btn-lg btn-block d-flex justify-content-center p-4">Radiology</button>
            </div>
        </div>
        <?php
        if (isset($_GET['show'])) {
            switch ($_GET['show']) {
              case 'medicine':
                $this->load->view('superAdmin/inventory/year/medicine.php');
                break;
              case 'consumable-shemicals':
                $this->load->view('superAdmin/inventory/year/consumable-shemicals.php');
                break;
              case 'laboratory':
                $this->load->view('superAdmin/inventory/year/laboratory.php');
                break;
              case 'radiology':
                $this->load->view('superAdmin/inventory/year/radiology.php');
                break;
              default:
                $this->load->view('superAdmin/inventory/year/medicine.php');
                break;
            }
          } else{
            
            $this->load->view('superAdmin/inventory/year/medicine.php');
          }
          
        ?>
    <script>
      $('.select2').select2({
      });
    </script>
</body>

</html>