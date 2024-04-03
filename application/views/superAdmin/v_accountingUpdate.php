<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super Admin Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> <?php include 'header.php';
  ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper bg-white">
    <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Accounting update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card">
                        <img src="https://mudanews.com/wp-content/uploads/2020/12/coming-soon.png" class="rounded" style="background-size: cover; background-position:center center;" alt="">
                    </div>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
</body>

</html>