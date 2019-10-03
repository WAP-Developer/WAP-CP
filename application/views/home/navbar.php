<body>
    <div class="preloader">
        <div class="loading">
            <img src="<?= base_url('assets/img/loader.gif'); ?>" width="64">
        </div>
    </div>
    <!-- navbar -->
    <header id="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            <div class="container">
                <img src="<?= base_url(); ?>assets/img/logo.png" class="navbar-logo" alt="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?= base_url('#history') ?>">Sejarah</a>
                                <a class="dropdown-item" href="<?= base_url('#vm') ?>">Visi & Misi</a>
                                <a class="dropdown-item" href="<?= base_url('#product') ?>">Produk</a>
                                <a class="dropdown-item" href="<?= base_url('#customer') ?>">Customer</a>
                                <a class="dropdown-item" href="<?= base_url('organization'); ?>">Organisasi</a>
                                <a class="dropdown-item" href="<?= base_url('achievement') ?>">Piagam</a>
                                <a class="dropdown-item" href="<?= base_url('gallery'); ?>">Galeri</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('news'); ?>">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('job'); ?>">Karir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('group'); ?>">JBI Group</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:;" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url('assets/img/indo.png'); ?>" alt="" class="language">
                            </a>
                            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><img src="<?= base_url('assets/img/indo.png'); ?>" alt="" class="language" style="margin-right:10px;">Indonesia</a>
                                <a class="dropdown-item" href="#"><img src="<?= base_url('assets/img/english.png'); ?>" alt="" class="language" style="margin-right:10px;">English</a>
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>