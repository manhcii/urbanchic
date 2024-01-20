

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
  <style>
      .box-choice{
        padding-right: 15px;
      }
      .box-choice a{
        cursor: pointer;
      }
      .modal-header{
        display: flex;
        align-items: center;
        color: #fff;
        background-color: #00A157;
      }
      .flex{
        display: flex;
      }
      .align-center{
        align-items: center;
      }
      .jus-between{
        justify-content: space-between;
      }
      .fa-dollar{
        bottom: 10px;
        right: 10px;
        color: #ccc;
      }
      .po_re{
        position: relative;
      }
      .po_ab{
        position: absolute;
      }
      .select2{
        width: 100% !important;
      }
      .boder-form{
        border: 0.5px solid #dee2e6;
      }
      .pd-t-l-20{
        padding: 0px 15px 20px 15px;
      }
      .back-gr-blue{
        background-color: #e7f1ff;
      }
  </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right"data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus"></i> <?php echo app('translator')->get('Select country'); ?>
      </a>


    </h1>
  </section>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h3 class="modal-title text-center col-md-12" id="exampleModalLabel">Add shipping region</h3>
          
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="name" value="Free delivery">
            <input type="hidden" name="type" value="price">
            <input type="hidden" name="shipping_fee" value="0.00">
            <input type="hidden" name="value_from" value="0.00">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Country</label>
              <select name="country_id" class="form-control select2 select_type" required>
                  <option value="">- - - Select Country - - -</option>
                  <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    if(in_array($coun->id,$list_country_ext)) continue;
                    ?>
                    <option value="<?php echo e($coun->id); ?>"><?php echo e($coun->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="Addshippingrule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h3 class="modal-title text-center col-md-12" id="exampleModalLabel">Add shipping region</h3>
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="" name="country_id" class="country-id-hidden">
            <div class="form-group">
              <label>
                  <?php echo app('translator')->get('Name'); ?> <small class="text-red">*</small>:
              </label>
              <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('Name'); ?>"
                  value="<?php echo e(old('name')); ?>" required>
            </div>
             
            <div class="form-group ">
              <label><?php echo app('translator')->get('Shipping_fee'); ?><small class="text-red">*</small>:</label>
              <div class="form-group po_re">
                  <input type="number" class="form-control" name="shipping_fee" placeholder="<?php echo app('translator')->get('Shipping_fee'); ?>"
                      value="0.00" required>
              </div>
            </div>
            <div class="form-group ">
                <label><?php echo app('translator')->get('Type'); ?><small class="text-red">*</small>:</label>
                <select name="type" class="form-control select2 select_type" required>
                    <?php $__currentLoopData = App\Consts::TYPE_SHIPING; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($t); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                </select>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label class="text_change">
                    Based on product's price (from) 
                </label><small class="text-red"> *</small>:
                <input type="number" class="form-control" value="0.00" name="value_from" required>
              </div>
              <div class="col-md-6">
                  <label class="text_change">
                      Based on product's price (to)
                  </label>
                  <input type="number" class="form-control" name="value_to"  >
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Main content -->
  <section class="content">
    <div class="content_alert">
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
    </div>
    <?php if(count($rows) == 0): ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo app('translator')->get('not_found'); ?>
      </div>
    <?php else: ?>
      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $rule_childs = App\Models\Ship::where('country_id',$value->country_id)->get();
        ?>

        <div class="box dd-item">
          <div class="flex align-center jus-between">
            <div class="box-header "><span>Country:</span>
              <h3 class="box-title font-weight-bold"><?php echo e($value->country_name); ?></h3>
            </div>
            <div class="box-choice">
              <a class="text-primary mr-10 add-shipping-rule" data-toggle="modal" data-country-id="<?php echo e($value->country_id); ?>" data-target="#Addshippingrule">Add shipping rule</a>
              <a data-id="<?php echo e($value->country_id); ?>" data-action="<?php echo e(route(Request::segment(2) . '.destroy', $value->country_id)); ?>" class="text-danger remove_country">Delete</a>
            </div>
          </div>
          <?php if($rule_childs): ?>
            <?php $__currentLoopData = $rule_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="dd-item-child" style="padding: 0px 20px 5px;">
              <div  class="widget meta-boxes boder-form ">
                <a data-toggle="collapse" data-parent="#accordion" href="#taxonomy<?php echo e($list->id); ?>"
                    aria-expanded="false" class="collapsed">
                    <h4  class="widget-title ">
                        <span><?php echo e($list->name); ?></span>
                        <i class="fa fa-angle-down narrow-icon"></i>
                    </h4>
                </a>

                <div id="taxonomy<?php echo e($list->id); ?>" class="panel-collapse collapse">
                  <div class="box-links-for-menu ">
                    <div class="the-box">
                      <form role="form" class="back-gr-blue" 
                        action="<?php echo e(route(Request::segment(2) . '.update', $list->id)); ?>"
                        method="POST">
                        <?php echo csrf_field(); ?>
                         <?php echo method_field('PUT'); ?>
                        <div class="form-body">
                          <input type="hidden" name="country_id" value="<?php echo e($list->country_id); ?>">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>
                                        <?php echo app('translator')->get('Name'); ?> <small class="text-red">*</small>:
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="<?php echo app('translator')->get('name'); ?>"
                                        value="<?php echo e($list->name??old('name')); ?>" required>
                                </div>
                            </div>
                              <div class="col-md-4 box_select">
                                  <div class="form-group">
                                      <label><?php echo app('translator')->get('Type'); ?><small class="text-red">*</small>:</label>
                                      <select name="type" class="form-control select2 select_type" required>
                                          <?php $__currentLoopData = App\Consts::TYPE_SHIPING; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($t); ?>"><?php echo e($value); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="col-md-8 box_product_change">
                                <div class="col-md-6">
                                  <div class="form-group po_re">
                                      <label class="text_change">
                                          Based on product's price (from) 
                                      </label><small class="text-red"> *</small>:
                                      <input type="number" class="form-control" value="<?php echo e($list->value_from?? old('value_from')); ?>" name="value_from" required><i class="fa fa-dollar po_ab"></i>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group po_re">
                                      <label class="text_change">
                                          Based on product's price (to)
                                      </label>
                                      <input type="number" class="form-control" name="value_to"value="<?php echo e($list->value_to ?? old('value_to ')); ?>"  ><i class="fa fa-dollar po_ab"></i>
                                  </div>
                                </div>
                              </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label><?php echo app('translator')->get('Shipping_fee'); ?><small class="text-red">*</small>:</label>
                                  <div class="form-group po_re">
                                      <input type="number" class="form-control" name="shipping_fee" placeholder="<?php echo app('translator')->get('Shipping_fee'); ?>"
                                          value="<?php echo e($list->shipping_fee ?? old('shipping_fee ')); ?>" required><i class="fa fa-dollar po_ab"></i>
                                  </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="text-end mt-2 pd-t-l-20">
                            <p class="btn btn-danger remove_rule btn-sm"
                                data-id="<?php echo e($list->id); ?>" data-action="<?php echo e(route(Request::segment(2) . '.destroy', $list->id)); ?>">
                                Delete</p>
                            <button
                                class="btn btn-primary btn-sm"><?php echo app('translator')->get('Save'); ?></button>
                                <button type="button" 
                                class="btn btn-default float-end btn-cancel"><?php echo app('translator')->get('Cancel'); ?></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.btn-cancel').click(function(){
          $(this).parents('.meta-boxes').find('a').click();
        })
        $('.select_type').change(function(){

          var text_price="Based on product's price";
          var text_weight="Based on product's weight (gam)";
          var val=$(this).val();
          if(val=="") {
           $(this).parents('.the-box').find('.box_product_change').hide();
           $(this).parents('.box_select').addClass('col-md-12').removeClass('col-md-4');
          }else{
            $(this).parents('.box_select').addClass('col-md-4').removeClass('col-md-12');
            $(this).parents('.the-box').find('.box_product_change').show();
            if(val=="price"){
              $(this).parents('.the-box').find('.text_change').html(text_price);
            }
            if(val=="weight"){
              $(this).parents('.the-box').find('.text_change').html(text_weight);
            }
            
          }
        })
        $(".add-shipping-rule").click(function(){
          var country=$(this).data('country-id');
          $('.country-id-hidden').val(country);
        })
        $('.remove_country').click(function() {
          if (confirm("<?php echo app('translator')->get('Are you sure you want to delete shipping area All?'); ?>")) {
            let _root = $(this).closest('.dd-item');
            let _url = $(this).data('action');
            let id = $(this).data('id');
            let _rule = 'country';
            $.ajax({
                method: 'delete',
                url: _url,
                data: {
                    id: id,
                    rule: _rule,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function(data) {
                    if (data.error == 0) {
                        _root.remove();
                        $(".content_alert").append('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" >&times;</button>'+data.msg+'</div>');
                        setTimeout(function() {
                            $(".alert-success").fadeOut(1000, function() {});
                        }, 2000);
                    } else {
                        alert(data.msg);   
                    }
                }
            });
          }
        });
        $('.remove_rule').click(function() {
          if (confirm("<?php echo app('translator')->get('Are you sure you want to delete shipping rule?'); ?>")) {
            let _root = $(this).closest('.dd-item-child');
            let _url = $(this).data('action');
            let id = $(this).data('id');
            let _rule = 'rule';
            $.ajax({
                method: 'delete',
                url: _url,
                data: {
                    id: id,
                    rule: _rule,
                    _token: '<?php echo e(csrf_token()); ?>',
                },
                success: function(data) {
                    if (data.error == 0) {
                        _root.remove();
                        $(".content_alert").append('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" >&times;</button>'+data.msg+'</div>');
                        setTimeout(function() {
                            $(".alert-success").fadeOut(1000, function() {});
                        }, 2000);
                    } else {
                        alert(data.msg);   
                    }
                }
            });
          }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/pages/ship/index.blade.php ENDPATH**/ ?>