<section id="pdf" class="services">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span>PDF</span>
            <h2>PDF</h2>
            <p>Portable Document Format</p>
        </div>
        <div class="row">
            <?php 
            if (empty($data_pdf)) {?>
            <p class="text-center text-muted" data-aos="fade-up">--- FILES NOT YET ---</p>
            <?php
            }
            $delay= 150;
            $no = 1;
            foreach ($data_pdf as $key) {
                ?>
            <div
                class="col-lg-3 col-md-12 d-flex align-items-stretch justify-content-center mt-4 mt-md-0"
                data-aos="fade-up"
                data-aos-delay="<?=$delay?>">
                <div class="icon-box w-100 h-100">
                    <div class="icon">
                        <i class="bx bx-file"></i>
                    </div>
                    <h4>
                        <a href="<?= $key['content'] ?>">Pdf <?= $no; ?></a>
                    </h4>
                    <p><?= $key['title'] ?></p>
                </div>
            </div>
            <?php
                $delay = $delay + 150;
                $no++;
            }
        ?>
        </div>
    </div>
</section>

<section id="ppt" class="services">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span>PPT</span>
            <h2>PPT</h2>
            <p>Part Per Trilion</p>
        </div>
        <div class="row">
            <?php
            if (empty($data_ppt)) {?>
            <p class="text-center text-muted" data-aos="fade-up">--- FILES NOT YET ---</p>
            <?php
            }
            $delay= 150;
            $no = 1;
            foreach ($data_ppt as $key) {
                ?>
            <div
                class="col-lg-3 col-md-12 d-flex align-items-stretch justify-content-center mt-4 mt-md-0"
                data-aos="fade-up"
                data-aos-delay="<?=$delay?>">
                <div class="icon-box w-100 h-100">
                    <div class="icon">
                        <i class="bx bx-file"></i>
                    </div>
                    <h4>
                        <a href="<?= $key['content'] ?>">Ppt <?= $no; ?></a>
                    </h4>
                    <p><?= $key['title'] ?></p>
                </div>
            </div>
            <?php
                $delay = $delay + 150;
                $no++;
            }
        ?>
        </div>
    </div>
</section>

<section id="yt" class="services">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <span>MP4</span>
            <h2>MP4</h2>
            <p>Video</p>
        </div>
        <div class="row">
            <?php 
            if (empty($data_yt)) {?>
            <p class="text-center text-muted" data-aos="fade-up">--- FILES NOT YET ---</p>
            <?php
            }
            $delay= 150;
            $no = 1;
            foreach ($data_yt as $key) {
                ?>
            <div
                class="col-lg-3 col-md-12 d-flex align-items-stretch justify-content-center mt-4 mt-md-0"
                data-aos="fade-up"
                data-aos-delay="<?=$delay?>">
                <div class="icon-box w-100 h-100">
                    <div class="icon">
                        <i class="bx bx-file"></i>
                    </div>
                    <h4>
                        <a href="<?= $key['content'] ?>">Video <?= $no; ?></a>
                    </h4>
                    <p><?= $key['title'] ?></p>
                </div>
            </div>
            <?php
                $delay = $delay + 150;
                $no++;
            }
        ?>
        </div>
    </div>
</section>