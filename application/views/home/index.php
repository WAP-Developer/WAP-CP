<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <div class="col-12">
        <div class="row justify-content-center">
            <h3 class="title-pesan pb-2">Pesan Presiden</h3>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Mobile -->
        <div class="col-4 mobile">
            <div class="box-presiden">
                <img src="<?= base_url('assets/img/' . $getMessages['photo']); ?>" alt="" class="foto-presiden" data-aos="fade-up">
            </div>
        </div>
        <div class="col-8 mobile">
            <div class="row">
                <div class="col-sm-12">
                    <div class="word-press" data-aos="fade-up">
                        <?= $getMessages['message'] ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="presiden" data-aos="fade-up">-<?= $getMessages['president'] ?></div>
                </div>
            </div>
        </div>
        <!-- Mobile end -->

        <!-- Desktop -->
        <div class="col-4 desktop">
            <div class="box-presiden">
                <img src="<?= base_url('assets/img/' . $getMessages['photo']); ?>" alt="" class="foto-presiden" data-aos="fade-up">
            </div>
        </div>
        <div class="col-8 desktop">
            <div class="row">
                <div class="col-12">
                    <div class="word-press" data-aos="fade-up">
                        <?= $getMessages['message'] ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="presiden" data-aos="fade-up">-<?= $getMessages['president'] ?></div>
                </div>
            </div>
        </div>
        <!-- Desktop End -->
    </div>

    <!-- Pesan Presiden End -->
    <hr>
    <hr class="hr-short">

</div>

<section id="history">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center">
                    <h3 class="title-sejarah pb-2">Sejarah JBI</h3>
                </div>
            </div>
        </div>

        <div id="timeline">

            <?php foreach ($getHistories as $getHistory) { ?>
                <div class="timeline-item">
                    <div class="timeline-icon" data-aos="fade-up">
                        <center>
                            <div class="dot-icon"></div>
                        </center>
                    </div>
                    <div class="<?= $getHistory['content'] ?>" data-aos="fade-up" data-aos-delay="100">
                        <div class="tag-line">
                            <div class="<?php if ($getHistory['content'] == "timeline-content right") {
                                                echo "row mr-0 justify-content-end";
                                            } else {
                                                echo "row ml-3";
                                            } ?>">
                                <div class="tag-line-gradasi">
                                    <h3><?= $getHistory['year'] ?></h3>
                                </div>
                            </div>
                        </div>
                        <p>
                            <?= $getHistory['history'] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <hr>
        <hr class="hr-short">
    </div>
</section>

<section id="vm">
    <div class="container">
        <!-- Visi Misi -->
        <div class="row">
            <!-- mobile -->
            <div class="col-12">
                <center>
                    <h3 class="visi-mobile" data-aos="fade-up">Visi</h3>
                    <img src="<?= base_url('assets/company/') ?>img/undraw_online_discussion_5wgl.png" alt="misi" class="visi-gbr-mobile" width="300px" data-aos="fade-up">
                </center>
                <div class="row">
                    <div class="description-text-mobile" data-aos="fade-up">
                        <?= $getVM['visi'] ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <center>
                    <h3 class="misi-mobile" data-aos="fade-up">Misi</h3>
                    <img src="<?= base_url('assets/company/') ?>img/undraw_predictive_analytics_kf9n.png" alt="misi" class="misi-gbr-mobile" width="300px" data-aos="fade-up">
                </center>
                <div class="row">
                    <div class="description-text-mobile" data-aos="fade-up">
                        <?= $getVM['misi'] ?>
                    </div>
                </div>
            </div>
            <!-- akhir mobile -->

            <!-- Desktop -->
            <div class="col-6">
                <center>
                    <h3 class="visi" data-aos="fade-up">Visi</h3>
                    <img src="<?= base_url('assets/company/') ?>img/undraw_online_discussion_5wgl.png" alt="visi" class="visi-gbr" width="300px" data-aos="fade-up">
                </center>
                <div class="row">
                    <div class="description-text" data-aos="fade-up">
                        <?= $getVM['visi'] ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <center>
                    <h3 class="misi" data-aos="fade-up">Misi</h3>
                    <img src="<?= base_url('assets/company/') ?>img/undraw_predictive_analytics_kf9n.png" alt="misi" class="misi-gbr" width="300px" data-aos="fade-up">
                </center>
                <div class="row">
                    <div class="description-text mt-1" data-aos="fade-up">
                        <?= $getVM['misi'] ?>
                    </div>
                </div>
            </div>
            <!-- akhir desktop -->
        </div>
        <!-- end visi misi -->
        <hr>
        <hr class="hr-short">
    </div>
