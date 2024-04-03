
<div>
    
<p class="p-2 text-center">
Displays all years of tax data
</p>
    <?php $this->load->view('elements/element_table_tax_client_year.php');?>
</div>

<script>
const selectedBtn = document.getElementById("td");
selectedBtn.classList.remove("btn-light");
selectedBtn.classList.add("btn-dark");
</script>