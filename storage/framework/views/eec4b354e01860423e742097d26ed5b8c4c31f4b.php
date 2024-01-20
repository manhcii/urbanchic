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

    <section id="fhm-notfound">
        <div class="container">
            <div class="notfound-wrapper">
                <?php if(count($gallery_image) > 0): ?>
                    <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="decor-element">
                            <img src="<?php echo e($val); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <div class="notfound-image">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>" />
                </div>
                <h1 class="notfound-title"><?php echo e($title); ?></h1>
                <a href="<?php echo e(route('home.default')); ?>" title="<?php echo e($url_link_title); ?>" class="notfound-button"><?php echo e($url_link_title); ?></a>
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/custom/styles/404.blade.php ENDPATH**/ ?>