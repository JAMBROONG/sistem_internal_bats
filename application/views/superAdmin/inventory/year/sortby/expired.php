<table id="example" class="table table-striped table-bordered text-sm" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Item Status</th>
            <th>Service</th>
            <th>Selling Price</th>
            <th>Purchase Price</th>
            <th>Net Profit</th>
            <th>Selling Date</th>
            <th>Purchase Date</th>
            <th>Unit</th>
            <th>Expired Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
$no =1;
foreach ($this->M_table->dataTableWhere('inventory_drung_year','user_id', $user_id . " AND date_year = '". $date ."' order by id desc") as $key) {
    if (getExpired(date('d-m-Y', strtotime($key['expired_date'])))['interval'] >= 0) {
        continue;
    }
    ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$key['items_name']?></td>
            <td><?=$key['items_id']?></td>
            <td><?=$key['items_status']?></td>
            <td><?=$key['items_service']?></td>
            <td class="text-right"><?= "Rp. " . number_format($key['selling_price'], 0, ',', '.');?></td>
            <td class="text-right"><?= "Rp. " . number_format($key['purchase_price'], 0, ',', '.');?></td>
            <td class="text-right"><?= "Rp. " . number_format($key['selling_price']-$key['purchase_price'], 0, ',', '.');?></td>
            <td><?= ($key['selling_date'] == "") ? "-" : date('M Y', strtotime($key['selling_date']))?></td>
            <td><?= ($key['purchase_date'] == "") ? "-" : date('M Y', strtotime($key['purchase_date']))?></td>
            <td><?=$key['unit']?></td>
            <td title="<?=getExpiredData(getExpired(date('d-m-Y', strtotime($key['expired_date'])))['interval']) ?>"><?= date('d M Y', strtotime($key['expired_date']))?> <br> <?= getExpired(date('d-m-Y', strtotime($key['expired_date'])))['status']?></td>
            <td>
                <a href="<?= base_url('Finance/del_barang?user_id='.$user_id.'&date='.$date.'&barang_id='.$key['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                <!-- <a href="" class="btn btn-sm btn-primary">Update</a> -->
            </td>
        </tr>
        <?php
    $no++;
}
?>
    </tbody>
</table>
<script>
    document.getElementById("btn-expired").classList.add("btn-dark");
</script>