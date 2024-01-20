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
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>



    <section id="fhm-homepage-instagram">
        <div class="container">
            <div class="instagram-heading">
                <h2 class="instagram-heading-title"><?php echo e($title); ?></h2>
                <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                    class="instagram-heading-button"><?php echo e($url_link_title); ?>

                    <span class="icon">
                        <?php echo $icon; ?>

                    </span></a>
            </div>
            <div class="instagram-slider">
                <?php if($block_childs): ?>
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                            $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                            $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                            $image = $item->image != '' ? $item->image : null;
                            $image_background = $item->image_background != '' ? $item->image_background : null;
                            $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                            $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            $gallery_image_childs = $item->json_params->gallery_image ?? '';
                        ?>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php if(count($gallery_image_childs) > 0): ?>
                                    <?php $__currentLoopData = $gallery_image_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <a href="<?php echo e($url_link_childs); ?>" title="instagram post">
                                                <div class="instagram-item">
                                                    <div class="instagram-item-image">
                                                        <img src="<?php echo e($val_image); ?>" alt="<?php echo e($title_childs); ?>"
                                                            title="<?php echo e($title_childs); ?>" />
                                                    </div>
                                                    <div class="instagram-item-overlay">
                                                        <div class="icon">
                                                            <img src="<?php echo e($image); ?>"
                                                                alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>" />
                                                        </div>
                                                        <h3 class="title"><?php echo e($title_childs); ?></h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>


                
                <div class="slider-button-next slider-button-next-l">
                    <svg width="13" height="20" viewBox="0 0 13 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 1L2 11L12 19" stroke="#CF3031" stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/custom/styles/block_instagram.blade.php ENDPATH**/ ?>