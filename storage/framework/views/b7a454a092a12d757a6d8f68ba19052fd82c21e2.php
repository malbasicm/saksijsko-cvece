<?php echo $__env->make('layout/header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <form action="/user/login" method="post">
            <input type="email" placeholder="E-Mail..." name="email" required>
            <input type="password" placeholder="Password..." name="password" required>
            <input style="width: 100%" type="submit" value="Login/Register">
            <?php echo csrf_field(); ?>
        </form>
<<<<<<< HEAD
        <form action="/user/reset" method="post">
=======
        <br>
        <br>
        <form action="/user/reset" method="post">
            <input type="email" placeholder="E-Mail..." name="email" required>
>>>>>>> 52a6b6efc00849d4f564073a13bbcd001b3487be
            <input style="width: 100%" type="submit" value="Forgot Password?">
            <?php echo csrf_field(); ?>
        </form>
    </div>
<?php echo $__env->make('layout/footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>