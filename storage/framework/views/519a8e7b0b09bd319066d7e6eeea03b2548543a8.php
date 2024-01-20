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

    <section id="fhm-about-values">
        <?php if(count($gallery_image) > 0): ?>
            <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="decor-element">
                    <img src="<?php echo e($val_img); ?>" alt="Pizza" title="Pizza" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="container">
            <div class="heading-block-m">
                <span class="badge"> <?php echo e($title); ?> </span>
                <h2 class="title"><?php echo e($brief); ?></h2>
            </div>
            <div class="values-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_childs = $item->image != '' ? $item->image : null;
                                    $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                    $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $icon_childs = $item->icon ?? '';
                                    $gallery_image_childs = $item->json_params->gallery_image ?? '';
                                ?>
                                <div class="swiper-slide">
                                    <div class="values-item">
                                        <div class="values-icon">
                                            <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>"
                                                title="<?php echo e($title_childs); ?>" />
                                        </div>
                                        <div class="values-content">
                                            <span class="number">
                                                <?php echo e($loop->index < 9 ? '0' . ($loop->index + 1) : $loop->index); ?> </span>
                                            <h3 class="title"><?php echo e($title_childs); ?></h3>
                                            <p class="desc">
                                                <?php echo e($brief_childs); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="slider-button-next slider-button-next-m">
                    <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.69231 1.23077L10 9.53847L1.69231 16.1846" stroke="#CF3031" stroke-width="2" />
                    </svg>
                </div>
                <div class="slider-button-prev slider-button-prev-m">
                    <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3077 1.23077L2 9.53847L10.3077 16.1846" stroke="#CF3031" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/about_block/styles/values.blade.php ENDPATH**/ ?>