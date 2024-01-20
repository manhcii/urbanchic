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

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
                    class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
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
        <form role="form" action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="row">
                <div class="col-lg-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Update form'); ?></h3>
                            <?php if(isset($languages)): ?>
                                <div class="collapse navbar-collapse pull-right">
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                                <i class="fa fa-language"></i>
                                                <?php echo e(Request::get('lang') && Request::get('lang') != $languageDefault->lang_code
                                                    ? $languages->first(function ($item, $key) use ($lang) {
                                                        return $item->lang_code == $lang;
                                                    })['lang_name']
                                                    : $languageDefault->lang_name); ?>

                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
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
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <span class="pull-right" style="padding: 15px"><?php echo app('translator')->get('Translations'); ?>: </span>
                            <?php endif; ?>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab">
                                            <h5>Thông tin chính <span class="text-danger">*</span></h5>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_2" data-toggle="tab">
                                            <h5><?php echo app('translator')->get('Gallery Image'); ?></h5>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_3" data-toggle="tab">
                                            <h5>Bài viết liên quan</h5>
                                        </a>
                                    </li>
                                    <button type="submit" class="btn btn-info btn-sm pull-right">
                                        <i class="fa fa-save"></i> <?php echo app('translator')->get('Save'); ?>
                                    </button>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <?php if(Request::get('lang') != '' && Request::get('lang') != $languageDefault->lang_locale): ?>
                                                <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                                            <?php endif; ?>
                                            <?php
                                                $route = $detail->json_params->route_name ?? 'post.detail';
                                                $route_default = collect($route_name)->first(function ($item, $key) use ($route) {
                                                    return $item['name'] == $route;
                                                });
                                            ?>
                                            <?php if($route_default): ?>
                                                <input type="hidden" name="json_params[route_name]"
                                                    value="<?php echo e($route_default['name']); ?>">
                                            <?php endif; ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Title'); ?> <small class="text-red">*</small></label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="<?php echo app('translator')->get('Title'); ?>"
                                                        value="<?php echo e($detail->json_params->name->$lang ?? $detail->name); ?>"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>URL tùy chọn</label>
                                                    <i class="fa fa-coffee text-red" aria-hidden="true"></i>
                                                    <small class="form-text">
                                                        (
                                                        <i class="fa fa-info-circle"></i>
                                                        Maximum 100 characters in the group: "A-Z", "a-z", "0-9" and
                                                        "-_" )
                                                    </small>
                                                    <input name="alias" class="form-control"
                                                        value="<?php echo e($detail->alias ?? old('alias')); ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Brief'); ?></label>
                                                    <textarea name="json_params[brief][<?php echo e($lang); ?>]" class="form-control" rows="5"><?php echo e($detail->json_params->brief->$lang ?? old('json_params[brief][' . $lang . ']')); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('Content'); ?></label>
                                                        <textarea name="json_params[content][<?php echo e($lang); ?>]" class="form-control" id="content_vi"><?php echo e($detail->json_params->content->$lang ?? old('json_params[content][' . $lang . ']')); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('seo_title'); ?></label>
                                                    <input name="json_params[seo_title][<?php echo e($lang); ?>]"
                                                        class="form-control"
                                                        value="<?php echo e($detail->json_params->seo_title->$lang ?? old('json_params[seo_title][' . $lang . ']')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('seo_keyword'); ?></label>
                                                    <input name="json_params[seo_keyword][<?php echo e($lang); ?>]"
                                                        class="form-control"
                                                        value="<?php echo e($detail->json_params->seo_keyword->$lang ?? old('json_params[seo_keyword][' . $lang . ']')); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('seo_description'); ?></label>
                                                    <input name="json_params[seo_description][<?php echo e($lang); ?>]"
                                                        class="form-control"
                                                        value="<?php echo e($detail->json_params->seo_description->$lang ?? old('json_params[seo_description][' . $lang . ']')); ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane " id="tab_2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input class="btn btn-warning btn-sm add-gallery-image" data-toggle="tooltip"
                                                        title="Nhấn để chọn thêm ảnh" type="button" value="Thêm ảnh" />
                                                </div>
                                                <div class="row list-gallery-image">
                                                    <?php if(isset($detail->json_params->gallery_image)): ?>
                                                        <?php $__currentLoopData = $detail->json_params->gallery_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($value != null): ?>
                                                                <div class="col-lg-2 col-md-3 col-sm-4 mb-1 gallery-image">
                                                                    <div id="image-holder_<?php echo e($key); ?>" style="width: 150px; height: 150px;">
                                                                        <img width="150px" height="150px" class="img-width"
                                                                        src="<?php echo e($value); ?>">
                                                                    </div>

                                                                    <input type="text" name="json_params[gallery_image][]"
                                                                        class="hidden" id="gallery_image_<?php echo e($key); ?>"
                                                                        value="<?php echo e($value); ?>">
                                                                    <div class="btn-action">
                                                                        <span class="btn btn-sm btn-success btn-upload lfm mr-5"
                                                                            data-preview="image-holder_<?php echo e($key); ?>"
                                                                            data-input="gallery_image_<?php echo e($key); ?>"
                                                                            data-type="cms-image">
                                                                            <i class="fa fa-upload"></i>
                                                                        </span>
                                                                        <span class="btn btn-sm btn-danger btn-remove">
                                                                            <i class="fa fa-trash"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane " id="tab_3">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="box" style="border-top: 3px solid #d2d6de;">
                                                    <div class="box-header">
                                                        <h3 class="box-title">Danh sách tin liên quan</h3>
                                                    </div><!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1">ID</th>
                                                                    <th class="col-md-5">Tên</th>
                                                                    <th class="col-md-2">Danh mục</th>
                                                                    <th class="col-md-2">Đăng lúc</th>
                                                                    <th class="col-md-2">Bỏ chọn</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="post_related">
                                                                <?php if(isset($relateds)): ?>
                                                                    <?php $__currentLoopData = $relateds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <tr>
                                                                            <td><?php echo e($item->id); ?></td>
                                                                            <td><?php echo e($item->name); ?></td>
                                                                            <td><?php echo e($item->is_type); ?></td>
                                                                            <td><?php echo e(\Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?>

                                                                            </td>
                                                                            <td>
                                                                                <input name="json_params[related_post][]"
                                                                                    type="checkbox"
                                                                                    value="<?php echo e($item->id); ?>"
                                                                                    class="mr-15 related_post_item cursor"
                                                                                    autocomplete="off" checked>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.box-body -->
                                                </div><!-- /.box -->
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="box" style="border-top: 3px solid #d2d6de;">
                                                    <div class="box-header">
                                                        <h3 class="box-title"></h3>
                                                        <div class="box-tools col-md-12">
                                                            <div class="col-md-6">
                                                                <select class="form-control select2"
                                                                    id="search_taxonomy_id" style="width:100%">
                                                                    <option value="">- Chọn danh mục -</option>
                                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                                                            <option value="<?php echo e($item->taxonomy); ?>">
                                                                                <?php echo e($item->name); ?></option>

                                                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php if($item->id == $sub->parent_id): ?>
                                                                                    <option value="<?php echo e($sub->taxonomy); ?>">
                                                                                        - -
                                                                                        <?php echo e($sub->name); ?>

                                                                                    </option>

                                                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if($sub->id == $sub_child->parent_id): ?>
                                                                                            <option
                                                                                                value="<?php echo e($sub_child->taxonomy); ?>">
                                                                                                - - - -
                                                                                                <?php echo e($sub_child->name); ?>

                                                                                            </option>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                <?php endif; ?>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="input-group col-md-6">
                                                                <input type="text" id="search_title_post"
                                                                    class="form-control pull-right"
                                                                    placeholder="Tiêu đề bản tin..." autocomplete="off">
                                                                <div class="input-group-btn">
                                                                    <button type="button"
                                                                        class="btn btn-default btn_search">
                                                                        <i class="fa fa-search"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.box-header -->
                                                    <div class="box-body table-responsive no-padding">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-md-1">ID</th>
                                                                    <th class="col-md-5">Tên</th>
                                                                    <th class="col-md-2">Danh mục</th>
                                                                    <th class="col-md-2">Đăng lúc</th>
                                                                    <th class="col-md-2">Chọn</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="post_available">

                                                            </tbody>
                                                        </table>
                                                    </div><!-- /.box-body -->
                                                </div><!-- /.box -->
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Publish'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="btn-set">


                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-save"></i> <?php echo app('translator')->get('Save'); ?>
                                </button>
                                &nbsp;&nbsp;
                                <a class="btn btn-success " href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                                    <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Status'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <select name="status" class=" form-control select2">
                                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset($detail->status) && $detail->status == $val ? 'checked' : ''); ?>>
                                            <?php echo app('translator')->get($val); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Paramater'); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php $__currentLoopData = $parameter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($val->parent_id == 0 || $val->parent_id == null): ?>
                                    <div class="form-group">
                                        <label><?php echo e($val->name); ?></label>
                                        <ul class="list-relation row">
                                            <?php $__currentLoopData = $parameter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->parent_id == $val->id): ?>
                                                    <div class="col-md-6">
                                                        <li>
                                                            <label for="page-<?php echo e($item->id); ?>">
                                                                <?php
                                                                    $val_name = Str::slug($val->name);
                                                                ?>
                                                                <input id="page-<?php echo e($item->id); ?>"
                                                                    name="json_params[paramater][<?php echo e($val_name); ?>][]"
                                                                    type="checkbox"
                                                                    <?php echo e(isset($detail->json_params->paramater->$val_name) && in_array($item->propety_value, $detail->json_params->paramater->$val_name) ? 'checked' : ''); ?>

                                                                    value="<?php echo e($item->propety_value); ?>">
                                                                <?php echo e($item->json_params->name->$lang ?? $item->name); ?>

                                                            </label>
                                                        </li>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border sw_featured d-flex-al-center">
                            <label class="switch ">
                                <input id="sw_featured" name="is_featured" value="1" type="checkbox"
                                    <?php echo e(isset($detail->is_featured) && $detail->is_featured == '1' ? 'checked' : ''); ?>>
                                <span class="slider round"></span>
                            </label>
                            <label class="box-title ml-1" for="sw_featured"><?php echo app('translator')->get('Is featured'); ?></label>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Order'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <input type="number" class="form-control" name="iorder"
                                    placeholder="<?php echo app('translator')->get('Order'); ?>" value="<?php echo e($detail->iorder ?? old('iorder')); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Categories'); ?> <small class="text-red">*</small></h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <ul class="list-relation">
                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                            <li>
                                                <label for="page-<?php echo e($item->id); ?>">
                                                    <input id="page-<?php echo e($item->id); ?>" name="relation[]"
                                                        <?php echo e(isset($relationship) && collect($relationship)->firstWhere('taxonomy_id', $item->id) != null ? 'checked' : ''); ?>

                                                        type="checkbox" value="<?php echo e($item->id); ?>">
                                                    <?php echo e($item->json_params->name->$lang ?? $item->name); ?>

                                                </label>
                                                <ul class="list-relation">
                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item1->parent_id == $item->id): ?>
                                                            <li>
                                                                <label for="page-<?php echo e($item1->id); ?>">
                                                                    <input id="page-<?php echo e($item1->id); ?>"
                                                                        name="relation[]" type="checkbox"
                                                                        <?php echo e(isset($relationship) && collect($relationship)->firstWhere('taxonomy_id', $item1->id) != null ? 'checked' : ''); ?>

                                                                        value="<?php echo e($item1->id); ?>">
                                                                    <?php echo e($item1->json_params->name->$lang ?? $item1->name); ?>

                                                                </label>
                                                                <ul class="list-relation">
                                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($item2->parent_id == $item1->id): ?>
                                                                            <li>
                                                                                <label for="page-<?php echo e($item2->id); ?>">
                                                                                    <input id="page-<?php echo e($item2->id); ?>"
                                                                                        name="relation[]" type="checkbox"
                                                                                        <?php echo e(isset($relationship) && collect($relationship)->firstWhere('taxonomy_id', $item2->id) != null ? 'checked' : ''); ?>

                                                                                        value="<?php echo e($item2->id); ?>">
                                                                                    <?php echo e($item2->json_params->name->$lang ?? $item2->name); ?>

                                                                                </label>
                                                                            </li>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Image'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group box_img_right <?php echo e(isset($detail->image) ? 'active' : ''); ?>">
                                <div id="image-holder">
                                    <?php if($detail->image != ''): ?>
                                        <img src="<?php echo e($detail->image); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(url('themes/admin/img/no_image.jpg')); ?>">
                                    <?php endif; ?>
                                </div>
                                <span class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i></span>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm"
                                            data-type="cms-image">
                                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Choose'); ?>
                                        </a>
                                    </span>
                                    <input id="image" class="form-control inp_hidden" type="hidden" name="image"
                                        placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($detail->image ?? ''); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Image thumb'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group box_img_right <?php echo e(isset($detail->image_thumb) ? 'active' : ''); ?>">
                                    <div id="image_thumb-holder">
                                        <?php if($detail->image_thumb != ''): ?>
                                            <img src="<?php echo e($detail->image_thumb); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('themes/admin/img/no_image.jpg')); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <span class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i></span>
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a data-input="image_thumb" data-preview="image_thumb-holder"
                                                class="btn btn-primary lfm" data-type="cms-image">
                                                <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('Choose'); ?>
                                            </a>
                                        </span>
                                        <input id="image_thumb" class="form-control inp_hidden" type="hidden"
                                            name="image_thumb" placeholder="<?php echo app('translator')->get('image_link'); ?>..."
                                            value="<?php echo e($detail->image_thumb ?? ''); ?>">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Page config'); ?></h3>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label><?php echo app('translator')->get('Template'); ?></label>
                                <small class="text-red">*</small>
                                <select name="json_params[template]" id="template" class="form-control select2"
                                    style="width:100%" required autocomplete="off">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php if(isset($route_default['template'])): ?>
                                        <?php $__currentLoopData = $route_default['template']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item['name']); ?>"
                                                <?php echo e(isset($detail->json_params->template) && $detail->json_params->template == $item['name'] ? 'selected' : ''); ?>>
                                                <?php echo app('translator')->get($item['title']); ?>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Widgets config'); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php $__currentLoopData = $widgetConfig; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                    <label><?php echo e($val->name); ?></label>
                                    <select name="widget[]" class=" form-control select2">
                                        <option value="0"><?php echo app('translator')->get('Please select'); ?></option>
                                        <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_wg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($val_wg->widget_code == $val->widget_code): ?>
                                                <option value="<?php echo e($val_wg->id); ?>"
                                                    <?php echo e(isset($detail->json_params->widget) && in_array($val_wg->id, $detail->json_params->widget) ? 'selected' : ''); ?>>
                                                    <?php echo app('translator')->get($val_wg->title); ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>


        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        CKEDITOR.replace('content_vi', ck_options);
        // Change to filter
        $(document).ready(function() {
            var no_image_link = '<?php echo e(url('themes/admin/img/no_image.jpg')); ?>';
            $('.inp_hidden').on('change', function() {
                $(this).parents('.box_img_right').addClass('active');
            });

            $('.box_img_right').on('click', '.btn-remove', function() {
                let par = $(this).parents('.box_img_right');
                par.removeClass('active');
                par.find('img').attr('src', no_image_link);
                par.find('input[type=hidden]').val("");
            });

            // Routes get all
            var routes = <?php echo json_encode(App\Consts::ROUTE_NAME ?? [], 15, 512) ?>;
            $(document).on('change', '#route_name', function() {
                let _value = $(this).val();
                let _targetHTML = $('#template');
                let _list = filterArray(routes, 'name', _value);
                let _optionList = '<option value=""><?php echo app('translator')->get('Please select'); ?></option>';
                if (_list) {
                    _list.forEach(element => {
                        element.template.forEach(item => {
                            _optionList += '<option value="' + item.name + '"> ' + item
                                .title + ' </option>';
                        });
                    });
                    _targetHTML.html(_optionList);
                }
                $(".select2").select2();
            });

            // Fill Available Blocks by template
            $(document).on('click', '.btn_search', function() {
                let keyword = $('#search_title_post').val();
                let taxonomy_id = $('#search_taxonomy_id').val();
                let _targetHTML = $('#post_available');
                _targetHTML.html('');
                let checked_post = [];
                $("input:checkbox:checked").each(function() {
                    checked_post.push($(this).val());
                });

                let url = "<?php echo e(route('cms_posts.search')); ?>/";
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {
                        keyword: keyword,
                        taxonomy_id: taxonomy_id,
                        other_list: checked_post,
                        is_type: "<?php echo e(App\Consts::TAXONOMY['post']); ?>"
                    },
                    success: function(response) {
                        if (response.message == 'success') {
                            let list = response.data || null;
                            let _item = '';
                            if (list.length > 0) {
                                list.forEach(item => {
                                    _item += '<tr>';
                                    _item += '<td>' + item.id + '</td>';
                                    _item += '<td>' + item.name + '</td>';
                                    _item += '<td>' + item.is_type + '</td>';
                                    _item += '<td>' + formatDate(item.created_at) +
                                        '</td> ';
                                    _item +=
                                        '<td><input name="json_params[related_post][]" type="checkbox" value="' +
                                        item.id +
                                        '" class="mr-15 related_post_item cursor" autocomplete="off"></td>';
                                    _item += '</tr>';
                                });
                                _targetHTML.html(_item);
                            }
                        } else {
                            _targetHTML.html('<tr><td colspan="5">' + response.message +
                                '</td></tr>');
                        }
                    },
                    error: function(response) {
                        // Get errors
                        let errors = response.responseJSON.message;
                        _targetHTML.html('<tr><td colspan="5">' + errors + '</td></tr>');
                    }
                });
            });

            // Checked and unchecked item event
            $(document).on('click', '.related_post_item', function() {
                let ischecked = $(this).is(':checked');
                let _root = $(this).closest('tr');
                let _targetHTML;

                if (ischecked) {
                    _targetHTML = $("#post_related");
                } else {
                    _targetHTML = $("#post_available");
                }
                _targetHTML.append(_root);
            });
            var no_image_link = '<?php echo e(url('themes/admin/img/no_image.jpg')); ?>';

            $('.add-gallery-image').click(function(event) {
            let keyRandom = new Date().getTime();
            let elementParent = $('.list-gallery-image');
            let elementAppend =
                '<div class="col-lg-3 col-md-3 col-sm-4 mb-1 gallery-image my-15">';
            elementAppend += '<div id="image-holder_' + keyRandom + '" style="width: 150px; height: 150px;"><img width="150px" height="150px" class="img-width" ';
            elementAppend += 'src="' + no_image_link + '"> </div>';
            elementAppend +=
                '<input type="text" name="json_params[gallery_image][]" class="hidden" id="gallery_image_' +
                keyRandom +
                '">';
            elementAppend += '<div class="btn-action">';
            elementAppend +=
                '<span class="btn btn-sm btn-success btn-upload lfm mr-5" data-input="gallery_image_' +
                keyRandom +
                '" data-type="cms-image" data-preview="image-holder_' + keyRandom + '">';
            elementAppend += '<i class="fa fa-upload"></i>';
            elementAppend += '</span>';
            elementAppend += '<span class="btn btn-sm btn-danger btn-remove">';
            elementAppend += '<i class="fa fa-trash"></i>';
            elementAppend += '</span>';
            elementAppend += '</div>';
            elementParent.append(elementAppend);

            $('.lfm').filemanager('image', {
                prefix: route_prefix
            });
        });
            // Change image for img tag gallery-image
            $('.list-gallery-image').on('change', 'input', function() {
                let _root = $(this).closest('.gallery-image');
                var img_path = $(this).val();
                _root.find('img').attr('src', img_path);
            });

            // Delete image
            $('.list-gallery-image').on('click', '.btn-remove', function() {
                // if (confirm("<?php echo app('translator')->get('confirm_action'); ?>")) {
                let _root = $(this).closest('.gallery-image');
                _root.remove();
                // }
            });

            $('.list-gallery-image').on('mouseover', '.gallery-image', function(e) {
                $(this).find('.btn-action').show();
            });
            $('.list-gallery-image').on('mouseout', '.gallery-image', function(e) {
                $(this).find('.btn-action').hide();
            });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/cms_posts/edit.blade.php ENDPATH**/ ?>