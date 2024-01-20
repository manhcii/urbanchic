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

    <section class="multinational">
        <div class="container">
            <h3><?php echo e($title); ?></h3>
            <div class="multinational-map">
                <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_us/styles/multinational.blade.php ENDPATH**/ ?>