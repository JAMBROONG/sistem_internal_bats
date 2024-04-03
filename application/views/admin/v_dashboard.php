<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
  
</head>
<style>
    #chartdiv {
            width: 100%;
            height: 300px;
        }
    html {
        scroll-behavior: smooth;
        }
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
  panX: false,
  panY: false,
  wheelX: "none",
  wheelY: "none"
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
cursor.lineY.set("visible", false);

// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
  maxDeviation: 0,
  categoryField: "name",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root, {

  })
}));

xAxis.get("renderer").labels.template.setAll({
  fill: "#ffffff"
});
xRenderer.grid.template.set("visible", false);

var yRenderer = am5xy.AxisRendererY.new(root, {});
var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
  maxDeviation: 0,
  min: 0,
  extraMax: 0.1,
  renderer: yRenderer
}));

yRenderer.grid.template.setAll({
  strokeDasharray: [2, 2]
});

// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "name",
  tooltip: am5.Tooltip.new(root, { dy: -25, labelText: "{valueY} hour" })
}));

series.columns.template.adapters.add("fill", (fill, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", (stroke, target) => {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

// Set data
var data = <?php echo json_encode($timeDailyReport ); ?>;

series.bullets.push(function() {
  return am5.Bullet.new(root, {
    locationY: 1,
    sprite: am5.Picture.new(root, {
      templateField: "bulletSettings",
      width: 50,
      height: 50,
      centerX: am5.p50,
      centerY: am5.p50,
      shadowColor: am5.color(0x000000),
      shadowBlur: 4,
      shadowOffsetX: 4,
      shadowOffsetY: 4,
      shadowOpacity: 0.6
    })
  });
});

xAxis.data.setAll(data);
series.data.setAll(data);

// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()
</script>
<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper bg-white">
        <?php include'top_nav.php'; ?>
        <aside class="main-sidebar bg-white elevation-2 layout-fixed">
            <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                <img src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                <small class="text-white font-weight-light">Admin</small>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item rounded bg-info">
                            <a href="<?php echo base_url('Admin'); ?>" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataProject'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-microchip"></i>
                                <p> Services </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-project-diagram"></i>
                                <p> Workflow </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataInformation'); ?>" class="nav-link">
                                <i class=" nav-icon fab fa-pied-piper-square"></i>
                                <p> Seminar </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p> Users </p>
                            </a>
                        </li>
                        <li class="nav-header text-black  pt-2">EXTERNAL</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user nav-icon"></i>
                                <p>
                                    Client
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p> Order
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataChatt'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-comments"></i>
                                        <p> Chat
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link text-muted">
                                        <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                        <p> Finance
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataCompany'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-building"></i>
                                        <p> Company </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataRecommendation'); ?>" class="nav-link">
                                        <i class=" nav-icon fa fa-record-vinyl"></i>
                                        <p> Service Recommendation </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-envelope"></i>
                                        <p> Feedback </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                       <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user-clock nav-icon"></i>
                                <p>
                                    Guest
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/guestTHC'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-book-medical"></i>
                                        <p> Tax Health Check
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">INTERNAL</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="fa fa-user-friends nav-icon"></i>
                                <p>
                                    Employee
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dataEmployee'); ?>" class="nav-link">
                                        <i class="nav-icon far fa-user"></i>
                                        <p> Data Employee </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/dailyReport'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-calendar-check"></i>
                                        <p> Daily Report </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/specialTask'); ?>" target="blank" class="nav-link">
                                        <i class="nav-icon fa fa-book-reader"></i>
                                        <p> Special Task </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/training'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                        <p> Training</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">OTHER</li>
                        <?php include 'navbar_comingsoon.php'; ?>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Admin/dataHistory'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-history"></i>
                                <p> History </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    
                <!-- <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> APAAN TUH!</h5>
                Ada yang baru loh!! 
                <ol>
                    <li>Melihat Special Task: Di dashboard ini kamu udah bisa melihat spesial task terbaru ya! <a href="#special_task">lihat disini</a>:D</li>
                    <li>Membuat rencana pelatihan: Di menu training, kamu bisa mengisi rencana belajar kamu ya! <a href="<?=base_url('Admin/training')?>">coba sekarang</a></li>
                </ol>
                </div> -->

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #83c5be;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-users"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= $totalClient ?></h5>
                                            <p class="card-text">client</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #f1faee;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-user-clock"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= $totalGuest ?></h5>
                                            <p class="card-text">guest</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #a8dadc;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-user-cog"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= $totalEmployee ?></h5>
                                            <p class="card-text">employee</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #e29578;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-cog"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= $totalProject ?></h5>
                                            <p class="card-text">service</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #d4a373;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-building"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= $totalCompany ?></h5>
                                            <p class="card-text">company</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card" style="background-color: #ccd5ae;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div><i class="fa fa-2x fa-scroll"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"><?= count($news) ?></h5>
                                            <p class="card-text">news</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    
                <div class="row mt-3">
                        <div class="col-lg-4 scale-up-bottom">
                            <div class="card shadow-none">
                                <div class="card-header d-flex justify-content-center">
                                    <p class="card-title">All Order</p>
                                </div>
                                <div class="card-body">
                                    <div class="progress-group">
                                        All
                                        <span class="float-right"><?=$orderAll?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 
                                            <?php
                                            if ($orderAll == 0) {
                                                echo 0;
                                            } else{
                                                echo $orderAll* 100;
                                                }
                                                ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        On Progress
                                        <span class="float-right"><b><?=$orderDo?></b>/<?=$orderAll?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 
                                            <?php
                                            if ($orderDo == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else{
                                                echo ($orderDo / $orderAll) * 100;
                                                }
                                                ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Done</span>
                                        <span class="float-right"><b><?=$orderDone?></b>/<?=$orderAll?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 
                                            <?php
                                            if ($orderDone == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else{
                                                echo $orderDone / $orderAll *100;
                                                }
                                                ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        Cancel
                                        <span class="float-right"><b><?=$orderCancel?></b>/<?=$orderAll?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary" style="width: 
                                            <?php
                                            if ($orderCancel == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else{
                                                echo $orderCancel / $orderAll *100;
                                                }
                                                ?>%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 scale-up-bottom">
                            <div class="card h-100 shadow-none">
                                <div class="card-header">
                                    <div class="card-title">
                                        Daily Report Today
                                    </div>
                                    <div class="text-right"><?= date('l, j F Y') ?></div>
                                </div>
                                <div class="card-body table-responsive">
                                    <div class="d-flex justify-content-end">
                                    <a href="<?= base_url('Admin/dailyReport');?>" class="btn btn-sm btn-success" target="blank"><i class="fa fa-paper-plane mr-1"></i> view detail</a>
                                    </div>
                                    <?php
                                    if ($reportToday) {
                                        ?>
                                        <table id="tableReport" class="table table-light table-striped table-hover">
                                            <thead>
                                                <th>
                                                    <tr>
                                                        <td>No.</td>
                                                        <td>Employee</td>
                                                        <td>Time</td>
                                                    </tr>
                                                </th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $names = [];
                                                foreach ($reportToday as $key) {
                                                    if (in_array($key['employee_id'],$names)) {
                                                        continue;
                                                    } else{
                                                        ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?=$key['employee_name']?></td>
                                                            <td><?= date('h:i a', strtotime($key['create_date']))?></td>
                                                        </tr>
                                                        <?php
                                                        array_push($names,$key['employee_id']);
                                                    }
                                                    $no++;
                                                }
                                            ?>
                                                
                                            </thead>
                                        </table>
                                        <?php
                                    } else{
                                        echo '<p class="text-center text-sm text-muted">report not yet</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center">working hours based on daily report</p>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column  justify-content-end">
                            <p>5 highest working hours employees this month <br><small> <?= date('F Y') ?></small></p>
                            <div id="chartdiv"></div>
                        </div>
                        <div class="col-lg-6">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <table id="example1" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Working Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($timeDailyReportAll as $key) {
                                        if ($key['value'] == 0) {
                                            continue;
                                        }?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $key['name'] ?></td>
                                        <td><?= $key['value'] ?> h</td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                    <div class="card" id="special_task">
                        <div class="card-header">
                            Special duties for employees this month
                        </div>
                        <div class="card-body table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="tableSpecialTask" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>No</th>
                                            <th>Employee</th>
                                            <th>Files</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($dataTask as $key) {
                                            ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $key['employee_name'] ?></td>
                                            <td> <?php
                                            if ($key['file'] == "not yet") {
                                                echo 'file not yet';
                                            } else{
                                                echo '<a href="'.base_url().'assets/upload/task/'.$key['file'].'" class="btn btn-sm btn-success"><i class="fa fa-file-download mr-2"></i> download</a>';
                                            }
                                            ?>
                                            </td>
                                            <td>
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modelId<?=$key['id']?>">
                                              <i class="fa fa-eye mr-2"></i> Launch
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="modelId<?=$key['id']?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <?= $key['description'] ?> <br>
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php 
                                            if (date("Y-m-d", strtotime( $key['create_date'])) == date('Y-m-d')) {
                                                echo '<small class="text-success">today</small>';
                                            } else{
                                                echo '<small>'.date("F j, Y h:m a", strtotime( $key['create_date'])).'</small>';    
                                            }
                                        ?></td>
                                        </tr>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!-- <div class="card"  style="background: url(<?php echo base_url(); ?>assets/image/background/bgDashboardE.jpg); background-position:center center; background-size:cover; box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <h2 class=" display-4 text-bold text-white">BATS <br> INTEGRATION <br> SYSTEM</h2>
                                    <h5 class="text-white text-justify">&nbsp;&nbsp;&nbsp;&nbsp;This application was developed to make it easier for us to see the workflow and be able to see the progress of the project. In addition, it is hoped that us can easily get information related to taxes that is updated by the BATS Consulting company.</h5>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <h4 class="mb-3 mt-5">Seminar Information</h4>
                    
                    <div class="row mb-5">
                        <?php
                                $no = 1;
                                foreach ($news as $row) {
                                    ?>
                        <div class="col-md-6 col-lg-4  mt-2 scale-up-bottom">
                            <a href="<?= base_url('Admin/detailInformation/'.$row['id'])?>" class="card mb-2 text-dark h-100">
                                <img class="card-img-top rounded" src="<?php echo base_url(); ?>assets/upload/images/news/<?=$row['image']?>" alt="Dist Photo 3" style="height: 150px;object-fit: cover; overflow: hidden; ">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$row['title']?></h5>
                                </div>
                                <div class="card-footer">
                                    <small><?= date("F j, Y h:m a", strtotime( $row['create_date']))?></small>
                                </div>
                            </a>
                        </div>
                        <?php
                            $no++;
                        }
                        ?>
                    </div>
                    
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
        
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false,
                pageLength : 5
            });
            $("#tableReport").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false,
                pageLength : 5
            });
        });
    </script>
</body>

</html>