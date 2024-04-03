<table id="table" class="table table-hover">
    <tbody>
        <?php
        $no = 1;
        $id = 0;
        foreach ($dailyReport as $key) {
            if (empty($key['planing'])) {
                continue;
            }
            
            if($id == $key['employee_id']){
                    echo '<tr>' ;
            }else{
                echo '<tr><td colspan="10" class =" p-4 text-center" style="background-color: #F8F9D7;">
                    '.$key['employee_name'].'
                    </td></tr>';
                echo '<tr>
                <tr>
            <th>No</th>
            <th>Time</th>
            <th>Date</th>
            <th>Plan</th>
            <th>Do</th>
            <th>Problem</th>
            <th>Solution</th>
            <th>Description</th>
            <th>Status</th>
        </tr>' ;
                $no = 1;
            };
            ($key['check'] == 'no') ? $checked = "" : $checked = "checked"; 
            ?>
        <td class="text-center"><?= $no ?></td>
        <td><?= date("G:i - ", strtotime($key['start_time'])).date("G:i", strtotime($key['end_time'])) ?></td>
        <td>today <small>(<?= date("F j, Y", strtotime($key['date'])) ?>)</small></td>
        <td><?= $key['planing'] ?></td>
        <td><?= $key['doing'] ?></td>
        <td><?= ( $key['problem'] == '') ? '<small class="text-danger">-</small>' : $key['problem']; ?></td>
        <td><?= ( $key['solution'] == '') ? '<small class="text-danger">-</small>' : $key['solution']; ?>
        <td><?= ( $key['description'] == '') ? '<small class="text-danger">-</small>' : $key['description']; ?>
            <?php 
            if ($key['check'] == "yes") {
                echo '<td><small class="text-success"> approved</small></td>';
            } else{
            echo '<td><small class="text-danger"> not approved</small></td>';
            }
            ?>
            </tr>
            <?php
            $id = $key['employee_id'];
                $no++;
            }
            ?>

    </tbody>
</table>