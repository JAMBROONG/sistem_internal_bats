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
                    <div class="d-flex justify-content-between">

                        <h4 class="card-title">Jumlah Pasien yang ditangani oleh dokter per Tahun dan Dokter</h4>
                        <a href="" class="btn btn-primary mb-2" type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">Lihat Tabel</a>
                    </div>
                    <div id="accordionOne" class="accordion-collapse collapse my-3" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class=" align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                            <th class="text-center bg-body" colspan="7">Tahun</th> 
                                        </tr>
                                        <tr> 
                                            <th class="text-center bg-body">2018</th>
                                            <th class="text-center bg-body">2019</th>
                                            <th class="text-center bg-body">2020</th>
                                            <th class="text-center bg-body">2021</th>
                                            <th class="text-center bg-body">2022</th>
                                            <th class="text-center bg-body">2023</th>
                                            <th class="text-center bg-body">2024</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dokter A</td>
                                            <td class="text-center"><small>200</small></td>
                                            <td class="text-center"><small>210</small></td>
                                            <td class="text-center"><small>220</small></td>
                                            <td class="text-center"><small>230</small></td>
                                            <td class="text-center"><small>240</small></td>
                                            <td class="text-center"><small>250</small></td>
                                            <td class="text-center"><small>260</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter B</td>
                                            <td class="text-center"><small>270</small></td>
                                            <td class="text-center"><small>280</small></td>
                                            <td class="text-center"><small>290</small></td>
                                            <td class="text-center"><small>300</small></td>
                                            <td class="text-center"><small>310</small></td>
                                            <td class="text-center"><small>320</small></td>
                                            <td class="text-center"><small>330</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter C</td>
                                            <td class="text-center"><small>340</small></td>
                                            <td class="text-center"><small>350</small></td>
                                            <td class="text-center"><small>360</small></td>
                                            <td class="text-center"><small>370</small></td>
                                            <td class="text-center"><small>380</small></td>
                                            <td class="text-center"><small>390</small></td>
                                            <td class="text-center"><small>400</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter D</td>
                                            <td class="text-center"><small>410</small></td>
                                            <td class="text-center"><small>420</small></td>
                                            <td class="text-center"><small>430</small></td>
                                            <td class="text-center"><small>440</small></td>
                                            <td class="text-center"><small>450</small></td>
                                            <td class="text-center"><small>460</small></td>
                                            <td class="text-center"><small>470</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter E</td>
                                            <td class="text-center"><small>480</small></td>
                                            <td class="text-center"><small>490</small></td>
                                            <td class="text-center"><small>500</small></td>
                                            <td class="text-center"><small>510</small></td>
                                            <td class="text-center"><small>520</small></td>
                                            <td class="text-center"><small>530</small></td>
                                            <td class="text-center"><small>540</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter F</td>
                                            <td class="text-center"><small>550</small></td>
                                            <td class="text-center"><small>560</small></td>
                                            <td class="text-center"><small>570</small></td>
                                            <td class="text-center"><small>580</small></td>
                                            <td class="text-center"><small>590</small></td>
                                            <td class="text-center"><small>600</small></td>
                                            <td class="text-center"><small>610</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter G</td>
                                            <td class="text-center"><small>620</small></td>
                                            <td class="text-center"><small>630</small></td>
                                            <td class="text-center"><small>640</small></td>
                                            <td class="text-center"><small>650</small></td>
                                            <td class="text-center"><small>660</small></td>
                                            <td class="text-center"><small>670</small></td>
                                            <td class="text-center"><small>680</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter H</td>
                                            <td class="text-center"><small>690</small></td>
                                            <td class="text-center"><small>700</small></td>
                                            <td class="text-center"><small>710</small></td>
                                            <td class="text-center"><small>720</small></td>
                                            <td class="text-center"><small>730</small></td>
                                            <td class="text-center"><small>740</small></td>
                                            <td class="text-center"><small>750</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter I</td>
                                            <td class="text-center"><small>760</small></td>
                                            <td class="text-center"><small>770</small></td>
                                            <td class="text-center"><small>780</small></td>
                                            <td class="text-center"><small>790</small></td>
                                            <td class="text-center"><small>800</small></td>
                                            <td class="text-center"><small>810</small></td>
                                            <td class="text-center"><small>820</small></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter J</td>
                                            <td class="text-center"><small>830</small></td>
                                            <td class="text-center"><small>840</small></td>
                                            <td class="text-center"><small>850</small></td>
                                            <td class="text-center"><small>860</small></td>
                                            <td class="text-center"><small>870</small></td>
                                            <td class="text-center"><small>880</small></td>
                                            <td class="text-center"><small>890</small></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="fd10">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Pasien</h4>
                    <p class="card-text mb-0">Menilai performa dokter berdasarkan jumlah pasien yang ditangani dari tahun 2018 hingga 2024 berdasarkan jenis pasien .</p>
                    <div id="fd7">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter</h4>
                    <p class="card-text mb-0">Menghitung jumlah pasien rawat jalan yang ditangani dari tahun 2018 hingga 2024.</p>
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
                    <h4 class="card-title">Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Pasien</h4>
                    <div id="fd9">
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
