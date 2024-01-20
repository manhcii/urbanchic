<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });
        $block_childs_decor = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style == 'decor';
        });
    ?>

    <section id="fhm-homepage-about">

        <?php if($block_childs_decor): ?>
            <?php $__currentLoopData = $block_childs_decor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                    $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                    $image = $item->image != '' ? $item->image : null;
                    $image_background = $item->image_background != '' ? $item->image_background : null;
                ?>

                <div class="decor-element">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="container">
            <div class="about-wrapper">
                <div class="about-content">
                    <div class="heading-block-m">
                        <span class="badge"> <?php echo e($brief); ?> </span>
                        <h2 class="title">
                            <?php echo e($title); ?>

                        </h2>
                        <p class="desc">
                            <?php echo e($content); ?>

                        </p>
                    </div>
                    <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                        class="main-button-s"><?php echo e($url_link_title); ?></a>
                </div>
                <div class="about-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php if($block_childs): ?>
                                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                        $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                        $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                        $image = $item->image != '' ? $item->image : null;
                                        $image_background = $item->image_background != '' ? $item->image_background : null;
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="about-slider-image">
                                            <img src="<?php echo e($image); ?>" alt="<?php echo e($title_childs); ?>"
                                                title="<?php echo e($title_childs); ?>" />
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/blocks/banner/layout/about_us.blade.php ENDPATH**/ ?>