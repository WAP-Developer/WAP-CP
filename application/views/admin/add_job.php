<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Lowongan pekerjaan </a>
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
                                Tambah Loker
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" action="<?= base_url('cp-admin/job/add-job'); ?>" method="post" enctype="multipart/form-data">
                        <div class="kt-portlet__body">
                            <?= $this->session->flashdata('notification'); ?>
                            <div class="form-group">
                                <label for="title">Lowongan Pekerjaan</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul Berita">
                                <?php echo form_error('title', '<small class="error" style="color:red; margin-left:5px; margin-bottom:-100px;">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="editor">Detail Lowongan Pekerjaan</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <textarea name="description" class="form-control" id="summernote" data-provide="markdown" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departement">Departemen</label>
                                        <select class="form-control" name="departement" id="departement">
                                            <option>---Pilih---</option>
                                            <?php foreach ($getDepartement as $getDep) : ?>
                                                <option value="<?= $getDep['id'] ?>"><?= $getDep['departement'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="edication">Pendidikan</label>
                                        <select class="form-control" name="education" id="education">
                                            <option>---Pilih---</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
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
                                Publish Loker
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper mt-1">
                                <div class="kt-portlet__head-actions">
                                    <span class="kt-switch kt-switch--sm">
                                        <label>
                                            <input type="checkbox" name="recruit" />
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="name">Tanggal Tebit</label>
                            <input class="form-control" type="date" name="publish" value="<?= date('Y-m-d') ?>" id="example-date-input" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal Ditutup</label>
                            <input class="form-control" type="date" name="expired" value="<?= date('Y-m-d') ?>" id="example-date-input">
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions text-right">
                            <button type="submit" class="btn btn-primary">Terbitkan</button>
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