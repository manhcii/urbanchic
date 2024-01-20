<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>
    <section id="fhm-product-detail-faq" class="faq mb-5">
        <div class="container">
            <h2 class="faq-title"><?php echo e($title); ?></h2>
            <div class="accordion accordion-flush" id="faqAccordion">
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
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq-heading<?php echo e($items->id); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapse<?php echo e($items->id); ?>" aria-expanded="false"
                                    aria-controls="faq-collapse<?php echo e($items->id); ?>">
                                    <?php echo e($title_childs); ?>

                                </button>
                            </h3>
                            <div id="faq-collapse<?php echo e($items->id); ?>" class="accordion-collapse collapse"
                                aria-labelledby="faq-heading<?php echo e($items->id); ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <?php echo nl2br($content_childs); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/blocks/faq/styles/about_faq.blade.php ENDPATH**/ ?>