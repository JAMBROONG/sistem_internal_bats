<style>
    .checkbox {
        display: block;
        position: relative;
        padding-left: 30px;
        margin-bottom: 20px;
        cursor: pointer;
        font-size: 16px;
        user-select: none;
    }
    .checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    .checkmark {
        position: absolute;
        left: 2px;
        height: 20px;
        width: 20px;
        background-color: #eee;
        border-radius: 4px;
    }
    .checkbox:hover input~.checkmark {
        background-color: #ccc;
    }
    .checkbox input:checked~.checkmark {
        background-color: #2196F3;
    }
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    .checkbox input:checked~.checkmark:after {
        display: block;
    }
    .checkbox .checkmark:after {
        left: 7px;
        top: 3px;
        width: 6px;
        height: 12px;
        border: solid white;
        border-width: 0 3px 3px 0;
        transform: rotate(45deg);
    }
</style>
<h5 class="p-4 btn-dark" id="perpajakan">Perpajakan</h5>
<a href="#formAll" class="btn btn-sm btn-warning ml-2 mb-2">Kembali ke Atas</a>
<?php
$date2 = $date;
if (empty($this->M_table->getByCon("tax_client_year","date", "'".$date2 . "' AND user_id = " . $user_id))) {?>
<div class="alert alert-warning ml-2 mr-2 mb-2" role="alert">
    <h4 class="alert-heading">Data belum tersedia!</h4>
    <p></p>
    <p class="mb-0">Membuat data perpajakan:</p>
</div>
<form action="<?=base_url('Finance/add_tax_year')?>" id="formPerpajakan" method="post" class="p-2">
    <input type="hidden" name="user_id" value="<?=$user_id?>">
    <input type="hidden" name="date" value="<?=$date?>">
    <div class="table-responsive">
        <table class="table table-striped align-middle" style="font-size:12px">
            <thead class="thead-inverse">
                <tr class="text-center text-nowrap">
                    <th>No</th>
                    <th>Jenis Pajak</th>
                    <th>Pakai</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status Pembayaran</th>
                    <th>Tanggal Bayar</th>
                    <th>Nominal Pembayaran (Rp.)</th>
                    <th>NTPN</th>
                    <th>Batas Pembayaran</th>
                    <th>Status Pelaporan</th>
                    <th>Tanggal Pelaporan</th>
                    <th>Nominal Pelaporan (Rp.)</th>
                    <th>No. BPE</th>
                    <th>Batas Pelaporan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $con = "text-nowrap";
                $row = $this->M_table->getByCon('jenis_pajak','jenis_pajak',"'PPh Badan tarif normal 22%'");
                ?>
                <tr>
                    <td scope="row">1.</td>
                    <td class="<?=$con?>"><?= $row['jenis_pajak'] ?></td>
                    <td><label class="checkbox text-sm btn btn-sm btn-default"><input type="checkbox" name="pakai"><span class="checkmark"></span>pakai</label></td>
                    <td><input type="date" name="tanggal_transaksi" class=""></td>
                    <td>-</td>
                    <td><input type="date" name="tanggal_bayar" class=""></td>
                    <td><input type="text" name="nominal_pembayaran" value="0" class="rupiah-input text-right"></td>
                    <td><input type="text" name="ntpn" class=""></td>
                    <td>-</td>
                    <td>-</td>
                    <td><input type="date" name="tanggal_pelaporan" class=""></td>
                    <td><input type="text" name="nominal_pelaporan" value="0" class="rupiah-input text-right"></td>
                    <td><input type="text" name="bpe" class=""></td>
                    <td>-</td>
                </tr>
            </tbody>
        </table>
    </div>
    <button type="submit" id="btnPerpajakan" form="formPerpajakan" class="btn btn-sm btn-success mt-3" style="width:auto;" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i> Simpan Data Perpajakan</button>
</form>
<?php
} else {
?>
<form action="<?=base_url('Finance/update_tax_year')?>" id="formPerpajakan" method="post" class="form p-3">
    <input type="hidden" name="user_id" value="<?=$user_id?>">
    <input type="hidden" name="date" value="<?=$date?>">
    <div class="table-responsive">
        <table class="table align-middle table-hover" style="font-size:12px">
            <thead class="thead-inverse">
                <tr class="text-center text-nowrap">
                    <th>No</th>
                    <th>Jenis Pajak</th>
                    <th>Pakai</th>
                    <th>Tgl. Transaksi</th>
                    <th>Status Pembayaran</th>
                    <th>Tgl. Bayar</th>
                    <th>Pembayaran (Rp.)</th>
                    <th>NTPN</th>
                    <th>Batas Pembayaran</th>
                    <th>Status Pelaporan</th>
                    <th>Tgl. Pelaporan</th>
                    <th>Pelaporan (Rp.)</th>
                    <th>No. BPE</th>
                    <th>Batas Pelaporan</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $con = "text-nowrap";
            $checked = "";
            $no = 1;
            foreach ($this->M_table->joinTwoTable("jenis_pajak","tax_client_year","id","jenis_pajak_id AND tax_client_year.date = '".$date."'  AND user_id = " .$user_id,"*") as $row) {
                if ($row['pakai'] == "yes") {
                    $checked = "checked";
                }
                if ($no == 8) {
                    $con = "text-wrap";
                }
                ?>
                <tr>
                    <td scope="row" class="p-2"><?=$no?>. <input type="hidden" value="<?=$row['id']?>" name="id"><input type="hidden" value="<?=$row['batas_pembayaran']?>" name="batas_pembayaran"><input type="hidden" value="<?=$row['batas_pelaporan']?>" name="batas_pelaporan"></td>
                    <td class="<?=$con?> p-2"><?= $row['jenis_pajak'] ?></td>
                    <td class="p-2"><label class="checkbox text-sm btn btn-sm btn-default"><input type="checkbox" <?=$checked ?> name="pakai"><span class="checkmark"></span>pakai</label></td>
                    <td class="p-2"><input type="date" name="tanggal_transaksi" value="<?=$row['tanggal_transaksi']?>" class=""></td>
                    <td class="p-2"><?=$row['status_pembayaran']?></td>
                    <td class="p-2"><input type="date" name="tanggal_bayar" value="<?=$row['tanggal_bayar']?>" class=""></td>
                    <td class="p-2"><input type="text" name="nominal_pembayaran" value="<?= number_format($row['nominal_pembayaran'], 0, ',', '.'); ?>" class="rupiah-input text-end"></td>
                    <td class="p-2"><input type="text" name="ntpn" value="<?=$row['ntpn']?>" class=""></td>
                    <td class="p-2"><?php
                if ($row['batas_pembayaran'] == '0000-00-00') {
                    echo '-';
                } else{
                    echo date('j F Y', strtotime($row['batas_pembayaran']));
                }
                ?></td>
                    <td class="p-2"><?=$row['status_pelaporan']?></td>
                    <td class="p-2"><input type="date" name="tanggal_pelaporan" value="<?=$row['tanggal_pelaporan']?>" class=""></td>
                    <td class="p-2"><input type="text" name="nominal_pelaporan" value="<?= number_format($row['nominal_pelaporan'], 0, ',', '.'); ?>" class="rupiah-input text-end"></td>
                    <td class="p-2"><input type="text" name="bpe" value="<?=$row['bpe']?>" class=""></td>
                    <td class="p-2"><?php
                if ($row['batas_pelaporan'] == '0000-00-00') {
                    echo '-';
                } else{
                    echo date('j F Y', strtotime($row['batas_pelaporan']));
                }
                ?></td>
                </tr>
                <?php 
        $checked = ""; 
        }
            ?>
            </tbody>
        </table>
    </div>
    <button type="submit" id="btnPerpajakan" form="formPerpajakan" class="btn btn-sm btn-success mt-3" style="width:auto;"><i class="fa fa-save mr-2"></i> Simpan Data Perpajakan</button>
</form>
<?php
}
?>