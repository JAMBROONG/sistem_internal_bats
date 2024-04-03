<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>For Me</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>
<?php
    $url = "https://www.bats-consulting.com/news/";
    $arr_color = ['#FFDB89','#FFF6C3','#CCD5AE','#E9EDC9','#FEFAE0','#FAEDCD'];
?>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">For Me</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Service Recommendation</h3>
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    <?php
                                        if (empty($serv)) {
                                        echo '<h5 class="text-center">Service not yet available</h5>';
                                    } else {
                                    $no = 1;
                                    $d = 1000;
                                    foreach ($serv as $key) {
                                        ?>
                                        
                                    <div class="card" style="background-color:<?= $arr_color[array_rand($arr_color)] ?>;" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="<?=$d?>">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed text-dark" data-toggle="collapse" href="#collapse<?=$no?>" aria-expanded="false">
                                                    <?= $key['service_name'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?=$no?>" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                Reason: <br>
                                            <?= $key['reason'] ?>
                                            <hr>
                                            Description: <br>
                                            <?= $key['description'] ?>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                        $no++;
                                        $d += 600;
                                    }
                                }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
  $this->load->view('client/components/our_recommendation.php');
 ?>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
        <script>
            $('#nav_for_me').addClass('nav_select')
        </script>
</body>

</html>