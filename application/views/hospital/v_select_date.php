<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets') ?>/html/assets/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>HealthView Analytics</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/html/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/css/demo.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/html/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?= base_url('assets') ?>/html/assets/vendor/js/helpers.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/js/template-customizer.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/js/config.js"></script>
</head>

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row g-4 justify-content-center my-5">
                            <div class="col-md-10 text-center">
                                <h4 class="card-title">Ikhtisar Tahunan</h4>
                                <small class="card-title"><i>Yearly Overview</i></small>
                                <p class="card-text mt-3 mb-1">Ikhtisar tahunan memberikan gambaran holistik mengenai kinerja rumah sakit selama beberapa tahun. Hal ini memfasilitasi pemeriksaan tren, pola, dan perubahan metrik utama dari waktu ke waktu, membantu perencanaan strategis jangka panjang, mengidentifikasi area yang perlu ditingkatkan, dan menilai kesehatan organisasi secara keseluruhan.</p>
                                <small class="card-text"><i>Yearly overview offers a holistic view of the hospital's performance across multiple years. It facilitates the examination of trends, patterns, and changes in key metrics over time, aiding in long-term strategic planning, identifying areas for improvement, and assessing overall organizational health.</i></small>
                                <br>
                                <a href='<?=base_url('hospital-app-yearly')?>' class='btn d-inline-block btn-primary mt-3'>
                                    Lihat Dasbor Tahunan <br><small class="ms-2"> <i>View Yearly Dashboard</i></small>
                                </a>

                                <hr class="my-5" />
                            </div>
                            <div class="col-md-10 text-center">
                                <h4 class="card-title">Analisis Kinerja Tahunan</h4>
                                <small class="card-title"><i>Annual Performance Analysis</i></small>
                                <p class="card-text mt-3 mb-1">Analisis kinerja tahunan memberikan tinjauan menyeluruh tentang kinerja keuangan rumah sakit, efisiensi operasional, dan inisiatif strategis untuk seluruh tahun. Ini memungkinkan pemangku kepentingan untuk menilai kemajuan dari tahun ke tahun, mengidentifikasi area kekuatan dan perbaikan, serta merumuskan strategi berbasis data untuk meningkatkan efektivitas keseluruhan organisasi.</p>
                                <small class="card-text px-5"><i>Annual performance analysis provides a comprehensive review of the hospital's financial performance, operational efficiency, and strategic initiatives for the entire year. It enables stakeholders to assess year-over-year progress, identify areas of strength and improvement, and formulate data-driven strategies to enhance overall organizational effectiveness.</i></small>

                                <div class="row g-3 justify-content-center mt-3">
                                    <?php
                                    // Loop through each year from 2018 to 2024
                                    for ($year = 2018; $year <= 2024; $year++) {
                                        echo "<div class='col'>";
                                        echo "<div class='card p-3'><h5 class='card-text mb-0'>" . $year . "</h5><a href='" . base_url('hospital-app?type=year&val=' . $year) . "' class='btn mt-2 btn-sm btn-primary d-inline'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                        echo '</div>';
                                    }
                                    ?>
                                </div>
                                <hr class="my-5" />
                            </div>
                            <div class="col-md-10 text-center">
                                <h4 class="card-title">Wawasan Kinerja Bulanan</h4>
                                <small class="card-title"><i>Monthly Performance Insights</i></small>
                                <p class="card-text mt-3 mb-1">Wawasan kinerja bulanan menawarkan pemeriksaan rinci tentang pendapatan, pengeluaran, dan tren operasional rumah sakit secara bulanan dalam satu tahun tertentu. Dengan menganalisis data bulanan, pemangku kepentingan dapat mengungkap pola musiman, menemukan fluktuasi pendapatan, dan mengoptimalkan strategi alokasi sumber daya untuk memanfaatkan peluang bulanan serta mengatasi tantangan yang ada.</p>
                                <small class="card-text px-5"><i>Monthly performance insights offer a detailed examination of hospital revenues, expenses, and operational trends on a month-to-month basis within a specific year. By analyzing monthly data, stakeholders can uncover seasonal patterns, pinpoint revenue fluctuations, and optimize resource allocation strategies to capitalize on monthly opportunities and mitigate challenges.</i></small>
                                <div class="card border-0 mt-4">
                                    <div class="table-responsive mb-2">
                                        <table class="table table-borderless w-100">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-center">2018</th>
                                                    <th class="text-center">2019</th>
                                                    <th class="text-center">2020</th>
                                                    <th class="text-center">2021</th>
                                                    <th class="text-center">2022</th>
                                                    <th class="text-center">2023</th>
                                                    <th class="text-center">2024</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $months = [['id' => 'Januari', 'en' => 'January'], ['id' => 'Februari', 'en' => 'February'], ['id' => 'Maret', 'en' => 'March'], ['id' => 'April', 'en' => 'April'], ['id' => 'Mei', 'en' => 'May'], ['id' => 'Juni', 'en' => 'June'], ['id' => 'Juli', 'en' => 'July'], ['id' => 'Agustus', 'en' => 'August'], ['id' => 'September', 'en' => 'September'], ['id' => 'Oktober', 'en' => 'October'], ['id' => 'November', 'en' => 'November'], ['id' => 'Desember', 'en' => 'December']];
                                                
                                                foreach ($months as $month) {
                                                    echo '<tr>';
                                                    echo "<td class='text-start'>".$month['id']."<br><small><i>".$month['en']."</i></small></td>";
                                                    echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    if ($no == 3) {
                                                        echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-secondary disabled btn-disabled'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    } else {
                                                        echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    }
                                                    echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    if ($no == 2 || $no == 6) {
                                                        echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-secondary disabled btn-disabled'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    } else {
                                                        echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    }
                                                    echo "<td class='p-1 text-center'><button type='button' class='btn btn-sm d-inline btn-primary'>Tampilkan <br> <small><i>Show</i></small></a></div>";
                                                    echo '</tr>';
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
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/js/bootstrap.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/js/menu.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/js/main.js"></script>
    <script src="<?= base_url('assets') ?>/html/assets/js/dashboards-crm.js"></script>
</body>

</html>
