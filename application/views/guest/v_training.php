<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
</head>

<body class="hold-transition sidebar-mini bg-dark sidebar-collapse">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <div class="user-panel d-flex align-items-center">
                    <div class="info">
                        <a href="<?php echo base_url('Guest'); ?>" class="d-block text-wrap text-dark"><?= $user['name']; ?></a>
                    </div>
                </div>
            </ul>
        </nav>

        <aside class="main-sidebar elevation-1 position-fixed" style="background-color: #2F2F2F;">
            <div class="sidebar">
                <div class="user-panel d-flex align-items-center mt-3">
                    <div class="image">
                        <img src="<?php echo base_url(); ?>assets/upload/images/client/<?=$user['image_user']?>" class=" elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url('Guest'); ?>" class="d-block text-wrap text-white">Guest</a>
                    </div>
                </div>
                <hr class="m-0 mt-2 border-white">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/'); ?>" class="nav-link text-white">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p> Dashboard </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/ourServices'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>BATS Consulting Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Guest/training'); ?>" class="nav-link" style="background-color: #C1272D; color:white;">
                                <i class="nav-icon fas fa-book"></i>
                                <p> Training </p>
                            </a>
                        </li>
                        <li class="nav-header text-black  pt-2">Special Fitur Client</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-warning">
                                <i class="fa fa-user nav-icon"></i>
                                <p>
                                    Client
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview rounded" style="display: none;">
                            
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>My Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-file-upload"></i>
                                        <p>My Files</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-book"></i>
                                        <p>General Information</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-id-badge"></i>
                                        <p>Service Contract</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-dollar-sign"></i>
                                        <p>Invoices</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-project-diagram"></i>
                                        <p>Job track</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p> Work Report </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">
                                        <i class="nav-icon far fa-envelope"></i>
                                        <p> Feedback </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-white">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper bg-white pl-5 pr-5 pt-3">
            <section class="content ml-5 mr-5">
            <div class="container-fluid  pt-3">
                    <div class="jumbotron bg-white">
                        <h1 class="display-4">Training</h1>
                        <p class="lead">Selamat datang di Training BATS</p>
                        <hr class="my-4">
                        <p class=" text-justify">Kami menyediakan berbagai macam materi 
                         <?php
                         $no = 1;
                        foreach ($data_category as $key) {
                           echo $key['content_training_category'];
                           if($no == count($data_category)-1){
                               echo " dan ";
                           } else if($no < count($data_category)-1){
                               echo ", ";
                           }
                           $no++;
                        }
                        ?>
                        baik berbentuk file powerpoint, pdf, serta video. Materi ini disusun berdasarkan standar sarjana dan magister dari universitas terkemuka di Indonesia, materi yang berbentuk powerpoint dan pdf berasal dari seminar dan pelatihan resmi dari berbagai lembaga profesional dan asosiasi profesional lalu kami kembangkan secara internal, serta materi berbentuk buku hanya disediakan dalam bentuk judul buku terbitan nasional dan internasional (hanya dapat diakses secara langsung di kantor ruang perpustakaan BATS Consulting).</p>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($data_category as $key) {
                            ?>
                            <div class="col-md-4">
                                <a class="card bg-info disabled p-3" target="blank">
                                    <div class="card-body">
                                        <h5 class="card-title" ><?= $key['content_training_category'] ?></h5>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="col">
                        </div>
                    </div>
                    <hr>
                    <p class="text-center p-4">Fitur yang akan segera dikembangkan</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    TRAINING BERTARGET
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>Setiap profesional diwajibkan untuk mengikuti dan menuntaskan training dengan jumlah SKP tertentu dengan waktu yang telah ditentukan (misal periode 3 bulanan,6 bulanan atau 1 tahun)guna meningkatkan kualitas dan produktivitas pekerjaan.</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    MINDSET TRANSFORMING
                                </h3>
                            </div>
                            <div class="card-body clearfix">
                                <p>1. Fix mindset to Growth mindset</p>
                                <p>2. PKPM to CIEL (Productivity, Kaizen, Professional, Management to Creative, Innovation, Entrepreneur, Leadership).</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    UJIAN BERJENJANG
                                </h3>
                            </div>
                            <div class="card-body clearfix">
                                <p>Ujian akan dilaksanakan pada periode tertentu untuk melihat perkembangan serta mendapatkan e-sertifikat dari materi yang bersifat tematik.</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
</body>

</html>