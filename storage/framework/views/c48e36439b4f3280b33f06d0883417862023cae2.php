<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : null;
        $image_background = $block->image_background != '' ? $block->image_background : null;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

    ?>

    <section id="fhm-homepage-menu">
        <div class="container">
            <div class="heading-block-m">
                <span class="badge"> <?php echo e($brief); ?> </span>
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
            <div class="menu-wrapper">
                <div class="menu-image-list tab-content">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                $image_childs = $item->image != '' ? $item->image : null;
                                $gallery_image = $item->json_params->gallery_image ?? null;
                            ?>
                            <div class="menu-image tab-pane fade <?php echo e($loop->index == 1 ? 'show active' : ''); ?>"
                                id="<?php echo e(Str::slug($title_childs)); ?>" role="tabpanel" aria-labelledby="<?php echo e(Str::slug($title_childs)); ?>-tab">
                                <?php if(count($gallery_image) > 0): ?>
                                    <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="decor-element">
                                            <img src="<?php echo e($val); ?>" alt="<?php echo e($title_childs); ?>"
                                                title="<?php echo e($title_childs); ?>" />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" title="<?php echo e($title_childs); ?>"
                                    class="menu-image-item" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <ul class="menu-list" role="tablist">
                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_childs = $item->json_params->content->{$locale} ?? $item->content;
                                $image = $item->image != '' ? $item->image : null;
                                $image_background = $item->image_background != '' ? $item->image_background : null;
                            ?>
                            <li class="menu-item <?php echo e($loop->index == 1 ? 'active' : ''); ?>" id="<?php echo e(Str::slug($title_childs)); ?>-tab"
                                data-bs-toggle="tab" data-bs-target="#<?php echo e(Str::slug($title_childs)); ?>" role="tab"
                                aria-controls="<?php echo e(Str::slug($title_childs)); ?>" aria-selected="false">
                                <h3 class="menu-item-title"><?php echo e($title_childs); ?></h3>
                                <p class="menu-item-desc">
                                    <?php echo e($brief_childs); ?>

                                </p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/custom/styles/our_menu.blade.php ENDPATH**/ ?>