@extends('FE.master.layout_giohang')
@section('content')
    @if(count(session('cart'))>0)
    <section>
        <div class="container">
            <h3 class="title">ORDER FORM</h3>
            @if(session()->has('success'))
                <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
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
                @php
                    $total = 0;
                @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id=>$details)
                        @php  $total += $details['price'] * $details['quantity'] @endphp
                        <tr data-id={{$id}}>
                            <td>
                                <img src="{{$details['image']}}" alt="">
                                <a href="#">{{$details['name']}}</a>
                            </td>
                            <td id="dongia" price="{{$details['price']}}">{{number_format($details['price'])}}đ</td>
                            <td>

                                <input type="number" value="{{ $details['quantity'] }}" class="quantity update-cart">

                            </td>
                            <td id="total-{{$id}}"
                                class="total_price" total_price="{{$details['price'] * $details['quantity']}}">{{number_format($details['price'] * $details['quantity'])}}đ
                            </td>
                            <td class="close-product"><i class="fa-solid fa-xmark"></i></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="category ">
                <div class="price">
                    <p>Tổng tiền: <span id="tong-tien">  {{number_format($total)}}đ</span></p>
                </div>
                <span>Giá chưa bao gồm phí Ship</span>
                <div class="button">
                    <button class="update">Cập nhật giỏ hàng</button>
                    <button class="buy">Đặt hàng</button>
                </div>
            </div>
            <div class="buy_info">
                <h3 class="title"><i class="fa-solid fa-pen-to-square"></i> THÔNG TIN ĐẶT HÀNG</h3>
                <form id="frm-lang" action="{{route('post_checkout')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                                <option value="" selected disabled>--Chọn Tỉnh Thành Phố--</option>
                                @foreach($LocationProvince as $data)
                                    <option value="{{$data->provinceid}}">{{$data->name}}
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label  >Quận/Huyện <span>*</span></label>

                        </div>
                        <div class="col-md-8">
                            <select id="districtid" name="districtid">
                                <option value="" selected disabled>--Chọn Quận Huyện--</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Phường/Xã <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <select name="wardid" id="wardid">
                                <option value="" selected disabled>--Chọn Phường Xã--</option>

                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Địa chỉ nhận hàng <span>*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input id="address" type="text" name="address"  placeholder="Nhập địa chỉ">
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
                            <input  type="text" name="note" id="" placeholder="Nội dung lời nhắn">
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
    @else
    <section>

        <table class="table-bordered">
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Sản phẩm</th>--}}
{{--                <th>Giá</th>--}}
{{--                <th>Số lượng</th>--}}
{{--                <th>Thành tiền</th>--}}
{{--                <th></th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
            <tbody>
                    <h3 style="text-align: center">Không có sản phẩm trong giỏ</h3>
            </tbody>
        </table>

    </section>
@endif
@endsection
@section('js_cart')
    {{--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}

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
                    url: '{{ route('update_cart') }}',
                    method: 'patch',
                    data: {
                        _token: '{{csrf_token()}}',
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
                            url: '{{ route('remove-cart') }}',
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
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
    <script>
        // var form = document.getElementById('#frm-lang')
    </script>
@endsection
