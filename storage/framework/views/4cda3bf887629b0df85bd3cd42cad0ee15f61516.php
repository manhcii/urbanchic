<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <style>
        .contact-info .info {
            width: 50%;
            height: 100%;
            padding: 156px 30px 0 calc((100% - 1160px) / 2);
            background: url(<?php echo e($image_background); ?>), lightgray 0px 1px/100% 103.75% no-repeat;
            background-blend-mode: luminosity;
        }
    </style>
    <section class="contact-info">
        <div class="info">
            <div class="heading-block-s">
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
            <ul class="info-list">
                <li class="info-item">
                    <div class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/elements/icons/phone.svg')); ?>" alt="Phone"
                            title="Phone" />
                    </div>
                    <a href="tel:<?php echo e($setting->phone); ?>" title="<?php echo e($setting->phone); ?>"
                        class="text"><?php echo e($setting->phone); ?></a>
                </li>
                <li class="info-item">
                    <div class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/elements/icons/mail.svg')); ?>" alt="Mail"
                            title="Mail" />
                    </div>
                    <a href="mailto:<?php echo e($setting->email); ?>" title="<?php echo e($setting->email); ?>"
                        class="text"><?php echo e($setting->email); ?></a>
                </li>
                <li class="info-item">
                    <div class="icon">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/elements/icons/phone.svg')); ?>" alt="Phone"
                            title="Phone" />
                    </div>
                    <span class="text">
                        <?php echo e($setting->address); ?>

                    </span>
                </li>
            </ul>
        </div>
        <div class="info-maps">
            <?php echo $map; ?>

        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/contact/styles/map.blade.php ENDPATH**/ ?>