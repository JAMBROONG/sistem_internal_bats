<?php
    $arr_color = ['#FFDB89','#FFF6C3','#CCD5AE','#E9EDC9','#FEFAE0','#FAEDCD'];
    
    $httpss = "https://www.bats-consulting.com/";
    function getUrl($x)
    {
        $url = str_replace(",","",$x);
        $url = str_replace(" ","-",$url);$url = str_replace(":","-",$url);$url = str_replace("'","-",$url);$url = str_replace("/","-",$url);
        return $url;
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow-none">
            <div class="card-header border-0">
                <p class="d-flex flex-column">
                    <span>Total</span>
                    <span class="text-bold text-lg"><?=count($news_latest)?> Data</span>
                </p>
            </div>
            <div class="card-body">
                <div class="position-relative mb-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="sales-chart" height="250" style="display: block; height: 200px; width: 446px;" width="557" class="chartjs-render-monitor"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-around">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i>
                        This year (<?= date('Y') ?>)
                    </span>
                    <span>
                        <i class="fas fa-square text-gray"></i>
                        Last year (<?= date('Y')-1 ?>)
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="accordion">
    <div class="card" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="" style="background-color:<?= $arr_color[array_rand($arr_color)] ?>;">
        <div class="card-header">
            <h4 class="card-title w-100">
                <a class="d-block w-100 collapsed text-dark" data-toggle="collapse" href="#collapseTrending" aria-expanded="false">
                    10 Top Trending
                </a>
            </h4>
        </div>
        <div id="collapseTrending" class="collapse" data-parent="#accordion" style="">
            <div class="card-body">
                <table id="example2" class="table table-dark mt-2 contentTbl rounded shadow">
                    <thead>

                        <tr>
                            <td style="font-size: 12px;">#</td>
                            <td style="font-size: 12px;">Title</td>
                            <td style="font-size: 12px;">Writer</td>
                            <td style="font-size: 12px;">Author</td>
                            <td style="font-size: 12px;">Seen</td>
                            <td style="font-size: 12px;">Create at</td>
                            <td style="font-size: 12px;">Category</td>
                            <td style="font-size: 12px;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($news_trending as $key) {
                                if ($no == 11) {
                                    break;
                                }
                                ?>
                        <tr class="bg-light">
                            <td style="font-size: 12px;" class="text-center"><?= $no ?></td>
                            <td style="font-size: 12px;"><?= $key['title'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['employee_name'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['author'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['total_seen'] ?>(<i class="fa fa-eye"></i>)</td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= date('d, M y h:i:s a',strtotime($key['date'])) ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap text-orange"><?= $key['category_eng'] ?></td>
                            <td class=" text-nowrap">
                                <a type="button" class="btn btn-sm btn-warning" onclick="return window.location.href = '<?=$httpss?>news/<?=getUrl($key['title_eng'])?>'" target="blank">visit link</a>
                            </td>
                        </tr>
                        <?php
                                $no++;
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="" style="background-color:<?= $arr_color[array_rand($arr_color)] ?>;">
        <div class="card-header">
            <h4 class="card-title w-100 d-flex">
                <a class="d-block w-100 collapsed text-dark" data-toggle="collapse" href="#collapseLatest" aria-expanded="false">
                    Latest Post
                </a>
            </h4>
        </div>
        <div id="collapseLatest" class="collapse" data-parent="#accordion" style="">
            <div class="card-body">
                <table id="example2" class="table table-dark mt-2 contentTbl rounded shadow">
                    <thead>

                        <tr>
                            <td style="font-size: 12px;">#</td>
                            <td style="font-size: 12px;">Title</td>
                            <td style="font-size: 12px;">Writer</td>
                            <td style="font-size: 12px;">Author</td>
                            <td style="font-size: 12px;">Seen</td>
                            <td style="font-size: 12px;">Create at</td>
                            <td style="font-size: 12px;">Category</td>
                            <td style="font-size: 12px;">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                $no = 1;
                                foreach ($news_latest as $key) {
                                    if ($no == 11) {
                                        break;
                                    }
                                    ?>
                        <tr class="bg-light">
                            <td style="font-size: 12px;" class="text-center"><?= $no ?></td>
                            <td style="font-size: 12px;"><?= $key['title'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['employee_name'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['author'] ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= $key['total_seen'] ?>(<i class="fa fa-eye"></i>)</td>
                            <td style="font-size: 12px;" class=" text-nowrap"><?= date('d, M y h:i:s a',strtotime($key['date'])) ?></td>
                            <td style="font-size: 12px;" class=" text-nowrap text-orange"><?= $key['category_eng'] ?></td>
                            <td class=" text-nowrap">
                                <a type="button" class="btn btn-sm btn-warning" onclick="return window.location.href = '<?=$httpss?>news/<?=getUrl($key['title_eng'])?>'" target="blank">visit link</a>
                            </td>
                        </tr>
                        <?php
                                    $no++;
                                }
                                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- ChartJS -->

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>



<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<script>
    document.getElementById('news').className = "card bg-light";
    $(function() {
        'use strict'
        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }
        var mode = 'index'
        var intersect = true
        var $salesChart = $('#sales-chart')
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: [ <?php
                        foreach($news_inyear as $key) {
                            echo $key['value'].',';
                        } ?>
                    ]
                }, {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: [ <?php
                        foreach($news_lastyear as $key2) {
                            echo $key2['value'].',';
                        } ?>
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,
                            callback: function(value) {
                                if(value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }
                                return value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        });
    })
</script>