<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Nội dung-Type" content="text/html; charset=utf-8">
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title><?php echo e(strtolower($title_page ?? "Đồ án tốt nghiệp")); ?></title>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="icon" sizes="32x32" type="image/png" href="<?php echo e(asset('ico.png')); ?>" />
        <?php echo $__env->yieldContent('css'); ?>

        
        <?php if(session('toastr')): ?>
            <script>
                var TYPE_MESSAGE = "<?php echo e(session('toastr.type')); ?>";
                var MESSAGE = "<?php echo e(session('toastr.message')); ?>";
            </script>
        <?php endif; ?>
    </head>
    <body>
        <?php echo $__env->make('frontend.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php if(get_data_user('web')): ?>
            <?php echo $__env->make('components.popup._inc_popup_wallet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php echo $__env->make('frontend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            var DEVICE = '<?php echo e(device_agent()); ?>'
        </script>
        <?php echo $__env->yieldContent('script'); ?>
    </body>
</html>
<?php /**PATH D:\project\laravel8-banthoitrangtest\resources\views/layouts/app_master_frontend.blade.php ENDPATH**/ ?>