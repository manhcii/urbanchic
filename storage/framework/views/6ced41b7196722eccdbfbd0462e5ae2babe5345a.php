<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });

    ?>

    <style>
      #fhm-home-break {
    margin-top: 121px;
    background-image: url(<?php echo e($image_background); ?>);
}
    </style>
    <section id="fhm-home-break" class="break">
        <div class="container">
            <div class="heading-block">
                <h2 class="title"><?php echo e($title); ?></h2>
                <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>" class="button-solid"><?php echo e($url_link_title); ?></a>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/banner/layout/banner.blade.php ENDPATH**/ ?>