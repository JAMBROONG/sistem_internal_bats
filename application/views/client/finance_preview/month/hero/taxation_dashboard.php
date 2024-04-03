
<div class="shadow-sm rounded p-3">
    
<h3>
Displays tax data for <?= date('F Y',strtotime($date)) ?>
</h3>
    <?php $this->load->view('elements/element_table_tax_client.php');?>
</div>

<script>
const selectedBtn = document.getElementById("td");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>