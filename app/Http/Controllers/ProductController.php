<?php

namespace App\Http\Controllers;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        $data = Product::latest()->paginate(5);
        return view('BE.product.index',[
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
        $sub = Subcategory::all();
        return view('BE.product.create',[
            'sub'=>$sub
        ]);
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
            'name'=>'required|max:255|unique:products',
            'short_description'=>'required',
            'price'=>'required',


        ],[
            'name.required'=>'Bạn cần nhập tên sản phẩm',
            'name.unique'=>'Tên đã được sử dụng',
            'price.required'=>' Bạn cần nhập giá sản phẩm',
            'short_description.required'=>'bạn cần nhập mô tả sản phẩm',

        ]);
        $name = $request->input('name');
        $slug =$request->input('slug');
        $subcategories_id = $request->input('subcategories_id');
        $price = $request->input('price');
        $short_description = $request->input('short_description');
        $content = $request->input('content');
        $is_active = $request->input('is_active');

        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

            $pro = new Product();
            $pro ->name = $name;
            $pro->slug =$slug;
            $pro->subcategories_id = $subcategories_id;
            $pro->price=$price;
            $pro->short_description=$short_description;
            $pro->content=$content;
            $pro->is_active=$is_active;
            $pro->image = $path_avatar;


        }
        $pro->save();
        session()->flash('success','Tạo sản phẩm thành công ');
        return redirect()->route('admin.product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Product::find($id);
        $sub = Subcategory::all();

        return view('BE.product.edit',[
            'edit'=>$edit,
            'sub'=>$sub
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
//        dd($request->all());
        $name = $request->input('name');
        $slug =$request->input('slug');
        $subcategories_id = $request->input('subcategories_id');
        $price = $request->input('price');
        $short_description = $request->input('short_description');
        $content = $request->input('content');
        $is_active = $request->input('is_active');

        $path_avatar = '';
        $pro = Product::find($id);

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/product/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
            $pro->image = $path_avatar;
        }
        $pro ->name = $name;
        $pro->slug =$slug;
        $pro->subcategories_id = $subcategories_id;
        $pro->price=$price;
        $pro->short_description=$short_description;
        $pro->content=$content;
        $pro->is_active=$is_active;
        $pro->update();
        session()->flash('success','Cập nhập sản phẩm thành công ');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Product::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
