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
            ->limit(3)
            ->get();

    ?>

    <section id="fhm-home-news" class="news">
        <div class="container">
            <div class="heading-block">
                <span class="badge"> <?php echo e($brief); ?> </span>
                <h2 class="title"><?php echo e($title); ?></h2>
            </div>
            <div class="news-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_child = $item->json_params->name->{$locale} ?? $item->name;
                                $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content_child = $item->json_params->content->{$locale} ?? $item->content;
                                $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : 'data/images/no_image.jpg');
                                $time = date('M d,Y', strtotime($item->updated_at));
                                $alias = $item->alias ?? '';

                            ?>

                            <div class="swiper-slide">
                                <div class="news-item">
                                    <div class="news-item-image">
                                        <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                                    </div>
                                    <span class="news-item-publish"> <?php echo e($time); ?> </span>
                                    <a href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>"
                                        class="news-item-title"><?php echo e($title_child); ?></a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>