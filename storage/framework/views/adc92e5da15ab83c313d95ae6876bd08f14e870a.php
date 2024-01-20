
<?php if(isset($component)): ?>

<div class="blog-sidebar-follow">
    <div class="title-module">
      <h3><?php echo e($component->title??""); ?></h3>
    </div>

    <table class="table-social">
      <tr>
        <th>
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/bloglist-facebook.svg')); ?>" alt="Facebook" title="Facebook" />
        </th>
        <td>
          <p>FACEBOOK</p>
          <a href="<?php echo e($setting->social->facebook??""); ?>" title="Like">Like</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/bloglist-instagram.svg')); ?>" alt="INSTAGRAM" title="INSTAGRAM" />
        </th>
        <td>
          <p>INSTAGRAM</p>
          <a href="<?php echo e($setting->social->instagram??""); ?>" title="Follow">Follow</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="<?php echo e(asset('themes/frontend/assets/image/icons/bloglist-telegram.svg')); ?>" alt="TELEGRAM" title="TELEGRAM" />
        </th>
        <td>
          <p>TELEGRAM</p>
          <a href="<?php echo e($setting->social->twitter??""); ?>" title="Follow">Follow</a>
        </td>
      </tr>

      <tr>
        <th>
          <img src="<?php echo e(asset('themes/frontend//assets/image/icons/bloglist-youtube.svg')); ?>" alt="YOUTUBE" title="YOUTUBE" />
        </th>
        <td>
          <p>YOUTUBE</p>
          <a href="<?php echo e($setting->social->youtube??""); ?>" title="Follow">Follow</a>
        </td>
      </tr>
    </table>
  </div>
<?php endif; ?>
<?php /**PATH E:\xampp\htdocs\fruit\resources\views/frontend/components/sidebar_blog/paramater/layout/follow.blade.php ENDPATH**/ ?>