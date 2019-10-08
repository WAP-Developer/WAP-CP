<!-- Content -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-berita pb-2 animated fadeIn">Berita & Kegiatan</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Desktop -->
        <div class="col-8 desktop">
            <div class="box-detail mb-5">
                <div class="row justify-content-center">
                    <div class="title-detail">
                        <?= $getDetailNews['title'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <table>
                            <tr>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;">Penerbit</div>
                                </td>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;"> : </div>
                                </td>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;"><?= $getDetailNews['name'] ?></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end mr-1">
                            <table>
                                <tr>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;">Terbit</div>
                                    </td>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;"> : </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;"><?= date('d F Y', time()); ?></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <img src="<?= base_url('assets/img/news/' . $getDetailNews['photo']); ?>" alt="" class="img-thumbnail" width="80%">
                </div>
                <div class="row mt-4">
                    <div style="text-align: justify;">
                        <?= $getDetailNews['news'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 desktop">
            <div class="row">
                <div style="font-weight: bold; margin-left: 30px; margin-top:20px">
                    Berita Terbaru
                </div>
            </div>
            <?php foreach ($getRecentNews as $getRecent) : ?>
                <div class="box-recent">
                    <div class="row">
                        <div class="col-4">
                            <div class="crop-recent">
                                <img src="<?= base_url('assets/img/news/' . $getRecent['photo']); ?>" alt="" height="110px" class="img-recent">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="row mt-3 ml-2 mb-3">
                                <a href="<?= base_url('news/detail/' . $getRecent['slug']) ?>" class="title-litle-news">
                                    <?= $getRecent['title'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Mobile -->
        <div class="col-12 mobile">
            <div class="box-detail">
                <div class="row justify-content-center">
                    <div class="title-detail">
                        <?= $getDetailNews['title'] ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <table>
                            <tr>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;">Penerbit</div>
                                </td>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;"> : </div>
                                </td>
                                <td>
                                    <div style="font-weight: bold; font-size: 13px;"><?= $getDetailNews['name'] ?></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="row justify-content-end mr-1">
                            <table>
                                <tr>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;">Terbit</div>
                                    </td>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;"> : </div>
                                    </td>
                                    <td>
                                        <div style="font-weight: bold; font-size: 13px;"><?= date('d F Y', time()); ?></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <img src="<?= base_url('assets/img/news/' . $getDetailNews['photo']); ?>" alt="" class="img-thumbnail" width="80%">
                </div>
                <div class="row mt-4">
                    <div style="text-align: justify; font-size: 13px;">
                        <?= $getDetailNews['news'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-5 mobile">
            <div class="row">
                <div style="font-weight: bold; margin-left: 30px; margin-top:20px">
                    Berita Terbaru
                </div>
            </div>
            <?php foreach ($getRecentNews as $getRecent) : ?>
                <div class="box-recent">
                    <div class="row">
                        <div class="col-3">
                            <div class="crop-recent">
                                <img src="<?= base_url('assets/img/news/' . $getRecent['photo']); ?>" alt="" class="img-recent">
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="row mt-3 ml-2 mb-3">
                                <a href="<?= base_url('news/detail/' . $getRecent['slug']) ?>" class="title-litle-news">
                                    <?= $getRecent['title']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>