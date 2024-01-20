<?php $__env->startSection('style'); ?>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

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
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->is_default == 1 && $item->lang_locale != Request::get('lang')): ?>
                            <?php if(Request::get('lang') != ''): ?>
                                <a class="text-primary pull-right"
                                    href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>" style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(Request::get('lang') != $item->lang_locale): ?>
                                <a class="text-primary pull-right"
                                    href="<?php echo e(route(Request::segment(2) . '.edit', $detail->id)); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                    style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <span class="pull-right"><?php echo app('translator')->get('Translations'); ?>: </span>
            </div>
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
                            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
                        </a>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <form class="form-component" role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>"
                                method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                    <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Title'); ?>
                                                <small class="text-red">*</small>
                                            </label>
                                            <input type="text" class="form-control" name="title"
                                                placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                value="<?php echo e(old('title') ?? ($detail->json_params->title->$lang ?? $detail->title)); ?>"
                                                required>
                                        </div>
                                    </div>

                                    
                                    <?php if(isset($component_configs)): ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('Layout'); ?></label>
                                                <select name="json_params[layout]" id="component_layout"
                                                    class="form-control select2" style="width: 100%">
                                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                                    <?php $__currentLoopData = $component_configs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item->component_code == $detail->component_code): ?>
                                                            <?php
                                                                $json_params = json_decode($item->json_params);
                                                            ?>
                                                            <?php if(isset($json_params->layout)): ?>
                                                                <?php $__currentLoopData = $json_params->layout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($value); ?>"
                                                                        <?php echo e(isset($detail->json_params->layout) && $value == $detail->json_params->layout ? 'selected' : ''); ?>>
                                                                        <?php echo e(__($value)); ?>

                                                                    </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                                                placeholder="<?php echo app('translator')->get('Order'); ?>"
                                                value="<?php echo e(old('iorder') ?? $detail->iorder); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get('Brief'); ?></label>
                                            <textarea name="brief" id="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? ($detail->json_params->brief->$lang ?? $detail->brief)); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div
                                            class="form-group">
                                            <label><?php echo app('translator')->get('Image'); ?></label>
                                            <div
                                                class="input-group">
                                                <span
                                                    class="input-group-btn">
                                                    <a data-input="image"
                                                        data-preview="image-holder"
                                                        class="btn btn-primary lfm"
                                                        data-type="cms-image">
                                                        <i
                                                            class="fa fa-picture-o"></i>
                                                        <?php echo app('translator')->get('Select'); ?>
                                                    </a>
                                                </span>
                                                <input
                                                    id="image"
                                                    class="form-control"
                                                    type="text"
                                                    name="image"
                                                    value="<?php echo e($detail->image); ?>"
                                                    placeholder="<?php echo app('translator')->get('Image source'); ?>">
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

                                <div class="col-md-6 box-body">
                                    <div class="box box-primary ">
                                        <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST"
                                            class="form-component" id="form-main" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('POST'); ?>
                                            <input type="hidden" name="parent_id" value="<?php echo e($detail->id); ?>">
                                            <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                                <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                                            <?php endif; ?>
                                            <div class="box-header with-border">
                                                <h3 class="box-title" id="item-title">
                                                    <?php echo app('translator')->get('Add new item to component'); ?>
                                                </h3>
                                            </div>
                                            <div class=" d-flex-wap">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo app('translator')->get('Title'); ?>
                                                            <small class="text-red">*</small>
                                                        </label>
                                                        <input type="text" class="form-control" name="title"
                                                            placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                            value="<?php echo e(old('title') ?? ''); ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('Status'); ?></label>
                                                        <div class="form-control">
                                                            <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <label>
                                                                    <input type="radio" name="status"
                                                                        value="<?php echo e($value); ?>"
                                                                        <?php echo e($loop->index == 0 ? 'checked' : ''); ?>>
                                                                    <small class="mr-15"><?php echo e(__($value)); ?></small>
                                                                </label>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('Brief'); ?></label>
                                                        <textarea row="3" class="form-control" id="item-brief" placeholder="<?php echo app('translator')->get('Brief'); ?>" name="brief"><?php echo e(old('brief')); ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                                        <input type="text" class="form-control" id="item-url_link"
                                                            placeholder="<?php echo app('translator')->get('Url redirect'); ?>" name="json_params[url_link]"
                                                            value="<?php echo e(old('json_params[url_link]')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                                        <input type="text" class="form-control"
                                                            id="item-url_link_title" placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                            name="json_params[url_link_title]"
                                                            value="<?php echo e(old('json_params[url_link_title][' . $lang . ']')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="item-image">
                                                            <?php echo app('translator')->get('Image'); ?>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <a data-input="image" data-preview="image-holder"
                                                                    class="btn btn-primary lfm" data-type="cms-image">
                                                                    <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Select'); ?>
                                                                </a>
                                                            </span>
                                                            <input id="image" class="form-control" type="text"
                                                                name="image" placeholder="<?php echo app('translator')->get('Image source'); ?>"
                                                                value="<?php echo e(old('image')); ?>">
                                                        </div>
                                                        <div id="image-holder" style="margin-top:15px;max-height:100px;">
                                                            <?php if(old('image') != ''): ?>
                                                                <img style="height: 5rem;" src="<?php echo e(old('image')); ?>">
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">

                                                <button type="submit" class="btn btn-success btn-sm submit_form">
                                                    <?php echo app('translator')->get('Add new'); ?>
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="box box-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                <?php echo app('translator')->get('Component items'); ?>
                                            </h3>
                                        </div>
                                        <div class="box-body table-responsive">
                                            <?php if(count($items) > 0): ?>
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
                                                                                data-update="title"><?php echo e($item->json_params->title->$lang ?? $item->title); ?></span>

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
                                                                                <input type="hidden" name="parent_id"
                                                                                    value="<?php echo e($detail->id); ?>">
                                                                                <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                                                                    <input type="hidden" name="lang"
                                                                                        value="<?php echo e(Request::get('lang')); ?>">
                                                                                <?php endif; ?>
                                                                                <div class="box-body">
                                                                                    <div class="nav-tabs-custom">
                                                                                        <div class="tab-content">
                                                                                            <div class="tab-pane active"
                                                                                                id="tab_1">
                                                                                                <div class="d-flex-wap">

                                                                                                    <div class="col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label>
                                                                                                                <?php echo app('translator')->get('Title'); ?>
                                                                                                                <small
                                                                                                                    class="text-red">*</small>
                                                                                                            </label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="title"
                                                                                                                placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                                                                                value="<?php echo e(old('title') ?? ($item->json_params->title->$lang ?? $item->title)); ?>"
                                                                                                                required>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo app('translator')->get('Status'); ?></label>
                                                                                                            <div
                                                                                                                class="form-control">
                                                                                                                <?php $__currentLoopData = App\Consts::STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                                    <label>
                                                                                                                        <input
                                                                                                                            type="radio"
                                                                                                                            name="status"
                                                                                                                            value="<?php echo e($value); ?>"
                                                                                                                            <?php echo e($item->status == $value ? 'checked' : ''); ?>>
                                                                                                                        <small
                                                                                                                            class="mr-15"><?php echo e(__($value)); ?></small>
                                                                                                                    </label>
                                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-12">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo app('translator')->get('Brief'); ?></label>
                                                                                                            <textarea name="brief" class="form-control" rows="5"><?php echo e(old('brief') ?? ($item->json_params->brief->{$lang} ?? $item->brief)); ?></textarea>
                                                                                                        </div>
                                                                                                    </div>


                                                                                                    <div class="col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo app('translator')->get('Url redirect'); ?></label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="json_params[url_link]"
                                                                                                                placeholder="<?php echo app('translator')->get('Url redirect'); ?>"
                                                                                                                value="<?php echo e(old('json_params[url_link]') ?? $item->json_params->url_link); ?>">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo app('translator')->get('Url redirect title'); ?></label>
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                class="form-control"
                                                                                                                name="json_params[url_link_title]"
                                                                                                                placeholder="<?php echo app('translator')->get('Url redirect title'); ?>"
                                                                                                                value="<?php echo e(old('json_params[url_link_title]') ?? ($item->json_params->url_link_title->$lang ?? $item->json_params->url_link_title)); ?>">
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="col-md-6">
                                                                                                        <div
                                                                                                            class="form-group">
                                                                                                            <label><?php echo app('translator')->get('Image'); ?></label>
                                                                                                            <div
                                                                                                                class="input-group">
                                                                                                                <span
                                                                                                                    class="input-group-btn">
                                                                                                                    <a data-input="image<?php echo e($item->id); ?>"
                                                                                                                        data-preview="image-holder<?php echo e($item->id); ?>"
                                                                                                                        class="btn btn-primary lfm"
                                                                                                                        data-type="cms-image">
                                                                                                                        <i
                                                                                                                            class="fa fa-picture-o"></i>
                                                                                                                        <?php echo app('translator')->get('Select'); ?>
                                                                                                                    </a>
                                                                                                                </span>
                                                                                                                <input
                                                                                                                    id="image<?php echo e($item->id); ?>"
                                                                                                                    class="form-control"
                                                                                                                    type="text"
                                                                                                                    name="image"
                                                                                                                    value="<?php echo e($item->image); ?>"
                                                                                                                    placeholder="<?php echo app('translator')->get('Image source'); ?>">
                                                                                                            </div>
                                                                                                            <div id="image-holder<?php echo e($item->id); ?>"
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
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="clearfix"></div>
                                                                                <div class="text-end mt-2">
                                                                                    <button
                                                                                        class="btn btn-primary btn-sm"><?php echo app('translator')->get('Save'); ?></button>
                                                                                    <p class="btn btn-danger remove_menu btn-sm"
                                                                                        data-id="<?php echo e($item->id); ?>">
                                                                                        <?php echo app('translator')->get('Remove'); ?> </p>

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
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
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
            $('#component_code').on('change', function() {
                let component_code = $(this).val();

                var _targetLayout = $(this).parents('.form-component').find('#component_layout');
                _targetLayout.html('');
                var url = "<?php echo e(route('component.config')); ?>/";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        "component_code": component_code,
                    },
                    success: function(response) {
                        var _optionListLayout = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
                        if (response.data != null) {
                            let json_params = JSON.parse(response.data);
                            if (json_params.hasOwnProperty('layout')) {
                                Object.entries(json_params.layout).forEach(([key, value]) => {
                                    _optionListLayout += '<option value="' + value +
                                        '"> ' + value + ' </option>';
                                });
                            }
                        }
                        _targetLayout.html(_optionListLayout);
                        $(".select2").select2();
                    },
                    error: function(response) {
                        // Get errors
                        var errors = response.responseJSON.message;
                        console.log(errors);
                    }
                });
            });

            $('#menu-sort').nestable({
                group: 0,
                maxDepth: 1,
            });
            $('.menu-sort-save').click(function() {
                $('#loading').show();
                let serialize = $('#menu-sort').nestable('serialize');
                let menu = JSON.stringify(serialize);
                $.ajax({
                        url: '<?php echo e(route('component.update_sort')); ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: '<?php echo e(csrf_token()); ?>',
                            menu: menu,
                            root_id: '<?php echo e($detail->id ?? '0'); ?>',
                        },
                    })
                    .done(function(data) {
                        $('#loading').hide();
                        if (data.error == 0) {
                            // alert('Cập nhật thành công');
                            location.reload();
                        } else {
                            // alert("Cập nhật thất bại");
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
                        url: '<?php echo e(route('component.delete')); ?>',
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/components/edit/footer.blade.php ENDPATH**/ ?>