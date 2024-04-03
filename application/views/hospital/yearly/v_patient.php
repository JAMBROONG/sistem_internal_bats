<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">PASIEN</h4>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="card-title">Persentase Pasien Berdasarkan Jenis Pasien dari 2018 - 2024</h4>
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
                                    <h4 class="ms-1 mb-0">30</h4>
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
                                    <h4 class="ms-1 mb-0">40</h4>
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
                                    <h4 class="ms-1 mb-0">50</h4>
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
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Berdasarkan Jenis Pasien dan Tahun</h4>
                    <p class="card-text mb-5">Pembandingan jumlah pasien BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pasien Rawat Jalan Berdasarkan Jenis Pasien</h4>
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
                                            <h4 class="ms-1 mb-0">30</h4>
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
                                            <h4 class="ms-1 mb-0">40</h4>
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
                                            <h4 class="ms-1 mb-0">50</h4>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pasien Berdasarkan Rawat Inap & Rawat Jalan</h4>
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
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pasien Rawat Inap Berdasarkan Jenis Pasien</h4>
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
                                            <h4 class="ms-1 mb-0">30</h4>
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
                                            <h4 class="ms-1 mb-0">40</h4>
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
                                            <h4 class="ms-1 mb-0">50</h4>
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
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Jalan Berdasarkan Jenis Pasien dan Tahun</h4>
                    <p class="card-text">Pembandingan jumlah pasien rawat jalan BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp7">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pasien Rawat Inap Berdasarkan Jenis Pasien dan Tahun</h4>
                    <p class="card-text">Pembandingan jumlah pasien rawat inap BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp6">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">PENDAPATAN</h4>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pendapatan Berdasarkan Jenis Pasien dan Tahun</h4>
                    <p class="card-text mb-5">Pembandingan jumlah pendapatan BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp8">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="card-title">Persentase Pendapatan Berdasarkan Jenis Pasien dari 2018 - 2024</h4>
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
                                    <h4 class="ms-1 mb-0">30</h4>
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
                                    <h4 class="ms-1 mb-0">40</h4>
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
                                    <h4 class="ms-1 mb-0">50</h4>
                                    <p class="mb-1">ASURANSI</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pendapatan Rawat Jalan Berdasarkan Jenis Pasien</h4>
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
                                            <h4 class="ms-1 mb-0">30</h4>
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
                                            <h4 class="ms-1 mb-0">40</h4>
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
                                            <h4 class="ms-1 mb-0">50</h4>
                                            <p class="mb-1">ASURANSI</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pendapatan Berdasarkan Rawat Inap & Rawat Jalan</h4>
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
                        <div class="col-lg-3 d-flex flex-column justify-content-between">
                            <h4 class="card-title">Persentase Pendapatan Rawat Inap Berdasarkan Jenis Pasien</h4>
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
                                            <h4 class="ms-1 mb-0">30</h4>
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
                                            <h4 class="ms-1 mb-0">40</h4>
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
                                            <h4 class="ms-1 mb-0">50</h4>
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
    <div class="row mb-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pendapatan Berdasarkan Rawat Inap & Rawat Jalan Dari Tahun 2018 - 2024</h4>
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-stethoscope text-success"></i></span>
                                        </div>
                                    </div>
                                    <h4 class="ms-1 mb-0">40M</h4>
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
                                    <h4 class="ms-1 mb-0">30M</h4>
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

    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pendapatan Rawat Jalan Berdasarkan Jenis Pasien</h4>
                    <p class="card-text">Pembandingan jumlah pendapatan rawat inap BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp15">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Pendapatan Rawat Inap Berdasarkan Jenis Pasien</h4>
                    <p class="card-text">Pembandingan jumlah pendapatan rawat jalan BPJS, umum, dan asuransi dari tahun 2018 hingga 2024.</p>
                    <div id="fp14">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">KUNJUNGAN</h4>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-4">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Kunjungan Seuruh Pasien Setiap Tahun</h4>
                    <p class="card-text mb-0">Mengidentifikasi pola kunjungan pasien, termasuk waktu kunjungan puncak dan off-peak, yang bisa membantu dalam pengaturan jadwal staf dan alokasi sumber daya.</p>
                    <div id="fp21">
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Kunjungan Seuruh Pasien Setiap Bulan</h4>
                    <p class="card-text mb-0">Mengidentifikasi pola kunjungan pasien, termasuk waktu kunjungan puncak dan off-peak, yang bisa membantu dalam pengaturan jadwal staf dan alokasi sumber daya.</p>

                    <div id="fp16">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12 mb-3 mb-lg-0">
            <div class="card text-center h-100">
                <div class="card-body">
                    <h4 class="card-title">Persentase Jumlah Kunjungan Pasien Rawat Jalan dan Rawat Inap</h4>
                    <div class="row align-items-center">
                        <div class="col col-lg-3">
                            <div class="card h-100 shadow-none border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center justify-content-center mb-2 pb-1">
                                        <div class="avatar">
                                            <span class="avatar-initial rounded bg-transparent"><i class="fas fa-stethoscope text-success"></i></span>
                                        </div>
                                    </div>
                                    <h4 class="ms-1 mb-0">40M</h4>
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
                                    <h4 class="ms-1 mb-0">30M</h4>
                                    <p class="mb-1">Rawat Inap</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="card-title mt-4">Jumlah Kunjungan Pasien Rawat Jalan Berdasarkan Jenis Pasien</h4>
                            <div id="fp19">
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <h4 class="card-title mt-4">Jumlah Kunjungan Pasien Rawat Inap Berdasarkan Jenis Pasien</h4>
                            <div id="fp18">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <h4 class="card-title mt-4">Persentase Kunjungan Pasien Rawat Jalan Berdasarkan Jenis Pasien</h4>
                            <div id="fp25" class="mb-4"></div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="card-title mt-4">Persentase Kunjungan Pasien Rawat Inap Berdasarkan Jenis Pasien</h4>
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
                    <h4 class="card-title">Jumlah Kunjungan Berdasarkan Jenis Pasien Di Setiap Tahun</h4>
                    <div id="fp22">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card text-start h-100">
                <div class="card-body">
                    <h4 class="card-title">Jumlah Kunjungan Berdasarkan Jenis Pasien Di Setiap Bulan</h4>
                    <p class="card-text mb-2">Mengidentifikasi pola kunjungan pasien, termasuk waktu kunjungan puncak dan off-peak, pada setiap jenis pasien.</p>
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
