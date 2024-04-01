<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Training BATS Consulting</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Vendor CSS Files -->
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/landingpage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
<div class="modal fade " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="card-title">
                            create training plan
                        </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('Employee/createTrainingEmployee')?>" method="post">
                            <div class="form-group">
                              <label for="">Book</label>
                              <select name="id_title" id="" class="select2 form-control " required>
                                <?php 
                                    foreach ($data_title as $key) {
                                        echo '<option value="'.$key['id'].'">'.$key['content_title'].'</option>';
                                    }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Rencana:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <small>Mulai</small>
                                        <input id="my-input" class="form-control" value="<?= date('Y-m-d') ?>" type="date" name="plan_start" required>
                                    </div>
                                    <div class="col-md-6">
                                        <small>Selesai</small>
                                        <input id="my-input" class="form-control" type="date" name="plan_finish" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Deskripsi</label>
                                <textarea name="desc" id="summernote" cols="30" rows="10" required>
                                    
                                </textarea>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Save <i class="fa fa-save ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<a class="btn btn-sm position-fixed fixed-bottom mb-3 ml-3 bg-warning text-sm" style="width: 150px;" data-toggle="modal" data-target="#modelId">
<small><i class="bi bi-plus-circle"></i> add to target</small>
</a>
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
        
        <!-- Modal -->
        <!-- -->
        
                            
        <?php include 'element/about.php' ?>
        <?php include 'element/why-us.php' ?>
        <?php include 'element/material.php' ?>
        <?php include 'element/quotes.php' ?>
        <?php include 'element/contact.php' ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <?php include 'element/footer.php' ?>
    
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        
        $(function() {
            
            $('.select2').select2()
                $('#summernote').summernote()
                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            });
    </script>
</body>

</html>