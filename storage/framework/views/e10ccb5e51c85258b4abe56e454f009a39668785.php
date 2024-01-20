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
        $i = 0;
        // dd($block_childs);
    ?>

    <div class="container margin-service">
        <div class="heading-block-m">
            <span class="badge"> <?php echo e($brief); ?> </span>
            <h2 class="title"><?php echo e($title); ?></h2>
            <p class="desc">
                <?php echo e($content); ?>

            </p>
        </div>
    </div>
    <!-- START SERVICE BLOCK 1 -->
    <section class="services-block-1">
        <div class="container">
            <div class="services-block-wrapper">
                <div class="decor-element">
                    <img src="<?php echo e($gallery_image[0]); ?>" alt="Tomatos" title="Tomatos" />
                </div>
                <div class="services-block-content">
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
                                $style = $item->json_params->style ?? '';

                            ?>
                            <?php if($style == 'content'): ?>
                                <div class="heading-block-s">
                                    <h3 class="title">
                                        <?php echo e($title_childs); ?>

                                    </h3>
                                    <p class="desc">
                                        <?php echo e($brief_childs); ?>

                                    </p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>

                <div class="services-block-image">

                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->json_params->style == 'image'): ?>
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
                                    $i++;
                                ?>
                                <div class="services-block-image-item">
                                    <?php if($i == 1): ?>
                                        <div class="decor-element">
                                            <img src="<?php echo e($gallery_image[1]); ?>" alt="Plant" title="Plant" />
                                        </div>
                                    <?php endif; ?>
                                    <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($image_background_childs); ?>" />
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/service_block/styles/our_services.blade.php ENDPATH**/ ?>