
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý các page tĩnh</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.static.index')); ?>"> Static</a></li>
            <li class="active"> Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.static.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th style="width: 10px">ID</th>
                                    <th>Tên</th>
                                    <th>Thể loại</th>
                                    <th>Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if(isset($statics)): ?>
                                    <?php $__currentLoopData = $statics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $static): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($key + 1)); ?></td>
                                            <td><?php echo e($static->id); ?></td>
                                            <td><?php echo e($static->s_title); ?></td>
                                            <td><?php echo e($static->getType($static->s_type)); ?></td>
                                            <td><?php echo e($static->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.static.update', $static->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                                <a href="<?php echo e(route('admin.static.delete', $static->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
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

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/static/index.blade.php ENDPATH**/ ?>