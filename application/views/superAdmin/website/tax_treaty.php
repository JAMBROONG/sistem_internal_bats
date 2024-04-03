<h4 class="text-center p-5 bg-info rounded mb-3">Tax Treaty</h4>
<table id="example1" class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Flag</th>
            <th>Tax Treaty</th>
        </tr>
        </thead>
        <tbody>
            
            <?php
            $no = 1;
            foreach ($this->M_table->getAll('country') as $key) {?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                <td><?= $key['name'] ?></td>
                <td><img style="width: 30px;" src="<?=base_url()?>/assets/image/website/country/<?=$key['image']?>" alt=""></td>
                <td><a href="<?=base_url('SuperAdmin/websiteMe/tax_treaty/'. md5(($key['id'])))?>" class="btn btn-sm btn-default"><i class="fa fa-eye mr-2"></i>view doc</a></td>
            </tr>
            
            <?php
            $no++;
            }
            ?>
        </tbody>
</table>
<script>
    document.getElementById('tt').className = "card bg-light";
</script>