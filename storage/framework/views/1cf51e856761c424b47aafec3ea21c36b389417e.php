<?php
    $name = 'post_search';
    $detail_component = $components->first(function ($item) use ($name) {
        return $item->component_code == $name;
    });
?>
<?php if(isset($component)): ?>
    
    <div class="recent-blog">
        <div class="title-module">
          <h3><?php echo e($component->title); ?></h3>
        </div>
       
        <div class="blog-list">
          <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $title = $item->json_params->name->{$locale} ?? $item->name;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $price = $item->price ?? '0';
                $price_old = $item->price_old ?? '0';
                $image = $item->image ?? url('data/images/no_image.jpg');
                $image_thumb = $item->image_thumb ?? url('data/images/no_image.jpg');
                $alias = route('frontend.page', ['taxonomy' => $item->alias ?? '']);
                $time = date('M d, Y', strtotime($item->created_at));
            ?>  
            <?php if($loop->index>=0&&$loop->index<=1): ?>
              <div class="blog-item">
                <div href="<?php echo e($alias); ?>" class="blog-item-image">
                  <img src="<?php echo e($image); ?>"
                    alt="<?php echo e($title); ?> "
                    title="<?php echo e($title); ?> " />
                </div>

                <div class="blog-item-info">
                  <a class="blog-item-name" href="<?php echo e($alias); ?>"
                    title="<?php echo e($title); ?> "><?php echo e($title); ?>

                  </a>
                  <div class="blog-item-post"><?php echo e($time); ?></div>
                </div>
              </div>
            <?php endif; ?>  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="sidebar-fanpage">
        <div class="fb-page" data-href="https://www.facebook.com/fhmvietnamm" data-tabs="" data-width=""
          data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
          data-show-facepile="false">
          <blockquote cite="https://www.facebook.com/fhmvietnamm" class="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/fhmvietnamm">FHM Việt Nam</a>
          </blockquote>
        </div>
      </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/sidebar_blog/paramater/layout/recent.blade.php ENDPATH**/ ?>