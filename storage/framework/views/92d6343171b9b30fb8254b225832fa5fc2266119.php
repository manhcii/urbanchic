


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

  <div class="page-bloglist">
      <div class="container">
          <div class="page-title text-center">
            <h1><?php echo e($category_title); ?></h1>
            <p>
              <?php echo e($category_brief); ?>

            </p>
          </div>
          <?php if($page->sub_taxonomy_id != 0 && $page->sub_taxonomy_id != null): ?>
          <?php
          $list_sub_taxonomy_id=explode(',', $page->sub_taxonomy_id);
          $count=0;
          ?>
          <ul class="bloglist-tabs" role="tablist">
            <?php $__currentLoopData = $list_sub_taxonomy_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $params['id']= $item;
                $params['status']=App\Consts::TAXONOMY_STATUS['active'];
                $params['taxonomy'] = App\Consts::TAXONOMY['post'];
                $taxo= App\Models\PostCategory::getSqlTaxonomy($params)->first();
                ?>
                <?php if($taxo): ?>
                <?php
                  $count++;
                ?>
                <li class="bloglist-tab " role="presentation">
                  <button class="nav-link <?php echo e($count==1 ?" active": ""); ?>" data-bs-toggle="tab" data-bs-target="#bloglist-tab-<?php echo e($item); ?>" type="button" role="tab"
                    aria-controls="bloglist-tab-<?php echo e($item); ?>" aria-selected="true">
                    <?php echo e($taxo->name ??""); ?>

                  </button>
                </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <?php endif; ?>
          <div class="page-bloglist-wrap">
            <div class="page-bloglist-main">
              <div class="title-module">
                <h3>Recent posts</h3>
              </div>

              <div class="tab-content bloglist-tabs-content">
                <?php
                $list_sub_taxonomy_id=explode(',', $page->sub_taxonomy_id);
                $count=0;
                ?>
                 <?php $__currentLoopData = $list_sub_taxonomy_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $params['id']= $item;
                    $params['status']=App\Consts::TAXONOMY_STATUS['active'];
                    $params['taxonomy'] = App\Consts::TAXONOMY['post'];
                    $taxo= App\Models\PostCategory::getSqlTaxonomy($params)->first();
                    ?>
                    <?php if($taxo): ?>
                    <?php
                      $count++;
                    ?>
                    <div class="tab-pane fade <?php echo e($count==1 ?"show active": ""); ?>" id="bloglist-tab-<?php echo e($item); ?>" role="tabpanel" aria-labelledby="bloglist-tab-<?php echo e($item); ?>" tabindex="0">
                      <div class="blog-list">
                        <?php if(count($rows) > 0): ?>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $title_child = $items->json_params->name->{$locale} ?? $items->name;
                            $brief_child = $items->json_params->brief->{$locale} ?? $items->brief;
                            $content_child = $items->json_params->content->{$locale} ?? $items->content;
                            $image_child = $items->image != '' ? $items->image : 'data/images/no_image.jpg';
                            
                            $time = date('M d, Y', strtotime($items->updated_at));
                            $alias = route('frontend.page', ['taxonomy' => $items->alias ?? '']);
                            ?>
                                <?php if(in_array($item." ",explode(',', $items->taxonomy_id))): ?>
                                <div class="blog-item">
                                  <a href="<?php echo e($alias); ?>" class="blog-item-image">
                                    <img src="<?php echo e($image_child); ?>" alt="<?php echo e($title_child); ?>"
                                      title="<?php echo e($title_child); ?>" />
                                  </a>

                                  <div class="blog-item-info">
                                    <div class="blog-item-post">
                                      <a class="blog-item-topic" href="" title="Drinks" style="--color: #EA2828"><?php echo e($items->taxonomy_name??""); ?></a>
                                      <span><?php echo e($time); ?></span>
                                    </div>

                                    <a class="blog-item-name" href="<?php echo e($alias); ?>" title="<?php echo e($title_child); ?>"><?php echo e($title_child); ?></a>

                                    <div class="blog-item-line"></div>

                                    <p class="blog-item-des">
                                      <?php echo e($brief_child); ?>

                                    </p>

                                    <a class="blog-item-share" href="#" title="Share">
                                      <img src="<?php echo e(asset('themes/frontend/assets/image/icons/bloglist-icon-share.svg')); ?>" alt="Share" title="Share">
                                      Share
                                    </a>
                                  </div>
                                </div>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
            <?php echo e($rows->withQueryString()->links('frontend.pagination.default')); ?>

          </div>
      </div>
  </div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
    nonce="6qFDskaj"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/pages/post/category/default.blade.php ENDPATH**/ ?>