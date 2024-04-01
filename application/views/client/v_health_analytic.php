<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <style>
        .select2-results__options li {
            color: black;
        }
    </style>
</head>
<?php
$url = 'https://www.bats-consulting.com/news/';
?>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <div class="content-wrapper  bg-white" id="your-element-selector">
            <section class="content">
                <div class="container my-5">
                    <h2 class="text-uppercase font-weight-bold">HealthView Analytics</h2>
                    <hr>
                    <p class="text-justify my-3">Welcome to HealthView Analytics, your smart solution for managing and understanding hospital health data. Our platform offers comprehensive insights into patient dynamics, product performance, and doctor efficiency through sophisticated analysis of hospital sales report data. Designed to meet the demands of modern hospitals, HealthView Analytics simplifies the monitoring of health trends, identification of improvement opportunities, and data-driven decision-making.
                    </p>
                    <p class="text-justify my-3">HealthView Analytics is your reliable partner in hospital development strategy, providing essential data and analysis for enhancing patient satisfaction and service effectiveness. Let's transform the way hospitals utilize data, together with HealthView Analytics.</p>

                    <a class="btn btn-primary btn-sm mr-2" href="<?= base_url('hospital-app-date') ?>">Go to App</a>
                    <!-- <a class="btn btn-default btn-lg mr-2" role="button" href="#" data-toggle="modal" data-target="#month" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1200">Monthly <i class="fa fa-calendar-alt ml-2"></i></a>
                    <a class="btn btn-outline-primary btn-lg mr-2" role="button" href="#" data-toggle="modal" data-target="#year"data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1200">Annual<i class="fa fa-globe ml-2"></i></a> -->
                </div>
                <!-- Modal -->
                <div class="modal fade" id="month" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select Month</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="<?= base_url('Finance_client/finance_month') ?>" id="form1" method="get">
                                        <input type="hidden" name="type" value="month">
                                        <select class="js-example-basic-single" style="width:100%;" name="date" id="id_month">
                                            <?php
											foreach ($list_month as $key) {?>
                                            <option value="<?= date('Y-m', strtotime($key['bulan'])) ?>"><?= date('F Y', strtotime($key['bulan'])) ?></option>
                                            <?php
											}
									?>
                                        </select>
                                        <input type="hidden" name="show" value="<?= md5('5g7d8fyyes5g7d8fy') ?>">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="return fun_submit('#form1','id_month')" class="btn btn-sm btn-primary">Manage Dashboard <i class="ml-1 fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="year" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Select Year</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <form action="<?= base_url('Finance_client/finance_month') ?>" id="form2" method="get">
                                        <input type="hidden" name="type" value="year">
                                        <select class="js-example-basic-single" style="width:100%;" name="date" id="years">
                                            <?php
											foreach ($list_year as $key) {?>
                                            <option value="<?= $key['tahun'] ?>"><?= $key['tahun'] ?></option>
                                            <?php
											}
									?>
                                        </select>
                                        <input type="hidden" name="show" value="<?= md5('5g7d8fyyes5g7d8fy') ?>">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="return fun_submit('#form2','years')" class="btn btn-sm btn-primary">Manage Dashboard <i class="ml-1 fa fa-arrow-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
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
            $('#nav_health_analytic').addClass('nav_select');
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
</body>

</html>
