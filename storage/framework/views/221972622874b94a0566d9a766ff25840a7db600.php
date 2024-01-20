<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    ?>
    <a href="<?php echo e(route('home.default')); ?>" class="header-logo-mb" title="<?php echo e($title); ?>">
      <img src="<?php echo e($setting->logo_header??""); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
    </a>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/components/header_default/header/layout/image.blade.php ENDPATH**/ ?>