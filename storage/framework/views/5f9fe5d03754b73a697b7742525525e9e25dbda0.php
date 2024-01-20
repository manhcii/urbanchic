<?php
  $component_setting = $widget->sidebar->json_params->component ?? [];
  // Filter selected
  $components_selected = $components->filter(function ($item) use ($component_setting) {
      return in_array($item->id, $component_setting);
  });
  // Reorder selected
  $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
      return array_search($item->id, $component_setting);
  });
?>



<?php if(isset($components_selected)): ?>
    <?php $__currentLoopData = $components_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(\View::exists('frontend.components.' . $widget->sidebar->json_params->layout . '.' . $component->component_code. '.index')): ?>
            <?php echo $__env->make('frontend.components.' . $widget->sidebar->json_params->layout . '.' . $component->component_code. '.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo e('View: frontend.components.' . $widget->sidebar->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/widgets/sidebar/sidebar_blog.blade.php ENDPATH**/ ?>