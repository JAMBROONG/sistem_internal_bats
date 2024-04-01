<div class="d-flex p-2 card bg-dark mb-2" id="batsnews">
    <a href="https://bats-consulting.com/news" class="navbar-brand p-0 d-block d-lg-block">
        <img class="lazy" data-src="https://bats-consulting.com/assets/img/flag/Logo BATS News - Putih.png" style="width:150px;" alt="">
    </a>
</div>
<div class="row mb-3">
    <?php
    $httpss = "https://www.bats-consulting.com/";
    function getUrl($x)
    {
        $url = str_replace(",","",$x);
        $url = str_replace(" ","-",$url);$url = str_replace(":","-",$url);$url = str_replace("'","-",$url);$url = str_replace("/","-",$url);
        return $url;
    }
            $no = 1;
            $datas = $this->db->query("SELECT 
            website_news.title AS title_eng,
            website_news.id,
            website_news.date,
            website_news.total_seen,
            website_news_category.category AS category_eng, employee.employee_name, employee.image FROM website_news INNER JOIN website_news_category ON website_news_category.id = website_news.category_id INNER JOIN employee ON employee.id = website_news.employee_id order by website_news.id desc")->result_array();            
            $imageAll = $this->db->query("SELECT website_news_image.*,website_news.title_eng  FROM website_news_image INNER JOIN website_news ON website_news.id = website_news_image.news_id")->result_array();
            $roow = 0;
            foreach ($datas as $key) {
                $roow++;
            if ($no == 5) {
                //continue;
                break;
            }   
            foreach ($imageAll as $key2) {
                if ($key2['news_id'] == $key['id']) {
                    $gambar = $key2['image'];
                }
            }
                ?>
                <div class="col-lg-3 col-6 pb-2"  style="cursor: pointer; hight:100%;" onclick="return window.location.href = '<?=$httpss?>news/<?=getUrl($key['title_eng'])?>'">
                    <div class="card h-100">
                        <img class="img-fluid lazy" data-src="<?=base_url()?>assets/image/website/news_image/<?= $gambar ?>" style="object-fit: cover; height:150px;">
                        <div class="card-body">
                            <div class="mb-2">
                                <a class="badge badge-danger text-white text-uppercase font-weight-semi-bold p-2 mr-2"><?= $key['category_eng'] ?></a>
                                <a class="text-body"><small><?= date('M d, Y ',strtotime($key['date'])) ?></small></a>
                            </div>
                            <a class="text-small text-dark" style="text-decoration: none;"><?= $key['title_eng'] ?></a>
                        </div>
                    </div>
                </div>
    <?php
        $no++;
    }
    ?>
</div>
    