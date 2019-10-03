<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <div class="col-12">
        <div class="row justify-content-center">
            <h3 class="title-berita pb-2 animated fadeIn">Berita & Kegiatan</h3>
        </div>
    </div>

    <?php foreach ($getAllNews as $getAll) { ?>
        <div class="row mt-5 mr-2" data-aos="fade-up">
            <div class="col-1"></div>
            <div class="col-5">
                <div class="row justify-content-end mr-5">
                    <div class="big-news-cover">
                        <img src="<?= base_url('assets/img/news/' . $getAll['photo']); ?>" alt="" class="big-news">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <a href="<?= base_url('news/detail/' . $getAll['slug']) ?>" class="big-title-news mt-3">
                        <?= $getAll['title'] ?>
                    </a>
                </div>
                <div class="row">
                    <div class="tanggal-berita">
                        <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($getAll['update_at'])); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="big-news-des">
                        <?= substr($getAll['news'], 0, 250); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row justify-content-center pt-4 pb-3">
        <?= $this->pagination->create_links(); ?>
    </div>
</div>