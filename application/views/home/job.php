<!-- Content -->
<div class="container">
    <!-- Pesan Presiden  -->
    <div class="row">
        <div class="col-12">
            <div class="row justify-content-center">
                <h3 class="title-pesan pb-2 animated fadeIn">Lowongan Pekerjaan</h3>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <!-- Mobile -->
        <div class="col-8 mobile">
            <select data-placeholder="Pilih Departemen" class="chosen-select" tabindex="2">
                <option value=""></option>
                <option value="United States">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
            </select>
        </div>
        <!-- Mobile end -->

        <!-- Desktop -->
        <div class="col-3 desktop">
            <select data-placeholder="Pilih Departemen" class="chosen-select" tabindex="2">
                <option value=""></option>
                <option value="United States">United States</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
            </select>
        </div>
        <!-- Desktop End -->
    </div>

    <div class="row justify-content-center">
        <!-- Mobile -->
        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="box-job mobile">
                <div class="row">
                    <div class="col-3">
                        <div class="crop-job border-radius">
                            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="" class="img-job">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="loker">
                                            Loker
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="font-size: 12px;">
                                            Lorem ipsum
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="loker">
                                            Departemen
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div style="font-size: 12px;">
                                            Staff Accounting
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 align-self-center">
                                <a href="#" class="btn btn-sm btn-success btn-detail">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Mobile End -->

        <!-- Desktop -->
        <?php for ($i = 1; $i <= 6; $i++) { ?>
            <div class="box-job desktop">
                <div class="row">
                    <div class="col-3">
                        <div class="crop-job border-radius">
                            <img src="<?= base_url('assets/img/logo.png'); ?>" alt="" class="img-job">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="row text-center">
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="loker">
                                            Loker
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        Lorem ipsum
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="loker">
                                            Departemen
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        Staff Accounting
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="loker">
                                            Pendidikan
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        S1
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 align-self-center">
                                <a href="#" class="btn btn-success btn-detail">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- Desktop End -->
    </div>

    <div class="row justify-content-center mt-5 pb-3">
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
        <!-- Desktop end -->
    </div>

</div>