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

    <section class="partner">
        <div class="container">
            <div class="partner-list">
              <?php if(count($gallery_image) >0): ?>
                  <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <div class="partner-item">
                        <img src="<?php echo e($val); ?>" alt="Savory Spree" title="Savory Spree">
                    </div>
                    <div class="partner-line"></div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>    
              
            </div>
        </div>
    </section>
    
<?php endif; ?>
<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('themes/frontend/assets/js/about-us.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_us/styles/partner.blade.php ENDPATH**/ ?>