</section>

<section id="product">
    <div class="produk">

        <center>
            <h3 class="produk-text">Produk</h3>
        </center>

        <div class="container">
            <div class="row">
                <div class="owl-carousel">
                    <div class="box-produk" data-aos="fade-up">
                        <img src="<?= base_url('assets/img/ra.png'); ?>" alt="Rocker Arm" class="img-prod" height="140px">
                        <h4 class="des-fw">Rocker Arm</h4>
                    </div>
                    <div class="box-produk" data-aos="fade-up" data-aos-delay="200">
                        <img src="<?= base_url('assets/img/yoke.png'); ?>" alt="Yoke" class="img-prod" height="140px">
                        <h4 class="des-fw">Yoke</h4>
                    </div>
                    <div class="box-produk" data-aos="fade-up" data-aos-delay="400">
                        <img src="<?= base_url('assets/img/shaft.png'); ?>" alt="Shaft" class="img-prod" height="140px">
                        <h4 class="des-fw">Propeller Shaft</h4>
                    </div>
                    <div class="box-produk" data-aos="fade-up" data-aos-delay="600">
                        <img src="<?= base_url('assets/img/rga.png'); ?>" alt="Ring Gear" class="img-prod" height="150px">
                        <h4 class="des-rg">Ring Gear</h4>
                    </div>
                    <div class="box-produk" data-aos="fade-up" data-aos-delay="800">
                        <img src="<?= base_url('assets/img/fw.png'); ?>" alt="Flywheel" class="img-prod" height="140px">
                        <h4 class="des-fw">Fly Wheel</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="customer">
    <div class="container">
        <hr>
        <hr class="hr-short">
        <center>
            <h3 class="customer-text" style="margin-bottom: 30px;" data-aos="fade-up">Brand Customer</h3>
        </center>
        <div class="row justify-content-center" data-aos="fade-up">
            <!-- Desktop -->
            <div class="brand-desktop">
                <img src="<?= base_url('assets/img/toyota.png'); ?>" alt="Toyota" class="toyota">
                <img src="<?= base_url('assets/img/mitsubishi.png'); ?>" alt="Mitsubishi" class="mitsubishi">
                <img src="<?= base_url('assets/img/isuzu.png'); ?>" alt="Isuzu" class="isuzu">
                <img src="<?= base_url('assets/img/daihatsu.jpg'); ?>" alt="Daihatsu" class="daihatsu">
                <img src="<?= base_url('assets/img/suzuki.png'); ?>" alt="Suzuki" class="suzuki">
                <img src="<?= base_url('assets/img/hino.png'); ?>" alt="Hino" class="hino">
            </div>
            <!-- Tutup Desktop -->
            <!-- Mobile -->
            <div class="brand-mobile display-inline">
                <center>
                    <img src="<?= base_url('assets/img/toyota.png'); ?>" alt="Toyota" class="toyota">
                    <img src="<?= base_url('assets/img/mitsubishi.png'); ?>" alt="Mitsubishi" class="mitsubishi">
                    <img src="<?= base_url('assets/img/isuzu.png'); ?>" alt="Isuzu" class="isuzu">
                    <img src="<?= base_url('assets/img/daihatsu.jpg'); ?>" alt="Daihatsu" class="daihatsu">
                    <img src="<?= base_url('assets/img/suzuki.png'); ?>" alt="Suzuki" class="suzuki">
                    <img src="<?= base_url('assets/img/hino.png'); ?>" alt="Hino" class="hino">
                </center>
            </div>
            <!-- Tutup Mobile -->
        </div>
    </div>
</section>