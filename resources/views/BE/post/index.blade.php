@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                DANH SÁCH BÀI VIẾT <a href="{{route('admin.post.create')}}" class="btn bg-purple btn-flat"><i
                        class="fa fa-plus"></i> Thêm</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-user"></i> QUẢN LÝ </a></li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh Sách bài viết </h3>
{{--                            <select name=" ">--}}
{{--                                <option value="">--Tất cả--</option>--}}
{{--                                <option value="">Tin hot</option>--}}
{{--                                <option value=""> Tin nổi bật</option>--}}
{{--                                <option value=""> Tin mới</option>--}}
{{--                            </select>--}}
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif
                        <div class="box-body">
                            <table class="table table-border">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
{{--                                    <th>Danh mục</th>--}}
                                    <th>Mô tả ngắn</th>
                                    <th>Từ khoá tìm kiếm</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>ngày cập nhập</th>
                                    <th>Chức năng</th>
                                </tr>
                                @foreach($data as $key=>$post)
                                    <tr class="item-{{$post->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$post->title}}</td>
                                        <td><img src="{{asset($post->image)}}" width="100px" height="70px"></td>
{{--                                        <td>{{$post->subcategories_id}}</td>--}}
                                        <td>{{strip_tags($post->short_description)}}</td>
                                        <td>{{strip_tags($post->key_word)}}</td>
                                        <td>{{($post->is_active==1)?'Hiển thị':'Không hiển thị'}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td>{{$post->updated_at}}</td>

                                        <td>
                                            <a href="{{route('admin.post.edit',['id'=>$post->id])}}"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="{{$post->id}}" class="btn btn-danger btn-delete"><i
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
                                        url: 'admin/post/' + id,
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

