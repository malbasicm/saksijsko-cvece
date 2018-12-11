<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__currentLoopData = array_slice(scandir(getcwd().'/image/galerija'),2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <abbr title="<?php echo e(pathinfo($image, PATHINFO_FILENAME)); ?>">
        <img src="<?php echo e(URL::to('/image/galerija').'/'.$image); ?>" alt="<?php echo e(pathinfo($image, PATHINFO_FILENAME)); ?>" class="galerija">
    </abbr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>