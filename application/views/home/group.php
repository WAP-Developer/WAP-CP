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
        <?php for ($i = 1; $i <= 4; $i++) { ?>
            <div class="box-group" data-aos="fade-left">
                <div class="row">
                    <div class="col-3">
                        <div class="crop-partner">
                            <img src="<?= base_url('assets/img/ceklo.png'); ?>" alt="" class="partner">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row justify-content-center">
                            <div class="name-group">
                                Hi Apa kabar
                            </div>
                        </div>
                        <div class="row">
                            <div class="group-deskripsi">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et justo vitae enim laoreet vestibulum eget id felis. Proin pellentesque tellus at ornare faucibus. Proin ultricies velit sit amet ipsum efficitur consequat. Donec sem ante, venenatis vel sapien non, bibendum laoreet mi. Ut quis felis quam. Duis sit amet rhoncus mi.
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <a href="#" class="btn btn-success btn-group">Lihat Perusahaan >></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>