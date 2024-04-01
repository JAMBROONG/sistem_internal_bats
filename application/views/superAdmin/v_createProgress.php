<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Special Task</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php
            $doProcess = [];
            foreach ($dataProcess as $row) {
                array_push($doProcess,$row['order_step_id']);
            }
        ?>
</head>

<body class="hold-transition lyt">
    <a href="<?php echo base_url('superAdmin/progressOrder/'.$dataOrder['id']); ?>" class="btn btn-danger ml-3 btn-sm position-fixed"><i class="fa fa-arrow-left pr-1"></i> back</a>
    <div class="container">
        
    
        <div class="card mt-3">
            <div class="card-header border-0  bg-info">
                <h3 class="card-title">Create Progress</h3>
            </div>
            <div class="card-body">
                <form action="<?= site_url('SuperAdmin/processCreateProgress/'.$dataOrder['id']) ?>" method="post" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Step</label>
                            <input type="hidden" name="" value="<?= $dataOrder['id'] ?>">
                            <select class="select2" name="order_step_id" style="width: 100%;"> <?php
                            $no = 1;
                                    foreach ($subStep as $row) {
                                        if (in_array($row['id'],$doProcess)) {
                                            continue;
                                        }
                                        echo '<option value="'.$row['id'].'">'.$no.'. '.$row['subStep'].'</option>';
                                        $no++;
                                    }
                                    ?> </select>
                        </div>
                        <div class="form-group">
                            <label>Estimasi</label>
                            <input type="date" name="estimasi" class=" form-control" id="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Employee</label>
                            <select class="select2" name="employee" style="width: 100%;"> <?php
                                    foreach ($dataStaff as $row) {
                                        echo '<option value="'.$row['id_employee'].'">'.$row['employee_name'].'</option>';
                                    }
                                    ?> </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control d-none" name="status" style="width: 100%;">
                                <option value="do">Do<i class="fas fa-cog fa-spin text-warning"></i></option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-sm pl-1 pr-1 btn-success pl-2 pr-2"><i class="fa fa-save pr-1"></i> create</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0 bg-info">
                <h3 class="card-title">Progress this service</h3>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Step</th>
                            <th>Activities</th>
                            <th>Status</th>
                            <th>Estimasi</th>
                            <th>Employee</th>
                        </tr>
                    </thead>
                    <tbody> <?php
                    $no = 1;
                    $step = "";
                    foreach ($dataProcess as $row) {
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                if($row['step'] == $step){
                                    ?>
                                <p class="d-none"><?=$no?></p>
                                <?php
                                } else{
                                    echo $no;
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if($row['step'] == $step){
                                    echo " ";
                                } else{
                                    echo $row['step'];
                                    $step = $row['step'];
                                    $no++;
                                }
                                ?>
                            </td>
                            <td>
                                <?= $row['subStep']?>
                            </td>
                            <td> <?php
                                if ($row['status']=='done') {
                                    echo 'done <i class="fas fa-check-square text-success"></i>';
                                }
                                else{
                                    echo 'do <i class="fas fa-cog fa-spin text-warning"></i> ';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['status'] == "done") {
                                    echo '<small class="text-success"> Finished on </small> ';
                                    echo date("F j, Y", strtotime($row['update_date']));
                                } else{
                                    $todayDateObj = new \DateTime(date('Y-m-d'));
                                        $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['estimasi'])));
                                        $interval = $todayDateObj->diff($foundedDateObj);
                                        $interval = $interval->format('%r%a') . "\n\n";
                                        echo date("F j, Y", strtotime($row['estimasi']));
                                        if ($interval > 0 ) {
                                            ?>
                                <p class="text-success">(<?=$interval?>more days)</p>
                                <?php
                                    }
                                else{
                                    ?>
                                <p class="text-danger">(<?=$interval?>days ago)</p>
                                <?php
                                }
                            }
                                    
                                    ?>
                            </td>
                            <td>
                                <img src="<?= base_url();?>assets/upload/images/employee/<?=$row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2"> <?=$row['employee_name'];?>
                            </td>
                        </tr> <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Select2 -->

    <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

    <?php
    
    echo $this->session->flashdata('inputProgress');

    ?>
    <script>
        let inputData = "<?= $this->session->flashdata('inputProgress') ?>";
        if (inputData) {
            Swal.fire({
            position: 'top-center',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
            })
        }
            
        $(function() {
            $('.select2').select2()
        });
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "bPaginate": false,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
    </script>

</body>


</html>