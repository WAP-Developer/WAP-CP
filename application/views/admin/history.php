<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Sejarah </a>
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
            <div class="col-md-7">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon-list-2"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                List Sejarah
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addHistory">
                                        <i class="la la-plus"></i>
                                        Sejarah
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
                                    <th>Tahun</th>
                                    <th>Preview</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getHistories as $getHistory) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td align="center" style="font-weight: bold;"><?= $getHistory['year'] ?></td>
                                        <td align="center"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#viewHistory<?= $getHistory['id'] ?>"><i class="la la-search"></i></a></i></td>
                                        <td align="center">
                                            <a href="javascript:;" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#editHistory<?= $getHistory['id'] ?>"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-history/' . $getHistory['id']); ?>" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
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

    <!-- Modal Add -->
    <div class="modal fade" id="addHistory" tabindex="-1" role="dialog" aria-labelledby="gallery" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="<?= base_url('cp-admin/profile/history'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gallery">Add History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="year">Tahun</label>
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <input type="text" class="form-control" id="year" name="year" placeholder="Masukan Tahun Sejarah">
                        </div>
                        <div class="form-group">
                            <label for="about">Description</label>
                            <textarea name="about" class="form-control" id="editor" data-provide="markdown" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="addHistory" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal View -->
    <?php foreach ($getHistories as $getHistory) : ?>
        <div class="modal fade" id="viewHistory<?= $getHistory['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="gallery" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gallery">Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" id="editor" data-provide="markdown" rows="10" readonly><?= $getHistory['history'] ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Modal View -->

    <!-- Modal Edit -->
    <?php foreach ($getHistories as $getHistory) : ?>
        <div class="modal fade" id="editHistory<?= $getHistory['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="history" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('cp-admin/profile/history'); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="history">Edit History</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="year">Tahun</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <input type="hidden" name="id" value="<?= $getHistory['id'] ?>">
                                <input type="hidden" name="content" value="<?= $getHistory['content'] ?>">
                                <input type="text" class="form-control" id="year" name="year" value="<?= $getHistory['year'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="about">Description</label>
                                <textarea name="about" class="form-control" id="editor" data-provide="markdown" rows="10"><?= $getHistory['history'] ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <input type="submit" name="editHistory" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Modal Edit -->

</div>