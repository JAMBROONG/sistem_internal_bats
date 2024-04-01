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
<body class="hold-transition bg-info p-5 sidebar-mini   mt-5 bg-info">
    <h3 class="text-center">Special Task BATS Consulting</h3>
    <p class="mb-5 text-center">Semangat <?= $user['employee_name'] ?> !!! :D</p>
    <div class="wrapper shadow rounded bg-white">
        <section class="content p-2">
            <div class="main-body">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Special Task</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Special Task</h3>
                        <button class="btn btn-sm btn-success" type="button" data-toggle="modal" data-target="#modal-addTask"><i class="fa fa-plus mr-2"></i>add Task</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs<?= $dataCategory[6]['id'] ?>" role="tab" aria-controls="vert-tabs-home" aria-selected="true"><?= $dataCategory[6]['category'] ?></a>
                                <?php
                                        $id = $dataCategory[6]['id'];
                                        foreach ($dataCategory as $key) {
                                            if ($key['id'] == $id) {
                                                continue;
                                            } else {?>
                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs<?=$key['id']?>" role="tab" aria-controls="vert-tabs-profile" aria-selected="false"><?= $key['category'] ?></a>
                                <?php
                                            }
                                            ?>
                                <?php
                                        }
                                        ?>
                            </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                    <?php
                                        foreach ($dataCategory  as $key2) {
                                            if ($key2['id'] != $dataCategory[6]['id']) {
                                                ?>
                                    <div class="tab-pane fade" id="vert-tabs<?=$key2['id']?>" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                                        <?php
                                            } else{
                                                ?>
                                                
                                <div class="tab-pane text-left fade active show" id="vert-tabs<?= $dataCategory[6]['id'] ?>" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                                <?php
                                            }
                                        ?>
                                        <table id="table<?=$key2['id']?>" class="table table-hover table-inverse">
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Task</th>
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
                                                $todayDateObj = new \DateTime(date('Y-m-d'));
                                                     $foundedDateObj = new \DateTime(date("Y-m-d", strtotime($row['estimasi'])));
                                                     $interval = $todayDateObj->diff($foundedDateObj);
                                                     $interval = $interval->format('%r%a') . "\n\n";
                                                if ($row['id_category'] != $key2['id']) {
                                                    continue;
                                                }
                                            ?>
                                                <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                    <td><?= $row['task']?></td>
                                                    <td>
                                                        <?php
                                                        if ($row['file'] == "not yet") {
                                                            echo $row['description'];
                                                        } else{
                                                                ?>
                                                                <a href="<?=base_url()?>assets/upload/task/<?=$row['file']?>" download="" class="btn btn-sm btn-success"><i class="fa fa-download mr-2"></i> download file</a>
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
                                                     
                                                     if ($interval == 0) {
                                                        echo '<p class="text-success">Today</p>';
                                                    } else
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
                                                        <div class="d-flex justify-align-around">
                                                            <?php
                                                                    if ($interval < 0) {
                                                                        echo '<p class="text-danger">access expired</p>';
                                                                    } else{
                                                                        if ($row['file'] == "not yet") {
                                                                            ?>
                                                            <a href="<?=base_url('Employee/uploadTask/'.$row['id'])?>" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> do it now</a>
                                                            <?php
                                                                        } 
                                                                            if ($row['status'] != "done") {
                                                                                ?>
                                                                                    <button type="button" data-toggle="modal" data-target="#modal-update<?=$row['id']?>" class="btn btn-sm btn-primary ml-2"><i class="fa fa-edit"></i> update</button>
                                                                                <?php
                                                                            }
                                                                    }
                                                                    
                                                                    ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade" id="modal-update<?=$row['id']?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Are you sure update this Task?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="<?=site_url('Employee/updateTask')?>">
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
                                                                    <textarea name="description" id="summernote<?=$row['id']?>" cols="30" rows="5" required><?=$row['description']?></textarea>
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
                                    </div>
                                    <?php
                                            }
                                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
    </div>
    <div class="modal fade" id="modal-addTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="exampleModalLabel">Add Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Employee/processCreateTask')?>" method="post">
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
                            <textarea name="description" id="summernote" cols="30" rows="5" placeholder="this is.." required></textarea>
                            <input type="hidden" value="<?= date('Y-m-d h:i:s') ?>" class="form-control" required name="estimasi">
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
    <!-- CodeMirror -->
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/codemirror.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/css/css.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/xml/xml.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

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

    <script>$(function () {
            $('#summernote').summernote()
        })
        <?php
        foreach ($dataCategory as $key3) {
            ?> 
        $(function() {
            $("#table<?=$key3['id']?>").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
        });
            <?php
        }
        ?>
        <?php
        foreach ($dataTask as $key4) {
            ?> $(function () {
                $('#summernote<?=$key4['id']?>').summernote()
            })
            <?php
        }
        ?>
        
    </script>
</body>

</html>