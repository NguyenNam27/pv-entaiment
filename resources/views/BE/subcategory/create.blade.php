@extends('BE.layout.main')
@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm thông tin danh mục <a href="{{route('admin.subcategory.index')}}" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách danh mục</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> danh sách</a></li>
                <li><a href="#">thông tin danh mục</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin danh mục</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{route('admin.subcategory.store')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên danh mục </label>
                                        <input type="text" class="form-control" name="name" id="name"
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
                                            <option value="">--Chọn--</option>
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
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </section>


    </div>
@endsection
{{--@section('my_js')--}}
{{--    --}}{{--    <script src="backend/ckeditor/ckeditor.js"></script>--}}
{{--    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            CKEDITOR.replace('ckeditor');--}}
{{--            CKEDITOR.config.pasteFormWordPromptCleanup = true;--}}
{{--            CKEDITOR.config.pasteFormWordRemoveFontStyles = false;--}}
{{--            CKEDITOR.config.pasteFormWordRemoveStyles = false;--}}
{{--            CKEDITOR.config.language = 'vi';--}}
{{--            CKEDITOR.config.htmlEncodeOutput = false;--}}
{{--            CKEDITOR.config.ProcessHTMLEntities = false;--}}
{{--            CKEDITOR.config.entities = false;--}}
{{--            CKEDITOR.config.entities_latin = false;--}}
{{--            CKEDITOR.config.ForceSimpleAmpersand = true;--}}
{{--            CKEDITOR.replace('short_description',{--}}
{{--                filebrowserBrowseUrl: 'backend/ckfinder/ckfinder.html',--}}
{{--                filebrowserUploadUrl: 'backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',--}}
{{--                filebrowserWindowWidth: '1000',--}}
{{--                filebrowserWindowHeight: '700'--}}
{{--            });--}}
{{--            CKEDITOR.replace('content',{--}}
{{--                filebrowserBrowseUrl: 'backend/ckfinder/ckfinder.html',--}}
{{--                filebrowserUploadUrl: 'backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',--}}
{{--                filebrowserWindowWidth: '1000',--}}
{{--                filebrowserWindowHeight: '700'--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
