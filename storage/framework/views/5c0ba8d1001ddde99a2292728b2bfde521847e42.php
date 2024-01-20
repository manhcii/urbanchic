<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php
    if (Request::get('lang') == $languageDefault->lang_locale || Request::get('lang') == '') {
        $lang = $languageDefault->lang_locale;
    } else {
        $lang = Request::get('lang');
    }
?>
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?>
            </a>
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
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('Update form'); ?></h3>
                <?php if(isset($languages)): ?>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-language"></i>
                                <?php echo e(Request::get('lang') && Request::get('lang') != $languageDefault->lang_code ? $languages->first(function ($item, $key) use ($lang) {
                                    return $item->lang_code == $lang;
                                })['lang_name'] : $languageDefault->lang_name); ?>

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <?php if(isset($languages)): ?>
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->lang_code != $languageDefault->lang_code): ?>
                                            <li>
                                                <a href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    <?php echo e($item->lang_name); ?>

                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    <?php echo e($item->lang_name); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </div>
                <span class="pull-right" style="padding: 15px"><?php echo app('translator')->get('Translations'); ?>: </span>
            <?php endif; ?>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1" data-toggle="tab">
                                <h5>
                                    <?php echo app('translator')->get('General information'); ?>
                                    <span class="text-danger">*</span>
                                </h5>
                            </a>
                        </li>
                        <a class="btn btn-success btn-sm pull-right" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                            <i class="fa fa-bars"></i>
                            <?php echo app('translator')->get('List'); ?>
                        </a>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <!-- form start -->
                            <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                    <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Title'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="<?php echo app('translator')->get('Title'); ?>" value="<?php echo e($detail->json_params->name->$lang??$detail->name); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Status'); ?></label>
                                            <div class="form-control">
                                                <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <label>
                                                        <input type="radio" name="status" value="<?php echo e($value); ?>"
                                                            <?php echo e($detail->status == $value ? 'checked' : ''); ?>>
                                                        <small class="mr-15"><?php echo e(__($value)); ?></small>
                                                    </label>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Order'); ?></label>
                                            <input type="number" class="form-control" name="iorder"
                                                placeholder="<?php echo app('translator')->get('Order'); ?>" value="<?php echo e($detail->iorder); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-floppy-o"></i>
                                            <?php echo app('translator')->get('Save'); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                </div>
                                <div class="col-lg-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo app('translator')->get('Add new item'); ?></h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="the-box ">
                                                <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST"
                                                    id="form-main">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                                    <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                                        <input type="hidden" name="lang"
                                                            value="<?php echo e(Request::get('lang')); ?>">
                                                    <?php endif; ?>
                                                    <div class="d-flex-wap">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>
                                                                    <?php echo app('translator')->get('Title'); ?>
                                                                    <small class="text-red">*</small>
                                                                </label>
                                                                <input type="text" class="form-control" name="name"
                                                                    placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                                    value="<?php echo e(old('name') ?? ''); ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Status'); ?></label>
                                                                <div class="form-control">
                                                                    <label>
                                                                        <input type="radio" name="status"
                                                                            value="active" checked>
                                                                        <small class="mr-15"><?php echo app('translator')->get('active'); ?></small>
                                                                    </label>
                                                                    <label>
                                                                        <input type="radio" name="status"
                                                                            value="deactive">
                                                                        <small class="mr-15"><?php echo app('translator')->get('deactive'); ?></small>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Value'); ?></label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="<?php echo app('translator')->get('Value'); ?>"
                                                                    value="<?php echo e(old('propety_value')); ?>"
                                                                    name="propety_value">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label><?php echo app('translator')->get('Image'); ?></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <a data-input="image" data-preview="image-holder"
                                                                            class="btn btn-primary lfm"
                                                                            data-type="cms-images">
                                                                            <i class="fa fa-picture-o"></i>
                                                                            <?php echo app('translator')->get('choose'); ?>
                                                                        </a>
                                                                    </span>
                                                                    <input id="image" class="form-control"
                                                                        type="text" name="image"
                                                                        placeholder="<?php echo app('translator')->get('image_link'); ?>..."
                                                                        value="<?php echo e($detail->image); ?>">
                                                                </div>
                                                                <div id="image-holder"
                                                                    style="margin-top:15px;max-height:100px;">
                                                                    <?php if($detail->image != ''): ?>
                                                                        <img style="height: 5rem;"
                                                                            src="<?php echo e($detail->image); ?>">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end col-md-6">
                                                            <div class="btn-group btn-group-devided">
                                                                <input type="hidden" name="parent_id"
                                                                    value="<?php echo e($detail->id); ?>">
                                                                <input type="hidden" name="is_type"
                                                                    value="<?php echo e($detail->is_type); ?>">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm submit_form">
                                                                    <i class="fa fa-floppy-o"></i>
                                                                    <?php echo app('translator')->get('Add new'); ?>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <?php if(isset($items) && count($items) > 0): ?>
                                        <div class="row">
                                            <div class="col-md-12 mt-md-10">
                                                <div class="box box-primary">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">
                                                            <?php echo app('translator')->get('List items'); ?>
                                                        </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <div class="table-responsive">
                                                            <div class="dd" id="menu-sort">
                                                                <ol class="dd-list">
                                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li class="dd-item dd3-item "
                                                                            data-id="<?php echo e($item->id); ?>">
                                                                            <div class="dd-handle dd3-handle"></div>
                                                                            <div class="dd3-content">
                                                                                <span class="text float-start"
                                                                                    data-update="title"><?php echo e($item->json_params->name->$lang??$item->name); ?></span>
                                                                                <span class="text float-end"></span>
                                                                                <a data-toggle="collapse"
                                                                                    href="#item-details-<?php echo e($item->id); ?>"
                                                                                    role="button" aria-expanded="false"
                                                                                    aria-controls="item-details-<?php echo e($item->id); ?>"
                                                                                    class="show-item-details">
                                                                                    <i class="fa fa-angle-down"></i>
                                                                                </a>
                                                                                <div class="clearfix"></div>
                                                                            </div>

                                                                            <div class="item-details collapse multi-collapse"
                                                                                id="item-details-<?php echo e($item->id); ?>">

                                                                                <form role="form"
                                                                                    action="<?php echo e(route(Request::segment(2) . '.update', $item->id)); ?>"
                                                                                    method="POST">
                                                                                    <?php echo csrf_field(); ?>
                                                                                    <?php echo method_field('PUT'); ?>
                                                                                    <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                                                                        <input type="hidden"
                                                                                            name="lang"
                                                                                            value="<?php echo e(Request::get('lang')); ?>">
                                                                                    <?php endif; ?>
                                                                                    <input type="hidden" name="parent_id"
                                                                                        value="<?php echo e($detail->id); ?>">
                                                                                    <input type="hidden" name="is_type"
                                                                                        value="<?php echo e($detail->is_type); ?>">
                                                                                    <div class="box-body">

                                                                                        <div class="d-flex-wap">
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label>
                                                                                                        <?php echo app('translator')->get('Title'); ?>
                                                                                                        <small
                                                                                                            class="text-red">*</small>
                                                                                                    </label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        name="name"
                                                                                                        placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                                                                        value="<?php echo e(old('title') ?? ($item->json_params->name->$lang??$item->name)); ?>"
                                                                                                        required>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo app('translator')->get('Status'); ?></label>
                                                                                                    <div
                                                                                                        class="form-control">
                                                                                                        <label>
                                                                                                            <input
                                                                                                                type="radio"
                                                                                                                name="status"
                                                                                                                value="active"
                                                                                                                <?php echo e($item->status == 'active' ? 'checked' : ''); ?>>
                                                                                                            <small
                                                                                                                class="mr-15"><?php echo app('translator')->get('active'); ?></small>
                                                                                                        </label>
                                                                                                        <label>
                                                                                                            <input
                                                                                                                type="radio"
                                                                                                                name="status"
                                                                                                                value="deactive"
                                                                                                                <?php echo e($item->status == 'deactive' ? 'checked' : ''); ?>>
                                                                                                            <small
                                                                                                                class="mr-15"><?php echo app('translator')->get('deactive'); ?></small>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo app('translator')->get('Value'); ?></label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="<?php echo app('translator')->get('Value'); ?>"
                                                                                                        value="<?php echo e($item->propety_value ?? old('propety_value')); ?>"
                                                                                                        name="propety_value">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="form-group">
                                                                                                    <label><?php echo app('translator')->get('Image'); ?></label>
                                                                                                    <div
                                                                                                        class="input-group">
                                                                                                        <span
                                                                                                            class="input-group-btn">
                                                                                                            <a data-input="image-<?php echo e($item->id); ?>"
                                                                                                                data-preview="image-holder-<?php echo e($item->id); ?>"
                                                                                                                class="btn btn-primary lfm"
                                                                                                                data-type="cms-images">
                                                                                                                <i
                                                                                                                    class="fa fa-picture-o"></i>
                                                                                                                <?php echo app('translator')->get('choose'); ?>
                                                                                                            </a>
                                                                                                        </span>
                                                                                                        <input
                                                                                                            id="image-<?php echo e($item->id); ?>"
                                                                                                            class="form-control"
                                                                                                            type="text"
                                                                                                            name="image"
                                                                                                            placeholder="<?php echo app('translator')->get('image_link'); ?>..."
                                                                                                            value="<?php echo e($item->image); ?>">
                                                                                                    </div>
                                                                                                    <div id="image-holder-<?php echo e($item->id); ?>"
                                                                                                        style="margin-top:15px;max-height:100px;">
                                                                                                        <?php if($item->image != ''): ?>
                                                                                                            <img style="height: 5rem;"
                                                                                                                src="<?php echo e($item->image); ?>">
                                                                                                        <?php endif; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="text-end mt-2">
                                                                                        <button
                                                                                            class="btn btn-primary btn-sm"><?php echo app('translator')->get('Save'); ?></button>
                                                                                        <p class="btn btn-danger remove_menu btn-sm"
                                                                                            data-id="<?php echo e($item->id); ?>">
                                                                                            Remove </p>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-footer">
                                                        <a class="btn btn-warning btn-flat menu-sort-save btn-sm"
                                                            title="<?php echo app('translator')->get('Save'); ?>">
                                                            <i class="fa fa-floppy-o"></i>
                                                            <?php echo app('translator')->get('Save sort'); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-footer">

                </div>

            </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#menu-sort').nestable({
                group: 0,
                maxDepth: 1,
            });
        });
        $('.menu-sort-save').click(function() {
            $('#loading').show();
            let serialize = $('#menu-sort').nestable('serialize');
            let menu = JSON.stringify(serialize);
            $.ajax({
                    url: '<?php echo e(route('parameter.update_sort')); ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        menu: menu,
                        root_id: <?php echo e($detail->id); ?>

                    },
                })
                .done(function(data) {
                    $('#loading').hide();
                    if (data.error == 0) {
                        location.reload();
                    } else {
                        alert(data.msg);
                        location.reload();
                    }
                });
        });
        $('.remove_menu').click(function() {
            if (confirm("<?php echo app('translator')->get('confirm_action'); ?>")) {
                let _root = $(this).closest('.dd-item');
                let id = $(this).data('id');
                $.ajax({
                    method: 'post',
                    url: '<?php echo e(route('parameter.delete')); ?>',
                    data: {
                        id: id,
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    success: function(data) {
                        if (data.error == 1) {
                            alert(data.msg);
                        } else {
                            _root.remove();
                        }
                    }
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/parameter/edit.blade.php ENDPATH**/ ?>