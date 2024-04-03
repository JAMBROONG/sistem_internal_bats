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
    <h3>Financial KPI Dashboard <b><?=$date?></b></h3> 
    <button id="load-fkd" class="btn btn-sm btn-warning mb-3">Muat Halaman Dashboard</button>
  <div id="fkd-container"></div>
      <br>
    
   <div class="row">
    <div class="col-md-3">
<form action="<?=base_url('Finance/add_explanation')?>" method="post" id="form_item" class="row">
        <input type="hidden" name="type" value="year">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input type="hidden" name="category_id" value="2">
        <input type="hidden" name="show" value="fkd">
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Item</label>
              <select name="items_name" class="form-control" required id="">
                <?php
                $data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 2");
                $optionValues = array(
                  "Current Assets",
                  "Current Liabilities",
                  "Cash Conversion Cycle Year",
                  "Vendor Payment Error Rate",
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
                  <a href="<?= base_url('SuperAdmin/del_explanation?user_id='.$user_id.'&date='.$date.'&quote_id='.$key['id'].'&show=fkd') ?>" class="btn btn-sm btn-danger">Delete</a>
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
   Our next financial dashboard example provides a general overview of the most prominent KPIs that can be applied to nearly any business or financial department that needs stable and proactive management and operational processes. With the help of financial analytics software, this dashboard was created to answer critical questions on liquidity, invoicing, budgeting, and overall financial stability of a company. Let’s take a closer look at each.
   
   The financial KPI dashboard starts with an overview of your current working capital, consisting of your current assets and current liabilities. This information will provide you with an instant conclusion if your company is liquid, operationally efficient, and financially healthy in short-term. If your working capital is substantially high, you have the potential to invest and grow. On the other hand, if your current assets don’t exceed your current liabilities, the risk of going bankrupt is higher. We can see that on our finance dashboard example, the working capital is $61000, and the current ratio 1.90, which means that the company has enough financial resources to remain solvent in short-term, and on this dashboard, you can conclude that immediately.
   
   The central part of this dashboard focuses on the cash conversion cycle (CCC) in the last 3 years. It is important to track trends in the CCC to be able to spot if the cycle is decreasing or increasing. A compact overview on these charts shows us that in the last 3 years, the company has been efficient in converting its investments, inventory, and resources into cash flows since the cash cycle was steadily decreasing over time. Great management indeed.
   
   Below the cash conversion cycle, this dashboard depicts the state of invoicing and paying processes. Wrong address, duplicate payments, incorrect amounts all affect the vendor payment error rate and increase it if the accounts payable department doesn’t control these processes effectively. We can see that in the last year, this rate had few spikes that increased the overall average and affected the department, especially in September. It would be wise to dig deeper into this month to see what exactly happened and what kind of processes need to be updated or adjusted. The next months brought a general decline, which could mean that the lesson has been learned.
   
   We finish our finance dashboard example with stats on net profit margin, quick and current ratio, followed by the budget variance. The full scope can be accessed on our dashboard in full-screen mode. The quick and current ratio will show us the liquidity status of our company while the net profit margin is one of the most important indicators of a company’s financial status and health. It basically shows how much net income is generated as a percentage of revenue. This part of the dashboard clearly demonstrates that the financial state of the company is on track and going well. The budget variance below shows us if our gains are positive or negative. Errors while creating the budget such as wrong assumptions, faulty mathematics or relying on stale data can all lead to changes in the variance. Therefore, it is important to create it as accurately as possible, and this financial reporting dashboard will help you in the process.
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
    var url = "<?= base_url('SuperAdmin/finance-year?show=y&user_id=' . $user_id . '&date=' . $date . '#fkd') ?>";
    iframe.src = url;
    iframe.className = 'card w-100';
    iframe.frameborder = '0';
    iframe.height = '400px';

    container.innerHTML = '';
    container.appendChild(iframe);
  });
  $('#fkd').addClass('bg-dark');
 </script>