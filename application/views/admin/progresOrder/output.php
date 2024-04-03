<div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
    <div class="card card-default shadow-none">
        <div class="card-header bg-danger border-0">
            <h5 class="card-title">Output <strong><?= $percentoutput; ?>%</strong></a></h5>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus text-white"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times text-white"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card card-info">
                <div class="card-header border-0">
                    <h3 class="card-title">All Report
                        <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-AllReport"><i class="fa fa-question"></i></a>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table id="table_AllReport" class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Activities</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Review by Ceo</th>
                                <th>Review by Supervisor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> <?php
                                $no = 1;
                                foreach ($report as $row) {
                                ?> 
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row['subStep']?></td>
                                <td><?=$row['message']?></td>
                                <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                <td>
                                    <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1"></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                </td>
                                <td>
                                    <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around">
                                        <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"></i></a>
                                        <a href="<?= base_url('Admin/updateReport/'.$row['id']) ?>" class="btn mr-1 btn-sm btn-success">update</a>
                                        <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-report<?=$row['id']?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- modal for delete report -->
                            <div class="modal fade " id="modal-delete-report<?=$row['id']?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-danger">Are you sure delete this report?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-dark">Sub Step: <br><strong><?= $row['subStep'] ?></strong> </p>
                                            <p class="text-dark">Message: <br><strong><?= $row['message'] ?> </strong> </p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('Admin/deleteReport/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal --> <?php
                                $no++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow-none">
            <div class="card-body">
                <div class="card">
                    <div class="card-header border-0  bg-info">
                        <h3 class="card-title">Create Report & Timeline Review</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus text-white"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('Admin/processCreateReport') ?>" method="post" class="row" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <h5 class="text-center">To Report</h5>
                                <div class="form-group">
                                    <label>Select Process</label>
                                    <input type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                    <select class="form-control select2" name="process_id" style="width: 100%;"> <?php
                                                        foreach ($dataProcessDone as $row) {
                                                            if (in_array($row['order_step_id'],$doReport)) {
                                                                continue;
                                                            }
                                                            echo '<option value="'.$row['id'].'">'.$row['subStep'].'</option>';
                                                        }
                                                        ?> </select>
                                </div>
                                <div class="form-group">
                                    <label>Message to this report</label>
                                    <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="message.."></textarea>
                                </div>
                                <div class="input-group">
                                    <p>Format: <small class=" text-danger">pdf / jpg / png / jpeg / xlsx / doc / odt</small></p>
                                    <input type="file" name="image" class="file">
                                    <div class="input-group">
                                        <input required type="text" class="form-control" disabled placeholder="Upload Gambar" id="file">
                                        <div class="input-group-append">
                                            <button type="button" id="pilih_gambar" class="browse btn btn-dark">Select File</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">To Review</h5>
                                <div class="form-group">
                                    <label>Ending Date</label>
                                    <input type="date" name="ending_date" class="form-control" id="">
                                </div>
                                <a href="<?=base_url('Admin/dataOrder') ?>" class="btn btn-danger  btn-sm"><i class="fa fa-arrow-left pr-1"></i> back</a>
                                <button type="submit" class="btn btn-sm pl-1 pr-1 btn-success"><i class="fa fa-save pr-1"></i> save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header border-0">
                        <h3 class="card-title">Final Report <a type="button" class="btn p-0 text-warning btn-sm" data-toggle="modal" data-target="#modal-finalReport"><i class="fa fa-question"></i></a></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus text-white"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times text-white"></i>
                            </button>
                        </div>
                        </h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="table_AllReport" class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Activities</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Review by Supervisor</th>
                                    <th>Review by Ceo</th>
                                    <th>Review by Client</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                                            $no = 1;
                                            foreach ($report as $row) {
                                                if ($row['review_supervisor'] == "do" && $row['review_ceo'] == "done" && $row['review_status'] == "done") {
                                            ?> <tr>
                                    <td><?=$no?></td>
                                    <td><?=$row['subStep']?></td>
                                    <td><?=$row['message']?></td>
                                    <td><?= date("F j, Y", strtotime($row['update_date']))?></td>
                                    <td>
                                        <?php
                                                    if ($row['review_supervisor'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                                    if ($row['review_ceo'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                                    if ($row['review_status'] == 'do') {
                                                        echo'<p class="text-warning">do <i class="fa fa-cog ml-1" ></i></p>';
                                                    } else{
                                                        echo'<p class="text-success">done <i class="fa fa-check ml-1" ></i></p>';
                                                    }
                                                    ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="<?=base_url()?>assets/upload/report/<?=$row['report']?>" class="btn mr-1 btn-sm btn-primary" download><i class="fa fa-download"><small class="ml-2">download</small></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- modal for delete report -->
                                <div class="modal fade " id="modal-reviewCeo<?=$row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger">Are you sure?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Reports that have been approved will be sent directly to the client for approval.</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('Admin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Approved</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="modal-NreviewCeo<?=$row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger">Are you sure?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>With this you will remove approval on this report.</p>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('Admin/approveReport/'.$row['review_id'].'/'.$dataOrder['id'])?>" class="btn btn-success">Yes Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal --> <?php
                                            $no++;
                                                    }
                                            }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-info">
                    <div class="card-header border-0">
                        <h3 class="card-title">Schedule Meeting</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus text-white"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <button data-toggle="modal" class="btn btn-sm btn-success mb-2" data-target="#modal-addMeeting"><i class="fa fa-plus"></i> add data</button>
                        </div>
                        <table id="table_meeting" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                              $no = 1;
                                              foreach ($dataMeeting as $row) {
                                              ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$row['via']?></td>
                                    <td><?=$row['link']?></td>
                                    <td><?=$row['date']?></td>
                                    <td><?=$row['message']?></td>
                                    <td><?=$row['status']?></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger mr-2" data-toggle="modal" data-target="#modal-deleteMeeting<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-editMeeting<?=$row['id']?>"><i class="fa fa-edit"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade " id="modal-deleteMeeting<?=$row['id']?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-danger">Are you sure to Delete?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('Admin/deleteMeeting/'.$row['id'].'/'.$dataOrder['id']) ?>" class="btn btn-success">Yes Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="modal-editMeeting<?=$row['id']?>">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Are you sure to Update?</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card shadow-none">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Meeting room</h5>
                                                                <p class="card-text  text-muted"><?=$row['via']?></p>
                                                                <h5 class="card-title">Link/Address</h5>
                                                                <p class="card-text  text-muted"><?=$row['link']?></p>
                                                                <h5 class="card-title">Date</h5>
                                                                <p class="card-text  text-muted"><?=$row['date']?></p>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5 class="card-title">Permission display</h5> <?php
                                                                        if ($row['permission'] == 'no') {
                                                                            ?> <small class="text-danger ml-3"><strong>not approved </strong>
                                                                            <i class="fas fa-times-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a data-toggle="modal" data-target="#modal-updatePermission" class="btn btn-sm btn-success">turn on</a> <?php
                                                                        } else
                                                                        {
                                                                            ?> <small class="text-success ml-3"><strong>approved </strong>
                                                                            <i class="fa fa-check-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a href="<?= base_url('Admin/updateStatusMeetingP/'.$row['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-danger">turn off</a>
                                                                        <p class="text-danger">if it is disabled, the user cannot specify the meeting.</p> <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="card-title">Fixed meeting</h5> <?php
                                                                        if ($row['fixed'] == 'no') {
                                                                            ?> <small class="text-danger ml-3"><strong>not fixed </strong>
                                                                            <i class="fas fa-times-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a data-toggle="modal" data-target="#modal-updateFixed" class="btn btn-sm btn-success">turn on</a> <?php
                                                                        } else
                                                                        {
                                                                            ?> <small class="text-success ml-3"><strong>fixed </strong>
                                                                            <i class="fa fa-check-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a href="<?= base_url('Admin/updateStatusMeetingF/'.$row['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-danger">turn off</a>
                                                                        <p class="text-danger">if it is deactivated, the meeting schedule can be changed again.</p><?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <br>
                                                                        <h5 class="card-title">Status Meeting</h5>
                                                                        <?php
                                                                                if ($row['status'] == 'do') {
                                                                                    ?> <small class="text-warning ml-3"><strong>do</strong>
                                                                            <i class="fas fa-times-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a href="<?= base_url('Admin/updateStatusMeeting/'.$row['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-success">turn done</a>
                                                                        <?php
                                                                                } else
                                                                                {
                                                                                    ?> <small class="text-success ml-3"><strong>done</strong>
                                                                            <i class="fa fa-check-circle"></i>
                                                                        </small>
                                                                        <br>
                                                                        <a href="<?= base_url('Admin/updateStatusMeeting/'.$row['id'].'/'.$dataOrder['id']) ?>" class="btn btn-sm btn-danger">turn do</a>
                                                                        <?php
                                                                                }
                                                                                ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card card-info">
                                                            <div class="card-body"> <?php
                                                                        if ($row['fixed'] == 'yes') {
                                                                            ?> <form action="<?=base_url('Admin/updateMeeting')?>" method="post">
                                                                    <div class="form-group">
                                                                        <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                        <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                        <label for="my-input">Meeting room</label>
                                                                        <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="my-input">Link/address</label>
                                                                        <textarea name="link" id="" cols="30" rows="3" class=" form-control" disabled><?=$row['link']?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="my-input">Date</label>
                                                                        <div class="d-flex">
                                                                            <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>" disabled>
                                                                            <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i:s", strtotime($row['date'])); ?>" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <p class="text-danger">the final meeting has been agreed</p>
                                                                </form> <?php
                                                                        } else
                                                                        {
                                                                            ?>
                                                                <form action="<?=base_url('Admin/updateMeeting')?>" method="post">
                                                                    <div class="form-group">
                                                                        <input id="my-input" class="form-control" type="hidden" name="id" value="<?=$row['id']?>">
                                                                        <input id="my-input" class="form-control" type="hidden" name="order_id" value="<?= $dataOrder['id'] ?>">
                                                                        <label for="my-input">Meeting room</label>
                                                                        <input id="my-input" class="form-control" type="text" name="via" value="<?=$row['via']?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="my-input">Link/address</label>
                                                                        <textarea name="link" id="" cols="30" rows="3" class=" form-control"><?=$row['link']?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="my-input">Date</label>
                                                                        <div class="d-flex">
                                                                            <input id="my-input" class="form-control" type="date" name="date" value="<?= date("Y-m-d", strtotime($row['date'])); ?>">
                                                                            <input id="my-input" class="form-control" type="time" name="time" value="<?= date("H:i:s", strtotime($row['date'])); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save mr-2"></i> save</button>
                                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                </form> <?php
                                                                        }
                                                                        ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                </div>
            </div>
        </div>
        <div class="card card-default shadow-none">
            <div class="card-body">
                <div class="card bg-danger p-5">
                    <div class="card-body text-center">
                        <h4>Turn FINISH Order</h4>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-turnFinish">Done <i class="fa fa-check ml-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>