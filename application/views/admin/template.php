<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
  <?php include 'header.php';?>
</head>
<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-light elevation-1">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/image/avatar/<?=$user['photo']?>.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $user['name']; ?></span>
    </a>

    <div class="sidebar">
      <div class="mt-1 pb-1 mb-1 d-flex">
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item bg-danger rounded">
            <a href="<?php echo base_url('Admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataEmployee'); ?>" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Data Employee
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataProject'); ?>" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Data Project
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataCompany'); ?>" class="nav-link">
              <i class="nav-icon far fa-building"></i>
              <p>
                Data Company
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                Data Workflow
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Data Feedback
              </p>
            </a>
          </li>
        </ul>
      </nav>
     </div>
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            <a href="<?php echo base_url('Admin/'); ?>">Home/</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            
        </div>
    </section>
</div>
  
<?php include 'footer.php';?>
</body>
</html>
