<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA UNIT</h4>
        </div>
    </div>

    <div class="row mb-4 g-4">
        <div class="col-lg-6 mb-3 mb-lg-0">
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
        <div class="col-12">
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
        </div>
        <div class="col-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h5 class="card-title">Menentukan produk atau obat apa yang paling banyak menghasilkan pendapatan dalam setiap unit.</h5> 
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class=" align-middle text-center bg-body" rowspan="2">NAMA OBAT</th>
                                            <th class="text-center bg-body" colspan="7">NAMA UNIT</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center bg-body">UNIT 1</th>
                                            <th class="text-center bg-body">UNIT 2</th>
                                            <th class="text-center bg-body">UNIT 3</th>
                                            <th class="text-center bg-body">UNIT 4</th>
                                            <th class="text-center bg-body">UNIT 5</th>
                                            <th class="text-center bg-body">UNIT 6</th>
                                            <th class="text-center bg-body">UNIT 7</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Obat A</td>
                                            <td class="text-center"><small>200 M</small></td>
                                            <td class="text-center"><small>210 M</small></td>
                                            <td class="text-center"><small>220 M</small></td>
                                            <td class="text-center"><small>230 M</small></td>
                                            <td class="text-center"><small>240 M</small></td>
                                            <td class="text-center"><small>250 M</small></td>
                                            <td class="text-center"><small>260 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat B</td>
                                            <td class="text-center"><small>270 M</small></td>
                                            <td class="text-center"><small>280 M</small></td>
                                            <td class="text-center"><small>290 M</small></td>
                                            <td class="text-center"><small>300 M</small></td>
                                            <td class="text-center"><small>310 M</small></td>
                                            <td class="text-center"><small>320 M</small></td>
                                            <td class="text-center"><small>330 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat C</td>
                                            <td class="text-center"><small>340 M</small></td>
                                            <td class="text-center"><small>350 M</small></td>
                                            <td class="text-center"><small>360 M</small></td>
                                            <td class="text-center"><small>370 M</small></td>
                                            <td class="text-center"><small>380 M</small></td>
                                            <td class="text-center"><small>390 M</small></td>
                                            <td class="text-center"><small>400 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat D</td>
                                            <td class="text-center"><small>410 M</small></td>
                                            <td class="text-center"><small>420 M</small></td>
                                            <td class="text-center"><small>430 M</small></td>
                                            <td class="text-center"><small>440 M</small></td>
                                            <td class="text-center"><small>450 M</small></td>
                                            <td class="text-center"><small>460 M</small></td>
                                            <td class="text-center"><small>470 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat E</td>
                                            <td class="text-center"><small>480 M</small></td>
                                            <td class="text-center"><small>490 M</small></td>
                                            <td class="text-center"><small>500 M</small></td>
                                            <td class="text-center"><small>510 M</small></td>
                                            <td class="text-center"><small>520 M</small></td>
                                            <td class="text-center"><small>530 M</small></td>
                                            <td class="text-center"><small>540 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat F</td>
                                            <td class="text-center"><small>550 M</small></td>
                                            <td class="text-center"><small>560 M</small></td>
                                            <td class="text-center"><small>570 M</small></td>
                                            <td class="text-center"><small>580 M</small></td>
                                            <td class="text-center"><small>590 M</small></td>
                                            <td class="text-center"><small>600 M</small></td>
                                            <td class="text-center"><small>610 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat G</td>
                                            <td class="text-center"><small>620 M</small></td>
                                            <td class="text-center"><small>630 M</small></td>
                                            <td class="text-center"><small>640 M</small></td>
                                            <td class="text-center"><small>650 M</small></td>
                                            <td class="text-center"><small>660 M</small></td>
                                            <td class="text-center"><small>670 M</small></td>
                                            <td class="text-center"><small>680 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat H</td>
                                            <td class="text-center"><small>690 M</small></td>
                                            <td class="text-center"><small>700 M</small></td>
                                            <td class="text-center"><small>710 M</small></td>
                                            <td class="text-center"><small>720 M</small></td>
                                            <td class="text-center"><small>730 M</small></td>
                                            <td class="text-center"><small>740 M</small></td>
                                            <td class="text-center"><small>750 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat I</td>
                                            <td class="text-center"><small>760 M</small></td>
                                            <td class="text-center"><small>770 M</small></td>
                                            <td class="text-center"><small>780 M</small></td>
                                            <td class="text-center"><small>790 M</small></td>
                                            <td class="text-center"><small>800 M</small></td>
                                            <td class="text-center"><small>810 M</small></td>
                                            <td class="text-center"><small>820 M</small></td>
                                        </tr>
                                        <tr>
                                            <td>Obat J</td>
                                            <td class="text-center"><small>830 M</small></td>
                                            <td class="text-center"><small>840 M</small></td>
                                            <td class="text-center"><small>850 M</small></td>
                                            <td class="text-center"><small>860 M</small></td>
                                            <td class="text-center"><small>870 M</small></td>
                                            <td class="text-center"><small>880 M</small></td>
                                            <td class="text-center"><small>890 M</small></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        
                </div>
            </div>
        </div>
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
