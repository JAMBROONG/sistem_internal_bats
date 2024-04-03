
        <div id="nda" class="card mt-5">
            <div class="card-header text-white"   style="background-color: #2F2F2F;">
                <div class="card-title">1. Fulfillment Non-Disclosure Agreement (NDA)</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas text-white fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-md-4 text-center">
                        <h6> <i class="fa fa-file-pdf mr-2"></i>Template NDA from BATS</h6>
                        <a href="<?=base_url()?>assets/upload/nda/public/NDA untuk THC 2022.docx" class="card-text btn btn-success btn-sm" download=""><i class="fa fa-file-download mr-2"></i> download</a>
                    </div>
                    <div class="col-md-4 text-center pt-4 pb-4">
                        <h6>Upload Date</h6>
                        <?= (date('Y-m-d', strtotime($thc_nda['upload_date'])) == date('Y-m-d')) ? '<small class="text-success text-bold">today ' .date('G:i a', strtotime($thc_nda['upload_date'])).'</small>' : '<small>'.date('F j, Y G:i:s a', strtotime($thc_nda['upload_date'])).'</small>'?>                
                        <p class="text-center text-sm">any problem? contact to <a href="https://wa.me/628161105174" target="blank">admin</a></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h6> <i class="fa fa-file-pdf mr-2"></i>Your file</h6>
                        <a href="<?=base_url()?>assets/upload/nda/<?= $thc_nda['nda'] ?>" class="card-text btn btn-success btn-sm" download=""><i class="fa fa-file-download mr-2"></i> download</a>
                    </div>
                </div>
            </div>
        </div>