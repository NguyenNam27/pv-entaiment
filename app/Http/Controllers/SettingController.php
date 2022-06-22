<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::where([['is_active','1']])
                            ->orderby('id','desc')
                            ->limit(1)
                            ->get();
//        $setting = Setting::first();
//
        return view('BE.setting.index', [
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BE.setting.create');
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
            'company_name'=>'required|max:255|unique:settings',
            'email'=>'required|unique:settings|email',
            'address'=>'required|max:255|unique:settings',
            'image'=>'required|mimes:jpg,png,gif,svg|max: 10000|unique:settings',
            'hotline'=>'required|max:40|unique:settings',
            'is_active'=>'required|not_in:0',

        ],[
            'company_name.required'=>'bạn cần nhập tên ',
            'company_name.unique'=>'Tên đã được sử dụng',
            'address.required'=>'bạn cần nhập địa chỉ',
            'hotline.required'=>'Bạn cần nhập liên hệ',
            'image.required'=>'bạn cần chọn logo',
            'image.image'=>'file cần có dạng jpg,png,gif,svg',
        ]);
        $company = $request->input('company_name');
        $address =$request->input('address');
        $hotline = $request->input('hotline');
        $email = $request->input('email');
        $introduce = $request->input('introduce');

        $is_active = $request->input('is_active');

        $set = new Setting();
        $path_avatar = '';
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $company.'-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/setting/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;

        }
        $set ->company_name = $company;
        $set->address =$address;
        $set->hotline = $hotline;
        $set->email = $email;
        $set->introduce =$introduce;
        $set->is_active = $is_active;
        $set->image = $path_avatar;
        $set->save();
        session()->flash('success','Tạo profile thành công');
        return redirect()->route('admin.setting.index');
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
        $edit = Setting::find($id);
        return view('BE.setting.edit',[
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
//        $request->validate([
//            'company_name'=>'required|max:255|unique:settings',
//            'email'=>'required|unique:settings|email',
//            'address'=>'required|max:255|unique:settings',
//            'image'=>'required|mimes:jpg,png,gif,svg|max: 10000|unique:settings',
//            'hotline'=>'required|max:40|unique:settings',
//            'is_active'=>'required|not_in:0',
//
//        ],[
//            'company_name.required'=>'bạn cần nhập tên ',
//            'company_name.unique'=>'Tên đã được sử dụng',
//            'address.required'=>'bạn cần nhập địa chỉ',
//            'hotline.required'=>'Bạn cần nhập liên hệ',
//            'image.required'=>'bạn cần chọn logo',
//            'image.image'=>'file cần có dạng jpg,png,gif,svg',
//        ]);
        $company = $request->input('company_name');
        $address =$request->input('address');
        $hotline = $request->input('hotline');
        $email = $request->input('email');
        $introduce = $request->input('introduce');

        $is_active = $request->input('is_active');

        $path_avatar = '';
        $set = Setting::find($id);

        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = $company.'-'.time().'.'.$fileExtension;
            // duong dan upload
            $path_upload = 'uploads/setting/';
            // upload file
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload.$filename;
            $set->image = $path_avatar;

        }
        $set ->company_name = $company;
        $set->address =$address;
        $set->hotline = $hotline;
        $set->email = $email;
        $set->introduce =$introduce;
        $set->is_active = $is_active;
        $set->update();
        session()->flash('success','Cập nhập profile thành công');
        return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Setting::destroy($id);
        if($delete){
            return response()->json(['success'=> 1 ,'message'=>'Thành Công']);
        } else{
            return response()->json(['success'=>0,'message'=>'Thất bại']);
        }
    }
}
