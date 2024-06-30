
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Permission</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Permission</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="">
                        <?php echo csrf_field(); ?>
                        <div class="box-body">
                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="slug" onkeyup="to_slug();" placeholder="Super Admin" value="<?php echo e($permission->name); ?>">
                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Guard Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="guard_name"  placeholder="admins" value="admins">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Group </label>
                                <div class="col-sm-10">
                                    <select name="group_permission" class="form-control" id="">
                                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"
                                                    <?php echo e($permission->group_permission == $key ? "selected='selected'" : ""); ?>>
                                                <?php echo e($gr); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="" cols="30" name="description"
                                              placeholder="Mô tả về chức năng của permission ..." rows="5"><?php echo e($permission->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="<?php echo e(route('admin.permission.list')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Thêm mới</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function to_slug()
        {
            //Lấy text từ thẻ input title
            str = document.getElementById("slug").value;
            // Chuyển hết sang chữ thường
            str = str.toLowerCase();

            // xóa dấu
            str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
            str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
            str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
            str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
            str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
            str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
            str = str.replace(/(đ)/g, 'd');

            // Xóa ký tự đặc biệt
            str = str.replace(/([^0-9a-z_\-\s])/g, '');

            // Xóa khoảng trắng thay bằng ký tự -
            str = str.replace(/(\s+)/g, '-');

            // xóa phần dự - ở đầu
            str = str.replace(/^-+/g, '');

            // xóa phần dư - ở cuối
            str = str.replace(/-+$/g, '');

            // return
            document.getElementById('slug').value = str;
            // return str;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/permission/update.blade.php ENDPATH**/ ?>