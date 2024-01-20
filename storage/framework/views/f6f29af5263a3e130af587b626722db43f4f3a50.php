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

    <section id="fhm-home-guarantee">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="heading-block">
                        <span class="badge"><?php echo e($brief); ?></span>
                        <h2 class="title"><?php echo e($title); ?></h2>
                        <p class="desc">
                            <?php echo e($content); ?>

                        </p>
                        <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                            class="button-solid"><?php echo e($url_link_title); ?></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="guarantee-image">
                        <img src="<?php echo e($image); ?>" alt="Gift" />
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/custom/styles/guarantee.blade.php ENDPATH**/ ?>