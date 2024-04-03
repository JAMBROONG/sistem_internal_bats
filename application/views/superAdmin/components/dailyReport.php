<table id="table" class="table table-hover">
    <tbody>
        <?php
        $no = 1;
        $id = 0;
        $hour = 0;
        foreach($dataEmployee as $e){
         foreach ($dailyReport as $key) {
            if($key['employee_id'] != $e['id']){
                continue;
            }
            $dateN = "'$date'";
            $con = 'employee_id = '.$key['employee_id'].' AND planing != "" AND doing != "" AND date = ' . $dateN;
            $hour = $this->M_employee->getTotalTableCon("dailyreport",$con)/2;
            if (empty($key['planing'])) {
                continue;
            }
            if($id == $key['employee_id']){
                    echo '<tr>' ;
            }else{
                echo '<tr><td colspan="10" class =" p-4 text-center" style="background-color: #F8F9D7;">
                    '.$key['employee_name'].' <small class="text-success h6"> ('.$hour.'hour) </small>
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
            <th>Filling Time</th>
        </tr>' ;
                $no = 1;
            };
            ($key['check'] == 'no') ? $checked = "" : $checked = "checked"; 
            ?>
        <tr>
        <td class="text-center"><?= $no ?></td>
        <td><?= date("G:i - ", strtotime($key['start_time'])).date("G:i", strtotime($key['end_time'])) ?></td>
        <td><?php if($date == date('Y-m-d')){
            echo "today";
        } else{
            echo date("F j, Y", strtotime($key['date']));
        } ?><small>(<?= date("F j, Y", strtotime($key['date'])) ?>)</small></td>
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
                <?php
                if (date("Y-m-d", strtotime($key['update_date'])) == date("Y-m-d", strtotime($key['create_date']))) {
                ?> <td class="text-primary">
                     <?= date("H:i a", strtotime($key['update_date'])) ?>
                </td>
               
                <?php
                } else{
                    ?>
                    <td class="text-danger">
                        <?= date("H:i a", strtotime($key['update_date'])) ?> <small>(<?= date("F j, Y", strtotime($key['update_date'])) ?>)</small>

                    </td>
                    <?php
                }
                ?>
            </tr>
            <?php
            $id = $key['employee_id'];
                $no++;
            }   
        }
            ?>
    </tbody>
</table>