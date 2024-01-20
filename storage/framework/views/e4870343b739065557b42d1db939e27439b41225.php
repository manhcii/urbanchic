<?php if(isset($feature)): ?>
    
    <div class="popular-post">
                <div class="title-module">
                  <h3><?php echo e($component->title??""); ?></h3>
                </div>

                <div class="blog-list">
                  <?php $__currentLoopData = $feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                        </div>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/sidebar_blog/paramater/layout/popular.blade.php ENDPATH**/ ?>