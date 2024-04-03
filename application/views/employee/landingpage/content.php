<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Training BATS Consulting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Vendor CSS Files -->
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?=base_url()?>assets/landingpage/assets/css/style.css" rel="stylesheet">
    <style>
        .justify {
            text-align: justify;
            text-justify: inter-word;
        }
    </style>
</head>

<body>

    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info.batsinternationalgroup@gmail.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +62816 110 5174
            </div>
            <div class="social-links d-none d-md-block">
                <a href="https://www.youtube.com/channel/UCGQMpfNDHcev1l7nPKjpbRA" target="blank" class="twitter"><i class="bi bi-youtube"></i></a>
                <a href="https://www.facebook.com/bats.internationalgroup/" target="blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/bats.official/" target="blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/bats-international-group/" target="blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="<?=base_url('Employee/dtraining/'.$category['id'])?>" class="text-danger"><i class="fa fa-arrow-left"></i><?=$category['content_training_category']?></a></h1>
            <nav id="navbar" class="navbar p-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#pdf">PDF</a></li>
                    <li><a class="nav-link scrollto" href="#ppt">Power Point</a></li>
                    <li><a class="nav-link scrollto" href="#yt">Video</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>


    <main id="main">
        <section id="hero" class="cta h-75">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3><?=$title_content['content_title']?></h3>
                    <p><?=$title_content['content_description']?></p>
                </div>
            </div>
        </section>
        <?php include 'element/content-training.php' ?>
        <?php include 'element/quotes.php' ?>
        <?php include 'element/contact.php' ?>
    </main>
    <?php include 'element/footer.php' ?>
</body>

</html>