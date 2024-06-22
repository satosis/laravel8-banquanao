
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.product.index')); ?>"> Sản phẩm</a></li>
            <li class="active">Cập nhật</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <?php echo $__env->make('admin.product.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/admin/product/update.blade.php ENDPATH**/ ?>