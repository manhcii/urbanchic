<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>


    <style>
        #fhm-home-cta .cta-wrapper {
            padding: 89px 10px 0 181px;
            background: url(<?php echo e($image_background); ?>) no-repeat center;
            background-size: cover;
        }
    </style>
    <section id="fhm-home-cta" class="cta">
        <div class="container">
            <div class="cta-wrapper">
                <div class="heading-block">
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p class="desc"><?php echo e($title); ?></p>
                    <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                        class="button-solid"><?php echo e($url_link_title); ?></a>
                </div>

                <div class="cta-gift">
                    <img src="<?php echo e($image); ?>" alt="Gifts" />
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/banner/layout/cta.blade.php ENDPATH**/ ?>