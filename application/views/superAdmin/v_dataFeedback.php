<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Feedback</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <?php include 'header.php'; ?> 
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
                                <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Select Order</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 table-responsive">
                                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline border-0" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Service</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Company</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Partner</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody> <?php
                                                        $no = 1;
                                                        if (empty($dataOrder)) {
                                                            ?> <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0" colspan="6">
                                                        <h5 class="text-center">Data not yet</h5>
                                                    </td>
                                                </tr> <?php
                                                        }
                                                        else{
                                                        foreach ($dataOrder as $row) {
                                                    ?> <tr role="row" class="odd">
                                                    <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                    <td><?= $row['name']?></td>
                                                    <td><?= $row['service_name']?></td>
                                                    <td><?= $row['company']?></td>
                                                    <td><?= $row['employee_name']?></td>
                                                    <td><?= date("F j, Y, g:i a",strtotime($row['create_date'])); ?></td>
                                                    <td>
                                                            <a href="<?= base_url('superAdmin/feedbackOrder/'.$row['id']) ?>" class="btn btn-sm btn-success mr-2 d-flex align-items-center"><i class="fa fa-eye mr-2"></i> feedback</a>
                                                    </td>
                                                </tr> <?php
                                                        $no++;
                                                        }
                                                        }
                                                    ?> </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    
    <?php include 'footer.php'; ?>
</body>

</html>