<style>
    
        .file, .hide {
            visibility: hidden;
            position: absolute;
        }
    </style>
<div id="addFlag" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?=base_url('SuperAdmin/addFlag')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="my-input">Add Country</label> <br>
                        <img id="preview" class="shadow-sm p-2 border" style="width: 100px;">
                        <input type="file" name="image" class="file">
                    </div>
                    <small id="file"></small> <br>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name"  class="form-control" value="" required="required">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Flag</label>
                        <br>
                    <button type="button"  id="pilih_gambar" class="btn-sm btn btn-default mb-2" onchange="return validasiEkstensi()">Insert Image<i class="fa fa-image ml-2"></i></button>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="d-flex mb-3 justify-content-between p-0">
<h4 class="text-center m-0" data-aos="fade-up">All Country</h4>
<button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#addFlag" data-aos="fade-up"><i class="fa fa-plus-circle mr-2"></i> country</button>
</div>
<table id="example1" class="table table-striped table-inverse shadow"  data-aos="fade-up">

    <thead class="thead-inverse">
        <tr class="bg-dark">
            <th class="text-center">No.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Flag</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($this->M_table->getAll('country') as $key) {?>
            <tr>
                <td class="text-center" scope="row"><?= $key['id']; ?></td>
                <td><?= $key['name'] ?></td>
                <td><img style="width: 40px;" class="lazy" data-src="<?= base_url ()?>assets/image/website/country/<?=$key['image']?>" alt=""></td>
                <td>
                    <a href="<?= base_url('SuperAdmin/delCountry/'.$key['id']) ?>" class="btn btn-sm btn-default text-danger alert_notif"><i class="fa fa-trash"></i></a>
                    <button class="btn btn-sm btn-default"  data-toggle="modal" data-target="#m_update<?= $key['id'] ?>"><i class="fa fa-pen"></i></button>
                    <div id="m_update<?= $key['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form action="<?= base_url('SuperAdmin/updateCountry') ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="my-input">Update Country</label> <br>
                                            <img id="preview<?=$key['id']?>" class="shadow-sm p-2 border" src="<?= base_url ()?>assets/image/website/country/<?=$key['image']?>" style="width: 100px;">
                                            <input type="file" name="image" class="file<?=$key['id']?> hide">
                                            <input type="hidden" name="id" value="<?=$key['id']?>">
                                        </div>
                                        <small id="file<?=$key['id']?>"></small> <br>
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name"  class="form-control" value="<?= $key['name'] ?>" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label for="my-input">Flag</label>
                                            <br>
                                        <button type="button" onclick="return getImage(<?=$key['id']?>)"  id="pilih_gambar<?=$key['id']?>" class="btn-sm btn btn-default mb-2">Insert Image<i class="fa fa-image ml-2"></i></button>
                                        </div>
                                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
</table>

<script>
    document.getElementById('country').className = "card bg-light";
</script>
