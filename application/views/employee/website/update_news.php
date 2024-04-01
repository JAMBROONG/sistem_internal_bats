<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Management</title>
    
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.css">
    
    <link rel="icon" href="<?php echo base_url(); ?>assets/image/logo/icon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <style>
        .note-editor{
            background-color: white;
        }
    </style>
</head>

<body>
    <a href="<?= base_url('Employee/websiteMe/news') ?>" class="btn btn-sm btn-default text-danger m-3 "><i class="fa fa-arrow-left mr-2"></i> back</a>
    <p class="text-center mt-1 mb-5" data-aos="fade-up">
        UPDATE NEWS <br> <b><?= $news['title'] ?></b> <br> <small>date: <i><?= date('Y-m-d H:i:s a',strtotime($news['date'])) ?></i> <br> (<?=$news['total_seen']?>)<i class="fa fa-eye ml-1"></i> </small>
    </p>
    <div class="card border-0 shadow m-4">
        <div class="card-body">
            <form action="<?= base_url('Employee/updtNews') ?>" id="form1" method="post">
                <input type="hidden" name="id" value="<?= $news['id'] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input" class="text-primary">Meta Keyword (Indonesia)</label>
                            <input id="my-input" class="form-control" required placeholder="<?= $news['meta_keyword'] ?>" type="text" name="meta_keyword" value="<?= $news['meta_keyword'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input" class="text-primary">Meta Description (Indonesia)</label>
                            <input id="my-input" class="form-control" required placeholder="<?= $news['meta_description'] ?>" type="text" value="<?= $news['meta_description'] ?>" name="meta_description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input" class="text-success">Meta Keyword (English)</label>
                            <input id="my-input" class="form-control" required placeholder="<?= $news['meta_keyword_eng'] ?>" value="<?= $news['meta_keyword_eng'] ?>" type="text" name="meta_keyword_eng">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input" class="text-success">Meta Description (English)</label>
                            <input id="my-input" class="form-control" required placeholder="<?= $news['meta_description_eng'] ?>" value="<?= $news['meta_description_eng'] ?>" type="text" name="meta_description_eng">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Title (English)</label>
                            <input type="text" class="form-control" required placeholder="<?= $news['title_eng'] ?>" value="<?= $news['title_eng'] ?>" name="title_eng">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Title (Indonesia)</label>
                            <input type="text" class="form-control" required placeholder="<?= $news['title'] ?>" value="<?= $news['title'] ?>" name="title">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Category</label>
                            <select name="category_id" id="" required class="select2 form-control">
                                <option value="<?= $news['category_id'] ?>"><?= $news['category'] ?></option>
                                <?php
                                foreach ($category_news as $key) {
                                    ?>
                                    <option value="<?=$key['id']?>"><?=$key['category']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Author</label>
                            <input type="text" class="form-control" required placeholder="<?= $news['author'] ?>" value="<?= $news['author'] ?>" name="author">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Writer</label>
                            <input type="text" class="form-control" required value="<?=$news['employee_name']?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Content (Indonesia)</label>
                            <textarea name="content" id="" required class="summernote" cols="30" rows="10">
                            <?= $news['content'] ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"  data-aos="fade-up">
                            <label for="my-input">Content (English)</label>
                            <textarea name="content_eng" id="" required class="summernote" cols="30" rows="10">
                            <?= $news['content_eng'] ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <button type="submit"  onclick="return myFunction(this)" class="btn btn-sm btn-success" >update <i class="fa fa-save ml-2"></i></button>
            </form>
        </div>
    </div>
        
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>        
<script src="<?php echo base_url(); ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    
    function myFunction(x){
        x.className = "btn btn-sm btn-warning";
        x.innerHTML = 'uploading... <div class="fa fa-spinner fa-spin"></div>';
        x.disabled = true;
        $('#form1').submit();
    }
    $('.select2').select2();
    AOS.init();
    var update = "<?= $this->session->userdata('update')?>";
            if (update == "success") {
                Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: "<?= $this->session->userdata("message")?>",
                    showConfirmButton: false,
                    timer: 1500
                });
                var printah = "<?= $_SESSION['update'] = "no" ?>";
            }
            
    $(document).ready(function() {
        $('.summernote').summernote();
    });

        </script>
</body>

</html>