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
        <div class="col-3">
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
    </div>

    <div class="row justify-content-center">
        <div class="box-job">
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
    </div>
    <?php for ($i = 1; $i <= 3; $i++) { ?>
        <div class="row justify-content-center">
            <div class="box-job" data-aos="fade-left">
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
        </div>
    <?php } ?>

    <div class="row justify-content-center mt-5 pb-3">
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