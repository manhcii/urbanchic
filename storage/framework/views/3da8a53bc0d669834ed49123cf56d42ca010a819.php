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

    <section style="background: url('<?php echo e($image_background); ?>') no-repeat;" class="follow-us">
      <div class="container">
        <div class="follow-us-wrap">
          <div class="follow-us-banner">
            <img src="<?php echo e($image); ?>" alt="Follow us on @Savory  Spree" title="<?php echo e($title); ?>">
          </div>
          <div class="follow-us-main">
            <span class="sub-title"><?php echo e($brief); ?></span>
            <h3><?php echo e($title); ?></h3>
            <div class="d-block">
              <a href="<?php echo e($url_link); ?>" class="button-main" title="Join Instagram">
                <?php echo e($url_link_title); ?>

                <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.91699 15.5832L16.0837 6.4165M16.0837 6.4165H6.91699M16.0837 6.4165V15.5832" stroke="#121212" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<?php endif; ?>
<?php $__env->startPush('script'); ?>

<?php $__env->stopPush(); ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_block/styles/team.blade.php ENDPATH**/ ?>