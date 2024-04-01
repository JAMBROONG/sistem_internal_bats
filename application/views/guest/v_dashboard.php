<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?>
    <style>
        
        .text-justify2{
                text-align: center;
            }
        @media (max-width: 768px) {
            .text-hide2{
                display: none;
            }
            .text-justify2{
                text-align: justify;
            }
        }
    </style>
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

        <aside class="main-sidebar elevation-1 position-fixed " style="background-color: #2F2F2F;">
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
                            <a href="<?php echo base_url('Guest/'); ?>" class="nav-link" style="background-color: #C1272D; color:white;">
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
                            <a href="<?php echo base_url('Guest/training'); ?>" class="nav-link" style="color:white;">
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
        <div class="content-wrapper bg-white pr-lg-5 pl-lg-5 pt-3">
            <section class="content ml-lg-5 mr-lg-5">
                <div class="container-fluid">
                    <h3 class="text-center pt-4">Tax Health Check</h3>
                    <p class=" pb-4 text-justify2">
                    A tax health check-up is a review of the tax affairs of a business entity, which is intended to highlight potential weaknesses or risks arising from errors or omissions in the business records and accounting systems, as well as identifying potential tax liabilities. Conducting such health checks on a periodic basis will help in managing tax risks, ensure appropriate compliance, result in better preparedness for litigation matters and strengthen tax positions.
                 </p>
                 <p class="text-justify2">BATS Consulting developed artificial intelligence (AI) for tax case resolution approaches. The database comes from all cases that have been handled and comes from tax court decisions.</p>
                    <div class="card shadow-none">
                        <div class="card-body p-3 table-responsive">
                            <table class="table table-light table-striped table-bordered">
                                <thead>
                                    <tr   style="background-color: #2F2F2F; color:white;">
                                        <td class="text-bold text-center">No.</td>
                                        <td class="text-bold text-center">Description</td>
                                        <td class="text-bold text-center">Fast Check Up</td>
                                        <td class="text-bold text-center">Full Check Up</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1. </td>
                                        <td>Diagnose All Taxes</td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2. </td>
                                        <td>Find the Mistakes and Tax Risk</td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3. </td>
                                        <td>Mapping Compliance Risk Management</td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4. </td>
                                        <td>Detail Supporting Analysis</td>
                                        <td class="text-center"><i class="fa fa-times-circle text-danger"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">5. </td>
                                        <td>Recommendation to reduce Tax Risk and Tax Cost</td>
                                        <td class="text-center"><i class="fa fa-times-circle text-danger"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">6. </td>
                                        <td>Giving the best Tax Planning for future transaction</td>
                                        <td class="text-center"><i class="fa fa-times-circle text-danger"></i></td>
                                        <td class="text-center"><i class="fa fa-check text-success"></i></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center">7. </td>
                                        <td>Price</td>
                                        <td class="text-center">Free</td>
                                        <td class="text-center">Quotation</td>
                                    </tr>
                                </tfoot>
                            </table>
                                       
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class=" text-center p-3 text-hide2">1</h5>
                            <div class="card shadow-none">
                                <div class="card-header  justify-content-center d-flex"   style="background-color: #2F2F2F;">
                                    <a href="#nda" class="card-title text-center text-white">
                                    Fulfillment Non-Disclosure Agreement (NDA)
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">1. Download Non-Disclosure Agreement (NDA)</p>
                                    <p class="card-text">2. Director's Signature (Approval)</p>
                                    <p class="card-text">3. Upload Approval Non-Disclosure Agreement (NDA)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class=" text-center p-3 text-hide2">2</h5>
                            <div class="card shadow-none">
                                <div class="card-header  justify-content-center d-flex"   style="background-color: #2F2F2F;">
                                    <a href="#pertanyaan" class="card-title text-white">
                                    Question
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">1. Fill in Multiple Choice Question</p>
                                    <p class="card-text">2. Description</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5 class=" text-center p-3 text-hide2">3</h5>
                            <div class="card shadow-none">
                                <div class="card-header  justify-content-center d-flex"   style="background-color: #2F2F2F;">
                                    <a href="#thc" class="card-title text-white">
                                        Fast - Tax Health Check
</a>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">1. Upload data</p>
                                    <p class="card-text">2. Verification Data</p>
                                    <p class="card-text">3. Fast Tax Health Check Process</p>
                                    <p class="card-text">4. Reviewed by Artificial Intelligence (AI) and Tax Expertise</p>
                                    <p class="card-text">5. Report and Finish</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center">your current step</p>
                    <hr>
                    <?php
                        if ($thc_nda) {
                            include 'components/desc_nda.php';
                            if (empty($thc_guest_answer)) {
                                include 'components/quis.php';
                                include 'components/thc_before.php';
                            } else{
                                include 'components/desc_quis.php';
                                if ($thc_guest) {
                                    include 'components/desc_thc.php';
                                } else{
                                    include 'components/thc.php';
                                }
                            }
                        }
                        else{
                            include 'components/upload_nda.php';
                        }
                    ?>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
</body>

</html>