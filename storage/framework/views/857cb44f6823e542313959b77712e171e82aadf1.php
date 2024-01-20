<!DOCTYPE html>
<html lang="<?php echo e($locale ?? 'vi'); ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo e($page->json_params->name->$locale ?? ($page->name ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? ''))))); ?>

    </title>
    <link rel="icon" href="<?php echo e(json_decode($setting->image)->favicon ?? ''); ?>" type="image/x-icon">
    
    <?php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
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

    <?php echo $__env->yieldPushContent('schema'); ?>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">

        <?php if(isset($widget->header)): ?>
            <?php if(\View::exists('frontend.widgets.header.' . $widget->header->json_params->layout)): ?>
                <?php echo $__env->make('frontend.widgets.header.' . $widget->header->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo e('View: frontend.widgets.header.' . $widget->header->json_params->layout . ' do not exists!'); ?>

            <?php endif; ?>
        <?php endif; ?>

        <main id="fhm-services-content">
            <?php if(isset($blocks_selected)): ?>
                <?php $__currentLoopData = $blocks_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\View::exists('frontend.blocks.' . $block->block_code . '.index')): ?>
                        <?php echo $__env->make('frontend.blocks.' . $block->block_code . '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo e('View: frontend.blocks.' . $block->block_code . '.index do not exists!'); ?>

                    <?php endif; ?>
                    <?php if($loop->index == 0): ?>
                        <section id="fhm-services">
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </section>
            <?php endif; ?>

        </main>

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
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/layouts/service.blade.php ENDPATH**/ ?>