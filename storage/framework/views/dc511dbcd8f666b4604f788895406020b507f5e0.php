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
        <ul class="social-list">
            <?php if(isset($setting->facebook_url) || isset($setting->{$locale . '-facebook_url'})): ?>
                <li class="social-item">
                    <a href="<?php echo e($locale == $lang_default ? $setting->facebook_url : $setting->{$locale . '-facebook_url'}); ?>"
                        title="facebook" class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/fb.svg')); ?>" alt="facebook" />
                    </a>
                </li>
            <?php endif; ?>
            <?php if(isset($setting->twitter_url) || isset($setting->{$locale . '-twitter_url'})): ?>
                <li class="social-item">
                    <a href="<?php echo e($locale == $lang_default ? $setting->twitter_url : $setting->{$locale . '-twitter_url'}); ?>"
                        title="twitter" class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/tw.svg')); ?>" alt="twitter" />
                    </a>
                </li>
            <?php endif; ?>
            <?php if(isset($setting->instagram_url) || isset($setting->{$locale . '-instagram_url'})): ?>
                <li class="social-item">
                    <a href="<?php echo e($locale == $lang_default ? $setting->instagram_url : $setting->{$locale . '-instagram_url'}); ?>"
                        title="instagram" class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/ig.svg')); ?>" alt="instagram" />
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/components/footer_default/footer/layout/social.blade.php ENDPATH**/ ?>