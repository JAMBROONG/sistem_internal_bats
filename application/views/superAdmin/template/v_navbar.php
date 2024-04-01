<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto"> 
        <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="mr-2 fas fa-user-circle mr-2"></i>
                <span class="text-dark">Hai <?= explode(" ",  $user['name'])[0]; ?>!</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="<?= base_url('SuperAdmin/profile') ?>" class="dropdown-item">
                    <i class="fas fa-user-circle mr-2 "></i> My profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('SuperAdmin/updatePasswordA') ?>" class="dropdown-item">
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
    <a href="<?php echo base_url('SuperAdmin/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
        <img src="<?php echo base_url(); ?>assets/upload/images/<?=$user['image']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <small class="text-white font-weight-light">Super Admin</small>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/dataProject'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-microchip"></i>
                        <p> Services </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/dataWorkflow'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p> Workflow </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/dataInformation'); ?>" class="nav-link">
                        <i class=" nav-icon fab fa-pied-piper-square"></i>
                        <p> Seminar </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/dataUser'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Users </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/websiteMe'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p> Website Database </p>
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
                    <ul class="nav nav-treeview rounded">
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataOrder'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p> Order
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataChatt'); ?>" class="nav-link">
                                <i class="nav-icon far fa-comments"></i>
                                <p> Chat
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/finances'); ?>" class="nav-link">
                                <i class="nav-icon  fa fa-file-invoice-dollar"></i>
                                <p>Finance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataCompany'); ?>" class="nav-link">
                                <i class="nav-icon far fa-building"></i>
                                <p> Company </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataRecommendation'); ?>" class="nav-link">
                                <i class=" nav-icon fa fa-record-vinyl"></i>
                                <p> Service Recommendation </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataFeedback'); ?>" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p> Feedback </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-user-clock nav-icon"></i>
                        <p>
                            Guest
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview rounded">
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/guestTHC'); ?>" class="nav-link">
                                <i class="nav-icon fas fa-book-medical"></i>
                                <p> Tax Health Check
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header text-black  pt-2">INTERNAL</li>
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-user-friends nav-icon"></i>
                        <p>
                            Employee
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview rounded">
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dataEmployee'); ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p> Data Employee </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/dailyReport'); ?>" class="nav-link" target="blank">
                                <i class="nav-icon fa fa-paper-plane"></i>
                                <p> Daily Report </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/detailSpecialTask'); ?>" class="nav-link" target="blank">
                                <i class="nav-icon fa fa-book-reader"></i>
                                <p> Special Task </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/training'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                <p> Training</p>
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
                    <ul class="nav nav-treeview rounded" >
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/taxUpdate'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-newspaper"></i>
                                <p> TAX Update </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/accountingUpdate'); ?>" class="nav-link">
                                <i class="nav-icon fab fa-airbnb"></i>
                                <p> Accounting Update</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('SuperAdmin/employeeScore'); ?>" class="nav-link">
                                <i class="nav-icon fa fa-star"></i>
                                <p> Employee Score </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('SuperAdmin/dataHistory'); ?>" class="nav-link">
                        <i class="nav-icon fa fa-history"></i>
                        <p> History </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
