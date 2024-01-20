

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

            <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
                    class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
        </h1>
        <div class="box_excel">
            <a href="<?php echo e(route('product.excel.export')); ?>">
                <button class="btn btn-sm btn-primary "><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    <?php echo app('translator')->get('Export Excel'); ?></button>
            </a>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                data-target="#import_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> <?php echo app('translator')->get('Import Excel'); ?></button>
        </div>
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

                        <div class="col-md-3">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Keyword'); ?> </label>
                                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                                    value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Post category'); ?></label>
                                <select name="taxonomy_id" id="taxonomy_id" class="form-control select2"
                                    style="width: 100%;">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                            <option value="<?php echo e($item->id); ?>"
                                                <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $item->id ? 'selected' : ''); ?>>
                                                <?php echo e($item->name); ?></option>
                                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->id == $sub->parent_id): ?>
                                                    <option value="<?php echo e($sub->id); ?>"
                                                        <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub->id ? 'selected' : ''); ?>>
                                                        - -
                                                        <?php echo e($sub->name); ?>

                                                    </option>
                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($sub->id == $sub_child->parent_id): ?>
                                                            <option value="<?php echo e($sub_child->id); ?>"
                                                                <?php echo e(isset($params['taxonomy_id']) && $params['taxonomy_id'] == $sub_child->id ? 'selected' : ''); ?>>
                                                                - - - -
                                                                <?php echo e($sub_child->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    <?php $__currentLoopData = $postStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                                            <?php echo e(__($value)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Is featured'); ?></label>
                                <select name="is_featured" id="is_featured" class="form-control select2"
                                    style="width: 100%;">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = $booleans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"
                                            <?php echo e(isset($params['is_featured']) && $key == $params['is_featured'] ? 'selected' : ''); ?>>
                                            <?php echo app('translator')->get($value); ?></option>
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
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->is_default == 1 && $item->lang_locale != Request::get('lang')): ?>
                            <?php if(Request::get('lang') != ''): ?>
                                <a class="text-primary pull-right" href="<?php echo e(route(Request::segment(2) . '.index')); ?>"
                                    style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if(Request::get('lang') != $item->lang_locale): ?>
                                <a class="text-primary pull-right"
                                    href="<?php echo e(route(Request::segment(2) . '.index')); ?>?lang=<?php echo e($item->lang_locale); ?>"
                                    style="padding-left: 15px">
                                    <i class="fa fa-language"></i> <?php echo e(__($item->lang_name)); ?>

                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <span class="pull-right"><?php echo app('translator')->get('Translations'); ?>: </span>
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
                                <th><?php echo app('translator')->get('Image'); ?></th>
                                <th style="width: 25%"><?php echo app('translator')->get('Url Mapping'); ?></th>
                                
                                <th><?php echo app('translator')->get('Is featured'); ?></th>
                                <th><?php echo app('translator')->get('Order'); ?></th>
                                <th><?php echo app('translator')->get('Updated at'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                                    <form action="<?php echo e(route(Request::segment(2) . '.destroy', $row->id)); ?>" method="POST"
                                        onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                                        <tr class="valign-middle">
                                            <td>
                                                <strong
                                                    style="font-size: 14px"><?php echo e($row->json_params->name->{$lang} ?? $row->name); ?></strong>
                                            </td>
                                            <?php
                                                $url_mapping = route('frontend.page', ['taxonomy' => $row->alias ?? '']);
                                            ?>
                                            <td>
                                                <img width="100px"
                                                    src="<?php echo e($row->image ?? url('themes/admin/img/no_image.jpg')); ?>"
                                                    alt="<?php echo e($row->name); ?>">
                                            </td>
                                            <td>
                                                <a href="<?php echo e($url_mapping); ?>" target="_blank"
                                                    rel="noopener noreferrer"><?php echo e($url_mapping); ?></a>
                                                <a target="_new" href="<?php echo e($url_mapping); ?>" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('Link'); ?>" data-original-title="<?php echo app('translator')->get('Link'); ?>">
                                                    <span class="btn btn-flat btn-xs btn-info">
                                                        <i class="fa fa-external-link"></i>
                                                    </span>
                                                </a>
                                            </td>
                                            
                                            <td class="wrap-load-hot" data-token="<?php echo e(csrf_token()); ?>" data-url="<?php echo e(route('admin.updateIsfeatured',['table'=>'cms_products', 'id'=>$row->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-is_featured',['data'=>$row,'type'=>'bản ghi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                            <td>
                                                <input data-token="<?php echo e(csrf_token()); ?>" data-url="<?php echo e(route('admin.loadOrderVeryModel',['table'=>'cms_products','id'=>$row->id])); ?> " class="lb-order text-center"  type="number" min="0" value="<?php echo e($row->iorder?$row->iorder:0); ?>" style="width:50px" />
                                              </td>
                                            <td>
                                                <?php echo e($row->updated_at); ?>

                                            </td>
                                            <td class="wrap-load-active" data-token="<?php echo e(csrf_token()); ?>" data-url="<?php echo e(route('admin.loadStatusProduct',['id'=>$row->id])); ?>">
                                                <?php echo $__env->make('admin.components.load-change-status',['data'=>$row,'type'=>'bản ghi'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                    title="<?php echo app('translator')->get('Update'); ?>" data-original-title="<?php echo app('translator')->get('Update'); ?>"
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
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        Tìm thấy <?php echo e($rows->total()); ?> kết quả
                    </div>
                    <div class="col-sm-7">
                        <?php echo e($rows->withQueryString()->links('admin.pagination.default')); ?>

                    </div>
                </div>
            </div>

        </div>
    </section>

    <div id="import_excel" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php echo app('translator')->get('Import Excel'); ?></h4>
                </div>
                <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST"
                    id="form_product" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body row">
                        <input type="hidden" name="import" value="true">
                        <input type="hidden" name="name" value="import">
                        <input type="hidden" name="is_type" value="<?php echo e(App\Consts::TAXONOMY['product']); ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Language'); ?></label>
                                <select name="lang" class="form-control select2" style="width: 100%;">
                                    <?php if(isset($languages)): ?>
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->lang_locale); ?>"
                                                <?php echo e($item->is_default == 1 ? 'selected' : ''); ?>>
                                                <?php echo e($item->lang_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Route Name'); ?></label>
                                <small class="text-red">*</small>
                                <select name="route_name" id="route_name" required class="form-control select2"
                                    style="width:100%" required autocomplete="off">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                    <?php $__currentLoopData = $route_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item['name']); ?>"
                                            <?php echo e(isset($detail->json_params->route_name) && $detail->json_params->route_name == $item['name'] ? 'selected' : ''); ?>>
                                            <?php echo e(__($item['title'])); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Template'); ?></label>
                                <small class="text-red">*</small>
                                <select name="template" id="template" required class="form-control select2"
                                    style="width:100%" required autocomplete="off">
                                    <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('Paramater'); ?></label>
                                <ul class="list-relation">
                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
                                            <li>
                                                <label for="page-<?php echo e($item->id); ?>">
                                                    <input id="page-<?php echo e($item->id); ?>" name="relation[]"
                                                        <?php echo e(isset($relationship) && collect($relationship)->firstWhere('taxonomy_id', $item->id) != null ? 'checked' : ''); ?>

                                                        type="checkbox" value="<?php echo e($item->id); ?>">
                                                    <?php echo e($item->name); ?>

                                                </label>
                                                <ul class="list-relation row">
                                                    <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item1->parent_id == $item->id): ?>
                                                            <li class="col-md-6">
                                                                <label for="page-<?php echo e($item1->id); ?>">
                                                                    <input id="page-<?php echo e($item1->id); ?>"
                                                                        name="relation[]" type="checkbox"
                                                                        <?php echo e(isset($relationship) && collect($relationship)->firstWhere('taxonomy_id', $item1->id) != null ? 'checked' : ''); ?>

                                                                        value="<?php echo e($item1->id); ?>">
                                                                    <?php echo e($item1->name); ?>

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
                                                                                    <?php echo e($item2->name); ?>

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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('File'); ?> <a href="<?php echo e(url('data/images/Import_excel.png')); ?>"
                                        target="_blank">(<?php echo app('translator')->get('Sample file structure'); ?>)</a></label>
                                <small class="text-red">*</small>
                                <input id="file" class="form-control" type="file" required name="file"
                                    placeholder="<?php echo app('translator')->get('Select File'); ?>" value="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"
                                aria-hidden="true"></i> <?php echo app('translator')->get('Import'); ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
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

        });
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\fruit\resources\views/admin/pages/cms_products/index.blade.php ENDPATH**/ ?>