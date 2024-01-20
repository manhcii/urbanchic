<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($page->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($page->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($page->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($page->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $background_breadcrumbs = json_decode($setting->image)->background_breadcrumbs ?? '';

        $category_title = $page->json_params->name->{$locale} ?? $page->name;
        $category_brief = $page->json_params->brief->{$locale} ?? $page->brief;
        $category_description = $page->json_params->description->{$locale} ?? $page->description;
        $category_content = $page->json_params->content->{$locale} ?? $page->content;
        $category_image = $page->json_params->image != '' ? $page->json_params->image : $setting->background_breadcrumbs;
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : $setting->background_breadcrumbs;
        $block_hot = $rows->take(3);
        $block_pich = $rows->random();
    ?>

    <style>
        #fhm-blog-banner {
            background: linear-gradient(180deg, #000 0%, rgba(0, 0, 0, 0.67) 0.01%, rgba(0, 0, 0, 0.12) 40.63%, rgba(0, 0, 0, 0.12) 68.75%, rgba(0, 0, 0, 0.76) 100%), url(<?php echo e($category_backgroud); ?>) center no-repeat;
            background-size: cover;
            padding: 242px 0 294px;
        }

        #fhm-blog-relate-news .relate-news-wrapper .relate-news-interest-image {
            width: 520px;
            height: 623px;
        }
    </style>

    <section id="fhm-blog-banner" class="banner">
        <div class="container">
            <h1 class="banner-title"><?php echo e($category_brief); ?></h1>
        </div>
    </section>

    <section id="fhm-blog-hot-news">
        <div class="container">
            <div class="hot-news-wrapper">
                <div class="hot-news-thumb">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $block_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="hot-news-thumb-item">
                                        <div class="line"></div>
                                        <span class="number"><?php echo e('0' . ($loop->index + 1)); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="hot-news-content">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $block_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <div class="hot-news-content-item">
                                        <span class="date"> <?php echo e(date('d.M.Y', strTotime($items->updated_at))); ?> </span>
                                        <a href="<?php echo e(route('frontend.page', ['taxonomy' => $items->alias ?? ''])); ?>"
                                            title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>"
                                            class="title"><?php echo e($items->json_params->name->{$locale} ?? $items->name); ?></a>
                                        <p class="desc">
                                            <?php echo e($items->json_params->brief->{$locale} ?? $items->brief); ?>

                                        </p>
                                        <span class="author"> <?php echo app('translator')->get('By'); ?>: <?php echo e($items->admin_name); ?> </span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="fhm-blog-latest-news" class="news">
        <div class="container">
            <div class="heading-block-s">
                <h2 class="title"><?php echo e($category_description); ?></h2>
            </div>
            <ul class="latest-news-tab" role="tablist">
                <li class="latest-news-tab-item active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane"
                    role="tab" aria-controls="all-tab-pane" aria-selected="true">
                    <?php echo app('translator')->get('Show All'); ?>
                </li>
                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="latest-news-tab-item" id="<?php echo e($val_taxonomy->alias); ?>-tab" data-bs-toggle="tab"
                        data-bs-target="#<?php echo e($val_taxonomy->alias); ?>-tab-pane" role="tab"
                        aria-controls="<?php echo e($val_taxonomy->alias); ?>-tab-pane" aria-selected="false">
                        <?php echo e($val_taxonomy->json_params->name->{$locale} ?? $val_taxonomy->name); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="tab-content">
                <div class="latest-news-group tab-pane fade show active" id="all-tab-pane" role="tabpanel"
                    aria-labelledby="all-tab" data-perpage="<?php echo e($rows->withQueryString()->perPage()); ?>"
                    data-currentpage="<?php echo e($rows->withQueryString()->currentPage()); ?>"
                    data-taxonomy="0" data-lastpage="<?php echo e($rows->withQueryString()->lastPage()); ?>">
                    <ul class="news-list">
                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="news-item">
                                <div class="news-item-image">
                                    <img src="<?php echo e($item_post->image ?? ''); ?>"
                                        alt="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                        title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>" />
                                </div>
                                <p class="news-item-date">29.Jun.2021</p>
                                <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>"
                                    title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                    class="news-item-title"><?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?></a>
                                <p class="news-item-desc">
                                    <?php echo e($item_post->json_params->brief->{$locale} ?? $item_post->brief); ?>

                                </p>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php if($rows->withQueryString()->currentPage() < $rows->withQueryString()->lastPage()): ?>
                        <button type="button" onclick="loadMore('.latest-news-group','.news-list','post')" class="main-button-m">
                            <?php echo app('translator')->get('View More'); ?>
                        </button>
                    <?php endif; ?>
                </div>
                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $data_relationship['id'] = $val_taxonomy->id;
                        $list_posts = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['post']);
                    ?>

                    <div class="latest-news-group tab-pane fade" id="<?php echo e($val_taxonomy->alias); ?>-tab-pane" role="tabpanel"
                        aria-labelledby="<?php echo e($val_taxonomy->alias); ?>-tab"
                        data-perpage="<?php echo e($list_posts->withQueryString()->perPage()); ?>"
                        data-currentpage="<?php echo e($list_posts->withQueryString()->currentPage()); ?>"
                        data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                        data-lastpage="<?php echo e($list_posts->withQueryString()->lastPage()); ?>">

                        <ul class="news-list">
                            <?php $__currentLoopData = $list_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="news-item">
                                    <div class="news-item-image">
                                        <img src="<?php echo e($item_post->image ?? ''); ?>"
                                            alt="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                            title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>" />
                                    </div>
                                    <p class="news-item-date">29.Jun.2021</p>
                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => $item_post->alias ?? ''])); ?>"
                                        title="<?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?>"
                                        class="news-item-title"><?php echo e($item_post->json_params->name->{$locale} ?? $item_post->name); ?></a>
                                    <p class="news-item-desc">
                                        <?php echo e($item_post->json_params->brief->{$locale} ?? $item_post->brief); ?>

                                    </p>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php if($list_posts->withQueryString()->currentPage() < $list_posts->withQueryString()->lastPage()): ?>
                            <button type="button" onclick="loadMore('.latest-news-group','.news-list','post')" class="main-button-m">
                                <?php echo app('translator')->get('View More'); ?>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>


    <section id="fhm-blog-relate-news">
        <div class="container">
            <div class="heading-block-s">
                <h2 class="title"><?php echo app('translator')->get('Editor’s Picks'); ?></h2>
            </div>
            <div class="relate-news-wrapper">
                <ul class="relate-news-list">
                    <?php $__currentLoopData = $block_hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="relate-news-item">
                            <div class="relate-news-item-image">
                                <img src="<?php echo e($items->image ?? ''); ?>"
                                    alt="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>"
                                    title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>" />
                            </div>
                            <div class="relate-news-item-content">
                                <span class="date"> <?php echo e(date('d.M.Y', strTotime($items->updated_at))); ?> </span>
                                <a href="<?php echo e($items->alias); ?>"
                                    title="<?php echo e($items->json_params->name->{$locale} ?? $items->name); ?>"
                                    class="title"><?php echo e($items->json_params->name->{$locale} ?? $items->name); ?></a>
                                <p class="desc">
                                    <?php echo e($items->json_params->brief->{$locale} ?? $items->brief); ?>

                                </p>
                                <span class="author"> <?php echo app('translator')->get('By'); ?>: <?php echo e($items->admin_name); ?> </span>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="relate-news-interest">
                    <div class="relate-news-interest-image">
                        <img src="<?php echo e($block_pich->image ?? ''); ?>"
                            alt="<?php echo e($block_pich->json_params->name->{$locale} ?? $block_pich->name); ?>"
                            title="<?php echo e($block_pich->json_params->name->{$locale} ?? $block_pich->name); ?>" />
                    </div>
                    <div class="relate-news-interest-content">
                        <span class="date"><?php echo e(date('d.M.Y', strTotime($block_pich->updated_at))); ?></span>
                        <a href="<?php echo e(route('frontend.page', ['taxonomy' => $block_pich->alias ?? ''])); ?>"
                            title="<?php echo e($block_pich->json_params->name->{$locale} ?? $block_pich->name); ?>"
                            class="title"><?php echo e($block_pich->json_params->name->{$locale} ?? $block_pich->name); ?></a>
                        <p class="desc">
                            <?php echo e($block_pich->json_params->brief->{$locale} ?? $block_pich->brief); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/pages/post/category/default.blade.php ENDPATH**/ ?>