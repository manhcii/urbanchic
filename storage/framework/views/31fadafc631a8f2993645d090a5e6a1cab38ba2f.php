<?php
    $component_setting = $widget->footer->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting);
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });

    $components_first = $components_selected->first(function ($item) {
        return $item->json_params->layout=='custom';
    });

?>

<footer id="fhm-footer">
    
    <div class="footer-content">
        <div class="footer-content-wrapper">
            <div class="heading-block-m">
                <span class="badge"> <?php echo e($components_first->brief); ?> </span>
                <h2 class="title"><?php echo e($components_first->title); ?></h2>
            </div>
            <a href="<?php echo e(route('home.default')); ?>" title="<?php echo e($setting->{$locale . '-site_title'} ?? ($setting->site_title ?? '')); ?>" class="footer-logo">
                <img src="<?php echo e($setting->logo_footer); ?>" alt="<?php echo e($setting->{$locale . '-site_title'} ?? ($setting->site_title ?? '')); ?>" />
            </a>
            <ul class="footer-infor-list">
                <li class="footer-infor-item">
                    <p class="text">
                        <strong><?php echo app('translator')->get('Address'); ?> :</strong> <?php echo e($setting->{$locale . '-address'} ?? ($setting->address ?? '')); ?>

                    </p>
                </li>
                <li class="footer-infor-item">
                    <a href="tel:<?php echo e($setting->{$locale . '-phone'} ?? ($setting->phone ?? '')); ?>" title="<?php echo e($setting->{$locale . '-phone'} ?? ($setting->phone ?? '')); ?>" class="text">
                        <strong><?php echo app('translator')->get('Phone'); ?> :</strong> <?php echo e($setting->{$locale . '-phone'} ?? ($setting->phone ?? '')); ?></a>
                </li>
                <li class="footer-infor-item">
                    <a href="mailto:<?php echo e($setting->{$locale . '-email'} ?? ($setting->email ?? '')); ?>" class="text"><strong><?php echo app('translator')->get('Email'); ?> :</strong>
                        <?php echo e($setting->{$locale . '-email'} ?? ($setting->email ?? '')); ?></a>
                </li>
            </ul>
            <a href="<?php echo e($setting->{$locale . '-link_footer'} ?? ($setting->link_footer ?? '')); ?>" title="<?php echo e($setting->{$locale . '-buttom_footer'} ?? ($setting->buttom_footer ?? '')); ?>" class="main-button-s"><?php echo e($setting->{$locale . '-buttom_footer'} ?? ($setting->buttom_footer ?? '')); ?></a>
        </div>
        <div class="footer-content-wrapper">
            <?php if(isset($components_selected)): ?>
                <?php $__currentLoopData = $components_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($component->json_params->layout == 'default'): ?>
                        <?php if(
                            \View::exists(
                                'frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index')): ?>
                            <?php echo $__env->make(
                                'frontend.components.' .
                                    $widget->footer->json_params->layout .
                                    '.' .
                                    $component->component_code .
                                    '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo e('View: frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <div class="footer-social">
                <h3 class="title"><?php echo app('translator')->get('Follow Us on'); ?></h3>
                <ul class="footer-social-list">
                    <?php if(isset($setting->facebook_url)): ?>
                        <li class="footer-social-item">
                            <a href="<?php echo e($setting->facebook_url); ?>" title="facebook" class="icon">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M38 19.1152C38 8.62182 29.4934 0.115234 19 0.115234C8.50658 0.115234 0 8.62182 0 19.1152C0 28.5987 6.94806 36.459 16.0312 37.8844V24.6074H11.207V19.1152H16.0312V14.9293C16.0312 10.1674 18.8678 7.53711 23.2078 7.53711C25.2866 7.53711 27.4609 7.9082 27.4609 7.9082V12.584H25.0651C22.7049 12.584 21.9688 14.0485 21.9688 15.5511V19.1152H27.2383L26.3959 24.6074H21.9688V37.8844C31.052 36.459 38 28.5987 38 19.1152Z"
                                        fill="#BFBFBF" />
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($setting->twitter_url)): ?>
                        <li class="footer-social-item">
                            <a href="<?php echo e($setting->twitter_url); ?>" title="twitter" class="icon">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0008 0C8.50694 0 0 8.50849 0 19.0008C0 29.4946 8.50694 38 19.0008 38C29.4946 38 38 29.4946 38 19.0008C38 8.50849 29.4938 0 19.0008 0ZM28.5718 15.1698C28.5818 15.375 28.5856 15.581 28.5856 15.7894C28.5856 22.1173 23.7693 29.4128 14.9622 29.4128C12.2585 29.4128 9.74074 28.6204 7.62191 27.2623C7.99691 27.3063 8.37731 27.3287 8.76389 27.3287C11.0077 27.3287 13.0725 26.5633 14.7106 25.2793C12.6157 25.24 10.848 23.8549 10.2384 21.9529C10.5301 22.01 10.8302 22.0386 11.1389 22.0386C11.5756 22.0386 11.9985 21.9815 12.4005 21.8711C10.2091 21.4313 8.55864 19.4946 8.55864 17.1767C8.55864 17.1559 8.55864 17.1358 8.55941 17.115C9.20447 17.4738 9.9429 17.689 10.7284 17.7145C9.4429 16.8542 8.59799 15.3904 8.59799 13.7284C8.59799 12.8511 8.8341 12.0278 9.24614 11.321C11.608 14.2176 15.1366 16.1242 19.1165 16.3233C19.0347 15.9738 18.9923 15.6073 18.9923 15.2323C18.9923 12.5887 21.1358 10.4444 23.7809 10.4444C25.1582 10.4444 26.402 11.0262 27.2755 11.956C28.3665 11.7423 29.3912 11.3426 30.3164 10.794C29.9576 11.9128 29.1991 12.8511 28.2099 13.4429C29.1798 13.3272 30.1026 13.0694 30.9606 12.689C30.3202 13.6512 29.5077 14.4946 28.5718 15.1698Z"
                                        fill="#BFBFBF" />
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($setting->instagram_url)): ?>
                        <li class="footer-social-item">
                            <a href="<?php echo e($setting->instagram_url); ?>" title="instagram" class="icon">
                                <svg width="38" height="38" viewBox="0 0 38 38" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 23C21.2091 23 23 21.2091 23 19C23 16.7909 21.2091 15 19 15C16.7909 15 15 16.7909 15 19C15 21.2091 16.7909 23 19 23Z"
                                        fill="#BFBFBF" />
                                    <path
                                        d="M23.5207 10H14.3963C13.0691 10 11.9078 10.4147 11.1613 11.1613C10.4147 11.9078 10 13.0691 10 14.3963V23.5207C10 24.8479 10.4147 26.0092 11.2442 26.8387C12.0737 27.5853 13.1521 28 14.4793 28H23.5207C24.8479 28 26.0092 27.5853 26.7558 26.8387C27.5853 26.0922 28 24.9309 28 23.6037V14.4793C28 13.1521 27.5853 12.0737 26.8387 11.2442C26.0092 10.4147 24.9309 10 23.5207 10ZM18.9585 24.5991C15.8065 24.5991 13.318 22.0276 13.318 18.9585C13.318 15.8065 15.8894 13.318 18.9585 13.318C22.0277 13.318 24.682 15.8065 24.682 18.9585C24.682 22.1106 22.1106 24.5991 18.9585 24.5991ZM24.8479 14.3963C24.1014 14.3963 23.5207 13.8157 23.5207 13.0691C23.5207 12.3226 24.1014 11.7419 24.8479 11.7419C25.5945 11.7419 26.1751 12.3226 26.1751 13.0691C26.1751 13.8157 25.5945 14.3963 24.8479 14.3963Z"
                                        fill="#BFBFBF" />
                                    <path
                                        d="M18.9997 0C8.49582 0 0 8.49582 0 18.9997C0 29.5037 8.49582 37.9995 18.9997 37.9995C29.5037 37.9995 37.9995 29.5037 37.9995 18.9997C38.0767 8.49582 29.5037 0 18.9997 0ZM29.1175 23.4794C29.1175 25.2557 28.4996 26.8004 27.4183 27.8817C26.337 28.963 24.7923 29.5037 23.0932 29.5037H14.6746C12.9754 29.5037 11.4307 28.963 10.3495 27.8817C9.19093 26.8004 8.65029 25.2557 8.65029 23.4794V14.9835C8.65029 11.4307 11.0446 8.95923 14.6746 8.95923H23.1704C24.9468 8.95923 26.4143 9.57711 27.4956 10.6584C28.5768 11.7397 29.1175 13.2071 29.1175 14.9835V23.4794Z"
                                        fill="#BFBFBF" />
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <p class="footer-copyrights">
            <?php echo e($setting->{$locale . '-copyright'} ?? ($setting->copyright ?? '')); ?>

        </p>
    </div>
    <?php if(isset($components_selected)): ?>
        <?php $__currentLoopData = $components_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                if (in_array($component->json_params->layout, ['default', 'custom'])) {
                    continue;
                }
            ?>
            <?php if(
                \View::exists(
                    'frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index')): ?>
                <?php echo $__env->make(
                    'frontend.components.' .
                        $widget->footer->json_params->layout .
                        '.' .
                        $component->component_code .
                        '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                <?php echo e('View: frontend.components.' . $widget->footer->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</footer>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/widgets/footer/footer_default.blade.php ENDPATH**/ ?>