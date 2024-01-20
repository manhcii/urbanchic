<?php
    $component_setting = $widget->header->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) && $item->json_params->style != 'header-wrapper';
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });

    $components_wrapper = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) && $item->json_params->style == 'header-wrapper';
    });
    $components_wrapper = $components_wrapper->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });
?>
<header id="fhm-header" class="light">
    <div class="container">
        <?php if(isset($components_selected)): ?>
            <?php $__currentLoopData = $components_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(
                    \View::exists(
                        'frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index')): ?>
                    <?php echo $__env->make(
                        'frontend.components.' .
                            $widget->header->json_params->layout .
                            '.' .
                            $component->component_code .
                            '.index ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo e('View: frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(isset($components_wrapper)): ?>
            <div class="header-wrapper">
                <?php $__currentLoopData = $components_wrapper; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(\View::exists('frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code. '.index')): ?>
                        <?php echo $__env->make(
                            'frontend.components.' .
                                $widget->header->json_params->layout .
                                '.' .
                                $component->component_code .
                                '.index ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo e('View: frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
</header>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/widgets/header/header_home.blade.php ENDPATH**/ ?>