<div class="page-wrapper">

    <!-- Content Header (Page header) -->
    <?php $this->load->view('admin/include/breadcrumb'); ?>

    <!-- Main content -->
    <div class="page-content">

      <div class="row">
            <div class="text-center col-md-8 offset-md-4 mb-4">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-primary custom-btngp <?php if($user->billing_type == 'monthly'){echo "focus active";} ?>">
                  <input type="radio" name="price_type" value="monthly" class="switch_price"> <?php echo trans('monthly') ?>
                </label>
                <label class="btn btn-primary custom-btngp <?php if($user->billing_type == 'yearly'){echo "focus active";} ?>">
                  <input type="radio" name="price_type" value="yearly" class="switch_price"> <?php echo trans('yearly') ?>
                </label>
              </div>
            </div>

            <div class="col-md-4 pr-2 text-white">
                <div class="card bg-primary px-2">
                    
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                                <h6 class="pl-3 pt-3 text-white fs-14"><?php echo trans('subscription') ?> </h6>
                            </div>
                            <div>
                                <a href="<?php echo base_url('admin/payment/lists') ?>" class="badge bbgprimary-soft mr-3 mt-3 "><i class="fas fa-file-alt"></i> <?php echo trans('view-invoice') ?></a>
                            </div>
                        </div>
                        
                        
                        <ul class="nav nav-pills flex-column">
                            

                            <?php if (user()->user_type == 'trial'): ?>
                                <li class="nav-item active">
                                    <a href="#" class="nav-link text-white">
                                        <?php echo trans('plan') ?> <span class="badge bg-secondary float-end"><?php echo settings()->trial_days; ?> <?php echo trans('days-free-trial') ?></span>
                                    </a>
                                </li>

                                <li class="nav-item active">
                                    <a href="#" class="nav-link text-white">
                                        <?php echo trans('trial-expire') ?> <span class="badge bg-danger-soft float-end"><strong><?php echo my_date_show(user()->trial_expire); ?></strong> 
                                        <strong class="text-danger">(<?php echo date_dif(date('Y-m-d'), user()->trial_expire) ?> <?php echo trans('days-left') ?>)</strong></span>
                                    </a>
                                </li>
                             
                            <?php else: ?>

                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php echo trans('plan') ?> <span
                                        class="badge bg-secondary float-end"><?php echo html_escape($user->package_name) ?></span>
                                </a>
                            </li>

                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php echo trans('price') ?> <span
                                        class="badge bg-secondary float-end"><?php echo html_escape(settings()->currency_symbol) ?><?php echo html_escape($user->amount) ?></span>
                                </a>
                            </li>

                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php echo trans('billing-cycle') ?> <span
                                        class="badge bg-secondary float-end"><?php echo ucfirst(html_escape($user->billing_type)) ?></span>
                                </a>
                            </li>

                            <?php if ($user->status != 'expire'): ?>
                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php echo trans('last-billing') ?> <span
                                        class="badge bg-secondary float-end"><?php echo my_date_show($user->created_at) ?></span>
                                </a>
                            </li>

                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php echo trans('expire') ?> <span
                                        class="badge bg-secondary float-end"><?php echo my_date_show($user->expire_on).' ('.date_dif(date('Y-m-d'), $user->expire_on).' days left)' ?>
                                        </span>
                                </a>
                            </li>
                            <?php endif ?>

                            <li class="nav-item active">
                                <a href="#" class="nav-link text-white">
                                    <?php if (check_my_payment_status() == TRUE): ?>
                                    <?php echo trans('payment-status') ?> <span class="badge bg-success float-end"><i
                                            class="fas fa-check-circle"></i> <?php echo trans('verified') ?></span>
                                    <?php else: ?>
                                    <?php echo trans('payment-status') ?> <span class="badge bg-danger float-end"><i
                                            class="fas fa-clock-o"></i> <?php echo trans($user->status);?></span>
                                    <?php endif ?>
                                </a>
                            </li>
                            <?php endif ?>

                        </ul>
                    </div>
                    
                </div>
            </div>

            <div class="col-md-8 m-auto">
                <div class="row">

                    <?php $i=1; foreach ($packages as $package): ?>
                    <div class="col-md-<?php echo(12/count($packages)) ?> col-xs-12">
                        <div class="pricing-table purple text-center shadow-sm" style="border-top: 1px solid gray;">

                          
                            <h4 class="mb-0 mt-2 mb-2">
                                <?php if ($user->package_id == $package->id): ?>
                                    <i class="lnib lni-checkmark-circle text-success"></i>
                                <?php endif; ?>
                                <?php echo html_escape($package->name); ?>
                            </h4>


                            <!-- Price -->
                            <div class="price-tag mt-0">
                                <div class="yearly_price <?php if($user->billing_type == 'yearly'){echo 'd-show';}else{echo "d-hide";} ?>">
                                    <span class="symbol"><?php echo settings()->currency_symbol ?></span>
                                    <span class="amount-sm"><?php echo $package->price; ?></span>
                                    <span class="after">/<?php echo trans('year') ?></span>
                                </div>

                                
                                <div class="monthly_price <?php if($user->billing_type == 'monthly'){echo 'd-show';}else{echo "d-hide";} ?>">
                                  <span class="symbol"><?php echo settings()->currency_symbol ?></span>
                                  <span class="amount-sm"><?php echo $package->monthly_price; ?></span>
                                  <span class="after">/<?php echo trans('month') ?></span>
                                </div>
                            </div>

                            <?php $package_slug = $package->slug; ?>

                            <!-- Features -->
                            <div class="pricing-features ">
                                <?php if (empty($package->features)): ?>
                                    <?php echo trans('features-not-selected-') ?>
                                <?php else: ?>
                                <?php foreach ($features as $all_feature): ?>

                                <?php foreach ($package->features as $feature): ?>
                                    <?php if ($feature->feature_id == $all_feature->id): ?>
                                        <?php $icon = 'lnib lni-checkmark text-success'; break; ?>
                                    <?php else: ?>
                                        <?php $icon = 'lnib lni-close text-danger'; ?>
                                    <?php endif ?>
                                <?php endforeach ?>

                                <?php $limit = get_feature_limit($all_feature->id)->$package_slug; ?>

                                <div class="features flex-between">
                                    <div class="feature-item-left">
                                        <b><?php if(isset($limit) && $limit > 0){echo html_escape($limit);}else{ echo '&#8734;';}; ?></b>
                                        <span><?php echo trans($all_feature->slug) ?></span>
                                    </div>
                                    <span class="limits"><i class="<?php echo html_escape($icon); ?>"></i></span>
                                </div>
                                <?php endforeach ?>
                                <?php endif ?>
                            </div>
                            <!-- Button -->

                            <input type="hidden" name="billing_type" value="<?php echo html_escape($user->billing_type) ?>" class="billing_type">

                            <?php if ($user->package_id == $package->id): ?>
                            <a class="btn btn-primary btn-block mt-4 package_btn"
                                href="<?php echo base_url('admin/subscription/upgrade/'.$package->slug.'/1') ?>"> <?php echo trans('your-selected-plan') ?></a>
                            <?php else: ?>
                            <a class="btn btn-secondary btn-block mt-4 package_btn"
                                href="<?php echo base_url('admin/subscription/upgrade/'.$package->slug.'/0') ?>"><?php echo trans('upgrade') ?></a>
                            <?php endif ?>

                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>