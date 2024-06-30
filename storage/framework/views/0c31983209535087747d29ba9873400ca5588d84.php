
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Admin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.account_admin.index')); ?>"> Admin</a></li>
            <li class="active"> Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.account_admin.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th style="width: 10px">ID</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>SDT</th>
                                    <th>Level</th>
                                    <th>Role</th>
                                    <th>Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                            </tbody>
                            <?php if(isset($admins)): ?>
                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(($key + 1)); ?></td>
                                            <td><?php echo e($admin->id); ?></td>
                                            <td><?php echo e($admin->name); ?></td>
                                            <td><?php echo e($admin->email); ?></td>
                                            <td><?php echo e($admin->phone); ?></td>
                                            <td>
                                                <?php if($admin->level == 1): ?>
                                                    <span class="label label-success"> Admin </span>
                                                <?php else: ?>
                                                    <span class="label label-default">Nhân viên</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="label-info label"><?php echo e($admin->roles()->pluck('name')->implode(' ') ?? ""); ?></span>
                                            </td>
                                            <td><?php echo e($admin->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.account_admin.update', $admin->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                                <a href="<?php echo e(route('admin.account_admin.delete', $admin->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/admin/index.blade.php ENDPATH**/ ?>