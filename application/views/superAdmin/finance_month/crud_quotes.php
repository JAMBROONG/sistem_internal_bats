<!-- Button trigger modal -->
<div>
<div class="d-flex justify-content-end m-2">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
    <i class="fa fa-plus"></i>
  Tambah <i>Quotes</i>
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                        
                <form id="formTambahData" class="mb-3">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                    <input type="hidden" name="date" value="<?= $date ?>">
                    <div class="form-group">
                        <label for="">Tambah kata-kata</label>
                        <textarea name="quotes" class="summernote" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="selectStatuses">Penempatan</label>
                        <select class="custom-select" name="title_id"  id="selectStatuses">
                            <?php
                                foreach ($this->M_table->getAll('title_quote') as $key) {
                                    if ($this->M_table->totalByCon("quote_for_client_monthly","client_id",$user_id ." AND MONTH(date) = '".date('m', strtotime($date))."' AND title_id = ". $key['id']) > 0) {
                                        continue;
                                    }
                                    ?>
                                    <option value="<?=$key['id']?>"><?=$key['title_quote']?></option>
                                <?php
                                }
                            ?>
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
            </div>
        </div>
    </div>
</div>
</div>
<table class="table" id="tabelQuotes">
    <thead>
        <tr>
            <th>No.</th>
            <th>Penempatan</th>
            <th><i>Quotes</i></th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach ($this->M_finance->getQuoteMonthly($user_id,$date) as $key) {
            ?>
            <tr id="<?=$key['id']?>">
                <td scope="row"><?=$no?></td>
                <td><?=$key['title_quote']?></td>
                <td><?=$key['quotes']?></td>
                <td>
                <a
                    title="Delete data"
                    data-id="<?php echo $key['id']; ?>"
                    class="btn btn-default btn-sm hapusData text-nowrap">delete<img src="<?=base_url()?>assets/icon/trash.png" alt="" width="20px" srcset="" class="ml-2"></a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </tbody>
</table>