<style>
    .file,
    .hide {
        visibility: hidden;
        position: absolute;
    }
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    
    .select2-container--default .select2-results__option {
        color: black;
    }
</style>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="card card-warning" data-aos="fade-up">
        <div class="card-header">
            Things to note!
        </div>
        <div class="card-body">
            <ol>
                <li>Create an interesting article title</li>
                <li>Make sure the content does not contain plagiarism, both text and design</li>
                <li>Make sure you have specified keywords and descriptions to improve Search Engine Optimization (SEO)</li>
                <li>Make sure you have prepared an image that will be uploaded to the gallery according to the article that was created</li>
            </ol>
        </div>
    </div>
<div class="row">
    <div class="col-md-12 table-responsive">
        <div class="d-flex justify-content-between mb-3"data-aos="fade-up">
            <button class="btn btn-success btn-sm text" type="button" data-toggle="modal" data-target="#addNews" ><i class="fa fa-plus mr-2"></i>news</button>
            <select name="category_id" id="" class="select2 w-50" onchange="window.location.href=  this.options[this.selectedIndex].value">
            <option>-- select category --</option>
            <option value="<?=base_url('Employee/websiteMe/news')?>">=== SHOW ALL ===</option>
                                    <?php
                foreach ($category_news as $key) {
                    ?>
                    <option value="<?=base_url('Employee/websiteMe/news/'.md5($key['id']))?>"><?=$key['category_eng']?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <table  id="example2"class="table table-dark mt-2 contentTbl rounded shadow" data-aos="fade-up">
            <thead>
                
            <tr>
                    <td style="font-size: 12px;">#</td>
                    <td style="font-size: 12px;">Title</td>
                    <td style="font-size: 12px;">Content</td>
                    <td style="font-size: 12px;">Writer</td>
                    <td style="font-size: 12px;">Author</td>
                    <td style="font-size: 12px;">Seen</td>
                    <td style="font-size: 12px;">Date</td>
                    <td style="font-size: 12px;">Category</td>
                    <td style="font-size: 12px;">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($news as $key) {
                    ?>
                <tr class="bg-light">
                    <td style="font-size: 12px;" class="text-center"><?= $no ?></td>
                    <td style="font-size: 12px;"><?= $key['title'] ?></td>
                    <td style="font-size: 12px;"><a href="<?= base_url('Employee/preview_news/'.md5($key['id'])) ?>" target="blank" class="text-primary">preview</a> </td>
                    <td style="font-size: 12px;"class=" text-nowrap"><?= $key['employee_name'] ?></td>
                    <td style="font-size: 12px;"class=" text-nowrap"><?= $key['author'] ?></td>
                    <td style="font-size: 12px;"class=" text-nowrap"><?= $key['total_seen'] ?>(<i class="fa fa-eye"></i>)</td>
                    <td style="font-size: 12px;" class=" text-nowrap"><?= date('d, M y h:i:s a',strtotime($key['date'])) ?></td>
                    <td style="font-size: 12px;" class=" text-nowrap text-orange"><?= $key['category_eng'] ?></td>
                    <td class=" text-nowrap">
                        <a href="<?=base_url('Employee/delNews/'.$key['id'])?>" class="btn btn-sm btn-default text-danger alert_notif_news"><i class="fa fa-trash"></i></a>
                        <a href="<?=base_url('Employee/updtNews/'.md5($key['id']))?>" class="btn btn-sm btn-default text-primary alert_notif3"><i class="fa fa-pen"></i></a>
                    </td>
                </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="addNews" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?=base_url('Employee/addNews')?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input" class="text-primary">Meta Keyword (Indonesia)</label>
                                <input id="my-input" class="form-control" required placeholder="ex: perpajakan, pajak, pajak indonesia, dst" type="text" name="meta_keyword">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input" class="text-primary">Meta Description (Indonesia)</label>
                                <input id="my-input" class="form-control" required placeholder="ex: Perpajakan di Indonesia" type="text" name="meta_description">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input" class="text-success">Meta Keyword (English)</label>
                                <input id="my-input" class="form-control" required placeholder="ex: taxation, tax,tax consultant.." type="text" name="meta_keyword_eng">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input" class="text-success">Meta Description (English)</label>
                                <input id="my-input" class="form-control" required placeholder="ex: Tax No.1 in Indonesia" type="text" name="meta_description_eng">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input">Title (English)</label>
                                <input type="text" class="form-control" required placeholder="ex: Tax Strategy: Prospects for year-end tax legislation" name="title_eng">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="my-input">Title (Indonesia)</label>
                                <input type="text" class="form-control" required placeholder="ex: Strategi Perpajakan: Prospek undang-undang pajak akhir tahun" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my-input">Category</label>
                                <select name="category_id" id="" required class="select2">
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
                            <div class="form-group">
                                <label for="my-input">Author</label>
                                <input type="text" class="form-control" required placeholder="ex: Mr. Farhan" name="author">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my-input">Writer</label>
                                <input type="text" class="form-control" required value="<?=$user['employee_name']?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="my-input">Content (Indonesia)</label>
                                <textarea name="content" id="" required class="summernote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="my-input">Content (English)</label>
                                <textarea name="content_eng" id="" required class="summernote" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success" onclick="myFunction(this)">publish <i class="fa fa-upload mr-2"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    
<div class="col-md-4">
        <div class="d-flex">
            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#addCategory" data-aos="fade-up"><i class="fa fa-plus mr-2"></i>category</button>
        </div>
        <div id="addCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="<?=base_url('Employee/addCategoryNews')?>" method="post">
                        <div class="form-group">
                            <label for="my-input">Category(Indonesia)</label>
                            <input id="my-input" class="form-control" type="text" name="category">
                        </div>
                        <div class="form-group">
                            <label for="my-input">Category(English)</label>
                            <input id="my-input" class="form-control" type="text" name="category_eng">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-default text-success">Save <i class="fa fa-save"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-dark mt-3 contentTbl rounded shadow" id="category" data-aos="fade-up">
            <tbody>
                <tr>
                    <td>#</td>
                    <td>category</td>
                    <td>action</td>
                </tr>
                <?php
                $no = 1;
                foreach ($category_news as $key) {
                    ?>
                <tr class="bg-light" data-aos="fade-up">
                    <td class="text-center"><?= $no ?></td>
                    <td><?php
                    if ($key['id'] == 1) {
                        echo $key['category_eng'].'<small class="text-danger"> (default)</small>';
                    } else{
                        echo $key['category_eng'];
                    }
                     ?></td>
                    <td>
                        <?php
                        if ($key['id'] != 1) {
                            ?>
                        <a href="<?=base_url('Employee/delCategoryNews/'.$key['id'])?>" class="btn btn-sm btn-default text-danger alert_notif"><i class="fa fa-trash"></i></a>
                        <a type="button" class="btn btn-sm btn-default text-primary" data-toggle="modal" data-target="#updateCategory<?=$key['id']?>" data-aos="fade-up"><i class="fa fa-pen"></i></a>
                            <?php
                        } else{
                            ?>
                        <button disabled class="btn btn-sm btn-default text-secondary"><i class="fa fa-trash"></i></button>
                        <button class="btn btn-sm btn-default text-warning"  data-toggle="modal" data-target="#descCriteria"><i class="fa fa-question-circle"></i></button>
                        <div id="descCriteria" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        This category contains news that has been deleted by category.
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <div id="updateCategory<?=$key['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="my-modal-title">Update Category </h5>
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="<?=base_url('Employee/updtCategoryNews')?>" method="post">
                                <div class="form-group">
                                    <label for="my-input">Category (Indonesia)</label>
                                    <input type="hidden" name="id" value="<?=$key['id']?>">
                                    <input id="my-input" class="form-control" type="text" value="<?=$key['category']?>" name="category">
                                </div>
                                <div class="form-group">
                                    <label for="my-input">Category (English)</label>
                                    <input id="my-input" class="form-control" type="text" value="<?=$key['category_eng']?>" name="category_eng">
                                </div> 
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-default text-success">Save <i class="fa fa-save ml-2"></i></button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-8">
        
    <div class="d-flex">
            <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#addImageNews" data-aos="fade-up"><i class="fa fa-plus mr-2"></i>image</button>
        </div>
        <div id="addImageNews" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="<?=base_url('Employee/addImageNews')?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="my-input">News</label>
                            <select name="news_id" id="" class="select2 form-control">
                                <?php
                                foreach ($news as $key) {
                                    ?>
                                    <option value="<?=$key['id']?>"><?= $key['title'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Image</label>
                            <input type="file" name="listGambar[]" accept="image/*" class="form-control" multiple>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-default text-success">Save <i class="fa fa-save"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<div class="card shadow border-0 mt-3">
                <div class="card-header bg-dark">
                    <h4 class="card-title">Gallery News</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $no =1;
                        foreach ($image_news as $key) {

                            if ($no ==7) {
                                break;
                            }
                            $no++;
                            ?>
                            <div class="col-sm-2 mt-3">
                                <a href="<?=base_url()?>/assets/image/website/news_image/<?=$key['image']?>" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                    <img src="<?=base_url()?>/assets/image/website/news_image/<?=$key['image']?>" style="width: 100px;height: 60px;" class="img-fluid mb-2" alt="white sample" data-aos="fade-up">
                                    <div class="d-flex">
                                    <a href="<?= base_url('Employee/delImgNews/'.$key['id']) ?>" class=" text-danger mr-2 alert_notif4"><i class="fa fa-trash"></i></a>
                                    </div>
                                    
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="mt-5"></div>
<script>
    
    
    $('.alert_notif').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete this data?",
                    text:"All news will be moved to default category!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            $('.alert_notif3').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Update news?",
                    text:"are you sure you want to change the content of this news?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            $('.alert_notif4').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete Image?",
                    text:"are you sure to delete?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
            
    
    $('.alert_notif_news').on('click', function() {
                var getLink = $(this).attr('href');
                Swal.fire({
                    title: "Delete this news?",
                    text:"data will be permanently deleted",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonColor: '#3085d6',
                    cancelButtonText: "Close"

                }).then(result => {
                    //jika klik ya maka arahkan ke proses.php
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                })
                return false;
            });
    $(document).ready(function() {
        $('.summernote').summernote();
    });
    function myFunction(x){
        x.className = "btn btn-sm btn-warning";
        x.innerHTML = 'uploading... <div class="fa fa-spinner fa-spin"></div>'
    }
    function showContent(x) {
        document.getElementsByClassName("contentTbl").style = "display : none";
        document.getElementById(x).style = "display : block";
    }
    document.getElementById('news').className = "card bg-light";
</script>