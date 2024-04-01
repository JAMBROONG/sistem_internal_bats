<button type="button" onclick='selects()' id="btnSelect" class="btn btn-sm btn-outline-primary mb-3">Select All</button>
<form action="<?= base_url('Admin/dailyReport') ?>" method="post">
    <input type="hidden" name="date" value="<?= ( empty($dailyReport[0]['date'])) ? '':$dailyReport[0]['date'];?>">
    <input type="hidden" name="employee_id" value="<?= ( empty($dailyReport[0]['date'])) ? '':$dailyReport[0]['employee_id'];?>">
    <input type="hidden" name="update" value="yes">
    <table id="table" class="table table-hover">
        <thead class="thead-inverse">
            <tr>
                <th>No</th>
                <th>Employee</th>
                <th>Time</th>
                <th>Plan</th>
                <th>Do</th>
                <th>Problem</th>
                <th>Solution</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dailyReport as $key) {
                
                if (empty($key['planing'])) {
                    continue;
                }
                if($no > 18){
                        echo '<tr>' ;
                }else{
                    echo '<tr style="background-color: #F8F9D7;">';
                };
                ($key['check'] == 'no') ? $checked = "" : $checked = "checked"; 
                ?>
            <td class="text-center"><?= $no ?></td>
            <td><?= $key['employee_name'] ?></td>
            <td><?= date("G:i - ", strtotime($key['start_time'])).date("G:i", strtotime($key['end_time'])) ?></td>
            <td><?= $key['planing'] ?></td>
            <td><?= $key['doing'] ?></td>
            <td><?= ( $key['problem'] == '') ? '<small class="text-danger">not yet</small>' : $key['problem']; ?></td>
            <td><?= ( $key['solution'] == '') ? '<small class="text-danger">not yet</small>' : $key['solution']; ?>
            <td><?= ( $key['description'] == '') ? '<small class="text-danger">not yet</small>' : $key['description']; ?>
            <td>
                <div class="icheck-primary d-inline">
                    <input type="checkbox" class="mr-1 bg-success selectAll" <?= $checked ?> name="report[]" class="" value="<?= $key['id'];?>" id="check<?=$key['id']?>">
                    <label for="check<?=$key['id']?>">
                        <?php
                        if ($key['check'] == "yes") {
                                echo '<small class="text-success">approved</small>';
                            } else{
                            echo '<small class="text-warning">waiting for approval</small>';
                            }
                        ?>
                    </label>
                </div>
            </td>
            </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    <button class="btn btn-sm btn-success"><i class="fa fa-save mr-1"></i> SAVE</button>
</form>