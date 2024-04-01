
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

.checkbox:hover input ~ .checkmark {
  background-color: #ccc;
}

.checkbox input:checked ~ .checkmark {
  background-color: #2196F3;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.checkbox input:checked ~ .checkmark:after {
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
<h5 class="p-4 bg-dark" id="perpajakan">Perpajakan</h5>
 <a href="#formAll" class="btn btn-sm btn-primary ml-2 mb-2 btn-hide-con"><img src="https://img.icons8.com/external-flaticons-flat-circular-flat-icons/1x/external-arrow-up-web-flaticons-flat-circular-flat-icons.png" alt="arrow top" class="mr-2" width="20px"> Kembali ke Atas</a>
<?php
$date2 = $date . '-02';
$data = $this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id);
// print_r($data);
// echo $date2;
// die;
if (empty($this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id))) {?>
<div class="alert alert-warning ml-2 mr-2 mb-2" role="alert">
  <h4 class="alert-heading">Data belum tersedia!</h4>
  <p></p>
  <p class="mb-0">Membuat data perpajakan:</p>
</div>
<form action="<?=base_url('Finance/add_tax_monthly')?>" id="formPerpajakan" method="post" class="p-2">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input type="hidden" name="date" value="<?=$date?>-02">
<table class="table table-striped table-inverse table-responsive">   
    <thead class="thead-inverse">
        <tr class="text-center text-nowrap">
            <th class="text-nowrap">No</th>
            <th class="text-nowrap">Tampilkan</th>
            <th class="text-nowrap">Jenis Pajak</th>
            <th class="text-nowrap">Rev</th> 
            <th class="text-nowrap">Tanggal Bayar</th>
            <th class="text-nowrap">Nominal Pembayaran (Rp.)</th>
            <th class="text-nowrap">NTPN</th> 
            <th class="text-nowrap">Tanggal Pelaporan</th>
            <th class="text-nowrap">Nominal Pelaporan (Rp.)</th>
            <th class="text-nowrap">No. BPE</th> 
        </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $con = "text-nowrap";
            foreach ($this->M_table->getAll('jenis_pajak') as $row) {
                if ($no == 8) {
                    $con = "text-wrap";
                }
                ?>

            <tr>
                <td scope="row"><?=$no?>.</td>
                <td><label class="checkbox text-sm btn btn-sm btn-default"><input type="checkbox" name="pakai_<?=$no?>"><span class="checkmark"></span>YA</label></td>
                <td ><?= $row['jenis_pajak'] ?></td>
                <td><input type="text" name="rev_<?=$no?>" class=""></td>  
                <td><input type="date" name="tanggal_bayar_<?=$no?>" class=""></td>
                <td><input type="text" name="nominal_pembayaran_<?=$no?>" value="0" class="rupiah-input text-right"></td>
                <td><input type="text" name="ntpn_<?=$no?>" class=""></td> 
                <td><input type="date" name="tanggal_pelaporan_<?=$no?>" class=""></td>
                <td><input type="text" name="nominal_pelaporan_<?=$no?>"value="0"  class="rupiah-input text-right"></td>
                <td><input type="text" name="bpe_<?=$no?>" class=""></td> 
            </tr>
            <?php 
        $no++;    
        }
            ?>
           
        </tbody>
</table>   

<button type="submit" id="btnPerpajakan" form="formPerpajakan" class="btn btn-sm btn-success mt-3" style="width:auto;" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i> Simpan Data Perpajakan</button>
</form>
<?php
} else {
?>
<form action="<?=base_url('Finance/update_tax_monthly')?>" id="formPerpajakan" method="post" class="form p-3">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input type="hidden" name="date" value="<?=$date?>-02">

<table class="table  table-responsive table-hover rounded shadow" style="font-size:12px">   
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">No</th>
            <th class="text-nowrap">Tampilkan</th>
            <th class="text-nowrap">Jenis Pajak</th> 
            <th class="text-nowrap">Rev</th> 
            <th class="text-nowrap">Status Pembayaran</th>
            <th class="text-nowrap">Tgl. Bayar</th>
            <th class="text-nowrap">Pembayaran (Rp.)</th>
            <th class="text-nowrap">Status Pelaporan</th>
            <th class="text-nowrap">Tgl. Pelaporan</th>
            <th class="text-nowrap">Pelaporan (Rp.)</th>
            <th class="text-nowrap">NTPN</th> 
            <th class="text-nowrap">No. BPE</th> 
        </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $con = "text-nowrap";
            $checked = "";
            foreach ($this->M_table->joinTwoTable("jenis_pajak","tax_client_monthly","id","jenis_pajak_id AND tax_client_monthly.date = '".$date."-02'  AND user_id = " .$user_id,"*") as $row) {
                if ($row['pakai'] == "yes") {
                    $checked = "checked";
                }
                if ($no == 8) {
                    $con = "text-wrap";
                }
                ?>

            <tr >
                <td scope="row" class="p-2"><?=$no?>. <input type="hidden" value="<?=$row['id']?>" name="id_<?=$no?>"><input type="hidden" value="<?=$row['batas_pembayaran']?>" name="batas_pembayaran_<?=$no?>"><input type="hidden" value="<?=$row['batas_pelaporan']?>" name="batas_pelaporan_<?=$no?>"></td>
                <td class="p-2"><label class="checkbox text-sm btn btn-sm btn-default"><input type="checkbox" <?=$checked ?> name="pakai_<?=$no?>"><span class="checkmark"></span>YA</label></td>
                <td class="<?=$con?> p-2"><?= $row['jenis_pajak'] ?></td>
                <td class="p-2"><input type="text" name="rev_<?=$no?>" maxlength="16" value="<?=$row['rev']?>" class=""></td>
                <td class="p-2"><?=$row['status_pembayaran']?></td>
                <td class="p-2"><input type="date" name="tanggal_bayar_<?=$no?>"  value="<?=$row['tanggal_bayar']?>" class=""></td>
                <td class="p-2"><input type="text" name="nominal_pembayaran_<?=$no?>"  value="<?= number_format($row['nominal_pembayaran'], 0, ',', '.'); ?>" class="rupiah-input text-right"></td>
               
                <td class="p-2"><?=$row['status_pelaporan']?></td>
                <td class="p-2"><input type="date" name="tanggal_pelaporan_<?=$no?>" value="<?=$row['tanggal_pelaporan']?>" class=""></td>
                <td class="p-2"><input type="text" name="nominal_pelaporan_<?=$no?>"value="<?= number_format($row['nominal_pelaporan'], 0, ',', '.'); ?>"  class="rupiah-input text-right"></td>
                <td class="p-2"><input type="text" name="ntpn_<?=$no?>" value="<?=$row['ntpn']?>" class=""></td>
                <td class="p-2"><input type="text" name="bpe_<?=$no?>" value="<?=$row['bpe']?>" class=""></td>
                 
            </tr>
            <?php 
        $no++;   
        $checked = ""; 
        }
            ?>
           
        </tbody>
</table>   

<button type="submit" id="btnPerpajakan" form="formPerpajakan" class="btn btn-sm btn-success mt-3" style="width:auto;" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i> Simpan Data Perpajakan</button>
</form>
<?php
}
?>