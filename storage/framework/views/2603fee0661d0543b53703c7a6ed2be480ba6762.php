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

    <section id="fhm-homepage-service">
        <?php if(count($gallery_image) > 0): ?>
            <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="decor-element">
                    <img src="<?php echo e($val_img); ?>" alt="Pizza" title="Pizza" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="container">
            <div class="heading-block-m">
                <span class="badge"> <?php echo e($brief); ?> </span>
                <h2 class="title"><?php echo e($title); ?></h2>
                <p class="desc">
                    <?php echo e($content); ?>

                </p>
            </div>
            <div class="service-content accordion accordion-flush" id="service-content-accordion">
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
                            $icon_childs = $item->icon ?? '';
                            $gallery_image_childs = $item->json_params->gallery_image ?? '';
                        ?>
                        <div class="service-item">
                            <div id="service-item-heading-<?php echo e(($loop->index + 1)); ?>"
                                class="<?php echo e($loop->index == 1 ? '' : 'collapsed'); ?> service-item-heading"
                                data-bs-toggle="collapse" data-bs-target="#service-item-collapse-<?php echo e(($loop->index + 1)); ?>"
                                aria-expanded="false" aria-controls="service-item-collapse-<?php echo e(($loop->index + 1)); ?>">
                                <div class="service-item-heading-status">
                                    <div class="status">
                                        <div class="status-line"></div>
                                        <p class="status-number">
                                            <?php echo e($loop->index + 1 < 10 ? '0' . ($loop->index + 1) : $loop->index + 1); ?>

                                        </p>
                                    </div>
                                    <div class="icon">
                                        <?php echo $icon_childs; ?>

                                    </div>
                                </div>
                                <h3 class="service-item-heading-title">
                                    <?php echo e($title_childs); ?>

                                </h3>
                                <div class="service-item-heading-icon">
                                    <svg width="20" height="13" viewBox="0 0 20 13" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L9.88889 11L18.5 1" stroke="#727272" stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                            <div id="service-item-collapse-<?php echo e(($loop->index + 1)); ?>" class="accordion-collapse <?php echo e($loop->index == 1 ? 'show' : ''); ?> collapse service-item-body"
                                aria-labelledby="service-item-heading-<?php echo e(($loop->index + 1)); ?>" data-bs-parent="#service-content-accordion">
                                <div class="service-item-body-slider">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php if(count($gallery_image_childs) > 0): ?>
                                                <?php $__currentLoopData = $gallery_image_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="swiper-slide">
                                                        <div class="service-item-body-image">
                                                            <img src="<?php echo e($val_img); ?>" alt="services" />
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-item-body-content">
                                    <p class="content-text">
                                        <?php echo e($content_childs); ?>

                                    </p>
                                    <a href="<?php echo e($url_link_childs); ?>" title="<?php echo e($url_link_childs_title); ?>"
                                        class="content-button"><?php echo e($url_link_childs_title); ?>

                                        <span class="icon">
                                            <img src="<?php echo e(asset('themes/frontend/assets/images/elements/icons/long-arrow-right.svg')); ?>"
                                                alt="icon" title="icon" /> </span></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/custom/styles/our_services.blade.php ENDPATH**/ ?>