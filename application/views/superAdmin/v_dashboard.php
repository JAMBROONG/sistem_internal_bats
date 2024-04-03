<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }

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
            var root = am5.Root.new("chartdiv");
            root.setThemes([
                am5themes_Animated.new(root)
            ]);
            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                panX: false,
                panY: false,
                wheelX: "none",
                wheelY: "none"
            }));
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
            cursor.lineY.set("visible", false);
            var xRenderer = am5xy.AxisRendererX.new(root, {
                minGridDistance: 30
            });
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
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: "Series 1",
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                sequencedInterpolation: true,
                categoryXField: "name",
                tooltip: am5.Tooltip.new(root, {
                    dy: -25,
                    labelText: "{valueY} hour"
                })
            }));
            series.columns.template.adapters.add("fill", (fill, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });
            series.columns.template.adapters.add("stroke", (stroke, target) => {
                return chart.get("colors").getIndex(series.columns.indexOf(target));
            });
            var data = <?php echo json_encode($timeDailyReport); ?>;
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
            series.appear(1000);
            chart.appear(1000, 100);

        }); // end am5.ready()
    </script>

</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include 'template/v_navbar.php'; ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
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
                    <!-- <p class="text-bold text-md p-3 bg-dark">KJA PT BATS INTERNATIONAL GROUP</p> -->
                    <!-- <div class="table-responsive">
                        <table class="table table-striped table-bordered text-sm">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Client Name</th>
                                    <th>Type of Business</th>
                                    <th>Type of Services</th>
                                    <th>Type of Risk</th>
                                    <th>Iis</th>
                                    <th>Ivana</th>
                                    <th>Irma</th>
                                    <th>Reza</th>
                                    <th>Rifky</th>
                                    <th>Rama</th>
                                    <th>Jeremi</th>
                                    <th>Lamin</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PT. Kobayashi Pharmaceutical Indonesia </td>
                                    <td>Pharmaceutical Trading</td>
                                    <td>Tax Advisory</td>
                                    <td>Medium - High</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>PT. Kobayashi Pharmaceutical Indonesia </td>
                                    <td>Pharmaceutical Trading</td>
                                    <td>CITR 2021</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>PT. Kobayashi Pharmaceutical Indonesia </td>
                                    <td>Pharmaceutical Trading</td>
                                    <td>Tax Advisory</td>
                                    <td>Medium - High</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>PT. BMT Asia Indonesia</td>
                                    <td>Services</td>
                                    <td>Transfer Pricing Documentation</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>PT. BPRS Mulia Berkah Abadi</td>
                                    <td>Financial Institution</td>
                                    <td>Tax Health Check</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>PT. BPRS Mulia Berkah Abadi</td>
                                    <td>Financial Institution</td>
                                    <td>Tax Advisory</td>
                                    <td>Medium - High</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>PT. Kreasiera Kuliner Berkah (Nasi Kulit Gokskin)</td>
                                    <td>Food &amp; Beverage</td>
                                    <td>Monthly Tax Compliance Services</td>
                                    <td>Low</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td> PT. Sanko Shoji Indonesia </td>
                                    <td>Trading</td>
                                    <td> Amend of Corporate Income Tax Refund </td>
                                    <td>Medium - High</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>PT Honda Access Indonesia</td>
                                    <td>Trading</td>
                                    <td>Taxation Training</td>
                                    <td>Medium</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Yayasan Daar El-Qolam</td>
                                    <td>Education</td>
                                    <td>business services</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>PT. Procarre International Indonesia</td>
                                    <td>Healthcare Trading</td>
                                    <td>Review of Corporate Income Tax Return (CITR) 2021</td>
                                    <td>Low</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>PT. Procarre International Indonesia</td>
                                    <td>Healthcare Trading</td>
                                    <td> Monthly Tax Compliance </td>
                                    <td>Low</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>PT. Senjaya Solusi Sekurindo</td>
                                    <td>Trading</td>
                                    <td>CITR 2021</td>
                                    <td>Medium</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Universitas Islam Internasional Indonesia (UIII)</td>
                                    <td>Education</td>
                                    <td>CITR 2021</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>STIH IBLAM</td>
                                    <td>Education</td>
                                    <td>CITR 2021</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>STIH IBLAM</td>
                                    <td>Education</td>
                                    <td>Monthly Accounting </td>
                                    <td>Low</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>17</td>
                                    <td>PT. Mitra Husada Bersama</td>
                                    <td>Hospital</td>
                                    <td>Tax advisory Service - SP2DK 2017</td>
                                    <td>Medium - High</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td>PT. Mitra Husada Bersama</td>
                                    <td>Hospital</td>
                                    <td>CITR 2021</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td>PT Sanac Isogai Supply </td>
                                    <td>Trading</td>
                                    <td>TP DOC 2021</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td>PT. Aisyah Harum Melati</td>
                                    <td>Hospital</td>
                                    <td>monhly tax and accounting (compliance)</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>21</td>
                                    <td>PT. Selaras Raya Nada (SRN Entertainment)</td>
                                    <td>Entertainment</td>
                                    <td>Tax Advisory Services</td>
                                    <td>Medium</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>PT.Panca Ayu Eka Bagus</td>
                                    <td>Healthcare Services</td>
                                    <td>Monthly Accounting &amp; Tax</td>
                                    <td>Medium</td>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td></td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>JUMLAH</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>13</td>
                                    <td>5</td>
                                    <td>5</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>7</td>
                                    <td>78</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card text-left mt-5 mb-5 rounded-0 border-0">
                        <div class="card-header border-bottom-0" style="background-color: #f1faee;">
                            <b>110.1-A1</b> Lima prinsip dasar etika untuk Akuntan adalah:
                        </div>
                        <div class="card-body">
                            <dl class="ml-5 mr-5">
                                <dt>Integritas</dt>
                                <dd class="text-justify">Bersikap lugas dan jujur dalam semua hubungan profesional dan
                                    bisnis.</dd>
                                <dt>Objektivitas</dt>
                                <dd class="text-justify">Menerapkan perimbangan profesional atau bisnis tanpa
                                    dikompromikan oleh:</dd>
                                <dd class="text-justify">
                                    <ul>
                                        <li>Bias;</li>
                                        <li>Benturan kepentingan; atau</li>
                                        <li>Pengaruh atau ketergantungan yang tidak semestinya terhadap individu,
                                            organisasi, teknologi, dan faktor lain.</li>
                                    </ul>
                                </dd>
                                <dt>Kompetensi dan Kehati-hatian Profesional - untuk:</dt>
                                <dd class="text-justify">
                                    <ul>
                                        <li>Mencapai dan mempertahankan pengetahuan dan keahlian profesional pada level
                                            yang disyaratkan untuk memastikan bahwa klien atau organisasi tempatnya
                                            bekerja memperoleh jasa profesional yang kompeten, berdasarkan standar
                                            profesional dan standar teks terkini serta ketentuan peraturan
                                            perundang-undangan yang berlaku; dan</li>
                                        <li>Bertindak sungguh-sungguh dan sesuai dengan standar profesional dan standar
                                            teknis yang berlaku.</li>
                                    </ul>
                                </dd>
                                <dt>Kerahasiaan</dt>
                                <dd class="text-justify">Menjaga kerahasiaan informasi yang diperoleh dari hasil
                                    hubungan profesional dan bisnis.</dd>
                                <dt>Prilaku Profesional</dt>
                                <dd class="text-justify">untuk:</dd>
                                <dd class="text-justify">
                                    <ul>
                                        <li>Mematuhi peraturan perundang-undangan yang berlaku</li>
                                        <li>Berperilaku konsisten dengan tanggung jawab profesi untuk bertindak bagi
                                            kepentingan publik dalam semua aktivitas profesional dan hubungan bisnis;
                                            dan</li>
                                        <li>Menghindari perilaku apa pun yang diketahui atau seharusnya diketahui
                                            Akuntan yang dapat mendiskreditkan profesi.</li>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                        <div class="card-header border-bottom-0 mb-3" style="background-color: #f1faee;">
                            <b>P110.2</b> Akuntan harus mematuhi setiap perinsip dasar etika.
                        </div>
                        <div class="card-header border-bottom-0" style="background-color: #f1faee;">
                            <b>1102-A1</b> Akuntan harus mematuhi setiap perinsip dasar etika.
                        </div>
                        <div class="card-body">
                            <dl class="ml-5 mr-5">
                                <dd class="text-justify">Prinsip dasar etika menetapkan standar prilaku yang diharapkan
                                    dari seorang Akuntan. Kerangka kerja konseptual menetapkan pendekatan yang perlu
                                    diterapkan oleh seorang Akuntan, dalam mematuhi prinsip dasar etika tersebut.
                                    Subseksi 111-115 menetapkan persyaratan dan materi aplikasi yang terkait dengan
                                    masing-masing prinsip dasar etika.</dd>
                            </dl>
                        </div>
                    </div> -->
                    <div class="row mt-3">
                        <div class="col-lg-4 scale-up-bottom">
                            <div class="card shadow-none">
                                <div class="card-header d-flex justify-content-center">
                                    <p class="card-title">All Order</p>
                                </div>
                                <div class="card-body">
                                    <div class="progress-group">
                                        All
                                        <span class="float-right"><?= $orderAll ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success"
                                                style="width: 
                                            <?php
                                            if ($orderAll == 0) {
                                                echo 0;
                                            } else {
                                                echo $orderAll * 100;
                                            }
                                            ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        On Progress
                                        <span class="float-right"><b><?= $orderDo ?></b>/<?= $orderAll ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary"
                                                style="width: 
                                            <?php
                                            if ($orderDo == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else {
                                                echo ($orderDo / $orderAll) * 100;
                                            }
                                            ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        <span class="progress-text">Done</span>
                                        <span class="float-right"><b><?= $orderDone ?></b>/<?= $orderAll ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success"
                                                style="width: 
                                            <?php
                                            if ($orderDone == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else {
                                                echo ($orderDone / $orderAll) * 100;
                                            }
                                            ?>%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress-group">
                                        Cancel
                                        <span class="float-right"><b><?= $orderCancel ?></b>/<?= $orderAll ?></span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-primary"
                                                style="width: 
                                            <?php
                                            if ($orderCancel == 0 && $orderAll == 0) {
                                                echo 0;
                                            } else {
                                                echo ($orderCancel / $orderAll) * 100;
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
                                        <a href="<?= base_url('SuperAdmin/dailyReport') ?>"
                                            class="btn btn-sm btn-success" target="blank"><i
                                                class="fa fa-paper-plane mr-1"></i> view detail</a>
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
                                                <td><?= $key['employee_name'] ?></td>
                                                <td><?= date('h:i a', strtotime($key['create_date'])) ?></td>
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
                                <table id="example1" class="table border-0 table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
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
                    <div class="card mt-4" id="special_task">
                        <div class="card-header">
                            Special duties for employees this month
                        </div>
                        <div class="card-body table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="tableSpecialTask" class="table border-0 table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
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
                                            if ($key['file'] == 'not yet') {
                                                echo 'file not yet';
                                            } else {
                                                echo '<a href="' . base_url() . 'assets/upload/task/' . $key['file'] . '" class="btn btn-sm btn-success"><i class="fa fa-file-download mr-2"></i> download</a>';
                                            }
                                            ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-toggle="modal" data-target="#modelId<?= $key['id'] ?>">
                                                    <i class="fa fa-eye mr-2"></i> Launch
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="modelId<?= $key['id'] ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <?= $key['description'] ?> <br>
                                                                <button type="button"
                                                                    class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php
                                            if (date('Y-m-d', strtotime($key['create_date'])) == date('Y-m-d')) {
                                                echo '<small class="text-success">today</small>';
                                            } else {
                                                echo '<small>' . date('F j, Y h:m a', strtotime($key['create_date'])) . '</small>';
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
                    <?php $this->load->view('elements/news_10line'); ?>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>

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
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "searching": false,
                    pageLength: 5
                });
                $("#tableReport").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "searching": false,
                    pageLength: 5
                });
            });
        </script>
</body>

</html>
