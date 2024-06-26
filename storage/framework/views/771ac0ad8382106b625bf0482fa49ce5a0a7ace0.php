
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý danh mục sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.category.index')); ?>"> Danh mục</a></li>
            <li class="active"> Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 70px">STT</th>
                                    <th style="width: 70px">ID</th>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 150px">Hot</th>
                                    <th>Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if($categories): ?>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e((($categories->currentPage() - 1) * $categories->perPage()) + ( $key + 1)); ?></td>
                                            <td><?php echo e($category->id); ?></td>
                                            <td><?php echo e($category->c_name); ?></td>
                                            <td>
                                                <img src="<?php echo e(pare_url_file($category->c_avatar ?? '') ?? '/images/no-image.jpg'); ?>" onerror="this.onerror=null;this.src='/images/no-image.jpg';"
                                                     alt="" class="img-thumbnail" style="width: 80px;height: 80px;">
                                            </td>
                                            <td>
                                                <?php if($category->c_status == 1): ?>
                                                    <a href="<?php echo e(route('admin.category.active', $category->id)); ?>" class="label label-info">Hiển thị</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.category.active', $category->id)); ?>" class="label label-default">Ẩn</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($category->c_hot == 1): ?>
                                                    <a href="<?php echo e(route('admin.category.hot', $category->id)); ?>" class="label label-info">Hot</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.category.hot', $category->id)); ?>" class="label label-default">Không</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($category->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.category.update', $category->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                                                <a href="<?php echo e(route('admin.category.delete', $category->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
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
                    <?php echo $categories->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banthoitrangtest\resources\views/admin/category/index.blade.php ENDPATH**/ ?>