<!-- Content -->
<?php include 'templates/header.php'; ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-body p-3">
            <h4 class="display-5 m-0 text-center">ANALISA UNIT</h4>
        </div>
    </div>
</div>
<!--/ Content -->
<!-- Content -->
<?php include 'templates/footer.php'; ?>

<script src="<?= base_url('assets') ?>/html/assets/js/charts-apex-yearly/unit.js"></script>
<script>
    $(document).ready(function() {
        $("#unit").addClass("active");
    });
</script>
