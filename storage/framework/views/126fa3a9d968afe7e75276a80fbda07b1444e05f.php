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
    <div class="footer-content">
        <h3 class="title"><?php echo e($title); ?></h3>
        <address class="address">
            <?php echo e($locale == $lang_default ? $setting->address : $setting->{$locale . '-address'} ?? $setting->address); ?>

        </address>
        <div class="footer-content-infor">
            <div class="infor">
                <h4 class="title"><?php echo app('translator')->get('Phone'); ?>:</h4>
                <a href="tel:<?php echo e($locale == $lang_default ? $setting->phone : $setting->{$locale . '-phone'} ?? $setting->phone); ?>" title="<?php echo e($locale == $lang_default ? $setting->phone : $setting->{$locale . '-phone'} ?? $setting->phone); ?>"><?php echo e($locale == $lang_default ? $setting->phone : $setting->{$locale . '-phone'} ?? $setting->phone); ?></a>
            </div>
            <div class="infor">
                <h4 class="title"><?php echo app('translator')->get('Email'); ?>:</h4>
                <a href="mailto:<?php echo e($locale == $lang_default ? $setting->email : $setting->{$locale . '-email'} ?? $setting->email); ?>" title="Email"><?php echo e($locale == $lang_default ? $setting->email : $setting->{$locale . '-email'} ?? $setting->email); ?></a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/components/footer_default/footer/layout/contact.blade.php ENDPATH**/ ?>