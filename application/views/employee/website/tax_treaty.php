
<table id="example1" class="table table-striped table-inverse mt-5" data-aos="fade-up">
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
            foreach ($country as $key) {?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                <td><?= $key['name'] ?></td>
                <td><img style="width: 30px;" src="<?=base_url()?>/assets/image/website/country/<?=$key['image']?>" alt=""></td>
                <td><a href="<?=base_url('Employee/websiteMe/tax_treaty/'. md5(($key['id'])))?>" class="btn btn-sm btn-default"><i class="fa fa-eye mr-2"></i>view doc</a></td>
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