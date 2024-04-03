<p class="text-muted text-sm">*Data yang terpilih akan dihitung sesuai dengan type yang dipilih, jika memilih "+ (tambah)" maka seluruh data yang dipilih akan dijumlahkan hasilnya</p>
<form action="<?= base_url('SuperAdmin/processManage_Formula') ?>" method="post">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input type="hidden" name="dataName" value="<?= $dataName ?> ">
<input type="hidden" name="date" id="date" value="<?= $date ?>" class="form-control" required>
<input type="hidden" name="rumus" value="rumus2">
    <div class="row" id="rowForm">
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="text-danger">*</i> Select data</label>
                <select class="select2" multiple="multiple" name="dataTambah[]" data-placeholder="Select a Data" style="width: 100%;" required>
                    <?php
                        foreach ($sptClient as $a) {
                            ?>
                    <option value="<?= $a['id'] ?>"><?= $a['description'] ?> (<?= "Rp " . number_format($a['value'],2,',','.'); ?>)</option>
                    <?php
                            }
                            ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label><i class="text-danger">*</i> Type</label>
                <select class="select2" name="type" data-placeholder="Select type" style="width: 100%;" required>
                    <option value="+">+ (tambah)</option>
                    <option value="-">- (kurang)</option>
                    <option value="/">/ (bagi)</option>
                    <option value="*">* (kali)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> save formula</button>
    </div>
</form> 