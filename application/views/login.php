<div class="wrapper">
		<div class="authentication-header" style=" position: absolute; background: #8833ff; top: 0; left: 0; right: 0;height: 50%;"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row ">
					<div class="col-md-4 offset-md-4 mx-auto">
						<div class="mb-4 text-center">
							<img src="<?= base_url() ?>assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div id="logini" class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Don't have an account yet? <a href="<?php echo base_url('register') ?>">Sign up here</a>
										</p>
									</div>

									<div class="login-separater text-center mb-4"> <span>SIGN IN WITH EMAIL</span>
										<hr/>
									</div>
									<div class="form-body">
                                    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
                                        <div class="alert alert-success alert-dismissible mb-4 log_alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Logout Successfully !
                                        </div>
                                    <?php endif ?>

                                        <div class="mb-6 text-center">
                                            <?php get_last_logins(); ?>
                                            <h4 class="font-weight-bold mb-0"><a href="<?php echo base_url() ?>"><img width="30%" src="<?php echo base_url(settings()->logo) ?>"></a></h4>
                                            <p class="mb-0"><?php echo trans('sign-in-to-your') ?> <span class="font-weight-bold text-dark"><?php echo html_escape(settings()->site_name) ?> </span> <?php echo trans('account') ?></p>
                                        </div>

                                        <div class="mb-4 mt-4">
                                            <div class="success text-success"></div>
                                            <div class="error text-danger"></div>
                                            <div class="warning text-warning"></div>
                                        </div>
										<form class="row g-3" id="login-form" method="post" action="<?php echo base_url('auth/log'); ?>">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label"><?php echo trans('username') ?></label>
												<input type="email" name="user_name" required class="form-control" id="inputEmailAddress" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label"><?php echo trans('password') ?></label>
												<div class="input-group" id="show_hide_password">
													<input type="password" required name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="<?php echo trans('enter-password') ?>"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="#" onclick="showHide()"><?php echo trans('forgot-password') ?></a>
											</div>
											<div class="col-12">
												<div class="d-grid">
                                                      <!-- csrf token -->
                                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                    <button style="background-color: #8833FF; border:none;" type="submit" class="mt-3 btn btn-primary btn-block"><i class="bx bxs-lock-open"></i><?php echo trans('sign-in') ?> </button>
												</div>
											</div>
										</form>
									</div>
								</div>


                                                <!-- Form -->
                                <form id="lost-form" class="d-none" method="post" action="<?php echo base_url('auth/forgot_password'); ?>">
                                    <div class="row px-4">
                                        <div class="text-center">
                                            <img src="<?= base_url()?>assets/images/lock.png" class="d-block" width="120" alt="" /> 
                                        </div>
                                    </div>
                                    <p class="mt-5 font-weight-bold">Forgot Password?</p>
                                        <p class="text-muted">Enter your registered email ID and select your role to reset the password</p>
                                    <div class="row">

                                        <div class="col-12 mb-2">
                                            <div class="form-group">
                                                <select class="nice_select wide" name="role" id="exampleFormControlSelect1" required>
                                                    <option value=""><?php echo trans('select-your-role') ?></option>
                                                    <option value="users"><?php echo trans('adminuser') ?></option>
                                                    <option value="staffs"><?php echo trans('staff') ?></option>
                                                    <option value="customers"><?php echo trans('customer') ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12 mb-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="email" required placeholder="<?php echo trans('enter-your-email') ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6 text-left text-sm-left">
                                            <a href="" class="small back_login"><i class="fas fa-long-arrow-left"></i> <?php echo trans('back') ?></a>
                                        </div>
                                        <div class="col-md-12 center">
                                            <!-- csrf token -->
                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <button type="submit" style="background-color: #8833FF; border:none;" class="btn btn-primary btn-block mt-4 mb-0"><?php echo trans('submit') ?></button>
                                        </div>
                                    </div>

                                </form>
                                <!-- End Form -->
							</div>
						</div>
                        <div class="text-center">
                            <a style="text-decoration: none;" href="<?php echo base_url('page/privacy-policy') ?>"><?php echo trans('privacy') ?></a>
                            <a style="text-decoration: none;" href="<?php echo base_url('page/terms-of-service') ?>"><?php echo trans('terms') ?></a>
                        </div>
					</div>

                    <div id="forgot-arena" class="col-md-8 col-lg-7 col-xl-5 offset-lg-2 offset-xl-3 my-5 d-hide" data-aos="fade-left" data-aos-duration="400">
                
                <div class="mb-6 text-center">
                    <h2 class="font-weight-bold mb-0"><a href="<?php echo base_url() ?>"><img width="30%" src="<?php echo base_url(settings()->logo) ?>"></a></h2>
                    <p class="font-weight-normal mb-0"><?php echo trans('recover-password') ?></p>
                </div>



            </div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>