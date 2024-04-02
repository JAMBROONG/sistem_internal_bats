<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA PENANGANAN DOKTER</h4>
        </div>
    </div>
    <div class="row mb-4 g-4"> 
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter</h4>
                    <p class="card-text mb-0">Menilai performa dokter berdasarkan jumlah pasien yang ditangani dari tahun 2018 hingga 2024.</p>
                    <div id="fd1">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Pasien</h4>
                    <p class="card-text mb-0">Menilai performa dokter berdasarkan jumlah pasien yang ditangani dari tahun 2018 hingga 2024 berdasarkan jenis pasien	.</p>
                    <div id="fd7">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter</h4>
                    <div id="fd2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Pasien</h4>
                    <div id="fd8">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter</h4>
                    <div id="fd3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Pasien</h4>
                    <div id="fd8">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA PENDAPATAN DOKTER</h4>
        </div>
    </div>
    <div class="row mb-4 g-4"> 
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap</h4> 
                    <div id="fd4">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan </h4>
                    <div id="fd5">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Pendapatan dari Pelayanan Dokter untuk Rawat Inap</h4>
                    <div id="fd6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->
<!-- Content -->
<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/dokter.js"></script>
<script>
    $(document).ready(function() {
        $("#dokter").addClass("active");
    });
</script>
