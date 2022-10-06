<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderby('created_at','DESC')->paginate(5);
        return view('admin.manage_order')->with(compact('order'));
    }
}
