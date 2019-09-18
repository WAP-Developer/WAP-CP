<div class="before-footer">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4 class="footer-alamat">Alamat <i class="fas fa-map-marker-alt"></i></h4>
                <h4 class="alamat-des">Jl. Maligi II Lot C-7D, Kawasan Industri KIIC Sukaluyu, Teluk Jambe Timur, Karawang - Jawa Barat 41361</h4>
            </div>
            <div class="col-4">
                <h4 class="footer-kontak">
                    <center>Halaman</center>
                </h4>
                <div class="pages-color">
                    <table>
                        <tr>
                            <td align="center"><i class="fas fa-photo-video"></i></td>
                            <td><a href="<?= base_url('gallery'); ?>" class="pages-footer">Galeri</a></td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-certificate"></i></td>
                            <td><a href="<?= base_url('achievement'); ?>" class="pages-footer">Piagam</a></td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-briefcase"></i></td>
                            <td><a href="<?= base_url('job'); ?>" class="pages-footer">Karir</a></td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-users"></i></td>
                            <td><a href="<?= base_url('team'); ?>" class="pages-footer">Organisasi</a></td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-newspaper"></i></td>
                            <td><a href="<?= base_url('news'); ?>" class="pages-footer">Berita</a></td>
                        </tr>
                        <tr>
                            <td align="center"><i class="fas fa-building"></i></td>
                            <td><a href="<?= base_url('group'); ?>" class="pages-footer">JBI Group</a></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-4">
                <h4 class="footer-kontak">
                    <center>Kontak</center>
                </h4>
                <div class="row justify-content-center">
                    <div class="col-12 d-inline">
                        <img src="<?= base_url('assets/img/') ?>phone.png" class="img-contact" alt="support">
                        <span class="contact-id">021 - 8902553</span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 d-inline">
                        <img src="<?= base_url('assets/img/') ?>fax.png" class="img-contact" alt="support">
                        <span class="contact-id">021 - 8902553</span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 d-inline">
                        <img src="<?= base_url('assets/img/') ?>email.png" class="img-contact" alt="support">
                        <span class="contact-id">jbi@jibuhin.co.id</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<div class="footer">
    <div class="credit">
        <center>Hak Cipta © 2019 PT. Jidosha Buhin Indonesia</center>
    </div>
</div>
<!-- tutup footer -->

<script src="<?= base_url('assets/company/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/company/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/company/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/company/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assets/dist/') ?>wow/wow.min.js"></script>
<script src="<?= base_url('assets/company/') ?>js/main.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
<script>
    $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({
            allow_single_deselect: true
        });
    });
</script>
<script>
    AOS.init({
        duration: 700
    });
    $(".owl-carousel").owlCarousel({
        margin: 10,
        loop: true,
        autoWidth: true,
        items: 4
    });

    $(document).ready(function() {
        setTimeout(function() {
            $('.preloader').fadeOut('slow', function() {});
        }, 1000);
    })
</script>
</body>

</html>