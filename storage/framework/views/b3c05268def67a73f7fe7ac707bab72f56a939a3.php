<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);

        $page_title = $detail->json_params->name->{$locale} ?? $detail->name;
        $page_brief = $detail->json_params->brief->{$locale} ?? $detail->brief;
        $page_description = $detail->json_params->description->{$locale} ?? $detail->description;
        $page_content = $detail->json_params->content->{$locale} ?? $detail->content;
        $page_image = $detail->image != '' ? $detail->image : $setting->background_breadcrumbs;
        $page_backgroud = $detail->image_thumb != '' ? $detail->image_thumb : $setting->background_breadcrumbs;
        $gallery_image = $detail->json_params->gallery_image ?? [];
        $price = $detail->price != '' ? $detail->price : 0;
        $price_old = $detail->price_old != '' ? $detail->price_old : 0;
        $txt_tag = '';
        $arr_color = [];
        if (isset($detail->json_params->paramater)) {
            foreach ($detail->json_params->paramater as $keys => $value) {
                if (isset($value->childs) && $value->name == 'type') {
                    $val_tag = $value->childs[0];
                    $tag = $parameter->first(function ($item, $key) use ($keys, $val_tag) {
                        return $item->parent_id == $keys && $item->id == $val_tag;
                    });
                    $txt_tag = $tag->name ?? '';
                }
                if (isset($value->childs) && $value->name == 'color') {
                    $arr_id = $value->childs;
                    $arr_color = $parameter->filter(function ($item, $key) use ($keys, $arr_id) {
                        return $item->parent_id == $keys && in_array($item->id, $arr_id);
                    });
                }
            }
        }

    ?>
    <section id="fhm-product-detail-breadcrumb" class="breadcrumb">
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
                <span class="breadcrumb-link breadcrumb-link-current"><?php echo e($page_title); ?></span>
            </div>
        </div>
    </section>
    <section id="fhm-product-detail" class="detail">
        <div class="container">
            <div class="detail-container d-flex">
                <div class="detail-image">
                    <div class="gallery gallery-detail">
                        <ul class="gallery-thumbnail">
                            <?php if(count((array) $gallery_image) > 0): ?>
                                <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="gallery-thumbnail-item <?php echo e($loop->index == 0 ? 'active' : ''); ?>"
                                        data-color="<?php echo e($val->color ?? ''); ?>">
                                        <div class="gallery-thumbnail-img">
                                            <img src="<?php echo e($val->img); ?>" alt="Image" title="Image" />
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                        <div class="gallery-view"></div>
                    </div>
                </div>
                <div class="detail-right item_product">
                    <div class="detail-info product">
                        <div class="detail-info-heading product-info">
                            <div class="product-type"><?php echo e($txt_tag); ?></div>
                            <h2 class="product-name"><?php echo e($page_title); ?></h2>
                        </div>

                        <div class="detail-info-price product-info">
                            <div class="product-price">
                                <span
                                    class="current"><?php echo e($lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'}); ?>

                                    <?php echo e(number_format($price, 2)); ?></span>
                                <?php if($price_old != 0): ?>
                                    <span
                                        class="old"><?php echo e($lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'}); ?>

                                        <?php echo e(number_format($price_old, 2)); ?></span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="detail-variant">
                        <ul class="detail-variant-list variant-size-list d-flex">
                            <?php if(count($arr_color) > 0): ?>
                                <?php $__currentLoopData = $arr_color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="detail-variant-item">
                                        <label>
                                            <input type="radio" name="color"
                                                value="<?php echo e($item_color->propety_value); ?>" />
                                            <?php echo e($item_color->json_params->name->{$locale} ?? $item_color->name); ?>

                                        </label>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="detail-cart cart-product">
                        <h6><?php echo app('translator')->get('Quantity'); ?></h6>
                        <div class="cart-quantity detail-cart-quantity">
                            <div class="cart-quantity-form detail-cart-quantity-form">
                                <input type="button" value="-" class="qtyminus minus" field="quantity" />
                                <input type="text" name="quantity" value="1" class="qty"
                                    onchange="if(this.value == 0)this.value=1;" />
                                <input type="button" value="+" class="qtyplus plus" field="quantity" />
                            </div>
                        </div>
                    </div>
                    <button class="button-solid detail-submit add-to-cart" data-id="<?php echo e($detail->id); ?>">
                        <?php echo app('translator')->get('Add to cart'); ?>
                    </button>
                    <p class="detail-des">
                        <?php echo e($page_brief); ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="fhm-product-detail-content" class="tabs">
        <div class="container">
            <ul class="tabs-list d-flex align-items-center" role="tablist">
                <li class="tabs-item active" data-content="description" role="presentation">
                    <p class="text active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description"
                        type="button" role="tab" aria-controls="description" aria-selected="true">
                        <?php echo app('translator')->get('Content'); ?>
                    </p>
                </li>
            </ul>
            <div class="tab-content tabs-content" id="tabs-content">
                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <?php echo nl2br($page_content); ?>

                </div>
            </div>
        </div>
    </section>

    <?php if(isset($relatedPosts)): ?>
        <section id="fhm-product-detail-relate" class="relate-products products">
            <div class="container">
                <div class="heading-block">
                    <h2 class="title"><?php echo app('translator')->get('May you also like?'); ?></h2>
                </div>
                <div class="relate-products-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_child = $items->json_params->name->{$locale} ?? $items->name;
                                    $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                                    $content_child = $items->json_params->content->{$locale} ?? $items->content;
                                    $image_child = $items->image_thumb != '' ? $items->image_thumb : ($items->image != '' ? $items->image : 'data/images/no_image.jpg');
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
                                ?>

                                <div class="swiper-slide">
                                    <div class="products-item">
                                        <div class="products-item-image">
                                            <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                                            <div class="products-content-info">
                                                <span class="sale">-<?php echo e(number_format($percent)); ?>%</span>
                                            </div>
                                            <button type="button" data-id="<?php echo e($items->id); ?>"
                                                class="quickview-button add-to-cart">
                                                <?php echo app('translator')->get('Add to cart'); ?>
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
                                                <?php if($price_old != 0): ?>
                                                    <span
                                                        class="old"><?php echo e($lang_default == $locale ? $setting->currency_unit : $setting->{$locale . '-currency_unit'}); ?>

                                                        <?php echo e(number_format($price_old, 2)); ?></span>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        const handleGalleryView = (el) => {
            const galleryViewDetail = document.querySelector(
                `${el} .gallery-detail .gallery-view`
            );
            const src = document
                .querySelector(".gallery-detail .gallery-thumbnail-item.active img")
                .getAttribute("src");
            const alt = document
                .querySelector(".gallery-detail .gallery-thumbnail-item.active img")
                .getAttribute("alt");
            galleryViewDetail.innerHTML = `<img src="${src}" alt="${alt}"/>`;

            const galleryThumbnailsDetail = document.querySelectorAll(
                ".gallery-detail .gallery-thumbnail-item"
            );
            const colorsOption = document.querySelectorAll(
                ".detail .detail-variant .detail-variant-item label input"
            );

            const galleryArrDetail = Array.prototype.slice.call(
                galleryThumbnailsDetail
            );
            const colorArr = Array.prototype.slice.call(colorsOption);
            galleryArrDetail.forEach((item) => {
                item.addEventListener("click", (e) => {
                    galleryArrDetail.forEach((thumbnail) => {
                        if (thumbnail !== e.target) {
                            thumbnail.classList.remove("active");
                        }
                    });

                    item.classList.add("active");

                    if (item.querySelector("img")) {
                        const srcView = item.querySelector("img").getAttribute("src");
                        const altView = item.querySelector("img").getAttribute("alt");
                        galleryViewDetail.innerHTML = `<img src="${srcView}" alt="${altView}"/>`;
                    }

                });

                colorArr.forEach((color) => {
                    color.addEventListener("click", () => {
                        const colorCurrent = color.getAttribute("value");
                        if (
                            item.hasAttribute("data-color") &&
                            item.getAttribute("data-color") == colorCurrent
                        ) {
                            document
                                .querySelector(
                                    ".gallery-detail .gallery-thumbnail-item.active"
                                )
                                .classList.remove("active");
                            item.classList.add("active");
                            if (item.querySelector("img")) {
                                const srcView = item
                                    .querySelector("img")
                                    .getAttribute("src");
                                const altView = item
                                    .querySelector("img")
                                    .getAttribute("alt");
                                galleryViewDetail.innerHTML =
                                    `<img src="${srcView}" alt="${altView}"/>`;
                            }
                        }
                    });
                });
            });
        };
        if (
            document.querySelector("#fhm-product-detail .gallery-detail .gallery-view")
        ) {
            handleGalleryView("#fhm-product-detail");
        }

        handleGalleryView("");
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/pages/product/detail/default.blade.php ENDPATH**/ ?>