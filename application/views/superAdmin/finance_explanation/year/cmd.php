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
    <h3>Cash Management Dashboard <b><?=$date?></b></h3> 
    <button id="load-fkd" class="btn btn-sm btn-warning mb-3">Muat Halaman Dashboard</button>
  <div id="fkd-container"></div>
      <br>
    
   <div class="row">
    <div class="col-md-3">
<form action="<?=base_url('Finance/add_explanation')?>" method="post" id="form_item" class="row">
        <input type="hidden" name="type" value="year">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input type="hidden" name="category_id" value="1">
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Item</label>
              <select name="items_name" class="form-control" required id="">
                <?php
                $data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 1");
                $optionValues = array(
                  "Quick Ratio",
                  "Current Ratio",
                  "Cash Balance",
                  "CASH | at end of years",
                  "QUICK RATIO | at end of years",
                  "CURRENT RATIO | at end of years",
                  "DAYS SALES OUTSTANDING",
                  "DAYS INVENTORY OUTSTANDING",
                  "DAYS PAYABLE OUTSTANDING",
                  "AR TURNOVER VS. AP TURNOVER",
                  "INVENTORY",
                  "ACCOUNTS PAYABLE BY PAYMENT TARGET",
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
                  <a href="<?= base_url('SuperAdmin/del_explanation?user_id='.$user_id.'&date='.$date.'&quote_id='.$key['id'].'&show=cmd') ?>" class="btn btn-sm btn-danger">Delete</a>
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
    This financial dashboard template provides an overview of your liquidity and current cash flow situation while providing you with a strong indication or how you can improve these metrics situation by optimizing processes handling accounts payable and accounts receivable. In detail, it is giving you a quick overview of the quick ratio, current ratio, cash balance, and your outstanding debts.

    At first, the cash management dashboard examines your current ratio and your quick ratio. The current ratio is a financial metric that indicates the liquidity of a company and its ability to pay short-term liabilities (debt and payables) with its short-term assets (cash, inventory, receivables). This KPI is simply the ratio between current liabilities and current assets and demonstrates the flexibility your company has in immediately using the money for acquisitions or to pay off debts. You should always aim to have a ratio higher than 1:1 to make sure that you can pay your obligations at any time. This financial dashboard affords you the opportunity to immediately ensure that your company has the financial fluidity that it needs to survive and thrive.

    The quick ratio, also referred to as an acid test ratio, gives a more conservative view on the liquidity situation and does not include inventory and other less liquid assets as part of the short-term assets to meet the liabilities. If your current assets include a lot of inventory, your acid test ratio will be much lower than your current ratio. Similar to the current ratio, a quick ratio greater than 1 indicates that your business is able to pay the current liabilities with the most liquid assets. Both ratios in this financial dashboard template are greatly influenced by your accounts payable and accounts receivable turnover, which measure on the one hand at which speed you pay your own bills and on the other hand how fast you are collecting your payments owed.

    Last but not least our financial dashboard example provides immediate visualization of your current accounts payable and accounts receivable situation. It affords you an opportunity to quickly reflect on your current expenditures and money to be collected in order to ensure that no payments remain outstanding for too long, and similarly that payments you owe do not take you into arrears. At the bottom of the dashboard, the accounts receivable information is broken down over the course of a year, whereby you may analyze payment and debt collection patterns as they relate to your current and quick ratios, the two litmus tests of the financial liquidity and stability of your enterprise.</p>
    
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
    var url = "<?= base_url('SuperAdmin/finance-year?show=y&user_id=' . $user_id . '&date=' . $date . '#cmd') ?>";
    iframe.src = url;
    iframe.className = 'card w-100';
    iframe.frameborder = '0';
    iframe.height = '400px';

    container.innerHTML = '';
    container.appendChild(iframe);
  });
  $('#cmd').addClass('bg-dark');
 </script>