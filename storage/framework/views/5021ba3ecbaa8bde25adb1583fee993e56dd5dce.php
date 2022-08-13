<?php $__env->startSection('trangchu'); ?>
<section>
    <div class="banner">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $i=0;
                ?>
                <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ban): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $i++;
                    ?>

                <div class="carousel-item <?php echo e($i == 1 ?'active':''); ?>">
                    <img class="d-block w-100" src="<?php echo e(asset($ban->image)); ?>" alt="" >
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row" >
            <div class="col-md-4">
                <div class="content">














                    <div class="list__item">
                        <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item2 d-flex ">
                                <div class="item2__img">
                                    <a href="#">
                                        <img src="<?php echo e(asset($vi->image)); ?>" height="70%" width="70%" alt="">
                                    </a>
                                </div>
                                <div class="item2__text">
                                    <a href="<?php echo e($vi->URL); ?>"><?php echo e($vi->title); ?></a>
                                    <span>22/02/2022</span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <a href="#">All video</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content">
                    <div class="list__item">
                        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item2 d-flex ">
                            <div class="item2__img">
                                <a href="<?php echo e(route('chitiettintuc',['slug'=>$post->slug])); ?>">
                                    <img src="<?php echo e(asset($post->image)); ?>" height="70%" width="70%" alt="">
                                </a>
                            </div>
                            <div class="item2__text">
                                <a href="<?php echo e(route('chitiettintuc',['slug'=>$post->slug])); ?>"><?php echo e($post->title); ?></a>
                                <p><?php echo e(strip_tags($post->short_description)); ?></p>
                                <span><?php echo e($post->created_at); ?></span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <a href="<?php echo e(route('tintuc')); ?>">All Post</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content">
                    <div class="list__item">
                        <div class="wpb_wrapper">
                            <div style="text-align: center" >



                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FVinhOfficialFanpage%2F&tabs=timeline&width=320&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="320" height="250" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true"  allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            </div>
                            <div class="socical-widget">
                                <h5>FOLLOW US ON</h5>
                                <a href="https://www.facebook.com/VinhOfficialFanpage" target="_blank"><i class="fab fa-facebook-square"></i></a>
                                <a href="https://www.youtube.com/phamvinhofficial99" target="_blank"><i class="fab fa-youtube"></i></a>
                                <a href="https://www.tiktok.com/@phamvinh99" target="_blank"><i class="fab fa-tiktok"></i></a>
                                <a href="https://www.instagram.com/vinhhaycuoi/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>

                    </div>

                </div>
                        <a href="https://www.facebook.com/VinhOfficialFanpage" target="_blank">Go to Facebook</a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_trangchu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>