

<?php $__env->startSection('title'); ?>
    <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
      .w-50{
        width: 50%;
      }
      .enter_number, .d-none{
        display: none;
      }
      .random_coupon{
        cursor: pointer;
      }
  </style>
<?php $__env->stopSection(); ?>

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
        <form role="form"action="<?php echo e(route(Request::segment(2) . '.update', $detail->id)); ?>" method="POST" id="form_discount">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Update form'); ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="box-body">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1" data-toggle="tab">
                                            <h5>Thông tin chính <span class="text-danger">*</span></h5>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="d-flex-wap">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Name'); ?> <small class="text-red">*</small></label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="<?php echo app('translator')->get('Name Coupon'); ?>" value="<?php echo e($detail->name); ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Create coupon code'); ?> <small class="text-red">*</small></label>
                                                    <a class="pull-right random_coupon"><?php echo app('translator')->get('Random coupon code'); ?> </a>
                                                    <input type="text" class="form-control coupon_code" name="coupon_code"
                                                        placeholder="<?php echo app('translator')->get('Customers will enter this coupon code when they checkout.'); ?>" value="<?php echo e($detail->coupon_code); ?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type='hidden' value='' name='is_unlimited'>
                                                <input type="checkbox" id="unlimited" name="is_unlimited" <?php echo e($detail->is_unlimited=="unlimited"? "checked":""); ?>  value="unlimited">
                                                <label for="unlimited"><?php echo app('translator')->get('Unlimited coupon'); ?> </label>
                                            </div>

                                            <div class="col-md-12 is_unlimited_block <?php echo e($detail->is_unlimited=="unlimited"? "enter_number":""); ?>">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Enter quantity'); ?> </label>
                                                    <input type="number" required <?php echo e($detail->is_unlimited=="unlimited"? "disabled":""); ?> class="form-control w-50 coupon_quantity" value="<?php echo e($detail->is_unlimited=="unlimited"? "":$detail->coupon_quantity); ?>" name="coupon_quantity">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr style="border-top: dashed 2px #a94442; margin: 10px 0px;">
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Coupon type'); ?>  <small class="text-red">*</small></label>
                                                    <select required style="width: 100%;" name="coupon_type" class=" form-control select2 ">
                                                        <?php $__currentLoopData = App\Consts::TYPE_DISCOUNT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($detail->coupon_type==$k? "selected":""); ?> value="<?php echo e($k); ?>" ><?php echo app('translator')->get($val); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Discount'); ?>  <small class="text-red">*</small></label>
                                                    <input type="number" name="discount" class="form-control"  value="<?php echo e($detail->discount??1); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 "> 
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('Apply for'); ?>  <small class="text-red">*</small></label>
                                                    <select style="width: 100%;" name="apply_for" class="apply_for form-control select2">
                                                        <?php $__currentLoopData = App\Consts::APPLY_FOR; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($detail->apply_for==$k? "selected":""); ?> value="<?php echo e($k); ?>" ><?php echo app('translator')->get($val); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none amount-minimum-order apply_list">
                                                <label><?php echo app('translator')->get('Order amount from'); ?>  </label> 
                                                <div class="form-group">
                                                    <input type="text" value="<?php echo e($detail->amount_minimum_order); ?>" required name="amount_minimum_order" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <?php
                                                $arr_specific_product=explode(',', $detail->specific_product);
                                                $arr_category_product=explode(',', $detail->category_product);
                                                $arr_customer=explode(',', $detail->customer);
                                            ?>
                                            <div class="col-md-6 d-none specific-product apply_list">
                                                <label><?php echo app('translator')->get('Select Product'); ?>  </label> 
                                                <div class="form-group">
                                                    <select disabled required style="width: 100%;" multiple name="specific_product[]" class="form-control select2">
                                                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(in_array($pro->id, $arr_specific_product)?"selected":""); ?> value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none category-product apply_list">
                                                <label><?php echo app('translator')->get('Category product'); ?>  </label> 
                                                <div class="form-group">
                                                    <select disabled required  style="width: 100%;" multiple name="category_product[]" class="form-control select2">
                                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(in_array($cate->id, $arr_category_product)?"selected":""); ?> value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 d-none customer apply_list">
                                                <label><?php echo app('translator')->get('Customers'); ?>  </label>
                                                <div class="form-group"> 
                                                    <select disabled required style="width: 100%;" multiple name="customer[]" class="form-control select2">
                                                        <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e(in_array($us->id, $arr_customer)?"selected":""); ?> value="<?php echo e($us->id); ?>"><?php echo e($us->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->

                        </div>
                        <!-- /.box-body -->


                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Publish'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="btn-set">
                                <button type="submit" class="btn btn-info submit_form">
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
                                            <?php echo e(( $detail->status == $key) ? 'selected' : ''); ?>>
                                            <?php echo app('translator')->get($val); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('Start date'); ?> <small class="text-red">*</small></h3>
                        </div>
                        <div class="box-body">
                            <?php
                            $dts = new DateTime;
                            $dte = new DateTime;
                            $dts->setTime(0, 0);
                            $dte->setTime(23, 59);
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="datetime-local" required class="form-control" name="time_start" value="<?php echo e($detail->time_start ?? $dts->format('Y-m-d\TH:i:s')); ?>">
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo app('translator')->get('End date'); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="row">   
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input required <?php echo e($detail->never_expired==1? "disabled":""); ?> type="datetime-local" class="form-control end_time" name="time_end" value="<?php echo e($detail->time_end ?? $dte->format('Y-m-d\TH:i:s')); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body"> 
                            <input type="hidden" name="never_expired" value=""> 
                            <input type="checkbox" value="1" name="never_expired" <?php echo e($detail->never_expired==1 ? "checked":""); ?>  id="never_expired">    
                            <label ><?php echo app('translator')->get('Never expired'); ?></label>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
    $(document).ready(function(){
        $('.apply_for').trigger('change');
    })
    $("#form_discount").validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".form-group"));
            error.wrap("<label class='text-red '>");
        },
        rules: {
            'coupon_quantity': {
                required:true,
                min:1
            },
            'discount': {
                required:true,
                min:1
            },
            'amount-minimum-order': {
                required:true,
                min:1
            },
        },
        
    });    
    function randoms(length = 8){
        let chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let str = '';
        for (let i = 0; i < length; i++) {
            str += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        return str;
    }
    $('.random_coupon').click(function(){
        var random=randoms(10);
        $('.coupon_code').val(random);
    })
     $('#unlimited').click(function(){
        if($(this).is(':checked')) {
            $(".is_unlimited_block").addClass('enter_number');
            $(".coupon_quantity").prop('disabled', true);
        }
        else { 
            $(".is_unlimited_block").removeClass('enter_number');
            $(".coupon_quantity").prop('disabled', false);
        }
    })
    $('#never_expired').click(function(){
        if($(this).is(':checked')) 
            $(".end_time").prop('disabled', true);
        else $(".end_time").prop('disabled', false);
    })
    $('.apply_for').change(function(){
        $('.apply_list').hide();
        $('.apply_list input').prop('disabled', true);
        $('.apply_list select').prop('disabled', true);
        var value=$(this).val();
        if(value=='amount-minimum-order') {
            $('.amount-minimum-order').show();
            $('.amount-minimum-order input').prop('disabled', false);
        }
        if(value=='specific-product'){
            $('.specific-product').show();
            $('.specific-product select').prop('disabled', false);
        } 
        if(value=='category-product'){
            $('.category-product').show();
            $('.category-product select').prop('disabled', false);
        } 
        if(value=='customer'){
            $('.customer').show();
            $('.customer select').prop('disabled', false);
        } 
    })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/pages/discounts/edit.blade.php ENDPATH**/ ?>