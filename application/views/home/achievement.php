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
        <?php for ($i = 1; $i <= 8; $i++) { ?>
            <div class="col-6 mb-3 mobile">
                <div class="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/p14.jpg'); ?>" alt="">
                    <div class="overlay">
                        <p>
                            <a href="javascript:;" class="title-hover" data-toggle="modal" data-target="#viewDetail">LIHAT</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <?php for ($i = 1; $i <= 8; $i++) { ?>
            <div class="col-3 mt-5 desktop">
                <div class="hovereffect">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/p14.jpg'); ?>" alt="">
                    <div class="overlay">
                        <h2>Effect 13</h2>
                        <p>
                            <a href="javascript:;" class="title-hover" data-toggle="modal" data-target="#viewDetail">Lihat Selengkapnya</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Desktop End -->
    </div>

    <div class="row justify-content-center mt-5">
        <!-- Mobile -->
        <nav aria-label="..." class="mobile">
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
        <!-- Mobile End -->

        <!-- Desktop -->
        <nav aria-label="..." class="desktop">
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
        <!-- Desktop -->
    </div>

    <div class="modal fade" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lorem Ipsum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-thumbnail" src="<?= base_url('assets/img/p14.jpg'); ?>" alt="">
                    <hr>
                    <div class="text-on-modal">
                        <p style="text-align: justify; text-indent: 0.5in;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Facilisis volutpat est velit egestas dui id ornare arcu odio. Vel turpis nunc eget lorem dolor sed viverra ipsum nunc. Ultrices vitae auctor eu augue ut. Turpis massa tincidunt dui ut ornare lectus sit amet est. Dis parturient montes nascetur ridiculus mus. Ut placerat orci nulla pellentesque dignissim. Nulla pharetra diam sit amet nisl suscipit adipiscing. Sed vulputate mi sit amet mauris commodo quis imperdiet massa. A erat nam at lectus urna duis convallis. Facilisi nullam vehicula ipsum a arcu cursus vitae congue. Urna cursus eget nunc scelerisque viverra mauris. Vitae elementum curabitur vitae nunc sed velit dignissim. Volutpat lacus laoreet non curabitur gravida. Risus ultricies tristique nulla aliquet enim tortor. Ut tellus elementum sagittis vitae. Ante in nibh mauris cursus mattis molestie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>