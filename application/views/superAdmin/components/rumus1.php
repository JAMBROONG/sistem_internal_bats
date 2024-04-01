<p class="text-muted text-sm">*Input nominalnya secara manual</p>
<form action="<?= base_url('SuperAdmin/processManage_Formula') ?>" method="post" id="r1">
<input type="hidden" name="user_id" value="<?=$user_id?>">
<input type="hidden" name="dataName" value="<?= $dataName ?> ">
<input type="hidden" name="date" id="date" value="<?= $date ?>" class="form-control" required>
<input type="hidden" name="rumus" value="rumus1">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><i class="text-danger">*</i> Value</label>
            <input type="text" name="value" class="form-control" id="rupiah" placeholder="Rp. 24.000.000" required>
        </div>
    <button type="submit" class="btn btn-sm btn-success" form="r1"><i class="fa fa-save mr-2"></i> save</button>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for=""><i class="text-danger">*</i> Description</label>
            <textarea name="formula" id="" cols="30" rows="5" class="form-control" placeholder="ex: KAS DAN SETARA KAS + HUTANG USAHA PIHAK KETIGA + PENJUALAN BERSIH" required></textarea>
        </div>
    </div>
</div>
<div class="form-group">
</div>
</form> 
<script>
 var rupiah = document.getElementById('rupiah');
rupiah.addEventListener('keyup', function(e){
    rupiah.value = formatRupiah(this.value, 'Rp. ');
});
    /* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>