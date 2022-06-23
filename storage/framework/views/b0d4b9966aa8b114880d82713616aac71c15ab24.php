<?php $__env->startSection('new'); ?>
    <section class="news-main ">
        <div class="container">
            <h2>News</h2>
            <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row news">
                <div class="col-md-4">
                    <div class="news__img">
                        <img src="<?php echo e(asset($new->image)); ?>" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="news__info">
                        <span><?php echo e($new->created_at); ?></span>
                        <a href="<?php echo e(route('chitiettintuc',['slug'=>$new->slug])); ?>"><?php echo e($new->title); ?></a>
                        <p><?php echo e(strip_tags($new->short_description)); ?>

                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="box-footer clearfix">

        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>