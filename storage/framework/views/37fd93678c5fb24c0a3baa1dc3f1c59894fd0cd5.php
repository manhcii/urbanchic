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

    <section class="mission">
        <div class="container">
          <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                      $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                      $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                      $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                      $url_link_childs = $item->url_link ?? '';
                      $url_link_title_childs = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                      $image_childs = $item->image != '' ? $item->image : null;
                      $image_background_childs = $item->image_background != '' ? $item->image_background : null;
                      $galary_img = $item->json_params->gallery_image ?? [];
                  ?>
                  <div class="mission-item <?php echo e($loop->index > 0 ?"vision-item":""); ?>">
                    <div class="mission-content">
                        <h3><?php echo e($title_childs); ?></h3>
                        <p>
                            <?php echo e($content_childs); ?>

                        </p>

                        <div class="misstion-icon">
                            <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>">
                        </div>
                    </div>

                    <div class="mission-image">
                      <?php if(count($galary_img) >0): ?>
                          <?php $__currentLoopData = $galary_img; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <img src="<?php echo e($val); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>">
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>    
                        
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
              <?php endif; ?>
            

           
        </div>

        <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-us-mission-leaf-1.png')); ?>" alt="Mission" title="Mission">
        </div>

        <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-us-mission-leaf-2.png')); ?>" alt="Mission" title="Mission">
        </div>

        <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-us-mission-leaf-3.png')); ?>" alt="Mission" title="Mission">
        </div>

        <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-us-mission-leaf-4.png')); ?>" alt="Mission" title="Mission">
        </div>

        <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-us-mission-leaf-5.png')); ?>" alt="Mission" title="Mission">
        </div>
    </section>
    
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_us/styles/mission.blade.php ENDPATH**/ ?>