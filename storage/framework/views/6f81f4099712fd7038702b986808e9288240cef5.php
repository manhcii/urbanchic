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
            ->limit(5)
            ->get();
    ?>

    <section id="fhm-home-category">
        <div class="container">
            <div class="category-heading">
                <div class="heading-block">
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p class="desc">
                        <?php echo e($brief); ?>

                    </p>
                </div>
                <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                    class="button-outline"><?php echo e($url_link_title); ?></a>
            </div>
        </div>
        <div class="container large">
            <div class="category-group">
                <?php if(isset($rows) && count($rows) > 0): ?>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="category-item">
                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>"
                                 title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>" class="category-item-image">
                                <img src="<?php echo e($items->json_params->image ?? ''); ?>" alt="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>" />
                            </a>
                            <div class="category-item-heading">
                                <div class="heading-wrapper">
                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>" title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>" class="title"><?php echo e($items->json_params->name->{$locale} ?? $items->name); ?></a>
                                    <?php if($loop->index == 0): ?>
                                    <p class="desc">
                                        <?php echo e($items->json_params->brief->{$locale} ?? $items->brief); ?>

                                    </p>
                                    <?php endif; ?>

                                </div>
                                <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>" title="Show Now" class="heading-button">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/arrow-r.svg')); ?>" alt="Arrow" />
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/category_product/styles/default.blade.php ENDPATH**/ ?>