<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">OBAT</h4>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Jumlah Pembelian Obat Terbanyak</h4>
                        <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfo1">
                            <span class="ti-xs ti ti-table me-1"></span>Detail
                        </button>
                    </div>
                    <div class="modal fade" id="modalfo1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalFullTitle">Jumlah Pembelian Obat Terbanyak</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
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
                                                    <td>Obat A</td>
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
                                                    <td>Obat B</td>
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
                                                    <td>Obat C</td>
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
                                                    <td>Obat D</td>
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
                                                    <td>Obat E</td>
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
                                                    <td>Obat F</td>
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
                                                    <td>Obat G</td>
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
                                                    <td>Obat H</td>
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
                                                    <td>Obat I</td>
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
                                                    <td>Obat J</td>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="fo1"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Seluruh Obat Terjual per Tahun</h4>
                    <div id="fo2"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Obat Terlaris pada Pelayanan Rawat Jalan</h4>
                        <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfo3">
                            <span class="ti-xs ti ti-table me-1"></span>Detail
                        </button>
                    </div>
                    <div class="modal fade" id="modalfo3" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalFullTitle">Obat Terlaris pada Pelayanan Rawat Jalan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
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
                                                    <td class="text-center"><small>200</small></td>
                                                    <td class="text-center"><small>210</small></td>
                                                    <td class="text-center"><small>220</small></td>
                                                    <td class="text-center"><small>230</small></td>
                                                    <td class="text-center"><small>240</small></td>
                                                    <td class="text-center"><small>250</small></td>
                                                    <td class="text-center"><small>260</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>270</small></td>
                                                    <td class="text-center"><small>280</small></td>
                                                    <td class="text-center"><small>290</small></td>
                                                    <td class="text-center"><small>300</small></td>
                                                    <td class="text-center"><small>310</small></td>
                                                    <td class="text-center"><small>320</small></td>
                                                    <td class="text-center"><small>330</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>340</small></td>
                                                    <td class="text-center"><small>350</small></td>
                                                    <td class="text-center"><small>360</small></td>
                                                    <td class="text-center"><small>370</small></td>
                                                    <td class="text-center"><small>380</small></td>
                                                    <td class="text-center"><small>390</small></td>
                                                    <td class="text-center"><small>400</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>410</small></td>
                                                    <td class="text-center"><small>420</small></td>
                                                    <td class="text-center"><small>430</small></td>
                                                    <td class="text-center"><small>440</small></td>
                                                    <td class="text-center"><small>450</small></td>
                                                    <td class="text-center"><small>460</small></td>
                                                    <td class="text-center"><small>470</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>480</small></td>
                                                    <td class="text-center"><small>490</small></td>
                                                    <td class="text-center"><small>500</small></td>
                                                    <td class="text-center"><small>510</small></td>
                                                    <td class="text-center"><small>520</small></td>
                                                    <td class="text-center"><small>530</small></td>
                                                    <td class="text-center"><small>540</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>550</small></td>
                                                    <td class="text-center"><small>560</small></td>
                                                    <td class="text-center"><small>570</small></td>
                                                    <td class="text-center"><small>580</small></td>
                                                    <td class="text-center"><small>590</small></td>
                                                    <td class="text-center"><small>600</small></td>
                                                    <td class="text-center"><small>610</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>620</small></td>
                                                    <td class="text-center"><small>630</small></td>
                                                    <td class="text-center"><small>640</small></td>
                                                    <td class="text-center"><small>650</small></td>
                                                    <td class="text-center"><small>660</small></td>
                                                    <td class="text-center"><small>670</small></td>
                                                    <td class="text-center"><small>680</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>690</small></td>
                                                    <td class="text-center"><small>700</small></td>
                                                    <td class="text-center"><small>710</small></td>
                                                    <td class="text-center"><small>720</small></td>
                                                    <td class="text-center"><small>730</small></td>
                                                    <td class="text-center"><small>740</small></td>
                                                    <td class="text-center"><small>750</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>760</small></td>
                                                    <td class="text-center"><small>770</small></td>
                                                    <td class="text-center"><small>780</small></td>
                                                    <td class="text-center"><small>790</small></td>
                                                    <td class="text-center"><small>800</small></td>
                                                    <td class="text-center"><small>810</small></td>
                                                    <td class="text-center"><small>820</small></td>
                                                </tr>
                                                <tr>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="fo3"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Obat Terlaris pada Pelayanan Rawat Inap</h4>
                        <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfo4">
                            <span class="ti-xs ti ti-table me-1"></span>Detail
                        </button>
                    </div>
                    <div class="modal fade" id="modalfo4" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalFullTitle">Obat Terlaris pada Pelayanan Rawat Inap</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
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
                                                    <td class="text-center"><small>200</small></td>
                                                    <td class="text-center"><small>210</small></td>
                                                    <td class="text-center"><small>220</small></td>
                                                    <td class="text-center"><small>230</small></td>
                                                    <td class="text-center"><small>240</small></td>
                                                    <td class="text-center"><small>250</small></td>
                                                    <td class="text-center"><small>260</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>270</small></td>
                                                    <td class="text-center"><small>280</small></td>
                                                    <td class="text-center"><small>290</small></td>
                                                    <td class="text-center"><small>300</small></td>
                                                    <td class="text-center"><small>310</small></td>
                                                    <td class="text-center"><small>320</small></td>
                                                    <td class="text-center"><small>330</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>340</small></td>
                                                    <td class="text-center"><small>350</small></td>
                                                    <td class="text-center"><small>360</small></td>
                                                    <td class="text-center"><small>370</small></td>
                                                    <td class="text-center"><small>380</small></td>
                                                    <td class="text-center"><small>390</small></td>
                                                    <td class="text-center"><small>400</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>410</small></td>
                                                    <td class="text-center"><small>420</small></td>
                                                    <td class="text-center"><small>430</small></td>
                                                    <td class="text-center"><small>440</small></td>
                                                    <td class="text-center"><small>450</small></td>
                                                    <td class="text-center"><small>460</small></td>
                                                    <td class="text-center"><small>470</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>480</small></td>
                                                    <td class="text-center"><small>490</small></td>
                                                    <td class="text-center"><small>500</small></td>
                                                    <td class="text-center"><small>510</small></td>
                                                    <td class="text-center"><small>520</small></td>
                                                    <td class="text-center"><small>530</small></td>
                                                    <td class="text-center"><small>540</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>550</small></td>
                                                    <td class="text-center"><small>560</small></td>
                                                    <td class="text-center"><small>570</small></td>
                                                    <td class="text-center"><small>580</small></td>
                                                    <td class="text-center"><small>590</small></td>
                                                    <td class="text-center"><small>600</small></td>
                                                    <td class="text-center"><small>610</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>620</small></td>
                                                    <td class="text-center"><small>630</small></td>
                                                    <td class="text-center"><small>640</small></td>
                                                    <td class="text-center"><small>650</small></td>
                                                    <td class="text-center"><small>660</small></td>
                                                    <td class="text-center"><small>670</small></td>
                                                    <td class="text-center"><small>680</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>690</small></td>
                                                    <td class="text-center"><small>700</small></td>
                                                    <td class="text-center"><small>710</small></td>
                                                    <td class="text-center"><small>720</small></td>
                                                    <td class="text-center"><small>730</small></td>
                                                    <td class="text-center"><small>740</small></td>
                                                    <td class="text-center"><small>750</small></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><small>760</small></td>
                                                    <td class="text-center"><small>770</small></td>
                                                    <td class="text-center"><small>780</small></td>
                                                    <td class="text-center"><small>790</small></td>
                                                    <td class="text-center"><small>800</small></td>
                                                    <td class="text-center"><small>810</small></td>
                                                    <td class="text-center"><small>820</small></td>
                                                </tr>
                                                <tr>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="fo4"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/obat.js"></script>
<script>
    $(document).ready(function() {
        $("#obat").addClass("active");
    });
</script>