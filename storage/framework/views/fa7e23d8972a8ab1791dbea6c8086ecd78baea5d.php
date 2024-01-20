<?php if(isset($menu)): ?>
    <?php
        $menu_childs = $menu->filter(function ($item, $key) use ($component) {
            return $item->parent_id == $component->json_params->menu_id;
        });
    ?>
<?php endif; ?>
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
<?php endif; ?>    

 <div class="footer-main">
        <div class="footer-col-logo">
          <a href="/" title="Savory Spree" class="footer-logo">
            <img src="<?php echo e($setting->logo_footer??""); ?>" alt="Savory Spree" title="Savory Spree">
          </a>
          <p class="footer-description">
            <?php echo e($brief); ?>

          </p>
          <a href="tel:<?php echo e($setting->phone??""); ?>" title="<?php echo e($setting->phone??""); ?>"><?php echo e($setting->phone??""); ?></a>
          <span class="footer-or">or</span>
          <a href="mailto:<?php echo e($setting->email??""); ?>" title="<?php echo e($setting->email??""); ?>"><?php echo e($setting->email??""); ?></a>
          <p><?php echo e($setting->address??""); ?></p>
        </div>

        <div class="footer-list-col">
          <?php if(isset($menu_childs)): ?>
          <?php $__currentLoopData = $menu_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $menu_childs_0 = $menu->filter(function ($item, $key) use ($val_menu1) {
                    return $item->parent_id == $val_menu1->id;
                });
            ?>  
              <div class="footer-col">
                <h4><?php echo e($val_menu1->json_params->name->$locale ?? $val_menu1->name); ?></h4>
                <ul>
                    <?php if(isset($menu_childs_0)): ?>
                      <?php $__currentLoopData = $menu_childs_0; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_menu0): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($val_menu0->url_link); ?>" title="<?php echo e($val_menu0->json_params->name->$locale ?? $val_menu0->name); ?>"><?php echo e($val_menu0->json_params->name->$locale ?? $val_menu0->name); ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>    
                </ul>
              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
          <?php endif; ?>
          
        </div>
      </div><?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/footer_default/menu/layout/default.blade.php ENDPATH**/ ?>