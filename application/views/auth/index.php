<div class="kt-grid kt-grid--ver kt-grid--root">
	<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?= base_url('assets'); ?>/media//bg/bg-3.jpg);">
			<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
				<div class="kt-login__container">
					<div class="kt-login__logo">
						<a href="#">
							<img src="<?= base_url('assets'); ?>/img/jbi.png" width="150px">
						</a>
					</div>
					<div class="kt-login__signin">
						<div class="kt-login__head">
							<h3 class="kt-login__title">Selamat Datang</h3>
						</div>
						<form class="kt-form" action="<?= base_url('cp-admin/auth/login'); ?>" method="post">
							<?= $this->session->flashdata('notification'); ?>
							<input type="hidden" name="<?= $name; ?>" value="<?= $hash; ?>" />
							<div class="input-group">
								<input class="form-control" type="text" placeholder="Email" name="email" value="<?= set_value('email'); ?>" autocomplete="off">
								<?php echo form_error('email', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
							</div>
							<div class="input-group">
								<input class="form-control" type="password" placeholder="Password" value="<?= set_value('password'); ?>" name="password">
								<?php echo form_error('password', '<div class="error invalid-feedback" style="display: block;"><b>', '</b></div>'); ?>
							</div>
							<div class="kt-login__actions">
								<button class="btn btn-brand btn-elevate kt-login__btn-primary">Masuk</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>