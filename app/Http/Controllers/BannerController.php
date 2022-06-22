<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;

class BannerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::all();
        $data = Banner::latest()->paginate(5);
        return view('BE.banner.index',[
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
        return view('BE.banner.create');
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
            'name'=>'required|max:255|unique:banners',

        ],[
                'name.required'=>'Bạn cần nhập tên banner',

        ]);

        $name = $request->input('name');
        $path_avatar = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-'.time().'.'.$fileExtension;
            $path_upload = 'uploads/banner/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
        }

        $is_active = $request->input('is_active');
        $description = $request->input('description');


        $banner = new Banner();
        $banner->name = $name;
        $banner->image = $path_avatar;
        $banner->description= $description;
        $banner->is_active=$is_active;
        $banner->save();
        session()->flash('success','Tạo thành công.');

        return redirect()->route('admin.banner.index');
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
        $edit = Banner::find($id);
        return view('BE.banner.edit',[
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
        $name = $request->input('name');
        $is_active = $request->input('is_active');
        $description = $request->input('description');
        $path_avatar = '';
        $banner = Banner::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-'.time().'.'.$fileExtension;
            $path_upload = 'uploads/banner/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
            $banner->image = $path_avatar;

        }
        $banner->name = $name;
        $banner->description= $description;
        $banner->is_active=$is_active;
        $banner->save();
        session()->flash('success','Cập nhập thành công.');

        return redirect()->route('admin.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Banner::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
