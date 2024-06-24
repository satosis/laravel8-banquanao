
<?php $__env->startSection('css'); ?>
    <style>
        <?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Danh sách bình luận của bạn</div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="width: 50px">STT</th>
                        <th scope="col" style="text-align: left;">Sản phẩm</th>
                        <th scope="col" style="text-align: center;">Mô tả</th>
                        <th scope="col" style="text-align: center;">Thời gian</th>
                        <th scope="col" style="text-align: center;">Hành động</th>
                    </tr>
                    </thead>

                    <?php if(isset($comments)): ?>
                    <tbody>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="text-align: center;"><?php echo e((($comments->currentPage() - 1) * $comments->perPage()) + ( $key + 1)); ?></td>
                                <td style="width: 30%;text-align: left">
                                    <a href="<?php echo e(route('get.product.detail',$comment->product->pro_slug . '-'.$comment->product->id )); ?>" style="color:blue;text-decoration:underline">
                                        <?php echo e($comment->product->pro_name ?? "[N\A]"); ?>

                                    </a>
                                </td>

                                <td style="text-align: center;"><?php echo e($comment->cmt_content); ?></td>
                                <td style="text-align: center;"><?php echo e($comment->created_at); ?></td>
                                <td style="text-align: center;">
                                    <a href="<?php echo e(route('get.user.comment.delete', $comment->id)); ?>" class="btn btn-xs label-danger js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div style="display: block;">
            <?php echo $comments->appends($query ?? [])->links(); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/user/comment.blade.php ENDPATH**/ ?>