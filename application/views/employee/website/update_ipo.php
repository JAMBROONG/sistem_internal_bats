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
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />    
    <?php
    $this->load->view('employee/header.php');
    ?>
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper bg-white">
    <?php
    $this->load->view('employee/component/v_navbar.php');
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
                    <?php
                    if ($user['position'] == "Investment") {?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('Employee/websiteMe/news') ?>" id="news" class="card bg-dark">
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
                        <div class="col-lg-6 col-md-6" data-aos="fade-up">
                            <a href="<?= base_url('Employee/websiteMe/ipo') ?>" id="ipo" class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <i class="fa fa-2x fa-newspaper"></i>
                                        </div>
                                        <div class=" d-flex align-items-center flex-column">
                                            <h5 class="card-title"></h5>
                                            <p class="card-text">IPO</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="text-center p-4" data-aos="fade-up">
                    <small>Update IPO Company</small>
                    <h4><?= $ipo['name'] ?></h4>
                    </div>
                    <form action="<?= base_url('Employee/updtIPO') ?>" id="form1" method="post" class="shadow p-5 mb-5 rounded"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-right">
                                        <label for="my-input"><small class="text-danger">*</small> Nama Perusahaan</label>
                                        <input type="hidden" name="id" value="<?= $ipo['id'] ?>">
                                        <input id="name" class="form-control" type="text" placeholder="PT BATS International Group" required name="name" value="<?= $ipo['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-left">
                                        <label for="my-input"><small class="text-danger">*</small> Logo Perusahaan</label>
                                        <input id="image" type="file" class="form-control"  name="image"  accept="image/png,image/jpg,image/jpeg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-right">
                                        <label for="my-input"><small class="text-danger">*</small> Sektor</label>
                                        <input id="sector" class="form-control" type="text" placeholder="Financials" required name="sector" value="<?= $ipo['sector'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-left">
                                        <label for="my-input"><small class="text-danger">*</small> PDF</label>
                                        <input id="pdf" type="file" class="form-control" accept="application/pdf" name="pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-right">
                                        <label for="my-input"><small class="text-danger">*</small> Periode Book Building</label>
                                        <input id="periode_book_building" class="form-control" type="text" placeholder="21 Nov 2021 - 12 Des 2022" required name="periode_book_building" value="<?= $ipo['periode_book_building'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-left">
                                        <label for="my-input"><small class="text-danger">*</small> Sub Sektor</label>
                                        <input id="sub_sector" class="form-control"   type="text" placeholder="Auto Part and Equipment" required name="sub_sector"  value="<?= $ipo['sub_sector'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-right">
                                        <label for="my-input"><small class="text-danger">*</small> Saham Ditawarkan</label>
                                        <input id="saham_ditawarkan" class="form-control" type="text" placeholder="9.212.32123 Lot" required name="saham_ditawarkan" value="<?= $ipo['saham_ditawarkan'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-left">
                                        <label for="my-input"><small class="text-danger">*</small> Rentang Harga Pokok Book Building</label>
                                        <input id="rentang_harga_pokok_book_building" class="form-control"   type="text" placeholder="Rp. 350 - Rp. 450" required name="rentang_harga_pokok_book_building"  value="<?= $ipo['rentang_harga_pokok_book_building'] ?>">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" data-aos="fade-right">
                                        <label for="my-input"><small class="text-danger">*</small> Create Date</label>
                                        <input id="my-input" class="form-control"   type="text" readonly value="<?= date('Y-m-d H:i:s a') ?>" required name="update_date" value="<?= $ipo['update_date'] ?>">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm" onclick="return myFunction(this)">Unggah <i class="fa fa-save ml-2" type="button"></i></button>
                        </form>
                </div>
            </section>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        <?php 
        $this->load->view('employee/footer.php');
        ?>
        <script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>
        
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    
    function myFunction(x){
        if ( document.getElementById('periode_book_building').value == "" || document.getElementById('name').value == "" || document.getElementById('sector').value == "" || document.getElementById('sub_sector').value == "" || document.getElementById('periode_book_building').value == "" || document.getElementById('rentang_harga_pokok_book_building').value == "" || document.getElementById('saham_ditawarkan').value == "" || document.getElementById('update_date').value == "") {
        alert('Harap isi semua data!');
        } else{
            x.className = "btn btn-sm btn-warning";
            x.innerHTML = 'uploading... <div class="fa fa-spinner fa-spin"></div>';
            x.disabled = true;
            $('#form1').submit();
        }
    }
    $('.select2').select2();

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
            if (update == "denied") {
                Swal.fire({
                    position: 'center-center',
                    icon: 'error',
                    text:"<?= $this->session->userdata("text_err")?>",
                    title: "<?= $this->session->userdata("message")?>",
                    showConfirmButton: false,
                    timer: 1500
                });
                var printah = "<?= $_SESSION['update'] = "no" ?>";
            }
            document.getElementById('ipo').className = "card bg-light";
        </script>
</body>

</html>