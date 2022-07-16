<?php

namespace App\Http\Controllers;

use App\Product;
use App\Province;
use App\Ward;
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
        $cart = Session::get('cart');
        
        dd( $cart->price);
    }

}
