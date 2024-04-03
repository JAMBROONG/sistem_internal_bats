<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Training Material
                </h3>
            </div>
            <div class="card-body">
                <?php
                                    if (!$category) {
                                        ?>
                <form action="<?= base_url('SuperAdmin/training') ?>" method="post">
                    <small class="text-danger">*Please select category</small>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <select name="category-title" class="select2" style="width:100%" id="">
                                    <?php
                                                            foreach ($data_category as $key) {
                                                                ?>
                                    <option value="<?= $key ['id']?>">
                                        <a class="nav-link text-dark" href="#tab<?=$key['id']?>" data-toggle="tab"><?= $key['content_training_category'] ?></a>
                                    </option>
                                    <?php
                                                            }
                                                            ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <button class="btn btn-success btn-block" type="submit">Go</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                                    } else{
                                        ?>

                <div class="d-flex mb-2 justify-content-end">
                    <a href="<?= base_url('SuperAdmin/preview_training/'.$category_title['id']) ?>" class="btn btn-sm btn-warning mr-2 d-flex align-items-center" target="blank"><i class="fa fa-eye mr-1"></i> preview <?= $category_title['content_training_category']?></a>
                    <button class="btn btn-sm btn-info mr-2" data-toggle="modal" data-target="#modal-crudCategory"><i class="fa fa-pen mr-1"></i> Category</button>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-crudLevel"><i class="fa fa-pen mr-1"></i> Level</button>
                    <button class="btn btn-sm btn-success ml-2" data-toggle="modal" data-target="#modal-add"><i class="fa fa-plus mr-1"></i> Create Title</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?= base_url('SuperAdmin/training') ?>" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="category-title" class="select2" style="width:100%" id="">
                                            <option value="<?= $category_title['id']?>"><?= $category_title['content_training_category']?> (<?= $total_data ?>) ✅</option>
                                            <?php
                                                                foreach ($data_category as $key) {
                                                                    if ($key['id'] == $category_title['id']) {
                                                                        continue;
                                                                    }
                                                                    ?>
                                            <option value="<?= $key ['id']?>">
                                                <a class="nav-link text-dark" href="#tab<?=$key['id']?>" data-toggle="tab"><?= $key['content_training_category'] ?></a>
                                            </option>
                                            <?php
                                                                }
                                                                ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button class="btn btn-default" type="submit"><i class="fas fa-sync"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table id="tabel_materi" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-sm p-1">#</th>
                            <th class="text-sm p-1">Title</th>
                            <th class="text-sm p-1">Description</th>
                            <th class="text-sm p-1">Level</th>
                            <th class="text-sm p-1">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                                    $no = 1;
                                                    foreach ($title_content as $row) {
                                                        ?>
                        <tr>
                            <th scope="row"><?=$no?></th>
                            <td class="text-sm p-1"><?= $row['content_title'] ?></td>
                            <td class="text-sm p-1"><?php
                                                echo substr($row['content_description'],0,100);
                                                ?>..
                            </td>
                            <td class="text-sm p-1"><?= $row['content_level'] ?></td>
                            <td class="text-sm p-1">
                                <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-update<?=$row['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-delete<?=$row['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                <a class="btn btn-sm btn-info m-1" href="<?= base_url('SuperAdmin/content_training/'.$row['id']) ?>"> <i class="fa fa-cogs mr-1"></i> contents</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-delete<?=$row['id']?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Are you sure delete this Title?</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-dark">Title: <br> <?= $row['content_title'] ?></p>
                                        <p class="text-dark text-justify">Description: <br> <small><?= $row['content_description'] ?></small></p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('SuperAdmin/delete_content_title/'.$row['id'].'/'.$category_title['id']); ?>" class="btn btn-danger">Yes delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-update<?=$row['id']?>">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Title</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?=base_url('SuperAdmin/update_content_title')?>" method="post">
                                            <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Title</label>
                                                        <input type="text" class="form-control" value="<?=$row['content_title']?>" name="content_title">
                                                        <input type="hidden" class="form-control" value="<?=$row['id']?>" name="id">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Category</label>
                                                        <select id="my-select" class="form-control" name="id_category">
                                                            <option value="<?= $row['id_category'] ?>"><?= $row['content_training_category'] ?></option>
                                                            <?php
                                                                            foreach ($data_category as $key2) {
                                                                                if ($key2['id'] == $row['id_category']) {
                                                                                    continue;
                                                                                }
                                                                                echo '<option value="'.$key2['id'].'">'.$key2['content_training_category'].'</option>';
                                                                            }
                                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Level</label>
                                                        <select id="my-select" class="form-control" name="id_level">
                                                            <option value="<?= $row['id_level'] ?>"><?= $row['content_level'] ?></option>
                                                            <?php
                                                                            foreach ($data_level as $key3) {
                                                                                if ($key3['id'] == $row['id_level']) {
                                                                                    continue;
                                                                                }
                                                                                echo '<option value="'.$key3['id'].'">'.$key3['content_level'].'</option>';
                                                                            }
                                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="content_description" cols="30" rows="10" class="form-control summernote"><?= $row['content_description'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                            </div>
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

                <div class="modal fade" id="modal-add">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Title</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('SuperAdmin/create_content_title') ?>" method="post">
                                    <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" name="content_title" placeholder="ex: basics of economics">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select id="my-select" class="form-control select2" name="id_category">
                                                    <?php
                                        foreach ($data_category as $key2) {
                                            echo '<option value="'.$key2['id'].'">'.$key2['content_training_category'].'</option>';
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select id="my-select" class="form-control select-2" name="id_level">
                                                    <?php
                                        foreach ($data_level as $key3) {
                                            echo '<option value="'.$key3['id'].'">'.$key3['content_level'].'</option>';
                                        }
                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="content_description" placeholder="this is.." id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-crudCategory">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">CRUD Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body table-responsive">
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-addCategory"><i class="fa fa-plus mr-1"></i>create category</button>
                                <table id="tabel_category" class="table table-hover table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-sm text-center">No</th>
                                            <th class="text-sm text-center">Category</th>
                                            <th class="text-sm text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $no= 1;
                                foreach ($data_category as $key4) {?>
                                        <tr>
                                            <td class="text-sm text-center" scope="row"><?= $no; ?></td>
                                            <td class="text-sm p-1"><?= $key4['content_training_category'] ?></td>
                                            <td class="text-sm d-flex justify-content-end">
                                                <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-updateCategory<?=$key4['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                                <?php
                                        if ($key4['id'] == 1) {
                                            ?>
                                                <a class="btn btn-sm btn-secondary m-1 disabled"> <i class="fa fa-trash mr-1"></i>(default)</a>
                                                <?php
                                        } else{
                                            ?>
                                                <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-deleteCategory<?=$key4['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                                <?php
                                        }
                                        ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-deleteCategory<?=$key4['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Category?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-warning alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-exclamation-triangle"></i> ATTENTION!</h5>
                                                            If you delete this category, all content titles will be moved to the default category (Taxation)
                                                        </div>
                                                        <p class="text-dark">Category: <br> <?= $key4['content_training_category'] ?></p>
                                                        <p class="text-dark text-justify">Latest Update: <br> <small><?= $key4['update_date'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('SuperAdmin/delete_content_category/'.$key4['id'].'/'.$category_title['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-updateCategory<?=$key4['id']?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('SuperAdmin/update_content_category')?>" method="post">
                                                            <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                                            <div class="form-group">
                                                                <label for="">Category</label>
                                                                <input type="text" class="form-control" value="<?=$key4['content_training_category']?>" name="content_training_category">
                                                                <input type="hidden" class="form-control" value="<?=$key4['id']?>" name="id">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><?php
                                $no++;
                                }
                                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-addCategory">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('SuperAdmin/create_content_category')?>" method="post">
                                    <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <input type="text" class="form-control" name="content_training_category">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modal-crudLevel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">CRUD Level</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body table-responsive">
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-addLevel"><i class="fa fa-plus mr-1"></i>create level</button>
                                <table id="tabel_level" class="table table-hover table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class="text-sm text-center">No</th>
                                            <th class="text-sm text-center">Level</th>
                                            <th class="text-sm text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                $no= 1;
                                foreach ($data_level as $key4) {?>
                                        <tr>
                                            <td class="text-sm text-center" scope="row"><?= $no; ?></td>
                                            <td class="text-sm p-1"><?= $key4['content_level'] ?></td>
                                            <td class="text-sm d-flex justify-content-end">
                                                <a type="button" class="btn btn-sm btn-primary m-1" data-toggle="modal" data-target="#modal-updateLevel<?=$key4['id']?>"> <i class="fa fa-eye mr-1"></i> detail</a>
                                                <?php
                                        if ($key4['id'] == 1) {
                                            ?>
                                                <a class="btn btn-sm btn-secondary m-1 disabled"> <i class="fa fa-trash mr-1"></i>(default)</a>
                                                <?php
                                        } else{
                                            ?>
                                                <a type="button" class="btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#modal-deleteLevel<?=$key4['id']?>"> <i class="fa fa-trash mr-1"></i> delete</a>
                                                <?php
                                        }
                                        ?>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-deleteLevel<?=$key4['id']?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Are you sure delete this Level?</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-warning alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <h5><i class="icon fas fa-exclamation-triangle"></i> ATTENTION!</h5>
                                                            If you delete this level, all content titles will be moved to the default level (All Level)
                                                        </div>
                                                        <p class="text-dark">Category: <br> <?= $key4['content_level'] ?></p>
                                                        <p class="text-dark text-justify">Latest Update: <br> <small><?= $key4['update_date'] ?></small></p>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('SuperAdmin/delete_content_level/'.$key4['id'].'/'.$category_title['id']); ?>" class="btn btn-danger">Yes delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modal-updateLevel<?=$key4['id']?>">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Level</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?=base_url('SuperAdmin/update_content_level')?>" method="post">
                                                            <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                                            <div class="form-group">
                                                                <label for="">Category</label>
                                                                <input type="text" class="form-control" value="<?=$key4['content_level']?>" name="content_level">
                                                                <input type="hidden" class="form-control" value="<?=$key4['id']?>" name="id">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Update</button>
                                                            </div>
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
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-addLevel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Create Level</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('SuperAdmin/create_content_level')?>" method="post">
                                    <input type="hidden" name="category-title" value="<?= $category_title['id']?>">
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <input type="text" class="form-control" name="content_level" placeholder="ex: Magister">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                        <button type="submit"" class=" btn btn-success btn-sm"><i class="fa fa-save mr-1"></i> Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                    }
                    ?>
            </div>
        </div>
    </div>
</div>