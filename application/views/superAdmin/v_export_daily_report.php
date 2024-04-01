<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export Daily Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://unpkg.com/file-saver"></script>

    <style>
    .select2-results__options li{
        color: black;
    }
</style> 

</head>

<body class="hold-transition sidebar-mini mt-5 bg-danger">
    <h3 class="text-center">Daily Report BATS Consulting</h3>
    <div class="wrapper shadow rounded bg-white text-dark" style="margin:2em;">
        <section class="content p-2">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('SuperAdmin/dailyReport')?>">Daily Report</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Export</li>
                    </ol>
                </nav>
            </div>
            <div class="card shadow-none">
                <div class="card-body table-responsive">
                    <form action="<?=base_url('SuperAdmin/exportDailyReport')?>" method="get">
                        <div class="input-grup">
                            <label for="" class="label">Pilih Bulan</label>
                            <div class="input-group mb-3 w-25">
                                <input type="month" class="form-control" value="<?=(empty($dates[0]) ? date('Y-m'): $dates[0]->format('Y-m') )?>" name="month" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-dark" type="submit">Tampilkan data</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (!empty($dataFinal)) {
                        ?>
                        <div class="d-flex justify-content-between mt-4 mb-2">
                            <div class="d-flex align-items-end">
                                <div class="">
                                <div class="p-1 bg-primary"></div> waktu masuk
                            </div>
                            <div class=" ml-3">
                                <div class="p-1 bg-danger"></div> waktu keluar</div>
                            </div>
                            <button onclick="exportToExcel()" class="btn btn-success">Download Excel</button>
                        </div>
                        <table class="table table-bordered text-sm" id="reportTable">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center p-1 text-bold align-middle bg-danger">Nama Karyawan</th>
                                    <th colspan="<?=count($dates)?>" class="text-center text-bold p-1 bg-danger"><?=$dates[0]->format('F Y')?></th>
                                    <th rowspan="2" class="text-center p-1 text-bold align-middle bg-danger">Total</th>
                                </tr>
                                <tr>
                                    <?php
                                    foreach ($dates as $key => $value) {
                                        ?>
                                        <th class="text-center p-1
                                        <?php
                                        if (!empty($tgl_merah_arr)) {
                                            if (in_array($value->format('Y-m-d'), $tgl_merah_arr)) {
                                                echo "bg-primary";
                                            }
                                        }
                                        ?>
                                        "><?= $value->format('D d') ?></th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataFinal as $key => $value) {
                                    echo '<tr>';
                                    echo '<td class=" p-1">' . $value['employee'] . '</td>';
                                    $total = 0;
                                    foreach ($value['absensi'] as $keys => $values) {
                                        if ($values['status'] == 1) {
                                                
                                                if ($values['tgl_merah'] != null) {
                                                    echo '<td class="text-center text-bold p-1 text-success" style="background-color:#b3d7ff">✓</td>';
                                                } else{
                                                    echo '<td class="text-center text-bold p-1 text-success">✓ <br/><small class="bg-primary rounded " style="padding:1px">'.$values['in_time'].'</small><br/><small class="bg-danger rounded " style="padding:1px">'.$values['out_time'].'</small></td>';    
                                                }
                                        } else {
                                            echo '<td class="text-center text-bold text-danger p-1">✗</td>';
                                        }
                                    }
                                    echo '<td class=" p-1 text-center bg-dark align-middle">' . $value['total'] . '</td>';
                                    echo '<tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($tgl_libur)) {
                                echo '<ul class="mt-4">';
                            foreach ($tgl_libur as $key => $value) {
                                ?>
                                    <li><?= date('D, d F Y',strtotime($value['tgl'])).' : '.$value['event']?></li>
                                    <?php
                            }
                            echo'</ul>';
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </div>


    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <script>
    function exportToExcel() {
        const table = document.getElementById('reportTable');
        const sheetName = 'Daily Report';

        const wb = XLSX.utils.table_to_book(table, { sheet: sheetName });
        const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });

        const filename = 'Daily_Report.xlsx';

        saveAs(new Blob([wbout], { type: 'application/octet-stream' }), filename);
    }
</script>
</body>

</html>
