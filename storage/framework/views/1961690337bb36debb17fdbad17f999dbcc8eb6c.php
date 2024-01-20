

<?php $__env->startSection('content'); ?>
  <div class="container" style="max-width:80%;margin:auto;background:#FBFBFB;">
    <div>
      <img src="<?php echo e(url('assets/img/email-banner.png')); ?>" alt="" style="width:100%">
    </div>
    <div style="padding:20px">
      <strong style="font-style: italic;">
        <?php echo app('translator')->get('Dear'); ?>!
      </strong>
      <p>
        <?php echo e(__('You have successfully registered an account at EduCV, we will assist you in accomplishing your goals with many perks and help you connect globally.')); ?>

      </p>
      <p>
        <strong style="font-style: italic;">
          <?php echo e(__('And now is the time for us to start together and give each other opportunities.')); ?>

        </strong>
      </p>
      <p>
        <?php echo e(__('Click the below link to confirm that you agree to our terms of use and data protection and we can activate your account.')); ?>

      </p>
      <p>
        <a style="color:#0064aa" href="<?php echo e(route('frontend.verify_account')); ?>?code=<?php echo e($code); ?>">
          <?php echo e(route('frontend.verify_account')); ?>?code=<?php echo e($code); ?>

        </a>
      </p>
      <p>
        <em>
          <?php echo e(__('Note: If the link cannot be clicked, simply copy it into your browser.')); ?>

        </em>
      </p>
      <p>
        <strong>
          <?php echo e(__('Contact us for more support:')); ?>

        </strong>
        <br>
        - Hotline: 
        - Email: 
      </p>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.email', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/emails/user_register_confirmation.blade.php ENDPATH**/ ?>