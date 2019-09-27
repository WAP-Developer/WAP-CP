<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Organisasi </a>
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
            <div class="col-md-9">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand la la-users"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Daftar Pengurus
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="#" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addOrg">
                                        <i class="la la-plus"></i>
                                        Pengurus
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
                                    <th>Nama Lengakp</th>
                                    <th>Jabatan</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($getOrgs as $getOrg) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td><?= $getOrg['front_name'] . ' ' . $getOrg['end_name'] ?></td>
                                        <td align="center"><?= $getOrg['position'] ?></td>
                                        <td align="center"><img src="<?= base_url('assets/img/organization/' . $getOrg['photo']); ?>" alt="" class="img-thumbnail" width="50px"></td>
                                        <td align="center">
                                            <a href="javascript:;" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#editOrg<?= $getOrg['id'] ?>"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-employe/' . $getOrg['id']); ?>" title="Edit" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
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
    <div class="modal fade" id="addOrg" tabindex="-1" role="dialog" aria-labelledby="gallery" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('cp-admin/organization'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="gallery">Tambah Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="front">Nama Depan</label>
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <input type="text" class="form-control" id="front" name="front" placeholder="Masukan Nama Epan">
                        </div>
                        <div class="form-group">
                            <label for="end">Nama Belakang</label>
                            <input type="text" class="form-control" id="end" name="end" placeholder="Masukan Nama Belakang">
                        </div>
                        <div class="form-group">
                            <label for="position">Jabatan</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Masukan Jabatan">
                        </div>
                        <div class="form-group">
                            <label for="photo">Upload Foto (Max. 2MB)</label>
                            <input type="file" class="dropify" id="photo" name="photo" data-height="200" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="addEmploye" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit -->
    <?php foreach ($getOrgs as $getOrg) : ?>
        <div class="modal fade" id="editOrg<?= $getOrg['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="gallery" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('cp-admin/organization'); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="gallery">Edit Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="front">Nama Depan</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <input type="hidden" name="id" value="<?= $getOrg['id'] ?>">
                                <input type="hidden" name="old_img" value="<?= $getOrg['photo'] ?>">
                                <input type="text" class="form-control" id="front" name="front" value="<?= $getOrg['front_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="end">Nama Belakang</label>
                                <input type="text" class="form-control" id="end" name="end" value="<?= $getOrg['end_name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="position">Jabatan</label>
                                <input type="text" class="form-control" id="position" name="position" value="<?= $getOrg['position'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="photo">Upload Foto (Max. 2MB)</label>
                                <input type="file" class="dropify" id="photo" name="photo" data-height="200" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <input type="submit" name="editEmploye" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->
</div>