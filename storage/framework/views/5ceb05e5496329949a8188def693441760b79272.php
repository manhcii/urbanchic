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
        
        }
    </style>
    <section class="commitment">
        <div class="container">
            <div class="commitment-wrap">
                <div class="commitment-content">
                    <span class="sub-title"><?php echo e($brief); ?></span>
                    <h3><?php echo e($title); ?> </h3>
                    <p>
                        <?php echo e($content); ?>

                    </p>
                </div>

                <div class="commitment-images">
                    <?php if(count($gallery_image) >0): ?>
                          <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <img src="<?php echo e($val); ?>" alt="Commitment" class="<?php echo e(($loop->index >0) ?'commitment-images-sub':""); ?> " title="Commitment">
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>    
                    
                </div>

                <div class="icon-leaf">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-1.png')); ?>" alt="Commitment" title="Commitment">
                </div>

                <div class="icon-leaf">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-2.png')); ?>" alt="Commitment" title="Commitment">
                </div>

                <div class="icon-leaf">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-commitment-leaf-3.png')); ?>" alt="Commitment" title="Commitment">
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/service_block/styles/commitment.blade.php ENDPATH**/ ?>