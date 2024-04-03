<style>
    input[type="file"] {
        font-size: 16px;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 4px;
        width: 100%;
        box-sizing: border-box;
    }
</style>
<div class="card shadow-none mt-3">
    <div class="card-body p-0">
        <div class="card shadow-none">
            <div class="card-header">
                <h3 class="card-title">Medicine <b><?=$date?></b></h3>
            </div>

            <div class="card-body p-0 pt-3">

                <div id="accordion">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false">
                                    ADD ITEMS
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                            <div class="card-body">
                                <form action="<?=base_url('Finance/add_barang')?>" method="post" id="form_item">
                                    <input type="hidden" name="type" value="year">
                                    <input type="hidden" name="date" value="<?=$date?>">
                                    <input type="hidden" name="user_id" value="<?=$user_id?>">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Item Name</label>
                                                <input type="text" name="items_name" id="" required class="form-control" placeholder="ex: Paracetamol" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Item Code</label>
                                                <input type="text" name="items_id" id="" class="form-control" required placeholder="ex: 208800913232" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Status</label>
                                                <select name="items_status" required class="form-control select2" id="" style="width:100%;">
                                                    <option value="terjual">Terjual</option>
                                                    <option value="terjual">Belum Terjual</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Service</label>
                                                <select name="items_service" class="form-control select2" style="width:100%;">
                                                    <option value="Rawat Inap">Rawat Inap</option>
                                                    <option value="Rawat Jalan">Rawat Jalan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Selling Price</label>
                                                <input type="text" required name="selling_price" id="" class="form-control rupiahInput" placeholder="Rp. 200.000" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Purchase Price</label>
                                                <input type="text" required name="purchase_price" id="" class="form-control rupiahInput" placeholder="Rp. 200.000" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Selling Date</label>
                                                <input type="date" name="selling_date" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Purchase Date</label>
                                                <input type="date" name="purchase_date" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Expired Date</label>
                                                <input type="date" name="expired_date" class="form-control" placeholder="" aria-describedby="helpId">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Unit</label>
                                                <select name="unit" class="form-control select2" style="width:100%;">
                                                    <option value="lembar">Lembar</option>
                                                    <option value="kg">Kilogram (kg)</option>
                                                    <option value="g">Gram (g)</option>
                                                    <option value="m">Meter (m)</option>
                                                    <option value="L">Liter (L)</option>
                                                    <option value="kaleng">Kaleng</option>
                                                    <option value="botol">Botol</option>
                                                    <option value="dus">Dus</option>
                                                    <option value="roll">Roll</option>
                                                    <option value="pasang">Pasang</option>
                                                    <option value="kotak">Kotak</option>
                                                    <option value="set">Set</option>
                                                    <option value="unit">Unit</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save mr-2"></i> Save Item</button>
                                            <button type="button" data-toggle="modal" data-target="#modelId" class="btn btn-sm btn-primary ml-2"><i class="fa fa-arrow-down mr-2"></i> Import Excel</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card card-dark">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100">
                                    FILTER DATA ALL
                                </a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row p-3">
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>" class="btn btn-sm btn-success btn-block border">Show All</a>
                                </div>
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>&sortby=expired" id="btn-expired" class="btn btn-sm btn-light btn-block border">Expired</a>
                                </div>
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>&sortby=approaching_expiration" id="btn-approaching_expiration" class="btn btn-sm btn-light btn-block border">Approaching Expiration</a>
                                </div>
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>&sortby=has_not_expired" id="btn-has_not_expired" class="btn btn-sm btn-light btn-block border">Has Not Expired</a>
                                </div>
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>&sortby=most_sold"  id="btn-most_sold"  class="btn btn-sm btn-light btn-block border">Most Sold</a>
                                </div>
                                <div class="col">
                                    <a href="<?=base_url('SuperAdmin/finance_inventory?user_id='.$user_id.'&date='.$date)?>&sortby=mostly_unsold" id="btn-mostly_unsold"  class="btn btn-sm btn-light btn-block border">Mostly Unsold</a>
                                </div>
                            </div>
                            <div class="row p-3" id="row-filter">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Item Name</label>
                                            <input type="text" name="" id="item-name-filter" class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select id="item-status-filter" class="form-control select2" style="width:100%;">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="terjual">Terjual</option>
                                                <option value="belum terjual">Belum Terjual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Service</label>
                                            <select id="item-dear-filter" class="form-control select2" style="width:100%;">
                                                <option value="">-- Pilih Lokasi --</option>
                                                <option value="Rawat Inap">Rawat Inap</option>
                                                <option value="Rawat Jalan">Rawat Jalan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Selling Date</label>
                                            <input type="month" name="" id="item-selling-date-filter" class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Purchase Date</label>
                                            <input type="month" name="" id="item-purchase-date-filter" class="form-control" placeholder="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Emport Excel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="excel-upload-form" action="<?=base_url('Excel/add_barang')?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="year">
                            <input type="hidden" name="date" value="<?=$date?>">
                            <input type="hidden" name="user_id" value="<?=$user_id?>">
                            <div class="form-group">
                                <label for="excel-file">Pilih file Excel:</label>
                                <input type="file" id="excel-file" name="excel_file" accept=".xlsx">
                            </div>
                            <div class="form-group">
                                <a href="<?=base_url()?>\assets\excel\inventory\Template Import Barang.xlsx" class="btn btn-sm btn-warning">Download Template</a>
                                <button type="submit" class="btn btn-sm btn-success">Import</button>
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <ul>
                                    <li>Download template</li>
                                    <li>Customize table data format based on template</li>
                                    <li>Upload File</li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <?php
          if (isset($_GET['sortby'])) {
            switch ($_GET['sortby']) {
              case 'expired':
                include 'sortby/expired.php';
                break;
              case 'has_not_expired':
                include 'sortby/has_not_expired.php';
                break;
              case 'approaching_expiration':
                include 'sortby/approaching_expiration.php';
                break;
              case 'most_sold':
                include 'sortby/most_sold.php';
                break;
              case 'mostly_unsold':
                include 'sortby/mostly_unsold.php';
                break;
              
              default:
              include 'sortby/default.php';
                break;
            }
          } else{
            include 'sortby/default.php';
          }
          ?>
        </div>

    </div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>

