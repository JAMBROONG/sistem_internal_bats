<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Order</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png"/>
        <?php $this->load->view('superAdmin/header'); ?>
        <!-- DataTables -->
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link
            rel="stylesheet"
            href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    </head>

    <body class="hold-transition sidebar-mini lyt mt-5">
        <div class="wrapper">
                <section class="m-5">
                    <div class="main-body">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url()?>">Home</a>
                                </li>
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a>
                                </li>
                                <li class="breadcrumb-item text-sm">
                                    <a href="<?= base_url('SuperAdmin/finance_req/'.$user_id)?>">Month or Year</a>
                                </li>
                                <li class="breadcrumb-item text-sm active" aria-current="page">Core</li>
                            </ol>
                        </nav>
                    </div>
                <?php
                if (empty($company_type)) {
                ?>
                <style>
                    footer {
                        display: none;
                    }
                </style>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-sm">Change Type SPT Company to Start</div>
                    </div>
                    <div class="card-body">
                        <form
                            action="<?= base_url('SuperAdmin/createTypeCompanyClient')?>"
                            method="post">
                            <div class="form-group">
                                <label class="h6">Select Type SPT</label>
                                <input type="hidden" name="client_id" value="<?= $user_id ?>">
                                <select name="type_company_id" class="form-control" id="">
                                    <?php
                                        foreach ($type as $key) {
                                            echo '<option value="'.$key['id'].'">'.$key['type'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <button
                                type="button"
                                data-toggle="modal"
                                data-target="#my-modal"
                                class="btn btn-sm btn-success">
                                <i class="fa fa-save mr-2"></i>
                                save</button>
                            <div
                                id="my-modal"
                                class="modal fade"
                                tabindex="-1"
                                role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>You will not be able to change the type again, are you sure you want to
                                                choose it?</p>

                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fa fa-save mr-2"></i>
                                                save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <?php include 'footer.php'; ?>
            <?php
    return false;
    } 
?>
            <div class="card text-left">
                <div class="card-body">
                    <table class="">
                        <tr>
                            <td>Name</td>
                            <td>
                                :
                                <?= strtoupper($client['name']) ?></td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>
                                :
                                <?= strtoupper($client['company']) ?></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>
                                :
                                <?php
                                echo strtoupper($type)  . ' ('. $date.')';
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                :
                                <?= strtoupper('manage financial data on ').$date?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a
                        href="<?=base_url('SuperAdmin/finance_input_year?user_id='.$user_id.'&date='.$date)?>"
                        class="info-box mb-3 bg-info">
                        <span class="info-box-icon">
                            <i class="fas fa-cogs"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Input Data</span>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a
                        href="<?=base_url('SuperAdmin/finance_manage_year?user_id='.$user_id.'&date='.$date)?>"
                        class="info-box mb-3 bg-info">
                        <span class="info-box-icon">
                            <i class="fas fa-database"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Set Default</span>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a
                        href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>"
                        class="info-box mb-3 bg-info">
                        <span class="info-box-icon">
                            <i class="fas fa-box-open"></i> 
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Input Inventory Data</span>
                        </div>
                    </a> 
                </div>
                <div class="col">
                    <a
                        href="<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date)?>"
                        class="info-box mb-3 bg-info">
                        <span class="info-box-icon">
                            <i class="fas fa-paper-plane"></i> 
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Input Explanation</span>
                        </div>
                    </a> 
                </div>
            </div>
            <?php $this->load->view('superAdmin/components/komentar_financial_dashboard.php'); ?>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
$(document).ready(function(){
  $("#tabelKomentar").on("click", ".hapusData", function(){
    var id = $(this).data("id");
    $.ajax({
        url: "<?= base_url('Finance/deleteKomentarFinancialDashboard'); ?>",
        type: "POST",
        data: {id: id},
        success: function() {
    $("#tabelKomentar").load("<?= base_url('SuperAdmin/finance_core?type=year&user_id=' . $user_id . '&date=' . $date) ?> #tabelKomentar");
    Swal.fire({
    position: 'center-center',
    icon: 'success',
    title: 'Data deleted successfully',
    showConfirmButton: false,
    timer: 1500
    });
    },

        error: function(xhr, textStatus, errorThrown){
            console.log(xhr.responseText);
        }
        });

  });
});
$('#formTambahData').submit(function(e) {
  e.preventDefault(); // mencegah form untuk melakukan reload halaman
    $.ajax({
        url: '<?= base_url() ?>Finance/addComment', // ganti dengan URL yang digunakan untuk menambahkan data
        type: 'POST',
        dataType: 'json',
        data: $('#formTambahData').serialize(), // ambil data form dan kirimkan sebagai data Ajax
        success: function(response) {
        $("#tabelKomentar").load("<?= base_url('SuperAdmin/finance_core?type=year&user_id=' . $user_id . '&date=' . $date) ?> #tabelKomentar");
        Swal.fire({
    position: 'center-center',
    icon: 'success',
    title: 'Data saved successfully',
    showConfirmButton: false,
    timer: 1500
    })
    },
    error: function(jqXHR, textStatus, errorThrown) {
      $("#tabelKomentar").load("<?= base_url('SuperAdmin/finance_core?type=year&user_id=' . $user_id . '&date=' . $date) ?> #tabelKomentar");
      Swal.fire({
  position: 'center-center',
  icon: 'success',
  title: 'Data saved successfully',
  showConfirmButton: false,
  timer: 1500
})
    }
  });
});
let no = 1;
$(document).ready(function(){
  function load_data() {
    $.ajax({
      url: '<?php echo base_url(); ?>Finance/getComment?user_id=<?=$user_id?>',
      dataType: 'json',
      success: function(data) {
        var html = '';
        $.each(data, function(i, item) {
                var bg = "";
                var bg2 = "";
                if(item.status == "urgent") {
                    bg = 'class="bg-danger p-1"';
                    bg2 = 'style="background-color: #fbe9eb"';
                } else if(item.status == "not urgent") {
                    bg = 'class="bg-warning p-1"';
                    bg2 = 'style="background-color: #fff9e5"';
                }
                html += '<tr '+bg2+' id="row-'+item.id+'">'+
                            '<td style="display:none" class="data_id">'+item.id+'</td>'+
                            '<td scope="row"  class="d-none d-lg-block">'+(i+1)+'</td>'+
                            '<td class="dataKomentar">'+
                                '<b '+bg+'>'+item.status.toUpperCase()+'</b><br>'+item.komentar+'</td>'+
                            '<td class="text-nowrap">'+
                                '<a title="Delete data" data-id="'+item.id+'" class="btn btn-default btn-sm hapusData">delete<img src="<?=base_url()?>assets/icon/trash.png" alt="" width="20px" srcset="" class="ml-2"></a>'+
                            '</td>'+
                        '</tr>';
        });
        $('#tabelKomentar tbody').html(html);
      }
    });
  }
  load_data();
  setInterval(function(){
    load_data();
  }, 5000); // set interval time in milliseconds
});



</script>
</body>

</html>