<?php

namespace App\Http\Controllers;

use App\Product;
use App\Province;
use App\Ward;
use Cart;
use Session;
use App\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    public function giohang_index(){
        $product=Product::all();
        $LocationProvince = Province::all();

        return view('FE.layout.giohang',[
            'product'=>$product,
            'LocationProvince'=>$LocationProvince,

        ]);

    }
    public function AddToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get('cart',[]);
        if (isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else{
            $cart[$id] = [
                'name'=>$product->name,
                'quantity'=>1,
                'price'=>$product->price,
                'image'=>$product->image,
            ];
        }
        session()->put('cart',$cart);

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');;
    }
    public function UpdateCart(Request $request){

        if ($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart',$cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function RemoveCart(Request $request){
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }

    }
    public function getCheckOut(){
        $this->data['cart'] = Session::get('cart');

//        dd( $this->data['cart'] = Session::get('cart'));

    }
    public function postCheckOut(Request $request){
        $request-> validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|min:10|numeric',
            'address'=>'required|',
            ],[
            'name.required'=>'Bạn cần nhập tên người nhận',
            'email.required'=>'bạn cần nhập email',
            'email.email'=>'chưa đúng định dạng email',
            'email.unique'=>'email đã tồn tại',
            'phone.required'=>'Mời bạn nhập số điện thoại',
            'phone.min'=>'Số điện thoại phải có 10 ký tự số',
            'phone.numberic'=>'Số điện thoại là ký tự số',
            'address.required'=>'Bạn vui long nhập địa chỉ',
        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->note = $request->input('note');
        $customer->save();
//        dd($customer);
//        $order = new Order();
//        $order->customer_id=$customer->id;
//        $order->date_order = date('Y-m-d H:i:s');
//        $order->totals = str_replace(',', '', Cart::total());

        session()->flash('success','Cảm ơn bạn đã gửi thông tin cho chúng tôi.');
        return redirect()->route('cart.index');



    }

}
