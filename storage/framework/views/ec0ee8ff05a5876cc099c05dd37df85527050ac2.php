<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    <?php echo $__env->yieldContent('title'); ?> | META SOFTWARE
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="<?php echo e(asset('themes/admin/img/meta-logo-favicon.png')); ?>">

  
  <?php echo $__env->make('admin.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('style'); ?>
</head>

<body class="hold-transition skin-green-light sidebar-mini fixed">
  <div class="wrapper">

    
    

    
    

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
      
      
      
      <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /.content-wrapper -->

    
    

  </div>
  <!-- ./wrapper -->

  
  <?php echo $__env->make('admin.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('script'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/layouts/block.blade.php ENDPATH**/ ?>