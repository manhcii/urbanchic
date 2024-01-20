


    <?php if(isset($menu)): ?>
        <?php
            $menu_childs = $menu->filter(function ($item, $key) use ($component) {
                return $item->parent_id == $component->json_params->menu_id;
            });
        ?>
        <nav class="header-nav">
            <?php if(isset($menu_childs)): ?>
                <ul class="header-nav-list">
                    <?php $__currentLoopData = $menu_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="header-nav-item">
                            <a href="<?php echo e($val_menu1->url_link); ?>"
                                title="<?php echo e($val_menu1->json_params->name->$locale ?? $val_menu1->name); ?>">
                                <?php echo e($val_menu1->json_params->name->$locale ?? $val_menu1->name); ?></a>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/frontend/components/header_default/menu/layout/default.blade.php ENDPATH**/ ?>