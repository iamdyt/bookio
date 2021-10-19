<!DOCTYPE html>
<html lang="en" dir="<?php echo text_dir(); ?>">
<head>
  <?php $settings = get_settings(); ?>
  <?php $user = get_logged_user($this->session->userdata('id')); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="Codericks">
  <link rel="icon" href="<?php echo base_url($settings->favicon) ?>">
  
  <title><?php echo html_escape($settings->site_name); ?> &bull; <?php if(isset($this->chamber->name)){echo html_escape($this->chamber->name).' &bull;';} ?> <?php if(isset($page_title)){echo html_escape($page_title);}else{echo "Dashboard";} ?></title>

  <!-- SYNADMIN -->

  <!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?php echo base_url() ?>assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/admin/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="<?php echo base_url() ?>assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?php echo base_url() ?>assets/admin/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo base_url() ?>assets/admin/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/dark-theme.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/semi-dark.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/header-colors.css" />
<!-- SYN-ADMIN ENDS -->
  <!--  -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/line-icons/lineicons.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Google Font: DM Sans -->
  <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,400i,700" rel="stylesheet">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- sweet alert -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/sweet-alert.css">
  <!-- tags inputs -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet" />
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/css/select2.min.css">
  <!-- nice-select -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/nice-select.css">
  <!-- date & time picker -->
  <link href="<?php echo base_url() ?>assets/admin/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/admin/css/timepicker.min.css" rel="stylesheet">
  <!-- css animation -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/aos.css">
  <!-- fullcalendar -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/fullcalendar-main.min.css">

  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/summernote/summernote-bs4.min.css">

  <?php if (text_dir() == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom-rtl.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/bootstrap-rtl.min.css" crossorigin="anonymous">
  <?php endif ?>

  <script type="text/javascript">
   var csrf_token = '<?= $this->security->get_csrf_hash(); ?>';
   var token_name = '<?= $this->security->get_csrf_token_name();?>'
 </script>

  <?php if (settings()->enable_captcha == 1 && settings()->captcha_site_key != ''): ?>
      <script src='https://www.google.com/recaptcha/api.js'></script>
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom_perfect.css">

  <style>
    .hide{
      display: none;
    }
  </style>
 
  </head>

  <body class="hold-transition sidebar-mini">
  
  <div class="wrapper <?php if(settings()->site_info == 3){echo "d-none";} ?>">

  		<!--start header -->
    <header>

			<div class="topbar d-flex">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu" onclick="mobileToggle()"><i class='bx bx-menu'></i>
					</div>
          
          <div class="top-menu-left d-none d-lg-block">
            <!-- left -->
            <ul class="nav pl-3">
              <?php if(is_user()): ?>
                <li class="nav-item d-none d-sm-inline-block">
                  <a target="_blank" href="<?php echo base_url($this->business->slug) ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-page') ?></a>
                </li>
              <?php else: ?>
                <li class="nav-item d-none d-sm-inline-block">
                  <a target="_blank" href="<?php echo base_url() ?>" class="btn btn-outline-secondary btn-sm mt-1 ml-2"><i class="lni lni-eye"></i> <?php echo trans('view-site') ?></a>
                </li>
              <?php endif; ?>
            </ul>
            <!-- left-end -->
					 </div>

					<div class="user-box dropdown  float-right">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php if (user()->role == 'admin'): ?>
                  <?php else: ?>
                      <img src="<?php echo base_url(user()->thumb) ?>" alt="User Avatar" width="50" class="mr-3 img-circle">
              <?php endif ?>
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo ucfirst(user()->name) ?></p>
								<p class="designattion mb-0"> <?php echo user()->email; ?></p>
                
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end <?php if(text_dir() == 'ltr'){echo "ml-auto";} ?>">
              <?php if (user()->role == 'user'): ?>
                    <li class=""><a href="<?php echo base_url('admin/settings/profile') ?>" class="dropdown-item">
                      <i class="lni lni-user "></i> <?php echo trans('manage-profile') ?>
                    </a></li>
              <?php endif ?>
                  <li class=""><a href="<?php echo base_url('admin/settings/change_password') ?>" class="dropdown-item">
                    <i class="lni lni-lock-alt"></i> <span class="text-sm"><?php echo trans('change-password') ?></span>
                  </a></li>

                  <div class="dropdown-divider"></div>
                  <li class=""><a href="<?php echo base_url('auth/logout') ?>" class="dropdown-item">
                    <i class="lni lni-exit "></i> <?php echo trans('logout') ?>
                  </a></li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->



