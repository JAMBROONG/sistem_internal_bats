<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA DOKTER</h4>
        </div>
    </div>
    <div class="row mb-4"> 
        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Berdasarkan Penanganan Dokter</h4>
                    <p class="card-text mb-5">Menilai performa dokter berdasarkan jumlah pasien yang ditangani dari tahun 2018 hingga 2024.</p>
                    <div id="">
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
