
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .ratings span i {
        color: #eff0f5;
    }
    .ratings span.active i {
        color: #faca51;
    }
</style>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Danh sách đánh giá, review sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.rating.index')); ?>"> Đánh giá</a></li>
            <li class="active"> Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 70px">STT</th>
                                    <th style="width: 70px">ID</th>
                                    <th>Tên</th>
                                    <th> Người dùng </th>
                                    <th>Xếp loại</th>
                                    <th>Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if(isset($ratings)): ?>
                                    <?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e((($ratings->currentPage() - 1) * $ratings->perPage()) + ( $key + 1)); ?></td>
                                            <td><?php echo e($rating->id); ?></td>
                                            <td><?php echo e($rating->product->pro_name ?? "[N\A]"); ?></td>
                                            <td><?php echo e($rating->user->name ?? "[N\A]"); ?></td>
                                            <td>
                                                <div class="ratings">
                                                    <?php for($i = 1 ; $i <= 5 ; $i ++): ?>
                                                        <span class="<?php echo e($i <= $rating->r_number ? 'active' : ''); ?>"><i class="fa fa-star"></i></span>
                                                    <?php endfor; ?>
                                                </div>
                                            </td>
                                            <td><?php echo e($rating->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.rating.delete', $rating->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
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
                    <?php echo $ratings->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banthoitrangtest\resources\views/admin/rating/index.blade.php ENDPATH**/ ?>