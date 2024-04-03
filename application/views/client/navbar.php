<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <div class="user-panel d-flex align-items-center">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/upload/images/<?= $user['image'] ?>" class=" elevation-1" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-dark"><?= $user['company'] ?></a>
            </div>
        </div>
    </ul>
</nav>

<aside class="main-sidebar elevation-1" style="background-color: #2F2F2F;">
    <div class="sidebar">
        <div class="user-panel d-flex align-items-center mt-3">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/upload/images/client/<?= $user['image_user'] ?>" class=" elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo base_url('Client/profile'); ?>" class="d-block text-wrap text-white"><?= $user['name'] ?></a>
            </div>
        </div>
        <hr class="m-0 mt-2 border-white">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/'); ?>" id="nav_dashboard" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/whatsNew'); ?>" id="nav_new" class="nav-link text-white">
                        <i class="nav-icon fa fa-newspaper "></i>
                        <p>What's New?</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/financial_dashboard'); ?>" id="nav_financial_dashboard" class="nav-link text-white">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Financial Dashboard</p>
                    </a>
                </li>
                <?php
				if ($user['typeBusiness'] == "Hospitality") {
					?><li class="nav-item">
                    <a href="<?php echo base_url('Client/health_analytic'); ?>" id="nav_health_analytic" class="nav-link text-white">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>HealthView Analytics</p>
                        <span class="badge badge-warning ml-1">New</span>
                    </a>
                </li>
                <?php
				}
				?>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/for_me'); ?>" id="nav_for_me" class="nav-link text-white">
                        <i class="fa fa-hand-holding-heart nav-icon"></i>
                        <p>For Me</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/profile'); ?>" id="nav_profile" class="nav-link text-white">
                        <i class="nav-icon fas fa-user"></i>
                        <p>My Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/file'); ?>" id="nav_file" class="nav-link text-white">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>My Files</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/ourServices'); ?>" id="nav_service" class="nav-link text-white">
                        <i class="nav-icon fa fa-cogs"></i>
                        <p>BATS Consulting Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/general_information'); ?>" id="nav_information" class="nav-link text-white">
                        <i class="nav-icon fas fa-book"></i>
                        <p>General Information</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/contract'); ?>" id="nav_service_contract" class="nav-link text-white">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>Service Contract</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/invoice'); ?>" id="nav_invoice" class="nav-link text-white">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>Invoices</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/jobTrack_home'); ?>" id="nav_jobtrack" class="nav-link text-white">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Job track</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/report_home'); ?>" id="nav_report" class="nav-link text-white">
                        <i class="nav-icon fas fa-edit"></i>
                        <p> Work Report </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Client/feedback_home'); ?>" id="nav_feedback" class="nav-link text-white">
                        <i class="nav-icon far fa-envelope"></i>
                        <p> Feedback </p>
                    </a>
                </li>
                <?php include 'navbar_new.php'; ?>
                <li class="nav-item">
                    <a href="<?php echo base_url('Logout'); ?>" id="nav_logout" class="nav-link text-white">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p> Logout </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
