<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Training</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <?php include 'header.php';
  ?>
    <style>
        .select2-container--default .select2-results__option {
            color: black;
        }
    </style>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow bg-white">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
    <section class="content">
        <div class="container pt-3">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Training</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="card card-info shadow-none">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between mb-1 align-items-end">
                        <div>
                            <label for="">Status: </label>
                            <i class="fa fa-dot-circle text-warning ml-2"></i>
                            dalam proses
                            <i class="fa fa-dot-circle text-danger"></i>
                            ditolak
                            <i class="fa fa-dot-circle text-success ml-2"></i>
                            selesai
                        </div>
                    </div>
                    <table id="tabel_planTraining" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-sm p-1">#</th>
                                <th class="text-sm p-1">Nama</th>
                                <th class="text-sm p-1">Materi</th>
                                <th class="text-sm p-1">Deskripsi</th>
                                <th class="text-sm p-1">Rencana Mulai</th>
                                <th class="text-sm p-1">Rencana Selesai</th>
                                <th class="text-sm p-1">Presentasi</th>
                                <th class="text-sm p-1">Nilai</th>
                                <th class="text-sm p-1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                    $no = 1;
                                    $value = 0;
                                    $reject = 0;
                                    $process = 0;
                                    $receive = 0;
                                    foreach ($data_trainingE as $key) {
                                        switch ($key['status']) {
                                            case 'rejected':
                                                $reject++;
                                                $bg = "#f6b3b9";
                                                break;
                                            case 'received':
                                                $receive++;
                                                $bg = "#d0fbd6";
                                                break;
                                            default:
                                                $bg = "";
                                                $process++;
                                                break;
                                        }
                                        ?>
                            <tr style="background-color: <?= $bg ?>;">
                                <td class="text-sm text-center"><?= $no ?></td>
                                <td class="text-sm p-1"><?= $key['employee_name'] ?></td>
                                <td class="text-sm p-1"><?php 
                                        switch ($key['status']) {
                                            case 'process':
                                                echo '(<i class="fa fa-dot-circle text-warning"></i>) ';
                                                break;
                                            case 'received':
                                                echo '(<i class="fa fa-dot-circle text-success"></i>) ';
                                                break;
                                            case 'rejected':
                                                echo '(<i class="fa fa-dot-circle text-danger"></i>) ';
                                                break;
                                        }
                                        echo $key['content_title'] ?>
                                </td>
                                <td class="text-sm p-1">
                                    <?php
                                            if (str_replace(array("\r","\n"," ","&nbsp;"), "", $key['desc'] ) == "") {
                                                echo '<small class="text-muted">tidak tersedia</small>';
                                            } else{
                                                echo $key['desc'];
                                            }
                                            ?>
                                </td>
                                <td class="text-sm p-1">
                                    <?php 
                                            $todayDateObj = new \DateTime(date('Y-m-d'));
                                            $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($key['plan_start'])));
                                            $interval = $todayDateObj->diff($foundedDateObj);
                                            $interval = $interval->format('%r%a') . "\n\n";
                                            echo date("F j, Y", strtotime( $key['plan_start'] ));
                                            if ($interval > 0 ) {
                                                ?>
                                    <br><small class="text-success">(<?=$interval?>hari lagi)</small>
                                    <?php
                                            }
                                        else{
                                            ?>
                                    <br><small class="text-danger">(<?=$interval?>hari yang lalu)</small>
                                    <?php
                                        }
                                            ?>
                                </td>
                                <td class="text-sm p-1"><?php 
                                            $todayDateObj = new \DateTime(date('Y-m-d'));
                                            $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($key['plan_finish'])));
                                            $interval = $todayDateObj->diff($foundedDateObj);
                                            $interval = $interval->format('%r%a') . "\n\n";
                                            echo date("F j, Y", strtotime( $key['plan_finish'] ));
                                            if ($interval > 0 ) {
                                                ?>
                                    <br><small class="text-success">(<?=$interval?>hari lagi)</small>
                                    <?php
                                            }
                                        else{
                                            ?>
                                    <br><small class="text-danger">(<?=$interval?>hari yang lalu)</small>
                                    <?php
                                        }
                                            ?>
                                </td>
                                <td class="text-sm p-1">
                                    <?php if ($key['presentation_date'] == null) {
                                            echo '<small class="text-muted">belum tersedia</small>';
                                        } else{
                                                    echo date("F j, Y", strtotime( $key['presentation_date'] ));
                                            if ($key['status'] == "process") {
                                                    $todayDateObj = new \DateTime(date('Y-m-d'));
                                                    $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($key['presentation_date'])));
                                                    $interval = $todayDateObj->diff($foundedDateObj);
                                                    $interval = $interval->format('%r%a') . "\n\n";
                                                    
                                                    if ($interval > 0 ) {
                                                        ?>
                                    <br><small class="text-success">(<?=$interval?>hari lagi)</small>
                                    <?php
                                                    }
                                                else{
                                                    ?>
                                    <br><small class="text-danger">(<?=$interval?>hari yang lalu)</small>
                                    <?php
                                                }
                                                if ($key['check'] == "yes") {
                                                    echo '<small class="text-primary">disetujui</small>';
                                                } else{?>
                                    <a href="<?= base_url('SuperAdmin/updtTrainingP/'.$key['id']) ?>" class="d-flex align-items-center justify-content-center alert_setuju bg-orange"><i class="fa fa-check-circle mr-1"></i> setujui</a>
                                    <?php
                                                }
                                            }
                                        } ?>
                                </td>
                                <td class="text-sm p-1">
                                    <?php
                                            if ($key['status'] == "received" && $key['value'] == 0) {?>
                                    <a type="button" class="btn btn-sm d-flex align-items-center btn-default" data-toggle="modal" data-target="#addVal<?= $key['id'] ?>"><i class="fa fa-pen mr-1"></i>set</a>
                                    <div id="addVal<?= $key['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <label for="">Beri nilai untuk:</label>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nama: 
                                                            <?= $key['employee_name'] ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            Materi: 
                                                            <?= $key['content_title'] ?>
                                                        </div>
                                                    </div>
                                                    <form action="<?= base_url('SuperAdmin/addValTraining') ?>" class="form-class" method="post">
                                                        <input  id="hm" class="form-control" name="value"  onkeypress="return onlyNumberKey(event)"  placeholder="1-100" type="text" size="4" maxlength="3" required>
                                                        <input type="hidden" name="id" value="<?= $key['id'] ?>" >
                                                        <small class="warn text-danger">nilai harus 1 - 100</small> <br>
                                                        <textarea name="desc_val" class="summernote" id="" cols="30" rows="10" required></textarea>
                                                        <button class="btn btn-sm btn-success btn-simpan" type="submit"><i class="fa fa-save mr-2"></i> simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                            } 
                                            if($key['value'] != 0){
                                                echo '<small class="text-bold">'.$key['value'].'</small>';
                                                ?>
                                                <a type="button" class="btn btn-sm"  data-toggle="modal" data-target="#comment<?= $key['id'] ?>"><i class="fa text-success fa-comment"></i></a>
                                                <div id="comment<?= $key['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p><?php
                                                                if ( $key['desc_val'] == "") {
                                                                    echo '<p class="text-center">not yet</p>';
                                                                } else{
                                                                    echo $key['desc_val'];
                                                                }
                                                                ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            else{
                                                echo '<small class="text-muted">belum tersedia</small>';
                                            }
                                            ?>
                                </td>
                                <td class="text-sm p-1">
                                    <a href="<?= base_url('SuperAdmin/delEmployeeT/'.$key['id']) ?>" class="btn btn-default btn-sm alert_notif m-1"><i class="fa fa-trash text-danger"></i></a>
                                    <?php
                                        if ($key['status'] == "process" && $key['presentation_date'] != null && $key['check'] == "yes") {
                                            ?>
                                    <a href="<?= base_url('SuperAdmin/updtStatusET/no/'.$key['id']) ?>" class="btn btn-default btn-sm m-1 alert_tolak"><i class="fa fa-times text-danger mr-2"></i>tolak</a>
                                    <a href="<?= base_url('SuperAdmin/updtStatusET/yes/'.$key['id']) ?>" class="btn btn-default btn-sm m-1 alert_terima"><i class="fa fa-check text-success mr-2"></i>terima</a>
                                    <?php
                                        }
                                        ?>
                                </td>

                            </tr>
                            <?php
                                        $no++;
                                        $value = $value + $key['value'];
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php 
            include 'components/crud-training.php';
            ?>
        </div>
    </section>
</div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
        <?php include 'footer.php';?>

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
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>

        <script>
             var input = "<?= $this->session->userdata('delete')?>";
             var update = "<?= $this->session->userdata('update')?>";
            if (input == "deleted") {
                Swal.fire(
                    'Deleted!',
                    '<?= $this->session->userdata('deleted')?>',
                    'success'
                );
                var printah = "<?= $_SESSION['delete'] = "no" ?>";
            }
            if (update == "success") {
                Swal.fire(
                    'Updated!',
                    '<?= $this->session->userdata('message')?>',
                    'success'
                );
                var printah = "<?= $_SESSION['update'] = "no" ?>";
            }
            $(function() {
                $('.select2').select2()
            });
            $(function() {
                $("#tabel_materi").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            $(function() {
                $("#tabel_category").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
            $(function() {
                $("#tabel_level").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                })
            });
            $(function() {
                $("#tabel_planTraining").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false
                })
            });
            $(function() {
                // Summernote
                $('#summernote').summernote();
                $('.summernote').summernote();
                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            });
            $('.alert_notif').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Hapus data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            $('.alert_tolak').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Tolak data ini?",
                    text: "*data tidak akan bisa diperbarui atau dipulihkan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            
            $('.alert_terima').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Terima data ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            
            $('.alert_setuju').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Setujui pengajuan tanggal presentasi?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            
           
            $('.warn').hide();
            document.getElementById("hm").onkeyup=function(){
                var input=parseInt(this.value);
                if(input<1 || input>100){
                    $('.btn-simpan').hide();
                    $('.warn').show();
                    return;
                } else{
                    $('.btn-simpan').show();
                    $('.warn').hide();
                }
                return;
            };     
            $(window).ready(function() {
            $(".form-class").on("keypress", function (event) {
                console.log("aaya");
                var keyPressed = event.keyCode || event.which;
                if (keyPressed === 13) {
                    event.preventDefault();
                    return false;
                }
            });
            });
            
            function onlyNumberKey(evt) {
          
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }
            </script>
</body>

</html>