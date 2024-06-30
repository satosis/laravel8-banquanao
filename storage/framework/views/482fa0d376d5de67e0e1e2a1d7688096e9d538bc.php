
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Roles</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Role</a></li>
            <li class="active">Index</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">
                            <form action="" class="form-inline" method="GET">
                                <input type="text" placeholder="ID" name="id" class="form-control">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                <a href="<?php echo e(route('admin.role.create')); ?>" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add</a>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Guard_name</th>
                                    <th style="width: 50%">Permissions</th>
                                    <th>Create</th>
                                    <th>Action</th>
                                </tr>
                                <?php if(isset($roles)): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($role->id); ?></td>
                                            <td><?php echo e($role->name); ?></td>
                                            <td><?php echo e($role->guard_name); ?></td>
                                            <td>
                                                <?php
                                                    $permissions = $role->permissions()->pluck('name') ?? []
                                                ?>
                                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="label label-success"><?php echo e($permission); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </td>
                                            <td><?php echo e($role->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.role.update', $role->id)); ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil-square"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.role.delete', $role->id)); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/role/index.blade.php ENDPATH**/ ?>