<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
    <div class="card card-default shadow-none">
        <div class="card">
            <div class="card-header border-0 bg-info">
                <h3 class="card-title">Progress this service</h3>
            </div>
            <div class="card-body table-responsive">
                <div class="d-flex">
                    <a href="<?= base_url('SuperAdmin/createProgress/'. $dataOrder['id']) ?>" target="blank" class="btn btn-sm btn-success"><i class="fa fa-plus mr-2"></i>create progress</a>
                </div>
                <table id="table_process" class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Step</th>
                            <th>Activities</th>
                            <th>Status</th>
                            <th>Estimasi</th>
                            <th>Employee</th>
                            <th>Action</th>
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
                            <td>
                                <a href="<?= base_url('SuperAdmin/updateProgress/'.$row['id']).'/'.$dataOrder['id'];?>" class="text-primary mr-1">detail</a>
                            </td>
                        </tr> <?php
                            }
                            ?> 
                        </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-0  bg-info">
                <h3 class="card-title">Create Progress</h3>
            </div>
            <div class="card-body">
                <form action="<?= site_url('SuperAdmin/processCreateProgress/'.$dataOrder['id']) ?>" method="post" class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sub Step</label>
                            <input type="hidden" name="" value="<?= $dataOrder['id'] ?>">
                            <select class="form-control" name="order_step_id" style="width: 100%;"> <?php
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
                            <select class="form-control" name="employee" style="width: 100%;"> <?php
                                    foreach ($dataStaff as $row) {
                                        echo '<option value="'.$row['id_employee'].'">'.$row['employee_name'].'</option>';
                                    }
                                    ?> </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" style="width: 100%;">
                                <option value="do">Do<i class="fas fa-cog fa-spin text-warning"></i></option>
                                <option value="done">Done<i class="fas fa-check-square text-success"></i></option>
                            </select>
                        </div>
                        <a href="<?=base_url('SuperAdmin/dataOrder') ?>" class="btn btn-danger  btn-sm"><i class="fa fa-arrow-left pr-1"></i> back</a>
                        <button type="submit" class="btn btn-sm pl-1 pr-1 btn-success"><i class="fa fa-save pr-1"></i> save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>