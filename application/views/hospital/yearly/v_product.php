<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">PRODUK</h4>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pendapatan dari Semua Produk per Tahun</h4>
                    <div id="fp1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Persentase dan Jumlah Pendapatan dari Semua Produk Berdasarkan Rawat Inap dan Rawat Jalan</h4>
                    <div class="row justify-content-center">
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <div id="fp2" class="mb-4"></div>
                            <div class="row justify-content-center text-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="fas fa-bed" style="color: #ff8612;"></i></span>
                                                </div>
                                            </div>
                                            <h4 class="ms-1 mb-0">30</h4>
                                            <p class="mb-1">Rawat Inap</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="fas fa-stethoscope text-success"></i></span>
                                                </div>
                                            </div>
                                            <h4 class="ms-1 mb-0">40</h4>
                                            <p class="mb-1">Rawat Jalan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Jumlah Pendapatan per Produk</h4>
                        <a href="" class="btn btn-primary mb-2" type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">Lihat Tabel</a>
                    </div>
                    <div id="accordionOne" class="accordion-collapse collapse my-3" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center bg-body" rowspan="2">Produk</th>
                                            <th class="text-center bg-body" colspan="7">Tahun</th>
                                            <th class="align-middle text-center bg-body" rowspan="2">Jumlah</th>
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
                                            <td>Produk A</td>
                                            <td class="text-center"><small>200</small></td>
                                            <td class="text-center"><small>210</small></td>
                                            <td class="text-center"><small>220</small></td>
                                            <td class="text-center"><small>230</small></td>
                                            <td class="text-center"><small>240</small></td>
                                            <td class="text-center"><small>250</small></td>
                                            <td class="text-center"><small>260</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk B</td>
                                            <td class="text-center"><small>270</small></td>
                                            <td class="text-center"><small>280</small></td>
                                            <td class="text-center"><small>290</small></td>
                                            <td class="text-center"><small>300</small></td>
                                            <td class="text-center"><small>310</small></td>
                                            <td class="text-center"><small>320</small></td>
                                            <td class="text-center"><small>330</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk C</td>
                                            <td class="text-center"><small>340</small></td>
                                            <td class="text-center"><small>350</small></td>
                                            <td class="text-center"><small>360</small></td>
                                            <td class="text-center"><small>370</small></td>
                                            <td class="text-center"><small>380</small></td>
                                            <td class="text-center"><small>390</small></td>
                                            <td class="text-center"><small>400</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk D</td>
                                            <td class="text-center"><small>410</small></td>
                                            <td class="text-center"><small>420</small></td>
                                            <td class="text-center"><small>430</small></td>
                                            <td class="text-center"><small>440</small></td>
                                            <td class="text-center"><small>450</small></td>
                                            <td class="text-center"><small>460</small></td>
                                            <td class="text-center"><small>470</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk E</td>
                                            <td class="text-center"><small>480</small></td>
                                            <td class="text-center"><small>490</small></td>
                                            <td class="text-center"><small>500</small></td>
                                            <td class="text-center"><small>510</small></td>
                                            <td class="text-center"><small>520</small></td>
                                            <td class="text-center"><small>530</small></td>
                                            <td class="text-center"><small>540</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk F</td>
                                            <td class="text-center"><small>550</small></td>
                                            <td class="text-center"><small>560</small></td>
                                            <td class="text-center"><small>570</small></td>
                                            <td class="text-center"><small>580</small></td>
                                            <td class="text-center"><small>590</small></td>
                                            <td class="text-center"><small>600</small></td>
                                            <td class="text-center"><small>610</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk G</td>
                                            <td class="text-center"><small>620</small></td>
                                            <td class="text-center"><small>630</small></td>
                                            <td class="text-center"><small>640</small></td>
                                            <td class="text-center"><small>650</small></td>
                                            <td class="text-center"><small>660</small></td>
                                            <td class="text-center"><small>670</small></td>
                                            <td class="text-center"><small>680</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk H</td>
                                            <td class="text-center"><small>690</small></td>
                                            <td class="text-center"><small>700</small></td>
                                            <td class="text-center"><small>710</small></td>
                                            <td class="text-center"><small>720</small></td>
                                            <td class="text-center"><small>730</small></td>
                                            <td class="text-center"><small>740</small></td>
                                            <td class="text-center"><small>750</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk I</td>
                                            <td class="text-center"><small>760</small></td>
                                            <td class="text-center"><small>770</small></td>
                                            <td class="text-center"><small>780</small></td>
                                            <td class="text-center"><small>790</small></td>
                                            <td class="text-center"><small>800</small></td>
                                            <td class="text-center"><small>810</small></td>
                                            <td class="text-center"><small>820</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk J</td>
                                            <td class="text-center"><small>830</small></td>
                                            <td class="text-center"><small>840</small></td>
                                            <td class="text-center"><small>850</small></td>
                                            <td class="text-center"><small>860</small></td>
                                            <td class="text-center"><small>870</small></td>
                                            <td class="text-center"><small>880</small></td>
                                            <td class="text-center"><small>890</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="fp3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Volume Penjualan per Produk</h4>
                        <a href="" class="btn btn-primary mb-2" type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">Lihat Tabel</a>
                    </div>
                    <div id="accordionOne" class="accordion-collapse collapse my-3" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center bg-body" rowspan="2">Produk</th>
                                            <th class="text-center bg-body" colspan="7">Tahun</th>
                                            <th class="align-middle text-center bg-body" rowspan="2">Jumlah</th>
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
                                            <td>Produk A</td>
                                            <td class="text-center"><small>200</small></td>
                                            <td class="text-center"><small>210</small></td>
                                            <td class="text-center"><small>220</small></td>
                                            <td class="text-center"><small>230</small></td>
                                            <td class="text-center"><small>240</small></td>
                                            <td class="text-center"><small>250</small></td>
                                            <td class="text-center"><small>260</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk B</td>
                                            <td class="text-center"><small>270</small></td>
                                            <td class="text-center"><small>280</small></td>
                                            <td class="text-center"><small>290</small></td>
                                            <td class="text-center"><small>300</small></td>
                                            <td class="text-center"><small>310</small></td>
                                            <td class="text-center"><small>320</small></td>
                                            <td class="text-center"><small>330</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk C</td>
                                            <td class="text-center"><small>340</small></td>
                                            <td class="text-center"><small>350</small></td>
                                            <td class="text-center"><small>360</small></td>
                                            <td class="text-center"><small>370</small></td>
                                            <td class="text-center"><small>380</small></td>
                                            <td class="text-center"><small>390</small></td>
                                            <td class="text-center"><small>400</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk D</td>
                                            <td class="text-center"><small>410</small></td>
                                            <td class="text-center"><small>420</small></td>
                                            <td class="text-center"><small>430</small></td>
                                            <td class="text-center"><small>440</small></td>
                                            <td class="text-center"><small>450</small></td>
                                            <td class="text-center"><small>460</small></td>
                                            <td class="text-center"><small>470</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk E</td>
                                            <td class="text-center"><small>480</small></td>
                                            <td class="text-center"><small>490</small></td>
                                            <td class="text-center"><small>500</small></td>
                                            <td class="text-center"><small>510</small></td>
                                            <td class="text-center"><small>520</small></td>
                                            <td class="text-center"><small>530</small></td>
                                            <td class="text-center"><small>540</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk F</td>
                                            <td class="text-center"><small>550</small></td>
                                            <td class="text-center"><small>560</small></td>
                                            <td class="text-center"><small>570</small></td>
                                            <td class="text-center"><small>580</small></td>
                                            <td class="text-center"><small>590</small></td>
                                            <td class="text-center"><small>600</small></td>
                                            <td class="text-center"><small>610</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk G</td>
                                            <td class="text-center"><small>620</small></td>
                                            <td class="text-center"><small>630</small></td>
                                            <td class="text-center"><small>640</small></td>
                                            <td class="text-center"><small>650</small></td>
                                            <td class="text-center"><small>660</small></td>
                                            <td class="text-center"><small>670</small></td>
                                            <td class="text-center"><small>680</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk H</td>
                                            <td class="text-center"><small>690</small></td>
                                            <td class="text-center"><small>700</small></td>
                                            <td class="text-center"><small>710</small></td>
                                            <td class="text-center"><small>720</small></td>
                                            <td class="text-center"><small>730</small></td>
                                            <td class="text-center"><small>740</small></td>
                                            <td class="text-center"><small>750</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk I</td>
                                            <td class="text-center"><small>760</small></td>
                                            <td class="text-center"><small>770</small></td>
                                            <td class="text-center"><small>780</small></td>
                                            <td class="text-center"><small>790</small></td>
                                            <td class="text-center"><small>800</small></td>
                                            <td class="text-center"><small>810</small></td>
                                            <td class="text-center"><small>820</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                        <tr>
                                            <td>Produk J</td>
                                            <td class="text-center"><small>830</small></td>
                                            <td class="text-center"><small>840</small></td>
                                            <td class="text-center"><small>850</small></td>
                                            <td class="text-center"><small>860</small></td>
                                            <td class="text-center"><small>870</small></td>
                                            <td class="text-center"><small>880</small></td>
                                            <td class="text-center"><small>890</small></td>
                                            <td class="text-center"><small></small></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="fp6"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/product.js"></script>
<script>
    $(document).ready(function() {
        $("#produk").addClass("active");
    });
</script>