<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Management</title>
    
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />    
    <?php
    $this->load->view('superAdmin/header.php');
    ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper bg-white">
    <?php
    $this->load->view('superAdmin/template/v_navbar.php');
    ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3" data-aos="fade-up">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Website Database</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/country') ?>" id="country" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-globe"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">Country</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/global_tax_rules') ?>" id="gtr" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-bookmark"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">Global Tax Rules</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/tax_treaty') ?>" id="tt" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-book"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">Tax Treaty</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/history_company') ?>" id="hc" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-history"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">History Company</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/payroll') ?>" id="payroll" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-calculator"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">Payroll</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('SuperAdmin/websiteMe/news') ?>" id="news" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-newspaper"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">News</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr data-aos="fade-up">
                    <?php
                    switch ($category) {
                        case 'country':
                            include 'country.php';
                            break;
                        
                        case 'global_tax_rules':
                            include 'global_tax_rules.php';
                            break;
                                
                        case 'tax_treaty':
                            include 'tax_treaty.php';
                            break;
                        case 'detailTaxTreaty':
                            include 'd_tax_treaty.php';
                            break;
                        case 'history_company':
                            include 'history_company.php';
                            break;
                        case 'payroll':
                            include 'payroll.php';
                            break;
                        case 'news':
                            include 'news.php';
                            break;
                        default:
                            break;
                    }
                    ?>
                </div>
            </section>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        <?php 
        $this->load->view('superAdmin/footer.php');
        ?>
        <!-- DataTables  & Plugins -->      
        <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        
        <!-- <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
        <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>
        
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
    var update = "<?= $this->session->userdata('update')?>";
            if (update == "success") {
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: "<?= $this->session->userdata("message")?>",
                    showConfirmButton: false,
                    timer: 1500
                });
                var printah = "<?= $_SESSION['update'] = "no" ?>";
            }
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "paging" : false,
                    "ordering" : false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            
    $(document).on("click", "#pilih_gambar", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").html(fileName);
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    });
    $('.alert_notif').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete this data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            function getImage(id) {
                $(document).on("click", "#pilih_gambar"+id, function() {
                    var file = $(this).parents().find(".file"+id);
                    file.trigger("click");
                });
                $('input[type="file"]').change(function(e) {
                    var fileName = e.target.files[0].name;
                    $("#file"+id).html(fileName);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("preview"+id).src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            }
        </script>
</body>

</html>