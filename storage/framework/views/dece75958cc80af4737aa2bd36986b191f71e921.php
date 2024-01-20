<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['product'];
        $params['user_id'] = $user_auth->id ?? '';
        // list product
        $rows = App\Models\CmsProduct::getsqlCmsProduct($params, $locale)
            ->limit(12)
            ->get();
        $paramater = App\Models\Parameter::get();

    ?>
    <section id="fhm-home-products-1" class="products">
        <div class="container">
            <div class="heading-block">
                <h2 class="title"><?php echo e($title); ?></h2>
                <p class="desc">
                    <?php echo e($brief); ?>

                </p>
            </div>
            <div class="products-content">
                <div class="products-content-image">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
                </div>
                <div class="products-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                $tag = $paramater->first(function ($item, $key) use ($keys, $val_tag) {
                                                    return $item->parent_id == $keys && $item->id == $val_tag;
                                                });
                                                $txt_tag = $tag->name ?? '';
                                            }
                                        }
                                    }
                                    $wishlist = isset($items->wishlist) && $items->wishlist > 0 ? 1 : 0;
                                ?>
                                <div class="swiper-slide">
                                    <div class="products-item">
                                        <div class="products-item-image">
                                            <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>" />
                                            <div class="products-content-info">
                                                <button class="wishlist-button" type="button">
                                                    <?php if($wishlist > 0): ?>
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="unwishlist add_wishlist"
                                                            data-id=<?php echo e($items->id); ?> />
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="wishlist add_wishlist"
                                                            data-id=<?php echo e($items->id); ?> />
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-dark-outline.svg')); ?>"
                                                            alt="Unwishlist" class="unwishlist add_wishlist"
                                                            data-id=<?php echo e($items->id); ?> />
                                                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/heart-red-solid.svg')); ?>"
                                                            alt="Wishlist" class="wishlist add_wishlist"
                                                            data-id=<?php echo e($items->id); ?> />
                                                    <?php endif; ?>
                                                </button>
                                                <span class="sale">-<?php echo e(number_format($percent)); ?>%</span>
                                            </div>
                                            <button type="button" data-id="<?php echo e($items->id); ?>"
                                                class="quickview-button">
                                                <?php echo app('translator')->get('Quick View'); ?>
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
                    <a href="<?php echo e($url_link); ?>" title="<?php echo e($url_link_title); ?>"
                        class="view-all-button"><?php echo e($url_link_title); ?></a>
                    <div class="slider-button-prev">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/cavet-l.svg')); ?>" alt="Prev" />
                    </div>
                    <div class="slider-button-next">
                        <img src="<?php echo e(asset('themes/frontend/assets/images/icon/cavet-r.svg')); ?>" alt="Next" />
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/blocks/cms_product/styles/xmas_holiday.blade.php ENDPATH**/ ?>