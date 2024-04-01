<style>
    @media (max-width: 768px) {
        .fa.fa-arrow-alt-circle-right{
            display: none;
        }
        div.btn{
            margin: 5px;
        }
    }
</style>
<div class=" d-md-flex justify-content-between align-items-center">       
    <?php
        $no = 1;
        $bg = "bg-success";
    foreach ($thc_status as $key) {
        if ($key['status'] == $thc_guest_status['status'] ) {
            $bg = " "; ?>
            <div class="btn border bg-success"><?=$no.'. '.$key['status']?></div>
        <?php
        } else{
            ?>
        <div class="btn border <?= $bg ?>"><?=$no.'. '.$key['status']?></div>
            <?php
        }
        ?>
        <?php
        if ($no < count($thc_status)) {
            ?> <i class="fa fa-arrow-alt-circle-right d-sm-none d-md-block"></i> 
            <?php
        }
        $no++;
    }
    ?>
</div>