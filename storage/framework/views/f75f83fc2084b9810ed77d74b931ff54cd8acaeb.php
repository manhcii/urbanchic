<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $background = $block->image_background != '' ? $block->image_background : url('assets/img/banner.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $params['user_id'] = Auth::guard('web')->user()->id ?? "";
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->paginate(App\Consts::PAGINATE['post']);
        $paramater = App\Models\Parameter::get();
    ?>

    <section id="fhm-blog-list-latest" class="news">
        <div class="container">
            <div class="heading-block">
                <h2 class="title"><?php echo e($title); ?></h2>
                <p class="desc">
                    <?php echo e($brief); ?>

                </p>
            </div>
            <div class="latest-blog-group">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title_child = $items->json_params->name->{$locale} ?? $items->name;
                        $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                        $content_child = $items->json_params->content->{$locale} ?? $items->content;
                        $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                        $time = date('M d,Y', strtotime($items->updated_at));
                        $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                        $txt_tag = '';
                        if (isset($items->json_params->paramater)) {
                            foreach ($items->json_params->paramater as $keys => $value) {
                                if (isset($value->childs) && $value->name == 'type') {
                                    $tag = $paramater->first(function ($item, $key) use ($keys, $val_tag) {
                                        return $item->parent_id == $keys && $item->id == $val_tag;
                                    });
                                    $txt_tag = $tag->name ?? '';
                                }
                            }
                        }
                    ?>
                    <div class="news-item">
                        <div class="news-item-image">
                            <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                        </div>
                        <span class="news-item-publish">
                            <?php echo e($time); ?>

                        </span>
                        <a href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>"
                            class="news-item-title"><?php echo e($title_child); ?></a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="products-list-pagination d-flex justify-content-between align-items-center">
                <p class="products-list-pagination-result">
                    <?php echo app('translator')->get('Total'); ?> <strong><?php echo e($rows->perPage()); ?></strong> <?php echo app('translator')->get('of'); ?>
                    <strong><?php echo e(number_format($rows->total())); ?></strong> <?php echo app('translator')->get('Resutls'); ?>
                </p>
                <?php echo e($rows->withQueryString()->links('frontend.pagination.default')); ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/cms_post/styles/list-latest.blade.php ENDPATH**/ ?>