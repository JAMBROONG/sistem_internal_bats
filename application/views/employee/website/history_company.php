<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
        .file {
            visibility: hidden;
            position: absolute;
        }
    </style>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="d-flex justify-content-end mb-3">
    <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#addHC" onclick="return popup('modalAdd')"><i class="fa fa-plus mr-2"></i> Add History</button>
</div>

<div id="addHC" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?=base_url('Employee/addHC')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="my-input">Add History</label> <br>
                        <img id="preview" class="shadow-sm p-2 border" style="width: 100px;">
                        <input type="file" name="image" class="file">
                    </div>
                    <small id="file"></small> <br>
                    <button type="button"  id="pilih_gambar" class="btn-sm btn btn-default mb-2">Insert Image<i class="fa fa-image ml-2"></i></button>
                    <div class="form-group">
                        <label for="my-input">Year</label>
                        <input type="text" class="form-control" name="year">
                    </div>
                    <div class="form-group">
                        <label for="">Desc. Indonesia</label>
                        <textarea name="description" id="" class="modalAdd" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Desc. English</label>
                        <textarea name="description_eng" id="" class="modalAdd" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Desc. China</label>
                        <textarea name="description_chi" id="" class="modalAdd" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Desc. Korea</label>
                        <textarea name="description_kor" id="" class="modalAdd" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Desc. Japan</label>
                        <textarea name="description_jep" id="" class="modalAdd" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<table class="table table-striped table-inverse" data-aos="fade-up">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Year</th>
            <th>History (English)</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            foreach ($history_company as $key) {
                ?>
            <tr data-aos="fade-up">
                <td scope="row"><?= $no ?></td>
                <td><img style="width: 60px;" alt="image history company" src="<?= base_url(). 'assets/image/website/history_company/'.$key['image'] ?>" alt=""></td>
                <td><?= $key['year'] ?></td>
                <td><?= $key['description_eng'] ?></td>
                <td class=" d-lg-flex">
                    <button type="button" class="btn btn-sm btn-default text-danger d-flex align-items-center mr-2"><i class="fa fa-trash mr-2"></i> delete</button>
                    <button type="button" class="btn btn-sm btn-default text-primary d-flex align-items-center" onclick="return popup('popup<?=$no?>')" id="" data-toggle="modal" data-target="#my-modal<?=$no?>"><i class="fa fa-pen mr-2"></i> update</button>
                </td>
            </tr>
            <div id="my-modal<?=$no?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form action="<?=base_url('Employee/updateHC')?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label for="my-input">History <?= $key['year'] ?></label> <br>
                                    <img id="preview<?= $key['id'] ?>" class="shadow-sm p-2 border" style="width: 100px;" alt="image history company" src="<?= base_url(). 'assets/image/website/history_company/'.$key['image'] ?>" alt="">
                                    <input type="file" name="image" class="file<?= $key['id'] ?> file">
                                </div>
                                <small id="file<?= $key['id'] ?>"></small> <br>
                                <button type="button"  id="pilih_gambar<?= $key['id'] ?>" class="btn-sm btn btn-default mb-2">Update Image<i class="fa fa-image ml-2"></i></button>
                                <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                <div class="form-group">
                                    <label for="">Desc. Indonesia</label>
                                    <textarea name="description" id="" class="popup<?=$no?>" cols="30" rows="10"><?= $key['description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Desc. English</label>
                                    <textarea name="description_eng" id="" class="popup<?=$no?>" cols="30" rows="10"><?= $key['description_eng'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Desc. China</label>
                                    <textarea name="description_chi" id="" class="popup<?=$no?>" cols="30" rows="10"><?= $key['description_chi'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Desc. Korea</label>
                                    <textarea name="description_kor" id="" class="popup<?=$no?>" cols="30" rows="10"><?= $key['description_kor'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Desc. Japan</label>
                                    <textarea name="description_jep" id="" class="popup<?=$no?>" cols="30" rows="10"><?= $key['description_jep'] ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).on("click", "#pilih_gambar<?= $key['id'] ?>", function() {
                    var file = $(this).parents().find(".file<?= $key['id'] ?>");
                    file.trigger("click");
                });
                $('input[type="file"]').change(function(e) {
                    var fileName = e.target.files[0].name;
                    $("#file<?= $key['id'] ?>").html(fileName);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("preview<?= $key['id'] ?>").src = e.target.result;
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            </script>
                <?php
                $no++;
            }
            ?>
        </tbody>
</table>

<script>
    document.getElementById('hc').className = "card bg-light";
    
    function popup(id){
        $('.'+id).addClass('summernote');
        $('.summernote').summernote();
    }
</script>