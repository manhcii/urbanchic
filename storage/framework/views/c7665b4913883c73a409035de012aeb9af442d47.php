<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link ?? null;
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $galary_img = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>
    <section id="fhm-home-instagram">
        <div class="container">
            <div class="heading-block">
                <span class="badge"><?php echo e($brief); ?></span>
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
        </div>
        <ul class="instagram-list">
            <?php if(count($galary_img) >0): ?>
                <?php $__currentLoopData = $galary_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="instagram-item">
                        <div  class="instagram-item-post">
                            <img src="<?php echo e($val); ?>" alt="Instagram" />
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
    </section>



<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/banner/layout/instagram.blade.php ENDPATH**/ ?>