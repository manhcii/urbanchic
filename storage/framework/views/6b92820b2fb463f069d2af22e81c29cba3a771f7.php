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
            ->limit(9)
            ->get();
    ?>

    <section id="fhm-menu">
        <div class="container">
            <div class="heading-block-m">
                <h2 class="title">Our Menu</h2>
            </div>
            <ul class="menu-list">
                <?php if(isset($rows) && count($rows) > 0): ?>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="menu-item">
                            <div class="menu-item-image">
                                <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>" title="<?php echo e($items->json_params->name->$locale ?? $items->name); ?>">
                                    <img src="<?php echo e($items->json_params->image??''); ?>" alt="Salad" title="<?php echo e($items->json_params->name->$locale ?? $items->name); ?>" />
                                </a>
                            </div>
                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $items->alias ?? ''])); ?>" title="<?php echo e($items->json_params->name->$locale ?? $items->name); ?>" class="menu-item-title"><?php echo e($items->json_params->name->$locale ?? $items->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/featured_category/styles/product.blade.php ENDPATH**/ ?>