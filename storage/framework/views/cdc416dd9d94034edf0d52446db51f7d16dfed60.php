
<?php $__env->startSection('content'); ?>
    <!-- Nội dung Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="<?php echo e(route('admin.transaction.index')); ?>"> Đơn hàng</a></li>
            <li class="active"> Danh sách</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="<?php echo e(Request::get('id')); ?>" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="<?php echo e(Request::get('email')); ?>" name="email" placeholder="Email ...">
                        <select name="type" class="form-control">
                            <option value="0">Phân loại khách</option>
                            <option value="1" <?php echo e(Request::get('type') == 1 ? "selected='selected'" : ""); ?>>Thành viên</option>
                            <option value="2" <?php echo e(Request::get('type') == 2 ? "selected='selected'" : ""); ?>>Khách</option>
                        </select>
                        <select name="status" class="form-control">
                            <option value="">Trạng thái</option>
                            <option value="1" <?php echo e(Request::get('status') == 1 ? "selected='selected'" : ""); ?>>Tiếp nhận</option>
                            <option value="2" <?php echo e(Request::get('status') == 2 ? "selected='selected'" : ""); ?>>Đang vận chuyển</option>
                            <option value="3" <?php echo e(Request::get('status') == 3 ? "selected='selected'" : ""); ?>>Đã bàn giao</option>
                            <option value="-1" <?php echo e(Request::get('status') == -1 ? "selected='selected'" : ""); ?>>Huỷ bỏ</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"></i> Xuất
                        </button>
                    </form>
                </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th style="width: 10px">ID</th>
                                    <th style="width: 30%">Thông tin</th>
                                    <th>Số tiền</th>
                                    <th>Tài khoản</th>
                                    <th>Thể loại</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if(isset($transactions)): ?>
                                    <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e((($transactions->currentPage() - 1) * $transactions->perPage()) + ( $key + 1)); ?></td>
                                            <td><?php echo e($transaction->id); ?></td>
                                            <td>
                                                <ul>
                                                    <li>Tên: <?php echo e($transaction->tst_name); ?></li>
                                                    <li>Email: <?php echo e($transaction->tst_email); ?></li>
                                                    <li>Số điện thoại: <?php echo e($transaction->tst_phone); ?></li>
                                                    <li>Địa chỉ: <?php echo e($transaction->tst_address); ?></li>
                                                </ul>
                                            </td>
                                            <td><?php echo e(number_format($transaction->tst_total_money,0,',','.')); ?> đ</td>
                                            <td>
                                                <?php if($transaction->tst_user_id): ?>
                                                    <span class="label label-success">Thành viên</span>
                                                <?php else: ?>
                                                    <span class="label label-default">Khách</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="label label-<?php echo e($transaction->getType($transaction->tst_type)['class']); ?>">
                                                    <?php echo e($transaction->getType($transaction->tst_type)['name']); ?></span>
                                            </td>
                                            <td>
                                                <span class="label label-<?php echo e($transaction->getStatus($transaction->tst_status)['class']); ?>">
                                                    <?php echo e($transaction->getStatus($transaction->tst_status)['name']); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e($transaction->created_at); ?></td>
                                            <td>
                                                <a data-id="<?php echo e($transaction->id); ?>" href="<?php echo e(route('ajax.admin.transaction.detail', $transaction->id)); ?>" class="btn btn-xs btn-info js-preview-transaction"><i class="fa fa-eye"></i>Xem</a>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-xs">Hành động</button>
                                                    <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                        <span class="caret"></span>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li>
                                                            <a href="<?php echo e(route('admin.transaction.delete', $transaction->id)); ?>" class="js-delete-confirm"><i class="fa fa-trash"></i> Xóa</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="<?php echo e(route('admin.action.transaction',['process', $transaction->id])); ?>" ><i class="fa fa-ban"></i> Đang bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo e(route('admin.action.transaction',['success', $transaction->id])); ?>" ><i class="fa fa-ban"></i> Đã bàn giao</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo e(route('admin.action.transaction',['cancel', $transaction->id])); ?>" ><i class="fa fa-ban"></i> Huỷ</a>
                                                        </li>

                                                    </ul>
                                                </div>
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
                    <?php echo $transactions->appends($query)->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
        </div>
            <!-- /.box -->
    </section>

    <div class="modal fade fade" id="modal-preview-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"> Chi tiết đơn hàng <b id="idTransaction">#1</b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu lại</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banthoitrangtest\resources\views/admin/transaction/index.blade.php ENDPATH**/ ?>
