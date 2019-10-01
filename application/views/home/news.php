<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <?php $news = substr($getOneNews['news'], 0, 250); ?>
    <div class="col-12">
        <div class="row justify-content-center">
            <h3 class="title-berita pb-2 animated fadeIn">Berita & Kegiatan</h3>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Mobile -->
        <?php foreach ($getAllNews as $getAll) { ?>
            <div class="col-12 mobile mb-4">
                <div class="row justify-content-center">
                    <div class="card" style="width: 18rem; border-radius: 15px;">
                        <img src="<?= base_url('assets/img/news/' . $getAll['photo']); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="" class="card-title" style="color:black; text-decoration: none;"><?= $getAll['title'] ?></a>
                            <p class="card-text"><?= substr($getAll['news'], 0, 160) ?>...</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <div class="col-6 mt-4 desktop" data-aos="fade-up">
            <div class="card box-news" style="width: 18rem;">
                <img src="<?= base_url('assets/img/news/' . $getOneNews['photo']); ?>" alt="..." class="card-img-top" height="auto">
                <div class="card-body">
                    <h5 class="card-title"><?= $getOneNews['title']; ?></h5>
                    <div class="tanggal-berita-big">
                        <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($getOneNews['update_at'])) ?>
                    </div>
                    <span style="text-align: justify; font-size: 14px;"><?= $news ?>...</span>
                    <a href="<?= base_url('news/detail/' . $getOneNews['slug']) ?>" class="btn btn-success btn-lengkap">Selengkapnya >></a>
                </div>
            </div>
        </div>
        <?php if ($getFourNews) { ?>
            <div class="vertical-line desktop"></div><?php } ?>
        <div class="col-6 desktop">
            <?php foreach ($getFourNews as $getFour) { ?>
                <div class="box-vertical-news" data-aos="fade-left">
                    <div class="row">
                        <div class="col-4">
                            <div class="crop">
                                <img src="<?= base_url('assets/img/news/' . $getFour['photo']); ?>" alt="" height="110px">
                            </div>
                        </div>
                        <div class="col-8 pt-3 pb-3">
                            <a href="<?= base_url('news/detail/' . $getFour['slug']) ?>" class="title-litle-news" style="height: 100px;">
                                <?= $getFour['title'] ?>
                            </a>
                            <div class="tanggal-berita">
                                <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($getFour['update_at'])); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- Desktop End -->
    </div>

    <?php if ($getTwoNews) { ?>
        <hr class="desktop">
        <hr class="hr-short desktop"><?php } ?>

    <?php foreach ($getTwoNews as $getTwo) { ?>
        <div class="desktop">
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-6 desktop">
                    <div class="row justify-content-end mr-4">
                        <div class="big-news-cover">
                            <img src="<?= base_url('assets/img/news/' . $getFour['photo']); ?>" alt="" class="big-news">
                        </div>
                    </div>
                </div>
                <div class="col-5 desktop">
                    <div class="row">
                        <a href="<?= base_url('news/detail/' . $getTwo['slug']) ?>" class="big-title-news mt-3">
                            <?= $getTwo['title'] ?>
                        </a>
                    </div>
                    <div class="row">
                        <div class="tanggal-berita">
                            <i class="fas fa-calendar-alt"></i> <?= date('d F Y', strtotime($getFour['update_at'])) ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="big-news-des">
                            <?= substr($getTwo['news'], 0, 250); ?>...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row justify-content-center pt-4 pb-3">
        <?php if ($getTwoCount > 7) { ?>
            <nav aria-label="...">
                <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="<?= base_url('news'); ?>">1</a></li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="<?= base_url('news/page/2'); ?>">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Selanjutnya</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
    </div>
</div>