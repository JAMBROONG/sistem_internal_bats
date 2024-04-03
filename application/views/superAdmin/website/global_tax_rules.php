
<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#modelId">
<i class="mr-2 fa fa-plus-circle"></i> add rules
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="<?= base_url('AccessData/addTaxRules') ?>" id="form1" method="post">
                        <div class="form-group">
                            <label for="my-input">Country</label>
                            <select name="country_id" id="" class="select2 form-control" required>
                                <?php

                                $id = [];
                                foreach ($this->db->query("SELECT * FROM website_global_tax_rules")->result_array() as $key) {
                                    array_push($id, $key['country_id']);
                                }
                                foreach ($this->db->query('SELECT * FROM country')->result_array() as $key) {
                                    if (in_array($key['id'],$id)) {
                                        continue;
                                    }
                                    ?>
                                    <option value="<?= $key['id'] ?>"><img src="adwdw" alt="sadw"> <?= $key['name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>       
                        </div>
                        <input type="hidden" name="url" value="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>">
                        <div class="form-group">
                            <label for="">Tax Rules</label>
                            <textarea name="tax_rules" id="" cols="30" rows="10" required class="summernote"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-success" onclick=" return myFunction(this)"> <i class="fa fa-save mr-2"></i> save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
<table class="table table-light" id="example1" style="font-size: 15px;">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Country</th>
            <th>Tax Rules</th>
            <th>Create Date</th>    
            <th>Update Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        foreach ( $this->db->query("SELECT website_global_tax_rules . *, country.name,country.image FROM website_global_tax_rules INNER JOIN country ON country.id = website_global_tax_rules.country_id")->result_array() as $key) {
            ?>
        <tr>
            <td><?= $no; ?></td>
            <td class="text-nowrap"><img style="width: 40px;" src="http://localhost/website-bats/client/assets/image/website/country/<?= $key['image'] ?>" class="mr-2" alt=""> <?= $key['name'] ?></td>
            <td><a onclick="window.open('<?= base_url('PrintDoc?view_taxrules='.$key['id']) ?>', 'blank', 'left=20,top=20,toolbar=1,resizable=0'); return false;" class="btn btn-sm btn-default text-dark rounded p-1">view rules</a></td>
            <td><?= date('Y-m-d H:i:s a', strtotime($key['create_date'])) ?></td>
            <td><?= date('Y-m-d H:i:s a', strtotime($key['update_date'])) ?></td>
            <td class="text-nowrap">
                <a href="<?= base_url('AccessData/delTaxRules?url='.$url.'&&id='.$key['id']) ?>" class="btn btn-sm btn-outline-danger alert_notif"><i class="fa fa-trash mr-2" style="font-size: 12px;"></i>delete</a>
                <a onclick="window.open('<?= base_url('printDoc?taxrules='.$key['id']) ?>', 'blank', 'left=20,top=20,toolbar=1,resizable=0'); return false;" class="btn btn-sm btn-outline-secondary">print<i class="fa fa-print ml-2" style="font-size: 12px;"></i></a>
            </td>
        </tr>
            <?php
            $no++;
        }
        ?>
    </tbody>
</table>

<!-- <table id="example1" class="table table-striped table-inverse">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Flag</th>
            <th>Tax Rules</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $country    = ["Algeria","Armenia","Australia","Austria","Bangladesh","Belarus","Barbados","Belgium","Bermuda","Bolivia","Bonaire","Botswana","Brazil","British Virgin Islands","Brunei Darussalam","Bulgaria","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Chad","Chile","China Mainland","Colombia","Congo, Replublic","Congo, The Democratic Republic","Costa Rica","Cote D'Ivoire","Croatia","Curacao","Cyprus","Czech Republic","Denmark","Dominican Replublic","Ecuador","Egypt","El Salvador","Estonia","Eswatini","Fiji","Finland","France","Georgia","Germany","Ghana","Gibraltar","Greece","Guam","Guatemala","Guernsey, Channel Islands","Guinea","Guyana","Honduras","Hongkong","Hungary","Iceland","India","Indonesia","Iraq","Ireland, Republic of","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey, Channel Islands","Jordan","Kazakhstan","Kenya","Korea (South)","Korea Democratic Peoople Republic of Korea","Kosovo","Kroasia (Replublic of Croatia)","Kuwait","Laos","Latvia","Lebanon","Lesotho","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Madagascar","Malawi","Malaysia","Maldives","Malta","Mauritania","Marocco","Mauritius","Mexico","Moldova","Monaco","Mongolia","Montenegro, Republic of","Rusia","Morocco","Mozambique","Namibia","Netherlands","New Celedonia","New Zealand","Nicaragua","Nigeria","North Macedonia","Northern Mariana","Norway","Oman","Pakistan","Palestinian Authority","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Romania","Rwanda","Saba","Saint-Martin","São Tomé and Príncipe","Saudi Arabia","Senegal","Serbia, Republic of","Singapore","Sint Eustatius","Sint Maarten","Slovak Republic","Slovenia","South Africa","South Sudan","Spain","Sri Lanka","St. Lucia","Suriname","Sweden","Switzerland","Taiwan","Tanzania","Thailand","Trinidad and Tobago","Tunisia","Turkey","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","US Virgin Islands","Uzbekistan","Venezuela","Vietnam","Zambia","Zimbabwe"];
            
            foreach ($country as $key) {?>
            <tr>
                <td scope="row"><?= $no; ?></td>
                <td><?= $key ?></td>
                <td><img style="width: 30px;" src="https://bats-consulting.com/assets/img/taxrules/<?=$key?>.png" alt=""></td>
                <td>
                    <a href="https://bats-consulting.com/assets/pdf/taxrules/<?=$key?>.pdf" class="btn btn-sm btn-default" download target="_blank"><i class="fa fa-file-download mr-2"></i>download</a>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody> -->
</table>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    
    
    $('.alert_notif').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete this data?",
                    text:"All news will be moved to default category!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            $('.alert_notif3').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Update news?",
                    text:"are you sure you want to change the content of this news?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            $('.alert_notif4').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete Image?",
                    text:"are you sure to delete?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            
    
    $('.alert_notif_news').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete this news?",
                    text:"data will be permanently deleted",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    document.getElementById('gtr').className = "card bg-light";
    
    $(document).ready(function() {
        $('.select2').select2();
    });
    
    function myFunction(x){
        x.className = "btn btn-sm btn-warning";
        x.innerHTML = 'uploading... <div class="fa fa-spinner fa-spin"></div>';
        x.disabled = true;
        $('#form1').submit();
    }
</script>