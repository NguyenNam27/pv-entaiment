<?php $__env->startSection('picture'); ?>
    <section >
        <div class="container">
            <h3 class="title">GALLERY</h3>
            <ul class="path d-flex justify-content-center">
                <li class="active">EVENTS</li>
                <li>COMERCIAL WORKS</li>
                <li>BACKSTAGE</li>
            </ul>
            <div class="row">
                <div class="col-lg-3 col-md-6 picture-img">
                    <img src="FE/image/a1.jpg" alt="">
                    <img src="FE/image/a2.jpg" alt="">
                    <img src="FE/image/a3.jpg" alt="">
                    <img src="FE/image/a4.jpg" alt="">
                    <img src="FE/image/a5.jpg" alt="">
                </div>
                <div class="col-lg-3 col-md-6 picture-img">
                    <img src="FE/image/a6.jpg" alt="">
                    <img src="FE/image/a7.jpg" alt="">
                    <img src="FE/image/a8.jpg" alt="">
                    <img src="FE/image/a9.jpg" alt="">
                    <img src="FE/image/a10.jpg" alt="">
                </div>
                <div class="col-lg-3 col-md-6 picture-img">
                    <img src="FE/image/a11.jpg" alt="">
                    <img src="FE/image/a12.jpg" alt="">
                    <img src="FE/image/a13.jpg" alt="">
                    <img src="FE/image/a14.jpg" alt="">
                    <img src="FE/image/a15.jpg" alt="">
                </div>
                <div class="col-lg-3 col-md-6 picture-img">
                    <img src="FE/image/a1.jpg" alt="">
                    <img src="FE/image/a2.jpg" alt="">
                    <img src="FE/image/a3.jpg" alt="">
                    <img src="FE/image/a4.jpg" alt="">
                    <img src="FE/image/a5.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="modal_image">
            <div class="overlay"></div>
            <div class="show_img">
                <i class="fa-solid fa-circle-xmark"></i>
                <img src="FE/image/a2.jpg" alt="">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('FE.master.layout_picture', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>