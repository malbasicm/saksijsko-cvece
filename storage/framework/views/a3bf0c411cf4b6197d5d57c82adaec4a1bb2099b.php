<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="forum-post">
        <h6><?php echo e($post['user']); ?></h6>
        <p><?php echo e($post['content']); ?></p>
        <br>
        <p><?php echo e($post['created_at']); ?></p>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<hr>
<h6>Odgovor:</h6>
<form action="/forum/post" method="post">
<textarea name="post" cols="30" rows="10"></textarea>
<input type="hidden" name="thread" value="<?php echo e($tid); ?>">
<?php echo e(csrf_field()); ?>

<input type="submit" value="Postavi">
</form>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>