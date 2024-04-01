<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>

.select2-container--default .select2-results__option {
    color: black;
}
    .file {
        visibility: hidden;
        position: absolute;
    }
    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 5px 10px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }
    input[type=file]::file-selector-button:hover {
    background: #0d45a5;
    }
</style>


<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-3 btn-sm" data-toggle="modal" data-target="#modelId">
<i class="mr-2 fa fa-plus-circle"></i> add payroll
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> 
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="<?= base_url('AccessData/addPayroll') ?>" id="form1" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="my-input">Country</label>
                                <select name="country_id" id="" required class="select2 form-control" required>
                                    <?php

                                    $id = [];
                                    foreach ($this->db->query("SELECT * FROM payroll")->result_array() as $key) {
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="my-input">Files</label>
                                <input type="file" id="images" name="image"  accept="application/pdf" required class="w-100" accept="image/*" required>
                            </div>
                            </div>
                        </div>
                        <input type="hidden" name="url" value="<?=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>">
                        <div class="form-group">
                            <label for="">Payroll</label>
                            <textarea name="payroll" id="" cols="30" rows="10" required class="summernote"></textarea>
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


    <table id="example1" class="table table-light mb-5">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Country</th>
                <th>Payroll</th>
                <th>Files</th>
                <th>Downloads</th>
                <th>Update Data</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            foreach ($this->db->query("SELECT payroll.*, country.name, country.image FROM country INNER JOIN payroll ON payroll.country_id = country.id order by name")->result_array() as $key) {
                ?>
            <tr>
                <td class=" text-nowrap"><?= $no ?></td>
                <td class=" text-nowrap"><img src="<?=  base_url()?>/assets/image/website/country/<?=$key['image']?>" alt="" class="border mr-2" style="width: 40px; height: 25px;  border-radius: 10%"> <?= $key['name'] ?></td>
                <td class=" text-nowrap"><button onclick="window.open('<?= base_url('printDoc?view_payroll='.$key['id']) ?>', 'blank', 'left=20,top=20,toolbar=1,resizable=0'); return false;" class="btn btn-sm btn-default">view content</button></td>
                <td class=" text-nowrap">
                    <a href="<?=base_url()?>assets/upload/payroll/<?=$key['files']?>" class="btn btn-sm btn-default" download target="_blank"><i class="fa fa-file-download mr-2"></i>download</a>
                </td>
                <td class=" text-nowrap"><?= $key['total_download'] ?></td>
                <td class=" text-nowrap"><?= date('l jS \of F Y h:i:s A', strtotime($key['create_date'])); ?></td>
                <td class=" text-nowrap">
                    <a href="<?= base_url('AccessData/delPayroll?url='.$url.'&&id='.$key['id']) ?>" class="btn btn-sm btn-outline-danger alert_notif">delete</a>
                    <button onclick="window.open('<?= base_url('PrintDoc?payroll='.$key['id']) ?>', 'blank', 'left=20,top=20,toolbar=1,resizable=0'); return false;" class="btn btn-sm btn-outline-dark">print</button>
                </td>
            </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
<script>
    document.getElementById('payroll').className = "card bg-light";
    
    function popup(id){
        $('.'+id).addClass('summernote');
        $('.summernote').summernote();
    }
    
    $(document).ready(function() {
        $('.summernote').summernote();
    });

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