<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>
<style>
    .container2 {
        max-height: 100vh;
        /* set maksimum height container sebesar tinggi layar */
        overflow-y: auto;
        /* membuat scroll jika gambar melebihi height container */
    }
</style>
</style>
<?php
$url = "https://www.bats-consulting.com/news/";
?>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3 mb-3">
                <div class="container">
                    <div class="d-flex justify-content-center rounded flex-column text-left text-md-center p-2 p-md-5" style="background: url(<?php echo base_url(); ?>assets/image/background/bgDashboard.jpg); background-position:center center; background-size:cover; box-shadow:inset 0 0 0 2000px rgba(0, 0, 0, 0.7);">
                        <h1 class="display-6 text-bold text-white">BATS INTEGRATION SYSTEM</h1>
                        <h6 class="text-white">This application was developed to make it easier for us to see the workflow and be able to see the progress of the project. In addition, it is hoped that us can easily get information related to taxes that is updated by the BATS Consulting company.</h6>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="600" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="what's news">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/whatsNew') ?>'">
                                <div class="card-body css_btn_new rounded">
                                    <div class="d-flex flex-column justify-content-center flex-md-row align-items-center">
                                        <div>
                                            <img style="" data-src="<?= base_url() ?>assets/icon/what's_new.png" class="lazy" width="95px">
                                        </div>

                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text">&nbsp</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="900" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="bats news">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= $url ?>'">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-warning">
                                        NEW!!
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/news.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">BATS News</p>
                                            <small class="text-white d-block d-md-none">BATS News</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="financial dashboard">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/financial_dashboard') ?>'">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-warning">
                                        NEW!!
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/finance_dashboard.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text d-none d-md-block">Financial Dashboard</p>
                                            <small class="text-white d-block d-md-none">Financial Dashboard</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1500" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="for me">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/for_me') ?>'">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-warning">
                                        NEW!!
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/for_you.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">For Me</p>
                                            <small class="text-white d-block d-md-none">For Me</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="1800" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="Login to BATS Tools">
                            <?php
                            $tools = 'https://tools.bats-consulting.com/';
                            ?>
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= $tools ?>'">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-warning">
                                        NEW!!
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/tools.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">BATS Tools</p>
                                            <small class="text-white d-block d-md-none">BATS Tools</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6 d-none" data-aos="fade-up" data-aos-duration="2100" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="Login to BATS Tools">
                            <?php
                            $tools = 'https://bats-consulting.com/fast-tax-health-check';
                            ?>
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= $tools ?>'">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-warning">
                                        NEW!!
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/health.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">Fast Tax Health Check</p>
                                            <small class="text-white d-block d-md-none">Fast Tax Health Check</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="2400" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="service">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/ourServices') ?>'">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/service.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">Our Services</p>
                                            <small class="text-white d-block d-md-none">Our Services</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="2700" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="general information">

                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/general_information') ?>'">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/information.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">General Information</p>
                                            <small class="text-white d-block d-md-none">General Information</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="3000" data-aos-anchor-placement="top-bottom" style="cursor:pointer" title="job track">
                            <div class="card" style="background-color: #C1272D;" onclick="window.location = '<?= base_url('Client/jobTrack_home') ?>'">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/track.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">Job Track</p>
                                            <small class="text-white d-block d-md-none">Job Track</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6" data-aos="fade-up" data-aos-duration="3000" data-aos-anchor-placement="top-bottom" style="cursor:no-drop" title="trainig">
                            <div class="card" style="background-color: #f2bfc1;">
                                <div class="ribbon-wrapper">
                                    <div class="ribbon bg-success">
                                        Upcoming
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-between flex-md-row align-items-center">
                                        <div>
                                            <img style="filter: grayscale(100%)" data-src="<?= base_url() ?>assets/icon/training.png" class="lazy" width="35px">
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <p class="text-white card-text  d-none d-md-block">Training </p>
                                            <small class="text-white d-block d-md-none">Training </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('elements/news_9line_client'); ?>
                    <div class="d-flex justify-content-center">
                        <a href="https://bats-consulting.com/news" target="blank" class="btn btn-sm btn-danger mb-5 text-center">www.bats-consulting.com/news <i class="fa fa-arrow-right"></i></a>
                    </div>
                    <div class="d-flex p-2 card bg-dark mb-3" id="tax_regulation">
                        <a href="https://bats-consulting.com/news" class="navbar-brand">
                            TAX REGULATION
                        </a>
                    </div>
                    <br>
                    <div class="container" style="width:100%;height:auto;">
                        <div class="row row-cols-1 row-cols-lg-4 g-4">
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/Global-Tax-Rules.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:35px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100" style="line-height:0.8;">Global Tax
                                            Rules and Regulations</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/global-tax-rules" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/Tax-Treaty.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:35px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">Tax Treaty</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/tax-treaty" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/Payroll.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:35px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">Global Payroll</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/payroll-home" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/BEPS.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:35px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">BEPS Action</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/beps')?>" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row row-cols-1 row-cols-lg-4 g-4">
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/UU-PPh.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:15px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">Konsolidasi UU PPh</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/konsolidasi-uu-pph" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/UU-KUP.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:15px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">Konsolidasi UU KUP</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/konsolidasi-uu-kup" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col container-overlay">
                                <div class="card bg-dark text-white">
                                    <img class="lazy card-img image" data-src="https://www.bats-consulting.com/assets/global-tax/UU-PPN.jpg" alt=" Card image" style="object-fit:cover; background-size:cover;height:375px;">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end text-center" style="padding:15px;">
                                        <h5 class="card-title title bg-danger p-3 rounded w-100">Konsolidasi UU PPN</h5>
                                        <a class="btn middle btn-sm btn-dark mt-1" href="https://www.bats-consulting.com/konsolidasi-uu-ppn" role="button">Read
                                            More...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                </div>
            </section>
        </div>
        <?php include 'footer.php'; ?>
        <script>
            $('#nav_dashboard').addClass('nav_select')
        </script>
</body>

</html>