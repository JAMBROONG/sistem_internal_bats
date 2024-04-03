
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
if (empty($this->M_table->getByCon("tax_client_year","date", "'".$date . "' AND user_id = " . $user_id))) {?>
<div class="alert alert-default" role="alert">
  <h4 class="alert-heading text-center">Sorry, data not yet available</h4>
</div>
<?php
} else {
  $dataNew = $this->M_table->joinTwoTable("jenis_pajak","tax_client_year","id","jenis_pajak_id AND tax_client_year.date = '".$date."'  AND user_id = " .$user_id,"*")[0];
  $dataAll = $this->M_table->joinTwoTable("jenis_pajak","tax_client_year","id","jenis_pajak_id  AND user_id = " .$user_id . " order by tax_client_year.date","*");
?>
 <table class="table text-sm">
    <thead>
      <tr>
        <th class="text-nowrap">No</th>
        <th class="text-nowrap">Fiscal Year</th>
        <th class="text-nowrap">Type of Tax</th>
        <th class="text-nowrap">Rev</th>
        <th class="text-nowrap">Payament Status</th> 
        <th class="text-nowrap">Tax Payable</th>
        <th class="text-nowrap">Date Payment</th>
        <th class="text-nowrap">Tax Report Status</th>
        <th class="text-nowrap">Reporting Date</th> 
        <th class="text-nowrap">NTPN</th>
      </tr>
    </thead>
    <tbody>
      <?php  
      $no = 1;
        foreach ($dataAll as $item) {
            if ($item['pakai'] == "no") {
                continue;
            }
          echo "<tr>";
          echo "<td>" . $no++ . "</td>";
          echo "<td>" . $item['date'] . "</td>";
          echo "<td>" . $item['jenis_pajak'] . "</td>";
          echo "<td>" . $item['rev'] . "</td>";
          echo "<td>" . $item['status_pembayaran'] . "</td>";  
          echo "<td class='text-right text-nowrap'>" . 'Rp ' . number_format($item['nominal_pembayaran'], 0, ',', '.') . "</td>";
          if ($item['tanggal_bayar'] == "0000-00-00") {
            echo "<td>-</td>";  
          } else{ 
            echo "<td>" . date('d F Y', strtotime($item['tanggal_bayar'])) . "</td>";
          }
          echo "<td>" . $item['status_pelaporan'] . "</td>";
          if ($item['tanggal_pelaporan'] == "0000-00-00") {
            echo "<td>-</td>";  
          } else{ 
          echo "<td>" . date('d F Y', strtotime($item['tanggal_pelaporan'])) . "</td>";  
          }
          echo "<td>" . $item['ntpn'] . "</td>";
          echo "</tr>";
        }
      ?>
    </tbody>
  </table>

<?php
}
?>