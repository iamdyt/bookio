<div class="wrapper">
		<div class="authentication-header" style=" position: absolute; background: #8833ff; top: 0; left: 0; right: 0;height: 50%;"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="d-flex align-items-center position-relative min-vh-100 mb-6">

<?php if (isset($page_title) && $page_title == 'Register'): ?>
<!-- Register form -->
<div class="container <?php if(settings()->site_info == 3){echo "d-hide";} ?>">
    <div class="row">
        <div class="col-md-4 offset-md-4 my-1 card card-body" data-aos="fade-left" data-aos-duration="200">

            <?php if (settings()->enable_registration == 0): ?>
                <div class="mb-6 text-center">
                    <img class="mb-4" width="30%" src="<?php echo base_url('assets/front/img/not-found.png') ?>">
                    <h3 class="text-muted">Registration system is disabled !</h3>
                    <a class="btn btn-light-primary btn-sm mt-2" href="<?php echo base_url('contact') ?>"> <?php echo trans('contact') ?>
                        </a>
                    <a class="btn btn-light-primary btn-sm mt-2" href="<?php echo base_url() ?>"><i
                            class="icon-home"></i> <?php echo trans('home') ?> </a>
                </div>
            <?php else: ?>
            <div class="mb-6 text-center">
                <h3 class="mb-0 custom-font">Register as Agent</h3>
                <p class="mb-0"><?php echo trans('basic-information-you-can-add-more-later') ?></p>
                <h3 class="mb-0 custom-font">BASIC PLAN</h3>
            </div>
            <?php if ($_GET['message']) { ?>
                <div class="alert alert-info">
                    <?= $_GET['message']?>
                </div>
            <?php } ?>
            <div class="my-2">
                <div class="success text-success"></div>
                <div class="success_extend text-success"></div>
                <div class="error text-danger"></div>
                <div class="warning text-warning"></div>
            </div>

            <form class="" method="post" action="<?= base_url('auth/save_agent') ?>">

                <div class="row">
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label class="text-dark" for="">Name</label>
                            <input type="text" required name="name" placeholder="Agent Name" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="text-dark" for="">Phone Number</label>
                            <input type="text" name="phone" placeholder="Phone number" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="text-dark" for="">Email</label>
                            <input type="email" required name="email" placeholder="E-mail" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-dark" for="">Username</label>
                            <input type="text" required name="username" placeholder="Username" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="text-dark" for="">Password</label>
                            <input type="password" required name="password" placeholder="Password" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                        <label class="text-dark" for="">Plan</label>
                            <select required name="plan" id="" class="form-control" >
                                <option value="">Select a Plan</option>
                                
                                    <option value="1"> Basic Plan </option>
                               
                            </select>
                        </div>
                    </div>

                </div>


                <div class="row mt-2">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="agree" class="custom-control-input agree_btn"
                                id="terms-condition" required>
                            <label class="custom-control-label" for="terms-condition">
                                <?php echo trans('i-have-read-and-understood-the') ?> <a
                                    href="<?php echo base_url('page/terms-of-service') ?>"><?php echo trans('terms-and-conditions') ?></a>
                                <?php echo trans('and') ?> <a href="<?php echo base_url('page/privacy-policy') ?>"> <?php echo trans('privacy-policy') ?> </a><?php echo trans('of-this-site') ?>.</label>
                        </div>
                    </div>

                    <div class="col-md-12 center">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                        <button type="submit" class="btn btn-primary btn-block mt-4 mb-0 " style="background-color: #8833ff; border:none;" ><?php echo trans('register') ?></button>
                    </div>
                </div>


                <div class="text-center text-small mt-4">
                    <span><?php echo trans('already-have-an-account') ?> <a href="<?php echo base_url('login') ?>"><?php echo trans('sign-in') ?></a></span>
                </div>

            </form>
            
            <?php endif ?>

        </div>
    </div>
</div>
<!-- End Register form -->
<?php endif ?>



<?php if (isset($page_title) && $page_title == 'Email Verification'): ?>
<!-- email verify -->
<div class="container">
    <div class="row justify-content-center justify-content-lg-start">
        <div class="col-md-8 col-lg-7 col-xl-5 offset-lg-2 offset-xl-3 my-5" data-aos="fade-down" data-aos-duration="400">
                <?php $verify_type = $_GET['type']; ?>
     
                <div class="mb-3 text-center">
                    <img class="mb-4" width="30%" src="<?php echo base_url('assets/front/img/message.png') ?>">
                    <p><?php echo trans('we-have-send-a-verification-code-in-your') ?> <?php if($verify_type == 'sms'){echo trans('phone');}else{echo trans('email');} ?>.</p>
                </div>

                <form id="verify_from" method="post" action="<?php echo base_url('auth/verify_account'); ?>">

                    <div class="row justify-content-center">
                        <div class="col-6 mb-2">
                            <div class="form-group">
                                <input type="text" class="form-control text-center" name="code" placeholder="<?php echo trans('enter-code-here') ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-6">
                            <input type="hidden" name="type" value="<?php echo html_escape($verify_type) ?>">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <button type="submit" class="btn btn-success btn-block mb-0 verify_btn"><i class="fas fa-check-circle"></i> <?php echo trans('verify-code') ?></button>
                        </div>
                    </div>


                    <div class="loader mb-2 mt-4 text-primary text-center hide"><?php echo trans('sending') ?> <i class="fa fa-spinner fa-spin"></i></div>

                    <div class="text-center text-small mt-2">
                        <?php if ($verify_type == 'sms'): ?>
                            <span>Don't received any code? <a class="resend_mail" href="<?php echo base_url('auth/resend_sms') ?>"><?php echo trans('resend') ?></a></span>
                        <?php else: ?>
                            <span>Don't received any code? <a class="resend_mail" href="<?php echo base_url('auth/resend') ?>"><?php echo trans('resend') ?></a></span>
                        <?php endif ?>

                        <p><a class="btn btn-light-secondary btn-sm mt-2" href="<?php echo base_url() ?>"><i
                            class="fas fa-long-arrow-alt-left"></i> <?php echo trans('back') ?> </a></p>
                    </div>

                </form>

        </div>
    </div>
</div>
<!-- End email verify -->
<?php endif ?>
</div>
				<!--end row-->
		</div>
</div>
</div>