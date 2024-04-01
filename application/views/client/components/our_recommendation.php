<style>
    .note-editor {
        background-color: #fff;
    }
</style>
<div class="card" id="our_recommendation">
    
    <div class="card-header">
        <h3 class="card-title">Our Recommendation</h3>
    </div>
    <div class="card-body">
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