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
        $style = $block->json_params->style ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>

    <?php if($style == 'reverse'): ?>
        <section class="services-block-4">
            <div class="decor-element">
                <img src="<?php echo e($gallery_image[0]); ?>" alt="Carrot" title="Carrot" />
            </div>
            <div class="container">
                <div class="services-block-wrapper">
                    <div class="services-block-image">
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                    </div>
                    <div class="services-block-content">
                        <div class="decor-element">
                            <?php if($gallery_image[0]): ?>
                                <img src="<?php echo e($gallery_image[1]); ?>" alt="Spices" title="Spices" />
                            <?php endif; ?>
                        </div>
                        <div class="heading-block-s">
                            <h3 class="title">
                                <?php echo e($title); ?>

                            </h3>
                            <p class="desc">
                                <?php echo e($brief); ?>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="services-block-3">
            <div class="decor-element">
                <img src="<?php echo e($gallery_image[0]); ?>" alt="Cutting Board" title="Cutting Board" />
            </div>
            <div class="container">
                <div class="services-block-wrapper">
                    <div class="services-block-content">
                        <div class="heading-block-s">
                            <h3 class="title">
                                <?php echo e($title); ?>

                            </h3>
                            <p class="desc">
                                <?php echo e($brief); ?>

                            </p>
                        </div>
                    </div>
                    <div class="services-block-image">
                        <div class="decor-element">
                            <?php if($gallery_image[0]): ?>
                                <img src="<?php echo e($gallery_image[1]); ?>??''" alt="Potato" title="Potato" />
                            <?php endif; ?>
                        </div>
                        <div class="decor-element">
                            <?php if($gallery_image[0]): ?>
                                <img src="<?php echo e($gallery_image[2]); ?>?''" alt="Grape" title="Grape" />
                            <?php endif; ?>
                        </div>
                        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- START SERVICE BLOCK 1 -->
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/service_block/styles/block_reverse.blade.php ENDPATH**/ ?>