<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Report</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php' ?>
    <style>
    .file {
        visibility: hidden;
        position: absolute;
    }
    </style>
</head>
<body class="hold-transition bg-info sidebar-mini layout-boxed layout-fixed">
    <div class="wrapper">
        <?php include'top_nav.php'; ?>
            <aside class="main-sidebar bg-white elevation-2 layout-fixed">
                <a href="<?php echo base_url('Admin/profile'); ?>" class="brand-link d-flex align-items-center" style="background-color: #1A1A1A;">
                    <img src="<?php echo base_url(); ?>assets/upload/images/admin/<?=$user['image_user']?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
                    <small class="text-white font-weight-light">Admin</small>
                </a>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item rounded">
                                <a href="<?php echo base_url('Admin'); ?>" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p> Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataProject'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-microchip"></i>
                                    <p> Services </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataWorkflow'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-project-diagram"></i>
                                    <p> Workflow </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataInformation'); ?>" class="nav-link">
                                    <i class=" nav-icon fab fa-pied-piper-square"></i>
                                    <p> Seminar </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataUser'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p> Users </p>
                                </a>
                            </li>
                            <li class="nav-header text-black  pt-2">EXTERNAL</li>
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link ">
                                    <i class="fa fa-user nav-icon"></i>
                                    <p>
                                        Client
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataOrder'); ?>" class="nav-link bg-info">
                                            <i class="nav-icon fas fa-book"></i>
                                            <p> Order
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataChatt'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-comments"></i>
                                            <p> Chat
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon fa fa-file-invoice-dollar"></i>
                                            <p> Finance
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataCompany'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-building"></i>
                                            <p> Company </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataRecommendation'); ?>" class="nav-link">
                                            <i class=" nav-icon fa fa-record-vinyl"></i>
                                            <p> Service Recommendation </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataFeedback'); ?>" class="nav-link">
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
                            <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                
                                <li class="nav-item">
                                    <a href="<?php echo base_url('Admin/guestTHC'); ?>" class="nav-link">
                                        <i class="nav-icon fas fa-book-medical"></i>
                                        <p> Tax Health Check
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-header text-black  pt-2">INTERNAL</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-user-friends nav-icon"></i>
                                    <p>
                                        Employee
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview rounded" style="display: none; background-color:#E9ECEF;">
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dataEmployee'); ?>" class="nav-link">
                                            <i class="nav-icon far fa-user"></i>
                                            <p> Data Employee </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/dailyReport'); ?>" class="nav-link">
                                            <i class="nav-icon fa fa-calendar-check"></i>
                                            <p> Daily Report </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/specialTask'); ?>" target="blank" class="nav-link">
                                            <i class="nav-icon fa fa-book-reader"></i>
                                            <p> Special Task </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo base_url('Admin/training'); ?>" class="nav-link">
                                            <i class="nav-icon fa fa-chalkboard-teacher"></i>
                                            <p> Training</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-header text-black  pt-2">OTHER</li>
                            <?php include 'navbar_comingsoon.php'; ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Admin/dataHistory'); ?>" class="nav-link">
                                    <i class="nav-icon fa fa-history"></i>
                                    <p> History </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        <div class="content-wrapper bg-white">
            <section class="content">
            <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('Admin/dataOrder')?>">Order</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default shadow-none"> <?php
                            if (empty($dataReport)) {
                            echo '
                            <div class="card-header bg-primary pt-3">

                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 class=" text-primary">Sorry, your jobtrack is not yet available <i class="fa fa-smile-beam text-primary"></i></h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                            ';
                            return false;
                            }
                            ?> <div class="card-header pb-1">
                                    <div class="d-flex justify-content-between">
                                        <div class=""></div>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus text-dark"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times text-dark"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="<?= site_url('Admin/processUpdateReport')?>" method="post" enctype="multipart/form-data">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-md-4 card">
                                                <div class="card-body">
                                                    <h5 class="text-center">Form Update</h5>   
                                                    <div class="form-group">
                                                        <input type="hidden" name="report_id" value="<?=$dataReport['id']?>">
                                                        <label for="">Sub Step</label>
                                                        <textarea name="" class="form-control border-0" id="" cols="30" rows="4" readonly><?=$dataReport['subStep']?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Message</label>
                                                        <textarea name="message" class="form-control " id="" cols="30" rows="4" placeholder="<?=$dataReport['message']?>"><?=$dataReport['message']?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Report</label>
                                                        <input type="file" name="image" class="file">
                                                        <div class="input-group my-3">
                                                            <input required type="text" class="form-control border-0" disabled placeholder="Upload File" id="file">
                                                            <div class="input-group-append">
                                                                <button type="button" id="pilih_gambar" class="browse btn btn-dark border-0">Select File</button>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-block btn-success"><i class="fa fa-upload mr-2"></i> update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 card">
                                                <div class="card-body">
                                                    <h5 class="text-center">Data Report</h5>   
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Employee</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['employee_name']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Step</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['step']?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Service</label>
                                                                <input type="text" readonly class="form-control" value="<?=$dataReport['service_name']?>">
                                                            </div>
                                                            
                                                            <a href="<?= base_url('Admin/progressOrder/'.$dataReport['order_id']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-arrow-left mr-2"></i> back</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Files</label>
                                                                <ul class="list-unstyled">
                                                                    <?php
                                                                    $type = pathinfo($dataReport['report'], PATHINFO_EXTENSION);
                                                                    $url = base_url().'assets/upload/report/'.$dataReport['report'];
                                                                    switch ($type) {
                                                                        case "pdf":
                                                                            echo '<a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-file-pdf"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        case 'jpg':
                                                                        case 'png':
                                                                        case 'jpeg':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-image "></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                            
                                                                        case 'docx':
                                                                        case 'odt':
                                                                        case 'doc':
                                                                            echo'
                                                                            <a href="'.$url.'" class="btn-link text-secondary" download><i class="far fa-fw fa-file-word"></i>'.$dataReport['report'].'</a>';
                                                                            break;
                                                                        
                                                                        default:
                                                                            echo'';
                                                                      }
                                                                    ?>
                                                                    <li>
                                                                </ul>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Latest Update</label>
                                                                <input type="text" readonly class="form-control" value="<?= date("F j, Y, g:i a", strtotime( $dataReport['update_date'])); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-4 card">
                                                <div class="card-body">
                                                    <form action="<?=site_url('Admin/updateDateReview')?>" method="post">
                                                        <label for="">Ending date Review this Report</label>
                                                        <input type="hidden" name="review_id" value="<?=$dataReview['id']?>">
                                                        <input type="hidden" name="report_id" value="<?=$dataReport['id']?>">
                                                        <input type="date" name="ending_date" class=" form-control" value="<?=date("Y-m-d", strtotime( $dataReview['ending_date']))?>" id="">
                                                        <?php
                                                            $todayDateObj = new \DateTime(date("Y-m-d"));
                                                            $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($dataReview['ending_date'])));
                                                            $interval = $todayDateObj->diff($foundedDateObj);
                                                            $interval = $interval->format('%r%a') . "\n\n";
                                                            if ($interval >= 0 ) {
                                                                ?>
                                                                <p class="text-success">(<?=$interval?>more days)</p>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <p class="text-danger">(<?=$interval?>days ago)</p>
                                                                <?php
                                                            }
                                                            ?>
                                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-upload mr-2"></i> update</button>
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php include 'footer.php' ?>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
        });
        $(document).on("click", "#pilih_gambar", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            var reader = new FileReader();
            reader.onload = function(e) {
                // document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</body>

</html>