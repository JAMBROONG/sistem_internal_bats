<?php
function format_angka($angka)
{
    $satuan = ['', 'k', 'M', 'B', 'T', 'Q', 'Qt', 'Sx', 'Sp', 'Oc', 'No', 'De'];
    $ukuran = count($satuan) - 1;
    $i = 0;
    $abs_angka = abs($angka);
    if ($angka < 0)
    {
        $tanda = '-';
    }
    else
    {
        $tanda = '';
    }
    while ($abs_angka >= 1000 && $i < $ukuran)
    {
        $abs_angka /= 1000;
        $i++;
    }
    return 'Rp. ' . $tanda . round($abs_angka, 1) . '' . $satuan[$i];
}

function v($num)
{
    if ($num < 0)
    {
        $num = abs($num);
        return '(' . number_format($num, 0, ',', '.') . ')';
    }
    else
    {
        return number_format($num, 0, ',', '.');
    }
}

function getcolor($num)
{
    if ($num < 0)
    {
        return array(
            'color' => 'text-danger',
            'bg_color' => 'bg-danger',
            'hex' => '#D82724',
            'num' => $num
        );
    }
    if ($num == 0)
    {
        return array(
            'color' => 'text-dark',
            'bg_color' => 'bg-dark',
            'hex' => '#000000',
            'num' => $num
        );
    }
    else
    {
        return array(
            'color' => 'text-success',
            'bg_color' => 'bg-success',
            'hex' => '#070A52',
            'num' => '+' . $num
        );
    }
}

function getvalknob($num)
{
    if ($num < 0)
    {
        return array(
            'max' => 100,
            'min' => $num
        );
    }
    if ($num > 100)
    {
        return array(
            'max' => $num,
            'min' => 0
        );
    }
    else
    {
        return array(
            'max' => 100,
            'min' => 0
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php $this->load->view('client/header'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
    <script nonce="undefined" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        
        .select2-results__options li {
            color: black;
        }
        .quote-card {
            background: #fff;
            color: #222222;
            padding: 20px;
            padding-left: 50px;
            box-sizing: border-box;
            box-shadow: 0 2px 4px rgba(34, 34, 34, 0.12);
            position: relative;
            overflow: hidden;
            min-height: 120px;
        }
        .quote-card p {
            /* font-size: 22px; */
            line-height: 1.5;
            margin: 0;
            max-width: 80%;
        }
        .quote-card cite {
            font-size: 16px;
            margin-top: 10px;
            display: block;
            font-weight: 200;
            opacity: 0.8;
        }
        .quote-card:before {
            font-family: Georgia, serif;
            content: "“";
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 5em;
            color: rgba(238, 238, 238, 0.8);
            font-weight: normal;
        }
        .quote-card:after {
            font-family: Georgia, serif;
            content: "”";
            position: absolute;
            bottom: -110px;
            line-height: 100px;
            right: -32px;
            font-size: 25em;
            color: rgba(238, 238, 238, 0.8);
            font-weight: normal;
        }
        @media (max-width: 640px) {
            .quote-card:after {
                font-size: 22em;
                right: -25px;
            }
        }
        
    </style>
</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php $this->load->view('client/navbar'); ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="m-1 m-lg-5" id="cash_md">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h6>Displays the financial dashboard of <b><?=$user['company']?></b> </h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <td>Type</td>
                                            <td>: <b class="bg-warning rounded" style="padding:3px; font-size:12px">Annual</b></td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>: <b> <?= $date ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="#bulan">Select Date</label>
                                        <select class="form-control" id="bulan" name="bulan" onchange="redirectToPage()">
                                            <option value="<?= $date ?>"><?= $date ?></option>
                                            <?php
                                              foreach ($list_year as $key) {
                                                if ($key['tahun'] == $date) {
                                                  continue;
                                                }
                                                ?>
                                            <option value="<?=$key['tahun']?>"><?=$key['tahun']?></option>
                                            <?php
                                              }
                                              ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-lg-5">
                    
                <div class="row mb-3">
                            <div class="col">
                                <a id="cmd" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=cmd')?>" class="btn btn-block btn-light    border text-sm  h-100 d-flex align-items-center justify-content-center">
                                Cash Management Dashboard
                                </a>
                            </div>
                            <div class="col">
                                <a id="fkd" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=fkd')?>" class="btn btn-block  btn-light border  text-sm  h-100 d-flex align-items-center justify-content-center">
                                Financial KPI Dashboard
                                </a>
                            </div>
                            <div class="col">
                                <a id="pald" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=pald')?>" class="btn btn-block  btn-light border  text-sm  h-100 d-flex align-items-center justify-content-center">
                                Profit and Loss Dashboard
                                </a>
                            </div>
                            <div class="col">
                                <a id="cd" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=cd')?>" class="btn btn-block  btn-light border  text-sm  h-100 d-flex align-items-center justify-content-center">
                                CFO Dashboard
                                </a>
                            </div>
                            <div class="col">
                                <a id="fpd" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=fpd')?>" class="btn btn-block  btn-light border  text-sm  h-100 d-flex align-items-center justify-content-center">
                                Financial Performance Dashboard
                                </a>
                            </div>
                            <div class="col">
                                <a id="td" href="<?=base_url('Finance_client/finance_month?type=year&date='.$date.'&show='.md5('5g7d8fyyes5g7d8fy').'&tab=td')?>" class="btn btn-block  btn-light border  text-sm  h-100 d-flex align-items-center justify-content-center">
                                Taxation Dashboard
                                </a>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['tab'])) {
                            
                        switch ($_GET['tab']) {
                            case 'cmd':
                                include 'hero/cash_management_dashboard.php';
                                break;
                            case 'fkd':
                                include 'hero/financial_kpi_dashboard.php';
                                break;
                            case 'pald':
                                include 'hero/profit_and_loss_dashboard.php';
                                break;
                            case 'cd':
                                include 'hero/cfo_dashboard.php';
                                break;
                            case 'fpd':
                                include 'hero/finance_peformance_dashboard.php';
                                break;
                            case 'td':
                                include 'hero/taxation_dashboard.php';
                                break;
                            
                            default:
                            include 'hero/cash_management_dashboard.php';
                                break;
                        }
                        }else{
                            
                            include 'hero/cash_management_dashboard.php';
                        }
                        ?>

                </div>
            </section>
        </div>

        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
            function redirectToPage() {
                var bulan = document.getElementById("bulan").value;
                window.location.href = "<?= base_url()?>Finance_client/finance_month?type=year&date=" + bulan + '&show=<?=md5('5g7d8fyyes5g7d8fy')?>';
            }
            $('#nav_financial_dashboard').addClass('nav_select');
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   	 = number_string.split(','),
            sisa     	 = split[0].length % 3,
            rupiah     	 = split[0].substr(0, sisa),
            ribuan     	 = split[0].substr(sisa).match(/\d{3}/gi);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    
    var nominalPembayaran = document.getElementsByName('nominal_pembayaran')[0];
    var nominalPelaporan = document.getElementsByName('nominal_pelaporan')[0];
    
    nominalPembayaran.addEventListener('keyup', function(e){
        nominalPembayaran.value = formatRupiah(this.value, 'Rp. ');
    });
    nominalPelaporan.addEventListener('keyup', function(e){
        nominalPelaporan.value = formatRupiah(this.value, 'Rp. ');
    });
</script>

</body>

</html>