
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Update admin</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.account_admin.index')); ?>"> Admin</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                         <?php echo csrf_field(); ?>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('name') ? 'has-error' : ''); ?>">
                                <label for="name">Tên <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="<?php echo e($admin->name); ?>" name="name"  placeholder="Tên ...">
                                <?php if($errors->first('name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('phone') ? 'has-error' : ''); ?>">
                                <label for="name">Phone <span class="text-danger">(*)</span></label>
                                <input type="number" class="form-control" value="<?php echo e($admin->phone); ?>"  name="phone"  placeholder="Phone ...">
                                <?php if($errors->first('phone')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('email') ? 'has-error' : ''); ?>">
                                <label for="name">Email <span class="text-danger">(*)</span></label>
                                <input type="email" class="form-control" value="<?php echo e($admin->email); ?>"  name="email"  placeholder="Email ...">
                                <?php if($errors->first('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group ">
                                <label for="name">Chức vụ <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="level">
                                    <option value="1" <?php echo e($admin->level == 1 ? "selected='selected'" : ""); ?>>Admin</option>
                                    <option value="2" <?php echo e($admin->level == 2 ? "selected='selected'" : ""); ?>>Nhân viên</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('password') ? 'has-error' : ''); ?>">
                                <label for="name">Password <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="password"  placeholder="********">
                                <?php if($errors->first('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="box-body">
                                <?php if(isset($roles)): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="">
                                                    <div class="icheckbox_flat-green <?php echo e(in_array($role->id, $roles_old) ? "checked" : ""); ?>" aria-checked="false" aria-disabled="false">
                                                        <input type="checkbox" name="roles[]" <?php echo e(in_array($role->id, $roles_old) ? "checked" : ""); ?> value="<?php echo e($role->id); ?>"
                                                               class="flat-red" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <span><?php echo e($role->name); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="box-footer text-center">
                                <a href="<?php echo e(route('admin.account_admin.index')); ?>" class="btn btn-danger">
                                Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/admin/update.blade.php ENDPATH**/ ?>