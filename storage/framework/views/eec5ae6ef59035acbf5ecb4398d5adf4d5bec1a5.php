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
    <section class="slide-product">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title"><?php echo e($brief); ?></span>
          <h1><?php echo $title; ?></h1>
          <p>
            <?php echo e($content); ?>  
          </p>

          <a href="<?php echo e($url_link); ?>" class="button-main" title="<?php echo e($url_link_title); ?>">
            <?php echo e($url_link_title); ?>

            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6.41699 15.5832L15.5837 6.4165M15.5837 6.4165H6.41699M15.5837 6.4165V15.5832" stroke="white" stroke-width="1.83333" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>

          <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/slide-product-leaf-1.svg')); ?>" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/slide-product-leaf-2.svg')); ?>" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/slide-product-leaf-3.svg')); ?>" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/slide-product-leaf-4.svg')); ?>" alt="savory Spree" title="savory Spree">
          </div>

          <div class="icon-leaf">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/slide-product-leaf-5.svg')); ?>" alt="savory Spree" title="savory Spree">
          </div>
        </div>
      </div>

      <div class="slide-product-list">
        <?php
        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['user_id'] = $user_auth->id ?? '';
        // list product
        $rows = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(10)
            ->get();
        ?>
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $title_child = $items->json_params->name->{$locale} ?? $items->name;
            $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
            $content_child = $items->json_params->content->{$locale} ?? $items->content;
            $image_child = $items->image_thumb != '' ? $items->image_thumb : ($items->image != '' ? $items->image : 'data/images/no_image.jpg');
            $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
        ?>
        <div class="slide-product-item">
          <a href="<?php echo e($alias); ?>" class="slide-product-item-wrap">
            <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" title="<?php echo e($title_child); ?>">
            <div class="slide-product-item-info">
              <span><?php echo e($items->taxonomy_name??""); ?></span>
              <p><?php echo e($title_child); ?></p>
            </div>
          </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/blocks/banner/layout/banner.blade.php ENDPATH**/ ?>