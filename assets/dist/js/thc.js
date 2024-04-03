function klik1() {
    var file = document.getElementById('file1');
    file.click();
}
function klik2() {
    var file = document.getElementById('file2');
    file.click();
}
function klik3() {
    var file = document.getElementById('file3');
    file.click();
}
function klik4() {
    var file = document.getElementById('file4');
    file.click();
}
function klik5() {
    var file = document.getElementById('file5');
    file.click();
}
function klik6() {
    var file = document.getElementById('file6');
    file.click();
}
function klik7() {
    var file = document.getElementById('file7');
    file.click();
}
function klik8() {
    var file = document.getElementById('file8');
    file.click();
}
function klik9() {
    var file = document.getElementById('file9');
    file.click();
}
function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}
function bytesToSize(bytes) {
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB']
    if (bytes === 0) 
        return 'n/a'
    const i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)), 10)
    if (i === 0) 
        return `${bytes} ${sizes[i]})`
    return `${ (bytes / (1024 ** i)).toFixed(1)} ${sizes[i]}`
}
//Laporan Keuangan Audited / Non Audited
function lk1() {
    var file = document
        .getElementById('file1')
        .files[0];
    var msg = document.getElementById('message1');
    document
        .getElementById('filenamelk1')
        .innerHTML = file.name;
    var ms = document.getElementById('message1a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
        case 'xlsx':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//Buku Besar
function lk2() {
    var file = document
        .getElementById('file2')
        .files[0];
    var msg = document.getElementById('message2');
    document
        .getElementById('filenamelk2')
        .innerHTML = file.name;
    var ms = document.getElementById('message2a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'xlsx':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//SPT Masa PPN
function lk3() {
    var file = document
        .getElementById('file3')
        .files[0];
    var msg = document.getElementById('message3');
    document
        .getElementById('filenamelk3')
        .innerHTML = file.name;
    var ms = document.getElementById('message3a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
        case 'rar':
        case 'zip':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
// SPT Masa PPh
function lk4() {
    var file = document
        .getElementById('file4')
        .files[0];
    var msg = document.getElementById('message4');
    document
        .getElementById('filenamelk4')
        .innerHTML = file.name;
    var ms = document.getElementById('message4a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
        case 'rar':
        case 'zip':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//SPT Tahunan PPh Badan (wajib pdf dan Kertas Kerja Perhitungan)
function lk5() {
    var file = document
        .getElementById('file5')
        .files[0];
    var msg = document.getElementById('message5');
    document
        .getElementById('filenamelk5')
        .innerHTML = file.name;
    var ms = document.getElementById('message5a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//Transfer Pricing Documentation (Master and Local file)
function lk6() {
    var file = document
        .getElementById('file6')
        .files[0];
    var msg = document.getElementById('message6');
    document
        .getElementById('filenamelk6')
        .innerHTML = file.name;
    var ms = document.getElementById('message6a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//Daftar Penyusutan dan Amortisasi Fiskal
function lk7() {
    var file = document
        .getElementById('file7')
        .files[0];
    var msg = document.getElementById('message7');
    document
        .getElementById('filenamelk7')
        .innerHTML = file.name;
    var ms = document.getElementById('message7a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'xlsx':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
//Dokumen SP2DK/SPHP terbaru
function lk8() {
    var file = document
        .getElementById('file8')
        .files[0];
    var msg = document.getElementById('message8');
    document
        .getElementById('filenamelk8')
        .innerHTML = file.name;
    var ms = document.getElementById('message8a');
    var ext = getExtension(file.name);
    switch (ext.toLowerCase()) {
        case 'pdf':
            msg.className = "text-success";
            msg.innerHTML = 'good';
            ms.className = "text-success fa fa-check-circle";
            return true;
    }

    ms.className = "text-danger fa fa-ban";
    msg.className = "text-danger";
    msg.innerHTML = "*format not met, your current format: " + ext;
    evt.preventDefault();
}
function btnsubmit() {
    var msg1 = document
        .getElementById('message1')
        .innerHTML;
    var msg2 = document
        .getElementById('message2')
        .innerHTML;
    var msg3 = document
        .getElementById('message3')
        .innerHTML;
    var msg4 = document
        .getElementById('message4')
        .innerHTML;
    var msg5 = document
        .getElementById('message5')
        .innerHTML;
    var msg7 = document
        .getElementById('message7')
        .innerHTML;
    var msg8 = document
        .getElementById('message8')
        .innerHTML;
    var msg = 'good';
    if (msg1 != msg) {
        alert("Laporan keuangan audited harus diisi!");
    } else if (msg2 != msg) {
        alert("Buku besar harus diisi");
    } else if (msg3 != msg) {
        alert("SPT Masa PPN harus diisi!");
    } else if (msg4 != msg) {
        alert("SPT Masa PPh harus diisi!");
    } else if (msg5 != msg) {
        alert("SPT Tahunan PPh Badan harus diisi!");
    } else if (msg7 != msg) {
        alert("Daftar Penyusutan dan Amortisasi Fiskal harus diisi!");
    } else if (msg8 != msg) {
        alert("Dokumen SP2DK/SPHP terbaru harus diisi!");
    }
    if(msg1 == msg && msg2 == msg && msg3 == msg && msg4 == msg && msg5 == msg && msg7 == msg && msg8 == msg) {
        var btn = document.getElementById('butonS');
            btn.className = "bg-warning btn btn-sm";
            btn.innerHTML = "uploading..";
            btn.setAttribute('type', 'submit');
            btn.removeAttribute('onclick');
            btn.click();
            btn.setAttribute("disabled","disabled"); 
    }
}