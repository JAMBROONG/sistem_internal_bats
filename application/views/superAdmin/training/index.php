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

    <section id="topbar" class="d-flex align-items-center  d-lg-block d-none">
        <div class="container d-flex justify-content-center justify-content-md-between align-items-center">
            <div class="contact-info d-flex align-items-center pt-2">
                <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info.batsinternationalgroup@gmail.com</a>
                <i class="bi bi-phone-fill phone-icon"></i> +62816 110 5174
            </div>
            <div class="social-links d-none d-md-block pt-2">
                <a href="https://www.youtube.com/channel/UCGQMpfNDHcev1l7nPKjpbRA" target="blank" class="twitter"><i class="bi bi-youtube"></i></a>
                <a href="https://www.facebook.com/bats.internationalgroup/" target="blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/bats.official/" target="blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/bats-international-group/" target="blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a onClick="window.location.reload()" type="button"><?=$category['content_training_category']?></a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Material</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

   
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
            <h1>Hai, <?= $user['employee_name'] ?> </h1>
            <h2>Kita menyediakan segudang ilmu <b><?=$category['content_training_category']?></b> loh untuk dipelajari bersama. <br> Yuk belajar!</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
    </section>

    <main id="main">
        <?php include 'element/about.php' ?>
        <?php include 'element/why-us.php' ?>
        <?php include 'element/material.php' ?>
        <?php include 'element/quotes.php' ?>
        <?php include 'element/contact.php' ?>
    </main>

    <?php include 'element/footer.php' ?>

</body>

</html>