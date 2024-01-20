<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? '';
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section class="section section-padding m-b-70">
        <div class="section-container">
            <!-- Block Contact Info -->
            <div class="block block-contact-info">
                <div class="block-widget-wrap">
                    <div class="info-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            class="svg-icon2 plant" x="0" y="0" viewBox="0 0 512 512"
                            style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m320.174 28.058a8.291 8.291 0 0 0 -7.563-4.906h-113.222a8.293 8.293 0 0 0 -7.564 4.907l-66.425 148.875a8.283 8.283 0 0 0 7.564 11.655h77.336v67.765a20.094 20.094 0 1 0 12 0v-67.765h27.7v288.259h-48.441a6 6 0 0 0 0 12h108.882a6 6 0 0 0 0-12h-48.441v-288.259h117.04a8.284 8.284 0 0 0 7.564-11.657zm-103.874 255.567a8.094 8.094 0 1 1 8.094-8.093 8.1 8.1 0 0 1 -8.094 8.093zm-77.61-107.036 63.11-141.437h108.4l63.11 141.437z"
                                    fill="" data-original="" style=""></path>
                            </g>
                        </svg>
                    </div>
                    <div class="info-title">
                        <h2><?php echo e($title); ?></h2>
                    </div>
                    <div class="info-items">
                        <div class="row">
                            <?php if($block_childs): ?>
                                <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                                        $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                                        $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                                        $url_link = $items->url_link != '' ? $items->url_link : '';
                                        $url_link_title = $items->json_params->url_link_title->{$locale} ?? $items->url_link_title;
                                        $block_childs2 = $blocks->filter(function ($item, $key) use ($items) {
                                            return $item->parent_id == $items->id;
                                        });
                                    ?>
                                    <div class="col-md-4 sm-m-b-30">
                                        <div class="info-item">
                                            <div class="item-tilte">
                                                <h2><?php echo e($title_childs); ?></h2>
                                            </div>
                                            <div class="item-content small-width">
                                                <?php if($block_childs2): ?>
                                                    <?php $__currentLoopData = $block_childs2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $title_childs = $items->json_params->title->{$locale} ?? $items->title;
                                                            $brief_childs = $items->json_params->brief->{$locale} ?? $items->brief;
                                                            $content_childs = $items->json_params->content->{$locale} ?? $items->content;
                                                        ?>
                                                        <p><?php echo e($content_childs); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/contact/styles/needhelp.blade.php ENDPATH**/ ?>