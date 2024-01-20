

<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('Reviews list'); ?></h3>
            </div>
            <div class="box-header">
              <button class="btn btn-danger btn-xs delete-select-all" data-url=""><i class="fa fa-trash"></i></button> Xóa các bản ghi được chọn
            </div>
            <div class="box-body table-responsive">
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
                <?php if(count($rows) == 0): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo app('translator')->get('No record found'); ?>
                    </div>
                <?php else: ?>
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th><input type="checkbox" name="ids[]" id="check_all"></th>
                        <th><?php echo app('translator')->get('Fullname'); ?></th>
                        <th><?php echo app('translator')->get('Email'); ?></th>
                        <th><?php echo app('translator')->get('Comment'); ?></th>
                        <th><?php echo app('translator')->get('Created at'); ?></th>
                        <th><?php echo app('translator')->get('Updated at'); ?></th>
                        <th><?php echo app('translator')->get('Status'); ?></th>
                        <th><?php echo app('translator')->get('Action'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                          onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                          <tr class="valign-middle">
                            <td><input type="checkbox" class="checkbox" data-id="<?php echo e($row->id); ?>"></td>
                            <td>
                              <strong style="font-size: 14px;"><?php echo e($row->name); ?></strong>
                            </td>
                            <td>
                              <?php echo e($row->email); ?>

                            </td>
                            <td>
                              <?php echo e(Str::limit($row->comment, 100)); ?>

                            </td>
                            <td>
                              <?php echo e($row->created_at); ?>

                            </td>
                            <td>
                              <?php echo e($row->updated_at); ?>

                            </td>
                            <td class="wrap-load-active" data-token="<?php echo e(csrf_token()); ?>" data-url="<?php echo e(route('admin.loadStatusComment',['id'=>$row->id])); ?>">
                              <?php echo $__env->make('admin.components.load-change-status',['data'=>$row,'type'=>'bản ghi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </td>
                            <td>
                              <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                                data-original-title="<?php echo app('translator')->get('Update'); ?>"
                                href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                                <i class="fa fa-pencil-square-o"></i>
                              </a>
                              <?php echo csrf_field(); ?>
                              <?php echo method_field('DELETE'); ?>
                              <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>"
                                data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                                <i class="fa fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                        </form>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                <?php endif; ?>
            </div>

            <?php if($rows->hasPages()): ?>
                <div class="box-footer clearfix">
                    <?php echo e($rows->withQueryString()->links('pagination.default')); ?>

                </div>
            <?php endif; ?>

        </div>
    </section>
    <div id="delete_action_all" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <h3>Xóa tất cả bản ghi được chọn</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <form action="<?php echo e(route('comment.select.all')); ?>"  data-url="<?php echo e(route('comment.select.all')); ?>" data-ajax="submit" data-target="alert" data-href="#modalAjax" data-content="#content" data-method="GET" method="GET">
                      <button type="button" class="form-control" data-url="<?php echo e(route('comment.select.all')); ?>" name="submit">Đồng ý</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/comments/index.blade.php ENDPATH**/ ?>