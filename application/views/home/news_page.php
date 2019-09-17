<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <div class="col-12">
        <div class="row justify-content-center">
            <h3 class="title-berita pb-2 animated fadeIn">Berita & Kegiatan</h3>
        </div>
    </div>

    <?php for ($i = 1; $i <= 10; $i++) { ?>
        <div class="row mt-5 mr-2" data-aos="fade-up">
            <div class="col-1"></div>
            <div class="col-5">
                <div class="row justify-content-end mr-5">
                    <div class="big-news-cover">
                        <img src="<?= base_url('assets/img/bisnis.jpg'); ?>" alt="" class="big-news">
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="row">
                    <a href="#" class="big-title-news mt-3">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </a>
                </div>
                <div class="row">
                    <div class="tanggal-berita">
                        <i class="fas fa-calendar-alt"></i> 12 September 2019
                    </div>
                </div>
                <div class="row">
                    <div class="big-news-des">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lorem ante, pulvinar sed tincidunt eu, tristique vitae dolor. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row justify-content-center pt-4 pb-3">
        <nav aria-label="...">
            <ul class="pagination">
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
    </div>
</div>