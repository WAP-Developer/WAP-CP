<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Semua Pelamar </a>
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
                                Semua Pelamar
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="javascript:;" class="btn btn-success btn-elevate btn-icon-sm" data-toggle="modal" data-target="#SendEmail">
                                        <i class="la la-envelope"></i>
                                        Bulk Email Jadwal Interview
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <?= $this->session->flashdata('notification'); ?>
                        <form action="" method="get">
                            <label for="">Filter</label>
                            <div class="row" height="50px">
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select id="multiple" class="form-control form-control-chosen" data-placeholder="Pilih Pekerjaan" name="education" multiple>
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-primary mb-2">Cari</button>
                                </div>
                            </div>
                        </form>
                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="wap_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Job</th>
                                    <th>Pendidikan</th>
                                    <th>Bio & CV</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($getApplied as $a) : ?>
                                    <tr>
                                        <td align="center"><?= $i++; ?></td>
                                        <td style="font-weight: bold;"><?= $a['frontname'] . " " . $a['backname'] ?></td>
                                        <td align="center"><?= $a['job'] ?></td>
                                        <td align="center"><?= $a['education'] ?></td>
                                        <td align="center">
                                            <a href="javascript:;" title="Bio" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#bio<?= $a['id'] ?>"> <i class="la la-search"></i></a>
                                            <a href="<?= base_url('assets/img/cv/' . $a['cv']); ?>" target="_blank" title="CV" class="btn btn-sm btn-clean btn-icon btn-icon-md"> <i class="la la-file-o"></i></a>
                                        </td>
                                        <td align="center">
                                            <?php if ($a['status'] == 1) { ?>
                                                <span class="kt-badge kt-badge--warning kt-badge--inline">Review</span>
                                            <?php } else if ($a['status'] == 2) { ?>
                                                <span class="kt-badge kt-badge--success kt-badge--inline">Terima</span>
                                            <?php } else { ?>
                                                <span class="kt-badge kt-badge--danger kt-badge--inline">Tolak</span>
                                            <?php } ?>
                                        </td>
                                        <td align="center">
                                            <?php if ($a['status'] == 1) { ?>
                                                <a href="<?= base_url('cp-admin/job/acc/' . $a['id']); ?>" title="Terima" class="btn btn-sm btn-success btn-elevate btn-icon"> <i class="la la-check"></i> </a>
                                                <a href="<?= base_url('cp-admin/job/no-acc/' . $a['id']); ?>" title="Tolak" class="btn btn-sm btn-danger btn-elevate btn-icon"> <i class="la la-close"></i> </a>
                                            <?php } else {
                                                    echo "-";
                                                } ?>
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

    <?php foreach ($getApplied as $a) : ?>
        <div class="modal fade" id="bio<?= $a['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="Biodata" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="Biodata">Biodata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?= $a['email'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="email" class="form-control" value="<?= $a['no_hp'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="email" class="form-control" value="<?= $a['profile'] ?>" placeholder="Optional" readonly>
                        </div>
                        <div class="form-group">
                            <label>Negara</label>
                            <input type="email" class="form-control" value="<?= $a['country'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Komentar</label>
                            <textarea class="form-control" rows="8" readonly><?= $a['comment'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="modal fade" id="SendEmail" tabindex="-1" role="dialog" aria-labelledby="Biodata" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Biodata">Kirim E-mail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/sendAcc'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control" id="job">
                                <option>----Pilih Loker----</option>
                                <?php foreach ($getJob as $job) : ?>
                                    <option value="<?= $job['id'] ?>"><?= $job['job'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <label for="list">Daftar Email Peserta Diterima</label>
                            <textarea class="form-control" id="list" rows="6" name="email" readonly required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="list">Tanggal Interview</label>
                            <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
</div>