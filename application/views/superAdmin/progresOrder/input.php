<div class="tab-content" id="custom-tabs-one-tabContent">
	    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
	        <?php
            $doReport = [];
            $doProcess = [];
            foreach ($report as $row) {
                array_push($doReport,$row['order_step_id']);
            }
            foreach ($dataProcess as $row) {
                array_push($doProcess,$row['order_step_id']);
            }
        ?>
	        <div class="card">
	            <div class="card-header bg-info">
	                <div class="card-title">
	                    <i class="ion ion-clipboard"></i> Data List
	                </div>
	            </div>
	            <div class="card-body table-responsive">
	                <div class="col-md-12 mb-3 d-flex justify-content-center">
	                    <form action="<?= site_url('SuperAdmin/processCreateData/'.$dataOrder['id'].'/'.$dataOrder['user_id']) ?>" method="post">
	                        <label for="">Add data to <strong class="text-danger"><?= $dataOrder['name']?></strong> order <strong class="text-danger"><?= $dataOrder['service_name']?></strong> </label>
	                        <div class="input-group input-group-sm">
	                            <input type="text" class=" form-control" name="data" placeholder="data name..">
	                            <span class="input-group-append">
	                                <button type="submit" class="btn btn-info btn-flat">save</button>
	                            </span>
	                        </div>
	                    </form>
	                </div>
	                <button class="btn btn-default btn-sm checkall d-none"><i class="fa fa-check"></i></button>
	                <form action="<?= site_url('SuperAdmin/processUpdateData/'.$dataOrder['id']) ?>" method="post">
	                    <table id="table_data" class="table table-striped table-inverse ">
	                        <thead class="thead-inverse">
	                            <tr>
	                                <th>No.</th>
	                                <th>Name</th>
	                                <th>Date</th>
	                                <th>Action</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            <?php
                            $no = 1;
                                foreach ($letter as $row) {
                                if ($row['status']=="done") {
                                    ?>
	                            <tr>
	                                <td class="text-center"><?= $no ?></td>
	                                <td>
	                                    <div class="d-flex justify-content-between">
	                                        <div class="">

	                                            <span class="handle ui-sortable-handle">
	                                                <i class="fas fa-ellipsis-v"></i>
	                                                <i class="fas fa-ellipsis-v"></i>
	                                            </span>
	                                            <div class="icheck-primary d-inline ml-2">
	                                                <input type="checkbox" class="list" value="<?= $row['id'] ?>" name="status[]" id="todoCheck<?=$no;?>" checked="">
	                                                <label for="todoCheck<?=$no;?>"></label>
	                                            </div>
	                                            <span class="text"><?= $row['data'] ?></span>
	                                        </div>
	                                    </div>
	                                </td>
	                                <td><small><?= $row['update_date'] ?></small></td>
	                                <td><?php
                                if ($row['data_id']!=1 && $row['data_id'] != 2) {
                                    ?>
	                                    <button type="button" class="btn text-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="text-danger btn-sm"><i class="fa fa-trash"></i> delete</button>
	                                    <?php
                                    }
                                    ?>
	                                </td>
	                            </tr>
	                            <?php
                                $no++;
                                }
                                ?>
	                            <!-- modal for delete order -->
	                            <div class="modal fade " id="modal-delete<?=$row['id']?>">
	                                <div class="modal-dialog">
	                                    <div class="modal-content">
	                                        <div class="modal-header">
	                                            <h4 class="modal-title text-danger">Are you sure?</h4>
	                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                                <span aria-hidden="true">&times;</span>
	                                            </button>
	                                        </div>
	                                        <div class="modal-body">
	                                            <p class="text-dark">Data <strong><?= $row['data'] ?></strong> </p>
	                                        </div>
	                                        <div class="modal-footer justify-content-between">
	                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
	                                            <a href="<?= base_url('SuperAdmin/deleteData/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-danger">Yes delete</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /.modal --> <?php
                            }
                            foreach ($letter as $row) {
                                
                                if ($row['status'] == "not yet") {
                                    ?>

	                            <tr>
	                                <td class="text-center"><?= $no ?></td>
	                                <td>
	                                    <div class="d-flex justify-content-between">
	                                        <div class="">
	                                            <span class="handle ui-sortable-handle">
	                                                <i class="fas fa-ellipsis-v"></i>
	                                                <i class="fas fa-ellipsis-v"></i>
	                                            </span>
	                                            <div class="icheck-primary d-inline ml-2">
	                                                <input type="checkbox" value="<?= $row['id'] ?>" class="list" name="status[]" id="todoCheck<?=$no;?>">
	                                                <label for="todoCheck<?=$no;?>"></label>
	                                            </div>
	                                            <span class="text"><?= $row['data'] ?></span>
	                                        </div>
	                                    </div>
	                                <td><small><?= $row['update_date'] ?></small></td>
	                                <td><?php
                                    if ($row['data_id']!=1 && $row['data_id'] != 2) {
                                        ?>
	                                    <button type="button" class="btn text-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="text-danger btn-sm"><i class="fa fa-trash"></i> delete</button>
	                                    <?php
                                        }
                                        ?>
	                                </td>
	                            </tr>
	                            <?php
                            $no++;
                            }
                            ?>
	                            <!-- modal for delete order -->
	                            <div class="modal fade " id="modal-delete<?=$row['id']?>">
	                                <div class="modal-dialog">
	                                    <div class="modal-content">
	                                        <div class="modal-header">
	                                            <h4 class="modal-title text-danger">Are you sure?</h4>
	                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                                <span aria-hidden="true">&times;</span>
	                                            </button>
	                                        </div>
	                                        <div class="modal-body">
	                                            <p class="text-dark">Data <strong><?= $row['data'] ?></strong> </p>
	                                        </div>
	                                        <div class="modal-footer justify-content-between">
	                                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
	                                            <a href="<?= base_url('SuperAdmin/deleteData/'.$row['id'].'/'.$dataOrder['id'])?>" class="btn btn-danger">Yes delete</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- /.modal --> <?php
                            }
                            ?>
	                        </tbody>
	                    </table>
	                    <button type="submit" class="btn btn-sm btn-success mt-3"><i class="fa fa-save pr-1"></i> save</button>
	                </form>
	            </div>
	        </div>
	        <div class="card">
	            <div class="card-header ui-sortable-handle bg-info" style="cursor: move;">
	                <h3 class="card-title">
	                    <i class="ion ion-clipboard mr-1"></i> Service Contract from <strong>Admin</strong>
	                </h3>
	            </div>
	            <div class="card-body table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Hardfile</th>
	                            <th>Filename</th>
	                            <th>Message</th>
	                            <th>Status</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
                                          $no = 1;
                                          foreach ($dataContract as $key) {
                                              if ($key['from'] == "admin") {
                                              ?>
	                        <tr>
	                            <td><?= $no; ?></td>
	                            <td>
	                                <?php 
                                                    if ($key['sent_hardfile'] == "no") {
                                                        echo'not yet sent';
                                                    } elseif ($key['sent_hardfile'] == "yes") {
                                                        if ($key['receive_hardfile'] == "yes") {
                                                            ?>
	                                <p class="text-success">received on <i class="fa fa-check ml-2"></i>
	                                    <?php
                                                            echo '<small class="text-primary"> ('. date("F j, Y H:i a", strtotime($key['receive_date'])).')</small></p>';
                                                        } else{
                                                            echo 'sent on <small class="text-primary">('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                                        }
                                                    }
                                                    ?>
	                            </td>
	                            <td>
	                                <p><?=$key['filename']?></p>
	                            </td>
	                            <td><?=$key['message']?></td>
	                            <td>
	                                <?php
                                                    if ($key['status'] == "do") {
                                                        echo '<p class="text-warning">not fixed</p>';
                                                    } else{
                                                        echo '<p class="text-success">fixed <i class="fa fa-check"></i></p>';
                                                    }
                                                    ?>
	                            </td>
	                            <td>
	                                <?php
                                                            if ($key['softfile'] != "") { ?>
	                                <a href="<?= base_url();?>assets/upload/doc/<?=$key['softfile']?>" download class="btn btn-sm btn-primary mr-2"><i class="fa fa-download"></i></a>
	                                <?php
                                                                } else{?>
	                                <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
	                                <?php
                                                                }
                                                            ?>
	                            </td>
	                        </tr>
	                        <?php
                                              $no++;
                                                }
                                          }
                                          ?>

	                    </tbody>
	                </table>
	            </div>
	        </div>
	        <div class="card">
	            <div class="card-header ui-sortable-handle bg-info" style="cursor: move;">
	                <h3 class="card-title">
	                    <i class="ion ion-clipboard mr-1"></i> Service Contract from <strong>Client</strong>
	                </h3>
	            </div>
	            <div class="card-body table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Hardfile</th>
	                            <th>Filename</th>
	                            <th>Message</th>
	                            <th>Status</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
                                          $no = 1;
                                          foreach ($dataContract as $key) {
                                              if ($key['from'] == "client") {
                                              ?>
	                        <tr>
	                            <td><?= $no; ?></td>
	                            <td>
	                                <?php 
                                                    if ($key['sent_hardfile'] == "no") {
                                                        echo'not yet sent';
                                                    } elseif ($key['sent_hardfile'] == "yes") {
                                                        if ($key['receive_hardfile'] == "yes") {
                                                            ?>
	                                <p class="text-success">received on <i class="fa fa-check ml-2"></i>
	                                    <?php
                                                            echo '<small class="text-primary"> ('. date("F j, Y H:i a", strtotime($key['receive_date'])).')</small></p>';
                                                        } else{
                                                            echo 'sent on <small class="text-primary">('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                                        }
                                                    }
                                                    ?>
	                            </td>
	                            <td>
	                                <p><?=$key['filename']?></p>
	                            </td>
	                            <td><?=$key['message']?></td>
	                            <td>
	                                <?php
                                                    if ($key['status'] == "do") {
                                                        echo '<p class="text-warning">not fixed</p>';
                                                    } else{
                                                        echo '<p class="text-success">fixed <i class="fa fa-check"></i></p>';
                                                    }
                                                    ?>
	                            </td>
	                            <td>
	                                <?php
                                                            if ($key['softfile'] != "") { ?>
	                                <a href="<?= base_url();?>assets/upload/doc/<?=$key['softfile']?>" download class="btn btn-sm btn-primary mr-2"><i class="fa fa-download"></i></a>
	                                <?php
                            } else{?>
	                                <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
	                                <?php
                                }
                            ?>
	                            </td>
	                        </tr>
	                        <?php
                            $no++;
                            }
                        }
                        ?>

	                    </tbody>
	                </table>
	            </div>
	        </div>

	        <div class="card">
	            <div class="card-header ui-sortable-handle bg-info" style="cursor: move;">
	                <h3 class="card-title">
	                    <i class="ion ion-clipboard mr-1"></i> Invoices
	                </h3>
	            </div>
	            <div class="card-body table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Hardfile</th>
	                            <th>Filename</th>
	                            <th>Message</th>
	                            <th>Status</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
                            $no = 1;
                            foreach ($dataInvoice as $key) {
                                ?>
	                        <tr>
	                            <td><?= $no; ?></td>
	                            <td>
	                                <?php 
                            if ($key['sent_hardfile'] == "no") {
                                echo'not yet sent';
                            } elseif ($key['sent_hardfile'] == "yes") {
                                if ($key['receive_hardfile'] == "yes") {
                                    ?>
	                                <p class="text-success">received on <i class="fa fa-check ml-2"></i></p>
	                                <?php
                                } else{
                                    echo 'sent on <small class="text-primary">('. date("F j, Y H:i a", strtotime($key['sent_date'])).')</small>';
                                }
                            }
                            ?>
	                            </td>
	                            <td>
	                                <p><?=$key['filename']?></p>
	                            </td>
	                            <td><?=$key['message']?></td>
	                            <td>
	                                <?php
                                if ($key['status'] == "do") {
                                    echo '<p class="text-warning">not fixed</p>';
                                } else{
                                    
                                    echo '<p class="text-success">fixed <i class="fa fa-check"></i></p>';
                                }
                                ?>
	                            </td>
	                            <td>

	                                <?php
                                 if ($key['softfile'] != "") { ?>
	                                <a href="<?= base_url();?>assets/upload/invoice/<?=$key['softfile']?>" download class="btn btn-sm btn-primary mr-2"><i class="fa fa-download"></i></a>
	                                <?php
                                } else{?>
	                                <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
	                                <?php
                                    }
                                ?>

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
	        <div class="card">
	            <div class="card-header bg-info">
	                <div class="card-title">
					<i class="ion ion-clipboard mr-1"></i> Proff of Payment
	                </div>
	            </div>
	            <div class="card-body">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Filename</th>
	                            <th>Message</th>
	                            <th>Date</th>
	                            <th>Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php
                                          $no = 1;
                                          foreach ($dataPayment as $key) {
                                              ?>
	                        <tr>
	                            <td><?= $no; ?></td>
	                            <td>
	                                <p><?=$key['filename']?></p>
	                            </td>
	                            <td><?=$key['message']?></td>
	                            <td>
	                                <?php
                                                            echo '<small class="text-primary">'. date("F j, Y H:i a", strtotime($key['create_date'])).'</small>';
                                                            ?>
	                            </td>
	                            <td>
	                                <?php
                                                            if ($key['softfile'] != "") { ?>
	                                <a class="btn btn-sm btn-primary mr-2" href="<?= base_url();?>assets/upload/doc/<?=$key['softfile']?>" download><i class="fa fa-download"></i></a>
	                                <?php
                                                                } else{?>
	                                <a class="btn btn-sm btn-secondary mr-2 btn-disabled" data-toggle="modal" data-target="#modal-noDownload"><i class="fa fa-download"></i></a>
	                                <?php
                                                                }
                                                            ?>
	                            </td>
	                        </tr>
	                        <div class="modal fade " id="modal-approved<?=$key['id']?>">
	                            <div class="modal-dialog">
	                                <div class="modal-content">
	                                    <div class="modal-header">
	                                        <h4 class="modal-title">Explanation</h4>
	                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                                            <span aria-hidden="true">&times;</span>
	                                        </button>
	                                    </div>
	                                    <div class="modal-body">
	                                        <p class="text-danger">You hereby approve the files you receive.</p>
	                                        <a href="<?= base_url('Client/turnFixInvoice/'.$key['id']);?>" class="btn btn-sm btn-success mr-2"><i class="fa fa-save mr-2"></i>approved</a>
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
	        <div class="card">
	            <div class="card-header ui-sortable-handle bg-info" style="cursor: move;">
	                <h3 class="card-title">
	                    <i class="ion ion-clipboard mr-1"></i> Other Files
	                </h3>
	            </div>
	            <div class="card-body table-responsive">
	                <table class="table table-striped">
	                    <thead>
	                        <tr>
	                            <th>No</th>
	                            <th>Filename</th>
	                            <th>Description</th>
	                            <th>Link</th>
	                            <th>Date</th>
	                        </tr>
	                    </thead>
	                    <tbody> <?php
                    $no = 1;
                    if (empty($dataFile)) {
                        ?> <tr role="row" class="odd">
	                            <td class="dtr-control sorting_1" tabindex="0" colspan="6">
	                                <h5 class="text-center">Data not yet</h5>
	                            </td>
	                        </tr> <?php
                            }
                            else{
                            foreach ($dataFile as $row) {
                        ?> <tr role="row" class="odd">
	                            <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
	                            <td><?= $row['filename']?></td>
	                            <td><?= $row['description']?></td>
	                            <td><?= $row['link']?> <a href="<?= $row['link']?>" target="blank"><i class="fa fa-external-link-alt ml-2"></i></a></td>
	                            <td><?= date("F j, Y, g:i a",strtotime($row['create_date'])); ?></td>
	                        </tr>
	                        <?php
                            $no++;
                            }
                            }
                        ?>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>