@extends('BE.layout.main')
@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm Profile <a href="{{route('admin.setting.index')}}" class="btn bg-purple "><i class="fa fa-plus"></i> Danh sách profile</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"> Profile </a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Profile</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form action="{{route('admin.setting.store')}}" method ="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên tổ chức</label>
                                        <input type="text" class="form-control" name="company_name" placeholder="Enter company_name">
                                        @if($errors->has('company'))
                                            <label class="Text-red  " style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('company')}}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">LOGO</label>
                                        <input type="file" id="image" name="image" >

                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Số điện thoại liên hệ</label>
                                        <input type="text" class="form-control" name ="hotline" id="hotline" placeholder="Enter address">
                                        @if($errors->has('hotline'))
                                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('hotline')}}
                                            </label>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email của bạn</label>
                                        <input type="email" class="form-control" name ="email" id="email" placeholder="Enter email">
                                        @if($errors->has('email'))
                                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('email')}}
                                            </label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Địa chỉ</label>
                                        <input type="text" class="form-control" name ="address" id="address" placeholder="Enter address">
                                        @if($errors->has('address'))
                                            <label class="Text-red" style="font-size:15px;font-weight:600;margin-top:5px;color:red" >
                                                <i class="fa fa-info"></i>{{$errors->first('address')}}
                                            </label>
                                        @endif

                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Giới thiệu</label>
                                        <textarea type="text" class="form-control" name="introduce" id="introduce"></textarea>

                                        @if($errors->has('introduce'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('introduce')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Trạng thái</label>
                                        <select class="form-control" name="is_active">
                                            <option value="">--Chọn--</option>
                                            <option value="1">Hiển thị</option>
                                            <option value="0">Không hiển thị</option>
                                        </select>

                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_token"> Check me out
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Tạo </button>
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
@section('my_js')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.pasteFormWordPromptCleanup = true;
            CKEDITOR.config.pasteFormWordRemoveFontStyles = false;
            CKEDITOR.config.pasteFormWordRemoveStyles = false;
            CKEDITOR.config.language = 'vi';
            CKEDITOR.config.htmlEncodeOutput = false;
            CKEDITOR.config.ProcessHTMLEntities = false;
            CKEDITOR.config.entities = false;
            CKEDITOR.config.entities_latin = false;
            CKEDITOR.config.ForceSimpleAmpersand = true;
            CKEDITOR.replace('introduce',{
                filebrowserBrowseUrl: 'backend/ckfinder/ckfinder.html',
                filebrowserUploadUrl: 'backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserWindowWidth: '1000',
                filebrowserWindowHeight: '700'
            });


        });
    </script>
    @endsection
