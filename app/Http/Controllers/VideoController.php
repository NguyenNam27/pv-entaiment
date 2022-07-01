<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::all();
        $data = Video::latest()->paginate(10);

        return view('BE.video.index',[
           'data'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'title'=>'required|max:255|unique:videos',

        ],[
            'title.required'=>'Bạn cần nhập tên video',

        ]);

        $title = $request->input('title');
        $slug = $request->input('slug');

        $path_avatar = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $slug.'-'.time().'.'.$fileExtension;
            $path_upload = 'uploads/video/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
        }
        $URL = $request->input('URL');

        $is_active = $request->input('is_active');


        $video = new Video();
        $video->title = $title;
        $video->slug= $slug;
        $video->URL=$URL;
        $video->image = $path_avatar;
        $video->is_active=$is_active;
        $video->save();
        session()->flash('success','Tạo thành công.');

        return redirect()->route('admin.video.index');
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
        $edit = Video::find($id);
        return view('BE.video.edit',[
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
        $request-> validate([

        ],[

        ]);

        $title = $request->input('title');
        $slug = $request->input('slug');

        $path_avatar = '';
        $video = Video::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $slug.'-'.time().'.'.$fileExtension;
            $path_upload = 'uploads/video/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
            $video->image = $path_avatar;

        }

        $URL = $request->input('URL');

        $is_active = $request->input('is_active');


        $video->title = $title;
        $video->slug= $slug;
        $video->URL=$URL;
        $video->is_active=$is_active;
        $video->update();
        session()->flash('success','Cập nhập thành công.');

        return redirect()->route('admin.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Video::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
