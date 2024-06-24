
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart.min.css')); ?>">
    <style type="text/css">
        @media (max-width: 767px) {
            .name-product {
                width: 300px;white-space: normal;
            }
        }

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container cart">
        <div class="left">
            <div class="list">
                <div class="title">THÔNG TIN GIỎ HÀNG</div>
                <div class="list__content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 100px;"></th>
                                    <th style="width: 30%">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('get.product.detail',\Str::slug($item->name).'-'.$item->id)); ?>"
                                            title="<?php echo e($item->name); ?>" class="avatar image contain">
                                            <img alt="" src="<?php echo e(pare_url_file($item->options->image)); ?>" class="lazyload">
                                        </a>
                                    </td>
                                    <td>
                                        <div style="" class="name-product">
                                            <a href="<?php echo e(route('get.product.detail',\Str::slug($item->name).'-'.$item->id)); ?>"><strong><?php echo e($item->name); ?></strong></a>
                                            <p>Kích cỡ: <?php echo e(isset($item->options['size']) ? $size[$item->options['size']] : S); ?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <p><b><?php echo e(number_format($item->price,0,',','.')); ?> đ</b></p>
                                        <p>

                                            <?php if($item->options->price_old): ?>
                                                <span style="text-decoration: line-through;"><?php echo e(number_format(number_price($item->options->price_old),0,',','.')); ?> đ</span>
                                                <span class="sale">- <?php echo e($item->options->sale); ?> %</span>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="qty_number">
                                            <input type="number"  min="1" class="input_quantity" disabled name="quantity_14692" value="<?php echo e($item->qty); ?>" id="">
                                            <p data-price="<?php echo e($item->price); ?>" data-url="<?php echo e(route('ajax_get.shopping.update', $key)); ?>" data-id-product="<?php echo e($item->id); ?>">
                                                <span class="js-increase">+</span>
                                                <span class="js-reduction">-</span>
                                            </p>
                                            <a href="<?php echo e(route('get.shopping.delete', $key)); ?>" class="js-delete-item btn-action-delete"><i class="la la-trash"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="js-total-item"><?php echo e(number_format($item->price * $item->qty,0,',','.')); ?> đ</span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    </div>
                    <p style="float: right;margin-top: 20px;">Tổng tiền : <b id="sub-total"><?php echo e(\Cart::subtotal(0)); ?> đ</b></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="<?php echo e(route('post.shopping.pay')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name" >Họ và tên <span class="cRed">(*)</span></label>
                            <input name="tst_name" id="name" required="" value="<?php echo e(get_data_user('web','name')); ?>" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="tst_phone" id="phone" required="" value="<?php echo e(get_data_user('web','phone')); ?>" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="tst_address" id="address" required="" value="<?php echo e(get_data_user('web','address')); ?>" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="tst_email" id="email" required="" value="<?php echo e(get_data_user('web','email')); ?>" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="tst_note" id="note" cols="3" style="min-height: 100px;" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple <?php echo e(\Auth::id() ? '' : 'js-show-login'); ?>" style="width: 100%;border-radius: 5px" type="submit" name="tst_type" value="1">
                                Thanh toán khi nhận hàng
                            </button>
                        </div>
                        <?php
                            $totalMoney = str_replace(',','',\Cart::subtotal(0));
                        ?>
                        <div class="btn-buy" style="margin-top: 10px">
                            <button class="buy1 btn btn-pink <?php echo e(\Auth::id() ? '' : 'js-show-login'); ?>" style="width: 100%;border-radius: 5px" type="submit" name="tst_type" value="2">
                                Thanh toán trực tuyến (VNPAY)
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/cart.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/frontend/pages/shopping/index.blade.php ENDPATH**/ ?>