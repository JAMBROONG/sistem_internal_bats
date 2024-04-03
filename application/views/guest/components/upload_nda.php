<style>
    .file {
        display: none;
    }
</style>
<script>
    function disableButton2(btn) {
            var btn = document.getElementById('btn1');
            btn.className = "bg-warning btn btn-sm";
            btn.innerHTML = "uploading..";
            btn.setAttribute('type', 'submit');
            btn.r
            btn.removeAttribute('onclick');
            btn.click();
            btn.setAttribute("disabled","disabled"); 
    }
</script>
<h5 class="text-justify2 text-orange pt-4">1. Fulfillment Non-Disclosure Agreement (NDA)</h5>
<p class="text-justify2 pb-4">please download the file from BATS-Consulting and give the stamp and director's signature, after that, upload the NDA's document.</p>
<form class="formnda" action="<?= site_url('Guest/uploadNda') ?>" method="post" enctype="multipart/form-data"  >
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <a href="<?=base_url()?>assets/upload/nda/public/NDA untuk THC 2022.docx" class="info-box mb-3 bg-success" download>
                <span class="info-box-icon">
                    <i class="fas fa-download"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">From BATS</span>
                    <span class="info-box-number">Download NDA</span>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a type="button" onclick="klik()" id="pilih_gambar" class="info-box mb-3 bg-warning">
                <span class="info-box-icon">
                    <i class="fas fa-upload"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">From Client</span>
                    <span class="info-box-number form-file-text">Upload NDA (format pdf/doc/docx)</span>
                    <span id="messageErr" class="text-danger"></span>
                </div>
            </a>
            <input type="file" name="image" class="file" id="file2" onchange="fileInfo()">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center p-3">
            <div class="p-4" id="ds" style="display: none ;">
                <span id="filename"></span><br>
                <span id="filedesc"></span><br>
                <button class="btn btn-success btn-sm mt-2" type="submit" id="btn1" onclick="disableButton2(this)" ><i class="fa fa-upload mr-2"></i>upload</button>
            </div>
        </div>
    </div>
</form>


<script>
    function klik() {
        var file = document.getElementById('file2');
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

    function fileInfo() {
        var fileName = document.getElementById('file2')
            .files[0].name;
        var fileSize = document.getElementById('file2')
            .files[0].size;
        var fileType = document.getElementById('file2')
            .files[0].type;
        var msgErr = document.getElementById('messageErr');
        var ext = getExtension(fileName);
        switch (ext.toLowerCase()) {
            case 'doc':
            case 'docx':
            case 'pdf':
                document.getElementById('ds')
                    .style.display = "block";
                document.getElementById('filename')
                    .innerHTML = fileName;
                document.getElementById('filedesc')
                    .innerHTML = '(' + fileSize / 1000 + "kb)";
                msgErr.style.display = "none";
                return true;
        }
        msgErr.innerHTML = "*format not met, your current format: " + ext;
        evt.preventDefault();     
    }
</script>