<section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <span>Material</span>
          <h2>Material</h2>
          <p>Materi berupa PDF, Power Point, dan video melalui channel Youtube BATS Official</p>
        </div>

        <div class="row">
            <?php 
                $delay= 150;
                foreach ($title_content as $key) {
                    ?>
                   <div class="col-lg-4 col-md-6 d-flex align-items-stretct mt-3" data-aos="fade-up" data-aos-delay="<?=$delay?>">
                        <div class="card w-100">
                          <div class="card-body p-0 m-0">
                            <div class="icon-box h-100 w-100 shadow-none">
                              <div class="icon"><i class="bx bx-file"></i></div>
                              <h4><a href="<?= base_url('Employee/content/'. $key['id'])?>"><?= $key['content_title'] ?></a></h4>
                            </div>
                          </div>
                            <a href="<?= base_url('Employee/content/'. $key['id'].'/'.md5($key['id']))?>" class="btn btn-success btn-sm card-footer bg-warning border-0 text-black">selengkapnya <i class="bx bx-book-reader ml-2"></i></a>
                        </div>
                    </div>
                    <?php
                    $delay = $delay + 150;
                }
            ?>
        </div>
        
      </div>
    </section>