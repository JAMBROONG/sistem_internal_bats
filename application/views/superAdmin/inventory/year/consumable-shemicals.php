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
<div class="card text-white bg-light mt-3">
  <div class="card-body">
    <h3>Consumable Shemicals <b><?=$date?></b></h3> 
    <br>
    <form action="<?=base_url('Finance/add_barang')?>" method="post" id="form_item" class="row">
    <input type="hidden" name="type" value="year">
    <input type="hidden" name="date" value="<?=$date?>">
    <input type="hidden" name="user_id" value="<?=$user_id?>">
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Item Name</label>
              <input type="text" name="item_name" id="" required class="form-control" placeholder="ex: Paracetamol" aria-describedby="helpId">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Item Code</label>
              <input type="text" name="item_id" id="" class="form-control"required placeholder="ex: 208800913232" aria-describedby="helpId">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Item Status</label>
              <select name="item_status"required class="form-control" id="">
                <option value="terjual">Terjual</option>
                <option value="terjual">Belum Terjual</option>
              </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Selling Price</label>
              <input type="text"required name="selling_price" id="" class="form-control" placeholder="Rp. 200.000" aria-describedby="helpId">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Purchase Price</label>
              <input type="text" required name="purchase_price" id="" class="form-control" placeholder="Rp. 200.000" aria-describedby="helpId">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
              <label for="">Unit</label>
              <select name="unit" class="form-control" required id="">
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
    </form>
    <button type="button" onclick="submitForm('#form_item')" class="btn btn-sm btn-success mb-3"><i class="fa fa-save mr-2"></i> Save Item</button>
    <button type="button"  data-toggle="modal" data-target="#modelId" class="btn btn-sm btn-primary mb-3"><i class="fa fa-arrow-down mr-2"></i> Import Excel</button>
    
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
          <form id="excel-upload-form" action="<?=base_url('Excel/add_barang')?>"  method="post" enctype="multipart/form-data" >
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
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Item Code</th>
                <th>Item Status</th>
                <th>Selling Price</th>
                <th>Purchase Price</th>
                <th>unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no =1;
            foreach ($this->M_table->dataTableWhere('inventory_drung_year','user_id', $user_id . " AND date_year = '". $date ."'") as $key) {
                ?>
                
            <tr>
                <td><?=$no;?></td>
                <td><?=$key['items_name']?></td>
                <td><?=$key['items_id']?></td>
                <td><?=$key['items_status']?></td>
                <td><?= "Rp. " . number_format($key['selling_price'], 0, ',', '.');?></td>
                <td><?= "Rp. " . number_format($key['purchase_price'], 0, ',', '.');?></td>
                <td><?=$key['unit']?></td>
                <td>
                  <a href="<?= base_url('Finance/del_barang?user_id='.$user_id.'&date='.$date.'&barang_id='.$key['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                  <a href="" class="btn btn-sm btn-primary">Update</a>
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
</div>

    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  
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
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [
            {
                extend: 'csv',
                split: [ 'pdf', 'excel'],
            },
            'colvis'
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

function submitForm(formId) {
    $(formId).submit();
    }
 </script>