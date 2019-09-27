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
                <?php foreach ($getOrgs as $getOrg) { ?>
                    <div class="col-6 mobile">
                        <div class="member-profile">
                            <div class="row justify-content-center">
                                <div class="img-cropper">
                                    <img src="<?= base_url('assets/img/organization/' . $getOrg['photo']); ?>" alt="" />
                                </div>
                            </div>
                            <div class="box-employe">
                                <div class="row">
                                    <h4 class="front-name"><?= $getOrg['front_name'] ?></h4>
                                </div>
                                <div class="row">
                                    <h4 class="end-name"><?= $getOrg['end_name'] ?></h4>
                                </div>
                                <div class="row">
                                    <div class="box-position">
                                        <center>
                                            <div class="position-org text-center">
                                                <?= $getOrg['position'] ?>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Mobile End -->

                <!-- Desktop -->
                <?php foreach ($getOrgs as $getOrg) { ?>
                    <div class="col-3 desktop">
                        <div class="member-profile">
                            <div class="row justify-content-center">
                                <div class="img-cropper">
                                    <img src="<?= base_url('assets/img/organization/' . $getOrg['photo']); ?>" alt="" />
                                </div>
                            </div>
                            <div class="box-employe">
                                <div class="row">
                                    <h4 class="front-name"><?= $getOrg['front_name'] ?></h1>
                                </div>
                                <div class="row">
                                    <h4 class="end-name"><?= $getOrg['end_name'] ?></h1>
                                </div>
                                <div class="row">
                                    <div class="box-position">
                                        <div class="position-org">
                                            <?= $getOrg['position'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- Desktop END -->

            </div>
    </section>

</div>