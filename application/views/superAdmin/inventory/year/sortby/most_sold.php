<p class="rounded p-2 bg-warning">
Displays data on the most selling drugs in <?=$date?>
</p>
<table id="example" class="table table-striped table-bordered text-sm" style="width:100%">
    <thead>
        <tr>
            <th>Month</th>
            <th>Item Name</th>
            <th>Total Data</th>
            <th>Selling Price(AVG)</th>
            <th>Purchase Price(AVG)</th>
            <th>Net Profit(AVG)</th>
            <th>Unit</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
$no =1;
foreach ($this->M_table->getSellingDrung($user_id, $date,'terjual') as $key) {
    ?>

        <tr>
            <td><?= date("F", mktime(0, 0, 0, $key['month'], 1));?></td>
            <td><?=$key['items_name']?></td>
            <td><?=$key['total_data']?></td>
            <td class="text-right"><?= number_format($key['avg_selling_price'], 0, ',', '.');?></td>
            <td class="text-right"><?= number_format($key['avg_purchase_price'], 0, ',', '.');?></td>
            <td class="text-right"><?= number_format($key['avg_selling_price']-$key['avg_purchase_price'], 0, ',', '.');?></td>
            <td><?=$key['unit']?></td>
            <td>
                <a href="" class="btn btn-sm btn-primary">Detail</a>
            </td>
        </tr>
        <?php
    $no++;
}
?>
    </tbody>
</table>
<script>
    document.getElementById("btn-most_sold").classList.add("btn-dark");
    // Get a reference to the parent element
    var element = document.getElementById("row-filter");
    if (element) {
    element.innerHTML = "";
    }

</script>