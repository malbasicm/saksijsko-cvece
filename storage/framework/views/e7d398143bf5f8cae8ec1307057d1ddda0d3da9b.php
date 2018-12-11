<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<h3>Forum:</h3>
<?php if(count($threads) == 0): ?>
    <h5>Nema tema...</h5>
<?php else: ?>
    <?php $__currentLoopData = $threads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="forum-thread">
            <h6><a href="/forum/view/<?php echo e($thread['id']); ?>"><?php echo e($thread['name']); ?></a> by <?php echo e($thread['user']); ?></h6>
            <p><?php echo e($thread['created_at']); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<hr>
<a href="/forum/thread">Nova tema</a>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>