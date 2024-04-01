<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info">
                Data Guest
            </div>
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="row col-12">
                            <div class="col-sm-12">
                                <table
                                    id="example1"
                                    class="table border-0 table-striped dataTable dtr-inline"
                                    role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Update Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                              $no = 1;
                                              foreach ($dataClient as $row) {
                                              ?>
                                        <tr role="row" class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0"><?= $no;?></td>
                                            <td><?= $row['name']?></td>
                                            <td><?= $row['company']?></td>
                                            <td><?= $row['email']?></td>
                                            <td><?= date("F j, Y, g:i a",strtotime($row['create_date'])); ?></td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <a href="<?php echo base_url('Admin/updateClient/'.$row['id']); ?>" class="btn btn-sm">
                                                        <i class="fas fa-edit text-primary"></i>
                                                    </a>
                                                    <a type="button" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>" class="btn btn-sm">
                                                        <i class=" far fa-trash-alt text-danger"></i>
                                                    </a>
                                                    <a href="<?=base_url('Admin/guestTHC/'.$row['id'].'/'.md5(122))?>" class="btn btn-success btn-sm">
                                                        <i class=" fas fa-book-medical mr-2"></i> view
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- modal for delete order -->
                                        <div class="modal fade" id="modal-delete<?=$row['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger">Are you sure delete this user?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Client
                                                            <strong><?= $row['name'] ?>
                                                            </strong>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a
                                                            href="<?= base_url('Admin/deleteClient/'.$row['id']); ?>"
                                                            class="btn btn-danger">Yes delete</a>
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
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>