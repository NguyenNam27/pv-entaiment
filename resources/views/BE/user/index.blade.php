@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                DANH SÁCH QUẢN LÝ ADMIN

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

                            <h3 class="box-title">Danh Sách </h3>

                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">{{session()->get('success')}}</div>
                        @endif


                        <div class="box-body">
                            <table class="table table-border">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Ảnh</th>
                                    <th>Vai trò</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành Động</th>
                                </tr>
                                @foreach($data as $key=>$user)
                                    <tr class="item-{{$user->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><img src="{{asset($user->image)}}" width="100px" height="80px"></td>
                                        <td>{{$user->role_id}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.user.edit',['edit'=>$user->id])}}"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="{{$user->id}}" class="btn btn-danger btn-delete"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                                        url: 'admin/user/' + id,
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

