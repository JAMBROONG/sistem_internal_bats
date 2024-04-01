<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inject Daily Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
                        <li class="breadcrumb-item active" aria-current="page">Inject</li>
                    </ol>
                </nav>
            </div>
            <div class="card shadow-none">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col">
                                    <button class="btn mr-2 btn-danger btn-lg btn-block d-flex justify-content-between align-items-center"><i class="fa fa-users"></i> Inject Bulanan</button>
                                    <p class="p-2 text-justify">Suntik data <b>seluruh</b> pegawai yang  belum membuat template dengan batasan <b>bulanan</b>. Akan dibuatkan template disemua hari pada bulan yang dipilih kecuali hari Sabtu dan Minggu</p>
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                    <!-- CARD ALL MONTHLY -->
                    <div class="card text-left shadow-sm card-danger" id="cardMonthlyAll" style="display:block">
                        <div class="card-header">
                            <div class="card-title">
                                Menyuntik data untuk semua pegawai lingkup <b>BULANAN</b>
                            </div>
                        </div>
                      <div class="card-body">
                        <p>Menambahkan template <i>daily report</i> untuk:</p>
                        
                        <form action="<?=base_url('SuperAdmin/injectMonthlyAll')?>" method="post">
                    
                            <?php 
                            foreach ($employee as $key => $value) {
                                ?>
                                <input type="checkbox" name="employee[]" value="<?= $value['id'] ?>"  id="id<?=$key?>">
                                <label for="id<?=$key?>"><?= $value['name'] ?></label> <br>
                                <?php
                            }
                            ?>
                            <div class="form-group">
                                <label for="" class="label">Select Month</label>
                                <br>
                                <input type="month" value="<?= date('Y-m')?>" required name="month" class="form-control" id="">
                            </div>
                            <div class="form-group">
                                <button class="btn  btn-danger"><i class="fa fa-save mr-2"></i> buat template</button>
                            </div>
                        </form>
                      </div>
                    </div>

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
        function onklik() {
            if (document.getElementById("leave").value == "all") {
                document.getElementById("selectE").style.display = "none";
                document.getElementById("selEmployee").value = "";
            } else {
                document.getElementById("selectE").style.display = 'block';
            }
        }
        function selectTemplateMonthlyAll(){
            let words = "konsultan, pajak, audit, consulting, regulation, law, company, individual, business, review, journal, financial, statement, presentation, seminar, material, income, sales, property, employer, employee, self-employed, nonprofit, government, foreign, domestic, simple, complex, current, past, future";
            document.getElementById('idselectTemplateMonthlyAll').value = words;
        }
        $(function() {
            $('.select2').select2()
        }); 

    </script>

</body>

</html>