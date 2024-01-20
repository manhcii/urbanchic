<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="fhm-homepage-reason">
        <?php if(count($gallery_image) > 0): ?>
            <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="decor-element">
                    <img src="<?php echo e($val); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <div class="reason-background">
            <img src="<?php echo e($image_background); ?>" alt="Background" title="Background" />
        </div>
        <div class="reason-wrapper">
            <div class="reason-content">
                <div class="heading-block-s">
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p class="desc">
                        <?php echo e($brief); ?>

                    </p>
                </div>
                <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                    class="main-button-s"><?php echo e($url_link_title); ?></a>
            </div>
            <div class="reason-image">
                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/custom/styles/block_what.blade.php ENDPATH**/ ?>