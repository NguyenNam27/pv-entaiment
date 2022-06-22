@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm banner <a href="{{route('admin.banner.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách banner</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Banner </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chỉnh sửa banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form action="{{route('admin.banner.update',['edit'=>$edit->id])}}" method ="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên mới</label>
                                        <input value="{{$edit->name}}" type="text" class="form-control" name="name" placeholder="Enter name">
                                        @if($errors->has('name'))
                                            <label class="Text-red  " style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('name')}}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Hình ảnh mới</label>
                                        <input type="file" id="image" name="image" >
                                        <img src="{{asset($edit->image)}} " width="100px" height="70px">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1"> Mô tả</label>
                                        <input value="{{$edit->description}}" type="text" class="form-control" name ="description" id="description" placeholder="Enter description">
                                        @if($errors->has('description'))
                                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('description')}}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="{{$edit->is_active}}">{{($edit->is_active == 1) ? 'Hiển thị' : 'không hiển thị' }}</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Không hiển thị</option>
                                        </select>

                                    </div>


                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_token"> Lưu
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Cập nhập</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection
