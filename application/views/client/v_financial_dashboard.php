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

        #your-element-selector {
            background-image: linear-gradient(to right, #4facfe 0%, #00f2fe 100%);
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
        <div class="content-wrapper d-flex align-items-center justify-content-center" id="your-element-selector">
            <section class="content h-100  d-flex align-items-center">
                <div class="container">
                    <div class="row flex-column-reverse bg-light flex-column flex-md-row" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                        <div class="col-md-6 text-center text-md-left d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center mb-4">
                            <div style="max-width: 500px;">
                                <h2 class="text-uppercase font-weight-bold">FINANCIAL DASHBOARD</h2>
                                <p class="text-justify my-3">Financial Dashboard is a website designed to provide a comprehensive overview of the financial condition of a company or individual. Through Financial Dashboard, users can visualize and analyze financial data in real-time, including information on revenue, expenses, profitability, balance sheets, and cash flow. The dashboard also provides interactive graphs and tables, allowing users to compare historical data and track financial performance over time. By using Financial Dashboard, users can make better and faster decisions based on accurate and up-to-date financial data. <a href="<?= base_url() ?>assets/pdf/financial_dashboard/EXAMPLE FINANCIAL DASHBOARD.pdf" download="download">Download explanation</a></p>
                                <a class="btn btn-default btn-lg mr-2" role="button" href="#" data-toggle="modal" data-target="#month" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1200">Monthly <i class="fa fa-calendar-alt ml-2"></i></a>
                                <a class="btn btn-outline-primary btn-lg mr-2" role="button" href="#" data-toggle="modal" data-target="#year"data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1200">Annual<i class="fa fa-globe ml-2"></i></a>
								<?php if ($user['typeBusiness'] == "Hospitality") {
									?>
									<a class="btn btn-outline-primary btn-lg mt-2" role="button" href="#" data-toggle="modal" data-target="#year"data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1700">HealthView Analytics<i class="fa fa-globe ml-2"></i></a>

									<?php
								} ?>
							</div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="p-xl-5 m-xl-5"><img class="rounded img-fluid w-100 fit-cover" style="min-height: 300px;  filter: grayscale(0%);" src="<?= base_url() ?>assets/image/financial_dashboard/hero01.svg" /></div>
                        </div>
                    </div>
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
            $('#nav_financial_dashboard').addClass('nav_select');
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
</body>

</html>
