<?php if($component): ?>
    <?php
        $title = $component->json_params->title->{$locale} ?? $component->title;
        $brief = $component->json_params->brief->{$locale} ?? $component->brief;
        $image = $component->image != '' ? $component->image : null;
        // Filter all blocks by parent_id
        $component_childs = $all_components->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->id;
        });
    ?>
    <div class="col-lg-3 col-md-6">
        <div class="block block-menu">
            <h2 class="block-title"><?php echo e($title); ?></h2>
            <div class="block-content">
                <ul>
                    <?php if($component_childs): ?>
                        <?php $__currentLoopData = $component_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title_childs = $item->json_params->title->{$locale} ?? $item->title;
                                $brief_childs = $item->json_params->brief->{$locale} ?? $item->brief;
                                $image_childs = $item->image != '' ? $item->image : null;
                                $url_link = $item->url_link != '' ? $item->url_link : '';
                                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                            ?>
                            <li>
                                <a href="<?php echo e($url_link); ?>"><?php echo e($title_childs); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/components/header_default/header/layout/default.blade.php ENDPATH**/ ?>