<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo e($seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''))); ?>

  </title>
  <link rel="icon" href="<?php echo e($web_information->image->favicon ?? ''); ?>" type="image/x-icon">
  
  <?php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
    $seo_image = $seo_image ?? ($page->json_params->og_image ?? ($web_information->image->seo_og_image ?? ''));
  ?>
  <meta name="description" content="<?php echo e($seo_description); ?>" />
  <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta name="news_keywords" content="<?php echo e($seo_keyword); ?>" />
  <meta property="og:image" content="<?php echo e($seo_image); ?>" />
  <meta property="og:title" content="<?php echo e($seo_title); ?>" />
  <meta property="og:description" content="<?php echo e($seo_description); ?>" />
  <meta property="og:url" content="<?php echo e(Request::fullUrl()); ?>" />
  
  
  <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body class="page">
  <div id="page" class="hfeed page-wrapper">

    <?php if(isset($widget->header)): ?>
      <?php if(\View::exists('frontend.widgets.header.' . $widget->header->json_params->layout)): ?>
        <?php echo $__env->make('frontend.widgets.header.' . $widget->header->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?>
        <?php echo e('View: frontend.widgets.header.' . $widget->header->json_params->layout . ' do not exists!'); ?>

      <?php endif; ?>
    <?php endif; ?>

    <div id="site-main" class="site-main container mt-5 mb-5">
      <div id="main-content" class="main-content mt-5" style="min-height: calc(100vh - 600px)">
        <div id="primary" class="content-area">
            <div id="title" class="page-title">
                <div class="section-container">
                    <div class="content-title-heading">
                        <h1 class="text-title-heading">
                            <?php echo app('translator')->get('Forgot Password'); ?>
                        </h1>
                    </div>
                </div>
            </div>
            <div id="content" class="site-content mt-5" role="main">
                <div class="section-padding">
                    <div class="section-container p-l-r">
                        <div class="page-forget-password">
                            <form method="post" action="<?php echo e(route('frontend.password.forgot.post')); ?>" class="reset-password">
                                <?php echo csrf_field(); ?>
                                <p><?php echo app('translator')->get('Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.'); ?></p>
                                <div class="form-group mt-5">
                                    <label class="mb-2"><?php echo app('translator')->get('Email'); ?>:</label>
                                    <input class="form-control input-text" required type="text" name="email" autocomplete="username" value="<?php echo e(old('email')); ?>" placeholder="<?php echo app('translator')->get('Email'); ?>">
                                </div>
                                <div class="clear"></div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="button-solid " value="Reset password"><?php echo app('translator')->get('Reset password'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- #content -->
        </div><!-- #primary -->
      </div><!-- #main-content -->
    </div>

    <?php if(isset($widget->footer)): ?>
      <?php if(\View::exists('frontend.widgets.footer.' . $widget->footer->json_params->layout)): ?>
        <?php echo $__env->make('frontend.widgets.footer.' . $widget->footer->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?>
        <?php echo e('View: frontend.widgets.footer.' . $widget->footer->json_params->layout . ' do not exists!'); ?>

      <?php endif; ?>
    <?php endif; ?>
  </div>
  
  <?php echo $__env->make('frontend.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->make('frontend.components.sticky.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  
  <?php echo $__env->yieldPushContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/pages/user/forgot_password.blade.php ENDPATH**/ ?>