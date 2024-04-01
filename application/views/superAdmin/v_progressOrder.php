<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Progress Order</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php include 'header.php' ?>
    
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

        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body class="hold-transition bg-info sidebar-mini lyt layout-fixed">
    <div class="wrapper bg-white">
        <?php include'template/v_navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Progress</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
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
                    <div class="card card-info   shadow-none border-0 card-tabs">
                        <div class="card-header p-2 pt-1 ">
                            <ul class="nav nav-tabs border-0 row" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item col">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true"><i class="ion ion-clipboard"></i>  Input</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false"><i class="fa fa-cog"></i> Process</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link " id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false"><i class="fa fa-angle-right"></i> Output</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body pl-0 pr-0">
                            <?php include'progresOrder/input.php' ?>
                            <?php include'progresOrder/progress.php' ?>
                            <?php include'progresOrder/output.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
    <?php include 'footer.php' ?>
        <!-- modal for delete report -->
        

        <div class="modal fade " id="modal-noDownload">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <p>The data has been downloaded</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modal-turnFinish">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Are you sure to turn Finish?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark">With this the selected order status will be <strong class="text-success">completed</strong></p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('SuperAdmin/turnFinishOrder/'.$dataOrder['id']) ?>" class="btn btn-success">Yes Finish</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->
        <!-- modal for delete report -->
       

        <div class="modal fade text-dark" id="modal-addMeeting">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Schedule Meeting</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('SuperAdmin/createMeeting') ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="my-input">Date</label>
                                                <input type="hidden" name="id_order" value="<?= $dataOrder['id']?>" required>
                                                <div class="d-flex">
                                                    <input id="my-input" class="form-control" type="date" name="date" required>
                                                    <input id="my-input" class="form-control" type="time" name="time" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="my-input">Room</label>
                                                <input type="text" name="via" class="form-control" id="" placeholder="platform.." required>
                                            </div>
                                            <div class="form-group">
                                                <label for="my-input">Link/Address</label>
                                                <textarea name="link" id="" cols="30" rows="5" placeholder="jl.. / https:.." class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow-none">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="my-input">Message</label>
                                                <textarea name="message" id="" cols="30" rows="10" placeholder="message.." class="form-control" required></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i> save</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <!-- MODAL -->
    <div class="modal fade " id="modal-AllReport">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Contains all employee report data</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="modal-finalReport">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-warning">explanation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">This is the final report, it has been approved by all parties.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });

        $(document).ready(function() {
            $('.checkall').click(function() {
                $('.list ').attr('checked', true);

            });
        });
        $(function() {
            $("#table_meeting").DataTable({
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

        $(document).on("click", "#pilih_gambar", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            var reader = new FileReader();
            reader.onload = function(e) {
                // document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
        $(function() {
            $("#table_AllReport").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#table_data").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "ordering": true,
                "info": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function() {
            $("#table_rbs").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
        $(function() {
            $("#table_fr").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>