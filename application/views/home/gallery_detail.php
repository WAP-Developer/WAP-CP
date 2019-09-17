<!-- Content -->
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-berita pb-2 animated fadeIn">Detail Galeri JBI</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <?php for ($i = 1; $i <= 12; $i++) { ?>
            <div class="col-3 mt-5">
                <div class="hovereffect">
                    <img src="<?= base_url('assets/img/jbithumb.png'); ?>" alt="..." class="img-thumbnail img-overlay">
                    <div class="overlay">
                        <h2>Effect 13</h2>
                        <p>
                            <a href="javascript:;" class="title-hover" data-toggle="modal" data-target="#viewDetail">Lihat Selengkapnya</a>
                        </p>
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

    <div class="row justify-content-center">
        <a href="<?= base_url('gallery'); ?>" class="btn btn-success"><i class="fas fa-angle-double-left"></i> Kembali Ke Album </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lorem Ipsum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/jbithumb.png'); ?>" alt="">
                </div>
            </div>
        </div>
    </div>

</div>