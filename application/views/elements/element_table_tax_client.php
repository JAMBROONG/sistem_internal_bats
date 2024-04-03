
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
<?php
$date2 = $date . '-02';
$data = $this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id);
if (empty($this->M_table->getByCon("tax_client_monthly","date", "'".$date2 . "' AND user_id = " . $user_id))) {?>
<div class="alert alert-default" role="alert">
  <h4 class="alert-heading text-center">Sorry, data is not available yet</h4>
</div>
<?php
} else {
?>
<div class="table-responsive">
<table class="table table-hover text-sm w-100">
    <thead class="thead-inverse">
        <tr class="text-center">
            <th class="text-nowrap">No</th>
            <th class="text-nowrap">Tax Type</th> 
            <th class="text-nowrap">Rev</th> 
            <th class="text-nowrap">Payment Status</th>
            <th class="text-nowrap">Payment Date</th>
            <th class="text-nowrap">Payment (Rp.)</th>
            <th class="text-nowrap">NTPN</th>
            <th class="text-nowrap">Payment Deadline</th>
            <th class="text-nowrap">Reporting Status</th>
            <th class="text-nowrap">Reporting Date</th>
            <th class="text-nowrap">Report (Rp.)</th>
            <th class="text-nowrap">BPE Number</th>
            <th class="text-nowrap">Reporting Deadline</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        $con = "text-nowrap";
        foreach ($this->M_table->joinTwoTable("jenis_pajak","tax_client_monthly","id","jenis_pajak_id AND tax_client_monthly.date = '".$date."-02'  AND user_id = " .$user_id,"*") as $row) {
            if ($row['pakai'] != "yes") {
                continue;
            }
            if ($no == 8) {
                $con = "text-wrap";
            }
            ?>

        <tr>
            <td scope="row" class="p-2"><?=$no?>.</td>
            <td class="<?=$con?> p-2"><?= $row['jenis_pajak'] ?></td> 
            <td class="<?=$con?> p-2"><?= $row['rev'] ?></td> 
            <td class="p-2"><?= $row['status_pembayaran'] ?></td>
            <td class="p-2"><?php
            if ($row['tanggal_bayar'] == '0000-00-00') {
                echo '-';
            } else{
                echo date('j F Y', strtotime($row['batas_pembayaran']));
            }
            ?></td>
            <td class="p-2"><?= number_format($row['nominal_pembayaran'], 0, ',', '.') ?></td>
            <td class="p-2"><?= $row['ntpn'] ?></td>
            <td class="p-2"><?php
            if ($row['batas_pembayaran'] == '0000-00-00') {
                echo '-';
            } else{
                echo date('j F Y', strtotime($row['batas_pembayaran']));
            }
            ?></td>
            <td class="p-2"><?= $row['status_pelaporan'] ?></td>
            <td class="p-2">
            <?php
            if ($row['tanggal_pelaporan'] == '0000-00-00') {
                echo '-';
            } else{
                echo date('j F Y', strtotime($row['batas_pembayaran']));
            }
            ?></td>
            <td class="p-2"><?= number_format($row['nominal_pelaporan'], 0, ',', '.') ?></td>
            <td class="p-2"><?= $row['bpe'] ?></td>
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
        }
        ?>
    </tbody>
</table>
</div> 
<?php
}
?>