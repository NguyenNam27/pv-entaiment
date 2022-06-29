<?php $__env->startSection('picture'); ?>
    <section >
        <div class="container">
            <h3 class="title">GALLERY</h3>
            <div class="row">
                <?php $__currentLoopData = $picture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 picture-img" >
                    <img src="<?php echo e(asset($pic->image)); ?>" alt="">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="modal_image">
            <div class="overlay"></div>
            <div class="show_img">
                <i class="fa-solid fa-circle-xmark"></i>
                <img src="<?php echo e(asset($pic->image)); ?>" alt="">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_picture', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>