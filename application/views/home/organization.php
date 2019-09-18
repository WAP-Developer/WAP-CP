<!-- Content -->
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-berita pb-2 animated fadeIn">Organisasi</h3>
            </div>
        </div>
    </div>

    <section id="organization">
        <div class="container">
            <div class="row">
                <!-- Mobile -->
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <div class="col-6 mobile">
                        <div class="member-profile">
                            <div class="unhover_img">
                                <img src="<?= base_url('assets/img/speaker-3-hover.png'); ?>" alt="" />
                            </div>
                            <div class="hover_img">
                                <img src="<?= base_url('assets/img/speaker-3-hover.png'); ?>" alt="" />
                            </div>
                            <span>Web Designer</span>
                            <h4><span>Teresa</span> Crawford</h4>
                        </div>
                    </div>
                <?php } ?>
                <!-- Mobile End -->

                <!-- Desktop -->
                <?php for ($i = 1; $i <= 8; $i++) { ?>
                    <div class="col-3 desktop">
                        <div class="member-profile">
                            <div class="unhover_img">
                                <img src="<?= base_url('assets/img/speaker-3-hover.png'); ?>" alt="" />
                            </div>
                            <div class="hover_img">
                                <img src="<?= base_url('assets/img/speaker-3-hover.png'); ?>" alt="" />
                            </div>
                            <span>Web Designer</span>
                            <h4><span>Teresa</span> Crawford</h4>
                        </div>
                    </div>
                <?php } ?>
                <!-- Desktop END -->

            </div>
    </section>

</div>