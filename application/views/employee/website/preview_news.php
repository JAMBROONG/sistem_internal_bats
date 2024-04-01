<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $news['title'] ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?= $news['meta_keyword'] ?>" name="keywords">
    <meta content="<?= $news['meta_description'] ?>" name="description">

    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=base_url()?>assets/news/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url()?>assets/news/css/style.css" rel="stylesheet">
    
    <style>
        .section-title{
            border-left: 5px solid red;
        }
      body {
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
    </style>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3422459002469186"
     crossorigin="anonymous"></script>
</head>

<body class="pt-5 bg-white">
    <div class=" w-25 fixed-bottom align-bottom">
        <div class="p-3 jumbotron">
            <a href="<?= base_url('Employee/websiteMe/news') ?>" class="btn btn-sm btn-success"><i class="fa fa-arrow-circle-left mr-2"></i>back</a>
            <p class="text-dark m-0"><b>Preview:</b><br></p> <small class="text-dark"><?= $news['title_eng'] ?></small>
        </div>
    </div>
    <div class="container-fluid p-0 fixed-top">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-danger">BATS<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse px-0 px-lg-3  justify-content-center row" id="navbarCollapse">
                <div class="col-md-2">
                    
                <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 text-uppercase text-danger">BATS<span class="text-white font-weight-normal">News</span></h1>
                </a>
                </div>
                <div class="col-md-8">
                    <div class="navbar-nav py-0 align-items-center d-flex justify-content-center">
                        <?php
                        foreach ($tag as $key) {
                            if ($key['id'] == 1) {
                                continue;
                            }
                            ?>
                            <a href="index.html" class="nav-item nav-link"><?=$key['category_eng']?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="d-flex justify-content-end">
                    <a class="nav-item nav-link" href="#">
                        <img src="<?= base_url() ?>assets/image/logo/original.png" width="90px"  alt="">
                    </a>
                </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Breaking News Start -->
    <div class="container-fluid mt-5 mb-3 pt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="section-title border-right-0 mb-0" style="width: 180px;">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                        </div>
                        <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                            style="width: calc(100% - 180px); padding-right: 100px;">
                            <?php
                            $no = 0;
                            foreach ($tranding as $key) {
                                if ($no == 5) {
                                    break;
                                }
                                ?>
                                <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold" href="<?=base_url('Employee/preview_news/'.md5($key['id']))?>"><?= $key['title'] ?></a></div>
                                <?php
                                $no++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->
<?php
if ($img_news) {
    $img1 = 'assets/image/website/news_image/'.$img_news[0]['image'];
} else{
    $img1 = 'assets/news/img/news-700x435-1.jpg';
}

?>

    <!-- News With Sidebar Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="<?=base_url().$img1?>" style="object-fit: cover;">
                        <div class="bg-white border border-top-0 p-4 text-dark">
                            <div class="mb-3">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2 bg-danger text-white"
                                    href=""><?= $news['category_eng'] ?></a>
                                <a class="text-body" href=""><?= date('M d, Y h:i:s a',strtotime($news['date'])) ?></a>
                            </div>
                            
                            <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"><?= $news['title'] ?></h1>
                            <?= $news['content'] ?>

                            <small>
                                Keywords: 
                            </small><br> 
                            <?php
                                foreach (explode(",", $news['meta_keyword']) as $key) {
                                    ?>
                                    <small class="bg-warning pl-1 pr-1"><?= $key ?></small>
                                    <?php
                                }
                                ?>
                        </div>
                        <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle mr-2" src="<?=base_url()?>assets/upload/images/employee/<?=$news['image']?>" width="25" height="25" alt="">
                                <span class="text-dark"><?= $news['employee_name'] ?> - <?= $news['author'] ?></span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="ml-3"><i class="far fa-eye mr-2"></i><?=$news['total_seen']?></span>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->
                </div>

                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                             <a href="https://www.facebook.com/bats.internationalgroup" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">54 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-mediollowers">1 Followers</span>
                            </a>
                            <a href="https://www.linkedin.com/company/bats-international-group/mycompany/" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">87 Connects</span>
                            </a> 
                            <a href="https://www.instagram.com/bats.official/" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">792 Followers</span>
                            </a>
                            <a href="https://www.youtube.com/channel/UCGQMpfNDHcev1l7nPKjpbRA" target="blank" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">577 Subscribers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href="https://www.bats-consulting.com/fast-tax-health-check" target="blank"><img class="img-fluid" src="<?=base_url()?>assets/news/img/thc.png" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php
                            $no = 0;
                            foreach ($tranding as $key ) {
                                foreach ($imageAll as $key2) {
                                    if ($key2['news_id'] == $key['id']) {
                                        $gambar = $key2['image'];
                                    }
                                }
                                if ($no == 10) {
                                    break;
                                } 
                                ?>
                                <div class="d-flex align-items-center bg-white mb-3 border" style="height: 110px;">
                                    <img class="img-fluid" src="<?=base_url()?>assets/image/website/news_image/<?= $gambar ?>" style="width: 110px;"  alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2 bg-danger text-white" href=""><?= $key['category_eng'] ?></a>
                                            <a class="text-body" href=""><small><?= date('M d, Y ',strtotime($key['date'])) ?></small></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?=base_url('Employee/preview_news/'.md5($key['id']))?>"><?= substr($key['title'],0,30) ?>...</a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Get the latest news from us via email, register your email here!</p>
                            <form  method="post">
                                <div class="input-group mb-2" style="width: 100%;">
                                    <input type="email" class="form-control form-control-lg" name="email" required placeholder="Your Email" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary font-weight-bold px-3" type="button" disabled style="background-color:red; color:white;">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <a href="https://wa.me/628161105174" target="blank"><small>Contact us</small></a>
                            
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold ">Category</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <div class="d-flex flex-wrap m-n1">
                                <?php
                                foreach ($tag as $key) {
                                    if ($key['id'] == 1) {
                                        continue;
                                    }
                                    ?>
                                    <a href="" class="btn btn-sm btn-outline-secondary m-1"><?= $key['category_eng'] ?></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>GARASI ILMU, Jl Islamiyah No.36, Sukabumi Selatan, Kebon Jeruk, Jakarta Barat 11560</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+6221 2212 9136</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info.batsinternationalgroup@gmail.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://mobile.twitter.com/bats_official"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.facebook.com/bats.internationalgroup"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.linkedin.com/company/bats-international-group/mycompany/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://www.instagram.com/bats.official/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="https://www.youtube.com/@batsofficial"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
                <?php
                $no =0;
                foreach ($tranding as $key) {
                    if ($no == 3) {
                        break;
                        # code...
                    }
                    ?>
                    
                <div class="mb-3">
                    <div class="mb-2">
                        <a class="badge badge-danger text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?= $key['category_eng'] ?></a>
                        <a class="text-body" href=""><small><?= date('M d, Y h:i:s a',strtotime($news['date'])) ?></small></a>
                    </div>
                    <a class="small text-body text-uppercase font-weight-medium" href=""><?= substr($key['title'],0,50) ?>...</a>
                </div>
                    <?php
                    $no++;
                }
                ?>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">
                    <?php
                    foreach ($tag as $key) {
                        if ($key['id'] == 1) {
                            continue;
                        }
                        ?>
                    <a href="" class="btn btn-sm btn-secondary m-1"><?=$key['category_eng']?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <?php
                    $no = 0;
                    foreach ($imageAll as $key) {
                        if ($no == 9) {
                            break;
                        }
                        ?>
                    <div class="col-4 mb-3">
                        <a href="<?= base_url('Employee/preview_news/'.md5($key['news_id'])) ?>"><img class="w-100 h-100" src="<?=base_url()?>assets/image/website/news_image/<?= $key['image'] ?>" alt=""></a>
                    </div>
                        <?php
                        $no++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-danger btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/news/lib/easing/easing.min.js"></script>
    <script src="<?=base_url()?>assets/news/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=base_url()?>assets/news/js/main.js"></script>
    <script>
        $(document).bind("contextmenu",function(e){
        return false;
        });
    </script>
</body>

</html>