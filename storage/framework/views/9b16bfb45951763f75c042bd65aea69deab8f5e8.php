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
        $i = 0;
        // dd($block_childs);
    ?>
    <div class="page-services">
    <section class="work-together">
        <div class="container">
            <div class="module-content text-center">
                <span class="sub-title"><?php echo e($brief); ?></span>
                <h1><?php echo e($title); ?></h1>
                <p>
                    <?php echo e($content); ?> 
                </p>
            </div>

            <div class="work-together-wrap">
                <div class="work-together-images">
                    <?php if(count($gallery_image) >0): ?>
                          <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <img src="<?php echo e($val); ?>" alt="Work Together" title="Work Together">
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>    
              
                </div>
    
                <ul class="work-together-content">
                    
    
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                              $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                              $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                              $image_childs = $item->image != '' ? $item->image : null;
                          ?>
                          <li class="work-together-content-item">
                                <h5><?php echo e($title_childs); ?></h5>
                                <p>
                                    <?php echo e($brief_childs); ?>

                                </p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
                      <?php endif; ?>  
                </ul>

                <div class="icon-leaf">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-about-leaf-5.png')); ?>" alt="Work Together" title="Work Together">
                </div>
        
                <div class="icon-leaf">
                    <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-leaf-2.png')); ?>" alt="Work Together" title="Work Together">
                </div>
            </div>
        </div>

        <div class="work-together-icon">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-together-icon-1.png')); ?>" alt="Work Together" title="Work Together">
        </div>

        <div class="work-together-icon">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-together-icon-3.png')); ?>" alt="Work Together" title="Work Together">
        </div>

        <div class="work-together-icon">
            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/page-services-together-icon-2.png')); ?>" alt="Work Together" title="Work Together">
        </div>
    </section>
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/service_block/styles/our_services.blade.php ENDPATH**/ ?>