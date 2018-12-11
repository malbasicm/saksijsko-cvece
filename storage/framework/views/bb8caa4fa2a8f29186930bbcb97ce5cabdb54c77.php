<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(Session::has('user')): ?>
    <?php $__currentLoopData = array_chunk($articles,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <?php for($i = 0; $i < count($arts); $i++): ?>
                <?php $article = $arts[$i]; ?>
                <div class="column">
                    <div class="shop-article">
                        <h3><?php echo e($article['name']); ?></h3>
                        <abbr title="<?php echo e($article['name']); ?>">
                            <img src="<?php echo e($article['src']); ?>" alt="<?php echo e($article['name']); ?>"/>
                        </abbr>
                        <h4>Cena: <span class="price"><?php echo e($article['price']); ?></span></h4>
                        <p><?php echo e($article['desc']); ?></p>
                        <button data-id="<?php echo e($article['id']); ?>">Kupi</button>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <link rel="stylesheet" href="css/shop.css">
    <script src="js/shop.js"></script>
<?php else: ?>
    <p>Prijavite se.</p>
<?php endif; ?>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>