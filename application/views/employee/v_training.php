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

<body class="hold-transition bg-info sidebar-mini  layout-fixed">
    <div class="wrapper bg-white">
        <?php include 'component/v_navbar.php'; ?>
        <div class="content-wrapper bg-white" >
            <section class="content">
                <div class="container  pt-3">
                    <div class="jumbotron bg-white">
                        <h1 class="display-4">Training</h1>
                        <p class="lead">Selamat datang di Training BATS</p>
                        <hr class="my-4">
                        <p class=" text-justify">Kami menyediakan berbagai macam materi 
                         <?php
                         $no = 1;
                        foreach ($data_category as $key) {
                           echo $key['content_training_category'];
                           if($no == count($data_category)-1){
                               echo " dan ";
                           } else if($no < count($data_category)-1){
                               echo ", ";
                           }
                           $no++;
                        }
                        ?>
                        baik berbentuk file powerpoint, pdf, serta video. Materi ini disusun berdasarkan standar sarjana dan magister dari universitas terkemuka di Indonesia, materi yang berbentuk powerpoint dan pdf berasal dari seminar dan pelatihan resmi dari berbagai lembaga profesional dan asosiasi profesional lalu kami kembangkan secara internal, serta materi berbentuk buku hanya disediakan dalam bentuk judul buku terbitan nasional dan internasional (hanya dapat diakses secara langsung di kantor ruang perpustakaan BATS Consulting).</p>
                    </div>
                    <hr>
                    <p class="text-center">Semua Materi </p>
                    <hr>
                    <div class="row">
                        <div class="col-12  table-responsive-lg">
                        <table class="table table-bordered" id="table_material">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Materi</th>  
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($data_category as $key) {
                                    ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$key['content_training_category']?></td>
                                    <td><?= array_count_values(array_column($materi_trainingAll, 'id_category'))[$key['id']] ?> <small>materi</small></td>
                                    <td>
                                    <a type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#viewM<?= $key['id'] ?>"><i class="fa fa-list-alt mr-2"></i> daftar materi</a>
                                    <a href="<?= base_url('Employee/dTraining/'.$key['id']) ?>" target="blank" class="btn btn-sm btn-default"><i class="fa fa-laptop-code mr-2"></i> lihat halaman</a>
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
                    <div class="modal fade " id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="card-title">
                                        create training plan
                                    </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?=base_url('Employee/createTrainingEmployee')?>" method="post">
                                        <div class="form-group">
                                        <label for="">Book</label>
                                        <select name="id_title" id="" class="form-control select2" required>
                                            <?php 
                                                foreach ($data_title as $key) {
                                                    echo '<option value="'.$key['id'].'">'.$key['content_title'].'</option>';
                                                }
                                            ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Rencana:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <small>Mulai</small>
                                                    <input id="my-input" class="form-control" value="<?= date('Y-m-d') ?>" type="date" name="plan_start" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <small>Selesai</small>
                                                    <input id="my-input" class="form-control" type="date" name="plan_finish" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Deskripsi</label>
                                            <textarea name="desc" id="summernote" cols="30" rows="10" required>
                                                
                                            </textarea>
                                        </div>
                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Save <i class="fa fa-save ml-2"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center">Pencapaian <i class="fa fa-question-circle text-sm text-warning" data-toggle="modal" data-target="#modalPencapaian"></i></p>
                    <hr>
                    <div id="modalPencapaian" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <ul>
                                        <li>Memilih judul materi mana yang akan dipelajari</li>
                                        <li>Menentukan target mulai dan selesainya mempelajari materi</li>
                                        <li>Memberika penjelasan jika perlu, contoh: "Saya mempelajari Bab 1 tentang Pentingnya Merubah Mindset"</li>
                                        <li>Menentukan tanggal presentasi kepada atasan, kamu bisa melakukan perubahan selagi tanggal belum disetujui atasan</li>
                                        <li>Berhak mendapatkan <i>feedback</i> berupa penilaian dari atasan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-info shadow-none">
                        <div class="card-body p-0  table-responsive-lg">
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
                                <a href="" class="btn btn-sm btn-success d-flex align-items-center" data-toggle="modal" data-target="#modelId"><i class="fa fa-plus-circle mr-2"></i> tambah data</a>
                            </div>
                            <table id="tabel_planTraining" class="table table-bordered table-responsive-lg">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="p-1">#</th>
                                        <th class="p-1">Materi</th>
                                        <th class="p-1">Deskripsi</th>
                                        <th class="p-1">Rencana Mulai</th>
                                        <th class="p-1">Rencana Selesai</th>
                                        <th class="p-1">Presentasi</th>
                                        <th class="p-1">Nilai</th>
                                        <th class="p-1">Aksi</th>
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
                                        <td class="text-sm p-1"><?php 
                                        switch ($key['status']) {
                                            case 'process':
                                                echo '<i class="fa fa-dot-circle text-warning mr-1"></i>';
                                                break;
                                            case 'received':
                                                echo '<i class="fa fa-dot-circle text-success mr-1"></i>';
                                                break;
                                            case 'rejected':
                                                echo '<i class="fa fa-dot-circle text-danger mr-1"></i>';
                                                break;
                                        }
                                        echo $key['content_title'] ?>
                                        <a href="<?= base_url('Employee/content/'.$key['id_title']) ?>" target="blank"><i class="fa fa-book-open"></i></a>    
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
                                            if ($interval == 0 ) {
                                                ?>
                                        <br><small class="text-blue">(hari ini)</small>
                                        <?php
                                            } else
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
                                            if ($interval == 0 ) {
                                                ?>
                                        <br><small class="text-blue">(hari ini)</small>
                                        <?php
                                            } else
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
                                            ?></td>
                                        <td class="text-sm p-1">
                                        <?php if ($key['presentation_date'] == null) {
                                            echo '<a type="button" data-toggle="modal" data-target="#updtDateP'.$key['id'].'" class="btn-sm btn-default">tentukan tgl<i class="fa fa-calendar ml-1"></i></a>';
                                        } else{
                                                    echo date("F j, Y", strtotime( $key['presentation_date'] ));
                                            if ($key['status'] == "process") {
                                                    $todayDateObj = new \DateTime(date('Y-m-d'));
                                                    $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($key['presentation_date'])));
                                                    $interval = $todayDateObj->diff($foundedDateObj);
                                                    $interval = $interval->format('%r%a') . "\n\n";
                                                    
                                                    if ($key['check'] != "yes") {
                                                        echo '<a type="button" data-toggle="modal" data-target="#updtDateP'.$key['id'].'" class="ml-2 text-sm"><i class="fa fa-pen text-warning ml-1"></i></a>';
                                                    }
                                                    if ($interval == 0 ) {
                                                        ?>
                                                <br><small class="text-blue">(hari ini)</small>
                                                <?php
                                                    } else
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
                                                } else{
                                                    echo '<small class="text-danger">belum disetujui</small>';
                                                }
                                            }
                                        } ?>
                                        </td>
                                        <td class="text-sm text-center p-1">
                                            <?php
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
                                            <?php
                                            
                                            if ($key['status'] == "process") {
                                                ?>
                                            <a href="<?= base_url('Employee/delTrainingE/'.$key['id']) ?>" class="btn btn-default btn-sm alert_notif"><i class="fa fa-trash text-danger"></i></a>
                                                <div class="modal fade" id="updtData<?=$key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header p-2 pr-3 pl-3">
                                                    <div class="card-title">
                                                        perbarui data
                                                    </div>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <form action="<?= base_url('Employee/updateDataTE')?>" method="post">
                                                            <div class="form-group">
                                                                <label for="">Materi</label>
                                                                <select name="id_title" id="" class="form-control select2" required>
                                                                    <?php 
                                                                        foreach ($data_title as $key2) {
                                                                            echo '<option value="'.$key2['id'].'">'.$key2['content_title'].'</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Rencana:</label>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <small>Mulai</small>
                                                                        <input id="my-input" class="form-control" value="<?= $key['plan_start']?>" type="date" name="plan_start" required>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <small>Selesai</small>
                                                                        <input id="my-input" class="form-control" type="date" value="<?= $key['plan_finish']?>" name="plan_finish" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="my-input">Deskripsi</label>
                                                                <textarea name="desc" id="summernote" class="textarea" cols="30" rows="10" required>
                                                                    <?= $key['desc'] ?>
                                                                </textarea>
                                                            </div>
                                                            <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                            <a class="btn btn-default btn-sm"  data-toggle="modal" data-target="#updtData<?=$key['id']?>"><i class="fa fa-pen text-primary"></i></a>
                                                <?php
                                            } else{
                                                echo '<small class="text-muted">aksi dikunci</small>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="updtDateP<?=$key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header p-2 pr-3 pl-3">
                                                        Materi: <?= $key['content_title'] ?>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <form action="<?= base_url('Employee/updateDatePresentation')?>" method="post">
                                                            <div class="form-group">
                                                            <small>Tambah tanggal presentasi:</small>
                                                                <?php 
                                                                $date = date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d'))));?>
                                                                <input id="my-input" class="form-control" value="<?= $date ?>" type="date" name="presentation">
                                                            </div>
                                                            <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                    <script>
                                        $('#exampleModal').on('show.bs.modal', event => {
                                            var button = $(event.relatedTarget);
                                            var modal = $(this);
                                            // Use above variables to manipulate the DOM
                                            
                                        });
                                    </script>
                                        <?php
                                        $no++;
                                        $value = $value + $key['value'];
                                    }
                                    ?>
                                    
                                </tbody>
                                <tfoot class="thead-light">
                                    <tr>
                                        <th colspan="6">Pelatihan: 
                                        <i class="fa fa-dot-circle text-warning mr-1"></i>(<?= $process ?>) + 
                                        <i class="fa fa-dot-circle text-danger mr-1"></i>(<?= $reject ?>) + 
                                        <i class="fa fa-dot-circle text-success mr-1"></i>(<?= $receive ?>) = <?= count($data_trainingE) ?>
                                        </th>
                                        <th colspan="1">Nilai: <?= $value ?> </th>
                                        <th class="p-1"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
        
        <?php
        foreach ($data_category as $key) {
            ?>
            <!-- Modal -->
            <div class="modal fade" id="viewM<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Materi <?= $key['content_training_category'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">  
                                    <table id="list_material<?=$key['id']?>" class="table table-bordered table-hover table-responsive-lg">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th class="bg-orange">Materi PDF</th>
                                                <th class="bg-warning">Materi PPT</th>
                                                <th class="bg-danger">Materi Video</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($materi_trainingAll as $value) {
                                                if ($value['id_category'] == $key['id']) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $no; ?></td>
                                                            <td><?= $value['content_title'] ?></td>
                                                            <td><?php
                                                            $total = 0;
                                                             foreach ($materi_trainingAll as $value2) {
                                                                if ($value2['id_pdf'] == $value['id_title']) {
                                                                    $total++;
                                                                }
                                                             }
                                                             echo $total . ' file';
                                                             if ($value['pdf'] != NULL) {?>
                                                              <a href="<?= $value['pdf']?>"> buka</a>
                                                             <?php
                                                             }
                                                             ?>
                                                             </td>
                                                             <td><?php
                                                            $total = 0;
                                                             foreach ($materi_trainingAll as $value2) {
                                                                if ($value2['id_ppt'] == $value['id_title']) {
                                                                    $total++;
                                                                }
                                                             }
                                                             echo $total . ' file';
                                                             if ($value['ppt'] != NULL) {?>
                                                              <a href="<?= $value['ppt']?>"> buka</a>
                                                             <?php
                                                             }
                                                             ?>
                                                             </td>
                                                             <td><?php
                                                            $total = 0;
                                                             foreach ($materi_trainingAll as $value2) {
                                                                if ($value2['id_yt'] == $value['id_title']) {
                                                                    $total++;
                                                                }
                                                             }
                                                             echo $total . ' file';
                                                             if ($value['yt'] != NULL) {?>
                                                              <a href="<?= $value['yt']?>"> buka</a>
                                                             <?php
                                                             }
                                                             ?>
                                                             </td>
                                                             <td>
                                                                <a href="<?= base_url('Employee/content/'.$value['id_title']) ?>" target="blank" class="btn btn-sm btn-default"><i class="fa fa-laptop-code mr-2"></i> lihat halaman</a>
                                                             </td>
                                                        </tr>
                                                    <?php
                                                } else{
                                                    continue;
                                                }
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
            # code...
        }
        ?>
                    
        <hr>
        <p class="text-center">Fitur yang akan segera dikembangkan</p>
        <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    TRAINING BERTARGET
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>Setiap profesional diwajibkan untuk mengikuti dan menuntaskan training dengan jumlah SKP tertentu dengan waktu yang telah ditentukan (misal periode 3 bulanan,6 bulanan atau 1 tahun)guna meningkatkan kualitas dan produktivitas pekerjaan.</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    MINDSET TRANSFORMING
                                </h3>
                            </div>
                            <div class="card-body clearfix">
                                <p>1. Fix mindset to Growth mindset</p>
                                <p>2. PKPM to CIEL (Productivity, Kaizen, Professional, Management to Creative, Innovation, Entrepreneur, Leadership).</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    UJIAN BERJENJANG
                                </h3>
                            </div>
                            <div class="card-body clearfix">
                                <p>Ujian akan dilaksanakan pada periode tertentu untuk melihat perkembangan serta mendapatkan e-sertifikat dari materi yang bersifat tematik.</p>
                                <small>status: <cite title="Source Title" class="text-warning">masih perencanaan</cite></small>
                            </div>
                            </div>
                        </div>
                        </div>
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

        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
        <script>
            var input = "<?= $this->session->userdata('input')?>";
            var update = "<?= $this->session->userdata('update')?>";
            if (input == "success") {
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Data berhasil disimpan',
                    showConfirmButton: false,
                    timer: 1500
                });
                var printah = "<?= $_SESSION['input'] = "no" ?>";
            }
            if (update == "success") {
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: '<?= $this->session->userdata("message")?>',
                    showConfirmButton: false,
                    timer: 1500
                });
                var printah = "<?= $_SESSION['update'] = "no" ?>";
            }
            if (input == "deleted") {
                Swal.fire(
                    'Dihapus!',
                    'Data berhasil dihapus',
                    'success'
                );
                var printah = "<?= $_SESSION['input'] = "no" ?>";
            }
            $(function() {
                $('.select2').select2()
            });
            $(function() {
                $("#tabel_planTraining").DataTable({
                    "responsive": false,
                    "lengthChange": false,
                    "searching": false,
                    "pageLength": 5,
                    "autoWidth": false,
                });
                $("#table_material").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "searching": false,
                    "autoWidth": false,
                });
                <?php
                foreach ($data_category as $key) {
                    ?>
                    $("#list_material<?= $key['id'] ?>").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                });
                    <?php
                }
                ?>
            });
            $(function() {
                $('#summernote').summernote()
                $('.textarea').summernote()

                // CodeMirror
                CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                    mode: "htmlmixed",
                    theme: "monokai"
                });
            });
           
            $('.alert_notif').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Yakin ingin menghapus data?",
                    text:"data tidak dapat dipulihkan",
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
            $('.    ').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure to update?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Batal"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        document.myform.submit();
                    }
                })
                return false;
            });
        </script>
</body>

</html>