<!-- Content -->
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-berita pb-2 animated fadeIn">Piagam Penghargaan</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Mobile -->
        <?php foreach ($getAcvs as $getAcv) : ?>
            <div class="col-6 mb-3 mobile">
                <div class="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/achievement/' . $getAcv['photo']); ?>" alt="">
                    <div class="overlay">
                        <p>
                            <a href="javascript:;" class="title-hover" data-toggle="modal" data-target="#viewDetail<?= $getAcv['id'] ?>">LIHAT</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <?php foreach ($getAcvs as $getAcv) { ?>
            <div class="col-3 mt-5 desktop">
                <div class="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/achievement/' . $getAcv['photo']); ?>" alt="">
                    <div class="overlay">
                        <h2><?= $getAcv['achievement']; ?></h2>
                        <p>
                            <a href="javascript:;" class="title-hover" data-toggle="modal" data-target="#viewDetail<?= $getAcv['id'] ?>">Lihat Selengkapnya</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Desktop End -->
    </div>

    <div class="row justify-content-center mt-5">
        <?= $this->pagination->create_links(); ?>
    </div>

    <?php foreach ($getAcvs as $getAcv) : ?>
        <div class="modal fade" id="viewDetail<?= $getAcv['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?= $getAcv['achievement'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-thumbnail" src="<?= base_url('assets/img/achievement/' . $getAcv['photo']); ?>" alt="">
                        <hr>
                        <div class="text-on-modal">
                            <p style="text-align: justify; text-indent: 0.5in;"><?= $getAcv['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>