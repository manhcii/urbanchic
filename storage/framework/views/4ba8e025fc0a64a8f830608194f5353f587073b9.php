<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo e(route('admin.home')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>FHM</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>ADMINISTRATOR</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->


    <a href="javascipt:void(0);" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-language"></i>
            <?php echo e(__('Languages')); ?>

            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <?php if(isset($languages)): ?>
              <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                  <a href="<?php echo e(route('admin.languages', ['locale' => $item->lang_locale])); ?>"
                    style="padding-top:10px; padding-bottom:10px;">
                    <i class="fa fa-language"></i>
                    <?php echo e($item->lang_name); ?>

                  </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </ul>
        </li>
      </ul>
    </div>


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span>
              <?php echo e($admin_auth->name); ?>

            </span>
            <i class="fa fa-angle-down"></i>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <p>
                <?php echo e($admin_auth->name); ?>

                <small><?php echo e($admin_auth->email); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo e(route('admin.account.change.get')); ?>" class="btn btn-default btn-flat"><?php echo app('translator')->get('Profile'); ?></a>
              </div>
              <div class="pull-right">
                <a href="<?php echo e(route('admin.logout')); ?>" class="btn btn-default btn-flat"><?php echo app('translator')->get('Logout'); ?></a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/panels/header.blade.php ENDPATH**/ ?>