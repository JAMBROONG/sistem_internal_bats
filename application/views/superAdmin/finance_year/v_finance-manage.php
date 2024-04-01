<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Financial</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <?php $this->load->view('superAdmin/header'); ?>
        <!-- DataTables -->
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    </head>
    <script type="text/javascript">
        function disableButton2(btn) {
            document
                .getElementById("btn2")
                .innerHTML = ' <i class="fas fa-cog fa-spin mr-2"> </i>updating..';
            document
                .getElementById("btn2")
                .className = "btn btn-sm btn-warning";
            $("form.form-once-only").submit(function () {
                $(this)
                    .find(':button')
                    .prop('disabled', true);
            });
        }
    </script>

    <style>
        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .container input:checked~.checkmark {
            background-color: #2196F3;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
    <?php
$dataOld = [];
foreach ($sptClient as $key) {
    array_push($dataOld,$key['spt_tahunan_id']);
}
$checked = "checked";
?>

    <body class="hold-transition sidebar-mini lyt mt-5">
        <div class="wrapper shadow rounded">

            <section class="m-5">
                <div>
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url()?>">Home</a>
                                </li>
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a>
                                </li>
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url('SuperAdmin/finance_req/'.$user_id)?>">Month or Year</a>
                                </li>
                                <li class="breadcrumb-item text-sm">
                                    <a
                                        href="<?= base_url('SuperAdmin/finance_core?user_id='.$user_id.'&type=year&date='.$date)?>">Core</a>
                                </li>
                                <li class="breadcrumb-item text-sm active" aria-current="page">Manage Default</li>
                            </ol>
                        </nav>
                    </div>
                        
                    <div class="card shadow-none">
                        <div class="card-body row">
                            <div class="col-6 text-center">
                                <h1 class="mb-0 text-warning"><?=$date?></h1>
                                <p>Determine what will be used as the default in calculations in <?= $date ?></p>
                            </div>
                            <form action="<?= base_url('SuperAdmin/finance_manage_year/'. $user_id)?>" class="form col-6" method="post">
                                <div class="form-group">
                                    <label for="">Select Date</label>
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <div class="row">
                                        <div class="col"><select class="js-example-basic-single form-control" style="width:100%;" name="date" id="years">
                                        <option value="<?= $date ?>"><?= $date ?></option>
                                                <?php
                                        for ($i= 2023; $i > 1990 ; $i--) { ?>
                                                <option value="<?=$i?>"><?=$i?></option>
                                                <?php
                                        }
                                        ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-success"><i class="fa fa-eye mr-2"></i> view data</button>
                                            <button type="button" onclick="window.location='<?= base_url('SuperAdmin/finance_input_year?user_id='.$user_id .'&date='.$date) ?>'" class="btn btn-warning"><i class="fa fa-pen mr-2"></i> input data</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card m-3 shadow-none">
                        <div class="card-header">
                            <div class="card-title">
                                SPT
                                <b>
                                    <?= $client['company'] .' - '.$company_type['type']?></b>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            
                            <a
                                href="<?=base_url('SuperAdmin/finance_manage_year?user_id='.$user_id.'&date='.$date)?>"
                                class="btn btn-sm btn-default mb-3"  data-toggle="modal" data-target="#modaltambahsubakun">
                                <div class="info-box-content">
                                    <span class="info-box-text"> <i class="fa fa-plus"></i> Tambahkan sub akun</span>
                                </div>
                            </a> 
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modaltambahsubakun" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah data sub akun</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?=base_url('SuperAdmin/addSubAccount')?>" method="post">
                                        
                                <input type="hidden" value="<?= $date ?>" name="spt_date">
                                <input type="hidden" value="<?= $user_id ?>" name="client_id">
                                        <div class="form-group">
                                            <label for="">Pilih Akun</label>
                                            <select class=" js-example-basic-single form-control" onchange="return selectsub(this)" style="width:100%;"  name="spt_tahunan_id" id="">
                                                <?php
                                                foreach ($dataTahunan as $optionAkun) {
                                                    
                                                if ($optionAkun['category_jumlah'] != "") {
                                                    continue;
                                                }
                                                ?>
                                                <option value="<?= $optionAkun['id'] ?>" namesub="<?= $optionAkun['description'] ?>"><?= $optionAkun['description'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <small>Akun tambahan akan ditampilkan setelah <b class="text-success" id="sub_akun"><?=$dataTahunan[0]['description']?></b></small>
                                        <div class="form-group">
                                          <label for="">Nama Akun Tambahan</label>
                                          <input type="text"
                                            class="form-control" name="title_sub_account" id="" required aria-describedby="helpId" placeholder="">
                                        </div>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="alert alert-warning" role="alert">
                            <p class="mb-0">if you uncheck it then save it, it will erase the previously entered data or values.</p>
                            </div>
                            <form action="<?=base_url('SuperAdmin/updateSptClient_year')?>" method="post" id="formAll" class="form-once-only">

                                <input type="hidden" value="<?= $date ?>" name="spt_date">
                                <input type="hidden" value="<?= $user_id ?>" name="client_id">
                                <input type="hidden" value="<?= $company_type['id'] ?>" name="type_company_id">
                                <h5 class="mt-5">1. ELEMEN DARI NERACA</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card p-3">
                                            <div class="card-header border-0">
                                                <div class="card-title ">Jumlah Asset</div>
                                            </div>
                                            <div class="card-body p-0">
                                                <button type="button" class="btn btn-sm btn-default ml-2 btnselectJA">
                                                    <i class="fas fa-check-square text-primary fa-1x mr-1"></i>slelect all</button>
                                                <button type="button" class="btn btn-sm btn-default ml-2 btnunselectJA">
                                                    <i class="far fa-check-square fa-1x text-danger mr-1"></i>unselect all</button>
                                                <table id="table1" class="table table-light table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Description (Indonesian)</th>
                                                            <th>Description (English)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                    $no = 1;
                                    foreach ($dataTahunan as $rows) {
                                        if ($rows['category_jumlah'] != "Jumlah Asset") {
                                            continue;
                                        }
                                        if (in_array($rows['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        ?>
                                                        <tr>
                                                            <td><?=$no;?></td>
                                                            <td><?=$rows['description']?></td>
                                                            <td><?=$rows['description_en']?></td>
                                                            <td>
                                                                <label class="container text-sm">choose
                                                                    <input
                                                                        type="checkbox"
                                                                        class="selectJA"
                                                                        <?= $checked ?>
                                                                        name="spk[]"
                                                                        value="<?= $rows['id'];?>"
                                                                        id="checkboxPrimary<?= $rows['id']?>">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                $checked = "checked";
                                    $no++;
                                    if ($this->M_table->totalDataTableWhere('sub_spt_tahunan_client_pertahun','client_id',$user_id . ' AND spt_date = ' . $date . ' AND spt_tahunan_id = ' . $rows['id']) > 0) {
                                        $variable = $this->M_table->dataTableWhere('sub_spt_tahunan_client_pertahun','client_id',$user_id . ' AND spt_date = ' . $date  . ' AND spt_tahunan_id = ' . $rows['id']);
                                        foreach ($variable as $arrakuntambahan) {
                                            ?>
                                            <tr>
                                                <td><?=$no;?></td>
                                                <td><?=$arrakuntambahan['title']?></td>
                                                <td><?=$arrakuntambahan['title']?></td>
                                                <td>
                                                    <a href="<?=base_url('SuperAdmin/delSubAccount?id='.$arrakuntambahan['id'].'&user_id='.$user_id.'&date='.$date)?>" class="btn-sm btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                        }
                                        ?>
                                        <?php
                                    }
                                    }
                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card p-3">
                                            <div class="card-header border-0">
                                                <div class="card-title ">Jumlah Kewajiban dan Ekuitas</div>
                                            </div>
                                            <div class="card-body p-0">

                                                <button type="button" class="btn btn-sm btn-default ml-2 btnselectJK">
                                                    <i class="fas fa-check-square text-primary fa-1x mr-1"></i>slelect all</button>
                                                <button type="button" class="btn btn-sm btn-default ml-2 btnunselectJK">
                                                    <i class="far fa-check-square fa-1x text-danger mr-1"></i>unselect all</button>
                                                <table id="table2" class="table table-light table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Description (Indonesian)</th>
                                                            <th>(English)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                    $no = 1;
                                    foreach ($dataTahunan as $row) {
                                        if ($row['category_jumlah'] != 'Jumlah Kewajiban dan Ekuitas') {
                                            continue;
                                        }
                                        
                                        if (in_array($row['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        ?>
                                                        <tr>
                                                            <td><?=$no;?></td>
                                                            <td><?=$row['description']?></td>
                                                            <td><?=$row['description_en']?></td>
                                                            <td>
                                                                <label class="container">choose
                                                                    <input
                                                                        type="checkbox"
                                                                        class="selectJK"
                                                                        <?= $checked ?>
                                                                        name="spk[]"
                                                                        value="<?= $row['id'];?>"
                                                                        id="checkboxPrimary<?= $rows['id']?>">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                $checked = "checked";
                                    $no++;
                                    }
                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-5">2. ELEMEN DARI LAPORAN LABA/RUGI</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card p-3">
                                            <div class="card-body p-0">

                                                <button type="button" class="btn btn-sm btn-default ml-2 btnselectDL">
                                                    <i class="fas fa-check-square text-primary fa-1x mr-1"></i>slelect all</button>
                                                <button type="button" class="btn btn-sm btn-default ml-2 btnunselectDL">
                                                    <i class="far fa-check-square fa-1x text-danger mr-1"></i>unselect all</button>
                                                <table id="table3" class="table table-light table-hover">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Description (Indonesian)</th>
                                                            <th>(English)</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                    $no = 1;
                                    foreach ($dataTahunan as $rows) {
                                        if ($rows['category_jumlah'] != "") {
                                            continue;
                                        }
                                        
                                        if (in_array($rows['id'],$dataOld)) {
                                            $checked = "checked";
                                        }
                                        ?>
                                                        <tr>
                                                            <td><?=$no;?></td>
                                                            <td><?=$rows['description']?></td>
                                                            <td><?=$rows['description_en']?></td>
                                                            <td>
                                                                <label class="container">choose
                                                                    <input
                                                                        type="checkbox"
                                                                        class="selectDL"
                                                                        <?= $checked ?>
                                                                        name="spk[]"
                                                                        value="<?= $rows['id'];?>"
                                                                        id="checkboxPrimary<?= $rows['id']?>">
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                $checked = "checked";
                                                    $no++;
                                                    if ($this->M_table->totalDataTableWhere('sub_spt_tahunan_client_pertahun','client_id',$user_id . ' AND spt_date = ' . $date . ' AND spt_tahunan_id = ' . $rows['id']) > 0) {
                                                        $variable = $this->M_table->dataTableWhere('sub_spt_tahunan_client_pertahun','client_id',$user_id . ' AND spt_date = ' . $date  . ' AND spt_tahunan_id = ' . $rows['id']);
                                                        foreach ($variable as $arrakuntambahan) {
                                                            ?>
                                                            <tr>
                                                                <td><?=$no;?></td>
                                                                <td><?=$arrakuntambahan['title']?></td>
                                                                <td><?=$arrakuntambahan['title']?></td>
                                                                <td>
                                                                    <a href="<?=base_url('SuperAdmin/delSubAccount?id='.$arrakuntambahan['id'].'&user_id='.$user_id.'&date='.$date)?>" class="btn-sm btn btn-danger">Delete</a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $no++;
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="fixed-bottom d-flex justify-content-center mb-3">
                                            
                                        <button
                                            type="submit"
                                            id="btn2"
                                            form="formAll"
                                            class="btn btn-sm btn-success w-25"
                                            onclick="disableButton2(this)">
                                            <i class="fa fa-save mr-2"></i>
                                            save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
        <script>
        function selectsub(select) {
  $('#sub_akun').html(select.options[select.selectedIndex].textContent);
}

            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
            function leaveChange() {
                if (document.getElementById("leave").value != "Elemen dari Neraca") {
                    document
                        .getElementById("jumlah")
                        .style
                        .display = 'none';
                    document
                        .getElementById("category_jumlah")
                        .value = "";
                } else {
                    document
                        .getElementById("jumlah")
                        .style
                        .display = 'block';
                }
            }
            $(document).ready(function () {
                $('.btnselectJA').click(function () {
                    $('.selectJA ').attr('checked', true);

                });
            });
            $(document).ready(function () {
                $('.btnunselectJA').click(function () {
                    $('.selectJA ').attr('checked', false);

                });
            });
            $(document).ready(function () {
                $('.btnselectJK').click(function () {
                    $('.selectJK ').attr('checked', true);

                });
            });
            $(document).ready(function () {
                $('.btnunselectJK').click(function () {
                    $('.selectJK ').attr('checked', false);

                });
            });
            $(document).ready(function () {
                $('.btnselectDL').click(function () {
                    $('.selectDL ').attr('checked', true);

                });
            });
            $(document).ready(function () {
                $('.btnunselectDL').click(function () {
                    $('.selectDL ').attr('checked', false);

                });
            });

            $(function () {
                $("#table1")
                    .DataTable(
                        {"responsive": true, "lengthChange": false, "autoWidth": true, "paging": false}
                    )
                    .buttons()
                    .container()
                    .appendTo('#example1_wrapper .col-md-6:eq(0)');
            });

            $(function () {
                $("#table2")
                    .DataTable(
                        {"responsive": true, "lengthChange": false, "autoWidth": false, "paging": false}
                    )
                    .buttons()
                    .container()
                    .appendTo('#example1_wrapper .col-md-6:eq(0)');
            });

            $(function () {
                $("#table3")
                    .DataTable(
                        {"responsive": true, "lengthChange": false, "autoWidth": false, "paging": false}
                    )
                    .buttons()
                    .container()
                    .appendTo('#example1_wrapper .col-md-6:eq(0)');
            });

            function close_window() {
                if (confirm("Close Window?")) {
                    close();
                }
            }

            $('td').addClass("p-1 align-items-center");
            $('th').addClass("p-2");
            $('table').addClass("text-sm table-striped");
        </script>
    </body>

</html>