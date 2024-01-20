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
<?php $__env->startSection('content-header'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo e($module_name); ?>

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>">
                <i class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?>
            </a>
        </h1>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">

        
        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('Filter'); ?></h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <form action="<?php echo e(route(Request::segment(2) . '.index')); ?>" method="GET">
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                                <input type="text" class="form-control" name="keyword"
                                    placeholder="<?php echo e(__('Title') . '...'); ?>" value="<?php echo e($params['keyword'] ?? ''); ?>">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Taxonomy'); ?></label>
                                <select name="taxonomy" id="taxonomy" class="form-control select2" style="width: 100%;">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = App\Consts::TAXONOMY; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key == $params['taxonomy']): ?>
                                            <option value="<?php echo e($key); ?>"
                                                <?php echo e(isset($params['taxonomy']) && $key == $params['taxonomy'] ? 'selected' : ''); ?>>
                                                <?php echo e(__($value)); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Status'); ?></label>
                                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = App\Consts::TAXONOMY_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                                            <?php echo e(__($value)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>



                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Filter'); ?></label>
                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm mr-10"><?php echo app('translator')->get('Submit'); ?></button>
                                    <a class="btn btn-default btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
                                        <?php echo app('translator')->get('Reset'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('List'); ?></h3>
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
                                                <a href="<?php echo e(route(Request::segment(2) . '.index')); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                                    style="padding-top:10px; padding-bottom:10px;">
                                                    <i class="fa fa-language"></i>
                                                    <?php echo e($item->lang_name); ?>

                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo e(route(Request::segment(2) . '.index')); ?>"
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
                        <?php echo app('translator')->get('not_found'); ?>
                    </div>
                <?php else: ?>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Title'); ?></th>
                                <th><?php echo app('translator')->get('Taxonomy'); ?></th>
                                <th><?php echo app('translator')->get('Url Mapping'); ?></th>
                                <th><?php echo app('translator')->get('Order'); ?></th>
                                <th><?php echo app('translator')->get('Updated at'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($rows): ?>
                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                                        <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>"
                                            method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                            <tr class="valign-middle">
                                                <td>
                                                    <strong
                                                        style="font-size: 14px;"><?php echo e($row->json_params->name->$lang ?? $row->name); ?></strong>
                                                </td>
                                                <td>
                                                    <?php echo e(__(App\Consts::TAXONOMY[$row->taxonomy] ?? '')); ?>

                                                </td>
                                                <?php
                                                    $url_mapping = route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $row->alias ?? '']);
                                                ?>
                                                <td>
                                                    <a href="<?php echo e($url_mapping); ?>" target="_blank"
                                                        rel="noopener noreferrer"><?php echo e($url_mapping); ?></a>
                                                    <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip"
                                                        title="<?php echo app('translator')->get('Link'); ?>"
                                                        data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                                        <span class="btn btn-flat btn-xs btn-info">
                                                            <i class="fa fa-external-link"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                                <td>
                                                    <input data-token="<?php echo e(csrf_token()); ?>"
                                                        data-url="<?php echo e(route('admin.loadOrderVeryModel', ['table' => 'productCategory', 'id' => $row->id])); ?> "
                                                        class="lb-order text-center" type="number" min="0"
                                                        value="<?php echo e($row->iorder ? $row->iorder : 0); ?>"
                                                        style="width:50px" />
                                                </td>
                                                <td>
                                                    <?php echo e($row->updated_at); ?>

                                                </td>
                                                <td class="wrap-load-active" data-token="<?php echo e(csrf_token()); ?>"
                                                    data-url="<?php echo e(route('admin.loadStatusProductCategory', ['id' => $row->id])); ?>">
                                                    <?php echo $__env->make('admin.components.load-change-status', [
                                                        'data' => $row,
                                                        'type' => 'bản ghi',
                                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                        title="<?php echo app('translator')->get('Update'); ?>"
                                                        data-original-title="<?php echo app('translator')->get('Update'); ?>"
                                                        href="<?php echo e(route(Request::segment(2) . '.edit', $row->id)); ?>">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                        data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>"
                                                        data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>

                                        <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($sub->parent_id == $row->id): ?>
                                                <form action="<?php echo e(route(Request::segment(2) . '.destroy', $sub->id)); ?>"
                                                    method="POST" onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                                    <tr class="valign-middle bg-gray-light">

                                                        <td>
                                                            - - - - <?php echo e($sub->json_params->name->$lang ?? $sub->name); ?>

                                                        </td>
                                                        <td>
                                                            <?php echo e(__(App\Consts::TAXONOMY[$sub->taxonomy] ?? '')); ?>

                                                        </td>
                                                        <?php
                                                            $url_mapping = route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $sub->alias ?? '']);
                                                        ?>
                                                        <td>
                                                            <a href="<?php echo e($url_mapping); ?>" target="_blank"
                                                                rel="noopener noreferrer"><?php echo e($url_mapping); ?></a>
                                                            <a target="_new" href="<?php echo e($url_mapping); ?>"
                                                                data-toggle="tooltip" title="<?php echo app('translator')->get('Link'); ?>"
                                                                data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                                                <span class="btn btn-flat btn-xs btn-info">
                                                                    <i class="fa fa-external-link"></i>
                                                                </span>
                                                            </a>
                                                        </td>

                                                        <td>
                                                            - - - -<input data-token="<?php echo e(csrf_token()); ?>"
                                                                data-url="<?php echo e(route('admin.loadOrderVeryModel', ['table' => 'productCategory', 'id' => $sub->id])); ?> "
                                                                class="lb-order text-center" type="number"
                                                                min="0"
                                                                value="<?php echo e($sub->iorder ? $sub->iorder : 0); ?>"
                                                                style="width:50px" />
                                                        </td>
                                                        <td>
                                                            <?php echo e($sub->updated_at); ?>

                                                        </td>
                                                        <td class="wrap-load-active" data-token="<?php echo e(csrf_token()); ?>"
                                                            data-url="<?php echo e(route('admin.loadStatusProductCategory', ['id' => $sub->id])); ?>">
                                                            <?php echo $__env->make(
                                                                'admin.components.load-change-status',
                                                                ['data' => $sub, 'type' => 'bản ghi']
                                                            , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                                title="<?php echo app('translator')->get('Update'); ?>"
                                                                data-original-title="<?php echo app('translator')->get('Update'); ?>"
                                                                href="<?php echo e(route(Request::segment(2) . '.edit', $sub->id)); ?>">
                                                                <i class="fa fa-pencil-square-o"></i>
                                                            </a>
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button class="btn btn-sm btn-danger" type="submit"
                                                                data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>"
                                                                data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </form>

                                                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($sub_child->parent_id == $sub->id): ?>
                                                        <form
                                                            action="<?php echo e(route(Request::segment(2) . '.destroy', $sub_child->id)); ?>"
                                                            method="POST"
                                                            onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                                            <tr class="valign-middle bg-gray-light">
                                                                <td>
                                                                    - - - - - -
                                                                    <?php echo e($sub_child->json_params->name->$lang ?? $sub_child->name); ?>

                                                                </td>
                                                                <td>
                                                                    <?php echo e(__(App\Consts::TAXONOMY[$sub_child->taxonomy] ?? '')); ?>

                                                                </td>
                                                                <?php
                                                                    $url_mapping = route('frontend.page', ['taxonomy' => App\Consts::ROUTE_TAXONOMY['product'], 'alias' => $sub_child->alias ?? '']);
                                                                ?>
                                                                <td>
                                                                    <a href="<?php echo e($url_mapping); ?>" target="_blank"
                                                                        rel="noopener noreferrer"><?php echo e($url_mapping); ?></a>
                                                                    <a target="_new" href="<?php echo e($url_mapping); ?>"
                                                                        data-toggle="tooltip" title="<?php echo app('translator')->get('Link'); ?>"
                                                                        data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                                                        <span class="btn btn-flat btn-xs btn-info">
                                                                            <i class="fa fa-external-link"></i>
                                                                        </span>
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    - - - - -<input data-token="<?php echo e(csrf_token()); ?>"
                                                                        data-url="<?php echo e(route('admin.loadOrderVeryModel', ['table' => 'productCategory', 'id' => $sub_child->id])); ?> "
                                                                        class="lb-order text-center" type="number"
                                                                        min="0"
                                                                        value="<?php echo e($sub_child->iorder ? $sub_child->iorder : 0); ?>"
                                                                        style="width:50px" />
                                                                </td>
                                                                <td>
                                                                    <?php echo e($sub_child->updated_at); ?>

                                                                </td>
                                                                <td class="wrap-load-active"
                                                                    data-token="<?php echo e(csrf_token()); ?>"
                                                                    data-url="<?php echo e(route('admin.loadStatusProductCategory', ['id' => $sub_child->id])); ?>">
                                                                    <?php echo $__env->make(
                                                                        'admin.components.load-change-status',
                                                                        [
                                                                            'data' => $sub_child,
                                                                            'type' => 'bản ghi',
                                                                        ]
                                                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-sm btn-warning"
                                                                        data-toggle="tooltip" title="<?php echo app('translator')->get('Update'); ?>"
                                                                        data-original-title="<?php echo app('translator')->get('Update'); ?>"
                                                                        href="<?php echo e(route(Request::segment(2) . '.edit', $sub_child->id)); ?>">
                                                                        <i class="fa fa-pencil-square-o"></i>
                                                                    </a>
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button class="btn btn-sm btn-danger" type="submit"
                                                                        data-toggle="tooltip" title="<?php echo app('translator')->get('Delete'); ?>"
                                                                        data-original-title="<?php echo app('translator')->get('Delete'); ?>">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </form>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/pages/product_category/index.blade.php ENDPATH**/ ?>