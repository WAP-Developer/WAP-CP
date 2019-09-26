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
        <!-- Mobile -->
        <?php foreach ($getAlbums as $getAlbum) { ?>
            <?php
                $this->db->order_by('id_photo', 'DESC');
                $thumbnail = $this->db->get_where('wb_album_foto', array('album_id' => $getAlbum['id']))->row_array(); ?>
            <div class="col-6 mb-4 mobile">
                <div id="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/gallery/' . $thumbnail['photo']); ?>" alt="">
                    <div class="overlay">
                        <h2><?= $getAlbum['album']; ?></h2>
                        <a href="<?= base_url('gallery/detail/' . $getAlbum['slug']); ?>" class="info">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <?php foreach ($getAlbums as $getAlbum) { ?>
            <?php
                $this->db->order_by('id_photo', 'DESC');
                $thumbnail = $this->db->get_where('wb_album_foto', array('album_id' => $getAlbum['id']))->row_array(); ?>

            <div class="col-3 mb-5 desktop">
                <div id="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/gallery/' . $thumbnail['photo']); ?>" alt="">
                    <div class="overlay">
                        <h2><?= $getAlbum['album']; ?></h2>
                        <a href="<?= base_url('gallery/detail/' . $getAlbum['slug']); ?>" class="info">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Desktop End -->
    </div>

    <div class="row justify-content-center">
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
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