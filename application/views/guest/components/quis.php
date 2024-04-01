
<script>
    function disableButton2(btn) {
            var btn = document.getElementById('btn1');
            btn.className = "bg-warning btn btn-sm";
            btn.innerHTML = "uploading..";
            btn.setAttribute('type', 'submit');
            btn.removeAttribute('onclick');
            btn.click();
            btn.setAttribute("disabled","disabled"); 
    }
</script>
<div id="pertanyaan" class="card shadow-none">
    <div class="card-header text-white"   style="background-color: #2F2F2F;">
        <div class="card-title">
            2. Question
        </div>
    </div>
    <div class="card-body">
        <style>
            label {
    font-weight: normal !important;
}
        </style>
        <form action="<?=base_url('Guest/quizz')?>" method="post" enctype="multipart/form-data">
            <?php
            $no = 1;
            foreach ($thc_guest_question as $key) {?>
            <div class="form-group bg-light p-3 rounded">
                <input type="hidden" name="question_id<?=$key['id']?>" value="<?=$key['id']?>">
                <p><?= $no .". ". $key['question']?></p>
                    <div class="form-group clearfix mt-3">
                <?php 
                foreach ($thc_guest_answer_primary as $row) {
                    if ($row['question_id'] == $key['id']) {?>
                      <div class="icheck-info d-inline mr-3">
                        <input type="radio" name="answer<?=$key['id']?>" value="<?= $row['id'] ?>" id="radioDanger1<?= $row['id'] ?>" required>
                        <label class=" h6" for="radioDanger1<?= $row['id'] ?>">
                            <?= $row['answer'] ?>
                        </label>
                      </div> <br>
                    <?php
                    }
                    ?>
                    
                <?php
                }
                ?>
                    </div>
                <h6>Penjelasan:</h6>
                <div class="row">
                    <div class="col-md-8">
                        <textarea  rows="5" class="form-control" type="text" name="textbox<?=$key['id']?>" placeholder="..." ></textarea>
                    </div>
                    
                    <div class="col-md-4">
                        <small class="text-danger">upload file bila diperlukan format (doc)</small> <br>
                        <input type="file" name="image[]" class="mt-2">
                    </div>
                </div>
            </div>
            <hr>
            <?php
            $no++;
            }
            ?>
            <div class="form-group">
                <button class="btn btn-sm btn-success" id="btn1" onclick="disableButton2(this)"><i class="fa fa-save mr-2"></i>save answer</button>
            </div>
        </form>

    </div>
</div>