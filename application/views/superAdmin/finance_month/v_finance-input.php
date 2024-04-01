<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Finance</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php $this->load->view('superAdmin/header'); ?>
</head>

<script type="text/javascript">
    function disableButton2(btn) {
        document.getElementById("btn2").innerHTML = ' <i class="fas fa-cog fa-spin mr-2"> </i>updating..';
        document.getElementById("btn2").className = "btn btn-sm btn-warning";
        $("form.form-once-only").submit(function() {
            $(this).find(':button').prop('disabled', true);
        });
    }
</script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<?php
$dataOld = [];
foreach ($sptClient as $key) {
    array_push($dataOld, $key['spt_tahunan_id']);
}
$checked = '';
?>

<body class="hold-transition sidebar-mini lyt mt-5">
    <div class=" ml-lg-5 mr-lg-5">
        <section class="content">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-sm">
                            <a href="<?= base_url() ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item text-sm">
                            <a href="<?= base_url('SuperAdmin/Finances') ?>">Finances</a>
                        </li>
                        <li class="breadcrumb-item text-sm">
                            <a href="<?= base_url('SuperAdmin/finance_req/' . $user_id) ?>">Month or Year</a>
                        </li>
                        <li class="breadcrumb-item text-sm">
                            <a
                                href="<?= base_url('SuperAdmin/finance_core?user_id=' . $user_id . '&&type=month&date=' . $date) ?>">Core</a>
                        </li>
                        <li class="breadcrumb-item text-sm active" aria-current="page">Manage Default</li>
                    </ol>
                </nav>
            </div>
            <div class="card shadow-none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h2><?= date('F Y', strtotime($date)) ?></h2>
                            <p>Enter financial data for the month: <?= date('F Y', strtotime($date)) ?></p>
                        </div>
                        <form action="<?= base_url('SuperAdmin/finance_input/') ?>" class="form col-md-6"
                            method="post">
                            <div class="form-group">
                                <label for="">Select Date</label>
                                <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                <input type="month" name="date" id="date" value="<?= $date ?>"
                                    class="form-control date" required>
                                <button type="submit" class="btn btn-success mt-2 btn-sm"><i class="fa fa-eye"></i>
                                    view data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <a href="#perpajakan" class="btn btn-sm btn-primary mt-2"><img
                    src="https://img.icons8.com/cotton/1x/checklist--v1.png" class="mr-2" width="20px"
                    alt="">Lihat Data Perpajakan</a>

            <button type="button"
                onclick="openNewWindow('<?= base_url('Finance/finance_month?show=y&user_id=' . $user_id . '&date=' . $date) ?>')"
                class="btn btn-sm btn-primary mt-2"><img
                    src="https://cdn.iconscout.com/icon/premium/png-512-thumb/dashboard-126-464794.png?f=avif&w=256"
                    class="mr-2" width="20px" alt=""> dashboard</button>
            <button type="button"
                onclick="window.location = '<?= base_url('SuperAdmin/finance_manage?show=y&user_id=' . $user_id . '&date=' . $date) ?>'"
                class="btn btn-sm btn-primary mt-2"><img src="https://img.icons8.com/plasticine/1x/checklist.png"
                    class="mr-2" width="20px" alt=""> set default</button>
            <div class="card shadow-none">
                <div class="card-header">
                    <div class="card-title">
                        Transkrip Laporan Keuangan
                    </div>
                    <div class="card-tools">
                        <div class="card-title">Date: <b><?= date('F Y', strtotime($date)) ?></b></div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center p-3">

                    <a href="<?= base_url('SuperAdmin/finance_manage_year?user_id=' . $user_id . '&date=' . $date) ?>"
                        class="btn btn-sm btn-default" data-toggle="modal" data-target="#modaltambahsubakun">
                        <div class="info-box-content">
                            <span class="info-box-text"> <i class="fa fa-plus"></i> Tambahkan sub akun</span>
                        </div>
                    </a>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="modaltambahsubakun" tabindex="-1" role="dialog"
                    aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah data sub akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('SuperAdmin/addSubAccountMonth') ?>" method="post">

                                    <input type="hidden"
                                        value="<?= 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>"
                                        name="url">
                                    <input type="hidden" value="<?= $date ?>" name="spt_date">
                                    <input type="hidden" value="<?= $user_id ?>" name="client_id">
                                    <div class="form-group">
                                        <label for="">Pilih Akun</label>
                                        <select class=" js-example-basic-single form-control"
                                            onchange="return selectsub(this)" style="width:100%;"
                                            name="spt_tahunan_id" id="">
                                            <?php
                                                foreach ($dataTahunan as $optionAkun) {
                                                    
                                                    if ($optionAkun['category_jumlah'] != "") {
                                                        continue;
                                                    }
                                                ?>
                                            <option value="<?= $optionAkun['id'] ?>"
                                                namesub="<?= $optionAkun['description'] ?>">
                                                <?= $optionAkun['description'] ?></option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <small>Akun tambahan akan ditampilkan setelah <b class="text-success"
                                            id="sub_akun"><?= $dataTahunan[0]['description'] ?></b></small>
                                    <div class="form-group">
                                        <label for="">Nama Akun Tambahan</label>
                                        <input type="text" class="form-control" name="title_sub_account"
                                            id="" required aria-describedby="helpId" placeholder="">
                                    </div>
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <?php   
                if (empty($sptClient)) {
                    ?>
                    <div class="alert border-warning mt-5" role="alert">
                        <p class="mb-0">data is not available, please set any defaults that will be used via the
                            following <a
                                href="<?= base_url('SuperAdmin/finance_manage?user_id=' . $user_id . '&&date=' . $date) ?>"
                                class="text-primary">link</a></p>
                    </div>
                    <?php
                } else{
                    ?>
                    <form action="<?= base_url('SuperAdmin/updateValueSptClient') ?>" method="post" id="formAll"
                        class="form-once-only">
                        <input type="hidden" value="<?= $date ?>" name="spt_date">
                        <input type="hidden" value="<?= $user_id ?>" name="client_id">
                        <input type="hidden" value="<?= $company_type['id'] ?>" name="type_company_id">
                        <h5 class="mt-5">1. ELEMEN DARI NERACA</h5>
                        <div class="card p-3 shadow-none border">
                            <div class="card-header border-0">
                                <div class="card-title ">ASET <i>(ASSETS)</i></div>
                            </div>
                            <div class="card-body p-0">
                                <table id="table1" class="table table-light table-hover">
                                    <thead class="thead-light">
                                        <tr class="text-nowrap">
                                            <th>#</th>
                                            <th>Description (Indonesian)</th>
                                            <th>(English)</th>
                                            <th>Realization (Rp.)</th>
                                            <th class="bg-warning">Target (Rp.)</th>
                                            <th class="bg-primary">Realization (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $no = 1;
                                    $total_nilai = 0;
                                    $total_target = 0;
                                    foreach ($sptClient as $rows) {
                                        if ($rows['category_jumlah'] != "Jumlah Asset") {
                                            continue;
                                        }
                                        if (in_array($rows['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $rows['description'] ?></td>
                                            <td><?= $rows['en'] ?></td>
                                            <td>
                                                <input type="text" name="value<?= $rows['id'] ?>"
                                                    value="<?= number_format($rows['value'], 0, ',', '.') ?>"
                                                    id="rupiah<?= $rows['id'] ?>"
                                                    class=" rupiah-input text-right w-100">
                                            </td>
                                            <td class="bg-warning">
                                                <input type="text" name="target<?= $rows['id'] ?>"
                                                    value="<?= number_format($rows['target'], 0, ',', '.') ?>"
                                                    class=" rupiah-input text-right w-100">
                                            </td>
                                            <td class="bg-primary text-center">
                                                <span><?= $rows['realization'] ?>%</span>
                                            </td>
                                        </tr>
                                        <?php
                                                
                                                $checked = "";
                                    $no++;
                                    if ($rows['description'] == "PENYISIHAN PIUTANG RAGU-RAGU" || $rows['description'] == "AKUMULASI PENYUSUTAN") {
                                        $total_nilai = $total_nilai - $rows['value'];
                                        $total_target = $total_target - $rows['target'];
                                    } else{
                                        $total_nilai = $total_nilai + $rows['value'];
                                        $total_target = $total_target + $rows['target'];
                                    }
                                    }
                                    ?>
                                        <tr>
                                            <td colspan="3">TOTAL ASET</td>
                                            <td>
                                                <div disabled name="value<?= $total_nilai ?>"
                                                    class=" bg-dark text-right">
                                                    <?= 'Rp ' . number_format($total_nilai, 0, ',', '.') ?> </div>
                                            </td>
                                            <td>
                                                <div disabled value="total_nilai" class=" bg-warning text-right">
                                                    <?= 'Rp ' . number_format($total_target, 0, ',', '.') ?> </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">Cash Balance In
                                                (Rp.)</label>
                                            <input type="text" class="form-control rupiah-input text-right w-100"
                                                required value="<?php if (!empty($data_tambahan[0]['value'])) {
                                                    echo number_format($data_tambahan[0]['value'], 0, ',', '.');
                                                } else {
                                                    echo '0';
                                                }
                                                ?>" id="nama"
                                                name="cash_balance_in" placeholder="Cash Balance In">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">Cash Balance Out
                                                (Rp.)</label>
                                            <input type="text" class="form-control rupiah-input text-right w-100"
                                                required id="email" value="<?php
                                                if (!empty($data_tambahan[1]['value'])) {
                                                    echo number_format($data_tambahan[1]['value'], 0, ',', '.');
                                                } else {
                                                    echo '0';
                                                }
                                                ?>"
                                                name="cash_balance_out" placeholder="Cash Balance Out">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-form-label">EBIT Target (Rp.)</label>
                                            <input type="text" class="form-control rupiah-input text-right w-100"
                                                required id="email" value="<?php
                                                if (!empty($data_tambahan[2]['value'])) {
                                                    echo number_format($data_tambahan[2]['value'], 0, ',', '.');
                                                } else {
                                                    echo '0';
                                                }
                                                ?>"
                                                name="ebit_target" placeholder="Cash Balance Out">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="card p-3 shadow-none border">
                    <div class="card-header border-0">
                        <div class="card-title ">Kewajiban dan Ekuitas</div>
                    </div>
                    <div class="card-body p-0">
                        <table id="table2" class="table table-light table-hover">
                            <thead class="thead-light">
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Description (Indonesian)</th>
                                    <th>(English)</th>
                                    <th>Realization (Rp.)</th>
                                    <th class="bg-warning">Target (Rp.)</th>
                                    <th class="bg-primary">Realization (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    
                                    $total_target = 0;
                                    $total_nilai = 0;
                                    foreach ($sptClient as $rows) {
                                        if ($rows['category_jumlah'] != 'Jumlah Kewajiban dan Ekuitas') {
                                            continue;
                                        }
                                        
                                        if (in_array($rows['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        
                                        if ($rows['description'] == "LABA DITAHAN TAHUN INI") {
                                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $rows['description'] ?> </td>
                                    <td><?= $rows['en'] ?></td>
                                    <td>
                                        <input type="text" style="poi" readonly name="value<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['value'], 0, ',', '.') ?>"
                                            class="disabled bg-secondary text-right w-100"
                                            id="rupiah<?= $rows['id'] ?>">
                                    </td>
                                    <td class="bg-warning">
                                        <input type="text" name="target<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['target'], 0, ',', '.') ?>"
                                            class=" rupiah-input text-right w-100">
                                    </td>
                                    <td class="bg-primary text-center">
                                        <span><?= $rows['realization'] ?>%</span>
                                    </td>
                                </tr>
                                <?php
                                } else{?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $rows['description'] ?></td>
                                    <td><?= $rows['en'] ?></td>
                                    <td>
                                        <input type="text" name="value<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['value'], 0, ',', '.') ?>"
                                            class="  rupiah-input text-right w-100" id="rupiah<?= $rows['id'] ?>">
                                    </td>
                                    <td class="bg-warning">
                                        <input type="text" name="target<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['target'], 0, ',', '.') ?>"
                                            class=" rupiah-input text-right w-100">
                                    </td>
                                    <td class="bg-primary text-center">
                                        <span><?= $rows['realization'] ?>%</span>
                                    </td>
                                </tr>
                                <?php

                                }
                                        $checked = "";
                                    $no++;
                                    
                                    $total_nilai = $total_nilai + $rows['value'];
                                    $total_target = $total_target + $rows['target'];
                                    }
                                    ?>

                                <tr>
                                    <td colspan="3">TOTAL KEWAJIBAN DAN EKUITAS</td>
                                    <td>
                                        <div disabled value="total_nilai" class=" bg-dark text-right">
                                            <?= 'Rp ' . number_format($total_nilai, 0, ',', '.') ?> </div>
                                    </td>
                                    <td>
                                        <div disabled value="total_nilai" class=" bg-warning text-right">
                                            <?= 'Rp ' . number_format($total_target, 0, ',', '.') ?> </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h5 class="mt-5">2. ELEMEN DARI LAPORAN LABA/RUGI</h5>
                <div class="card p-3 shadow-none border">
                    <div class="card-header border-0">
                    </div>
                    <div class="card-body p-0">
                        <table id="table3" class="table table-hover">
                            <thead class="thead-light">
                                <tr class="text-nowrap">
                                    <th>#</th>
                                    <th>Description (Indonesian)</th>
                                    <th>(English)</th>
                                    <th>Realization (Rp.)</th>
                                    <th class="bg-warning">Target (Rp.)</th>
                                    <th class="bg-primary">Realization (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($sptClient as $rows) {
                                        if ($rows['category_jumlah'] != "") {
                                            continue;
                                        }
                                        if (in_array($rows['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        if ($rows['description'] == "HARGA POKOK PENJUALAN" || $rows['description'] == "LABA BERSIH" || $rows['description'] == "LABA KOTOR" || $rows['description'] == "LABA USAHA"|| $rows['description'] == "LABA/RUGI SEBELUM PAJAK PENGHASILAN"|| $rows['description'] == "LABA (RUGI) DARI AKTIVITAS NORMAL"||   $rows['description'] == "LABA DITAHAN TAHUN INI" || $rows['description'] == "LABA/RUGI SEBELUM HAK MINORITAS") {
                                            ?>
                                <tr style="background-color: rgba(0,0,0,.05)">
                                    <td><?= $no ?></td>
                                    <td><?= $rows['description'] ?> </td>
                                    <td><?= $rows['en'] ?></td>
                                    <td>
                                        <input type="text" style="poi" readonly name="value<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['value'], 0, ',', '.') ?>"
                                            class="disabled btn-secondary text-right w-100"
                                            id="rupiah<?= $rows['id'] ?>">
                                    </td>
                                    <td class="bg-warning">
                                        <input type="text" name="target<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['target'], 0, ',', '.') ?>"
                                            class=" rupiah-input text-right w-100">
                                    </td>
                                    <td class="bg-primary text-center">
                                        <span><?= $rows['realization'] ?>%</span>
                                    </td>
                                </tr>
                                <?php
                                        } else{?>
                                <tr style="background-color: rgba(0,0,0,.05)">
                                    <td><?= $no ?></td>
                                    <td><?= $rows['description'] ?></td>
                                    <td><?= $rows['en'] ?></td>
                                    <td>
                                        <input type="text" name="value<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['value'], 0, ',', '.') ?>"
                                            class="  rupiah-input text-right w-100" id="rupiah<?= $rows['id'] ?>">
                                    </td>
                                    <td class="bg-warning">
                                        <input type="text" name="target<?= $rows['id'] ?>"
                                            value="<?= number_format($rows['target'], 0, ',', '.') ?>"
                                            class=" rupiah-input text-right w-100">
                                    </td>
                                    <td class="bg-primary text-center">
                                        <span><?= $rows['realization'] ?>%</span>
                                    </td>
                                </tr>
                                <?php
                                        }

                                    $checked = "";
                                        $no++;
                                        if ($this->M_table->totalDataTableWhere('sub_spt_tahunan_client_perbulan','client_id',$user_id . ' AND spt_date = "' . $date . '-02" AND spt_tahunan_id = ' . $rows['id_akun_spt']) > 0) {
                                            $variable = $this->M_table->dataTableWhere('sub_spt_tahunan_client_perbulan','client_id',$user_id . ' AND spt_date = "' . $date  . '-02" AND spt_tahunan_id = ' . $rows['id_akun_spt']);
                                            foreach ($variable as $arrakuntambahan) {
                                                ?>
                                <tr class="bg-white">
                                    <td><?= $no ?></td>
                                    <td colspan="2" class="pl-3"><?= $arrakuntambahan['title'] ?></td>
                                    <td>
                                        <input type="text"
                                            name="value_spt_akun_tambahan<?= $arrakuntambahan['id'] ?>"
                                            value="<?= number_format($arrakuntambahan['value'], 0, ',', '.') ?>"
                                            class="  rupiah-input text-right w-100"
                                            id="rupiah<?= $arrakuntambahan['id'] ?>">
                                    </td>
                                    <td class="bg-warning">
                                        <input type="text"
                                            name="target_spt_akun_tambahan<?= $arrakuntambahan['id'] ?>"
                                            value="<?= number_format($arrakuntambahan['target'], 0, ',', '.') ?>"
                                            class=" rupiah-input text-right w-100">
                                    </td>
                                    <td class="bg-primary text-center">
                                        <span><?= $arrakuntambahan['realization'] ?>%</span>
                                    </td>
                                </tr>
                                <?php
                                                $no++;
                                            }
                                            ?>
                                <?php
                                        }
                                            }
                                        ?>
                            </tbody>
                        </table>
                        <hr>
                        <?= print_r($this->M_table->dataTableWhere('sub_spt_tahunan_client_perbulan', 'client_id', $user_id . ' AND spt_date = ' . $date . ' AND spt_tahunan_id = ' . $rows['id_akun_spt'])) ?>
                        <small>Other Form</small>
                        <hr> 
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Supplier Name</label>
                                    <input type="text" class="form-control" name="supplier_name" id=""
                                        value="<?php
                                        if (!empty($data_tambahan[3]['value'])) {
                                            echo $data_tambahan[3]['value'];
                                        } else {
                                            echo '0';
                                        }
                                        ?>" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <small class="rounded p-1" style="background:#400030ff; color:white;">Not
                                        Due</small>
                                    <input type="text" class="form-control rupiah-input text-right mt-2"
                                        name="not_due" id="" aria-describedby="helpId"
                                        value="<?php
                                        if (!empty($data_tambahan[4]['value'])) {
                                            echo number_format($data_tambahan[4]['value'], 0, ',', '.');
                                        } else {
                                            echo '0';
                                        }
                                        ?>" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <small class="rounded p-1" style="background:#6b275aff; color:white;">
                                        < 30 Days</small>
                                            <input type="text" class="form-control rupiah-input text-right mt-2"
                                                name="30_days"value="<?php
                                                if (!empty($data_tambahan[5]['value'])) {
                                                    echo $data_tambahan[5]['value'];
                                                } else {
                                                    echo '0';
                                                }
                                                ?>" id=""
                                                aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <small class="rounded p-1" style="background:#ba3d5dff; color:white;">
                                        < 60 Days</small>
                                            <input type="text" class="form-control rupiah-input text-right mt-2"
                                                value="<?php
                                                if (!empty($data_tambahan[6]['value'])) {
                                                    echo $data_tambahan[6]['value'];
                                                } else {
                                                    echo '0';
                                                }
                                                ?>" name="60_days" id=""
                                                aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <small class="rounded p-1" style="background:#e16b5fff; color:white;">
                                        < 90 Days</small>
                                            <input type="text" class="form-control rupiah-input text-right mt-2"
                                                value="<?php
                                                if (!empty($data_tambahan[7]['value'])) {
                                                    echo $data_tambahan[7]['value'];
                                                } else {
                                                    echo '0';
                                                }
                                                ?>" name="90_days" id=""
                                                aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <small class="rounded p-1" style="background:#fe9085ff; color:white;">> 90
                                        Days</small>
                                    <input type="text"
                                        class="form-control rupiah-input text-right mt-2"value="<?php
                                        if (!empty($data_tambahan[8]['value'])) {
                                            echo $data_tambahan[8]['value'];
                                        } else {
                                            echo '0';
                                        }
                                        ?>"
                                        name=">90_days" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                        <button type="submit" id="btn2" form="formAll" class="btn btn-sm btn-success mt-3"
                            style="width:auto;" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i> Simpan
                            Data Keuangan</button>
                    </div>
                </div>


                </form>
                <?php
                }
                ?>
            </div>
    </div>
    <div class="card mt-4 ml-lg-5 mr-lg-5">
        <div class="card-body p-0">

            <?php
            include 'element_table_tax.php';
            ?>
        </div>
    </div>

    <div class="card mt-4 ml-lg-5 mr-lg-5">
        <div class="card-body p-0">

            <?php
            include 'crud_quotes.php';
            ?>
        </div>
    </div>
    </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div id="flash_message"></div>
    <script type="text/javascript">
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }

        var rupiahInputs = document.querySelectorAll('.rupiah-input');

        rupiahInputs.forEach(function(input) {
            input.addEventListener('keyup', function(e) {
                var rawValue = this.value;
                var isNegative = false;
                if (rawValue[0] === '-') {
                    isNegative = true;
                    rawValue = rawValue.substring(1);
                }
                var digitsOnly = rawValue.replace(/\D/g, '');
                var formattedValue = formatRupiah(digitsOnly);
                if (isNegative) {
                    formattedValue = '-' + formattedValue;
                }
                this.value = formattedValue;

            });
        });

        function formatRupiah(angka) {
            var reversed = angka.toString().split('').reverse().join('');
            var ribuan = reversed.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }

        $('td').addClass("p-1 align-items-center");
        $('th').addClass("p-2");
        $('table').addClass("text-sm table-striped");

        function openNewWindow(url) {
            var width = screen.width;
            var height = screen.height;
            window.open(url, "_blank", "width=" + width + ",height=" + height);
        }
        $(document).ready(function() {
            $('.summernote').summernote();
        });

        $(document).ready(function() {
            $("#tabelQuotes").on("click", ".hapusData", function() {
                var id = $(this).data("id");
                $.ajax({
                    url: "<?= base_url('Finance/deleteQuotesMonthly') ?>",
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function() {
                        $("#tabelQuotes").load(
                            "<?= base_url('SuperAdmin/finance_input?user_id=' . $user_id . '&date=' . $date) ?> #tabelQuotes"
                        );
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data deleted successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    },

                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                    }
                });

            });
        });

        $('#formTambahData').submit(function(e) {
            e.preventDefault(); // mencegah form untuk melakukan reload halaman
            $.ajax({
                url: '<?= base_url() ?>Finance/addQuotesMonthly',
                type: 'POST',
                dataType: 'json',
                data: $('#formTambahData').serialize(),
                success: function(response) {
                    // menampilkan pesan flash jika respons dari server berhasil
                    $('#flash_message').html(response.message);
                }
            });
        });

        let no = 1;
        $(document).ready(function() {
            // load_options();
            function load_data() {
                $.ajax({
                    url: '<?php echo base_url(); ?>Finance/getQuoteMonthly?user_id=<?= $user_id ?>&date=<?= $date ?>',
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        $.each(data, function(i, item) {
                            var bg = "";
                            var bg2 = "";
                            if (item.status == "urgent") {
                                bg = 'class="bg-danger p-1"';
                                bg2 = 'style="background-color: #fbe9eb"';
                            } else if (item.status == "not urgent") {
                                bg = 'class="bg-warning p-1"';
                                bg2 = 'style="background-color: #fff9e5"';
                            }
                            html += '<tr id="row-' + item.id + '">' +
                                '<td scope="row">' + (i + 1) + '</td>' +
                                '<td class="dataKomentar">' + item.title_quote + '</td>' +
                                '<td class="text-sm dataStatus">' +
                                '<div ' + bg + '>' + item.quotes + '</div>' +
                                '</td>' +
                                '<td class="text-nowrap">' +
                                '<a title="Delete data" data-id="' + item.id +
                                '" class="btn btn-default btn-sm hapusData">delete<img src="<?= base_url() ?>assets/icon/trash.png" alt="" width="20px" srcset="" class="ml-2"></a>' +
                                '</td>' +
                                '</tr>';
                        });
                        $('#tabelQuotes tbody').html(html);
                    }
                });
            }
            setInterval(function() {
                load_data();
            }, 1000);
        });
    </script>
</body>

</html>
