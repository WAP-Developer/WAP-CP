<!-- end:: Aside -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
        <div class="kt-header-menu-wrapper"></div>

        <!-- begin:: Header Topbar -->
        <div class="kt-header__topbar">

            <!--begin: Language bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--langs">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                    <span class="kt-header__topbar-icon">
                        <img class="" src="<?= base_url('assets'); ?>/img/indo.png" alt="" />
                    </span>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
                    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                        <li class="kt-nav__item kt-nav__item--active">
                            <a href="#" class="kt-nav__link">
                                <span class="kt-nav__link-icon"><img src="<?= base_url('assets'); ?>/img/indo.png" alt="" /></span>
                                <span class="kt-nav__link-text">Indonesia</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!--end: Language bar -->

            <!--begin: User Bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
                <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="kt-header__topbar-user">
                        <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                        <span class="kt-header__topbar-username kt-hidden-mobile"><?= $this->session->userdata('name'); ?></span>
                        <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />

                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"><?= substr($this->session->userdata('name'), '0', '1') ?></span>
                    </div>
                </div>
                <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                    <!--begin: Head -->
                    <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(../assets/media/misc/bg-1.jpg)">
                        <div class="kt-user-card__avatar">
                            <img class="kt-hidden" alt="Pic" src="../assets/media/users/300_25.jpg" />

                            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                            <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?= substr($this->session->userdata('name'), '0', '1') ?></span>
                        </div>
                        <div class="kt-user-card__name">
                            <?= $this->session->userdata('name'); ?>
                        </div>
                    </div>

                    <!--end: Head -->

                    <!--begin: Navigation -->
                    <div class="kt-notification">
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <i class="flaticon2-calendar-3 kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title kt-font-bold">
                                    Profil Saya
                                </div>
                                <div class="kt-notification__item-time">
                                    Pengaturan Akun
                                </div>
                            </div>
                        </a>
                        <div class="kt-notification__custom">
                            <a href="custom_user_login-v2.html" target="_blank" class="btn btn-label-brand btn-sm btn-bold">Keluar</a>
                        </div>
                    </div>

                    <!--end: Navigation -->
                </div>
            </div>

            <!--end: User Bar -->
        </div>

        <!-- end:: Header Topbar -->
    </div>

    <!-- end:: Header -->