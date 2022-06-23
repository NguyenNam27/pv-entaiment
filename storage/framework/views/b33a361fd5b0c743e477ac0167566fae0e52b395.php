<?php $__env->startSection('chitietnew'); ?>
    <section class=" mt-3 mb-3 ">
        <div class="container">
            <div class="new__title">

                <h4><?php echo e($detail->title); ?></h4>
                <span>NOTICE</span>
                <span>|</span>
                <span> <i class="fa-regular fa-clock"></i> <?php echo e($detail->created_at); ?></span>
            </div>
            <div class="new__info" >
                <?php echo $detail->content; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_chitietnew', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>