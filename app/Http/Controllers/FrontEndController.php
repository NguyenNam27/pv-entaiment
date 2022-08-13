<?php

namespace App\Http\Controllers;
use App\User;
use Session;
use Auth;
use App\Admin;
use App\Banner;
use App\Product;
use App\Post;
use App\Setting;
use App\Video;
use App\Contact;
use App\Photo;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class FrontEndController extends Controller
{
    public function Trangchu(){

        $banner = Banner::where('is_active','1')
                        ->orderBy('id','desc')
                        ->limit(3)
                        ->get();
        $video = Video::where('is_active','1')
                        ->orderBy('id','desc')
                        ->limit(2)
                        ->get();
        $post =Post::where('is_active','1')
            ->orderBy('id','desc')
            ->get();
        return view('FE.layout.trangchu',[
            'banner'=>$banner,
            'video'=>$video,
            'post'=>$post
        ]);
    }
    public function KOL(){
        return view('FE.layout.artist');
    }
    public function booking(){

        return view('FE.layout.book');
    }
    public function  post_booking(Request $request){
        $request->validate([
            'name_company'=>'required|max:255',
            'budget'=>'required',
            'full_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ],[


            ]);

            $contact = new Contact();
            $contact ->booking_type=$request->input('booking_type');
             $contact ->name_company=$request->input('name_company');
            $contact ->budget=$request->input('budget');
            $contact ->budget=$request->input('budget');
            $contact ->full_name=$request->input('full_name');
            $contact ->email=$request->input('email');
            $contact ->phone=$request->input('phone');
            $contact ->massage=$request->input('massage');
            $contact->save();

        session()->flash('success','Cảm ơn bạn đã gửi thông tin cho chúng tôi ');

        return redirect()->route('booking');
    }

    public function tintuc(){
        $new = Post::where('is_active','1')
                    ->orderBy('id','desc')
                    ->get();

        return view('FE.layout.new',[
            'new'=>$new
        ]);
    }
    public function chitiettintuc($slug){

        $detail = Post::where([['slug',$slug],['is_active','1']])->first();

        return view('FE.layout.chitietnew',[
            'detail'=>$detail
        ]);
    }
    public function chitietsanpham($slug){
        $detail_product = Product::where([['slug',$slug],['is_active','1']])->first();
        $relate = Product::where('subcategories_id', $detail_product->subcategories_id)
            ->whereNotIn('slug', [$slug])
            ->get();
        return view('FE.layout.chitietsanpham',[
            'detail_product'=>$detail_product,
            'relate'=>$relate
        ]);

    }

    public function store(){
        $product = Product::where('is_active','1')
                            ->orderBy('id','desc')
                            ->limit(3)
                            ->get();
        $product =Product::latest()->paginate(3);
        return view('FE.layout.store',[
            'product'=>$product,
        ]);
    }

    public function login(){

        return view('auth.login');
    }
    public function postlogin(Request $request){

    }
    public function signup(){

        return view('auth.register');
    }
    public function postSignup(Request $request){

        $this->validate($request,
            [
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
//                'image' => 'mimes:jpg,bmp,png'
            ],
            [
                'name.required' => 'vui lòng nhập tên',
                'name.unique' => 'Tên đã có người sử dụng',
                'email.required' => 'vui lòng nhập email',
                'email.email' => 'không đúng dạng email',
                'email.unique' => 'emai đã có người dùng',
                'password.required' => 'password chưa nhập',
                'image.required' => 'Vui lòng nhập ảnh của bạn',
//                'image.mimes' => 'Ảnh chưa đúng định dạng'
            ]);

        $path_avatar = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $request->file('image')->getClientOriginalExtension(); // Lấy . của file
            $filename = '-' . time() . '.' . $fileExtension;
            $path_upload = 'uploads/user/';
            $file->move($path_upload, $filename);
            $path_avatar = $path_upload . $filename;
        }
        $users = new User();
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = Hash::make($request->input('password'));
        $users->image = $path_avatar;
        $users->save();
//        dd($request->$path_avatar);
        session()->flash('success', 'Tạo thành công.');
        return redirect()->intended('/login');
    }


    public function picture(){
        $picture = Photo::all();
        return view('FE.layout.picture',[
            'picture'=>$picture
        ]);
    }
    public function video(){
        return view('FE.layout.video');
    }


}
