<?php $__env->startSection('chitietsanpham'); ?>
    <section class="product  ">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 col-lg-5">




                    <ul id="imageGallery" style="list-style: none">
                        <li data-thumb="<?php echo e(asset($detail_product->image)); ?>" data-src="<?php echo e(asset($detail_product->image)); ?>">
                            <img width="100%" src="<?php echo e(asset($detail_product->image)); ?>" />
                        </li>
                        <li data-thumb="<?php echo e(asset($detail_product->image)); ?>" data-src="<?php echo e(asset($detail_product->image)); ?>">
                            <img width="10%" src="<?php echo e(asset($detail_product->image)); ?>" />
                        </li>
                        <li data-thumb="<?php echo e(asset($detail_product->image)); ?>" data-src="<?php echo e(asset($detail_product->image)); ?>">
                            <img width="10%" src="<?php echo e(asset($detail_product->image)); ?>" />
                        </li>
                        <li data-thumb="<?php echo e(asset($detail_product->image)); ?>" data-src="<?php echo e(asset($detail_product->image)); ?>">
                            <img width="10%" src="<?php echo e(asset($detail_product->image)); ?>" />
                        </li>

                    </ul>
                </div>
                <div class="col-md-12 col-lg-7">
                    <div class="item_info">
                        <h4><?php echo e($detail_product->name); ?></h4>
                        <p><?php echo e(strip_tags($detail_product->short_description)); ?></p>
                        <p><?php echo $detail_product->content; ?></p>

                        <p>*Giá sau ngày <?php echo e($detail_product->created_at); ?>: <?php echo e(number_format($detail_product->price)); ?> VNĐ</p>
                        <p class="price"><?php echo e(number_format($detail_product->price)); ?> VND</p>
                        <label for="">Số lượng:</label>
                        <div class ="input-group text-center">
                            <button class = "input-group-text decrement-btn">-</button>
                            <input type="text" class="qty-input" value="1" disabled>
                            <button class = "input-group-text increment-btn">+</button>
                        </div>



                        <button  class="add-to-cart-btn"><a href="<?php echo e(route('add_cart',['id'=>$detail_product->id])); ?>" style="color: white"> Add to cart</a> </button>
                    </div>
                    <div class="message">

                        <p>Đã thêm vào Giỏ hàng.</p>
                        <a href="<?php echo e(route('add_cart',['id'=>$detail_product->id])); ?>">Xem Giỏ Hàng</a>
                    </div>
                </div>
            </div>
            <h4>Related Product</h4>
            <div class=" row product-similar ">
                <?php $__currentLoopData = $relate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 info">
                    <div class="item">
                        <div class="item__img">
                            <a href="<?php echo e(route('chitietsanpham',['slug'=>$relate->slug])); ?>">
                                <img src="<?php echo e(asset($relate->image)); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="desc">
                        <span>new</span>
                    </div>
                    <a href="<?php echo e(route('chitietsanpham',['slug'=>$relate->slug])); ?>"><?php echo e($relate->name); ?></a>
                    <p><?php echo e(number_format($relate->price)); ?> VND</p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('myjs'); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
           $('.decrement-btn').click(function (e) {
               e.preventDefault();
               var dec_value = $('.qty-input').val();
               var value = parseInt(dec_value,10);
               value = isNaN(value) ? 1 :value;
               if(value>1)
               {
                   value--;
                   $('.qty-input').val(value);
               }

           });
            $('.increment-btn').click(function (e) {
                e.preventDefault();
                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value,10);
                value = isNaN(value) ? 1 :value;
                if(value<9)
                {
                    value++;
                    $('.qty-input').val(value);
                }
            });

            $('.add-to-cart-btn').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = $(this).closest('.product_data').find('.product_id').val();
                var quantity = $(this).closest('.product_data').find('.qty-input').val();

                $.ajax({
                    url: "/add-to-cart",
                    method: "POST",
                    data: {
                        'quantity': quantity,
                        'product_id': product_id,
                    },
                    success: function (response) {
                        alertify.set('notifier','position','top-right');
                        alertify.success(response.status);
                    },
                });
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:3,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_chititetsanpham', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>