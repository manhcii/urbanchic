<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $title = $detail->json_params->name->{$locale} ?? $detail->name;
        $image = $detail->image ?? '';
        $gallery_image = $detail->json_params->gallery_image ?? [];
        $time = date('M d, Y', strtotime($detail->created_at));
        $content = $detail->json_params->content->{$locale} ?? 'Chưa cập nhật';
        $link = route('frontend.page', ['taxonomy' => $detail->alias ?? '']);

        $time_name = '0 sec';
        $etime = time() - strTotime($detail->created_at);
        if ($etime > 1) {
            foreach (App\Consts::SET_TIME as $secs => $str) {
                $d = $etime / $secs;
                if ($d >= 1) {
                    $r = round($d);
                    $time_name = $r . ' ' . ($r > 1 ? __(App\Consts::TIME_NAME[$str]) : __($str));
                    break;
                }
            }
        }

        $params['status'] = App\Consts::STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::TAXONOMY['post'];
        $params['different_id'] = $detail->id;
        $rows = App\Models\CmsPost::getsqlCmsPost($params)
            ->limit(9)
            ->get();

    ?>


    <section id="fhm-blog-detail-breadcrumb" class="breadcrumb">
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
                <span lass="breadcrumb-link-current"><?php echo e($title); ?>

                </span>
            </div>
        </div>
    </section>

    <section id="fhm-blog-detail">
        <div class="container">
            <div class="blog-detail-wrapper">
                <div class="blog-detail">
                    <h1 class="title">
                        <?php echo e($title); ?>

                    </h1>
                    <div class="info">
                        <span class="author"> <?php echo e($detail->admin_name); ?> </span>
                        <span class="separate"></span>
                        <span class="publish">
                            <?php echo e($time); ?> <span> (<?php echo e($time_name); ?> <?php echo app('translator')->get('ago'); ?>)</span>
                        </span>
                    </div>
                    <div class="content_posts">
                        <?php echo $content; ?>

                    </div>
                    <?php if(count($gallery_image) > 0): ?>
                        <div class="image-wrapper">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php $__currentLoopData = $gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <div class="image">
                                                <img src="<?php echo e($val_img); ?>" alt="Image" />
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <ul class="share-list">
                        <li class="">
                            <?php echo app('translator')->get('Share'); ?>:
                        </li>
                        <li class="share-item">
                            <a target="b_lank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($link); ?>"
                                title="Facebook" class="share-button share-facebook">
                                <span class="icon">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/fb (2).svg')); ?>"
                                        alt="Facebook" />
                                </span>
                                <?php echo app('translator')->get('Facebook'); ?>
                            </a>
                        </li>
                        <li class="share-item">
                            <a target="b_lank"
                                href="https://www.pinterest.com/pin/create/button/?url=(<?php echo e($link); ?>)&media=(image)&description=(excerpt)"
                                title="Pinterest" class="share-button">
                                <span class="icon">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/pinterest-2.svg')); ?>"
                                        alt="Pinterest" />
                                </span>
                                <?php echo app('translator')->get('Pinterest'); ?>
                            </a>
                        </li>
                        <li class="share-item">
                            <a target="b_lank" href="https://www.instagram.com/sharer.php?u=<?php echo e($link); ?>"
                                title="Instagram" class="share-button">
                                <span class="icon">
                                    <img src="<?php echo e(asset('themes/frontend/assets/images/icon/ig-2.svg')); ?>"
                                        alt="Instagram" />
                                </span>
                                <?php echo app('translator')->get('Instagram'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
                    <div class="blog-relate news">
                        <h2 class="title"><?php echo app('translator')->get('Related Blogs'); ?></h2>
                        <ul class="blog-relate-list">
                            <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_childs = $items->json_params->name->{$locale} ?? $items->name;
                                    $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                                    $image_childs = $items->image ?? '';
                                    $time_childs = date('M d, Y', strtotime($items->created_at));
                                    $link_childs = route('frontend.page', ['taxonomy' => $items->alias ?? '']);

                                ?>
                                <li class="blog-relate-item">
                                    <div class="news-item">
                                        <div class="news-item-image">
                                            <img src="<?php echo e($image_childs); ?>" alt="<?php echo e($title_childs); ?>" />
                                        </div>
                                        <span class="news-item-publish">
                                            <?php echo e($time_childs); ?>

                                        </span>
                                        <a href="#" title="<?php echo e($title_childs); ?>"
                                            class="news-item-title"><?php echo e($title_childs); ?></a>
                                        <p class="news-item-desc">
                                            <?php echo e($brief_childs); ?>

                                        </p>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if(isset($rows) && count($rows) > 0): ?>
        <section id="fhm-blog-detail-news" class="news">
            <div class="container">
                <div class="heading-block">
                    <h2 class="title"><?php echo app('translator')->get('News & Resources'); ?></h2>
                </div>
                <div class="news-slider">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $title_childs = $items->json_params->name->{$locale} ?? $items->name;
                                    $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                                    $image_childs = $items->image ?? '';
                                    $time_childs = date('M d, Y', strtotime($items->created_at));
                                    $link_childs = route('frontend.page', ['taxonomy' => $items->alias ?? '']);

                                ?>
                                <div class="swiper-slide">
                                    <div class="news-item">
                                        <div class="news-item-image">
                                            <img src="<?php echo e($image_childs); ?>"
                                                alt="<?php echo e($title_childs); ?>" />
                                        </div>
                                        <span class="news-item-publish">
                                            <?php echo e($time_childs); ?>

                                        </span>
                                        <a href="<?php echo e($link_childs); ?>" title="<?php echo e($title_childs); ?>"
                                            class="news-item-title"><?php echo e($title_childs); ?></a>
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

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/pages/post/detail/default.blade.php ENDPATH**/ ?>