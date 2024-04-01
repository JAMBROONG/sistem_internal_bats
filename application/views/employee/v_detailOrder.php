<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Order</title>
    <script src="<?php echo base_url(); ?>assets/md5/js/md5.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';

  ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                wheelX: "panX",
                wheelY: "zoomX",
                layout: root.verticalLayout
            }));


            // Add legend
            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            }))


            // Data
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


            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
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


            // Add series
            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
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


            // Add legend
            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
            var legend = chart.children.push(am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            }));

            legend.data.setAll(chart.series.values);


            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                behavior: "zoomY"
            }));
            cursor.lineY.set("forceHidden", true);
            cursor.lineX.set("forceHidden", true);


            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>


    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <?php include 'component/v_navbar.php'; ?>
         <div class="content-wrapper bg-white" >
            <section class="content pt-3">
                <div class="container-fluid"> <?php
                            if ($validate == false) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not found</p>
                        <hr class="my-4">
                        <a href="<?php echo base_url('Employee/order'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                    </div> <?php
                                return false;
                            }
                        ?>
                    <div class="jumbotron bg-light pt-2 pb-2 text-center">
                        <h1 class="display-5 text-danger"><?= $dataOrder['service_name']?></h1>
                        <p class="lead">order date <?= date("F j, Y.", strtotime($dataOrder['create_date']));?></p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div id="chartdiv"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow-none">
                                <div class="card-body p-0 table-responsive">
                                    <table class="table table-hover">
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
                                                <td class="text-warning text-center">
                                                    <?php if ($percentoutput == 0 && $percentall == 0) {
                                                    echo 0;
                                                } else{
                                                    echo round(($percentoutput / $percentall) * 100 ,0);
                                                }?>%</td>
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
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title">Update Your Progress</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Employee</th>
                                                <th>Activities</th>
                                                <th>Status</th>
                                                <th>Estimasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                                $no = 1;
                                                foreach ($dataProcessDo as $row) {
                                                    ?> <tr>
                                                <td><?=$no;?></td>
                                                <td>
                                                    <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <?=$row['employee_name'];?>
                                                </td>
                                                <td>
                                                    <strong><?= $row['step']?></strong><br> <?= $row['subStep']?>
                                                </td>
                                                <td> <?php
                                                        if ($row['status']=='done') {
                                                            echo 'done <i class="fas fa-check-square text-success"></i>';
                                                        }
                                                        else{
                                                            echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                                        }
                                                    ?> </td>
                                                <td> <?php
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
                                                     ?>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('Employee/updateStatusProcess/'.$row['id']).'/'.$dataOrder['id'];?>" class=" btn btn-sm btn-outline-success"><i class="fa fa-check mr-2"></i> mark done</a>
                                                </td>
                                            </tr> <?php
                                                    $no++;
                                                }
                                                ?> </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title">Update Your Progress</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Employee</th>
                                                <th>Activities</th>
                                                <th>Status</th>
                                                <th>Completion Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                                $no = 1;
                                                foreach ($dataProcessDone as $row) {
                                                    ?> <tr>
                                                <td><?=$no;?></td>
                                                <td>
                                                    <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <?=$row['employee_name'];?>
                                                </td>
                                                <td>
                                                    <strong><?= $row['step']?></strong><br> <?= $row['subStep']?>
                                                </td>
                                                <td>
                                                    done <i class="fas fa-check-square text-success"></i>
                                                </td>
                                                <td> <?= date("F j, Y", strtotime($row['update_date']))?></td>
                                                <td class=" d-flex">
                                                    <?php
                                                    if ($dataOrder['statusOrder_id'] == 1) {
                                                        ?>

                                                    <a href="<?= base_url('Employee/orderReport/'.$dataOrder['id'])?>" class=" btn btn-sm btn-outline-success mr-2"><i class="fas fa-upload mr-2"></i> report</a>
                                                    <a type="button" data-toggle="modal" data-target="#modal-updateOrder<?=$no?>" class=" btn btn-sm btn-outline-danger"><i class="fas fa-ban mr-2"></i> cancle</a>
                                                    <?php
                                                    }
                                                    else{
                                                        ?>

                                                    <button href="<?= base_url('Employee/orderReport/'.$dataOrder['id'])?>" class=" btn btn-sm btn-secondary mr-2" disabled><i class="fas fa-upload mr-2"></i> report</button>
                                                    <button type="button" data-toggle="modal" data-target="#modal-updateOrder<?=$no?>" class=" btn btn-sm btn-secondary" disabled><i class="fas fa-ban mr-2"></i> cancle</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <!-- modal for update order -->
                                            <div class="modal fade" id="modal-updateOrder<?=$no?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Are you sure to update this process?</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-danger">This process report data will also be deleted</p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <a href="<?= base_url('Employee/updateStatusProcess/'.$row['id']).'/'.$dataOrder['id'];?>" class="btn btn-primary">Yes delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal -->
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
                    <div class="card card-dark">
                        <div class="card-header bg-info border-0">
                            <h3 class="card-title">Schedule Meeting</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
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
                                        <td><?=$row['date']?></td>
                                        <td><?=$row['message']?></td>
                                        <td><?=$row['status']?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detailMeeting<?=$row['id']?>"><i class="fa fa-eye"> detail</i></button>
                                        </td>
                                    </tr>

                                    <div class="modal fade " id="modal-detailMeeting<?=$row['id']?>">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Detail Meeting</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="card shadow-none">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Meeting room</h5>
                                                            <p class="card-text  text-muted"><?=$row['via']?></p>
                                                            <h5 class="card-title">Link/Address</h5>
                                                            <p class="card-text  text-muted"><?=$row['link']?></p>
                                                            <h5 class="card-title">Date</h5>
                                                            <p class="card-text  text-muted"><?= date("F j, Y (H:i a)", strtotime($row['date']))?>
                                                                <?php
                                                            $todayDateObj = new \DateTime(date('Y-m-d'));
                                                            $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['date'])));
                                                            $interval = $todayDateObj->diff($foundedDateObj);
                                                            $interval = $interval->format('%r%a') . "\n\n";
                                                            echo date("F j, Y", strtotime($row['date']));
                                                            if ($interval > 0 ) {
                                                                ?>
                                                                <small class="text-success">(<?=$interval?>more days)</small>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <small class="text-danger">(<?=$interval?>days ago)</small>
                                                                <?php
                                                            }
                                                            ?>
                                                            </p>
                                                            <h5 class="card-title">Status Meeting</h5>
                                                            <?php
                                                                    if ($row['status'] == 'do') {
                                                                        ?> <small class="text-warning ml-3"><strong>do</strong>
                                                                <i class="fas fa-times-circle"></i>
                                                            </small>
                                                            <br>
                                                            <?php
                                                                    } else
                                                                    {
                                                                        ?> <small class="text-success ml-3"><strong>done</strong>
                                                                <i class="fa fa-check-circle"></i>
                                                            </small>
                                                            <br>
                                                            <?php
                                                                    }
                                                                    ?>
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

                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title">User Information</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header text-white bg-info">
                                        <h3 class="widget-user-username"><?= $dataOrder['name']?></h3>
                                        <h5 class="widget-user-desc"><?= $dataOrder['client_position']?></h5>
                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle elevation-2 bg-danger" src="<?php echo base_url(); ?>assets/upload/images/<?=$dataOrder['company_image']?>" alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h6><?= $dataOrder['client_phone']?></h6>
                                                    <span class="description-text">WhatsApp</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="description-block">
                                                    <h6><?= $dataOrder['email']?></h6>
                                                    <span class="description-text">Email</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Address:</h5>
                                        <p class="card-text"><?= $dataOrder['client_address']?></p>
                                        <hr>
                                        <h5 class="card-title">Message:</h5>
                                        <p class="card-text"><?= $dataOrder['message']?></p>
                                        <hr>
                                        <a href="<?= base_url('Admin/dataOrder') ?>" class="btn btn-default text-danger">
                                            <i class="fa fa-arrow-left mr-1 pr-1 "></i>Back
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-6 row">
                                <div class="col-md-12 text-center">
                                    <h5>Data Director</h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body ">
                                            <h6 class="mt-2 mb-0">Name</h6>
                                            <input type="text" class=" form-control" value="<?= $person['name'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">Phone</h6>
                                            <input type="text" class=" form-control" value="<?= $person['phone'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">Email</h6>
                                            <input type="text" class=" form-control" value="<?= $person['email'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">NIK</h6>
                                            <input type="text" class=" form-control" value="<?= $person['NIK'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">NPWP</h6>
                                            <input type="text" class=" form-control" value="<?= $person['NPWP'] ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body ">
                                            <h6 class="mt-2 mb-0">Position</h6>
                                            <input type="text" class=" form-control" value="<?= $person['position'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">Nationality</h6>
                                            <input type="text" class=" form-control" value="<?= $person['nationality'] ?>" disabled>
                                            <h6 class="mt-2 mb-0">Address</h6>
                                            <textarea name="" id="" cols="30" rows="5" class=" form-control" disabled><?= $person['address'] ?></textarea>
                                            <h6 class="mt-2 mb-0">Financial statements</h6>
                                            <input type="text" class=" form-control" value="<?= $dataOrder['financial_statements'] ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    if (empty($pic)) {
                                        ?>
                            <div class="col-md-12 text-center">
                                <h5>Data PIC</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="card shadow-none">
                                    <div class="card-body text-center">
                                        <h6>PIC data doesn't exist yet</h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                                    } else{
                                        $no = 1;
                                        foreach ($pic as $row) {
                                        ?>
                            <div class="col-md-6">
                                <div class="col-md-12 text-center">
                                    <h5>Data PIC <?=$no?></h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Name</h6>
                                                <input type="text" class=" form-control" value="<?= $row['pic_name'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Phone</h6>
                                                <input type="text" class=" form-control" value="<?= $row['phone'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Email</h6>
                                                <input type="text" class=" form-control" value="<?= $row['email'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NIK</h6>
                                                <input type="text" class=" form-control" value="<?= $row['NIK'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">NPWP</h6>
                                                <input type="text" class=" form-control" value="<?= $row['NPWP'] ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card shadow-none">
                                            <div class="card-body ">
                                                <h6 class="mt-2 mb-0">Position</h6>
                                                <input type="text" class=" form-control" value="<?= $row['position'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Nationality</h6>
                                                <input type="text" class=" form-control" value="<?= $row['nationality'] ?>" disabled>
                                                <h6 class="mt-2 mb-0">Address</h6>
                                                <textarea name="" id="" cols="30" rows="7" class=" form-control" disabled><?= $row['address'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                        $no++;
                                        }
                                    }
                                    ?>
                            <div class="col-md-12">
                                <h4 class="text-center p-3 bg-cyan rounded">Company Information</h4>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card shadow-none">
                                            <img src="<?php echo base_url(); ?>assets/upload/images/<?=$dataUser['image']?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card shadow-none">
                                            <div class="card-body">
                                                <h5 class="card-title">Name:</h5>
                                                <p class="card-text"><?= $dataUser['company']?></p>
                                                <hr>
                                                <h5 class="card-title">NPWP:</h5>
                                                <p class="card-text"><?= $dataUser['NPWP']?></p>
                                                <hr>
                                                <h5 class="card-title">Email:</h5>
                                                <p class="card-text"><?= $dataUser['email']?></p>
                                                <hr>
                                                <h5 class="card-title">Phone:</h5>
                                                <p class="card-text"><?= $dataUser['company_phone']?></p>
                                                <hr>
                                                <h5 class="card-title">Address:</h5>
                                                <p class="card-text"><?= $dataUser['addressOfDomicile']?></p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title">BATS Consulting Team</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                                    <div class="row">
                                        <div class="card col-md-4 shadow-none">
                                            <img class="" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['manager_image']?>" alt="User profile picture">
                                            <div class="card-body box-profile  rounded">
                                                <h3 class="profile-username text-center"><?= $dataOrder['manager_name']?></h3>
                                                <p class="text-muted text-center">Manager</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 shadow-none">
                                            <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['partner_image']?>" alt="">
                                            <div class="card-body box-profile  rounded">

                                                <h3 class="profile-username text-center"><?= $dataOrder['partner_name']?></h3>
                                                <p class="text-muted text-center">Partner</p>
                                            </div>
                                        </div>
                                        <div class="card col-md-4 shadow-none"> <img class="" src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$dataOrder['supervisor_image']?>" alt="User profile picture">

                                            <div class="card-body box-profile  rounded">

                                                <h3 class="profile-username text-center"><?= $dataOrder['supervisor_name']?></h3>
                                                <p class="text-muted text-center">Supervisor</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <?php
                                foreach ($dataStaff as $row) {
                                    if ($dataOrder['supervisor_id'] == $row['id_employee']) {
                                        continue;
                                    }
                                ?> <div class="col-md-3 rounded card shadow-none">
                                    <img   src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" alt="User profile picture">
                                            <div class="card-body box-profile">
                                                <h3 class="profile-username text-center"><?=$row['employee_name']?></h3>
                                                <p class="text-muted text-center">Staff</p>
                                            </div>
                                        </div> <?php
                                }
                                ?> </div>
                        </div>
                    </div><?php
                            if (empty($step)) {
                                ?> <div class="jumbotron bg-white">
                        <h1 class="display-4 text-center">Sorry <i class="fa fa-sad-cry text-danger"></i></h1>
                        <p class="lead text-center">data not yet</p>
                        <a href="<?php echo base_url('Admin/dataOrder'); ?>"> <i class="fa fa-arrow-left mr-1"></i> back</a>
                        <hr class="my-4">
                    </div><?php
                                
                            } else{
                            ?>

                    <div class="card ">
                        <div class="card-header text-white bg-info">
                            <h5 class="card-title text-white">Flow <?= $dataOrder['service_name']?></h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus text-white"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Assigned</div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="table_Assigned" class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Step</th>
                                                <th>Activities</th>
                                                <th>Status</th>
                                                <th>Estimasi</th>
                                                <th>Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php
                                                $no = 1;
                                                $step = "";
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
                                                <td>
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
                                                <td>
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
                                                     $todayDateObj = new \DateTime(date('Y-m-d'));
                                                     $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['estimasi'])));
                                                     $interval = $todayDateObj->diff($foundedDateObj);
                                                     $interval = $interval->format('%r%a') . "\n\n";
                                                     if ($row['status'] == "done") {
                                                        echo '<p class="text-success">Finished on </p>'.date("F j, Y", strtotime($row['update_date']));
                                                     } else{
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
                                                    <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <?=$row['employee_name'];?>
                                                </td>
                                            </tr> <?php
                                                }
                                                ?> </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">All Flow</div>
                                </div>
                                <div class="card-body table-responsive">
                                    <table id="table_AllFlow" class="table table-head-fixed text-wrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Control Item</th>
                                                <th>Activities</th>
                                                <th>Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                
                                                $no2 = 1;
                                                $step = "";
                                                foreach ($substep as $row) {
                                                    if ($row['step'] == $step) {
                                                    ?>
                                            <tr>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td class="border-0"></td>
                                                <td><?= $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                            <?php
                                                        $no2++;
                                                        }
                                                        else{
                                                            $no2 = 1;
                                                            $step = $row['step'];
                                                        
                                                        ?>
                                            <td><?=$no;?></td>
                                            <td><?=$row['step'];?></td>
                                            <td><?=$row['description'];?></td>
                                            <td><?=  $no2.'. '.$row['subStep'];?></td>
                                            </tr>
                                            <?php
                                                    $no++; 
                                                    $no2++;    
                                                    }
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                            ?>
                    </div>
                </div>
            </section>
        </div>
        
        <?php 
include 'footer.php';
?>
<script>
        $(function() {
            $("#table_Assigned").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": true
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
</script><script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>

</html>