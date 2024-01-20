<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });

        $component_active = $all_components->first(function ($item, $key) use ($locale) {
            return ($item->json_params->brief->{$locale} ?? $item->brief) == $locale;
        });
    ?>
    <div class="languages-wrapper">
        <div class="languages-image">
            <img src="<?php echo e($component_active->image); ?>"
                alt="<?php echo e($component_active->json_params->title->{$locale} ?? $component_active->title); ?>" />
        </div>
        <select id="languages">
            <?php if(isset($component_childs)): ?>
                <?php $__currentLoopData = $component_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->json_params->brief->{$locale} ?? $item->brief); ?>" <?php echo e(($item->json_params->brief->{$locale} ?? $item->brief) == $locale ? 'selected':''); ?>>
                        <?php echo e($item->json_params->title->{$locale} ?? $item->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

        </select>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/components/footer_default/footer/layout/language.blade.php ENDPATH**/ ?>