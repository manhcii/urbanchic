

<div class="offcanvas offcanvas-start" tabindex="-1" id="menumobile" aria-labelledby="menumobileLabel">
    <div class="offcanvas-body">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <?php if(isset($menu)): ?>
            <?php
                $menu_childs = $menu->filter(function ($item, $key) use ($component) {
                    return $item->parent_id == $component->json_params->menu_id;
                });
            ?>

            <?php if(isset($menu_childs)): ?>
                <nav class="nav-mobile">
                    <?php $__currentLoopData = $menu_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="header-nav-item">
                            <a href="<?php echo e($val_menu1->url_link); ?>"
                                title="<?php echo e($val_menu1->json_params->name->$locale ?? $val_menu1->name); ?>">
                                <?php echo e($val_menu1->json_params->name->$locale ?? $val_menu1->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/header_home/menu/layout/mobile.blade.php ENDPATH**/ ?>