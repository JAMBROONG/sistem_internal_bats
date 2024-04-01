<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Special Task</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/codemirror/theme/monokai.css">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/simplemde/simplemde.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


</head>
</style>

<body class="hold-transition">
    <div class="container pt-5">
        <h4 class="text-center mb-5">Selamat datang di tugas khusus BATS Consulting</h4>
        <section class="content p-2">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Special Task</li>
                    </ol>
                </nav>
            </div>
            <?php
            if (empty($_GET['tag'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Harap pilih kategory</strong> 
                </div>
                <?php
            }
            if ($this->session->flashdata('msg')) {
                echo $this->session->flashdata('msg');
            }
            ?>
            <div class="row">
                <?php
                foreach ($this->M_table->getAll('category_specialtask order by category') as $key) {
                    ?>
                    
                <div class="col-md-3 mt-3">
                    <a href="<?= base_url('Admin/specialTask?tag='.$key['id']) ?>" type="button" name="" id="btn<?=$key['id']?>" class="btn btn-default btn-lg btn-block"><?= $key['category'] ?></a>
                </div>
                    <?php
                }
                ?>
            </div>
            <?php
             if (!empty($_GET['tag'])) {
                ?>
               <hr>
               <div class="d-flex justify-content-between  mb-3">
               <p class="m-0"> Category: <b class="btn-sm btn btn-warning p-0 pl-1 pr-1">
                <?php
                echo $this->M_table->getById('category_specialtask',$_GET['tag'])['category'];
                ?></b>
               </p>
               <button type="button" class="btn-sm btn btn-success p-0 pl-4 pr-4" data-toggle="modal" data-target="#modal-addTask">
                 add data <i class="fa fa-plus ml-2"></i>
               </button>
               </div>
               <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-inverse">
                        <tr>
                            <th>No.</th>
                            <th>Task</th>
                            <th>Employee</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Estimasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $no = 1;
                    foreach ($dataTask as $row) {
                        if ($row['id_category'] != $_GET['tag']) {
                            continue;
                        }
                    ?>
                        <tr role="row" class="odd">
                            <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                            <td><?= $row['task']?></td>
                            <td><?= $row['employee_name']?></td>
                            <td>
                                <?php
                                if ($row['file'] == "not yet") {
                                    echo $row['description'];
                                } else{
                                        ?>
                                <a class="btn btn-sm btn-success" href="<?=base_url()?>assets/upload/task/<?=$row['file']?>" download=""><i class="fa fa-download"></i></a>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?php
                                if ( $row['status'] == "do") {
                                    echo '
                                    <p class="text-warning">On Progress</p>
                                    ';
                                    
                                } else{
                                    
                                    echo '
                                    <p class="text-success">Done</p>
                                    ';
                                }
                                    ?></td>
                            <td>
                                <?php
                                    if ($row['status'] ==  "done") {
                                        echo date("F j, Y", strtotime($row['estimasi']));
                                            echo '<p class="text-success">Finished on '.date("F j, Y (H:i a)", strtotime($row['update_date'])).'</p>';
                                        
                                    }
                                    else{
                                        $todayDateObj = new \DateTime(date('Y-m-d'));
                                        $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['estimasi'])));
                                        $interval = $todayDateObj->diff($foundedDateObj);
                                        $interval = $interval->format('%r%a') . "\n\n";
                                        echo date("F j, Y", strtotime($row['estimasi']));
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
                                    }
                                
                                ?>
                            </td>
                            <td>
                                <div class="d-flex justify-align-center">
                                    <a type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>"><i class="fa fa-trash"></i></a>
                                    <a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-update<?=$row['id']?>"><i class="fa fa-edit"></i></a>
                                </div>
                                <?php
                                        if ( $row['status'] == "do") {
                                        echo '
                                        <a href="'.base_url('Admin/updateStatusTask/'.$row['id']).'" class="btn btn-sm btn-success btn-block mt-1">to done</a>
                                        ';
                                        
                                        } else{
                                            
                                        echo '
                                        <a href="'.base_url('Admin/updateStatusTask/'.$row['id']).'" class="btn btn-sm btn-danger btn-block mt-1">to do</a>
                                        ';
                                        }
                                        ?>
                            </td>
                        </tr>
                        <div id="modal-delete<?=$row['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-danger">Are you sure delete this Task?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-dark">Task: <strong><?= $row['task'] ?></strong> </p>
                                        <p class="text-dark">Description:</p>
                                        <?= $row['description'] ?>
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('Admin/deleteTask/'.$row['id']); ?>" class="btn btn-danger">Yes delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-update<?=$row['id']?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure update this Task?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="<?=site_url('Admin/updateTask')?>">
                                            <label for="">Task</label>
                                            <input type="text" name="task" id="" class="form-control" required value="<?=$row['task']?>">
                                            <input type="hidden" name="task_id" id="" class="form-control" required value="<?=$row['id']?>">
                                            <label for="" class="mt-2">Category</label>
                                            <select name="category_id" id="" class="form-control">
                                                <option value="<?=$row['id_category']?>"><?=$row['category']?></option>
                                                <?php
                                                    foreach ($dataCategory as $key5) {
                                                        if ($key5['id']==$row['id_category']) {
                                                            continue;
                                                        }
                                                        echo'<option value="'.$key5['id'].'">'.$key5['category'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <label for="">Description</label>
                                            <textarea name="description" class="form-control" cols="30" rows="5" required><?=$row['description']?></textarea>
                                            <label for="" class="mt-2">Employee</label>
                                            <select name="employee_id" id="" class="form-control">
                                                <option value="<?=$row['employee_id']?>"><?=$row['employee_name']?></option>
                                                <?php
                                                    foreach ($this->M_table->getALL('employee') as $key5) {
                                                        if ($key5['id']==$row['employee_id']) {
                                                            continue;
                                                        }
                                                        echo'<option value="'.$key5['id'].'">'.$key5['employee_name'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                            <label for="" class="mt-2">Estimasi</label>
                                            <input type="date" class="form-control" required name="estimasi" value="<?=date("Y-m-d", strtotime($row['estimasi']))?>">
                                            <button type="submit" class="btn btn-sm btn-success mt-3"><i class="fa fa-save mr-2"></i> save</button>
                                            <button type="button" class="btn btn-danger mt-3 btn-sm" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                                $no++;
                    }
                            ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
            
        </section>
    </div>
    <div class="modal fade" id="modal-addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" id="exampleModalLabel">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Admin/processCreateTask')?>" method="post">
                        <label style="color: black;" for="">Task</label>
                        <input type="text" name="task" id="" class="form-control" placeholder="Create blog" required>
                        <label style="color: black;" for="" class="mt-2">Category</label>
                        <select name="category_id" id="" class="form-control" required>
                            <?php
                                foreach ($dataCategory as $row) {
                                    echo'<option value="'.$row['id'].'">'.$row['category'].'</option>';
                                }
                            ?>
                        </select>
                        <label style="color: black;" for="" class="mt-2">Description</label>
                        <textarea name="description" class="form-control" cols="30" rows="5" placeholder="this is.." required></textarea>
                        <label style="color: black;" for="" class="mt-2">Employee</label>
                        <select name="employee_id" id="" class="form-control">
                            <?php
                                foreach ($dataStaff as $row) {
                                    echo'<option value="'.$row['id'].'">'.$row['employee_name'].'</option>';
                                }
                            ?>
                        </select>
                        <label style="color: black;" for="" class="mt-2">Estimasi</label>
                        <input type="date" class="form-control" required name="estimasi">
                        <button type="submit" class="btn btn-sm btn-success mt-3"><i class="fa fa-save mr-2"></i> save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>

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
            // $('.summernote').summernote();
            $('#example').DataTable();
            <?php
            
            if (!empty($_GET['tag'])) {
                echo '$("#btn'.$_GET['tag'].'").addClass("bg-dark");';
            }
            ?>
    </script>
</body>

</html>