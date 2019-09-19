<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-input-icon kt-input-icon--right kt-subheader__search kt-hidden">
                <input type="text" class="form-control" placeholder="Search order..." id="generalSearch">
                <span class="kt-input-icon__icon kt-input-icon__icon--right">
                    <span><i class="flaticon2-search-1"></i></span>
                </span>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-daterange" data-toggle="kt-tooltip" title="Tanggal Sekarang" data-placement="left">
                    <span class="kt-subheader__btn-daterange-title">Hari Ini</span>&nbsp;
                    <?php
                    function date_indo($date)
                    {
                        $month = array(
                            1 =>   'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember'
                        );
                        $track = explode('-', $date);
                        return $track[2] . ' ' . $month[(int) $track[1]] . ' ' . $track[0];
                    }
                    ?>
                    <span class="kt-subheader__btn-daterange-date"><?= date_indo(date('Y-m-d', time())); ?></span>
                    <i class="flaticon2-calendar-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- end:: Content Head -->

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::Dashboard 1-->

        <!--Begin::Section-->
        <div class="row justify-content-center">
            <div class="col-xl-4">
                <!--begin:: Widgets/Activity-->
                <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title kt-font-light">
                                Profile Pengguna
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget27">
                            <div class="kt-widget27__visual">
                                <img src="<?= base_url('assets/img/back-green.png'); ?>" alt="">
                                <h3 class="kt-widget27__title">
                                    <img src="<?= base_url('assets/img/avatar.png'); ?>" alt="" style="border-radius:50%; box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(0, 0, 0, .23) !important;" width="100px">
                                </h3>
                                <div class="kt-widget27__btn">
                                    <a href="#" class="btn btn-pill btn-light btn-elevate btn-bold"><?= $this->session->userdata('name'); ?></a>
                                </div>
                            </div>
                            <div class="kt-widget27__container kt-portlet__space-x">
                                <div style="margin-left: 50px;">
                                    <tr>
                                        <td>
                                            <span style="font-weight: bold; color: black; font-size: 15px;">Email</span>
                                        </td>
                                        <td width="30%">
                                            <span style="font-weight: bold; color: black; font-size: 15px;">:</span>
                                        </td>
                                        <td>
                                            <span style="font-weight: bold; color: black; font-size: 15px;"><?= $this->session->userdata('email'); ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Activity-->
            </div>
        </div>

        <!--End::Dashboard 1-->
    </div>

    <!-- end:: Content -->
</div>