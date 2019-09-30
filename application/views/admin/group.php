<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Group </a>
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
            <div class="col-md-8">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon-list-2"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                List Group
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addGroup">
                                        <i class="la la-plus"></i>
                                        Group
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
                                    <th>Perusahaan</th>
                                    <th>Link</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($getGroups as $getGroup) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td align="center"><?= $getGroup['company'] ?></td>
                                        <td align="center" width="900px"><input type="text" class="form-control" value="<?= $getGroup['link'] ?>" readonly /></td>
                                        <td align="center"><img src="<?= base_url('assets/img/group/' . $getGroup['photo']); ?>" alt="" class="img-thumbnail" width="60px"></td>
                                        <td align="center">
                                            <a href="javascript:;" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#editGroup<?= $getGroup['id'] ?>"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-group/' . $getGroup['id']); ?>" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
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
    <div class="modal fade" id="addGroup" tabindex="-1" role="dialog" aria-labelledby="group" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="<?= base_url('cp-admin/profile/group'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="group">Add Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <input type="text" class="form-control" id="company" name="company" placeholder="Masukan Perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="http://example.co.id">
                        </div>
                        <div class="form-group">
                            <label for="editor">Description</label>
                            <textarea name="description" class="form-control" id="editor" data-provide="markdown" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Foto (Max. 2MB)</label>
                            <div class="col-md-6">
                                <input type="file" class="dropify" id="photo" name="photo" data-height="200" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="addGroup" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit -->
    <?php foreach ($getGroups as $getGroup) : ?>
        <div class="modal fade" id="editGroup<?= $getGroup['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="group" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('cp-admin/profile/group'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="group">Edit Group</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <input type="hidden" name="id" value="<?= $getGroup['id']; ?>">
                                <input type="hidden" name="img_old" value="<?= $getGroup['photo']; ?>">
                                <input type="text" class="form-control" id="company" name="company" value="<?= $getGroup['company'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" id="link" name="link" value="<?= $getGroup['link'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="editor">Description</label>
                                <textarea name="description" class="form-control" id="editor" data-provide="markdown" rows="10"><?= $getGroup['description'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload Foto (Max. 2MB)</label>
                                <div class="col-md-6">
                                    <input type="file" class="dropify" id="photo" name="photo" data-height="200" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <input type="submit" name="editGroup" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

</div>