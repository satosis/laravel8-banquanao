
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Roles</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Role</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="">
                        <?php echo csrf_field(); ?>
                        <div class="col-sm-12">
                            <div class="box-body">
                                <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Super Admin" value="<?php echo e($role->name); ?>">
                                        <?php if($errors->has('name')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Guard</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="guard_name" value="<?php echo e($role->guard_name); ?>"
                                               placeholder="admins">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-9">
                                    <textarea class="form-control" id="" cols="30" name="description"
                                              placeholder="Mô tả về chức năng của role ..." rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-body">
                                <?php if(isset($permissions)): ?>
                                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="">
                                                    <div class="icheckbox_flat-green <?php echo e(in_array($permission->id, $permissions_active) ? "checked" : ""); ?>" aria-checked="false" aria-disabled="false">
                                                        <input type="checkbox" name="permissions[]" <?php echo e(in_array($permission->id, $permissions_active) ? "checked=checked" : ""); ?> value="<?php echo e($permission->id); ?>" class="flat-red" style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <span><?php echo e($permission->name); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="clearfix"></div>
                        <div class="box-footer text-center">
                            <a href="<?php echo e(route('admin.role.list')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Thêm mới</button>
                        </div>
                        <div class="col-sm-12">

                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/role/update.blade.php ENDPATH**/ ?>