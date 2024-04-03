<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Employee</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    
    <?php include 'header.php'; ?> 
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini lyt layout-fixed bg-dark">
    <div class="wrapper shadow">
        <?php include'template/v_navbar.php' ?>
        <div class="content-wrapper bg-white">
            <section class="content">
                <div class="container pt-3">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Employee</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex justify-content-end">
                                        <a href="<?php echo base_url('superAdmin/createEmployee')?>" class="btn btn-sm btn-success"><i class="fa fa-plus mr-1"></i>Add Employee</a>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="row col-12">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table border-0 table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Gender</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Education Background</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Position</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody> <?php
                                              $no = 1;
                                              foreach ($dataEmployee as $row) {
                                              ?> <tr role="row" class="odd">
                                                                <td class="dtr-control sorting_1 text-center" tabindex="0"><?= $no;?></td>
                                                                <td> <?= $row['employee_name']?></td>
                                                                <td><?= $row['status']?></td>
                                                                <td><?= $row['gender']?></td>
                                                                <td><?= $row['pendidikan_terakhir']?></td>
                                                                <td><?= $row['position'] ?></td>
                                                                <td>
                                                                    <div class="d-flex justify-content-around">
                                                                        <a href="<?php echo base_url('superAdmin/detailEmployee/'.$row['id']); ?>"><i class="btn fas fa-eye text-primary"></i></a>
                                                                        <a type="button"data-toggle="modal" data-target="#modal-delete<?=$row['id']?>"><i class="btn far fa-trash-alt text-danger"></i></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr> 
                                                            
                                                            <!-- modal for update order -->
                                                            <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title text-primary">Are you sure to delete this employee?</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p class="text-dark">Name: <strong><?= $row['employee_name'] ?></strong> </p>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between">
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                                <a href="<?php echo base_url('superAdmin/deleteEmployee/'.$row['id']); ?>" class="btn btn-primary">Yes update</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!-- /.modal -->
      <?php
                                              $no++;
                                              }
                                              ?> </tbody>
                                                    </table>

                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="d-flex flex-column">
                            
                        <h3 class="p-2 text-center text-bold">SISTEM EVALUASI 360 DERAJAT <br> PERSONEL KJA PT BATS INTERNATIONAL GROUP</h3>
                        
                        <ul>
                            <li>Nama Personel: Ivana Constantia Kadarisman, S.Pn</li>
                            <li>Bagian: Job Production</li>
                            <li>Tgl. Penilaian: 31 Oktober 2022</li>
                        </ul>
                        <table class="table table-striped table-bordered">
    <tr>
        <td>No</td>
        <td>Karakteristik Penilaian</td>
        <td>Skor</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>(1-5)</td>
    </tr>
    <tr>
        <td>A</td>
        <td>KEPEMIMPINAN</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Kematangan dalam merespon masalah</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Tingkat profesionalitas dalam bekerja/memimpin project</td>
        <td>5</td>
    </tr>
    <tr>
        <td>B</td>
        <td>BEKERJASAMA DALAM TIM</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Kemampuan individu dan tim dengan penguasaan teori secara komprehensif, creative thingking, analitical thingking, dan problem solving</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Tingkat seseorang dapat mengelola konflik team</td>
        <td>4</td>
    </tr>
    <tr>
        <td>C</td>
        <td>KOMUNIKASI &amp; INTERAKSI INTERPERSONAL</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Kemampuan mengelola informasi dan mengkomunikasikan hasil pekerjaan kepada rekan kerja dan atasan</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Menguasai bahasa asing misal Inggris/Jepang/China/Korea dengan kemampuan, mendengarkan, menulis, dan berbicara</td>
        <td>3.5</td>
    </tr>
    <tr>
        <td>D</td>
        <td>PENAMPILAN</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Kemampuan dalam menerapkan 5S: Seiri (Ringkas), Seiton (Rapi), Seiso (Resik), Seiketsu (Rawat), dan Shitsuke (Rajin) dalam kehidupan sehari- hari (Pakaian, Meja Kerja, Dst)</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Kerapihan individu dalam interaksi dengan klien</td>
        <td>4</td>
    </tr>
    <tr>
        <td>E</td>
        <td>MANAJEMEN WAKTU</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Tingkat capaian target waktu penyelesaian pekerjaan</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Penyusunan skala prioritas pekerjaan</td>
        <td>3.5</td>
    </tr>
    <tr>
        <td>F</td>
        <td>KONTRIBUSI</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Banyaknya gagasan atau pendapat atau kritik yang menjadi aksi konkrit</td>
        <td>4.5</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Besarnya dampak positif yang diberikan terhadap perusahaan (personal branding diluar kantor tingkat nasional dan internasional)</td>
        <td>3.5</td>
    </tr>
    <tr>
        <td>G</td>
        <td>KEBIASAAN DALAM BEKERJA</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Implementasi Plan, Do, Check dalam pekerjaan</td>
        <td>4.5</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Continuesly improvement dalam bekerja secara efisien dan efektif (ex: zero mistakes)</td>
        <td>4</td>
    </tr>
    <tr>
        <td>H</td>
        <td>AKUNTABILITAS</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Tingkat kegigihan dalam menyelesaikan suatu tugas (ex: mengerahkan segala daya dan upaya)</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Seringnya report harian, meeting mingguan, dan meeting bulanan</td>
        <td>3.8</td>
    </tr>
    <tr>
        <td>I</td>
        <td>KEMAMPUAN DAN PENGETAHUAN</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Terpenuhinya SKP dalam setahun (Ex: Training, webinar, workshop, etc)</td>
        <td>3</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Kualitas wawasan terhadap spesifik pekerjaan dan skill set sesuai dengan jenis pekerjaan</td>
        <td>4</td>
    </tr>
    <tr>
        <td>J</td>
        <td>VISI</td>
        <td></td>
    </tr>
    <tr>
        <td>1</td>
        <td>Selaras visi pribadi dan visi perusahaan</td>
        <td>4</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Tingkat capaian individu terhadap Milestone, Goal Setting, KPI, dam Action Plans</td>
        <td>4</td>
    </tr>
    <tr>
        <td></td>
        <td>Total Keseluruhan</td>
        <td>74.3</td>
    </tr> 
</table>

<div class="p-5"> 
      <textarea class="form-control" name="" id="" rows="3"></textarea>
</div>
                    </div>
            </section>
        </div>
        
    <?php include 'footer.php'; ?> 
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
        
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        
</body>

</html>