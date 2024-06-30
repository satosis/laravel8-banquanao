
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<h1>
			403 Permission
		</h1>
	</section>
	<section class="content">

		<div class="error-page">
			<h2 class="headline text-red">403</h2>

			<div class="error-content">
				<h3><i class="fa fa-warning text-red"></i> Xin lỗi! Bạn không có quyền truy cập .</h3>

				<p>Xin vui lòng liên hệ với admin để được cập quyền truy cập</p>











			</div>
		</div>
		<!-- /.error-page -->
	</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\laravel8-banquanao\resources\views/errors/403.blade.php ENDPATH**/ ?>