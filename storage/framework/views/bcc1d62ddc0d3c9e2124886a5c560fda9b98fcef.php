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
    <div class="subscribe">
        <div class="subscribe-content">
          <h4><?php echo e($title); ?></h4>
          <p>
            <?php echo e($brief); ?>

          </p>
        </div>
        <form action="<?php echo e(route('frontend.contact.store')); ?>" method="post"class="form_ajax subscribe-form " id="subscribe">
            <?php echo csrf_field(); ?>
          <input type="hidden" name="is_type" value="contact">
          <input type="text"  name="email" requiredplaceholder="Your email address">
          <button type="submit" form="subscribe" title="Subscribe">Subscribe</button>
        </form>
      </div>
      <div class="footer-social">
        <a href="#" title="Facebook">
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/facebook.svg')); ?>" alt="Facebook" title="Facebook">
        </a>

        <a href="#" title="Twitter">
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/twitter.svg')); ?>" alt="Twitter" title="Twitter">
        </a>

        <a href="#" title="Pinterest">
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/pinterest.svg')); ?>" alt="Pinterest" title="Pinterest">
        </a>

        <a href="#" title="Instagram">
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/instagram.svg')); ?>" alt="Instagram" title="Instagram">
        </a>
      </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/footer_default/footer/layout/form.blade.php ENDPATH**/ ?>