<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<div class="d-flex align-items-end justify-content-between mb-3">
<div class="d-flex align-items-center justify-content-center"><img style="width: 30px;" src="<?=base_url()?>assets/image/website/country/<?=$country_selected['image']?>" class="mr-2"> <?= $country_selected['name'] ?></div>
<div class="col-md-3">
    <select name="" class="select2" style="width: 100%;" onchange="window.location.href=  this.options[this.selectedIndex].value">
        <option vvalue="<?= base_url('SuperAdmin/websiteMe/tax_treaty/'.md5($country_selected['id']))?>"><?=$country_selected['name']?></option>
        <?php
        $no = 0;
            foreach ($this->M_table->getAll('country') as $key) {
                ?>
                <option value="<?= base_url('SuperAdmin/websiteMe/tax_treaty/'.md5($key['id']))?>"><?=$key['name']?></option>
                <?php
            $no++;
            }
        ?>
    </select>
</div>
</div>
<div class="card card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#custom-tabs-five-overlay" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true">Indonesian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">English</a>
            </li>
        </ul>
    </div>
    <div class="card-body p-2">
        <div class="tab-content" id="custom-tabs-five-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-five-overlay" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                <div class="overlay-wrapper">
                    <div class="card">
                    <div class="card-body">
                                    <?php
                                        $no3 = 0;
                                    if ($p3b) {
                                        foreach ($p3b as $key) {
                                            if ($key['lang'] == "ind") {
                                                ?>
                                            <form action="<?= base_url('SuperAdmin/updateP3B') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                                <input type="hidden" name="lang" value="ind">
                                                <div class="form-group row d-flex align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Country</label>
                                                            <input type="text" readonly name="" id="input" class="form-control" value="<?=$country_selected['name']?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Language</label>
                                                            <input type="text" readonly id="input" class="form-control" value="indonesia" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Ratified Date</label>
                                                            <input type="date" name="ratified_date" id="input" class="form-control" value="<?= date('Y-m-d',strtotime($key['ratified_date'])) ?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Effective Date</label>
                                                            <input type="date" name="effective_date" id="input" class="form-control" value="<?= date('Y-m-d',strtotime($key['effective_date'])) ?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <label for="my-input">Doc</label>
                                                        <button type="submit" class="btn btn-sm btn-success m-2"> <i class="fa fa-save mr-2"></i> save</button>
                                                        </div>
                                                        <textarea name="text" class="summernote"  cols="30" rows="10">
                                                            <?= $key['text'] ?>
                                                        </textarea>
                                                </div>
                                            </form>
                                                <?php
                                                $no3++;
                                            }
                                        }
                                        
                                    } 
                                    if ($no3 ==0){
                                        ?>
                                            <p class="text-center p-4 text-muted">Data not yet <br>
                                            <small>Create data</small></p>
                                            <form action="<?= base_url('SuperAdmin/addP3B') ?>" method="post">
                                            <input type="hidden" name="country" value="<?=$country_selected['name']?>">
                                            <input type="hidden" name="lang" value="ind">
                                                <div class="form-group row d-flex align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Country</label>
                                                            <input type="text" readonly name="" id="input" class="form-control" value="<?=$country_selected['name']?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Language</label>
                                                            <input type="text" readonly id="input" class="form-control" value="indonesia" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Ratified Date</label>
                                                            <input type="date" name="ratified_date" id="input" class="form-control" value="<?= date('Y-m-d')?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Effective Date</label>
                                                            <input type="date" name="effective_date" id="input" class="form-control" value="<?= date('Y-m-d')?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="my-input">Doc</label>
                                                            <textarea name="text" id="" cols="30" rows="10" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                    }
                                    ?>
                               
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                <div class="overlay-wrapper">
                    <div class="card shadow-none">
                    <div class="card-body">
                                    <?php
                                        $no3 = 0;
                                    if ($p3b) {
                                        foreach ($p3b as $key) {
                                            if ($key['lang'] == "eng") {
                                                ?>
                                            <form action="<?= base_url('SuperAdmin/updateP3B') ?>" method="POST">
                                                <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                                <input type="hidden" name="lang" value="eng">
                                                <div class="form-group row d-flex align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Country</label>
                                                            <input type="text" readonly name="" id="input" class="form-control" value="<?=$country_selected['name']?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Language</label>
                                                            <input type="text" readonly id="input" class="form-control" value="english" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Ratified Date</label>
                                                            <input type="date" name="ratified_date" id="input" class="form-control" value="<?= date('Y-m-d',strtotime($key['ratified_date'])) ?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Effective Date</label>
                                                            <input type="date" name="effective_date" id="input" class="form-control" value="<?= date('Y-m-d',strtotime($key['effective_date'])) ?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <label for="my-input">Doc</label>
                                                        <button type="submit" class="btn btn-sm btn-success m-2"> <i class="fa fa-save mr-2"></i> save</button>
                                                    </div>
                                                    <textarea name="text" class="summernote"  cols="30" rows="10">
                                                        <?= $key['text'] ?>
                                                    </textarea>
                                                </div>
                                            </form>
                                                <?php
                                                $no3++;
                                            }
                                        }
                                        
                                    } 
                                    if ($no3 ==0){
                                        ?>
                                            <p class="text-center p-4 text-muted">Data not yet <br>
                                            <small>Create data</small></p>
                                            <form action="<?= base_url('SuperAdmin/addP3B') ?>" method="post">
                                            <input type="hidden" name="country" value="<?=$country_selected['name']?>">
                                            <input type="hidden" name="lang" value="eng">
                                                <div class="form-group row d-flex align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Country</label>
                                                            <input type="text" readonly name="" id="input" class="form-control" value="<?=$country_selected['name']?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Language</label>
                                                            <input type="text" readonly id="input" class="form-control" value="english" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Ratified Date</label>
                                                            <input type="date" name="ratified_date" id="input" class="form-control" value="<?= date('Y-m-d')?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="input">Effective Date</label>
                                                            <input type="date" name="effective_date" id="input" class="form-control" value="<?= date('Y-m-d')?>" required="required" title="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="my-input">Doc</label>
                                                            <textarea name="text" id="" cols="30" rows="10" class="summernote"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button class="btn btn-success btn-sm"><i class="fa fa-save mr-2"></i>save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                    }
                                    ?>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
<script>
    document.getElementById('tt').className = "card bg-light";
    
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>