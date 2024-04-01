
<script>
    var rupiah<?= $rows['id'] ?> = document.getElementById('rupiah<?= $rows['id'] ?>');
    rupiah<?= $rows['id'] ?>.addEventListener('keyup', function(e){
        rupiah<?= $rows['id'] ?>.value = formatRupiah(this.value, 'Rp. ');
    });
</script>