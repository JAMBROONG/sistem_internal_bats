<div class="card">
    <div class="card-header text-white" style="background-color: #2F2F2F;">
        <div class="card-title">3. Fast - Tax Health Check</div>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus text-white"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <?php include 'step_status.php' ?>
        <hr>
        <?php
        if ($thc_guest_status['status'] == "Verification Data") {
            include "step/verifikasi_data.php";
        }
        else if ($thc_guest_status['status'] == "Processing the Check up") {
            include "step/cekup.php";

        }
        else if ($thc_guest_status['status'] == "Review") {
            include "step/review.php";

        } 
        else if ($thc_guest_status['status'] == "Finish") {
            include "step/finish.php";
        }
        ?>
        
    </div>
</div>