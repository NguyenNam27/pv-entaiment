<?php $__env->startSection('login'); ?>
    <section class="sign-in">
        <form action="<?php echo e(route('login.checkout')); ?>" method="post" >
            <?php echo csrf_field(); ?>
            <h4>SIGN IN</h4>
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
            <?php endif; ?>
            <label for="">EMAIL</label>
            <input type="email" name="email" placeholder="EMAIL">
            <?php if($errors->has('email')): ?>
                <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                    <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

                </label>
            <?php endif; ?>
            <label for="">PASSWORD</label>
            <input type="password" name="password" placeholder="PASSWORD">
            <?php if($errors->has('email')): ?>
                <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                    <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

                </label>
            <?php endif; ?>

            <button type="submit" id="sign-in">SIGN IN</button>
            <a class="signup" href="#">DONT HAVE ACCOUNT ? SIGN UP HERE</a>
            <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i>facebook</a>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>