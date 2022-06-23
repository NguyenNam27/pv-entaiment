<?php $__env->startSection('artist'); ?>
    <section class="artist-main ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>KOL</h1>
                    <ul class="d-flex artist">
                        <li>COMEDIAN </li>


                    </ul>
                    <div class="row info">
                        <div class="col-4 info_left">
                            <p>FULL NAME</p>
                            <p>STAGE NAME</p>
                            <p>BIRTHDAY</p>
                            <p>HOMETOWN</p>
                            <p>OCCUPATION</p>
                        </div>
                        <div class="col-8 info_right">
                            <p>: PHAM VAN VINH</p>
                            <p>: PHAM VINH</p>
                            <p>: JULY 5TH 1999</p>
                            <p>: HUNG YEN CITY – VIETNAM</p>
                            <p>: ACTOR, DIRECTOR</p>
                        </div>
                    </div>














                </div>
                <div class="col-md-6">
                    <div class="right_img">
                        <img src="FE/image/273446479_1656629554682359_3671998032413369798_n.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_artist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>