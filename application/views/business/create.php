<div class="page-wrapper">
    
    <!-- Content Header (Page header) -->
    <?php include"include/breadcrumb.php"; ?>

    <!-- Main content -->
    <div class="page-content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12">

            <div class="card">
                <div class="card-header bg-primary text-white">
                  <span class="card-title">New User and Business Form</span>
                </div>

                <div class="card-body table-responsive p-0">
                  <div class="mb-4 mt-4">
                  <div class="success text-success"></div>
                  <div class="success_extend text-success"></div>
                  <div class="error text-danger"></div>
                  <div class="warning text-warning"></div>
                </div>
                <form id="register_form" class="authorization__form authorization__form--shadow leave_con mx-4" method="post"
                action="<?php echo base_url('admin/users/savebiz'); ?>">

                <div class="row mt-2">

                    <div class="col-12">
                        <div class="form-group mb-1">
                            <label class="mb-1"><?php echo trans('company-slug-restrict') ?> <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control form-control-sm slug_input" id="user-name" name="company_slug" placeholder="<?php echo base_url() ?><?php echo trans('company') ?>">
                        </div>
                        
                        <div class="loader"></div>

                        <p class="text-danger fs-14 mt-0 mb-0" id="name_exist" style="display: none;"><i class="icon-close"></i> <?php echo trans('name-is-already-taken') ?>.</p>
                        <p class="text-success fs-14 mt-0 mb-0" id="name_available" style="display: none;"><i class="icon-check"></i> <?php echo trans('name-is-available') ?>.</p>
                    </div>

                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label class="mb-1"><?php echo trans('company-name') ?> <span class="text-danger">*</span></label>
                            <input type="text" required class="form-control form-control-sm name_input" name="company_name" placeholder="<?php echo trans('name-of-your-company') ?>">
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label class="mb-1"><?php echo trans('categories') ?> <span class="text-danger">*</span></label>
                            <select name="category" class="nice_select form-control wide small" required>
                                <option value=""> <?php echo trans('select') ?></option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo html_escape($category->id)?>"> <?php echo html_escape($category->name)?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label class="mb-1"><?php echo trans('country') ?> <span class="text-danger">*</span></label>
                            <select name="country" class="select2 form-control form-control-sm" required>
                                <option value=""> <?php echo trans('select') ?></option>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo html_escape($country->id)?>"> <?php echo html_escape($country->name)?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 hide">
                        <div class="form-group">
                            <label class="mb-1">Company Details</label>
                            <textarea class="form-control form-control-sm" name="details" id="details_input" placeholder="Company about us"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-1"><?php echo trans('email') ?> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" name="email" placeholder="" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-4 col-xs-6 pr-0 <?php if(text_dir() == 'rtl'){echo "pl-3";} ?>">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1"><?php echo trans('phone') ?> <span class="text-danger">*</span></label>
                                    <select name="dial_code" class="form-control custom-select-sm" id="exampleFormControlSelect1" required>
                                        <option value=""><?php echo trans('select-code') ?></option>
                                        <?php foreach ($dialing_codes as $code): ?>
                                            <option value="<?php echo html_escape($code->isd_code) ?>"><?php echo html_escape($code->name.' +'.$code->isd_code.'') ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-8 col-xs-6 pl-0 <?php if(text_dir() == 'rtl'){echo "pr-3";} ?>">
                                 <label for="exampleFormControlSelect1" class="text-white">.</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" name="phone" placeholder="<?php echo trans('phone-number') ?>">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <div class="form-group">
                            <label class="mb-1"><?php echo trans('password') ?> <span class="text-danger">*</span></label>
                            <input type="password" class="form-control form-control-sm" name="password" required>
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
                        <input type="hidden" name="plan"
                            value="<?php if(isset($_GET['plan'])){echo html_escape($_GET['plan']);}else{echo "basic";} ?>">
                        <input type="hidden" name="billing"
                            value="<?php if(isset($_GET['billing'])){echo html_escape($_GET['billing']);}else{echo "monthly";} ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>"
                            value="<?php echo $this->security->get_csrf_hash();?>">
                        <button type="submit"
                            class="btn btn-primary btn-block mt-4 mb-0 register_button" style="background-color: #8833ff; border:none;" ><?php echo trans('register') ?></button>
                    </div>
                </div>
            </form>

                </div>
            </div>

          </div>
        </div>
          <!-- col-md-12 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>







