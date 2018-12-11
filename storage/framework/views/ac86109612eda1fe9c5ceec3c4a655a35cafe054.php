<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<form action="/forum/thread" method="post">
<input type="text" name="thread-name" placeholder="Ime teme..." required><br>
<?php echo e(csrf_field()); ?>

<input type="submit" value="Postavi">
</form>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>