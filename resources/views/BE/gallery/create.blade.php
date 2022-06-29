@extends('BE.layout.main')
@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm Hình Ảnh <a href="{{route('admin.photo.index')}}" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách hình ảnh</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.photo.index')}}"><i class="fa fa-dashboard"></i> danh sách</a></li>
                <li><a href="{{route('admin.photo.index')}}">thông tin hình ảnh</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin hình ảnh</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
{{--                        {{dd($request->all())}}--}}
                        <form role="form" action="{{route('admin.photo.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên Hình Ảnh</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                               placeholder="nhập tên ảnh">
                                        @if($errors->has('name'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('name')}}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hình ảnh</label>
                                        <input type="file" id="image" name="image">
                                        <p class="help-block">Example block-level help text here.</p>
                                        @if($errors->has('image'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('image')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Hoạt động </label>
                                        <select class="form-control" name="is_active">
                                            <option value="select">--Chọn--</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">No</option>
                                        </select>
                                        @if($errors->has('is_active'))
                                            <label class="Text-red"
                                                   style=" font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('is_active')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="remember"> Check me out
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>


    </div>
@endsection

