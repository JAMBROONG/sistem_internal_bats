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
    <h3>Profit And Loss Dashboard <b><?=$date?></b></h3> 
    <button id="load-fkd" class="btn btn-sm btn-warning mb-3">Muat Halaman Dashboard</button>
  <div id="fkd-container"></div>
    <br>
    
   <div class="row">
    <div class="col-md-3">
<form action="<?=base_url('Finance/add_explanation')?>" method="post" id="form_item" class="row">
        <input type="hidden" name="type" value="year">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input type="hidden" name="category_id" value="6">
        <input type="hidden" name="show" value="t">
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Item</label>
              <select name="items_name" class="form-control" required id="">
                <?php
                $data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 6");
                $optionValues = array(
                  "TAXATION EXPLANATION",
                  "PAGE DESCRIPTION"
                );
                foreach ($optionValues as $key) {
                  $found = false;
                  foreach ($data as $item) {
                    if ($item['items_name'] === $key) {
                      $found = true;
                      break;
                    }
                  }
                
                  if ($found) {
                    continue;
                  } else {
                    ?>
                    
                  <option value="<?=$key?>"><?=$key?></option>
                    <?php
                  }
                }
                  ?>
              </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Explanation</label>
              <textarea name="explanation" id="summernoteTextarea"  class="form-control"></textarea>  
            </div>
        <button type="submit" class="btn btn-sm btn-success">save</button>
        </div>
    </form>
    <i class="far fa-clipboard btn btn-warning btn-sm mt-2" onclick="copyToClipboard()"> Copy Template Pages Description</i>
    </div>
    <div class="col-md-9">
      
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Explanation</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no =1;
            foreach ($data as $key) {
                ?>
                
            <tr>
                <td><?=$no;?></td>
                <td><?=$key['items_name']?></td>
                <td><?=$key['explanation']?></td>
                <td>
                  <a href="<?= base_url('SuperAdmin/del_explanation?user_id='.$user_id.'&date='.$date.'&quote_id='.$key['id'].'&show=t') ?>" class="btn btn-sm btn-danger">Delete</a>
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
   <p id="text-to-copy" class="d-none">
   Taxation Dashboard is a tool that helps financial professionals manage and monitor a company's taxation activities. The dashboard contains relevant tax metrics that provide a clear and organized view of the company's tax performance.
   
   The dashboard focuses on several primary areas, including income tax, sales tax, property tax, and total tax owed. Additionally, the dashboard provides details on tax payment status and tax payment schedules, enabling users to budget and avoid late tax payments.
   
   At the top left of the dashboard, there are several key metrics such as the amount of tax owed, tax paid, tax penalty amount, and tax payment due date. The dashboard also displays tax trends over the past few months, allowing users to see changes in the company's tax performance and take necessary actions.
   
   The dashboard also shows details on tax deductions and tax credits, enabling users to manage budgets more effectively. On the right side of the dashboard, there are charts showing the percentage of tax deductions and tax credits, as well as the amount of tax owed for each type of tax.
   
   At the bottom of the dashboard, there are charts showing tax trends over the past few months, allowing users to see whether the company's tax performance is improving or declining. The dashboard also provides information on tax recovery and tax audit status, allowing users to take quick action if there are any issues.
   
   With Taxation Dashboard, financial professionals can monitor a company's tax performance more easily and efficiently, and take appropriate action when needed. The dashboard provides an organized and detailed view of a company's taxation activities, enabling users to make better decisions in tax management.
   </p>
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
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script>
  
  $(document).ready(function() {
  $('#summernote').summernote();
});
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
var loadButton = document.querySelector('#load-fkd');
  var container = document.querySelector('#fkd-container');

  loadButton.addEventListener('click', function() {
    var iframe = document.createElement('iframe');
    var url = "<?= base_url('SuperAdmin/finance-year?show=y&user_id=' . $user_id . '&date=' . $date . '#t') ?>";
    iframe.src = url;
    iframe.className = 'card w-100';
    iframe.frameborder = '0';
    iframe.height = '400px';

    container.innerHTML = '';
    container.appendChild(iframe);
  });
  
  $('#t').addClass('bg-dark');
 </script>