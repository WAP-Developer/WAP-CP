<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Semua Berita </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
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
    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon-list"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Semua Berita
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="<?= base_url('cp-admin/news/add-news'); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Berita
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <?= $this->session->flashdata('notification'); ?>
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul</th>
                                    <th>Tanggal Publish</th>
                                    <th>Penerbit</th>
                                    <th>Preview</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($user['role_id'] == 1) {
                                    $loop = $getAllNews;
                                } else {
                                    $loop = $getselectedNews;
                                }
                                $i = 1;
                                foreach ($loop as $getNews) :
                                    ?>
                                    <tr>
                                        <td align="center"><?= $i++; ?></td>
                                        <td style="font-weight: bold;"><?= $getNews['title'] ?></td>
                                        <td align="center"><?= $getNews['update_at'] ?></td>
                                        <td align="center"><?= $getNews['name'] ?></td>
                                        <td align="center"><a href="<?= base_url('cp-admin/delete-album/'); ?>" title="Preview" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-search"></i> </a></td>
                                        <td align="center">
                                            <a href="<?= base_url('cp-admin/news/edit-news/' . $getNews['id']); ?>" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-news/' . $getNews['id']); ?>" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>