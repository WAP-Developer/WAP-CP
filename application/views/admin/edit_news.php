<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Berita </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
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
        <div class="row">
            <div class="col-md-8">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon-chat-1"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Edit Berita
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="<?= base_url('cp-admin/news/edit-news/' . $getNews['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="kt-portlet__body">
                            <?= $this->session->flashdata('notification'); ?>
                            <div class="form-group">
                                <label for="title">Judul Berita</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $getNews['title']; ?>">
                                <?php echo form_error('title', '<small class="error" style="color:red; margin-left:5px; margin-bottom:-100px;">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="editor">Detail Berita</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <input type="hidden" name="id" value="<?= $getNews['id']; ?>" />
                                <input type="hidden" name="img_old" value="<?= $getNews['photo']; ?>" />
                                <input type="hidden" name="admin_id" value="<?= $getNews['admin_id']; ?>" />
                                <textarea name="news" class="form-control" id="summernote" data-provide="markdown" rows="10"><?= $getNews['news']; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Thumbnail</label>
                                        <input type="file" class="dropify" id="photo" name="photo" data-height="200" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Preview :</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <img src="<?php if (!$getNews) {
                                                            echo base_url('assets/img/news/no-photo.png');
                                                        } else {
                                                            echo base_url('assets/img/news/' . $getNews['photo']);
                                                        } ?>" alt="" class="img-thumbnail" width="200px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
            <div class="col-md-4">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon-chat-1"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Publish Berita
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="name">Update at</label>
                            <input class="form-control" type="date" name="update" value="<?= $getNews['update_at'] ?>" id="example-date-input" readonly>
                        </div>
                        <div class="form-group">
                            <label for="editor">Penerbit</label>
                            <input class="form-control" type="text" value="<?= $user['name'] ?>" disabled>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
        <!--End::Dashboard 1-->
    </div>
    <!-- end:: Content -->
</div>