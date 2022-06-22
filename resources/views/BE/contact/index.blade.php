@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                DANH SÁCH NGƯỜI ĐẶT LỊCH

            </h1>

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
                                    <th>Booking Type</th>
                                    <th>Tên tổ chức</th>
                                    <th>Ngân sách</th>
                                    <th>Họ tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Lời nhắn</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                @foreach($data as $key=>$con)
                                    <tr class="item-{{$con->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{($con->booking_type==1)?'Brand':'Brand'}}</td>
                                        <td>{{$con->name_company}}</td>
                                        <td>{{number_format($con->budget)}} vnđ</td>
                                        <td>{{$con->full_name}}</td>
                                        <td>{{$con->email}}</td>
                                        <td>{{$con->phone}}</td>
                                        <td>{{$con->massage}}</td>

                                        <td>trạng thái</td>
{{--                                        <td>{{$con->updated_at}}</td>--}}

                                        <td>
                                            <a href="{{route('admin.post.edit',['id'=>$con->id])}}"
                                               class="btn btn-warning btn-edit"><i class="fa fa-pencil"></i></a>
                                            <button data-id="{{$con->id}}" class="btn btn-danger btn-delete"><i
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

