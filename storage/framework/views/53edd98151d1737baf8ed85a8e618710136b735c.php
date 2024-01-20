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

    <a href="<?php echo e(route('home.default')); ?>" title="<?php echo e($title); ?>" class="header-logo">
        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
    </a>

<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/header_home/header/layout/image.blade.php ENDPATH**/ ?>