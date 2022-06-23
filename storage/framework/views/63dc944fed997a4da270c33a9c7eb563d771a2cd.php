<?php $__env->startSection('sigup'); ?>

<section class="sign-in">
    <form action="<?php echo e(route('signup.post')); ?>" method="post" aria-label="<?php echo e(__('Register')); ?> ">
        <?php echo csrf_field(); ?>
        <h4>SIGN UP</h4>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
        <?php endif; ?>
        <label for="">NAME</label>
        <input type="text" name="name" placeholder="EMAIL">
        <?php if($errors->has('name')): ?>
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i><?php echo e($errors->first('name')); ?>

            </label>
        <?php endif; ?>
        <label for="">EMAIL</label>
        <input type="text" name="email" placeholder="EMAIL">
        <?php if($errors->has('email')): ?>
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

            </label>
        <?php endif; ?>
        <label for="">PASSWORD</label>
        <input type="password" name="password" placeholder="PASSWORD">
        <?php if($errors->has('password')): ?>
            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                <i class="fa fa-info"></i><?php echo e($errors->first('password')); ?>

            </label>
        <?php endif; ?>

        <div class="form-group">
            <label for="exampleInputPassword1">Hình ảnh</label>
            <input type="file" name="image" >
            <?php if($errors->has('image')): ?>
                <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                    <i class="fa fa-info"></i><?php echo e($errors->first('image')); ?>

                </label>
            <?php endif; ?>
        </div>
        <button type="submit" >SIGN UP</button>

    </form>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_sigup', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>