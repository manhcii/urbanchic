
<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php if(session('errorMessage')): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('errorMessage')); ?>

      </div>
    <?php endif; ?>
    <?php if(session('successMessage')): ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(session('successMessage')); ?>

      </div>
    <?php endif; ?>
    <?php if($errors->any()): ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>
    <div class="box box-primary">

      <!-- form start -->
      <form role="form" action="<?php echo e(route('settings.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">

            <style>
              .nav-tabs {
                padding: 0px;
              }

              .nav-tabs li {
                width: 100%;
                background-color: #ECF0F5;
              }

              .nav-tabs li a {
                border: solid 1px #ECF0F5;
                padding-top: 20px;
                padding-bottom: 20px;
              }

              .tab-content {
                border: solid 1px #ECF0F5;
              }

              .nav-tabs-custom>.nav-tabs>li:first-of-type.active>a,
              .nav-tabs-custom>.nav-tabs>li.active>a {
                border-left-color: #ECF0F5;
                border-bottom-color: #ECF0F5;
              }

              .nav-tabs li a i {
                width: 20px;
              }

              .select2-container {
                width: 100% !important;
              }
            </style>

            <ul class="nav nav-tabs col-md-3">
              <li class="active">
                <a href="#tab_4" data-toggle="tab">
                  <h5>
                    <i class="fa fa-code"></i>
                    <?php echo app('translator')->get('CSS and Javascript'); ?>
                  </h5>
                </a>
              </li>
              <li>
                <a href="#tab_5" data-toggle="tab">
                  <h5>
                    <i class="fa fa-object-group"></i>
                    <?php echo app('translator')->get('Page & Layout default'); ?>
                  </h5>
                </a>
              </li>

            </ul>
            <div class="tab-content col-md-9">

              <div class="tab-pane active" id="tab_4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Header code'); ?></label>
                      <textarea name="header_code" id="header_code" class="form-control" rows="10"><?php echo e(old('header_code')); ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Footer code'); ?></label>
                      <textarea name="footer_code" id="footer_code" class="form-control" rows="10"><?php echo e(old('footer_code')); ?></textarea>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane" id="tab_5">
                <h3>Widget default</h3>
                <div class="row">
                  <?php $__currentLoopData = $widgetConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label><?php echo app('translator')->get($val->name); ?></label>
                        <select name="widget[]" class=" form-control select2">
                          <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                          <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_wg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($val_wg->widget_code == $val->widget_code): ?>
                              <option value="<?php echo e($val_wg->id); ?>"
                                <?php echo e(isset($setting->widget) && in_array($val_wg->id, json_decode($setting->widget)) ? 'selected' : ''); ?>>
                                <?php echo app('translator')->get($val_wg->title); ?>
                              </option>
                            <?php endif; ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
              </div>

            </div>

          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right btn-sm">
            <i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?>
          </button>
        </div>
      </form>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
  <script>
    $(document).ready(function() {

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/admin/pages/settings/setting_theme.blade.php ENDPATH**/ ?>