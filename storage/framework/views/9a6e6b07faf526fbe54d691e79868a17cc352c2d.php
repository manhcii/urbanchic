<?php if(isset($taxonomys)): ?>
    
<div class="bloglist-categories">
                <div class="title-module">
                  <h3><?php echo e($component->title); ?></h3>
                </div>
                
                <div class="bloglist-category-list">
                  <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $item->alias ?? ''])); ?>" title="Drinks"><?php echo e($item->name??""); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/sidebar_blog/paramater/layout/category.blade.php ENDPATH**/ ?>