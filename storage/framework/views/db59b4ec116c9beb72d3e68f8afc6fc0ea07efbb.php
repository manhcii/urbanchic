<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $icon = $block->icon != '' ? $block->icon : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        $gallery_image = $block->json_params->gallery_image ?? [];
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];
        $params['status'] = App\Consts::STATUS['active'];
        // list Category
        $rows = App\Models\ProductCategory::getSqlTaxonomy($params)
            ->limit(4)
            ->get();
    ?>
    <section class="best-seller">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title"><?php echo e($brief); ?></span>
          <h3><?php echo e($title); ?></h3>
          <p>
            <?php echo e($content); ?>

          </p>
        </div>
        
        <ul class="best-seller-tabs" role="tablist">
            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="best-seller-tab" role="presentation">
                <button class="nav-link <?php echo e($loop->index==0? 'active':""); ?>" data-bs-toggle="tab" data-bs-target="#best-seller-tab-<?php echo e($items->id); ?>" type="button" role="tab" aria-controls="best-seller-tab-<?php echo e($items->id); ?>" aria-selected="true"><?php echo e($items->json_params->name->{$locale} ?? $items->name); ?></button>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    
        <div class="tab-content best-seller-tabs-content">
        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $params['status'] = App\Consts::STATUS['active'];
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['taxonomy_id'] = $items->id;
        // list product
        $products = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(6)
            ->get();
        ?>
          <div class="tab-pane fade show <?php echo e($loop->index==0? 'active':""); ?>" id="best-seller-tab-<?php echo e($items->id); ?>" role="tabpanel" aria-labelledby="best-seller-tab-<?php echo e($items->id); ?>" tabindex="0">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $title_child = $product->json_params->name->{$locale} ?? $product->name;
                $brief_child = $product->json_params->brief->{$locale} ?? $product->brief;
                $content_child = $product->json_params->content->{$locale} ?? $product->content;
                $image_child = $product->image_thumb != '' ? $product->image_thumb : ($product->image != '' ? $product->image : 'data/images/no_image.jpg');
                $price = $product->price != '' ? $product->price : 0;
                $price_old = $product->price_old != '' ? $product->price_old : 0;
                $alias = route('frontend.page', ['taxonomy' => $product->alias ?? '']);
                ?>
                <div class="swiper-slide">
                  <div class="product-item">
                    <div class="product-item-image">
                      <img src="<?php echo e($image_child); ?>" alt="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?> " title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?> ">
                    </div>
                    <div class="product-item-info">
                      <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>" class="product-category" title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?> ">
                        <?php echo e($items->json_params->name->{$locale} ?? $items->name); ?> 
                      </a>
        
                      <a class="product-name" href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>">
                        <?php echo e($title_child); ?>

                      </a>

                      <div class="star-rating" data-rating="4">
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
              
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                        
                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>

                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>

                        <div class="star-rating-item">
                          <i class="fa-solid fa-star"></i>
                          <i class="fa-solid fa-star"></i>
                        </div>
                      </div>

                      <div class="product-price">
                        <p class="product-price-current">$89.96</p>
                        <p class="product-price-old">$102.96</p>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
          
            </div>
            <div class="swiper-button-prev swiper-circle"></div>
            <div class="swiper-button-next swiper-circle"></div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section>
  
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/category_product/styles/default.blade.php ENDPATH**/ ?>