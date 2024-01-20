<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->limit(4)
            ->get();

    ?>

    <section class="news">
      <div class="container">
        <div class="module-content text-center">
          <span class="sub-title"><?php echo e($brief); ?></span>
          <h3><?php echo e($title); ?></h3>
        </div>

        <div class="blog-list">
          <div class="swiper">
            <div class="swiper-wrapper">
              <?php if($rows): ?>  
               <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title_child = $item->json_params->name->{$locale} ?? $item->name;
                    $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content_child = $item->json_params->content->{$locale} ?? $item->content;
                    $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : 'data/images/no_image.jpg');
                    $time = date('M d, Y', strtotime($item->updated_at));
                    $alias = $item->alias ?? '';

                ?>
                  <div class="swiper-slide">
                    <div class="blog-item">
                      <a href="<?php echo e($alias); ?>" class="blog-item-image">
                        <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" title="<?php echo e($title_child); ?>">
                      </a>
          
                      <div class="blog-item-info">
                        <div class="blog-item-post">
                          <span class="blog-item-topic" style="color: #0BA360"><?php echo e($item->taxonomy_name??""); ?></span>
                          <span><?php echo e($time); ?></span>
                        </div>
          
                        <a class="blog-item-name" href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>"><?php echo e($title_child); ?></a>

                        <div class="blog-item-line"></div>
          
                        <p class="blog-item-des">
                          <?php echo e($brief_child); ?>

                        </p>
                      </div>
                    </div>
                  </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="swiper-button-prev swiper-circle"></div>
          <div class="swiper-button-next swiper-circle"></div>
        </div>
      </div>
    </section>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>