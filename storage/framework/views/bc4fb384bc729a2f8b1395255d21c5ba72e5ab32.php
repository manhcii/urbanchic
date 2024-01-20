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
            <h3 class="box-title"><?php echo app('translator')->get('Parent element'); ?></h3>
        </div>

        <div class="box-body">
            <div class="form-group">
                <select name="parent_id" class=" form-control select2">
                    <option value="">== <?php echo app('translator')->get('ROOT'); ?> ==</option>
                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            if (isset($detail->id) && $detail->id == $val->id) {
                                continue;
                            }
                        ?>
                        <?php if(empty($val->parent_id)): ?>
                            <option value="<?php echo e($val->id); ?>"
                                <?php echo e(isset($detail->parent_id) && $val->id != $detail->id && $detail->parent_id == $val->id ? 'selected' : ''); ?>>
                                <?php echo app('translator')->get($val->name); ?></option>
                            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if (isset($detail->id) && $detail->id == $val1->id) {
                                        continue;
                                    }
                                ?>
                                <?php if($val1->parent_id == $val->id): ?>
                                    <option value="<?php echo e($val1->id); ?>"
                                        <?php echo e(isset($detail->parent_id) && $val1->id != $detail->id && $detail->parent_id == $val1->id ? 'selected' : ''); ?>>
                                        - - <?php echo app('translator')->get($val1->name); ?></option>
                                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            if (isset($detail->id) && $detail->id == $val2->id) {
                                                continue;
                                            }
                                        ?>
                                        <?php if($val2->parent_id == $val1->id): ?>
                                            <option value="<?php echo e($val2->id); ?>"
                                                <?php echo e(isset($detail->parent_id) && $val2->id != $detail->id && $detail->parent_id == $val2->id ? 'selected' : ''); ?>>
                                                - - - - <?php echo app('translator')->get($val2->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
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
                            <?php echo e(isset($detail->status) && $detail->status == $val ? 'checked' : ''); ?>><?php echo app('translator')->get($val); ?>
                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo app('translator')->get('Order'); ?></h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('Order'); ?>"
                    value="<?php echo e($detail->iorder ?? old('iorder')); ?>">
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo app('translator')->get('Image'); ?></h3>
        </div>
        <div class="box-body">
            <div class="form-group box_img_right <?php echo e(isset($detail->json_params->image) ? 'active' : ''); ?>">
                <div id="image-holder">
                    <?php if(isset($detail->json_params->image) && $detail->json_params->image != ''): ?>
                        <img src="<?php echo e($detail->json_params->image); ?>">
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
                    <input id="image" class="form-control inp_hidden" type="hidden" name="json_params[image]"
                        placeholder="<?php echo app('translator')->get('Image source'); ?>" value="<?php echo e($detail->json_params->image ?? ''); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo app('translator')->get('Image backgroud'); ?></h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <div class="form-group box_img_right <?php echo e(isset($detail->json_params->image_thumb) ? 'active' : ''); ?>">
                    <div id="image_thumb-holder">
                        <?php if(isset($detail->json_params->image_thumb) && $detail->json_params->image_thumb != ''): ?>
                            <img src="<?php echo e($detail->json_params->image_thumb); ?>">
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
                            name="json_params[image_thumb]" placeholder="<?php echo app('translator')->get('image_link'); ?>..."
                            value="<?php echo e($detail->json_params->image_thumb ?? ''); ?>">
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
                <select name="json_params[template]" id="template" class="form-control select2" style="width:100%"
                    required autocomplete="off">
                    <option value="" disabled><?php echo app('translator')->get('Please select'); ?></option>
                    <?php if(isset($route_default['template'])): ?>
                        <?php $__currentLoopData = $route_default['template']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item['name']); ?>"
                                <?php echo e(isset($detail->json_params->template) && $detail->json_params->template == $item['name'] ? 'selected' : ($loop->index==0?'selected':'')); ?>>
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
<?php /**PATH C:\xampp\htdocs\pizza\resources\views/admin/pages/includes/slide_taxonomy.blade.php ENDPATH**/ ?>