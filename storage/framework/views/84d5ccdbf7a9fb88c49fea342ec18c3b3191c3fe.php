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
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo app('translator')->get('Default Website settings'); ?></h3>
                <?php if(isset($languages)): ?>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->is_default): ?>
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
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="lang" value="<?php echo e(Request::get('lang')); ?>">
                <div class="box-body">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs col-md-3">
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab">
                                    <h5>
                                        <i class="fa fa-home"></i>
                                        <?php echo app('translator')->get('General information'); ?>
                                    </h5>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_2" data-toggle="tab">
                                    <h5>
                                        <i class="fa fa-image"></i>
                                        <?php echo app('translator')->get('System image'); ?>
                                    </h5>
                                </a>
                            </li>
                            <li>
                                <a href="#tab_3" data-toggle="tab">
                                    <h5>
                                        <i class="fa fa-link"></i>
                                        <?php echo app('translator')->get('Social links'); ?>
                                    </h5>
                                </a>
                            </li>

                        </ul>
                        <div class="tab-content col-md-9">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Site title'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="site_title"
                                                placeholder="<?php echo app('translator')->get('Site title'); ?>"
                                                value="<?php echo e(old('site_title') ?? ($lang == $languageDefault->lang_locale ? $setting->site_title : $setting->{$lang . '-site_title'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('SEO title'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="seo_title"
                                                placeholder="<?php echo app('translator')->get('SEO title'); ?>"
                                                value="<?php echo e(old('seo_title') ?? ($lang == $languageDefault->lang_locale ? $setting->seo_title : $setting->{$lang . '-seo_title'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('SEO keyword	'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="seo_keyword"
                                                placeholder="<?php echo app('translator')->get('SEO keyword	'); ?>"
                                                value="<?php echo e(old('seo_keyword') ?? ($lang == $languageDefault->lang_locale ? $setting->seo_keyword : $setting->{$lang . '-seo_keyword'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('SEO description'); ?>
                                            </label>
                                            <textarea name="seo_description" id="seo_description" class="form-control" rows="5" placeholder="SEO description">
                                                <?php echo e(old('seo_description') ?? ($lang == $languageDefault->lang_locale ? $setting->seo_description : $setting->{$lang . '-seo_description'})); ?>

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Hotline'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="hotline"
                                                placeholder="<?php echo app('translator')->get('Hotline'); ?>"
                                                value="<?php echo e(old('hotline') ?? ($lang == $languageDefault->lang_locale ? $setting->hotline : $setting->{$lang . '-hotline'})); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Phone'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="<?php echo app('translator')->get('Phone'); ?>"
                                                value="<?php echo e(old('phone') ?? ($lang == $languageDefault->lang_locale ? $setting->phone : $setting->{$lang . '-phone'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Fax'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="fax"
                                                placeholder="<?php echo app('translator')->get('Fax'); ?>"
                                                value="<?php echo e(old('fax') ?? ($lang == $languageDefault->lang_locale ? $setting->fax : $setting->{$lang . '-fax'})); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Email'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="<?php echo app('translator')->get('Email'); ?>"
                                                value="<?php echo e(old('email') ?? ($lang == $languageDefault->lang_locale ? $setting->email : $setting->{$lang . '-email'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Address'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="<?php echo app('translator')->get('Address'); ?>"
                                                value="<?php echo e(old('address') ?? ($lang == $languageDefault->lang_locale ? $setting->address : $setting->{$lang . '-address'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Currency unit'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="currency_unit"
                                                placeholder="<?php echo app('translator')->get('Currency unit'); ?>"
                                                value="<?php echo e(old('currency_unit') ?? ($lang == $languageDefault->lang_locale ? $setting->currency_unit : ($setting->{$lang . '-currency_unit'}??''))); ?>">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    

                                    <?php $__currentLoopData = $all_setting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($value->description == 'image'): ?>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo e($value->option_name); ?></label>
                                                    <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a data-input="<?php echo e($value->option_name); ?>"
                                                                data-preview="<?php echo e($value->option_name); ?>-holder"
                                                                data-type="cms-image" class="btn btn-primary lfm">
                                                                <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                                                            </a>
                                                        </span>
                                                        <input id="<?php echo e($value->option_name); ?>" class="form-control"
                                                            type="text" name="<?php echo e($value->option_name); ?>"
                                                            placeholder="<?php echo app('translator')->get('image_link'); ?>..."
                                                            value="<?php echo e(old($value->option_name) ?? $value->option_value); ?>">
                                                    </div>
                                                    <div id="<?php echo e($value->option_name); ?>-holder"
                                                        style="margin-top:15px;max-height:100px;">
                                                        <?php if(isset($value) && $value->option_value != ''): ?>
                                                            <img style="height: 5rem;"
                                                                src="<?php echo e(old($value->option_name) ?? $value->option_value); ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_3">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Facebook url'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="facebook_url"
                                                placeholder="<?php echo app('translator')->get('Facebook url'); ?>"
                                                value="<?php echo e(old('facebook_url') ?? ($lang == $languageDefault->lang_locale ? $setting->facebook_url : $setting->{$lang . '-facebook_url'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Twitter url'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="twitter_url"
                                                placeholder="<?php echo app('translator')->get('Twitter url'); ?>"
                                                value="<?php echo e(old('twitter_url') ?? ($lang == $languageDefault->lang_locale ? $setting->twitter_url : $setting->{$lang . '-twitter_url'})); ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Instagram url'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="instagram_url"
                                                placeholder="<?php echo app('translator')->get('Instagram url'); ?>"
                                                value="<?php echo e(old('instagram_url') ?? ($lang == $languageDefault->lang_locale ? $setting->instagram_url : $setting->{$lang . '-instagram_url'})); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>
                                                <?php echo app('translator')->get('Linkedin url'); ?>
                                            </label>
                                            <input type="text" class="form-control" name="linkedin_url"
                                                placeholder="<?php echo app('translator')->get('Linkedin url'); ?>"
                                                value="<?php echo e(old('linkedin_url') ?? ($lang == $languageDefault->lang_locale ? $setting->linkedin_url : $setting->{$lang . '-linkedin_url'})); ?>">
                                        </div>
                                    </div>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/pages/settings/index.blade.php ENDPATH**/ ?>