<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = $block->json_params->style ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id && $item->json_params->style != 'decor';
        });

    ?>

    <style>
     
    </style>
    <div class="page-banner">
      <picture>
        <source media="(max-width:767px)" srcset="<?php echo e($image); ?>" />
        <img src="<?php echo e($image); ?>" alt="About us" title="About us" />
      </picture>

      <div class="page-banner-content module-content">
        <div class="container">
          <span class="sub-title"><?php echo e($brief); ?></span>
          <h3><?php echo e($title); ?></h3>
          <a href="<?php echo e($url_link); ?>" class="button-main" title="<?php echo e($url_link_title); ?>"><?php echo e($url_link_title); ?></a>
        </div>
      </div>
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/banner/layout/banner_post.blade.php ENDPATH**/ ?>