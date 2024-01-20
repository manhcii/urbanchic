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
<div class="page-services">
 <section class="warranty">
    <div class="container">
      <div class="power-warranty">
        <div class="warranty-list d-grid">
            <?php if($block_childs): ?>
                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
        </div>
      </div>
    </div>
</section>
</div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/service_block/styles/brand.blade.php ENDPATH**/ ?>