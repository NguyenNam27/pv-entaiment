<?php

namespace App\Http\Controllers;

use App\Product;
use App\Province;
use App\Ward;
use App\Customer;
use App\Order;
use Cart;
use Session;

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
        dd($this->data['cart'] = Session::get('cart'));
        return view('FE.layout.giohang');
    }
    public function postCheckOut(Request $request){
        dd($request->all());
        $request-> validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:customers',
            'phone'=>'required|min:10|numeric',
            'address'=>'required|',
            ],[
            'name.required'=>'B???n c???n nh???p t??n ng?????i nh???n',
            'email.required'=>'b???n c???n nh???p email',
            'email.email'=>'ch??a ????ng ?????nh d???ng email',
            'email.unique'=>'email ???? t???n t???i',
            'phone.required'=>'M???i b???n nh???p s??? ??i???n tho???i',
            'phone.min'=>'S??? ??i???n tho???i ph???i c?? 10 k?? t??? s???',
            'phone.numberic'=>'S??? ??i???n tho???i l?? k?? t??? s???',
            'address.required'=>'B???n vui long nh???p ?????a ch???',
        ]);
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->save();

        $order = new Order();
        $order->customer_id=$customer->id;
        $order->date_order = date('Y-m-d H:i:s');
        $order->totals = str_replace(',', '', Cart::total());
        $order->save();

        session()->flash('success','C???m ??n b???n ???? g???i th??ng ton cho ch??ng t??i.');
        return redirect()->route('order');



    }

}
