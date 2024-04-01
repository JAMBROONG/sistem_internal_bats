<style>
    .note-editor {
        background-color: #fff;
    }
</style>
<!-- <button title="Tambah data" type="button" class="btn btn-default btn-sm
mb-2" data-toggle="modal" data-target="#modelId"><img
src="<?=base_url()?>assets/icon/add-data.png" alt="" width="25px"
srcset="">Tambah data</button> -->
<div class="card border-primary rounded-0" id="our_recommendation">
    <div class="card-body">
            
        <button  onclick="window.location = '<?=base_url('SuperAdmin/finance_core?type=month&user_id='.$user_id.'&date='.$date)?>'" class="btn btn-sm btn-primary align-items-center"> Update <img src="<?= base_url() ?>assets/icon/cog.png" class="mr-2" width="20px" alt=""></button>

        <table class="table table-striped table-inverse" id="tabelKomentar">
            <thead class="thead-inverse">
                <tr>
                    <th>NO.</th>
                    <th>RECOMMENDATION</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <?php
    $no = 1;
    $bg = "";
    $bg2 = "";
    foreach ($komentar as $key) {
        if ($key['status'] == "urgent") {
            $bg = '
            class="bg-danger p-1"
            ';
            $bg2 = '
            style="background-color: #fbe9eb"
            ';
        }
        
        if ($key['status'] == "not urgent") {
            $bg = '
            class="bg-warning p-1"
            ';
            $bg2 = '
            style="background-color: #fff9e5"
            ';
        }
        ?>
            <tr <?= $bg2 ?>>
                <td scope="row" class="text-center align-middle"><?=$no?></td>
                <td><?=$key['komentar']?></td>
                <td class="text-nowrap text-center align-middle text-sm">
                    <div <?=$bg?>>
                        <?= strtoupper($key['status']) ?></div>
                </td>
            </tr>
            <?php
        $no++;
        $bg = "";
        $bg2 = "";
    }
    ?>
        </tbody>
    </table>
</div>
</div>