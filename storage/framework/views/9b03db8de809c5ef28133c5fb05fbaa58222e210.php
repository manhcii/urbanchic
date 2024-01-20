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
        $category_backgroud = $page->json_params->image_thumb != '' ? $page->json_params->image_thumb : ($setting->background_breadcrumbs??'');

    ?>




    <section id="fhm-lp2-breadcrumb" class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-list">
                <a href="<?php echo e(route('home.default')); ?>" title="<?php echo app('translator')->get('Home'); ?>" class="breadcrumb-link"><?php echo app('translator')->get('Home'); ?></a>
                <div class="breadcrumb-arrow">
                    <svg width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.64526 4.49898C3.58546 4.44862 3.54769 4.4203 3.51307 4.38568C2.39577 3.26838 1.27532 2.15108 0.161169 1.03063C0.0919282 0.961387 0.0352768 0.866968 0.0100982 0.772548C-0.0308171 0.627771 0.0573075 0.470405 0.189495 0.394869C0.321683 0.319333 0.488491 0.328774 0.611237 0.426342C0.649004 0.454668 0.680478 0.489288 0.715099 0.52391C1.92997 1.73878 3.14483 2.95364 4.36285 4.16851C4.5989 4.40456 4.5989 4.5934 4.366 4.8263C3.13854 6.05376 1.91108 7.27807 0.686773 8.50553C0.570322 8.62198 0.441282 8.68807 0.274473 8.63771C0.0195399 8.56218 -0.0780273 8.26004 0.0824863 8.04916C0.110812 8.0114 0.145433 7.97992 0.180054 7.9453C1.29421 6.83115 2.41151 5.71385 3.52566 4.5997C3.55399 4.56822 3.59175 4.54304 3.64526 4.49898Z"
                            fill="#616161" />
                    </svg>
                </div>
                <span class="breadcrumb-link breadcrumb-link-current"><?php echo e($category_title); ?></span>
            </div>
        </div>
    </section>

    <?php if($category_backgroud != ''): ?>
        <style>
            #fhm-lp2-banner .banner-wrapper {
                background: url(<?php echo e($category_backgroud); ?>) no-repeat center;
                background-size: cover;
                border-radius: 5px;
                height: 250px;
                position: relative;
                padding-right: 20px;
            }
        </style>
        <section id="fhm-lp2-banner">
            <div class="container">
                <div class="banner-wrapper">
                    <div class="heading-block">
                        <h1 class="title"><?php echo e($category_title); ?></h1>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <section id="fhm-list-product-products" class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <div class="products-filter-list">
                        <div class="products-filter-toggle-button-close">&#10005;</div>
                        <div class="products-filter-item">
                            <div class="products-filter-item-heading d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse" data-bs-target="#filter-type">
                                <h2 class="heading">
                                    <?php echo app('translator')->get('Type'); ?> <span class="quantity">(<?php echo e(count($taxonomys)); ?>)</span>
                                </h2>
                                <div class="icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <div id="filter-type" class="collapse show">
                                <ul class="products-filter-item-criteria" data-type="checkbox">
                                    <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $val->alias ?? ''])); ?>"
                                                class="text <?php echo e(Request::segment(2)==$val->alias ?'active':''); ?>">
                                                <p>
                                                    <?php echo e($val->json_params->name->{$locale} ?? $val->name); ?>

                                                    <span class="quantity">(<?php echo e(number_format($val->count_post)); ?>)</span>
                                                </p>
                                            </a>

                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="products-list">
                        <div class="products-filter-toggle-button main-btn">Filter</div>
                        <div class="products-list-sort d-flex justify-content-between align-items-center">
                            <p class="products-list-sort-result">
                                <strong>1 - <?php echo e(App\Consts::PAGINATE[$page->taxonomy]); ?></strong> <?php echo app('translator')->get('of'); ?>
                                <strong><?php echo e($rows->total()); ?></strong> <?php echo app('translator')->get('Results'); ?>
                            </p>
                        </div>
                        <div class="products-container">
                            <?php if(count($rows) > 0): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_child = $items->json_params->name->{$locale} ?? $items->name;
                                        $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                                        $content_child = $items->json_params->content->{$locale} ?? $items->content;
                                        $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                                        $price = $items->price != '' ? $items->price : 0;
                                        $price_old = $items->price_old != '' ? $items->price_old : 0;
                                        $percent = null;
                                        if ($price_old != 0 && $price != 0) {
                                            $percent = (($price_old - $price) / $price) * 100;
                                        }
                                        $time = date('d.M.Y', strtotime($items->updated_at));
                                        $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                                        $txt_tag = '';
                                        if (isset($items->json_params->paramater)) {
                                            foreach ($items->json_params->paramater as $keys => $value) {
                                                if (isset($value->childs) && $value->name == 'type') {
                                                    $val_tag = $value->childs[0];
                                                    $tag = $parameter->first(function ($item, $key) use ($keys, $val_tag) {
                                                        return $item->parent_id == $keys && $item->id == $val_tag;
                                                    });
                                                    $txt_tag = $tag->name ?? '';
                                                }
                                            }
                                        }
                                        $wishlist = isset($items->wishlist) && $items->wishlist > 0 ? 1 : 0;
                                    ?>
                                    <div class="products-item">
                                        <div class="products-item-image">
                                            <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                                            <div class="products-content-info">
                                                <button class="wishlist-button" type="button">
                                                    <?php if($wishlist > 0): ?>
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="unwishlist add_wishlist" data-id=<?php echo e($items->id); ?> />
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="wishlist add_wishlist" data-id=<?php echo e($items->id); ?> />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-dark-outline.svg')); ?>"
                                                            alt="Unwishlist" class="unwishlist add_wishlist"
                                                            data-id=<?php echo e($items->id); ?> />
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="wishlist add_wishlist" data-id=<?php echo e($items->id); ?> />
                                                    <?php endif; ?>
                                                </button>
                                                <span class="sale">-<?php echo e(number_format($percent)); ?>%</span>
                                            </div>
                                            <button type="button" data-id="<?php echo e($items->id); ?>"
                                                class="quickview-button ">
                                                <?php echo app('translator')->get('Quickview'); ?>
                                            </button>
                                        </div>
                                        <div class="products-item-content">
                                            <span class="badge"> <?php echo e($txt_tag); ?> </span>
                                            <a href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>"
                                                class="title"><?php echo e($title_child); ?></a>
                                            <div class="price">
                                                <span
                                                    class="current"><?php echo e($lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'}); ?>

                                                    <?php echo e(number_format($price, 2)); ?></span>
                                                <span
                                                    class="old"><?php echo e($lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'}); ?>

                                                    <?php echo e(number_format($price_old, 2)); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        <div class="products-list-pagination d-flex justify-content-between align-items-center">
                            <p class="products-list-pagination-result">
                                <?php echo app('translator')->get('Total'); ?> <strong><?php echo e($rows->perPage()); ?></strong> <?php echo app('translator')->get('of'); ?>
                                <strong><?php echo e(number_format($rows->total())); ?></strong> <?php echo app('translator')->get('Resutls'); ?>
                            </p>
                            <?php echo e($rows->withQueryString()->links('frontend.pagination.default')); ?>

                        </div>

                        <div class="products-list-guide">
                            <h2 class="heading"><?php echo e($category_description); ?></h2>
                            <div class="products-list-guide-content show_content">
                                <?php echo nl2br($category_content); ?>

                                <div class="products-list-guide-more"></div>
                            </div>

                            <div class="products-list-guide-btn load_more">
                                <span><?php echo app('translator')->get('Show More'); ?></span>
                                <svg width="10" height="6" viewBox="0 0 10 6" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.00097 4.65477C5.06156 4.58281 5.09565 4.53736 5.13731 4.4957C6.48184 3.15118 7.82636 1.80287 9.17468 0.462127C9.258 0.378804 9.37162 0.310632 9.48524 0.280333C9.65946 0.231097 9.84883 0.337143 9.93973 0.496214C10.0306 0.655284 10.0193 0.856016 9.90186 1.00372C9.86777 1.04917 9.82611 1.08705 9.78445 1.12871C8.32251 2.59064 6.86058 4.05258 5.39864 5.5183C5.11459 5.80235 4.88735 5.80235 4.60708 5.52209C3.12999 4.045 1.6567 2.56792 0.179613 1.09462C0.0394789 0.954489 -0.0400562 0.799206 0.0205421 0.598474C0.11144 0.291695 0.475029 0.174285 0.728785 0.367442C0.774234 0.401529 0.812108 0.44319 0.853769 0.484852C2.19451 1.82559 3.53903 3.17011 4.87977 4.51085C4.91764 4.54494 4.94794 4.59039 5.00097 4.65477Z"
                                        fill="#616161" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/pages/product/category/default.blade.php ENDPATH**/ ?>