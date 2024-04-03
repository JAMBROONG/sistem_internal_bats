<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Feedback</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <style>
        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        /* Styling h1 and links
––––––––––––––––––––––––––––––––– */
        .starrating>input {
            display: none;
        }

        /* Remove radio buttons */
        .starrating>label:before {
            content: "\f005";
            /* Star */
            margin: 2px;
            font-size: 1.5em;
            font-family: FontAwesome;
            display: inline-block;
        }

        .starrating>label {
            color: darkslategray;
            /* Start color when not clicked */
        }

        .starrating>input:checked~label {
            color: #ffca08;
        }

        /* Set yellow color when star checked */
        .starrating>input:hover~label {
            color: #ffca08;
        }

        /* Set yellow color when star hover */
    </style>
    <?php include 'header.php';?>
</head>

<body class="hold-transition">
    <div class="wrapper">
        <?php
        include 'navbar.php';
        ?>  
        <div class="content-wrapper bg-white">
            <section class="content pt-3">
                    
                    <div class="container">
                        <div class="main-body">
                            <nav aria-label="breadcrumb" class="main-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Home</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('Client/feedback_home')?>">Feedback</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                                </ol>
                            </nav>
                        </div>
                    <?php 
                            ?> 
                    <?php
                    if ($selected['statusOrder_id'] == 1) {
                        echo '
                        <div class="card">
                            <div class="card-header  pt-3" style="background-color: #1A1A1A;">
    
                            </div>
                            <div class="card-body text-center">
                                <div>
                                    <h2 class="" style="color: #1A1A1A;">feedback will be available when the selected service is finished</h2>
                                    <p class="lead">Let Us Know Your Problem!<br>Phone: <a href="https://wa.me/628161105174">+6281 6110 5174</a></p>
                                </div>
                            </div>
                        </div>
                        </div>
                        </section>
                        </div>
                        ';
                    } else{
                        
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header text-white border-0" style="background-color: #1A1A1A;">
                                    <h5 class="card-title">Send your feedback to Employye</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <?php
                                        $no = 1;
                                        foreach ($staff as $row) {
                                           ?>
                                        <div class="col-md-2" style="text-align: center;">
                                            <a href="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" data-toggle="lightbox" data-title="sample '<?=$no?>' - white" data-gallery="gallery">
                                                <img src="<?php echo base_url(); ?>assets/upload/images/employee/<?=$row['image']?>" class="img-fluid mb-2 rounded" style="height: 150px;" alt="white sample">
                                            </a><br>
                                            <label for=""><?=$row['employee_name']?></label>
                                        </div>
                                        <?php
                                           $no++;
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="info-box m-2 col-md-2">
                                            <span class="info-box-icon bg-success elevation-1">5</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Very Good</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(5/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col-md-2">
                                            <span class="info-box-icon bg-primary elevation-1">4</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Good</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(4/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col-md-2">
                                            <span class="info-box-icon bg-warning elevation-1">3</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Moderately Good</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(3/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col-md-2">
                                            <span class="info-box-icon bg-orange elevation-1">2</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Bad</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(2/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <div class="info-box m-2 col-md-2">
                                            <span class="info-box-icon bg-danger elevation-1">1</span>
                                            <div class="info-box-content">
                                                <span class="info-box-text text-bold">Very Bad</span>
                                                <span class="info-box-number">
                                                    <i class="fa fa-star text-warning"></i>
                                                </span>
                                                <small>(1/5)</small>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <form action="<?= site_url('Client/processCreateFeedback') ?>" method="post" class="m-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Select Employee</label>
                                            <select class="custom-select form-control-border" name="employee_id" id="exampleSelectBorder"> <?php
                                                $staffOld = [];
                                                foreach ($staff2 as $key) {
                                                    array_push($staffOld,$key['employee_id']);
                                                }
                                                $staffOld = array_unique($staffOld);
                                                foreach ($staff as $row) {
                                                    if (in_array($row['id_employee'],$staffOld)) {
                                                        continue;
                                                    }
                                                    echo'<option value="'.$row['id_employee'].'">'.$row['employee_name'].'</option>     ';
                                                }
                                                ?> </select>
                                            <input type="hidden" name="categoryFeedback_id" value="1">
                                            <input type="hidden" name="order_id" value="<?=$selected['id']?>">
                                            <!-- <div class="form-group d-flex justify-content-center">
                                                <span class="myratings">5</span>
                                            </div> -->
                                        </div>
                                        <div class="form-group">

                                            <?php
                                            $no = 1;
                                            $no2 = 1;
                                            $no3 =1;
                                            $data = "";
                                            foreach ($criteria as $row) {
                                                if ($row['category_criteria'] != $data) {
                                                    $no = 1;
                                                    echo ' <label for="" class=" mt-2">'. $row['category_criteria'].'</label>';
                                                }
                                                ?>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h6 for="" class="mr-3"><?= $no.'. '. $row['criteria'] ?></h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="icheck-success d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="5<?=$row['id']?>" required id="radioSuccess<?=$no2+1?>">
                                                        <label for="radioSuccess<?=$no2+1?>"> 5 </label>
                                                    </div>
                                                    <div class="icheck-lightblue d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="4<?=$row['id']?>" required id="radioSuccess<?=$no2+2?>">
                                                        <label for="radioSuccess<?=$no2+2?>"> 4 </label>
                                                    </div>
                                                    <div class="icheck-warning d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="3<?=$row['id']?>" required id="radioSuccess<?=$no2+3?>">
                                                        <label for="radioSuccess<?=$no2+3?>"> 3 </label>
                                                    </div>
                                                    <div class="icheck-orange d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="2<?=$row['id']?>" required id="radioSuccess<?=$no2+4?>">
                                                        <label for="radioSuccess<?=$no2+4?>"> 2 </label>
                                                    </div>
                                                    <div class="icheck-danger d-inline">
                                                        <input type="radio" name="rating<?=$no3?>" value="1<?=$row['id']?>" required id="radioSuccess<?=$no2+5?>">
                                                        <label for="radioSuccess<?=$no2+5?>"> 1 </label>
                                                    </div>
                                                </div>
                                            </div> <?php
                                                $no++;
                                                $no3++;
                                                $no2 = $no2 +6;
                                                $data = $row['category_criteria'];
                                            }
                                            ?> <input type="hidden" name="total" value="<?=$no3-1?>">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="feedback" placeholder="Your feedback ..." style="height: 107px;" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm pr-3 pl-3">send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-info">
                                <div class="card-header border-0">
                                    <h5 class="card-title">Send your wishes for BATS Consulting</h5>
                                </div>
                                <div class="card-body"> <?php 
                                    if ($validate > 0) {
                                        ?> <div class="text-center">
                                        <h4 class="text-success"><strong>Thank You!</strong></h4>
                                        <p>You have sent feedback for the company.</p>
                                        <h1><?= $dataFeedbackC['star'] ?></h1>
                                    </div>
                                    <div class="d-flex justify-content-center"> <?php
                                            for ($i=1; $i <=$dataFeedbackC['star'] ; $i++) { 
                                                echo'<i class=" fa fa-star text-warning"></i>';
                                            }
                                            ?> </div>
                                    <div class="text-center">
                                        <small class="text-center"><?=$dataFeedbackC['feedback']?></small><br>
                                        <small class="text-center"><?= date("F j, Y, g:i a", strtotime($dataFeedbackC['create_date']));?></small>
                                    </div> <?php
                                    }
                                    else{
                                        ?> <form action="<?= site_url('Client/processCreateFeedbackC') ?>" method="POST">
                                        <div class="form-group text-center">
                                            <label for="exampleSelectBorder">Your hope for BATS Consulting in the future</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="container">
                                                <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                    <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star" class="ml-2">5</label>
                                                    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star" class="ml-2">4</label>
                                                    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star" class="ml-2">3</label>
                                                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star" class="ml-2">2</label>
                                                    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1</label>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="categoryFeedback_id" value="2">
                                        <input type="hidden" name="order_id" value="<?=$selected['id']?>">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" name="feedback" placeholder="I hope.." style="height: 107px;" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm pr-3 pl-3">send</button>
                                    </form> <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card card-info">
                                <div class="card-header border-0">
                                    <h5 class="card-title">All feedback</h5>
                                </div>
                                <div class="card-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline " role="grid" aria-describedby="example1_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Employee</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Star</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Update Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody> <?php
                                              $no = 1;
                                              
                                              foreach ($dataFeedback as $row) {
                                              ?> <tr role="row" class="odd">
                                                            <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                                            <td><?= $row['employee_name']?></td>
                                                            <td><?php
                                                                for ($i=0; $i < $row['star']; $i++) { 
                                                                    echo '<i class="fa fa-star text-warning"></i>';
                                                                }
                                                                
                                                                ?></td>
                                                            <td><?= date("F j, Y, g:i a",strtotime($row['update_date'])); ?></td>
                                                            <td>
                                                                <div class="d-flex justify-content-around">
                                                                    <a href="<?php echo base_url('Client/detailFeedback/'.$row['id']); ?>"><i class="fa fa-book-reader p-2 text-primary"></i>detail</a>
                                                                </div>
                                                            </td>
                                                        </tr> <?php
                                              $no++;
                                              }
                                              ?> </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th rowspan="1" colspan="1">No.</th>
                                                            <th rowspan="1" colspan="1">Employee</th>
                                                            <th rowspan="1" colspan="1">Star</th>
                                                            <th rowspan="1" colspan="1">Update Date</th>
                                                            <th rowspan="1" colspan="1">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <div class="d-flex justify-content-start">
                                                    <a href="<?php echo base_url('Client    ')?>" class="btn btn-danger pl-3 pr-3"><i class="mr-2 fa fa-arrow-left"></i> back</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </section>
        </div>
        <?php include 'footer.php';?>
        <script>
            
            $('#nav_feedback').addClass('nav_select');
        </script>
</body>

</html>