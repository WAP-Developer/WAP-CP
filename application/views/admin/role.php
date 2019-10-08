<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

	<!-- begin:: Content Head -->
	<div class="kt-subheader   kt-grid__item" id="kt_subheader">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Dashboard</h3>
			<div class="kt-subheader__breadcrumbs">
				<a href="javascript:;" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
				<span class="kt-subheader__breadcrumbs-separator"></span>
				<a href="" class="kt-subheader__breadcrumbs-link">
					Role Management </a>
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
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="kt-portlet kt-portlet--mobile">
					<div class="kt-portlet__head kt-portlet__head--lg">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon">
								<i class="kt-font-brand flaticon2-user"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Role Manajemen
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-wrapper">
								<div class="kt-portlet__head-actions">
									<a href="javascript:;" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#addRole">
										<i class="la la-plus"></i>
										Role
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<?= $this->session->flashdata('notification'); ?>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Role</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($roles as $role) : ?>
									<tr>
										<th scope="row"><?= $no++; ?></th>
										<td><?= $role['role']; ?></td>
										<td>
											<a href="<?= base_url('cp-admin/menu-role/' . $role['id']); ?>" title="Menu Manajemen" class="btn btn-sm btn-clean btn-icon btn-icon-md"> <i class="la la-list"></i> </a>
											<a href="javascript:;" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="modal" data-target="#edit<?= $role['id']; ?>"> <i class="la la-edit"></i> </a>
											<a href="<?= base_url('cp-admin/delete-role/' . $role['id']); ?>" title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md delete-button"> <i class="la la-trash"></i> </a>
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

	<!-- Modal add -->
	<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form action="<?= base_url('cp-admin/role-management'); ?>" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="role">Role</label>
							<input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
							<input type="text" class="form-control" id="role" name="role" placeholder="Masukan Role" required>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
						<input type="submit" name="add" class="btn btn-success" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal add End -->

	<!-- Modal Edit -->
	<?php foreach ($roles as $role) : ?>
		<div class="modal fade" id="edit<?= $role['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form action="<?= base_url('cp-admin/role-management'); ?>" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="role">Role</label>
								<input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
								<input type="hidden" name="id" value="<?= $role['id']; ?>" />
								<input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
							<input type="submit" name="edit" class="btn btn-success" value="Simpan">
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<!-- Modal Edit End -->

	<!-- end:: Content -->
</div>