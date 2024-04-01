<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>What's New?</title>

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';



  ?>

    <style>

        .post {

            margin-bottom: 20px;

        }



        .post img {

            width: 100%;

            height: auto;

        }



        .post p {

            margin-top: 10px;

            font-size: 14px;

            line-height: 1.5;

            color: #333;

        }

    </style>



</head>



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

                                <li class="breadcrumb-item active" aria-current="page">What's New</li>

                            </ol>

                        </nav>

                    </div>

                    <div class="row pt-3">

                        <div class="col-12 col-sm-6 col-md-3">

                            <div class="info-box" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">

                                <span class="info-box-icon bg-info elevation-1"><i class="fab fa-linkedin"></i></span>



                                <div class="info-box-content">

                                    <span class="info-box-text">LinkedIn</span>

                                    <span class="">

                                        <a href="https://www.linkedin.com/company/bats-international-group/mycompany/" class="text-success">visit link <i class="fa fa-arrow-alt-circle-right"></i></a>

                                    </span>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3">

                            <div class="info-box mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">

                                <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-instagram"></i></span>



                                <div class="info-box-content">

                                    <span class="info-box-text">Instagram</span>

                                    <span class="info-ox-number"><a href="https://www.instagram.com/bats.official/" class="text-success">visit link <i class="fa fa-arrow-alt-circle-right"></i></a></span>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix hidden-md-up"></div>



                        <div class="col-12 col-sm-6 col-md-3">

                            <div class="info-box mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="2000">

                                <span class="info-box-icon bg-dark elevation-1"><i class="fab fa-tiktok"></i></span>



                                <div class="info-box-content">

                                    <span class="info-box-text">Tiktok</span>

                                    <span class=""><a href="https://www.tiktok.com/@bats_official" class="text-success">visit link <i class="fa fa-arrow-alt-circle-right"></i></a></span>

                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3">

                            <div class="info-box mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="2500">

                                <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-youtube"></i></span>



                                <div class="info-box-content">

                                    <span class="info-box-text">Youtube</span>

                                    <span class=""><a href="https://www.youtube.com/channel/UCGQMpfNDHcev1l7nPKjpbRA" class="text-success">visit link <i class="fa fa-arrow-alt-circle-right"></i></a></a></span>

                                </div>

                            </div>

                        </div>



                    </div>



                    <div loading="lazy" data-mc-src="f3b32d0a-4ab3-4f83-9a04-c37801a55ead#instagram" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="2000"></div>



                    <script src="https://cdn2.woxo.tech/a.js#640aa0ed48c0e43a36dec1ac" async data-usrc>

                    </script>

                    <hr>

                    <?php $this->load->view('elements/news_10line_client');?>

                </div>

            </section>

        </div> <?php include 'footer.php';?>

        <script>
            $('#nav_new').addClass('nav_select');

            $(document).ready(function() {

                var token = '354c8b6ae8d1fafbda91cae028c69b20'; // Ganti dengan akses token Anda

                var userid = 'bats.official'; // Ganti dengan username profil Instagram yang ingin ditampilkan

                $.ajax({

                    url: 'https://graph.instagram.com/' + userid + '/media?fields=id,caption,media_type,media_url,thumbnail_url,permalink&access_token=' + token,

                    dataType: 'jsonp',

                    type: 'GET',

                    success: function(data) {

                        for (x in data.data) {

                            $('#instagram').append('<div class="col-md-4"><a href="' + data.data[x].permalink + '" target="_blank"><img src="' + data.data[x].media_url + '" class="img-fluid"></a></div>');

                        }

                    },

                    error: function(data) {}

                });

            });

        </script>

</body>



</html>
