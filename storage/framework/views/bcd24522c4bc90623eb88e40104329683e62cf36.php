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

    $components_heading = $components_selected->filter(function ($item) {
        return $item->json_params->style == 'heading';
    });

    $components_main = $components_selected->filter(function ($item) {
        return $item->json_params->style == 'main';
    });

    $components_end = $components_selected->filter(function ($item) {
        return $item->json_params->style == 'end';
    });

?>

<footer id="fhm-footer">
    <div class="container">
        <div class="footer-heading">
            <?php if(isset($components_heading)): ?>
                <?php $__currentLoopData = $components_heading; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
        <div class="footer-main">
            <?php if(isset($components_main)): ?>
                <?php $__currentLoopData = $components_main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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



        </div>
        <div class="footer-end">
            <?php if(isset($components_end)): ?>
                <?php $__currentLoopData = $components_end; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/widgets/footer/footer_default.blade.php ENDPATH**/ ?>