<!-- DataTables library -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- DataTables Bootstrap 4 integration -->
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Buttons extension -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>

<!-- DataTables Buttons Bootstrap 4 integration -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>

<!-- JSZip library (required by DataTables Buttons) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- PDFMake library (required by DataTables Buttons) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<!-- DataTables Buttons HTML5 export -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<!-- DataTables Buttons print button -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<!-- DataTables Buttons column visibility -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: [{
                    extend: 'excel',
                    split: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11]
                    }
                },
                'colvis'
            ]
        });

        $('#item-name-filter').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
        $('#item-status-filter').on('change', function() {
            var value = this.value;
            if(value === '') {
                table.column(3).search('').draw();
            } else {
                table.column(3).search('^' + value + '$', true, false).draw();
            }
        });
        $('#item-dear-filter').on('change', function() {
            var value = this.value;
            if(value === '') {
                table.column(4).search('').draw();
            } else {
                table.column(4).search('^' + value + '$', true, false).draw();
            }
        });
        $('#item-selling-date-filter').on('change', function() {
            var value = this.value;
            if(value === '') {
                table.column(8).search('').draw();
            } else {
                var date = new Date(value);
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                var formattedDate = year + '-' + (month < 10 ? '0' : '') + month;
                var searchDate = formattedDate;
                var date = new Date(searchDate);
                var options = {
                    month: 'long',
                    year: 'numeric'
                };
                var formattedDate = date.toLocaleString('en-US', options);
                table.column(8).search(formattedDate).draw();
            }
        });
        $('#item-purchase-date-filter').on('change', function() {
            var value = this.value;
            if(value === '') {
                table.column(9).search('').draw();
            } else {
                var date = new Date(value);
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                var formattedDate = year + '-' + (month < 10 ? '0' : '') + month;
                var searchDate = formattedDate;
                var date = new Date(searchDate);
                var options = {
                    month: 'long',
                    year: 'numeric'
                };
                var formattedDate = date.toLocaleString('en-US', options);
                table.column(9).search(formattedDate).draw();
            }
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    function submitForm(formId) {
        $(formId).submit();
    }


const rupiahInput = document.getElementsByClassName('rupiahInput');

$('#navMedicine').addClass('btn-dark');
</script>