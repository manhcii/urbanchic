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
    <style>
        #fhm-services-commitment::after {
            content: "";
            width: 90%;
            height: 90%;
            position: absolute;
            top: 50%;
            left: 0;
            z-index: -1;
            transform: translateY(-50%);
            background-image: url(<?php echo e($image_background); ?>);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <section id="fhm-services-commitment">
        <?php if(count($gallery_image) > 0): ?>
            <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="decor-element">
                    <img src="<?php echo e($val); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="container">
            <div class="services-commitment-content">
                <div class="heading-block-l">
                    <span class="badge"> <?php echo e($brief); ?> </span>
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p class="desc">
                        <?php echo e($content); ?>

                    </p>
                    <ul class="list">
                        <?php if($block_childs): ?>
                            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                    $image_childs = $item->image != '' ? $item->image : null;
                                    $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                                ?>

                                <li class="item">
                                    <div class="icon">
                                        <img src="<?php echo e(asset('themes/frontend/assets/images/elements/icons/checked.svg')); ?>" alt="Checked"
                                            title="Checked" />
                                    </div>
                                    <span class="text"><?php echo e($title_childs); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="services-commitment-image">
            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/service_block/styles/commitment.blade.php ENDPATH**/ ?>