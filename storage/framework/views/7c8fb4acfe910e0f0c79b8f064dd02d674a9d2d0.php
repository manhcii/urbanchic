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



    <div class="container mt-5 mb-5" style="min-height: calc(100vh - 600px)">
        <h2 class="mt-5"><?php echo app('translator')->get('Reset Password'); ?></h2>
        <form method="post" action="<?php echo e(route('frontend.password.reset.post')); ?>" >
            <?php echo csrf_field(); ?>
            <input type="hidden" name="token" value="<?php echo e($token); ?>">
          <div class="form-group mb-3 mt-3">
            <label class="mb-2" for="email"><?php echo app('translator')->get('Email'); ?>:</label>
            <input class="form-control input-text" value="<?php echo e(old('email')); ?>" type="email" name="email" autocomplete="username" required>
          </div>
          <div class="form-group mb-3">
            <label class="mb-2" for="pwd"><?php echo app('translator')->get('New Password'); ?>:</label>
            <input class="form-control input-text" type="password" name="password" required value="<?php echo e(old('password')); ?>">
          </div>
          <div class="form-group mb-3">
            <label class="mb-2" for="pwd"><?php echo app('translator')->get('Confirm password'); ?>:</label>
            <input class="form-control input-text" type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
          </div>

          <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Change password'); ?></button>
        </form>
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
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/pages/forgot.blade.php ENDPATH**/ ?>