<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Track</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <?php include'header.php'; ?>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script>
        am5.ready(function() {
            var root = am5.Root.new("chartdiv");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            }));
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            }));
            var data = [{
                step: "Input",
                achievement: <?= $percentinput ?> ,
                target: 20
            }, {
                step: "Progress",
                achievement: <?= $percentprocess ?> ,
                target: 60
            }, {
                step: "Output",
                achievement: <?= $percentoutput ?> ,
                target: 20
            }];
            var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
                categoryField: "step",
                renderer: am5xy.AxisRendererY.new(root, {
                    inversed: true,
                    cellStartLocation: 0.1,
                    cellEndLocation: 0.9
                })
            }));
            yAxis.data.setAll(data);
            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                renderer: am5xy.AxisRendererX.new(root, {}),
                min: 0
            }));
            function createSeries(field, name) {
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: name,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueXField: field,
                    categoryYField: "step",
                    sequencedInterpolation: true,
                    tooltip: am5.Tooltip.new(root, {
                        pointerOrientation: "horizontal",
                        labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
                    })
                }));
                series.columns.template.setAll({
                    height: am5.p100
                });
                series.bullets.push(function() {
                    return am5.Bullet.new(root, {
                        locationX: 1,
                        locationY: 0.5,
                        sprite: am5.Label.new(root, {
                            centerY: am5.p50,
                            text: "{valueX} %",
                            populateText: true
                        })
                    });
                });
                series.bullets.push(function() {
                    return am5.Bullet.new(root, {
                        locationX: 1,
                        locationY: 0.5,
                        sprite: am5.Label.new(root, {
                            centerX: am5.p100,
                            centerY: am5.p50,
                            text: "{name}",
                            fill: am5.color(0xffffff),
                            populateText: true
                        })
                    });
                });
                series.data.setAll(data);
                series.appear();
                return series;
            }
            createSeries("achievement", "Achievement");
            createSeries("target", "Target");
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            }));
            legend.data.setAll(chart.series.values);
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                behavior: "zoomY"
            }));
            cursor.lineY.set("forceHidden", true);
            cursor.lineX.set("forceHidden", true);
            chart.appear(1000, 100);
        });
    </script>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini bg-dark">
    <div class="wrapper">
        <?php include 'navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/jobTrack_home')?>">Job Track</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card shadow-none">
                            <?php 
                            if (empty($selectedService)) {
                            echo '
                            <div class="card-header pt-3"style="background-color: #2F2F2F;">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 style="color: #2F2F2F;">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam "></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            } else{
                            ?>
                            <div class="card-body p-0">
                                <div id="chartdiv"></div>
                                <div class="card shadow-none mt-5">
                                    <div class="card-body p-0 table-responsive">
                                        <table class="table table-hover  table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="bg-danger text-center">Step</th>
                                                    <th class="bg-warning text-center">Percentage</th>
                                                    <th class="bg-orange text-center">Achievement</th>
                                                    <th class="bg-success text-center">Target</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-danger text-center" scope="row">Input</td>
                                                    <td class="text-warning text-center"><?= $percentInputNow?>%</td>
                                                    <td class="text-orange text-center"><?= $percentinput ?>%</td>
                                                    <td class="text-success text-center">20%</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-danger text-center" scope="row">Progress</td>
                                                    <td class="text-warning text-center"><?= $percentProgressNow ?>%</td>
                                                    <td class="text-orange text-center"><?= $percentprocess ?>%</td>
                                                    <td class="text-success text-center">60%</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-danger text-center" scope="row">Output</td>
                                                    <td class="text-warning text-center"><?php
                                                    if ($percentoutput == "" || $percentoutput == 0) {
                                                        echo 0;
                                                    } else{
                                                        
                                                        echo round(($percentoutput / $percentall) * 100 ,0);
                                                    }
                                                    ?>%</td>
                                                    <td class="text-orange text-center"><?= $percentoutput ?>%</td>
                                                    <td class="text-success text-center">20%</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td class="text-danger text-bold text-center" colspan="2" scope="row">Total</td>
                                                    <th class="text-orange text-center"><?= round($percentall,0)?>%</th>
                                                    <th class="text-success text-center">100%</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                        <div class="card shadow">
                            <div class="card-header text-white pt-3" style="background-color: #1A1A1A;">
                                <div class="d-flex justify-content-between">
                                    <h6>Your service is <strong><?= $selectedService['service_name']; ?></strong> </h6>
                                    <h6>Percentage <strong><?= round($percentall,1); ?>%</strong></h6>
                                </div>
                            </div>
                            <div class="card-header  p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item col-md-4"><a class="nav-link active d-flex justify-content-between" href="#input" data-toggle="tab">Input <strong><?= $percentinput; ?>%</strong></a></li>
                                    <li class="nav-item col-md-4"><a class="nav-link d-flex justify-content-between" href="#prosess" data-toggle="tab">Process <strong><?= $percentprocess; ?>%</strong></a></li>
                                    <li class="nav-item col-md-4"><a class="nav-link d-flex justify-content-between" href="#output" data-toggle="tab">Output <strong><?= $percentoutput; ?>%</strong></a></li>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="input">
                                        <p>Complete the following data, then send it via <a href="mailto:data.batsinternationalgroup@gmail.com">data.batsinternationalgroup@gmail.com</a></p>
                                        <div class="card shadow-none">
                                            <div class="card-body p-0">
                                            <table id="table_data" class="table table-striped table-inverse ">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                            foreach ($letter as $row) {
                                                            if ($row['status']=="done") {
                                                                ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="">
                                                                        <div class="icheck-success d-inline ml-2">
                                                                            <input disabled type="checkbox" value="<?= $row['id'] ?>" name="status[]" id="todoCheck<?=$no;?>" checked="">
                                                                            <label for="todoCheck<?=$no;?>"></label>
                                                                        </div>
                                                                        <span class="text text-success"><?= $row['data'] ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><small><?= date("F j, Y", strtotime($row['update_date']))?></</small></td>
                                                        </tr>
                                                        <?php
                                                            $no++;
                                                            }
                                                        }
                                                        foreach ($letter as $row) {
                                                            
                                                            if ($row['status'] == "not yet") {
                                                                ?>

                                                        <tr>
                                                            <td class="text-center"><?= $no ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="">
                                                                        <div class="icheck-primary d-inline ml-2">
                                                                            <input disabled type="checkbox" value="<?= $row['id'] ?>" name="status[]" id="todoCheck<?=$no;?>">
                                                                            <label for="todoCheck<?=$no;?>"></label>
                                                                        </div>
                                                                        <span class="text text-orange"><?= $row['data'] ?></span>
                                                                    </div>
                                                                </div>
                                                            <td><small><?= date("F j, Y", strtotime($row['update_date']))?></</small></td>
                                                        </tr>
                                                        <?php
                                                            $no++;
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="prosess">
                                        <div class="card shadow-none">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Progress your service: <?= $totalDone.' of '.$total ?> processes</h3>
                                            </div>
                                            <div class="card-body table-responsive p-0">
                                    <table id="table_process" class="table table-striped p-1 text-sm">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Step</th>
                                                <th>Description</th>
                                                <th>Activities</th>
                                                <th>Status</th>
                                                <th>Estimasi</th>
                                                <th>Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                                $no = 1;
                                                $step = "";
                                                $desc = "";
                                                foreach ($dataProcess as $row) {
                                                    ?> <tr>
                                                        
                                                <td class="text-center">
                                                    <?php
                                                    if($row['step'] == $step){
                                                        ?>
                                                        <p class="d-none"><?=$no?></p>
                                                        <?php
                                                    } else{
                                                        echo $no;
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-justify">
                                                    <?php
                                                    if($row['step'] == $step){
                                                        echo " ";
                                                    } else{
                                                        echo $row['step'];
                                                        $step = $row['step'];
                                                        $no++;
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-justify">
                                                    <?php
                                                    if($row['descriptionStep'] == $desc){
                                                        echo "";
                                                    } else{
                                                        echo $row['descriptionStep'];
                                                        $desc = $row['descriptionStep'];
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-justify">
                                                    <?= $row['subStep']?>
                                                </td>
                                                <td> <?php
                                                        if ($row['status']=='done') {
                                                            echo 'done <i class="fas fa-check-square text-success"></i>';
                                                        }
                                                        else{
                                                            echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                                        }
                                                    ?> </td>
                                                <td>
                                                <?php
                                                    if ($row['status'] == 'done') {
                                                        echo'<p class="text-success">Finished on '.date("F j, Y", strtotime($row['update_date'])).'</p>';
                                                    }
                                                    else{
                                                        $todayDateObj = new \DateTime(date('Y-m-d'));
                                                        $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['estimasi'])));
                                                        $interval = $todayDateObj->diff($foundedDateObj);
                                                        $interval = $interval->format('%r%a') . "\n\n";
                                                        echo date("F j, Y", strtotime($row['estimasi']));
                                                        if ($interval > 0 ) {
                                                            ?>
                                                            <p class="text-success">(<?=$interval?>more days)</p>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <p class="text-danger">(<?=$interval?>days ago)</p>
                                                            <?php
                                                        }
                                                    }
                                                     ?>
                                                </td>
                                                <td>
                                                    <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <br> <?=$row['employee_name'];?>
                                                </td>
                                            </tr> <?php
                                                }
                                                ?> </tbody>
                                    </table>
                                </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="output">
                                        <?php
                                            if ($selectedService['statusOrder_id'] == 2) {
                                                ?>
                                        <div class="jumbotron bg-success">
                                            <h1 class="display-4">Congratulations,</h1>
                                            <p class="lead">your service has been completed.</p>
                                            <hr class="my-4">
                                            <p>Send your feedback</p>
                                            <a href="<?=base_url('Client/feedback/'.$idOrder)?>" class="btn btn-sm btn-warning"><i class="fa fa-envelope mr-2"></i> send</a>
                                        </div>
                                        <?php
                                            }
                                        ?> 
                                        <div class="card card-dark">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Final Report <button class="btn btn-sm bg-transparent text-warning p-1 ml-2"  data-toggle="modal" data-target="#modal-warning2"><i class="fa fa-question"></i></button> </h3>
                                            </div>
                                            <div class="card-body table-responsive">
                                                <table id="table_reportDone" class="table table-striped table-valign-middle">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Activities</th>
                                                            <th>Message</th>
                                                            <th>Date</th>
                                                            <th>Review by Partner</th>
                                                            <th>Review by Supervisor</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_ceo'] != "do") {
                                            ?> <tr>
                                                            <td><?=$no?></td>
                                                            <td><?=$row['subStep']?></td>
                                                            <td><?=$row['message']?></td>
                                                            <td><?= date("l, j F Y H:i a", strtotime($row['update_date']));?></td><td>
                                                                <?php
                                                                if ($row['review_ceo'] == 'do') {
                                                                    echo'<p class="text-warning">do <i class="fa fa-cog ml-1"></i></p>';
                                                                } else{
                                                                    echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row['review_supervisor'] == 'do') {
                                                                    echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                                } else{
                                                                    echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="d-flex justify-content-beetween">
                                                                <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">Download</small></i></a>
                                                                <a href="<?=base_url('Client/detailReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2"><i class="fa fa-eye"><small class="ml-2">Detail</small></i></a>
                                                                <?php
                                                                if ($row['review_status']== "done") { ?>
                                                                <a href="<?=base_url('Client/approveReport/'.$row['id'])?>" class="btn btn-sm btn-success ml-2 disabled"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                <?php
                                                                } else{ ?>
                                                                
                                                                <a type="button"   data-toggle="modal" data-target="#modal-done<?=$row['id']?>" class="btn btn-sm btn-outline-success ml-2"><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade " id="modal-done<?=$row['id']?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Explanation</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p class="text-danger">Make sure you have reviewed the final report, if you are approved it cannot be changed and this report is fixed.</p>
                                                                        <a href="<?=base_url('Client/approveReport/'.$row['review_id'].'/'.$idOrder)?>" class="btn btn-sm btn-outline-success "><i class="fa fa-check"><small class="ml-2">Approve</small></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php

                                            $no++;
                                                }
                                            }
                                            ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card card-dark">
                                            <div class="card-header border-0">
                                                <h3 class="card-title">Schedule Meeting</h3>
                                            </div>
                                            <div class="card-body table-responsive">
                                                <table id="table_meeting" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Room</th>
                                                            <th>Link</th>
                                                            <th>Date</th>
                                                            <th>Message</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                              $no = 1;
                                              foreach ($dataMeeting as $row) {
                                              ?>
                                                        <tr>
                                                            <td><?=$no?></td>
                                                            <td><?=$row['via']?></td>
                                                            <td><?=$row['link']?></td>
                                                            <td><?= date("l, j F Y H:i a", strtotime($row['date']));?></td>
                                                            <td><?=$row['message']?></td>
                                                            <td><?=$row['status']?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-editMeeting<?=$row['id']?>"><i class="fa fa-eye"></i></button>
                                                            </td>
                                                        </tr>
                                                        <div class="modal fade " id="modal-editMeeting<?=$row['id']?>">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Are you sure to Update?</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="card shadow-none">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">Meeting room</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['via']?></p>
                                                                                        <h5 class="card-title">Link/Address</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['link']?></p>
                                                                                        <h5 class="card-title">Date</h5>
                                                                                        <p class="card-text  text-muted"><?=$row['date']?></p>
                                                                                        <hr>
                                                                                        <h5 class="card-title">Status Meeting</h5>
                                                                                        <?php
                                                                        if ($row['status'] == 'do') {
                                                                            ?> <small class="text-warning ml-3"><strong>do</strong>
                                                                                            <i class="fas fa-times-circle"></i>
                                                                                        </small>
                                                                                        <?php
                                                                        } else
                                                                        {
                                                                            ?> <small class="text-success ml-3"><strong>done</strong>
                                                                                            <i class="fa fa-check-circle"></i>
                                                                                        </small>
                                                                                        <?php
                                                                        }
                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="card shadow-none">
                                                                                    <div class="card-body"> <?php
                                                        if ($row['fixed'] == 'yes') {
                                                            ?> <form action="<?=base_url('Client/updateMeeting')?>" method="post">
                                                                                            <div class="form-group">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder3['id'] ?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?=$dataOrder3['service_id']?>">
                                                                                                <label for="my-input">Meeting room</label>
                                                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>" disabled>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Link/address</label>
                                                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control" disabled><?=$row['link']?></textarea>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Date</label>
                                                                                                <div class="d-flex">
                                                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>" disabled>
                                                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i", strtotime($row['date'])); ?>" disabled>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p class="text-danger">the final meeting has been agreed</p>
                                                                                        </form> <?php
                                                        } else
                                                        {
                                                            ?>
                                                                                        <form action="<?=base_url('Client/updateMeeting')?>" method="post">
                                                                                            <div class="form-group">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?=$dataOrder3['id']?>">
                                                                                                <input id="my-input" class="form-control" type="hidden" name="service_id" value="<?=$dataOrder3['service_id']?>">
                                                                                                <label for="my-input">meeting room</label>
                                                                                                <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Link/address</label>
                                                                                                <textarea name="link" id="" cols="30" rows="3" class=" form-control"><?=$row['link']?></textarea>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="my-input">Date</label>
                                                                                                <div class="d-flex">
                                                                                                    <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>">
                                                                                                    <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i", strtotime($row['date'])); ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-2"></i> save</button>
                                                                                        </form> <?php
                                                        }
                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                            </div>
                        </div> 
                        <?php
                        } ?> 
                </div>
            </section>
        </div>
        
    <?php include'footer.php'; ?>
    <div class="modal fade " id="modal-warning">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">This report is still in process, not the final report. To see the final report, see the final report table.</p>
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="modal-warning2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">This table contains the final report, if you are approved then this final report has been marked complete.</p>
                    <p>Thank you!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        // var element = document.getElementById("yourDiv");
        // element.scrollTop = element.scrollHeight;
        $(function() {
            $("#table_meeting").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_reportDo").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_reportDone").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_process").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $('.select2').select2()
        });
            $('#nav_jobtrack').addClass('nav_select');
    </script>
</body>

</html>