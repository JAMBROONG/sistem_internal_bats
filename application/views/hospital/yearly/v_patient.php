<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class=" m-0">PASIEN</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h6 class="card-title">Persentase Pasien Berdasarkan Jenis Penjamin</h6>
                    <div id="fp1" class="mb-4"></div>
                    <div class="row justify-content-center">
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-primary">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-globe ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">30</h6>
                                    <p class="mb-1">UMUM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-success">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-success"><i class="ti ti-building-hospital ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">40</h6>
                                    <p class="mb-1">BPJS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-warning">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-wallet ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">50</h6>
                                    <p class="mb-1">ASURANSI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body d-flex justify-content-between flex-column">
                    <h6 class="card-title">Jumlah Pasien Berdasarkan Jenis Penjamin dan Tahun</h6>
                    <div id="fp2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pasien Rawat Jalan Berdasarkan Jenis Penjamin</h6>
                            <div id="fp5" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-globe ti-md" style="color: #3ad780;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
                                            <p class="mb-1">UMUM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-building-hospital ti-md" style="color: #76e4a7;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">BPJS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-wallet ti-md" style="color: #b3f0ce;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">50</h6>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pasien Berdasarkan Rawat Inap & Rawat Jalan</h6>
                            <div id="fp3" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="fas fa-bed" style="color: #ff8612;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
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
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">Rawat Jalan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pasien Rawat Inap Berdasarkan Jenis Penjamin</h6>
                            <div id="fp4" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-globe ti-md" style="color: #ff8612;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
                                            <p class="mb-1">UMUM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-building-hospital ti-md" style="color: #ffab5b;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">BPJS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-wallet ti-md" style="color: #ffd0a4;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">50</h6>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pasien Rawat Jalan Berdasarkan Jenis Penjamin dan Tahun</h6>
                    <div id="fp7">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pasien Rawat Inap Berdasarkan Jenis Penjamin dan Tahun</h6>
                    <div id="fp6">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h6 class=" m-0">PENDAPATAN</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pendapatan Berdasarkan Jenis Penjamin dan Tahun</h6>
                    <div id="fp8">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h6 class="card-title">Persentase Pendapatan Berdasarkan Jenis Penjamin</h6>
                    <div id="fp9" class="mb-4"></div>
                    <div class="row justify-content-center">
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-primary">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-globe ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">30</h6>
                                    <p class="mb-1">UMUM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-success">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-success"><i class="ti ti-building-hospital ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">40</h6>
                                    <p class="mb-1">BPJS</p>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="card h-100 shadow-none border-0 card-border-shadow-warning">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-wallet ti-md"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">50</h6>
                                    <p class="mb-1">ASURANSI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 g-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pendapatan Rawat Jalan Berdasarkan Jenis Penjamin</h6>
                            <div id="fp12" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-globe ti-md" style="color: #3ad780;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
                                            <p class="mb-1">UMUM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-building-hospital ti-md" style="color: #76e4a7;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">BPJS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="ti ti-wallet ti-md" style="color: #b3f0ce;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">50</h6>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pendapatan Berdasarkan Rawat Inap & Rawat Jalan</h6>
                            <div id="fp10" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded bg-transparent"><i class="fas fa-bed" style="color: #2917e8;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
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
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">Rawat Jalan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h6 class="card-title">Persentase Pendapatan Rawat Inap Berdasarkan Jenis Penjamin</h6>
                            <div id="fp11" class="mb-4"></div>
                            <div class="row justify-content-center">
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-globe ti-md" style="color: #2917e8;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">30</h6>
                                            <p class="mb-1">UMUM</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-building-hospital ti-md" style="color: #6b5eef;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">40</h6>
                                            <p class="mb-1">BPJS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-lg-4">
                                    <div class="card h-100 shadow-none border-0">
                                        <div class="card-body p-0">
                                            <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                                <div class="avatar">
                                                    <span class="avatar-initial rounded  bg-transparent"><i class="ti ti-wallet ti-md" style="color: #ada6f6;"></i></span>
                                                </div>
                                            </div>
                                            <h6 class="ms-1 mb-0">50</h6>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pendapatan Berdasarkan Rawat Inap & Rawat Jalan</h6>
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-stethoscope text-success"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">40M</h6>
                                    <p class="mb-1">Rawat Jalan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <div id="fp13" class="my-3"></div>
                            <div class="row justify-content-center">
                            </div>
                        </div>
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-bed" style="color: #2917e8;"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">30M</h6>
                                    <p class="mb-1">Rawat Inap</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div id="fp20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 g-4">
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pendapatan Rawat Jalan Berdasarkan Jenis Penjamin</h6> 
                    <div id="fp15">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Pendapatan Rawat Inap Berdasarkan Jenis Penjamin</h6> 
                    <div id="fp14">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h6 class=" m-0">KUNJUNGAN</h6>
    <hr>
    <div class="row mb-4 g-4">
        <div class="col-lg-4">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Kunjungan Seuruh Pasien Setiap Tahun</h6>
                    <div id="fp21">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Kunjungan Seuruh Pasien Setiap Bulan</h6>

                    <div id="fp16">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h6 class="card-title">Persentase Jumlah Kunjungan Pasien Rawat Jalan dan Rawat Inap</h6>
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-stethoscope text-success"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">40M</h6>
                                    <p class="mb-1">Rawat Jalan</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <div id="fp24" class="my-3"></div>
                        </div>
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-bed" style="color: #2917e8;"></i></span>
                                        </div>
                                    </div>
                                    <h6 class="ms-1 mb-0">30M</h6>
                                    <p class="mb-1">Rawat Inap</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="card-title mt-4">Jumlah Kunjungan Pasien Rawat Jalan Berdasarkan Jenis Penjamin</h6>
                            <div id="fp19">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <h6 class="card-title mt-4">Jumlah Kunjungan Pasien Rawat Inap Berdasarkan Jenis Penjamin</h6>
                            <div id="fp18">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <h6 class="card-title mt-4">Persentase Kunjungan Pasien Rawat Jalan Berdasarkan Jenis Penjamin</h6>
                            <div id="fp25" class="mb-4"></div>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="card-title mt-4">Persentase Kunjungan Pasien Rawat Inap Berdasarkan Jenis Penjamin</h6>
                            <div id="fp26" class="mb-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 g-4">
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Kunjungan Berdasarkan Jenis Penjamin Di Setiap Tahun</h6>
                    <div id="fp22">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h6 class="card-title">Jumlah Kunjungan Berdasarkan Jenis Penjamin Di Setiap Bulan</h6>
                    <div id="fp17">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->
<!-- Content -->
<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/pasien.js"></script>
<script>
    $(document).ready(function() {
        $("#pasien").addClass("active");
    });
</script>
