
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
<!-- <h5 class="p-4 bg-dark" id="perpajakan">Perpajakan</h5> -->
<!--  <a href="#formAll" class="btn btn-sm btn-primary ml-2 mb-2 btn-hide-con"><img src="https://img.icons8.com/external-flaticons-flat-circular-flat-icons/1x/external-arrow-up-web-flaticons-flat-circular-flat-icons.png" alt="arrow top" class="mr-2" width="20px"> Kembali ke Atas</a> -->
<?php
$date2 = $date . '-02';
$data = $this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id);
// print_r($data);
// echo $date2;
// die;
if (empty($this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id))) {?>
<div class="error-template text-center">
    <h1>
        Oops!</h1>
    <h2>
        404 Not Found</h2>
    <div class="error-details">
        Sorry, an error has occured, Requested page not found!
    </div>
    <a href="<?=base_url('Client/invoice')?>" class="btn btn-sm btn-default align-middle mt-3"><i class="fa fa-arrow-alt-circle-left mr-2"></i> back</a>
</div>
<?php
} else {
?>
<form action="<?=base_url('Client/update_tax_monthly')?>" id="formPerpajakan" method="post" class="form p-3 bg-light">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input type="hidden" name="date" value="<?=$date?>-02">

<table class="table  table-responsive table-hover rounded shadow bg-light rounded-0" style="font-size:12px">   
    <thead class="thead-inverse">
        <tr class="text-center">
            <th>No</th>
            <th>Jenis Pajak</th>
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
            <?php $no = 1;
            $con = "text-nowrap";
            $checked = "";
            foreach ($this->M_table->joinTwoTable("jenis_pajak","tax_client_monthly","id","jenis_pajak_id AND tax_client_monthly.date = '".$date."-02'  AND user_id = " .$user_id,"*") as $row) {
                if ($row['pakai'] != "yes") {
                    continue;
                }
                if ($no == 8) {
                    $con = "text-wrap";
                }
                ?>

            <tr >
                <td scope="row" class="p-2"><?=$no?>. <input type="hidden" value="<?=$row['id']?>" name="id_<?=$no?>"><input type="hidden" value="<?=$row['batas_pembayaran']?>" name="batas_pembayaran_<?=$no?>"><input type="hidden" value="<?=$row['batas_pelaporan']?>" name="batas_pelaporan_<?=$no?>"></td>
                <td class="<?=$con?> p-2"><?= $row['jenis_pajak'] ?></td>
                <td class="p-2"><input type="date" name="tanggal_transaksi_<?=$no?>" value="<?=$row['tanggal_transaksi']?>" class=""></td>
                <td class="p-2"><?=$row['status_pembayaran']?></td>
                <td class="p-2"><input type="date" name="tanggal_bayar_<?=$no?>"  value="<?=$row['tanggal_bayar']?>" class=""></td>
                <td class="p-2"><input type="text" name="nominal_pembayaran_<?=$no?>"  value="<?= number_format($row['nominal_pembayaran'], 0, ',', '.'); ?>" class="rupiah-input text-right"></td>
                <td class="p-2"><input type="text" name="ntpn_<?=$no?>" value="<?=$row['ntpn']?>" class=""></td>
                <td class="p-2"><?php
                if ($row['batas_pembayaran'] == '0000-00-00') {
                    echo '-';
                } else{
                    echo date('j F Y', strtotime($row['batas_pembayaran']));
                }
                ?></td>
                <td class="p-2"><?=$row['status_pelaporan']?></td>
                <td class="p-2"><input type="date" name="tanggal_pelaporan_<?=$no?>" value="<?=$row['tanggal_pelaporan']?>" class=""></td>
                <td class="p-2"><input type="text" name="nominal_pelaporan_<?=$no?>"value="<?= number_format($row['nominal_pelaporan'], 0, ',', '.'); ?>"  class="rupiah-input text-right"></td>
                <td class="p-2"><input type="text" name="bpe_<?=$no?>" value="<?=$row['bpe']?>" class=""></td>
                <td class="p-2"><?php
                if ($row['batas_pelaporan'] == '0000-00-00') {
                    echo '-';
                } else{
                    echo date('j F Y', strtotime($row['batas_pelaporan']));
                }
                ?></td>
            </tr>
            <?php 
        $no++;   
        $checked = ""; 
        }
            ?>
           
        </tbody>
</table>   
<input type="hidden" value="<?=$no?>" name="length_num">
<button type="submit" id="btnPerpajakan" form="formPerpajakan" class="btn btn-sm btn-success mt-3" style="width:auto;" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i> Simpan Data Perpajakan</button>
</form>
<?php
}
?>