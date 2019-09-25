<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Dashboard</h3>
            <div class="kt-subheader__breadcrumbs">
                <a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    <?= $title; ?> </a>
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
    <!-- end:: Content Head -->

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-6">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-user"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                <?= $title; ?>
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addMenu">
                                        <i class="la la-plus"></i>
                                        Menu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <?= $this->session->flashdata('notificationa'); ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($getMenus as $getMenu) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $getMenu['menu']; ?></td>
                                        <td><?= $getMenu['icon']; ?></td>
                                        <td><?= $getMenu['url']; ?></td>
                                        <td>
                                            <a href="javascript:;" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#editMenu<?= $getMenu['id']; ?>"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-menu/' . $getMenu['id']); ?>" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                                <i class="kt-font-brand flaticon2-user"></i>
                            </span>
                            <h3 class="kt-portlet__head-title">
                                Sub-<?= $title; ?>
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">
                                    <a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addSub">
                                        <i class="la la-plus"></i>
                                        Sub-Menu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <?= $this->session->flashdata('notificationb'); ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Sub-Menu</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($getSubMenus as $getSubMenu) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $getSubMenu['menu']; ?></td>
                                        <td><?= $getSubMenu['sub_menu'] ?></td>
                                        <td><?= $getSubMenu['sub_url'] ?></td>
                                        <td>
                                            <a href="javascript:;" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#editSub<?= $getSubMenu['id_sub']; ?>"> <i class="la la-edit"></i> </a>
                                            <a href="<?= base_url('cp-admin/delete-sub-menu/' . $getSubMenu['id_sub']); ?>" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Content -->

    <!-- Modal add -->
    <div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('cp-admin/menu-management'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="choose">Menu</label>
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukan Menu" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon (SVG)</label>
                            <textarea type="text" class="form-control" id="icon" name="icon" placeholder="Masukan Icon" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Masukan URL" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="addMenu" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal add End -->

    <!-- Modal add Sub -->
    <div class="modal fade" id="addSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="<?= base_url('cp-admin/menu-management'); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Sub-Menu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                            <select class="form-control" name="menu" required>
                                <option value="">Pilih</option>
                                <?php foreach ($getMenus as $getMenu) : ?>
                                    <option value="<?= $getMenu['id']; ?>"><?= $getMenu['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sub">Sub-Menu</label>
                            <input type="text" class="form-control" id="sub" name="sub" placeholder="Masukan Menu" required>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Masukan URL" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <input type="submit" name="addSub" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal add End -->

    <!-- Modal Edit -->
    <?php foreach ($getMenus as $getMenu) : ?>
        <div class="modal fade" id="editMenu<?= $getMenu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('cp-admin/menu-management'); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="choose">Menu</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <input type="hidden" name="id" value="<?= $getMenu['id'] ?>">
                                <input type="text" class="form-control" id="menu" name="menu" value="<?= $getMenu['menu'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon (SVG)</label>
                                <textarea type="text" class="form-control" id="icon" name="icon" required><?= $getMenu['icon']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?= $getMenu['url'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <input type="submit" name="editMenu" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

    <!-- Modal Edit Sub -->
    <?php foreach ($getSubMenus as $getSubMenu) : ?>
        <div class="modal fade" id="editSub<?= $getSubMenu['id_sub']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="<?= base_url('cp-admin/menu-management'); ?>" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="menu">Menu</label>
                                <input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
                                <select class="form-control" name="menu" required>
                                    <option value="<?= $getSubMenu['menu_id']; ?>"><?= $getSubMenu['menu']; ?></option>
                                    <option value="">-------------</option>
                                    <?php foreach ($getMenus as $getMenu) : ?>
                                        <option value="<?= $getMenu['id']; ?>"><?= $getMenu['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub">Sub-Menu</label>
                                <input type="hidden" name="id" value="<?= $getSubMenu['id_sub']; ?>">
                                <input type="text" class="form-control" id="sub" name="sub" value="<?= $getSubMenu['sub_menu']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="<?= $getSubMenu['sub_url'] ?>" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <input type="submit" name="editSubMenu" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

</div>