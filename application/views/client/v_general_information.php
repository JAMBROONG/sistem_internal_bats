<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>General Information</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include'header.php'; ?>
</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include'navbar.php';
        ?>
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                <div class="container">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">General Information</li>
                            </ol>
                        </nav>
                    </div>
                            <div class="alert alert-dark" role="alert">
                                <strong>Select Service</strong>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-inverse rounded shadow">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-nowrap">No.</th>
                                            <th class="text-nowrap">Service</th>
                                            <th class="text-nowrap">PIC</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($dataOrder)) {?>
                                                <tr>
                                                    <td colspan="4">
                                                        <div class="container text-center mt-5 mb-5">
                                                            <h1>404 Service Not Found</h1>
                                                            <p class="lead">We're sorry, the service you are looking for could not be found.</p>
                                                            <!-- <a href="/" class="btn btn-primary">Go to Home</a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                            $no = 1;
                                            foreach ($dataOrder as $key) {
                                                ?>
                                                
                                            <tr>
                                                <td scope="row"><?= $no ?></td>
                                                <td><?= $key['service_name'] ?></td>
                                                <td class="text-nowrap"><?= $key['supervisor_name'] ?></td>
                                                <td class="text-nowrap">
                                                    <?php
                                                    if ($key['service_name'] == 'Monthly Accounting and Tax Compliance') {
                                                        ?>
                                                         <button  class="btn btn-sm btn-default d-flex align-items-center" data-toggle="modal" data-target="#modelId<?=$no?>">Select Month <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>

                                                         
                                                         <!-- Modal -->
                                                         <div class="modal fade" id="modelId<?=$no?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <form action="<?=base_url('Client/general_information')?>" method="get">
                                                                            <input type="hidden" value="<?=md5($key['id'])?>" name="detail" required class="form-control" id="">
                                                                            <input type="month" value="<?= date('Y-m') ?>" name="date" required class="form-control" id="">
                                                                            <button class="btn btn-sm mt-3 btn-default d-flex align-items-center">Detail <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <?php
                                                    } else{
                                                        ?>
                                                        
                                                    <button onclick="window.location='<?=base_url('Client/general_information?detail='.md5($key['id']))?>'" class="btn btn-sm btn-default d-flex align-items-center">Detail <img src="<?= base_url() ?>assets/icon/detail.png" class="ml-2" width="20px" alt=""> </button>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://bats-consulting.com/">Bats Consulting</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
            $('#nav_information').addClass('nav_select');
        });
    </script>
</body>

</html>