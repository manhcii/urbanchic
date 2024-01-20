<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $icon = $block->icon ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="fhm-discount">
        <div class="discount-wrapper">
            <div class="discount-image">
                <img src="<?php echo e($image); ?>" alt="Discount" />
            </div>
            <div class="discount-content">
                <div class="heading-block">
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p class="desc"><?php echo e($brief); ?></p>
                </div>
                <form class="discount-form form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="is_type" value="contact">
                    <input type="email" name="email" placeholder="Email*" required/>
                    <button class="button-solid" type="submit"><?php echo app('translator')->get('Submit'); ?></button>
                </form>
                <ul class="discount-social">
                    <?php if(isset($setting->facebook_url) || isset($setting->{$locale . '-facebook_url'})): ?>
                        <li class="discount-social-item">
                            <a href="<?php echo e($locale == $lang_default ? $setting->facebook_url : $setting->{$locale . '-facebook_url'}); ?>"
                                title="facebook" class="icon">
                                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/fb-3.svg')); ?>" alt="facebook" />
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($setting->twitter_url) || isset($setting->{$locale . '-twitter_url'})): ?>
                        <li class="discount-social-item">
                            <a href="<?php echo e($locale == $lang_default ? $setting->twitter_url : $setting->{$locale . '-twitter_url'}); ?>"
                                title="twitter" class="icon">
                                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/tw-1.svg')); ?>" alt="twitter" />
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(isset($setting->instagram_url) || isset($setting->{$locale . '-instagram_url'})): ?>
                        <li class="discount-social-item">
                            <a href="<?php echo e($locale == $lang_default ? $setting->instagram_url : $setting->{$locale . '-instagram_url'}); ?>"
                                title="instagram" class="icon">
                                <img src="<?php echo e(asset('themes/frontend/assets/images/icon/ig-1.svg')); ?>" alt="instagram" />
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/popup/styles/discount.blade.php ENDPATH**/ ?>