
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Payment Invoice</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/admin_default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/custom-invoice.css">
</head>

<body>

  <div class="main-box">
    
   
    <div class="invoice-box print_area <?php if(isset($page_title) && $page_title != 'Export'){echo "br1 shadow-lg";} ?>">

        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?php echo base_url(settings()->logo) ?>" class="w-40">
                            </td>
                            
                            <td>
                                <?php echo trans('invoice') ?> - <?php echo html_escape(sprintf('%02d', $user->id)) ?><br>
                                <?php echo trans('order-no') ?>: <?php echo html_escape($user->puid) ?> <br> 
                                <?php echo trans('date') ?>: <?php echo my_date_show($user->created_at) ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <?php if ($user->billing_type == 'monthly'): ?>
                <?php 
                    $price = number_format($user->monthly_price, 2); 
                    $frequency = 'Per month';
                    $billing_type = 'monthly';
                ?>
            <?php else: ?>
                <?php 
                    $price = number_format($user->price, 2); 
                    $frequency = 'Per year';
                    $billing_type = 'yearly';
                ?>
            <?php endif ?>
            
            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                <?php echo html_escape(settings()->site_name) ?><br>
                                <?php echo html_escape(settings()->admin_email) ?>
                            </td>
                            
                            <td>
                                <strong><?php echo html_escape($user->user_name) ?></strong><br>
                                  <p class="mb-0"><?php echo html_escape($user->email) ?></p>
                                <?php if (!empty($user->phone)): ?>
                                  <p class="mb-0"><?php echo html_escape($user->phone) ?></p>
                                <?php endif ?>
                                <?php if (!empty($user->address)): ?>
                                  <p class="mb-0"><?php echo strip_tags($user->address) ?></p>
                                <?php endif ?>
                                
                                <?php if ($user->status == 'pending'): ?>
                                  <span class="float-right badge badge-danger-soft"> <?php echo trans('payment') ?> - <?php echo trans('pending') ?></span>
                                <?php elseif ($user->status == 'verified'): ?>
                                  <span class="float-right badge badge-success-soft"> <?php echo trans('payment') ?> - <?php echo trans('verified') ?></span>
                                <?php endif ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        

            <tr class="heading">
                <td>
                    <?php echo trans('item') ?>
                </td>
                
                <td>
                    <?php echo trans('price') ?>
                </td>

                <td class="text-right">
                    <?php echo trans('total') ?>
                </td>
            </tr>
            
            <tr class="item">
              <td>
                <?php echo html_escape($user->package_name) ?> <?php echo trans('plan') ?> / <small> <?php echo trans('billing-cycle') ?> - <?php echo html_escape($user->billing_type) ?></small><br>
                
              </td>
              <td><?php echo settings()->currency_symbol; ?><?php echo html_escape($price) ?></td>
              <td class="text-right"><?php echo settings()->currency_symbol; ?><?php echo html_escape($price) ?></td>
            </tr>
            
            <?php $final_price = get_tax($price, $user->tax); ?>
            <?php if ($user->tax > 0): ?>
            <tr class="item">
                <td></td>
                <td class="text-right"><strong><?php echo settings()->tax_name; ?> (<?php echo $user->tax; ?>%)</strong></td>
                <td class="text-right"><span><strong><?php echo settings()->currency_symbol; ?><?php echo get_tax_rate($price, $user->tax) ?></strong></span></td>
            </tr>
            <?php endif ?>

            <tr class="item">
                <td></td>
                <td class="text-right"><strong><?php echo trans('sub-total') ?></strong></td>
                <td class="text-right"><span><strong><?php echo settings()->currency_symbol; ?><?php echo html_escape($final_price) ?></strong></span></td>
            </tr>

            <tr class="total">
                <td></td>
                <td class="text-right"><strong><?php echo trans('total') ?></strong></td>
                <td class="text-right"><span><strong><?php echo settings()->currency_symbol; ?><?php echo html_escape($final_price) ?></strong></span></td>
            </tr>

            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr>
              <td></td>
            </tr>

        </table>

        <div class="pwf">
          <?php echo trans('powered-by') ?> - <?php echo html_escape(settings()->site_name) ?>
        </div>
    </div>
  </div>



</body>
</html>
