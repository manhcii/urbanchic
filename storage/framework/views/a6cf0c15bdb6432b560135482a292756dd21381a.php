<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? null;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <section id="fhm-home-testimonials">
        <div class="testimonials-image">
            <img src="<?php echo e($image); ?>" alt="<?php echo e($brief); ?>" />
        </div>
        <div class="testimonials-content">
            <div class="heading-block">
                <span class="badge"> <?php echo e($brief); ?> </span>
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
            <div class="testimonials-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $des_childs = $item->json_params->description->{$locale} ?? $item->description;
                                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_childs = $item->image != '' ? $item->image : null;
                                    $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                    $url_link_childs = $item->url_link != '' ? $item->url_link : '';
                                    $url_link_childs_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                    $gallery_image_childs = $item->json_params->gallery_image ?? '';
                                    $star_child = $item->json_params->star ?? 0;
                                ?>
                                <div class="swiper-slide">
                                    <div class="testimonials-item">
                                        <h3 class="title"><?php echo e($brief_childs); ?></h3>
                                        <p class="desc">
                                            <?php echo e($content_childs); ?>

                                        </p>


                                        <div class="rating">
                                            <?php for($i = 1; $i < 6; $i++): ?>
                                                <?php
                                                    $img_star = ($i <= $star_child) ? asset('themes/frontend/assets/images/icon/star-solid.svg') : asset('themes/frontend/assets/images/icon/star-outline.svg');
                                                ?>
                                                <li class="rating-icon">
                                                    <img src="<?php echo e($img_star); ?>" alt="Star" title="Star" />
                                                </li>
                                            <?php endfor; ?>
                                        </div>
                                        <div class="user">
                                            <div class="user-image">
                                                <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" />
                                            </div>
                                            <div class="user-info">
                                                <h4 class="user-info-name"><?php echo e($title_childs); ?></h4>
                                                <span class="user-info-job"><?php echo e($des_childs); ?> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="slider-button-next">
                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/arrow-r-black.svg')); ?>" alt="Next" />
                </div>
                <div class="slider-button-prev">
                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/arrow-l.svg')); ?>" alt="Previous" />
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/block_star/styles/block_testimonials.blade.php ENDPATH**/ ?>