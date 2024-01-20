<?php
    $component_setting = $widget->header->json_params->component ?? [];
    // Filter selected
    $components_selected = $components->filter(function ($item) use ($component_setting) {
        return in_array($item->id, $component_setting) ;
    });
    // Reorder selected
    $components_selected = $components_selected->sortBy(function ($item) use ($component_setting) {
        return array_search($item->id, $component_setting);
    });
    
?>
<header >
    <div class="topbar">
      <div class="container">
        <div class="topbar-flex">
          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <img src="<?php echo e(asset('themes/frontend/assets/image/icons/phone.svg')); ?>" alt="Phone" title="Phone" />
              <a href="tel:<?php echo e($setting->phone??""); ?>" title="<?php echo e($setting->phone??""); ?>"><?php echo e($setting->phone??""); ?></a>
            </div>

            <div class="topbar-item">
              <img src="<?php echo e(asset('themes/frontend/assets/image/icons/email.svg')); ?>" alt="Email" title="Email" />
              <a href="mailto:<?php echo e($setting->email ??""); ?>" title="<?php echo e($setting->email ??""); ?>"><?php echo e($setting->email ??""); ?></a>
            </div>
          </div>

          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <p>
                <?php echo e($setting->title_topbar??""); ?>

                <a href="/" title="Shop now!">Shop now!</a>
              </p>
            </div>
          </div>

          <div class="topbar-item-wrap">
            <div class="topbar-item">
              <img src="<?php echo e(asset('themes/frontend/assets/image/icons/trackorder.svg')); ?>" alt="Track Your Order" title="Track Your Order" />
              <a href="/" title="Track Your Order">Track Your Order</a>
            </div>

            <div class="topbar-item">
              <img src="<?php echo e(asset('themes/frontend/assets/image/icons/callcenter.svg')); ?>" alt="Help/Support" title="Help/Support" />
              <a href="tel:<?php echo e($setting->phone??""); ?>" title="Help/Support">Help/Support</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="header-main">
        <?php if(isset($components_selected)): ?>
            <?php $__currentLoopData = $components_selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(
                    \View::exists(
                        'frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index')): ?>
                    <?php echo $__env->make(
                        'frontend.components.' .
                            $widget->header->json_params->layout .
                            '.' .
                            $component->component_code .
                            '.index ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <?php echo e('View: frontend.components.' . $widget->header->json_params->layout . '.' . $component->component_code . '.index do not exists!'); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        </div>
    </div>
</header>

 <?php /**PATH E:\xampp\htdocs\urbanchic\resources\views/frontend/widgets/header/header_default.blade.php ENDPATH**/ ?>