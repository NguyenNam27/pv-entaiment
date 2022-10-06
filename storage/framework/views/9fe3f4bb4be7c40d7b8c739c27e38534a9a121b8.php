<?php $__env->startSection('store'); ?>
    <section>
        <div class="container">
            <h2>Sản phẩm</h2>
            <div class="row">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 info">
                    <div class="item">
                        <div class="item__img">
                            <a href="<?php echo e(route('chitietsanpham',['slug'=>$pro->slug])); ?>">
                                <img src="<?php echo e(asset($pro->image)); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="desc">
                        <?php if($pro->is_active==1): ?>
                        <span>new</span>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo e(route('chitietsanpham',['slug'=>$pro->slug])); ?>"><?php echo e($pro->name); ?></a>
                    <p><?php echo e(number_format($pro->price)); ?> VNĐ</p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="box-footer clearfix">
                <?php echo e($product->links()); ?>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_store', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>