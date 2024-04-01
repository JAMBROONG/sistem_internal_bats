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
        <input type="hidden" name="category_id" value="3">
        <input type="hidden" name="show" value="pald">
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Item</label>
              <select name="items_name" class="form-control" required id="">
                <?php
                $data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 3");
                $optionValues = array(
                  "INCOME STATEMENT",
                  "GROSS PROFIT MARGIN",
                  "OPERATING PROFIT MARGIN",
                  "OPEX RATIO",
                  "NET PROFIT MARGIN",
                  "Net Sales & COGS",
                  "OPEX in Year",
                  "OPEX Year to Year",
                  "Earning before Interest and Taxes",
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
                  <a href="<?= base_url('SuperAdmin/del_explanation?user_id='.$user_id.'&date='.$date.'&quote_id='.$key['id'].'&show=pald') ?>" class="btn btn-sm btn-danger">Delete</a>
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
   This finance dashboard example provides an easy to understand overview of the income statement from revenue to net profit, enhanced by relevant performance ratios. The finance dashboard centers around four important financial indicators; gross profit margin, OPEX ratio, operating profit margin, and net profit margin. The heads-up information, right at your fingertips, can be further utilized to reveal month-to-month trends in the OPEX ratio and the constituent subcomponents of that ratio, as well as year-to-date statistics of earnings before interest and taxes (EBIT). Finally, the financial dashboard gives a succinct breakdown of the four financial category subcomponents of the overall income statement.
   
   We start with revenue which is mainly influenced by selling price and number of units sold and is indicated without taking into account other expenditures or taxes. Subtracting the cost of goods sold shows the gross profit of your company and indicates the earnings after expenditures. OPEX refers to the costs that your company incurs as a result of performing its normal business operations. These “unavoidable” costs are inherent in any business operation but imperative to understand completely. In this finance dashboard template, we specifically look at the OPEX for sales, marketing, it, and general & administrative expenses. We also include other income and expenses in the P&L statement which might include costs incurred from restructuring and currency exchange, amongst others. The resulting earnings before interest and taxes (EBIT) and especially its trend is one of the main metrics to describe the financial situation of a company. At the end - after (subtracting) all cost related to interest and tax payments - you have your net profit. The net profit is the standard calibration for evaluating the success or failure of a company or certain aspects of its operations.
   
   Next to the profit & loss statement, this profit and loss dashboard shows important performance metrics that describe the health of your business and the profitability of your operations. When comparing these KPIs across companies, it is important to consider that the figures might change significantly across different industries, however, this is a standard means of evaluating financial company performance so comparisons can be made equitably and reliable. With this finance dashboard template, you have this crucial information at your fingertips for real-time monitoring, which enables you to take the right actions at the right time.
   
   The gross profit margin shows the percentage of total sales revenue remaining after accounting for all direct costs associated with producing your goods or services. It indicates to what extent your efforts in this company, investments, R&D, etc. are actually contributing towards earning a profit. The operating profit margin or EBIT margin is calculated by dividing your EBIT by the revenue generated in the same period. The net profit ratio indicates how well your company does at turning revenue into profits - how much percent of every dollar generated will be remaining in your company as profit. The net profit ratio is an excellent yardstick to evaluate performance in light of investments, market fluctuations and other operational considerations.
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
    var url = "<?= base_url('SuperAdmin/finance-year?show=y&user_id=' . $user_id . '&date=' . $date . '#pald') ?>";
    iframe.src = url;
    iframe.className = 'card w-100';
    iframe.frameborder = '0';
    iframe.height = '400px';

    container.innerHTML = '';
    container.appendChild(iframe);
  });
  
  $('#pald').addClass('bg-dark');
 </script>