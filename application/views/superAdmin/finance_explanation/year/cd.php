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
    <h3>CFO Dashboard <b><?=$date?></b></h3> 
    <button id="load-fkd" class="btn btn-sm btn-warning mb-3">Muat Halaman Dashboard</button>
  <div id="fkd-container"></div>
      <br>
    
   <div class="row">
    <div class="col-md-3">
<form action="<?=base_url('Finance/add_explanation')?>" method="post" id="form_item" class="row">
        <input type="hidden" name="type" value="year">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="user_id" value="<?=$user_id?>">
        <input type="hidden" name="category_id" value="4">
        <input type="hidden" name="show" value="cd">
        <div class="col-md-12">
            <div class="form-group">
              <label for="">Item</label>
              <select name="items_name" class="form-control" required id="">
                <?php
                $data=$this->M_table->dataTableWhere('finance_explanation_year','user_id', $user_id . " AND date_year = '". $date ."' AND category_id = 4");
                $optionValues = array(
                  "REVENUE",
                  "GROSS PROFIT",
                  "Breakdowns",
                  "EBIT",
                  "OPERATING EXPENSES",
                  "NET INCOME",
                  "EVA",
                  "BERRY RATIO",
                  "PAYROLL HEADCOUNT RATIO",
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
              <textarea name="explanation" id="summernoteTextarea" class="form-control"></textarea>  
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
                  <a href="<?= base_url('SuperAdmin/del_explanation?user_id='.$user_id.'&date='.$date.'&quote_id='.$key['id'].'&show=cd') ?>" class="btn btn-sm btn-danger">Delete</a>
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
   Our rundown of the best financial dashboards continues with CFOs (Chief Financial Officers). They usually focus on high-level metrics that expands outside of a pure financial focus so you can also find employee or customer satisfaction metrics, as depicted in our visual example. To see the full scope of this CFO dashboard, please open it in full-screen mode but now we will go through some relevant details.
   
   The dashboard focuses on 4 primary areas that CFOs can find relevant and interesting: costs, sales goals, gross profit, customer and/or employee satisfaction levels. You can easily connect another dashboard within, and additionally implement specific areas of interest such as market indicators, customer analysis, investor relations, cash management, etc. Key metrics that are depicted at the top left of this financial analysis dashboard include the revenue, gross profit, EBIT, operating expenses, and net income. That way, every CFO can have a clear overview of the financial performance within the first quarter of the year. You can see how you performed against set targets and conclude that operating expenses are actually higher than planned. Then you can easily dig deeper, start asking questions, and analyze why this happened in order to avoid such scenarios in the future. We have included simple gauge charts in our visual example so that you can immediately spot if the metric is developing well or it’s in the “red zone.”
   
   On the right side the dashboard shows the breakdown of costs with an additional tab that focuses on the revenue. We can see that, in this case, sales have generated the highest costs within this quarter followed by general and admin. This can give you an idea where your expenses are allocated and if you have the opportunity to lower them as much as possible. We have also added 3 additional metrics: economic value added (EVA), berry ratio, and the payroll headcount ratio, but you can customize your KPIs as needed. These 3 metrics will show you the true economic profit of your company, indication if you’re losing or generating money, and how many employees support your payroll efforts.
   
   Finally, we can take a closer look at the bottom part of the dashboard where we can see details on the employee and customer satisfaction levels expressed also with a 3-month trend. These are non-traditional metrics but every modern CFO needs to keep track of satisfaction levels since lower values could cause additional financial hardships. In this case, the trend in employee satisfaction is negative so you might want to examine what happened and how you can change it. Finally, we can see other connected dashboards which you can customize based on your own requirements, and quickly go through more data as questions arise.
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
    var url = "<?= base_url('SuperAdmin/finance-year?show=y&user_id=' . $user_id . '&date=' . $date . '#cd') ?>";
    iframe.src = url;
    iframe.className = 'card w-100';
    iframe.frameborder = '0';
    iframe.height = '400px';

    container.innerHTML = '';
    container.appendChild(iframe);
  });
  $('#cd').addClass('bg-dark');
 </script>