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


    <section class="services">
        <div class="services-wrap">
            <div class="services-human">
                <img src="<?php echo e($image); ?>" alt="About us" title="About us">
            </div>

            <div class="services-list">
              <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                      $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                      $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image_childs = $item->image != '' ? $item->image : null;
                  ?>
                  <div class="services-item">
                    <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>">

                    <div class="services-item-content">
                        <h6><?php echo e($title_childs); ?></h6>
                        <p><?php echo e($brief_childs); ?></p>
                    </div>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
              <?php endif; ?>  
                
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_us/styles/services.blade.php ENDPATH**/ ?>