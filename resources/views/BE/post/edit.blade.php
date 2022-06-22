@extends('BE.layout.main')
@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Sửa thông tin bài viết <a href="{{route('admin.post.index')}}" class="btn bg-purple "><i
                        class="fa fa-plus"></i> Danh sách bài viết</a>

            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> danh sách</a></li>
                <li><a href="#">thông tin bài viết</a></li>

            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nhập thông tin bài viết mới</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form role="form" action="{{route('admin.post.update',['edit'=>$edit->id])}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên tiêu đề mới</label>
                                        <input value="{{$edit->title}}" type="text" class="form-control" name="title" id="title"
                                               placeholder="nhập tiêu đề">
                                        @if($errors->has('title'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('title')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Slug</label>
                                        <input value="{{$edit->slug}}" type="text" class="form-control" name="slug" id="slug"
                                               placeholder="nhập tiêu đề">
                                        @if($errors->has('slug'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('slug')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hình ảnh</label>
                                        <input  type="file" id="image" name="image" alt="Chọn ảnh mới">
                                        <img src="{{asset($edit->image)}} " width="100px" height="70px">
                                        <p class="help-block"></p>
                                        @if($errors->has('image'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('image')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả ngắn</label>
                                        <textarea type="text" class="form-control" name="short_description" id="short_description"> {{$edit->short_description}}</textarea>

                                        @if($errors->has('short_description'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('short_description')}}
                                            </label>
                                        @endif
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nội dung</label>
                                        <textarea type="text" class="form-control" name="content" id="content">{{$edit->content}}</textarea>

                                        @if($errors->has('content'))
                                            <label class="Text-red"
                                                   style="font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('content')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Từ khoá tìm kiếm </label>
                                        <input value="{{$edit->key_word}}" type="text" class="form-control" name="key_word" id="key_word">
                                        @if($errors->has('key_word'))
                                            <label class="Text-red"
                                                   style=" font-size:15px;font-weight:600;margin-top:5px;color:red">
                                                <i class="fa fa-info"></i>{{$errors->first('key_word')}}
                                            </label>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Trạng thái </label>
                                        <select class="form-control" name="is_active">
                                            <option value="{{$edit->is_active}}">{{($edit->is_active == 1) ? 'Hiển thị' : 'không hiển thị' }}</option>
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
@section('my_js')
    {{--    <script src="backend/ckeditor/ckeditor.js"></script>--}}
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
            CKEDITOR.replace('short_description',{
                filebrowserBrowseUrl: 'backend/ckfinder/ckfinder.html',
                filebrowserUploadUrl: 'backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserWindowWidth: '1000',
                filebrowserWindowHeight: '700'
            });
            CKEDITOR.replace('content',{
                filebrowserBrowseUrl: 'backend/ckfinder/ckfinder.html',
                filebrowserUploadUrl: 'backend/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                filebrowserWindowWidth: '1000',
                filebrowserWindowHeight: '700'
            });

        });
    </script>

    <script type="text/javascript">


        $('#title').keyup(function(event) {


            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title").value;

            //Đổi chữ hoa thành chữ thường
            slug = title.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            $('#slug').val(slug);

        });
    </script>

@endsection
