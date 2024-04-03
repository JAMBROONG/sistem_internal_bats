<style>
    .file {
        display: none;
    }
</style>
<div class="card" id="thc">
    <div class="card-header text-white" style="background-color: #2F2F2F;">
        <div class="card-title">3. Fast - Tax Health Check</div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php include'step_status.php' ?>
        <h5 class="text-center pt-4">Upload Data</h5>
        <p class="text-center pb-4">data dibawah ini merupakan data yang diperlukan untuk Tax Health Check</p>
        <form action="<?= site_url('Guest/uploadThc') ?>" method="post" enctype="multipart/form-data">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <a type="button" onclick="klik1()" id="lk1" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message1a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk1">Laporan Keuangan Audited / Non Audited (excel, pdf)</span>
                            <small id="message1" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file1" onchange="lk1()" required>
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik2()" id="lk2" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message2a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk2">Buku Besar (wajib excel)</span>
                            <small id="message2" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file2" onchange="lk2()" required>
                </div>

                <div class="col-md-4">
                    <a type="button" onclick="klik5()" id="lk5" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message5a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk5">SPT Tahunan PPh Badan (wajib pdf dan Kertas Kerja Perhitungan)</span>
                            <small id="message5" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file5" onchange="lk5()" required>
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik4()" id="lk4" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message4a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk4">SPT Masa PPh (wajib pdf)</span>
                            <small>Januari - Desember <br> (disatukan menjadi satu file pdf atau keseluruhan disatukan dalam bentuk rar/zip)</small>
                            <small id="message4" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file4" onchange="lk4()" required>
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik3()" id="lk3" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message3a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk3">SPT Masa PPN (wajib pdf)</span>
                            <small>Januari - Desember <br> (disatukan menjadi satu file pdf atau keseluruhan disatukan dalam bentuk rar/zip)</small>
                            <small id="message3" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file3" onchange="lk3()" required>
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik6()" id="lk6" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message6a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk6">Transfer Pricing Documentation (Master and Local file) (wajib pdf)</span> <small>Abaikan jika tidak ada</small>
                            <small id="message6" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file6" onchange="lk6()">
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik7()" id="lk7" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message7a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk7">Kertas Kerja Perhitungan Aset Tetap beserta Penyusutan Fiskal (wajib excel)</span>
                            <small id="message7" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file7" onchange="lk7()" required>
                </div>
                <div class="col-md-4">
                    <a type="button" onclick="klik8()" id="lk8" class="info-box mb-3 bg-light">
                        <span class="info-box-icon">
                            <i class="fas fa-upload" id="message8a"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-number form-file-text" id="filenamelk8">Dokumen SP2DK/SPHP terbaru (pdf)</span>
                            <small id="message8" class="text-danger"></small>
                        </div>
                    </a>
                    <input type="file" name="image[]" class="file" id="file8" onchange="lk8()" required>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="">Tahun Pajak</label>
                <input type="text" class="form-control" name="tahun_check" placeholder="ex: 2010" required>
            </div>
            <div class="row">
                <div class="col-md-12 text-center p-3">
                    <button class="btn btn-sm btn-success" onclick="btnsubmit()" id="butonS"><i class="fa fa-save mr-2"></i>kirim berkas</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?=base_url()?>assets/dist/js/thc.js"></script>