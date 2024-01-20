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
            return $item->parent_id == $block->id && $item->json_params->style=="info";
        });
        $block_childs_image = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style=="image";
        });
    ?>


    <style>
        
    </style>
    <section class="warranty">
      <div class="warranty-savory"><?php echo e($title); ?></div>
      <div class="warranty-spree"><?php echo e($brief); ?></div>
      <div class="container">
        <div class="warranty-image-main">
          <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
        </div>

        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                $block_childs_item1 = $blocks->filter(function ($item2, $key) use ($item) {
                    return $item2->parent_id == $item->id ;
                });
            ?>
            <div class="power-warranty">
              <div class="module-content text-center">
                <span class="sub-title"><?php echo e($brief_childs); ?> </span>
                <h3><?php echo e($title_childs); ?></h3>
              </div>

              <div class="warranty-top d-flex">
                <?php $__currentLoopData = $block_childs_item1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_child1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title_childs_item1 = $item_child1->json_params->title->{$locale} ?? $item_child1->title;
                ?>
                <p class="warranty-top-item">
                  <?php echo e($title_childs_item1); ?>

                </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
      
              <div class="warranty-list d-grid">
                <?php if($block_childs_image): ?>
                  <?php $__currentLoopData = $block_childs_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $block_childs_item2 = $blocks->filter(function ($item3, $key) use ($item) {
                            return $item3->parent_id == $item->id ;
                        });
                    ?>
                    <?php if($block_childs_item2): ?>
                      <?php $__currentLoopData = $block_childs_item2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                          $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                          $image_childs = $item->image != '' ? $item->image : null;
                          
                      ?>
                      <div class="warranty-item">
                        <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>">  
                        <div class="warranty-item-info">
                          <h5><?php echo e($title_childs); ?></h5>
                          <p><?php echo e($brief_childs); ?></p>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-1.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-2.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-3.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-4.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-5.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>

      <div class="warranty-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/warranty-leaf-6.png')); ?>" alt="<?php echo e($title); ?>" title="<?php echo e($title); ?>">
      </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/banner/layout/cta.blade.php ENDPATH**/ ?>