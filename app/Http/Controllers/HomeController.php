<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Post;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('is_active','1')
            ->orderBy('id','desc')
            ->limit(3)
            ->get();
        $video = Video::where('is_active','1')
            ->orderBy('id','desc')
            ->limit(5)
            ->get();
        $post =Post::where('is_active','1')
            ->orderBy('id','desc')
            ->limit(5)
            ->get();
        return view('FE.layout.trangchu',[
            'banner'=>$banner,
            'video'=>$video,
            'post'=>$post
        ]);
    }

}
