<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="mr-2 fa fa-angle-down"></i>
        <span class="text-dark"><?= $user['employee_name'] ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <a href="<?= base_url('Employee/profile') ?>" class="dropdown-item">
          <i class="fas fa-user-circle mr-2 "></i> My profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('Employee/updatePassword') ?>" class="dropdown-item">
          <i class="fas fa-key mr-2"></i> Change password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('Logout') ?>" class="dropdown-item text-danger">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<aside class="main-sidebar bg-white elevation-2 layout-fixed">
  <a href="<?php echo base_url('Employee/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
    <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$user['image']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
    <small class="text-white font-weight-light">Employee</small>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?php echo base_url('Employee'); ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p> Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Employee/dataProject/'. md5('ko')) ?>" class="nav-link">
            <i class="nav-icon fas fa-microchip"></i>
            <p> Services </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Employee/dataWorkflow/'. md5('kow')); ?>" class="nav-link">
            <i class="nav-icon fas fa-project-diagram"></i>
            <p> Workflow </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Employee/dataInformation/'. md5('kddo')); ?>" class="nav-link">
            <i class=" nav-icon fab fa-pied-piper-square"></i>
            <p> Seminar </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('Employee/websiteMe/news'); ?>" class="nav-link">
            <i class=" nav-icon fa fa-database"></i>
            <p> Article Contributor </p>
          </a>
        </li>
        <li class="nav-header text-black  pt-2">EXTERNAL</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="fa fa-user nav-icon"></i>
            <p>
              Client
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview rounded" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/order/'. md5('cumaiseng')); ?>" class="nav-link">
                <i class="nav-icon fa fa-cogs"></i>
                <p>My Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/report/'. md5('paanci')); ?>" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>Report to Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/review/'. md5('review')) ?>" class="nav-link">
                <i class="nav-icon fa fa-comment-medical"></i>
                <p>Review to Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/feedback'); ?>" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>Feedback from Client</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header text-black  pt-2">INTERNAL</li>
        <li class="nav-item">
          <a href="#" class="nav-link ">
            <i class="fa fa-user-friends nav-icon"></i>
            <p>
              Me
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview rounded" style="display: none;">
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/dailyReport/'. md5('initipuan'));?>" target="blank" class="nav-link">
                <i class="nav-icon far fa-calendar-check"></i>
                <p> Daily Report </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/specialTask/'. md5('initipuandd')); ?>" target="blank" class="nav-link">
                <i class="nav-icon fa fa-book-reader"></i>
                <p> Special Task </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('Employee/training/'. md5('initipuandd')) ?>" class="nav-link">
                <i class="nav-icon fa fa-chalkboard-teacher"></i>
                <p> Training </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header text-black  pt-2">OTHER</li>
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
            <a href="#>" class="nav-link disabled" >
                <i style="color: #eeeef0;" class="nav-icon fa fa-newspaper"></i>
                <p style="color: #eeeef0;"> TAX Update </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link disabled">
                <i style="color: #eeeef0;" class="nav-icon fab fa-airbnb"></i>
                <p style="color: #eeeef0;"> Accounting Update</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link disabled">
                <i style="color: #eeeef0;" class="nav-icon fa fa-star"></i>
                <p style="color: #eeeef0;"> Employee Score </p>
            </a>
        </li>
    </ul>
</li>
        <li class="nav-item">
          <a href="<?php echo base_url('Employee/history'); ?>" class="nav-link">
            <i class="nav-icon fa fa-history"></i>
            <p> History </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>