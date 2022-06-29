<?php

namespace App\Http\Controllers;

use App\Post;
use Faker\Provider\File;
use Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::all();
        $data = Post::latest()->paginate(10);

        return view('BE.post.index',[
            'data'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.post.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255|unique:posts',
            'short_description'=>'required',
            'image'=>'required|mimes:jpg,png,gif,svg|max: 10000',
            'key_word'=>'required|max:40',
            'is_active'=>'required|not_in:0',

        ],[
            'title.required'=>'bạn cần nhập tiêu đề',
            'title.unique'=>'tiêu đề đã được sử dụng',
            'short_description.required'=>'bạn cần nhập mô tả',
            'price.required'=>'Bạn cần nhập giá cho sản phẩm',
            'image.required'=>'bạn cần chọn hình ảnh cho bài viết',
            'image.image'=>'file cần có dạng jpg,png,gif,svg',
            'key_word.required'=>'bạn cần nhập từ khoá tìm kiếm cho bài viết',
        ]);
        $title = $request->input('title');
        $slug =$request->input('slug');
        $key_word = $request->input('key_word');
        $short_description = $request->input('short_description');
        $content = $request->input('content');

        $is_active = $request->input('is_active');


        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $slug.'-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/post/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

        }
        $post = new Post();
        $post ->title = $title;
        $post->slug =$slug;
        $post->key_word = $key_word;
        $post->short_description = $short_description;
        $post->content =$content;
        $post->is_active = $is_active;
        $post->image = $path_avatar;

        $post->save();
        session()->flash('success','Tạo bài viết thành công');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Post::find($id);
        return view('BE.post.edit',[
            'edit'=>$edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $title = $request->input('title');
        $slug =$request->input('slug');
        $key_word = $request->input('key_word');
        $short_description = $request->input('short_description');
        $content = $request->input('content');

        $is_active = $request->input('is_active');


        $path_avatar = '';
        $post = Post::find($id);

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $slug . '-' . time() . '.' . $fileExtension;
            // duong dan upload
            $path_upload = 'uploads/post/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload . $filename;

            $post->image = $path_avatar;

        }
        $post->title = $title;
        $post->slug = $slug;
//            $post->subcategories_id = $subcategories_id;
        $post->key_word = $key_word;
        $post->short_description = $short_description;
        $post->content = $content;
        $post->is_active = $is_active;
        $post->update();
        session()->flash('success', 'Sửa bài viết thành công');
        return redirect()->route('admin.post.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Post::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
