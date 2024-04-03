<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Order</title>
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <?php $this->load->view('superAdmin/header'); ?>
</head>
<body class="hold-transition sidebar-mini lyt">
    <div class="m-5">
        <div class="main-body">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url()?>">Home</a></li>
                    <li class="breadcrumb-item text-sm"><a href="<?= base_url('SuperAdmin/Finances')?>">Finances</a></li>
                    <li class="breadcrumb-item text-sm">
                        <a href="<?= base_url('SuperAdmin/finance_req/'.$user_id)?>">Month or Year</a>
                    </li>
                    <li class="breadcrumb-item text-sm">
                        <a href="<?= base_url('SuperAdmin/finance_core?user_id='.$user_id.'&&type=year&date='.$date)?>">Core</a>
                    </li>
                    <li class="breadcrumb-item text-sm active" aria-current="page">Explanation</li>
                </ol>
            </nav>
        </div>
        <div class="row">
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=cmd'">
              <button type="button" name="" id="cmd" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">Cash Management Dashboard</button>
          </div>
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=fkd'">
              <button type="button" na~me="" id="fkd" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">Financial KPI Dashboard</button>
          </div>
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=pald'">
              <button type="button" name="" id="pald" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">Profit And Loss Dashboard</button>
          </div>
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=cd'">
              <button type="button" name="" id="cd" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">CFO Dashboard</button>
          </div>
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=fpd'">
              <button type="button" name="" id="fpd" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">Financial Performance Dashboard</button>
          </div>
          <div class="col" onclick="window.location = '<?=base_url('SuperAdmin/finance_explanation?user_id='.$user_id.'&date='.$date.'')?>&show=t'">
              <button type="button" name="" id="t" class="btn btn-default text-center btn-lg btn-block d-flex justify-content-center p-4 text-sm">Taxation Dashboard</button>
          </div>
        </div>
        <?php
        if (isset($_GET['show'])) {
            switch ($_GET['show']) {
              case 'cmd':
                $this->load->view('superAdmin/finance_explanation/year/cmd.php');
                break;
              case 'fkd':
                $this->load->view('superAdmin/finance_explanation/year/fkd.php');
                break;
              case 'pald':
                $this->load->view('superAdmin/finance_explanation/year/pald.php');
                break;
              case 'cd':
                $this->load->view('superAdmin/finance_explanation/year/cd.php');
                break;
            case 'fpd':
              $this->load->view('superAdmin/finance_explanation/year/fpd.php');
              break;
            case 't':
              $this->load->view('superAdmin/finance_explanation/year/t.php');
              break;
              default:
                $this->load->view('superAdmin/finance_explanation/year/cmd.php');
                break;
            }
          } else{
            
            $this->load->view('superAdmin/finance_explanation/year/cmd.php');
          }
          
        ?>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#summernoteTextarea').summernote();
      });
      function copyToClipboard() {
        // Get the text to be copied
        var textToCopy = document.getElementById("text-to-copy").textContent;
        
        // Create a temporary textarea element to hold the text
        var tempTextarea = document.createElement("textarea");
        tempTextarea.value = textToCopy;
        
        // Append the textarea to the document
        document.body.appendChild(tempTextarea);
        
        // Select the text in the textarea
        tempTextarea.select();
        
        // Copy the selected text to the clipboard
        document.execCommand("copy");
        
        // Remove the temporary textarea from the document
        document.body.removeChild(tempTextarea);
        alert("Copy successfully");
      }
    </script>
</body>

</html>