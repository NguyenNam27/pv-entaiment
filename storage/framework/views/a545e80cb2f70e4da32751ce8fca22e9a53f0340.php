<?php $__env->startSection('content'); ?>
    <?php if(count(session('cart'))>0): ?>
    <section>
        <div class="container">
            <h3 class="title">ORDER FORM</h3>
            <?php if(session()->has('success')): ?>
                <div class="alert alert-success"><?php echo e(session()->get('success')); ?></div>
            <?php endif; ?>
            <table class="table-bordered">
                <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $total = 0;
                ?>
                <?php if(session('cart')): ?>
                    <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php  $total += $details['price'] * $details['quantity'] ?>
                        <tr data-id=<?php echo e($id); ?>>
                            <td>
                                <img src="<?php echo e($details['image']); ?>" alt="">
                                <a href="#"><?php echo e($details['name']); ?></a>
                            </td>
                            <td id="dongia" price="<?php echo e($details['price']); ?>"><?php echo e(number_format($details['price'])); ?>đ</td>
                            <td>

                                <input type="number" value="<?php echo e($details['quantity']); ?>" class="quantity update-cart">

                            </td>
                            <td id="total-<?php echo e($id); ?>"
                                class="total_price" total_price="<?php echo e($details['price'] * $details['quantity']); ?>"><?php echo e(number_format($details['price'] * $details['quantity'])); ?>đ
                            </td>
                            <td class="close-product"><i class="fa-solid fa-xmark"></i></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
            </table>
            <div class="category ">
                <div class="price">
                    <p>Tổng tiền: <span id="tong-tien">  <?php echo e(number_format($total)); ?>đ</span></p>
                </div>
                <span>Giá chưa bao gồm phí Ship</span>
                <div class="button">
                    <button class="update">Cập nhật giỏ hàng</button>
                    <button class="buy">Đặt hàng</button>
                </div>
            </div>
            <div class="buy_info">
                <h3 class="title"><i class="fa-solid fa-pen-to-square"></i> THÔNG TIN ĐẶT HÀNG</h3>
                <form action="<?php echo e(route('post_checkout')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Họ tên <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="name" id="" placeholder="Nhập họ tên">
                        </div>

                        <div class="col-md-4">
                            <label for="">Email <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="email" id="" placeholder="Nhập email">
                        </div>

                        <div class="col-md-4">
                            <label for="">Số điện thoại <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="phone" id="" placeholder="Nhập số điện thoại">
                        </div>

                        <div class="col-md-4">
                            <label for="">Tỉnh/Thành phố <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="provinceid" class="province">
                                <option>--Chọn Tỉnh Thành Phố--</option>
                                <?php $__currentLoopData = $LocationProvince; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->provinceid); ?>"><?php echo e($data->name); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Quận/Huyện <span>*</span></label>

                        </div>
                        <div class="col-md-8">
                            <select id="districtid" name="districtid">
                                <option>--Chọn Quận Huyện--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Phường/Xã <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="wardid" id="wardid">
                                <option>--Chọn Phường Xã--</option>

                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Địa chỉ nhận hàng <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="address" id="" placeholder="Nhập địa chỉ">
                        </div>

                        <div class="col-md-4">
                            <label for="">Thanh toán <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="" id="">
                                <option value="1">Chọn phương thức thanh toán</option>
                                <option value="2">Thanh toán online</option>
                                <option value="3">Thanh toán qua ví momo</option>
                                <option value="4">Thanh toán chuyển khoản</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Lời nhắn thêm <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="note" id="" placeholder="Nội dung lời nhắn">
                        </div>
                    </div>
                    <div class="desc d-dfex">
                        <p>Khi bấm nút đặt hàng có nghĩa là bạn đã chấp nhận các</p>
                        <a href="#">Chính sách & Quy định của chúng tôi.</a>
                    </div>
                    <button>Đặt hàng</button>
                </form>

            </div>
        </div>
    </section>
    <?php else: ?>
    <section>

        <table class="table-bordered">









            <tbody>
                    <h3 style="text-align: center">Không có sản phẩm trong giỏ</h3>
            </tbody>
        </table>

    </section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_cart'); ?>
    

    <script type="text/javascript">

        $(document).ready(function () {
            $.ajaxSetup({
                header: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            $('.update-cart').on('click', function (e) {
                e.preventDefault();
                var element = $(this);
                var id = element.parents('tr').attr('data-id');
                var quantity = element.parents('tr').find('.quantity').val();
                var price = element.parents('tr').find('#dongia').attr('price');
                if (isNaN(quantity) || quantity < 1) {
                    alert('Số lượng phải là số nguyên >=1');
                    return false;
                }
                $.ajax({
                    url: '<?php echo e(route('update_cart')); ?>',
                    method: 'patch',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        id: id,
                        quantity: quantity,
                    },

                    success: function (response) {
                        var totalPrice = quantity * price;

                        let b = Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(totalPrice);

                        $('#total-' + id).html(b);
                        $('#total-' + id).attr("total_price", totalPrice);


                        var sum = 0;
                        $('.total_price').each(function (index) {
                            var thanhTien = parseFloat($(this).attr('total_price'));
                            sum += thanhTien;
                        });
                        $('#tong-tien').html(Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(sum));
                    }
                })
            })
            $('.close-product').on('click', function (e) {
                e.preventDefault();
                var ele = $(this);
                Swal.fire({
                    title: 'Bạn có chắc không?',
                    text: "Bạn có chắc chắn muốn xóa ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '<?php echo e(route('remove-cart')); ?>',
                            type: 'DELETE',
                            data: {
                                _token: '<?php echo e(csrf_token()); ?>',
                                id: ele.parents("tr").attr("data-id")
                            },
                            success: function (response) {

                                Swal.fire(
                                    'Deleted!',
                                    'Xoá thành công',
                                    'success'
                                )

                                window.location.reload();
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        })
                    }
                })

            })
            //load quân huyện
            $('.province').on('change', function (e) {
                e.preventDefault();
                let data = {
                    provinceid: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
                $.ajax({
                    type: 'POST',
                    url: 'district',
                    dataType: 'json',
                    data: data,
                    success: function (json) {
                        //clear
                        $("#districtid").empty();
                        json.forEach((element, index, array) =>
                            $("#districtid").append("<option value='" + element['districtid'] + "'>" + element['name'])
                        );
                    }
                });

            })
            // load phường xã
            $('#districtid').on('change',function (e) {
                e.preventDefault();
                let data = {
                    districtid: $(this).val(),
                    _token: $('meta[name="csrf-token"]').attr('content')
                }
                // console.log(data);
                $.ajax({
                    type:'POST',
                    url:'ward',
                    dataType:'json',
                    data:data,
                    success:function (json) {
                        $('#wardid').empty();
                        json.forEach((element, index,array) =>
                            $('#wardid').append("<option value='"+element['wardid']+"'>"+element['name'])
                        );

                    }
                })

            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('FE.master.layout_giohang', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>