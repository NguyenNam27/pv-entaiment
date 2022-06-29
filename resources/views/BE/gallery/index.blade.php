@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Quản lý bộ sưu tập <a href="{{route('admin.photo.create')}}" class="btn bg-purple btn-flat"><i
                        class="fa fa-plus"></i> Thêm hình ảnh</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-user"></i> Quản lý bộ sưu tập</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header with-border">

                            <h3 class="box-title">Bộ sưu tập </h3>

                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif


                        <div class="box-body">
                            <table class="table table-border">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th>Tên Hình Ảnh</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhập</th>
                                    <th>Hành Động</th>
                                </tr>
                                @foreach($data as $key=>$photo)
                                    <tr class="item-{{$photo->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$photo->name}}</td>
                                        <td><img src="{{asset($photo->image)}}" width="70" height="100%"></td>

                                        <td>{{($photo->is_active==1)?'Hiển thị':'Không hiển thị'}}</td>
                                        <td>{{$photo->created_at}}</td>
                                        <td>{{$photo->updated_at}}</td>
                                        <td>
                                            <a href="{{route('admin.product.edit',['edit'=>$photo->id])}}"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="{{$photo->id}}" class="btn btn-danger btn-delete"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer clearfix">
                            {{$data->links()}}
                        </div>
                    </div>
                </div>

            </div>


        </section>
        @endsection
        @section('my_js')

            <script type="text/javascript">
                $(document).ready(function () {
                    // Thiết lập csrf => chổng giả mạo
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    })

                    $('.btn-delete').on('click', function () {

                        let id = $(this).data('id');

                        // let result = confirm("Bạn có chắc chắn muốn xóa ?");

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
                                        url: 'admin/photo/' + id,
                                        type: 'DELETE',
                                        data: {
                                            name: ''
                                        },
                                        dataType: "json",
                                        success: function (res) {
                                            if (res.success != 'undefined' && res.success == 1) {
                                                $('.item-' + id).remove();
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Xoá thành công',
                                                    'success'
                                                )
                                            }
                                            window.location.reload();
                                        },
                                        error: function (e) {
                                            console.log(e);
                                        }
                                    })
                                }
                            }
                        );

                    });
                });
            </script>

@endsection

