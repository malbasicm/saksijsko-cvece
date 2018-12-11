<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container">
    <p class="text-center">Ovaj sajt je školski Google Analytics projekat iz predmeta Elektronsko poslovanje.</p>
    <p class="text-center">Kako biste saznali više o autoru, pritisnite <a href="/oautoru">ovde</a>.</p>
    <img src="image/google-anal.png" alt="Google Analytics Logo">
</div>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>