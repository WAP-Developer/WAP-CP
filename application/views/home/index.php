<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <div class="col-12">
        <div class="row justify-content-center">
            <h3 class="title-pesan pb-2 animated fadeIn">Pesan Presiden</h3>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Mobile -->
        <div class="col-4 mobile">
            <div class="box-presiden">
                <img src="<?= base_url('assets/img/businessman.png'); ?>" alt="" class="foto-presiden">
            </div>
        </div>
        <div class="col-8 mobile">
            <div class="row">
                <div class="col-sm-12">
                    <div class="word-press">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                        In ante nulla, tempor eu metus at, mattis commodo justo.
                        Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                        mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                        diam et laoreet sodales, ligula purus porttitor eros.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="presiden">-Naoki Sakashita</div>
                </div>
            </div>
        </div>
        <!-- Mobile end -->

        <!-- Desktop -->
        <div class="col-4 desktop">
            <div class="box-presiden">
                <img src="<?= base_url('assets/img/businessman.png'); ?>" alt="" class="foto-presiden">
            </div>
        </div>
        <div class="col-8 desktop">
            <div class="row">
                <div class="col-12">
                    <div class="word-press">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                        In ante nulla, tempor eu metus at, mattis commodo justo.
                        Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                        mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                        diam et laoreet sodales, ligula purus porttitor eros, ut interdum
                        nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc
                        posuere interdum dictum. Integer massa urna, condimentum
                        at maximus eu, luctus non mauris.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="presiden">-Naoki Sakashita</div>
                </div>
            </div>
        </div>
        <!-- Desktop End -->
    </div>

    <!-- Pesan Presiden End -->
    <hr>
    <hr class="hr-short">

</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-sejarah pb-2 animated fadeIn">Sejarah JBI</h3>
            </div>
        </div>
    </div>

    <div id="timeline">

        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="timeline-item">
                <div class="timeline-icon" data-aos="fade-up">
                    <center>
                        <div class="dot-icon"></div>
                    </center>
                </div>
                <div class="timeline-content" data-aos="fade-up" data-aos-delay="100">
                    <div class="tag-line">
                        <div class="tag-line-gradasi">
                            <h3>1996</h3>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Atque, facilis quo maiores magnam modi ab libero praesentium blanditiis.
                    </p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon" data-aos="fade-up">
                    <center>
                        <div class="dot-icon"></div>
                    </center>
                </div>
                <div class="timeline-content right" data-aos="fade-up" data-aos-delay="50">
                    <div class="tag-line">
                        <div class="row justify-content-end">
                            <div class="tag-line-gradasi">
                                <h3>1996</h3>
                            </div>
                        </div>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Atque, facilis quo maiores magnam modi ab libero praesentium blanditiis.
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>

    <hr>
    <hr class="hr-short">
</div>

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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                    In ante nulla, tempor eu metus at, mattis commodo justo.
                    Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                    mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                    diam et laoreet sodales, ligula purus porttitor eros, ut interdum
                    nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc
                    posuere interdum dictum. Integer massa urna, condimentum
                    at maximus eu, luctus non mauris.
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                    In ante nulla, tempor eu metus at, mattis commodo justo.
                    Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                    mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                    diam et laoreet sodales, ligula purus porttitor eros, ut interdum
                    nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc
                    posuere interdum dictum. Integer massa urna, condimentum
                    at maximus eu, luctus non mauris.
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                    In ante nulla, tempor eu metus at, mattis commodo justo.
                    Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                    mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                    diam et laoreet sodales, ligula purus porttitor eros, ut interdum
                    nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc
                    posuere interdum dictum. Integer massa urna, condimentum
                    at maximus eu, luctus non mauris.
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
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Etiam cursus eros vitae risus varius, vel luctus magna pulvinar.
                    In ante nulla, tempor eu metus at, mattis commodo justo.
                    Donec non facilisis mauris. Donec arcu mauris, suscipit ut elit id,
                    mattis lacinia nisi. Cras ut maximus enim. Vivamus sagittis,
                    diam et laoreet sodales, ligula purus porttitor eros, ut interdum
                    nisi elit in risus. Phasellus laoreet id ligula at tincidunt. Nunc
                    posuere interdum dictum. Integer massa urna, condimentum
                    at maximus eu, luctus non mauris.
                </div>
            </div>
        </div>
        <!-- akhir desktop -->
    </div>
    <!-- end visi misi -->
    <hr>
    <hr class="hr-short">
</div>

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
        <div class="brand-mobile">
            <center>
                <img src="<?= base_url('assets/img/toyota.png'); ?>" alt="Toyota" class="toyota"><br>
                <img src="<?= base_url('assets/img/mitsubishi.png'); ?>" alt="Mitsubishi" class="mitsubishi"><br>
                <img src="<?= base_url('assets/img/isuzu.png'); ?>" alt="Isuzu" class="isuzu"><br>
                <img src="<?= base_url('assets/img/daihatsu.jpg'); ?>" alt="Daihatsu" class="daihatsu"><br>
                <img src="<?= base_url('assets/img/suzuki.png'); ?>" alt="Suzuki" class="suzuki"><br>
                <img src="<?= base_url('assets/img/hino.png'); ?>" alt="Hino" class="hino"><br>
            </center>
        </div>
        <!-- Tutup Mobile -->
    </div>
</div>