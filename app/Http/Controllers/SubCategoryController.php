<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Subcategory::all();
        $data = Subcategory::latest()->paginate(5);
        return view('BE.subcategory.index',[
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
        return view('BE.subcategory.create');
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
            'name'=>'required|max:255|unique:subcategories'

        ],[
            'name.required'=>'Bạn cần nhập tên',
            'name.unique'=>'Tên đã được dụng'
        ]);
        $name=$request->input('name');
        $is_active = $request->input('is_active');
        $sub = new Subcategory();
        $sub->name =  $name;
        $sub->is_active=$is_active ;
        $sub->save();
        session()->flash('success','Tạo thành công.');

        return redirect()->route('admin.subcategory.index');
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
        $edit = Subcategory::find($id);
        return view('BE.subcategory.edit',[
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
        $request->validate([
            'name'=>'required|max:255|unique:subcategories'

        ],[
            'name.required'=>'Bạn cần nhập tên',
            'name.unique'=>'Tên đã được dụng'
        ]);
        $name=$request->input('name');
        $is_active = $request->input('is_active');
        $sub = Subcategory::find($id);
        $sub->name =  $name;
        $sub->is_active=$is_active ;
        $sub->save();
        session()->flash('success','Cập nhập thành công.');

        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Subcategory::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
