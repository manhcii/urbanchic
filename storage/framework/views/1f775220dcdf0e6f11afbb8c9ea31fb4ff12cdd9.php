<?php if($component): ?>
  <?php
    $layout = isset($component->json_params->layout) && $component->json_params->layout != '' ? $component->json_params->layout : 'default';
  ?>

<?php if(\View::exists('frontend.components.' . $widget->footer->json_params->layout .'.'.  $component->component_code . '.layout.' . $layout)): ?>

    <?php echo $__env->make('frontend.components.' . $widget->footer->json_params->layout .'.'.  $component->component_code . '.layout.' . $layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php else: ?>
    <?php echo e('Style: frontend.components.' . $widget->footer->json_params->layout .'.'.  $component->component_code . '.layout.' . $layout . ' do not exists!'); ?>

  <?php endif; ?>

<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/footer_default/menu/index.blade.php ENDPATH**/ ?>