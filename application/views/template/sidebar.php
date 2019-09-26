<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
		<ul class="kt-menu__nav ">
			<li class="kt-menu__section ">
				<h4 class="kt-menu__section-text">Administrator</h4>
				<i class="kt-menu__section-icon flaticon-more-v2"></i>
			</li>
			<?php foreach ($sidebars as $sidebar) { ?>
				<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="<?php if ($sidebar['url'] == '#') {
																																			echo "javascript:;";
																																		} else {
																																			echo base_url($sidebar['url']);
																																		} ?>" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><?= $sidebar['icon'] ?></span><span class="kt-menu__link-text"><?= $sidebar['menu'] ?></span>

						<!-- getSubMenu -->
						<?php
							$idRole = $user['role_id'];
							$subSide = $this->admin->getSubSidebar($idRole, $sidebar['menu_id']);

							if (!$subSide) {
								echo "</a></li>";
							} else { ?>
							<i class="kt-menu__ver-arrow la la-angle-right"></i></a>
					<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
						<ul class="kt-menu__subnav">
							<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">General</span></span></li>
							<?php foreach ($subSide as $sub) { ?>
								<li class="kt-menu__item " aria-haspopup="true"><a href="<?= base_url($sub['sub_url']); ?>" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text"><?= $sub['sub_menu']; ?></span></a></li>
							<?php } ?>
						</ul>
					</div>
				</li>
			<?php } ?>
			<!-- getSubMenu End -->

		<?php } ?>
		<li class="kt-menu__section ">
			<h4 class="kt-menu__section-text">Akun</h4>
			<i class="kt-menu__section-icon flaticon-more-v2"></i>
		</li>
		<li class="kt-menu__item " aria-haspopup="true"><a href="<?= base_url('account/logout'); ?>" class="kt-menu__link "><span class="kt-menu__link-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect id="bound" x="0" y="0" width="24" height="24" />
							<path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" id="Path-103" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) " />
							<rect id="Rectangle" fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) " x="13" y="6" width="2" height="12" rx="1" />
							<path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" id="Path-104" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) " />
						</g>
					</svg>
				</span><span class="kt-menu__link-text">Keluar</span></a></li>
		</ul>
	</div>
</div>

<!-- end:: Aside Menu -->
</div>