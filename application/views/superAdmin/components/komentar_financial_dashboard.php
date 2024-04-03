<style>
    .note-editor {
        background-color: #fff;
    }
</style>
<!-- <button title="Tambah data" type="button" class="btn btn-default btn-sm
mb-2" data-toggle="modal" data-target="#modelId"><img
src="<?=base_url()?>assets/icon/add-data.png" alt="" width="25px"
srcset="">Tambah data</button> -->
<div class="card border-primary">
    <div class="card-header bg-dark">
        SET RECOMMENDATION
    </div>
    <div class="card-body">
        <form id="formTambahData" class="mb-3">
            <input type="hidden" name="user_id" value="<?= $client['id'] ?>">
            <input type="hidden" name="date" value="<?= $date ?>">
            <input type="hidden" name="type" value="<?=$type?>">
            <div class="form-group">
                <label for="">Add Comment</label>
                <textarea name="komentar" class="summernote" cols="30" rows="10">
                    <p>Komentar...</p>
                    <p>PIC:
                        <br>
                        <span style="font-size: 1rem;">Tanggal Mulai:
                            <br></span><span style="font-size: 1rem;">Tanggal Akhir:
                        </span>
                    </p>
                </textarea>
            </div>
            <div class="form-group">
                <label for="selectStatuses">Status</label>
                <select class="custom-select" name="status" id="selectStatuses">
                    <option selected="selected" value="urgent">URGENT</option>
                    <option value="not urgent">NOT URGENT</option>
                </select>
            </div>
            <button
                title="Save data"
                type="submit"
                class="btn btn-success btn-sm d-flex align-items-center">SAVE<img
                src="<?=base_url()?>assets/icon/save.png"
                alt=""
                width="23px"
                class="ml-2"
                srcset=""></button>
        </form>

        <table class="table table-striped table-inverse table-responsive" id="tabelKomentar">
            <thead class="thead-inverse">
                <tr>
                    <th class="d-none d-lg-block">NO.</th>
                    <th>RECOMMENDATION</th>
                    <th>ACTION</th>
                </tr>
            </thead>
        <tbody>
            <?php
    $no = 1;
    $bg = "";
    $bg2 = "";
    foreach ($komentar as $key) {
        if ($key['status'] == "urgent") {
            $bg = '
            class="bg-danger p-1"
            ';
            $bg2 = '
            style="background-color: #fbe9eb"
            ';
        }
        
        if ($key['status'] == "not urgent") {
            $bg = '
            class="bg-warning p-1"
            ';
            $bg2 = '
            style="background-color: #fff9e5"
            ';
        }
        ?>
            <tr <?= $bg2 ?> id="row-<?=$key['id']?>">
                <td style="display:none" class="data_id"><?=$key['id']?></td>
                <td scope="row" class="d-none d-lg-block"><?=$no?></td>
                <td class="dataKomentar"><b <?=$bg?>> <?= strtoupper($key['status']) ?></b><br><?=$key['komentar']?></td>
                <td class="text-nowrap">
                    <a
                        title="Delete data"
                        data-id="<?php echo $key['id']; ?>"
                        class="btn btn-default btn-sm hapusData ">delete<img src="<?=base_url()?>assets/icon/trash.png" alt="" width="20px" srcset="" class="ml-2"></a>
                </td>
            </tr>

            <?php
        $no++;
        $bg = "";
        $bg2 = "";
    }
    ?>
        </tbody>
    </table>
    
          
</div>
</div>