<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $map = $block->json_params->map ?? "";
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

<section class="section section-padding contact-background m-b-0">
    <div class="section-container small">
        <!-- Block Contact Form -->
        <div class="block block-contact-form">
            <div class="block-widget-wrap">
                <div class="block-title">
                    <h2><?php echo e($title); ?></h2>
                    <div class="sub-title"><?php echo e($brief); ?></div>
                </div>
                <div class="block-content">
                    <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post" class="contact-form form_ajax" >
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="is_type" value="contact">
                        <div class="contact-us-form">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label class="required">Name</label><br>
                                    <span class="form-control-wrap">
                                        <input type="text" name="name" value="" size="40" class="form-control"  required >
                                    </span>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label class="required">Email</label><br>
                                    <span class="form-control-wrap">
                                        <input type="email" name="email" value="" size="40" class="form-control"  required >
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="required">Message</label><br>
                                    <span class="form-control-wrap">
                                        <textarea name="content" cols="40" rows="10" class="form-control"  required ></textarea>
                                    </span>
                                </div>
                            </div>
                            <div class="form-button">
                                  <input type="submit" value="Submit" class="button"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/frontend/blocks/contact/styles/form_questions.blade.php ENDPATH**/ ?>