<?php $__env->startSection('book'); ?>
    <section class="booking ">
        <div class="container">
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12">
                    <label for="">Booking Type</label>
                    <select name="booking_type">
                        <option value="1" >brand</option>
                    </select>
                </div>
            </div>

            <form method="post" action="<?php echo e(route('post')); ?> " enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row " >
                    <div class="col-md-12">
                        <label for="">Company Name</label>
                        <input type="text" name="name_company">
                        <?php if($errors->has('name_company')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('name_company')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="">Budget (ĐVT:VNĐ)</label>
                        <input type="text" name="budget">
                        <?php if($errors->has('budget')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('budget')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="">Your Full Name </label>
                        <input type="text" name="full_name">
                        <?php if($errors->has('full_name')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('full_name')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="">Email Address</label>
                        <input type="text" name="email">
                        <?php if($errors->has('email')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('email')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" name="phone">
                        <?php if($errors->has('phone')): ?>
                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                <i class="fa fa-info"></i><?php echo e($errors->first('phone')); ?>

                            </label>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-12">
                        <label for="">Your Requirement</label>
                        <textarea name="massage" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" value="" class="button">SUBMIT</button>
                </div>
            </form>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_book', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>