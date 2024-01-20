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
    <section class="testimonials">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title"><?php echo e($brief); ?></span>
          <h3><?php echo e($title); ?></h3>
        </div>

        <div class="testimonials-highlight">
          <p>
            "<?php echo e($content); ?>"
          </p>

          <div class="testimonials-highlight-name">
            <span><?php echo e($url_link_title); ?></span>
          </div>
          <img src="<?php echo e($image); ?>" alt="Savory Spree" title="Savory Spree" class="testimonials-highlight-avatar">
          <span class="testimonials-note">Jenifer Garner,Strawberry+ Peach </span>
        </div>

        <div class="testimonials-list">
          <div class="swiper">
            <div class="swiper-wrapper">
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
                    <div class="swiper-slide">
                        <div class="testimonials-item">
                              <p class="testimonials-item-yahoo"><?php echo e($title_childs); ?></p>
                              <p>
                                <?php echo e($content_childs); ?>

                              </p>
                  
                                <div class="star-rating" data-rating="4.5">
                                  <div class="star-rating-item point">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                  </div>
                        
                                  <div class="star-rating-item">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                  </div>
                                  
                                  <div class="star-rating-item">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                  </div>

                                  <div class="star-rating-item">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                  </div>

                                  <div class="star-rating-item">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                  </div>
                                </div>
                  
                              <p class="testimonials-name"><?php echo e($brief_childs); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?> 
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/about_block/styles/vision.blade.php ENDPATH**/ ?>