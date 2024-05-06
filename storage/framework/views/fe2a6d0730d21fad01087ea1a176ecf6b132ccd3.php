<ul>
	<?php for($i = 1; $i <= 6; $i++): ?>
		<li class="<?php echo e(Request::get('price') == $i ? "active" : ""); ?>">
			<a href="<?php echo e(request()->fullUrlWithQuery(['price' =>  $i])); ?>">
				<?php echo e($i == 6 ? "Lớn hơn 100k " : "Giá " . number_format($i * 20000,0,',','.')  ." vnđ"); ?>

			</a>
		</li>
	<?php endfor; ?>
</ul><?php /**PATH D:\project\laravel8-banthoitrangtest\resources\views/frontend/pages/product/include/_inc_filter_price.blade.php ENDPATH**/ ?>