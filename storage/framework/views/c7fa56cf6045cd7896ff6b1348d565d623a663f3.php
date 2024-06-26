
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Event</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.event.index')); ?>"> Event</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.event.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th style="width: 10px">ID</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Banner</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                <?php if(isset($events)): ?>
                                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(( $key + 1 )); ?></td>
                                            <td><?php echo e($event->id); ?></td>
                                            <td><?php echo e($event->e_name); ?></td>
                                            <td><?php echo e($event->e_link); ?></td>
                                            <td>
                                                <img src="<?php echo e(pare_url_file($event->e_banner)); ?>" style="width: 100px;height: 40px">
                                            </td>
                                            <td><?php echo e($event->created_at); ?></td>
                                            <td style="width: 135px;">
                                                <a href="<?php echo e(route('admin.event.update', $event->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.event.delete', $event->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/event/index.blade.php ENDPATH**/ ?>