<?php

namespace App\Http\Controllers;
use App\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Photo::all();
        $data = Photo::latest()->paginate(10);

        return view('BE.gallery.index',[
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
        return view('BE.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name'=>'required|max:255|unique:photos',
            'image'=>'required|mimes:jpg,png,gif,svg|max: 10000',
            'is_active'=>'required|not_in:0',

        ],[
            'name.required'=>'bạn cần nhập tiêu đề',
            'name.unique'=>'tiêu đề đã được sử dụng',
            'image.required'=>'bạn cần chọn hình ảnh ',
            'image.image'=>'file cần có dạng jpg,png,gif,svg',
        ]);
        $name = $request->input('name');
        $is_active = $request->input('is_active');
        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $name.'-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/gallery/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
        }
        $gal = new Photo();
        $gal ->name = $name;
        $gal->is_active=$is_active;
        $gal->image=$path_avatar;

        $gal->save();
        session()->flash('success','Thêm thành công');
        return redirect()->route('admin.photo.index');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Photo::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
