<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA UNIT</h4>
        </div>
    </div> -->

    <div class="row mb-4 g-4">
        <!-- <div class="col-lg-6 mb-3 mb-lg-0">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Menghitung jumlah pasien yang dilayani oleh masing-masing unit</h5>
                    <div id="fu1" class="mb-4"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menghitung jumlah pasien yang dilayani oleh masing-masing unit per tahun</h5>
                    <div id="fu2">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Jumlah pasien yang dilayani di setiap unit berdasarkan jenis penjamin (umum, BPJS, asuransi)</h5>
                    <div id="fu3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Jumlah pasien yang dilayani di setiap unit berdasarkan jenis penjamin (umum, BPJS, asuransi) per tahun</h5>
                    <div id="fu4">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menampilkan distribusi pendapatan atau jumlah pasien berdasarkan kelas tarif dalam setiap unit.</h5>
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-center" id="fu5">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">PENDAPATAN UNIT</h4>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menentukan jumlah pendapatan per unit</h5>
                    <div id="fu8">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menentukan jumlah pendapatan per unit per tahun</h5>
                    <div id="fu9">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menentukan jumlah pendapatan per unit berdasarkan jenis pasien</h5>
                    <div id="fu10">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->
<!-- Content -->
<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/unit.js"></script>
<script>
    $(document).ready(function() {
        $("#unit").addClass("active");
    });
</script>
