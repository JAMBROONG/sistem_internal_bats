<style>
    .file,
    .hide {
        visibility: hidden;
        position: absolute;
    }
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<?php
$name = "";
for ($i=0; $i < strlen($user['employee_name']) ; $i++) {
    $name = $name.$user['employee_name'][$i];
    if ($user['employee_name'][$i] == " ") {
        break;
    }
}
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="card border-0 shadow" data-aos="fade-up">
    <div class="card-header border-warning">
        <small class="text-center"><i class="fa text-warning mr-2 fa-exclamation-triangle"></i> Fitur ini Hanya tersedia untuk karyawan Investment termasuk kamu <?= strtolower($name) ?> :D</small>
    </div>
    <div class="card-body">
        <ul>
            <li>Pastikan file sudah terkunci agar tidak bisa disalin oleh pihak ketiga;</li>
            <li>Pastikan data yang <?= strtolower($name) ?> masukkan bener ya!;</li>
            <li>IPO ini akan ditampilkan pada halaman website <a href="https://bats-consulting.com/initial-public-offering" target="blank"><u>berikut</u></a>;</li>
        </ul>
        <button  data-toggle="modal" data-target="#add" class="btn btn-sm btn-success mb-2">Unggah IPO<i class="fa ml-2 fa-plus-circle"></i></button>
        <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-sm d-flex justify-content-center">
                        Unggah IPO
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Employee/addIPO') ?>" id="form1" method="post"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Nama Perusahaan</label>
                                        <input id="name" class="form-control" type="text" placeholder="PT BATS International Group" required name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Logo Perusahaan</label>
                                        
                                        <input type="file" name="image[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Sektor</label>
                                        <input id="sector" class="form-control" type="text" placeholder="Financials" required name="sector">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> PDF</label>
                                        <input type="file" name="image[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Periode Book Building</label>
                                        <input id="periode_book_building" class="form-control" type="text" placeholder="21 Nov 2021 - 12 Des 2022" required name="periode_book_building">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Sub Sektor</label>
                                        <input id="sub_sector" class="form-control"   type="text" placeholder="Auto Part and Equipment" required name="sub_sector">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Saham Ditawarkan</label>
                                        <input id="saham_ditawarkan" class="form-control" type="text" placeholder="9.212.32123 Lot" required name="saham_ditawarkan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Rentang Harga Pokok Book Building</label>
                                        <input id="rentang_harga_pokok_book_building" class="form-control"   type="text" placeholder="Rp. 350 - Rp. 450" required name="rentang_harga_pokok_book_building">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="my-input"><small class="text-danger">*</small> Create Date</label>
                                        <input id="my-input" class="form-control"   type="text" readonly value="<?= date('Y-m-d H:i:s a') ?>" required name="update_date">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success btn-sm" onclick="return myFunction(this)">Unggah <i class="fa fa-save ml-2" type="button"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped" id="example1">
            <thead>
                <tr>
                    <th class="text-sm text-nowrap pt-2 pb-2">#</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Nama PT</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Sektor</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Sub Sektor</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Periode Book Building</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Rentang Harga Pokok Book Building</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Saham Ditawarkan</th>
                    <th class="text-sm text-nowrap pt-2 pb-2 bg-danger">PDF</th>
                    <th class="text-sm text-nowrap pt-2 pb-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($this->M_table->getAll('ipo_company') as $key ) {
                    ?>
                    
                <tr>
                    <td style="font-size: 12px;" class="p-1 text-center" scope="row"><?= $no; ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['name'] ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['sector'] ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['sub_sector'] ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['periode_book_building'] ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['rentang_harga_pokok_book_building'] ?></td>
                    <td style="font-size: 12px;" class="p-1"><?= $key['saham_ditawarkan'] ?></td>
                    <td style="font-size: 12px;" class="p-1">
                    <a href="<?=base_url()?>assets/image/website/ipo/<?= $key['pdf'] ?>" download class="btn btn-sm btn-default text-secondary"><i class="fa fa-download"></i></a></td>
                    <td style="font-size: 12px;" class="p-1 text-nowrap">
                    <a href="<?=base_url('Employee/websiteMe/ipo?update='.md5($key['id']))?>" class="btn btn-sm btn-default text-primary alert_update"><i class="fa fa-pen"></i></a> 
                    <a href="<?=base_url('Employee/delIpo/'.$key['id'])?>" class="btn btn-sm btn-default text-danger alert_notif"><i class="fa fa-trash"></i></a> 
                </td>
                </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.alert_notif').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Delete IPO?",
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
    
    $('.alert_update').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Update IPO",
            text:"are you sure to update?",
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
    
    function myFunction(x){
        if ( document.getElementById('periode_book_building').value == "" || document.getElementById('name').value == "" || document.getElementById('sector').value == "" || document.getElementById('sub_sector').value == "" || document.getElementById('periode_book_building').value == "" || document.getElementById('rentang_harga_pokok_book_building').value == "" || document.getElementById('saham_ditawarkan').value == "" || document.getElementById('update_date').value == "") {
        alert('Harap isi semua data!');
        } else{
            x.className = "btn btn-sm btn-warning";
            x.innerHTML = 'uploading... <div class="fa fa-spinner fa-spin"></div>';
            x.disabled = true;
            $('#form1').submit();
        }
    }
    function showContent(x) {
        document.getElementsByClassName("contentTbl").style = "display : none";
        document.getElementById(x).style = "display : block";
    }
    document.getElementById('ipo').className = "card bg-light";
</script>