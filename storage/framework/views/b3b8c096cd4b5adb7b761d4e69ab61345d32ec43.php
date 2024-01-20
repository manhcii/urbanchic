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

        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="/">
                    <i class="fa fa-dashboard"></i> Home
                </a>
            </li>
            <li class="active"><?php echo e($module_name); ?></li>
        </ol>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>

    <?php
        // lấy dữ liệu cho chart doughnut
        $count_contact = $count_call_request = $count_newsletter = 0;
        if (isset($rows_contact)) {
            foreach ($rows_contact as $val) {
                if ($val->is_type == 'contact') {
                    $count_contact++;
                }
                if ($val->is_type == 'call_request') {
                    $count_call_request++;
                }
                if ($val->is_type == 'newsletter') {
                    $count_newsletter++;
                }
            }
        }
        $data_chart = [$count_contact, $count_call_request, $count_newsletter];

        // end

        // lấy dữ liệu cho chart line
        //tháng năm hiện tại
        $month_now = date('m', time());
        $year_now = date('Y', time());
        // lấy 5 tháng trước hiện tại
        $data_month = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($month_now - $i > 0) {
                $data_month[5 - $i] = $month_now - $i . '/' . $year_now;
            } elseif ($month_now - $i < 0) {
                $data_month[5 - $i] = 12 + ($month_now - $i) . '/' . ($year_now - 1);
            } else {
                $data_month[5 - $i] = 12 - ($month_now - $i) . '/' . ($year_now - 1);
            }
        }
        array_push($data_month, $month_now . '/' . $year_now);
        ksort($data_month);

        $data_line = [];
        // lấy dữ liệu theo từng tháng
        $key = 0;
        foreach ($data_month as $month_year) {
            $data_line['data'][$key] = 0;
            foreach ($rows_order as $val_order) {
                if ($month_year == date('n/Y', strTotime($val_order->created_at))) {
                    $data_line['data'][$key] += 1;
                }
            }
            // lấy tên tháng
            $data_line['month'][$key] = App\Consts::MONTH[explode('/', $month_year)[0]];
            $key++;
        }
    ?>
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

        <div class="container-fluid">
            <div class="row">
                <!-- ./col -->
                <?php if(isset($rows_order)): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo e(count($rows_order)); ?></h3>

                                <p><?php echo app('translator')->get('New Orders'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo e(route('order_products.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('More info'); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($rows_comment)): ?>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo e(count($rows_comment)); ?></h3>

                                <p><?php echo app('translator')->get('Comments'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-chatbox"></i>
                            </div>
                            <a href="<?php echo e(route('comments.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('More info'); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($rows_customer)): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo e(count($rows_customer)); ?></h3>

                                <p><?php echo app('translator')->get('User Registrations'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo e(route('customer.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('More info'); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if(isset($rows_contact)): ?>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo e($count_contact ?? ''); ?></h3>

                                <p><?php echo app('translator')->get('Contacts'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="<?php echo e(route('contacts.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('More info'); ?> <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ./col -->
            <div class="row">
                <div class="col-md-6">

                    <?php if(isset($rows_customer)): ?>
                        <section class="connectedSortable list-group">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo app('translator')->get('Latest Users'); ?></h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="table-responsive">
                                        <table class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('Email'); ?></th>
                                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                                    <th><?php echo app('translator')->get('Time Created'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $rows_customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        if ($loop->index == 10) {
                                                            break;
                                                        }
                                                    ?>
                                                    <tr>
                                                        <td><?php echo e($items->email); ?></td>
                                                        <td><?php echo e($items->name); ?></td>
                                                        <td><span
                                                                class="label <?php echo e($items->status == 'active' ? 'label-success' : ($items->status == 'pending' ? 'label-warning' : 'label-danger')); ?>"><?php echo e($items->status); ?></span>
                                                        </td>
                                                        <td>
                                                            <?php echo e($items->created_at); ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer clearfix">
                                    
                                    <a href="<?php echo e(route('customer.index')); ?>"
                                        class="btn btn-sm btn-default btn-flat pull-right"><?php echo app('translator')->get('View All Users'); ?></a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php if(isset($admins)): ?>
                        <div class="list-group">
                            <!-- USERS LIST -->
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo app('translator')->get('Latest Members'); ?></h3>

                                    <div class="box-tools pull-right">
                                        <span class="label label-danger"><?php echo e(count($admins)); ?> New Members</span>
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <ul class="users-list clearfix">
                                        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <img src="<?php echo e(asset('data/images/nophoto.png')); ?>"
                                                    alt="<?php echo e($item_admin->name); ?>">
                                                <p class="users-list-name"><?php echo e($item_admin->name); ?></p>
                                                <span class="users-list-date"><?php echo e($item_admin->role_name); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <!-- /.users-list -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <a href="<?php echo e(route('admins.index')); ?>" class="uppercase"><?php echo app('translator')->get('View All Members'); ?></a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                            <!--/.box -->
                        </div>
                    <?php endif; ?>



                    <?php if(isset($rows_product)): ?>
                        <div class="list-group">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo app('translator')->get('Recently Added Products'); ?></h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        <?php $__currentLoopData = $rows_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="<?php echo e($items_product->image ?? ''); ?>"
                                                        alt="<?php echo e($items_product->name); ?>">
                                                </div>
                                                <div class="product-info">
                                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => $items_product->alias ?? ''])); ?>"
                                                        class="product-title"><?php echo e($items_product->name); ?>

                                                        <?php if(isset($items_product->price) && $items_product->price != null): ?>
                                                            <span
                                                                class="label label-warning pull-right">$<?php echo e($items_product->price); ?></span>
                                                        <?php endif; ?>
                                                    </a>
                                                    <span class="product-description">
                                                        <?php echo e($items_product->json_params->brief->$lang ?? $items_product->brief); ?>

                                                    </span>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- /.item -->
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <a href="<?php echo e(route('cms_products.index')); ?>" class="uppercase"><?php echo app('translator')->get('View All Products'); ?></a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </div>
                    <?php endif; ?>



                </div>
                <div class="col-md-6">

                    <div class="list-group">
                        <canvas id="chart_line" style="width: 100%;"></canvas>
                    </div>

                    <div class="list-group">
                        <canvas id="chart_doughnut" width="400" height="400" style="margin: auto"></canvas>
                    </div>


                    <?php if(isset($rows_post)): ?>
                        <div class="list-group">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo app('translator')->get('Recently Added Post'); ?></h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <ul class="products-list product-list-in-box">
                                        <?php $__currentLoopData = $rows_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="item">
                                                <div class="product-img">
                                                    <img src="<?php echo e($items_post->image ?? ''); ?>" alt="<?php echo e($items_post->name); ?>">
                                                </div>
                                                <div class="product-info">
                                                    <a href="<?php echo e(route('frontend.page', ['taxonomy' => $items_post->alias ?? ''])); ?>"
                                                        class="product-title"><?php echo e($items_post->name); ?>


                                                    </a>
                                                    <span class="product-description">
                                                        <?php echo e($items_post->json_params->brief->$lang ?? $items_post->brief); ?>

                                                    </span>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <!-- /.item -->
                                    </ul>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <a href="<?php echo e(route('cms_products.index')); ?>" class="uppercase"><?php echo app('translator')->get('View All Post'); ?></a>
                                </div>
                                <!-- /.box-footer -->
                            </div>
                        </div>
                    <?php endif; ?>




                </div>
            </div>

        </div>
    </section>
    <script>
        var ctx = document.getElementById("chart_doughnut");
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Call equest', 'Contact', 'New Letter'],
                datasets: [{
                    label: 'Sent count',
                    data: <?php echo e(json_encode($data_chart)); ?>,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'

                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: false,

            }
        });

        var line = document.getElementById("chart_line");
        var Chartline = new Chart(line, {
            type: 'line',
            data: {
                labels: <?php echo str_replace('"', "'", json_encode($data_line['month'], true)); ?>,
                datasets: [{
                    label: 'My Orders',
                    data: <?php echo e(json_encode($data_line['data'])); ?>,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: false,

            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\xGifts\resources\views/admin/pages/home/index.blade.php ENDPATH**/ ?>