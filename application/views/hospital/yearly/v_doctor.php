<!-- Content -->
<?php include 'templates/header.php'; ?><div class="container-xxl flex-grow-1 container-p-y">
    <h6 class=" m-0">ANALISA PENANGANAN DOKTER</h6>
    <hr>
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card text-start h-100">
                        <div class="card-body  justify-content-between flex-column d-flex">
                            <div class="">
                                <h6><strong>TOP 10</strong> Jumlah Pasien yang ditangani oleh dokter per Tahun dan Dokter</h6>
                                <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd10">
                                    <span class="ti-xs ti ti-table me-1"></span>Detail
                                </button>
                            </div>
                            <div id="fd10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <h6><strong>TOP 10</strong> Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter</h6>
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd1">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd1"> </div>
                            <hr>
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd7">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd7"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start">
                <div class="card-body">
                    <h6><strong>TOP 10</strong> Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd2">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd2"> </div>
                    <hr>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd8">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd8"> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start">
                <div class="card-body">
                    <h6><strong>TOP 10</strong> Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd3">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd3"> </div>
                    <hr>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd9">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd9"> </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="mt-4"><strong>TOP 10</strong> Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Pertahun</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card text-start h-100">
                        <div class="card-header">
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd15">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                        </div>
                        <div class="card-body justify-content-end flex-column d-flex">
                            <div id="fd15"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <div class="card text-start h-100">
                        <div class="card-body">
                            <h6>Rawat Jalan</h6>

                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd16">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd16"> </div>
                            <hr>
                            <h6>Rawat Inap</h6>
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd17">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd17"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="mt-4"><strong>TOP 10</strong> Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Pertahun Berdasarkan Jenis Pasien</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd18">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd18"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6>Rawat Jalan</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd19">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd19"> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6>Rawat Inap</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd20">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd20"> </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="mt-4"><strong>TOP 10</strong> Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card text-start">
                        <div class="card-body">
                            <h6>Rawat Jalan</h6>
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd5">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd5"> </div>
                            <hr>
                            <h6>Rawat Inap</h6>
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd6">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                            <div id="fd6"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card text-start h-100">
                        <div class="card-header">
                            <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalfd4">
                                <span class="ti-xs ti ti-table me-1"></span>Detail
                            </button>
                        </div>
                        <div class="card-body  justify-content-end flex-column d-flex">
                            <div id="fd4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class="mt-4"><strong>TOP 10</strong> Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Berdasarkan Jenis Pasien per Dokter</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd21">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd21"> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6>Rawat Jalan</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd22">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd22"> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6>Rawat Inap</h6>
                    <button type="button" class="btn btn-sm btn-primary px-2 waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#modalfd23">
                        <span class="ti-xs ti ti-table me-1"></span>Detail
                    </button>
                    <div id="fd23"> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal session  -->
<!-- fd1  -->
<div class="modal fade" id="modalfd1" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien yang ditangani oleh dokter per Tahun dan Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd2  -->
<div class="modal fade" id="modalfd2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Jalan yang Ditangani oleh Setiap Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd3  -->
<div class="modal fade" id="modalfd3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd4  -->
<div class="modal fade" id="modalfd4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd5  -->
<div class="modal fade" id="modalfd5" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd6  -->
<div class="modal fade" id="modalfd6" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Inap</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd7  -->
<div class="modal fade" id="modalfd7" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Penjamin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd8  -->
<div class="modal fade" id="modalfd8" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Penjamin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd9  -->
<div class="modal fade" id="modalfd9" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Inap yang Ditangani oleh Setiap Dokter Berdasarkan Jenis Penjamin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd10  -->
<div class="modal fade" id="modalfd10" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Jumlah Pasien Rawat Jalan dan Rawat Inap yang Ditangani oleh Setiap Dokter </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd15  -->
<div class="modal fade" id="modalfd15" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Pertahun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd16  -->
<div class="modal fade" id="modalfd16" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan Pertahun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd17  -->
<div class="modal fade" id="modalfd17" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Inap Pertahun</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd18  -->
<div class="modal fade" id="modalfd18" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Pertahun Berdasarkan Jenis Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd19  -->
<div class="modal fade" id="modalfd19" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan Pertahun Berdasarkan Jenis Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd20  -->
<div class="modal fade" id="modalfd20" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Inap Pertahun Berdasarkan Jenis Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd21  -->
<div class="modal fade" id="modalfd21" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan dan Rawat Inap Berdasarkan Jenis Pasien per Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd22  -->
<div class="modal fade" id="modalfd22" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Jalan Berdasarkan Jenis Pasien per Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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
<!-- fd23  -->
<div class="modal fade" id="modalfd23" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">Pendapatan dari Pelayanan Dokter untuk Rawat Inap Berdasarkan Jenis Pasien per Dokter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="p-2  align-middle text-center bg-body" rowspan="2">Nama Dokter</th>
                                <th class="p-2 text-center bg-body" colspan="7">Tahun</th>
                            </tr>
                            <tr>
                                <th class="p-2 text-center bg-body">2018</th>
                                <th class="p-2 text-center bg-body">2019</th>
                                <th class="p-2 text-center bg-body">2020</th>
                                <th class="p-2 text-center bg-body">2021</th>
                                <th class="p-2 text-center bg-body">2022</th>
                                <th class="p-2 text-center bg-body">2023</th>
                                <th class="p-2 text-center bg-body">2024</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dokter A</td>
                                <td class="p-2 text-center">200</td>
                                <td class="p-2 text-center">210</td>
                                <td class="p-2 text-center">220</td>
                                <td class="p-2 text-center">230</td>
                                <td class="p-2 text-center">240</td>
                                <td class="p-2 text-center">250</td>
                                <td class="p-2 text-center">260</td>
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

<!-- end session  -->
<?php include 'templates/footer.php'; ?>
<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/dokter.js"></script>
<script>
    $(document).ready(function() {
        $("#dokter").addClass("active");
    });
</script>
