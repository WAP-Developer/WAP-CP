<!-- Content -->
<div class="container bingkai">
    <!-- Pesan Presiden  -->
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-group pb-2 animated fadeIn">JBI Group</h3>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <img src="<?= base_url('assets/img/group.png'); ?>" alt="" class="img-of-group">
    </div>
    <hr>
    <hr class="hr-short">
    <div class="row justify-content-center">
        <!-- Mobile -->
        <?php foreach ($getGroups as $getGroup) { ?>
            <div class="box-group mobile" data-aos="fade-left">
                <div class="row justify-content-center">
                    <div class="crop-p">
                        <img src="<?= base_url('assets/img/group/' . $getGroup['photo']); ?>" alt="" class="partner">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-9 ml-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="name-group text-center mt-3">
                                    <?= $getGroup['company'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-deskripsi">
                                <?= $getGroup['description'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end mt-3 mr-3">
                    <a href="<?= $getGroup['link'] ?>" class="btn btn-sm btn-success btn-group mobile">Perusahaan >></a>
                </div>
            </div>
        <?php } ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <?php foreach ($getGroups as $getGroup) : ?>
            <div class="box-group desktop" data-aos="fade-left">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <div class="crop-p">
                            <img src="<?= base_url('assets/img/group/' . $getGroup['photo']); ?>" alt="" class="partner">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row justify-content-center">
                            <div class="name-group">
                                <?= $getGroup['company'] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-deskripsi">
                                <?= $getGroup['description'] ?>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <a href="<?= $getGroup['link'] ?>" class="btn btn-success btn-group">Lihat Perusahaan >></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Desktop End -->
    </div>
</div>