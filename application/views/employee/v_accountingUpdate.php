<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tax Update</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" /> 
<?php 
include 'header.php';
?>
</head>  

<body class="hold-transition bg-info sidebar-mini    layout-fixed">
    <div class="wrapper shadow bg-white">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand border-0" style="background-color: #000103;">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar bg-white elevation-1">
            <a class="brand-link " style="background-color: #000103;">
                <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="AdminLTE Logo" class="brand-image rounded" style="opacity: .8">
                <span class="brand-text text-white font-weight-light"><?= $user['employee_name']; ?></span>
            </a>
            <div class="sidebar">
                <div class="mt-1 pb-1 mb-1 d-flex">
                </div>
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar text-black" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                            <a href="<?php echo base_url('Employee/'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>My Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/profile'); ?>" class="nav-link ">
                                <i class="nav-icon fa fa-user"></i>
                                <p>My Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/order'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-cogs"></i>
                                <p>My Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/report'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>My Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/review'); ?>" class="nav-link">
                            <i class="nav-icon fa fa-comment-medical"></i>
                                <p>My Review</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/feedback'); ?>" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>My Feedback</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/specialTask'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-book-reader"></i>
                                <p>My Special Task </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Employee/history'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-history"></i>
                                <p>My History </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-warning">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Coming Soon
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Employee/training'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                        <p>My Training</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Employee/taxUpdate'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-newspaper"></i>
                                        <p> TAX Update </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Employee/accountingUpdate'); ?>" class="nav-link text-white" style="background-color: #D82724;">
                                        <i class="nav-icon fab fa-airbnb"></i>
                                        <p> Accounting Update</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Employee/employeeScore'); ?>" class="nav-link">
                                        <i class="nav-icon fa fa-star"></i>
                                        <p> Employee Score </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('Logout'); ?>" class="nav-link text-danger">
                                <i class="nav-icon fa fa-sign-out-alt"></i>
                                <p> Logout </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
         <div class="content-wrapper bg-white" >
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0">Accounting Update</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">
                                    <a href="#">Home/Accounting Update</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                      <img src="https://mudanews.com/wp-content/uploads/2020/12/coming-soon.png" class="rounded" style="background-size: cover; background-position:center center;" alt="">
                      
                    </div>
                </div>
            </section>
        </div> 
        <?php include 'footer.php';?>
</body>

</html>