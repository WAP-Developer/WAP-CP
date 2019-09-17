<!-- Content -->
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-berita pb-2 animated fadeIn">Galeri JBI</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <?php for ($i = 1; $i <= 12; $i++) { ?>
            <div class="col-3 mt-5">
                <div id="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/p4.jpg'); ?>" alt="">
                    <div class="overlay">
                        <h2>Album JBI</h2>
                        <a href="<?= base_url('gallery/detail/1'); ?>" class="info">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row justify-content-center mt-5">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Selanjutnya</a>
                </li>
            </ul>
        </nav>
    </div>

</div>