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
    <section class="questions">
      <div class="container">
        <h3><?php echo e($title); ?></h3>

        <div class="question-list">
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

                ?>
                <div class="question-item item-collapse">
                    <h4 class="question-title">
                      <?php echo e($title_childs); ?>

                    </h4>
                    <p class="question-des item-collapse-body">
                      <?php echo e($brief_childs); ?>

                    </p>
                    <button title="collapse">
                      <div class="icon-collpase">
                        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/question-icon-collapse.svg')); ?>" alt="Collapse" title="Collapse" />
                      </div>
                      <div class="icon-show">
                        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/question-icon-collapse.svg')); ?>" alt="Show" title="Show" />
                      </div>
                    </button>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?> 
        </div>
      </div>

      <div class="icon-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/questions-leaf-1.png')); ?>" alt="Savory Spree" title="Savory Spree">
      </div>

      <div class="icon-leaf">
        <img src="<?php echo e(asset('themes/frontend/assets/image/icons/questions-leaf-2.png')); ?>" alt="Savory Spree" title="Savory Spree">
      </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_block/styles/memorable.blade.php ENDPATH**/ ?>