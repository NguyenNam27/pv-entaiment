@extends('BE.layout.main')
@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chỉnh sửa danh mục <a href="{{route('admin.subcategory.index')}}" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách danh mục</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> danh sách</a></li>
                <li><a href="#">Chỉnh sửa danh mục</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin danh mục mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{route('admin.subcategory.update',['edit'=>$edit->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên danh mục mới</label>
                                        <input value="{{$edit->name}}" type="text" class="form-control" name="name" id="name"
                                               placeholder="nhập tiêu đề">
                                        @if($errors->has('name'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('name')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Trạng thái </label>
                                        <select class="form-control" name="is_active">
                                            <option value="">{{ ($edit->is_active==1)?'hiển thị':'Không hiển thị' }}</option>
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
                                <button type="submit" class="btn btn-primary">Cập nhập</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>


    </div>
@endsection

