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
    ?>

    <div id="fhm-products-content">
        <style>
            #fhm-products-banner {
                background: linear-gradient(180deg, #000 0%, rgba(0, 0, 0, 0.67) 0.01%, rgba(0, 0, 0, 0.12) 40.63%, rgba(0, 0, 0, 0.12) 68.75%, rgba(0, 0, 0, 0.76) 100%), url(<?php echo e($category_backgroud); ?>) center no-repeat;
                background-size: cover;
                padding: 269px 0 267px;
            }
        </style>
        <section id="fhm-products-banner" class="banner">
            <div class="container">
                <h1 class="banner-title"><?php echo e($category_brief); ?></h1>
            </div>
        </section>

        <section id="fhm-products">
            <div class="container">
                <div class="heading-block-m">
                    <h2 class="title"><?php echo e($category_description); ?></h2>
                </div>
                <div class="products-wrapper">
                    <div class="products-slider" role="tablist">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <div class="products-slide-item <?php echo e(Request::segment(2) == $val_taxonomy->alias ? 'active' : ''); ?>"
                                            id="<?php echo e(Str::slug($val_taxonomy->name)); ?>-tab" data-bs-toggle="tab"
                                            data-bs-target="#<?php echo e(Str::slug($val_taxonomy->name)); ?>-tab-pane" role="tab"
                                            aria-controls="<?php echo e(Str::slug($val_taxonomy->name)); ?>-tab-pane"
                                            aria-selected="false">
                                            <div class="image">
                                                <img src="<?php echo e($val_taxonomy->json_params->image); ?>"
                                                    alt="<?php echo e($val_taxonomy->name); ?>" title="<?php echo e($val_taxonomy->name); ?>" />
                                            </div>
                                            <p class="text">
                                                <?php echo e($val_taxonomy->json_params->name->{$locale} ?? $val_taxonomy->name); ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="slider-button-next slider-button-next-m">
                            <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.69231 1.23077L10 9.53847L1.69231 16.1846" stroke="#CF3031" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="slider-button-prev slider-button-prev-m">
                            <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3077 1.23077L2 9.53847L10.3077 16.1846" stroke="#CF3031" stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                    <div class="tab-content">
                        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $data_relationship['id'] = $val_taxonomy->id;
                                $list_product = App\Models\CmsRelationship::getCmsProduct($data_relationship)->paginate(App\Consts::PAGINATE['product']);
                            ?>

                            <div class="products-group tab-pane fade <?php echo e(Request::segment(2) == $val_taxonomy->alias ? 'active show' : ''); ?>"
                                id="<?php echo e(Str::slug($val_taxonomy->name)); ?>-tab-pane" role="tabpanel"
                                aria-labelledby="<?php echo e(Str::slug($val_taxonomy->name)); ?>-tab"
                                data-perpage="<?php echo e($list_product->withQueryString()->perPage()); ?>"
                                data-currentpage="<?php echo e($list_product->withQueryString()->currentPage()); ?>"
                                data-taxonomy="<?php echo e($val_taxonomy->id); ?>"
                                data-lastpage="<?php echo e($list_product->withQueryString()->lastPage()); ?>">

                                <ul class="products-list">
                                    <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="products-item">
                                            <div class="image">
                                                <img src="<?php echo e($item_product->image ?? ''); ?>"
                                                    alt="<?php echo e($item_product->json_params->name->{$locale} ?? $item_product->name); ?>"
                                                    title="<?php echo e($item_product->json_params->name->{$locale} ?? $item_product->name); ?>" />
                                            </div>
                                            <a href=" <?php echo e(route('frontend.page', ['taxonomy' => $item_product->alias ?? ''])); ?>"
                                                title="<?php echo e($item_product->json_params->name->{$locale} ?? $item_product->name); ?>"
                                                class="name"><?php echo e($item_product->name); ?></a>
                                            <span class="price"> $<?php echo e(number_format($item_product->price, 2)); ?> </span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php if($list_product->withQueryString()->currentPage() < $list_product->withQueryString()->lastPage()): ?>
                                    <button type="button" onclick="loadMore('.products-group','.products-list','product')" class="main-button-m">
                                        <?php echo app('translator')->get('View More'); ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/pages/product/category/default.blade.php ENDPATH**/ ?>