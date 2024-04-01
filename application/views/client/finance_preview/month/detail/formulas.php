<?php
$KASDANSETARAKAS=0;$HUTANGUSAHAPIHAKKETIGA=0;$PENJUALANBERSIH=0;$INVESTASISEMENTARA=0;$PIUTANGUSAHAPIHAKKETIGA=0;$PIUTANGUSAHAPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA=0;$PIUTANGLAINLAINPIHAKKETIGA=0;$PIUTANGLAINLAINPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA=0;$PENYISIHANPIUTANGRAGURAGU=0;$PERSEDIAAN=0;$BEBANDIBAYARDIMUKA=0;$UANGMUKAPEMBELIAN=0;$AssetLANCARLAINNYA=0;$PIUTANGJANGKAPANJANG=0;$TANAHDANBANGUNAN=0;$AssetTETAPLAINNYA=0;$DIKURANGIAKUMULASIPENYUSUTAN=0;$INVESTASIPADAPERUSAHAANASOSIASI=0;$INVESTASIJANGKAPANJANGLAINNYA=0;$HARTATIDAKBERWUJUD=0;$AssetPAJAKTANGGUHAN=0;$AssetTIDAKLANCARLAINNYA=0;$HUTANGUSAHAPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA=0;$HUTANGBUNGA=0;$HUTANGPAJAK=0;$HUTANGDIVIDEN=0;$BIAYAYANGMASIHHARUSDIBAYAR=0;$HUTANGBANK=0;$BAGIANHUTANGJANGKAPANJANGYANGJATUHTEMPODALAMTAHUNBERJALAN=0;$UANGMUKAPELANGGAN=0;$KEWAJIBANLANCARLAINNYA=0;$HUTANGBANKJANGKAPANJANG=0;$HUTANGUSAHAJANGKAPANJANGPIHAKLAIN=0;$HUTANGUSAHAJANGKAPANJANGPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA=0;$KEWAJIBANPAJAKTANGGUHAN=0;$KEWAJIBANTIDAKLANCARLAINNYA=0;$MODALSAHAM=0;$AGIOSAHAMTAMBAHANMODALDISETOR=0;$LABADITAHANTAHUNTAHUNSEBELUMNYA=0;$LABADITAHANTAHUNINI=0;$EKUITASLAINLAIN=0;$PEMBELIAN=0;$SALDOBARANGDAGANGANAWAL=0;$SALDOBARANGDAGANGANAKHIR=0;$HARGAPOKOKPENJUALAN=0;$LABAKOTOR=0;$BEBANPENJUALAN=0;$BEBANUMUMDANADMINISTRASI=0;$LABAUSAHA=0;$PENGHASILANBEBANLAIN=0;$BAGIANLABARUGIPERUSAHAANASOSIASI=0;$LABARUGISEBELUMPAJAKPENGHASILAN=0;$BEBANMANFAATPAJAKPENGHASILAN=0;$LABARUGIDARIAKTIVITASNORMAL=0;$POSLUARBIASA=0;$LABARUGISEBELUMHAKMINORITAS=0;$HAKMINORITASATASLABARUGIBERSIHANAKPERUSAHAAN=0;$LABABERSIH=0;
foreach ($sptClientBulanan as $key) {
    if ($key['description'] == "KAS DAN SETARA KAS") { $KASDANSETARAKAS = $key['value']; }
    if ($key['description'] == "HUTANG USAHA PIHAK KETIGA") { $HUTANGUSAHAPIHAKKETIGA = $key['value']; }
    if ($key['description'] == "PENJUALAN BERSIH") { $PENJUALANBERSIH = $key['value']; }
    if ($key['description'] == "INVESTASI SEMENTARA") { $INVESTASISEMENTARA = $key['value']; }
    if ($key['description'] == "PIUTANG USAHA PIHAK KETIGA") { $PIUTANGUSAHAPIHAKKETIGA = $key['value']; }
    if ($key['description'] == "PIUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA") { $PIUTANGUSAHAPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA = $key['value']; }
    if ($key['description'] == "PIUTANG LAIN-LAIN PIHAK KETIGA") { $PIUTANGLAINLAINPIHAKKETIGA = $key['value']; }
    if ($key['description'] == "PIUTANG LAIN-LAIN PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA") { $PIUTANGLAINLAINPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA = $key['value']; }
    if ($key['description'] == "PENYISIHAN PIUTANG RAGURAGU") { $PENYISIHANPIUTANGRAGURAGU = $key['value']; }
    if ($key['description'] == "PERSEDIAAN") { $PERSEDIAAN = $key['value']; }
    if ($key['description'] == "BEBAN DIBAYAR DI MUKA") { $BEBANDIBAYARDIMUKA = $key['value']; }
    if ($key['description'] == "UANG MUKA PEMBELIAN") { $UANGMUKAPEMBELIAN = $key['value']; }
    if ($key['description'] == "Asset LANCAR LAINNYA") { $AssetLANCARLAINNYA = $key['value']; }
    if ($key['description'] == "PIUTANG JANGKA PANJANG") { $PIUTANGJANGKAPANJANG = $key['value']; }
    if ($key['description'] == "TANAH DAN BANGUNAN") { $TANAHDANBANGUNAN = $key['value']; }
    if ($key['description'] == "Asset TETAP LAINNYA") { $AssetTETAPLAINNYA = $key['value']; }
    if ($key['description'] == "DIKURANGI: AKUMULASI PENYUSUTAN") { $DIKURANGIAKUMULASIPENYUSUTAN = $key['value']; }
    if ($key['description'] == "INVESTASI PADA PERUSAHAAN ASOSIASI") { $INVESTASIPADAPERUSAHAANASOSIASI = $key['value']; }
    if ($key['description'] == "INVESTASI JANGKA PANJANG LAINNYA") { $INVESTASIJANGKAPANJANGLAINNYA = $key['value']; }
    if ($key['description'] == "HARTA TIDAK BERWUJUD") { $HARTATIDAKBERWUJUD = $key['value']; }
    if ($key['description'] == "Asset PAJAK TANGGUHAN") { $AssetPAJAKTANGGUHAN = $key['value']; }
    if ($key['description'] == "Asset TIDAK LANCAR LAINNYA") { $AssetTIDAKLANCARLAINNYA = $key['value']; }
    if ($key['description'] == "HUTANG USAHA PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA") { $HUTANGUSAHAPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA = $key['value']; }
    if ($key['description'] == "HUTANG BUNGA") { $HUTANGBUNGA = $key['value']; }
    if ($key['description'] == "HUTANG PAJAK") { $HUTANGPAJAK = $key['value']; }
    if ($key['description'] == "HUTANG DIVIDEN") { $HUTANGDIVIDEN = $key['value']; }
    if ($key['description'] == "BIAYA YANG MASIH HARUS DIBAYAR") { $BIAYAYANGMASIHHARUSDIBAYAR = $key['value']; }
    if ($key['description'] == "HUTANG BANK") { $HUTANGBANK = $key['value']; }
    if ($key['description'] == "BAGIAN HUTANG JANGKA PANJANG YANG JATUH TEMPO DALAM TAHUN BERJALAN") { $BAGIANHUTANGJANGKAPANJANGYANGJATUHTEMPODALAMTAHUNBERJALAN = $key['value']; }
    if ($key['description'] == "UANG MUKA PELANGGAN") { $UANGMUKAPELANGGAN = $key['value']; }
    if ($key['description'] == "KEWAJIBAN LANCAR LAINNYA") { $KEWAJIBANLANCARLAINNYA = $key['value']; }
    if ($key['description'] == "HUTANG BANK JANGKA PANJANG") { $HUTANGBANKJANGKAPANJANG = $key['value']; }
    if ($key['description'] == "HUTANG USAHA JANGKA PANJANG PIHAK LAIN") { $HUTANGUSAHAJANGKAPANJANGPIHAKLAIN = $key['value']; }
    if ($key['description'] == "HUTANG USAHA JANGKA PANJANG PIHAK YANG MEMPUNYAI HUBUNGAN ISTIMEWA") { $HUTANGUSAHAJANGKAPANJANGPIHAKYANGMEMPUNYAIHUBUNGANISTIMEWA = $key['value']; }
    if ($key['description'] == "KEWAJIBAN PAJAK TANGGUHAN") { $KEWAJIBANPAJAKTANGGUHAN = $key['value']; }
    if ($key['description'] == "KEWAJIBAN TIDAK LANCAR LAINNYA") { $KEWAJIBANTIDAKLANCARLAINNYA = $key['value']; }
    if ($key['description'] == "MODAL SAHAM") { $MODALSAHAM = $key['value']; }
    if ($key['description'] == "AGIO SAHAM (TAMBAHAN MODAL DISETOR)") { $AGIOSAHAMTAMBAHANMODALDISETOR = $key['value']; }
    if ($key['description'] == "LABA DITAHAN TAHUNTAHUN SEBELUMNYA") { $LABADITAHANTAHUNTAHUNSEBELUMNYA = $key['value']; }
    if ($key['description'] == "LABA DITAHAN TAHUN INI") { $LABADITAHANTAHUNINI = $key['value']; }
    if ($key['description'] == "EKUITAS LAIN-LAIN") { $EKUITASLAINLAIN = $key['value']; }
    if ($key['description'] == "PEMBELIAN") { $PEMBELIAN = $key['value']; }
    if ($key['description'] == "SALDO BARANG DAGANGAN - AWAL") { $SALDOBARANGDAGANGANAWAL = $key['value']; }
    if ($key['description'] == "SALDO BARANG DAGANGAN - AKHIR") { $SALDOBARANGDAGANGANAKHIR = $key['value']; }
    if ($key['description'] == "HARGA POKOK PENJUALAN") { $HARGAPOKOKPENJUALAN = $key['value']; }
    if ($key['description'] == "LABA KOTOR") { $LABAKOTOR = $key['value']; }
    if ($key['description'] == "BEBAN PENJUALAN") { $BEBANPENJUALAN = $key['value']; }
    if ($key['description'] == "BEBAN UMUM DAN ADMINISTRASI") { $BEBANUMUMDANADMINISTRASI = $key['value']; }
    if ($key['description'] == "LABA USAHA") { $LABAUSAHA = $key['value']; }
    if ($key['description'] == "PENGHASILAN/(BEBAN) LAIN") { $PENGHASILANBEBANLAIN = $key['value']; }
    if ($key['description'] == "BAGIAN LABA (RUGI) PERUSAHAAN ASOSIASI") { $BAGIANLABARUGIPERUSAHAANASOSIASI = $key['value']; }
    if ($key['description'] == "LABA/RUGI SEBELUM PAJAK PENGHASILAN") { $LABARUGISEBELUMPAJAKPENGHASILAN = $key['value']; }
    if ($key['description'] == "BEBAN (MANFAAT) PAJAK PENGHASILAN") { $BEBANMANFAATPAJAKPENGHASILAN = $key['value']; }
    if ($key['description'] == "LABA (RUGI) DARI AKTIVITAS NORMAL") { $LABARUGIDARIAKTIVITASNORMAL = $key['value']; }
    if ($key['description'] == "POS LUAR BIASA") { $POSLUARBIASA = $key['value']; }
    if ($key['description'] == "LABA/RUGI SEBELUM HAK MINORITAS") { $LABARUGISEBELUMHAKMINORITAS = $key['value']; }
    if ($key['description'] == "HAK MINORITAS ATAS LABA (RUGI) BERSIH ANAK PERUSAHAAN") { $HAKMINORITASATASLABARUGIBERSIHANAKPERUSAHAAN = $key['value']; }
    if ($key['description'] == "LABA BERSIH") { $LABABERSIH = $key['value']; }
}

// gross profit margin
// $GROSSPROFITMARGIN = (($LABAKOTOR - $HARGAPOKOKPENJUALAN) / $LABAKOTOR)*100;
$GROSSPROFITMARGIN = 0;

//operating profit margin

//operating expense ratio

//net profit margin

//working capital

//operating expense ratio

//quick ratio / acid test

//berry ratio

//cash conversion cycle

//accounts payable turnover

//accounts receivable turnover

//vendor payment error rate

//budget variance

//return on assets

//return on equity

//economic value added

//employee satisfaction

//payrol headcount ratio

?>
<script>
    if (count(<?= $sptClientBulanan ?>) < 1) {
        alert("data kosong");
    }
    alert(count(<?= $sptClientBulanan ?>));
document.addEventListener("contextmenu", function(e){
    e.preventDefault();
}, false);
</script>