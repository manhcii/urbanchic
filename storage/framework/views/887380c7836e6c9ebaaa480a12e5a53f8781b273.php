
<?php $__env->startSection('content'); ?>
    <?php
        $seo_title = $seo_title ?? ($detail->json_params->seo_title->$locale ?? ($setting->{$locale . '-seo_title'} ?? ($setting->seo_title ?? '')));
        $seo_keyword = $seo_keyword ?? ($detail->json_params->seo_keyword->$locale ?? ($setting->{$locale . '-seo_keyword'} ?? ($setting->seo_keyword ?? '')));
        $seo_description = $seo_description ?? ($detail->json_params->seo_description->$locale ?? ($setting->{$locale . '-seo_description'} ?? ($setting->seo_description ?? '')));
        $seo_image = $seo_image ?? ($detail->json_params->image ?? (json_decode($setting->image)->seo_og_image ?? ''));
        $title = $detail->json_params->name->{$locale} ?? $detail->name;
        $image = $detail->image ?? '';
        if(isset($comment) && count( (array)$comment)>0) $comment_number = count((array)$comment);
        else $comment_number=0;
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

    <section class="page-banner page-banner-blog-detail">
        <div class="container">
            <img src="<?php echo e($image); ?>"
            alt="<?php echo e($title); ?> "
            title="<?php echo e($title); ?> " />
        </div>
    </section>

    <main class="page-blog-detail">
        <div class="container">
            <div class="blog-detail-wrap">
                <div class="blog-detail-main">
                    <h1><?php echo e($title); ?></h1>

                    <div class="blog-detail-action-info">
                        <div class="blog-detail-post">
                            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/blog-detail-post.svg')); ?>" alt="Post" title="Post">

                            <span><?php echo e($time); ?></span>
                        </div>

                        <div class="blog-detail-comment-quantity">
                            <img src="<?php echo e(asset('themes/frontend/assets/image/icons/blog-detail-comment.svg')); ?>" alt="Comment" title="Comment">      
                                                       
                            <span><?php echo e($comment_number>0?$comment_number:"No Comment"); ?></span>
                        </div>
                    </div>

                    <div class="blog-detail-content">
                        <?php echo $content; ?>

                    </div>

                    <div class="blog-detail-comment">
                        <h3>Leave a Commends</h3>
                        <form action="<?php echo e(route('frontend.comment')); ?>"method="post" id="blogComment">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id_post"value="<?php echo e($detail->id); ?>">
                            <div class="contact-form-row">
                                <div class="contact-form-line">
                                    <label for="nameBlogComment">Full Name</label>
                                    <input type="text" id="nameBlogComment" placeholder="Mars Phucs"
                                      name="name" required />
                                    <div class="clear-input d-none">
                                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                          fill="#C8C8C8"></path>
                                      </svg>
                                    </div>
                                </div>
        
                                <div class="contact-form-line">
                                    <label for="mailBlogComment">Email Address</label>
                                    <input type="email" name="email" id="mailBlogComment" placeholder="Marsphucs@gmail.com"
                                       required />
                                    <div class="clear-input d-none">
                                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                          d="M7.38593 16C7.77797 16 8.16965 16 8.56169 16C8.80162 15.965 9.04192 15.9346 9.28078 15.8943C11.2752 15.5561 12.9405 14.6182 14.1902 13.0282C15.9833 10.7468 16.4739 8.1725 15.5295 5.42536C14.5351 2.5325 12.4614 0.783926 9.47216 0.142855C9.17224 0.0785694 8.86518 0.0471411 8.56169 0.000354767H7.42164C7.39379 0.00964069 7.36629 0.0221405 7.33773 0.0274973C6.83144 0.118212 6.31372 0.168569 5.81992 0.304641C1.40539 1.52071 -1.10358 6.35321 0.474568 10.6632C1.51429 13.5025 3.56124 15.2254 6.51331 15.8589C6.80109 15.9207 7.09494 15.9536 7.38593 16ZM7.1892 8.00428C7.13243 7.94393 7.08923 7.89607 7.04388 7.85036C6.42333 7.21857 5.80136 6.58786 5.18224 5.95464C4.99086 5.75893 4.95587 5.48786 5.08155 5.26571C5.20152 5.05393 5.44145 4.935 5.68889 5.00286C5.81278 5.03714 5.93739 5.11786 6.02987 5.21C6.54866 5.725 7.05781 6.25 7.57017 6.77143C7.70656 6.91036 7.84367 7.04857 7.98756 7.19393C8.04576 7.13857 8.09324 7.09536 8.13859 7.05C8.76021 6.4275 9.38004 5.80321 10.0031 5.18214C10.2837 4.9025 10.6758 4.92107 10.9021 5.21821C11.0871 5.46071 11.0546 5.76107 10.8097 6.00428C10.177 6.6325 9.54178 7.25821 8.90802 7.88536C8.8716 7.92143 8.83911 7.96178 8.80805 7.99643C9.02442 8.21821 9.22901 8.43286 9.43931 8.64214C9.89455 9.09464 10.3566 9.54071 10.8082 9.99679C11.1449 10.3368 11.0089 10.8682 10.5608 10.9846C10.3319 11.0443 10.1434 10.9621 9.98131 10.7989C9.36505 10.1793 8.74664 9.56214 8.13216 8.94071C8.08789 8.89571 8.07075 8.82393 8.03969 8.7625C7.94721 8.85 7.91615 8.8775 7.88723 8.90643C7.27418 9.52071 6.66041 10.1343 6.04879 10.75C5.89776 10.9021 5.72566 10.9957 5.50786 10.9536C5.28792 10.9107 5.13439 10.7832 5.06405 10.5632C4.98836 10.3257 5.06512 10.1314 5.23222 9.96393C5.87848 9.31571 6.52545 8.66857 7.18813 8.00464L7.1892 8.00428Z"
                                          fill="#C8C8C8"></path>
                                      </svg>
                                    </div>
                                </div>
        
                                <div class="contact-form-line contact-form-line-full">
                                    <label for="messageBlogComment">Description</label>
                                    <textarea name="comment" id="messageBlogComment" cols="30" rows="10" placeholder="What’s your thought about this blog..."></textarea>
                                  </div>
                            </div> 
        
                            <button type="submit" form="blogComment" class="button-main">Post Commends</button>
                        </form>
        
                        <h3>Commends</h3>
                        <div class="list-comment">
                            <?php if(isset($comment) && count( (array)$comment)>0): ?>
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="comment-item">
                                    <img src="<?php echo e(asset('themes/frontend/assets/image/blogs/blog-detail-human.png')); ?>" alt="Annette White" title="Annette White">
                                    <div class="comment-item-detail">
                                        <div class="comment-item-info">
                                            <span class="comment-name"><?php echo e($val->name??""); ?></span>
                                            <span>•</span>
                                            <span class="comment-post"><?php echo e(date('d M, Y', strtotime($val->created_at))); ?></span>
                                        </div>
                                        <p class="comment-item-content">
                                            <?php echo e($val->comment??""); ?>

                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
        
                        <button class="view-more" title="Load More">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7656 7.78906H17.5156V4.03906" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M5.14062 5.14063C5.77843 4.50189 6.53591 3.99516 7.36973 3.64942C8.20355 3.30369 9.09734 3.12573 10 3.12573C10.9027 3.12573 11.7965 3.30369 12.6303 3.64942C13.4641 3.99516 14.2216 4.50189 14.8594 5.14063L17.5156 7.78906" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.23438 12.2109H2.48438V15.9609" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.8594 14.8594C14.2216 15.4981 13.4641 16.0048 12.6303 16.3506C11.7965 16.6963 10.9027 16.8743 10 16.8743C9.09735 16.8743 8.20355 16.6963 7.36973 16.3506C6.53591 16.0048 5.77843 15.4981 5.14063 14.8594L2.48438 12.2109" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Load More
                        </button>
                    </div>
                </div>

                <aside class="blog-sidebar">
                    <?php if(isset($widget->sidebar)): ?>
                        <?php if(\View::exists('frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout)): ?>
                            <?php echo $__env->make('frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo e('View: frontend.widgets.sidebar.' . $widget->sidebar->json_params->layout . ' do not exists!'); ?>

                        <?php endif; ?>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
    nonce="6qFDskaj"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/pages/post/detail/default.blade.php ENDPATH**/ ?>