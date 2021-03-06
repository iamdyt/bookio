  		<!--sidebar wrapper -->
    <div class="wrapper" >
          <div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header" onclick="mobileToggle()">
				<div>
          <!-- <img src="<?php echo base_url(settings()->favicon) ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> -->
				</div>
				<div>
					<h4 class="logo-text"><?php echo html_escape(settings()->site_name) ?></h4>
				</div>
				<div class="toggle-icon ms-auto" ><i class='fa fa-bars'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
      <?php if (is_admin()): ?>
          <li>
            <a href="<?php echo base_url('admin/dashboard') ?>" class=" <?php if(isset($page_title) && $page_title == "Dashboard"){echo "active";} ?>">
              <div class="parent-icon"><i class='bx bx-home'></i></div> <div class="menu-title"><?php echo trans('dashboard') ?></div>
            </a>
          </li>      

          <li class="<?php if(isset($page) && $page == "Settings"){echo "mm-active";} ?>">
            <a href="#"  onclick="toggleSetting(this)" class="caller has-arrow <?php if(isset($page) && $page == "Settings"){echo "active";} ?>"  aria-expanded="false">
              <div class="parent-icon"><i class='nav-icon lni lni-cog' ></i>
              </div>
              <div class="menu-title"><?php echo trans('settings') ?></div>
            </a>
            <ul class="sp d-none">
              <li> <a href="<?php echo base_url('admin/settings') ?>" class="<?php if(isset($page_title) && $page_title == "System Settings"){echo "active";} ?>"><i class="lni lni-layout nav-icon"></i><p><?php echo trans('website-settings') ?></p></a>
              </li>
              <li class="<?= $uval; ?>"> <a href="<?php echo base_url('admin/payment/settings') ?>" class="<?php if(isset($page_title) && $page_title == "Payment Settings"){echo "active";} ?>"><i class="lni lni-coin nav-icon"></i><?php echo trans('payment-settings') ?></a>
              </li>
              <li> <a href="<?php echo base_url('admin/settings/license') ?>" class=" <?php if(isset($page_title) && $page_title == "License"){echo "active";} ?>"><i class="lni lni-key nav-icon rt-90"></i> <?php echo trans('license') ?></a>
              </li>
              <li> <a href="<?php echo base_url('admin/settings/change_password') ?>" class="<?php if(isset($page_title) && $page_title == "Change Password"){echo "active";} ?>"><i class="lni lni-lock-alt"></i><?php echo trans('change-password') ?></a>
              </li>
            </ul>
          </li>


          <li>
					<a class="<?php if(isset($page_title) && $page_title == "Language"){echo "active";} ?>" href="<?php echo base_url('admin/language') ?>">
						<div class="parent-icon"><i class='fas fa-globe'></i>
						</div>
						<div class="menu-title"><?php echo trans('language') ?></div>
					</a>
				</li>

        <li>
					<a class="<?php if(isset($page_title) && $page_title == "Package"){echo "active";} ?>" href="<?php echo base_url('admin/agents/plans') ?>">
						<div class="parent-icon"><i class='nav-icon lni lni-layers'></i>
						</div>
						<div class="menu-title">Plan Settings</div>
					</a>
				</li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Transactions"){echo "active";} ?>" href="<?php echo base_url('admin/payment/transactions') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-investment"></i></div> 
              <div class="menu-title"><?php echo trans('transactions') ?></div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Category"){echo "active";} ?>" href="<?php echo base_url('admin/category') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-folder"></i> </div> <div class="menu-title"><?php echo trans('categories') ?></div>
            </a>
          </li>

          <li class="">
            <a class="<?php if(isset($page_title) && $page_title == "Blogs"){echo "active";} ?>" href="<?php echo base_url('admin/blog') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-image"></i></div> <div class="menu-title"><?php echo trans('blogs') ?></div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Users"){echo "active";} ?>" href="<?php echo base_url('admin/agents/all') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-users"></i> </div><div class="menu-title">Agents</div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Page"){echo "active";} ?>" href="<?php echo base_url('admin/pages/all') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-files"></i> </div><div class="menu-title">Page Creator</div>
            </a>
          </li>

          <li class="">
            <a class="<?php if(isset($page_title) && $page_title == "Site_features"){echo "active";} ?>" href="<?php echo base_url('admin/site_features') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-star"></i></div> <div class="menu-title"><?php echo trans('features') ?></div>
            </a>
          </li>


          <li class="">
            <a class="<?php if(isset($page_title) && $page_title == "Pages"){echo "active";} ?>" href="<?php echo base_url('admin/pages') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-layout"></i></div> <div class="menu-title"><?php echo trans('pages') ?></div>
            </a>
          </li>

          <li class="">
            <a class="<?php if(isset($page_title) && $page_title == "Faqs"){echo "active";} ?>" href="<?php echo base_url('admin/faq') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-question-circle"></i></div> <div class="menu-title"><?php echo trans('faqs') ?></div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Contact"){echo "active";} ?>" href="<?php echo base_url('admin/contact') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-popup"></i></div> <div class="menu-title"><?php echo trans('contacts') ?></div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "App Info"){echo "active";} ?>" href="<?php echo base_url('admin/dashboard/app_info') ?>">
             <div class="parent-icon"><i class="nav-icon fas fa-info-circle"></i></div>  <div class="menu-title"><?php echo trans('info') ?></div>
            </a>
          </li>

        <!-- Visible only for Agents -->
        <?php endif; ?>

        <?php if (is_agent()):  ?>
            <li class="">
              <a class=" <?php if(isset($page_title) && $page_title == "Users"){echo "active";} ?>" href="<?php echo base_url('admin/users') ?>">
                <div class="parent-icon"><i class="nav-icon lni lni-users"></i> </div><div class="menu-title"><?php echo trans('users') ?></div>
              </a>
            </li>

            <li>
              <a class="<?php if(isset($page_title) && $page_title == "Package"){echo "active";} ?>" href="<?php echo base_url('admin/package') ?>">
                <div class="parent-icon"><i class='nav-icon lni lni-layers'></i>
                </div>
                <div class="menu-title"><?php echo trans('plans') ?></div>
            </a>
				</li>
            <?php foreach(select_pages_location() as $ap) { ?>
                
                <li> 
                  <?php 
                    if ($ap->link == 'in-app'){
                      $linky = base_url('admin/pages/single/').$ap->id;
                      echo "<a href='$linky' target='_blank'><div class='parent-icon'> <i class='nav-icon lni lni-arrow-right'></i> </div>  <div>"."&nbsp; ".mb_convert_case($ap->title, MB_CASE_TITLE)."</div></a>";
                    } else {
                      echo "<a href='$ap->link' target='_blank' > <div class='parent-icon'> <i class='nav-icon lni lni-arrow-right'></i> </div><div>"." &nbsp; ".mb_convert_case($ap->title, MB_CASE_TITLE)."</div></a>";
                    }
                  ?>
                  
                </li>
              <?php } ?>

          <?php endif; ?>

        <?php if (is_user()): ?>

          <li class="">
            <a href="<?php echo base_url('admin/dashboard/user') ?>" class=" <?php if(isset($page_title) && $page_title == "User Dashboard"){echo "active";} ?>" >
              <div class="parent-icon"><i class="nav-icon lni lni-grid-alt"></i></div> <div class="menu-title"><?php echo trans('dashboard') ?></div>
            </a>
          </li>

          <li class="">
            <a class=" <?php if(isset($page_title) && $page_title == "Subscription"){echo "active";} ?>" href="<?php echo base_url('admin/subscription') ?>">
            <div class="parent-icon"><i class="nav-icon lni lni-investment"></i></div> <div class="menu-title"><?php echo trans('subscription') ?></div>
            </a>
          </li>

          <!-- Page creator pages -->
          <li class="<?php if(isset($page) && $page == "Settings"){echo "mm-active";} ?>">
            <!-- <a  onclick="togglePage(this)" class="callery has-arrow <?php if(isset($page) && $page == "Settings"){echo "active";} ?>"  aria-expanded="false">
              <div class="parent-icon"><i class='nav-icon lni lni-files' ></i>
              </div>
              <div class="menu-title">Pages</div>
            
            </a> -->
            <!-- <ul class="pg d-none"> -->
              <?php foreach(select_pages_location_user() as $ap) { ?>
                
                <li> 
                  <?php 
                    if ($ap->link == 'in-app'){
                      $linky = base_url('admin/pages/single/').$ap->id;
                      echo "<a href='$linky' target='_blank' class=''><div class='parent-icon'><i class='nav-icon lni lni-arrow-right'></i></div><div>"."&nbsp; ".mb_convert_case($ap->title, MB_CASE_TITLE)."</div></a>";
                    } else {
                      echo "<a href='$ap->link' target='_blank' class=''><div class='parent-icon'><i class='nav-icon lni lni-arrow-right'></i></div><div>"."&nbsp; ".mb_convert_case($ap->title, MB_CASE_TITLE)."</div></a>";
                    }
                  ?>
                  
                </li>
              <?php } ?>
            <!-- </ul> -->
          </li>
          <!-- end page creator pages -->
    

          <?php if (check_my_payment_status() == TRUE): ?>
            <li class=" <?php if(isset($page) && $page == "Settings"){echo "menu-open";} ?>">
              <a onclick="toggleSetting(this)" href="#" class=" has-arrow caller <?php if(isset($page) && $page == "Settings"){echo "active";} ?>" aria-expanded="false">
                <div class="parent-icon"><i class=" lni lni-cog"></i></div>
                <div class="menu-title">
                  <?php echo trans('settings') ?>
                  
              </div>
              </a>
              
              <ul class="nav nav-treeview sp d-none">
                <li class="nav-item">
                  <a  href="<?php echo base_url('admin/settings/company') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "System Settings"){echo "active";} ?>">
                    <i class="lni lni-home nav-icon"></i>
                    <div><?php echo trans('company-settings') ?></div>
                  </a>
                </li>
                
                <li class="nav-item">
                  <a href="<?php echo base_url('admin/settings/working_hours') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Working Hours"){echo "active";} ?>">
                    <i class="far fa-clock nav-icon"></i>
                    <div><?php echo trans('working-hours') ?></div>
                  </a>
                </li>



                <li class="nav-item d-hide">
                  <a href="<?php echo base_url('admin/settings/embedded_code') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Embedded Settings"){echo "active";} ?>">
                    <i class="fas fa-laptop-code nav-icon"></i>
                    <div>Embedded Code</div>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('admin/settings/qr_code') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "QR Settings"){echo "active";} ?>">
                    <i class="fas fa-qrcode nav-icon"></i>
                    <div>QR Code</div>
                  </a>
                </li>

                <?php if (check_feature_access('get-online-payments') == TRUE): ?>
                  <li class="nav-item <?= $uval; ?>">
                    <a href="<?php echo base_url('admin/payment/user') ?>" class="nav-link <?php if(isset($page_title) && $page_title == "Payment Settings"){echo "active";} ?>">
                      <i class="lni lni-coin nav-icon"></i>
                      <div>Payment Settings</div>
                    </a>
                  </li>
                <?php endif; ?>
                
              </ul>
            </li>

            <?php if (check_feature_access('appointments') == TRUE): ?>
            <li class="">
              <a class="<?php if(isset($page_title) && $page_title == "Appointments"){echo "active";} ?>" href="<?php echo base_url('admin/appointment') ?>">
                <div class="parent-icon"><i class="nav-icon far fa-clock"></i></div> <div class="menu-title"><?php echo trans('appointments') ?></div>
              </a>
            </li>
            <?php endif; ?>

            
            <li class="">
              <a class=" <?php if(isset($page_title) && $page_title == "Calendars"){echo "active";} ?>" href="<?php echo base_url('admin/appointment/calendars') ?>">
                <div class="parent-icon"><i class="nav-icon far fa-calendar-alt"></i></div> <div class="menu-title"><?php echo trans('calendars') ?></div>
              </a>
            </li>
            

            <?php if (check_feature_access('staffs') == TRUE): ?>
            <li class="">
              <a class="<?php if(isset($page_title) && $page_title == "Staff"){echo "active";} ?>" href="<?php echo base_url('admin/staff') ?>">
                <div class="parent-icon"><i class="nav-icon lni lni-network"></i></div> <div class="menu-title"><?php echo trans('staffs') ?></div>
              </a>
            </li>
            <?php endif; ?>


            <?php if (check_feature_access('services') == TRUE): ?>
            <li class="">
              <a class="<?php if(isset($page_title) && $page_title == "Service"){echo "active";} ?>" href="<?php echo base_url('admin/services') ?>">
                <div class="parent-icon"><i class="nav-icon lni lni-layers"></i></div> <div class="menu-title"><?php echo trans('services') ?></div>
              </a>
            </li>
            <?php endif; ?>
            
            <?php if (check_feature_access('customers') == TRUE): ?>  
            <li class="">
              <a class="<?php if(isset($page_title) && $page_title == "Customers"){echo "active";} ?>" href="<?php echo base_url('admin/customers') ?>">
                <div class="parent-icon"><i class="nav-icon lni lni-users"></i></div> <div class="menu-tile"> &nbsp;<?php echo trans('customers') ?></div>
              </a>
            </li>
            <?php endif; ?>

            <li class="">
              <a class=" <?php if(isset($page_title) && $page_title == "Coupons"){echo "active";} ?>" href="<?php echo base_url('admin/coupons') ?>">
              <div class="parent-icon"><i class="nav-icon lni lni-offer"></i></div> <div class="menu-title"><?php echo trans('coupons') ?></div>
              </a>
            </li>

            <?php if (check_feature_access('gallery') == TRUE): ?>
              <li class="">
                <a class=" <?php if(isset($page_title) && $page_title == "Gallery"){echo "active";} ?>" href="<?php echo base_url('admin/gallery') ?>">
                  <div class="parent-icon"><i class="nav-icon lni lni-image"></i></div> <div class="menu-title"><?php echo trans('gallery') ?></div>
                </a>
              </li>
            <?php endif; ?>

          <?php endif; ?>

          <?php endif; ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
        <i class="nav-icon lni lni-exit"></i> <div class="menu-title"><?php echo trans('logout') ?></div>
        </a>
      </li>

			</ul>
			<!--end navigation-->
		</div>
    </div>

		<!--end sidebar wrapper -->
  
  