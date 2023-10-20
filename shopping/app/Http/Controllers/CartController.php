<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //
    public function cartList()
    {
        $cartItems = Cart::instance(Auth::user()->id)->content();
       // dd($cartItems);
       //var_dump(Coupon::GetUsed());
        return view('customer.cart', compact('cartItems'))->with('use',Coupon::GetUsed());
    }

    public function addToCart(Request $request,$id)
    {  
        $product=product::findOrFail($id);
        Cart::instance(Auth::user()->id)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image'=>$product->image,
            'weight' => '1',
            'qty' => $request->qty,

        ])->associate('App\Models\product');
    //    $request->id=$id;
    //     Cart::add([
    //         'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'weight' => '1',
    //         'qty' => '1',

    //     ])->associate('product');
    //     session()->flash('success', 'Product is Added to Cart Successfully !');
    return back()->with('message','Product is Added to Cart Successfully !');

        return redirect()->back();
    }
    public function clear($userId){
        Cart::instance($userId)->destroy();
        session()->put('used',0);
        return back()->with('message','Cart has been cleared successfully');
    }
    public function updateCart($userId,$rowId,Request $request)
    {
        Cart::instance($userId)->update($rowId, $request->qty);

        session()->flash('message', 'Item Cart is Updated Successfully !');

        return redirect()->back();
    }

    public function removeCart($userId,$id)
    {
        $cart = Cart::instance($userId)->content()->where('rowId',$id);
        
            Cart::remove($id);
        
        //dd($cart);
        session()->flash('message', 'The item has been removed successfully !');

        return redirect()->back();
    }
    
    public function BuyItems($userId){

        Cart::instance($userId)->destroy();
        return redirect('cartlist')->with('message','Your request will be processed soon');
    }
    
    public function deleteCart($id){
        Cart::instance($id)->destroy();
        return back()->with('message','cart has been deleted');

    }
    public function showCart($id){
       
        
        $cartItems=Cart::instance($id)->content();
        return view('customer.cart',compact('cartItems'))->with('id',$id);
    }
    public function seeCart($id){
       
        
        $cartItems=Cart::instance($id)->content();
        $products=product::all();
        return view('admin.cart',compact('cartItems'))->with(['id'=>$id , 'products'=>$products]);
    }
    public function AddCheckProduct(Request $request,$userId){
       $request->validate([
            'check'=>'required',
            'qty'=>'required'
        ]);
        // $var=$request->get('check');
        // $var=0;
       // dd($request->get('check'),$request->get('qty'));
        //dd(count($request->get('check')));
       for($i=0;$i<count($request->get('check'));$i++){
        if($request->get('check')[$i]){
            $product=product::findOrFail($request->get('id')[$i]);
            Cart::instance($userId)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image'=>$product->image,
                'weight' => '1',
                'qty' => $request->get('qty')[$i],
    
            ])->associate('App\Models\product');
            }}
        return back()->with('message','Product is Added to Cart Successfully !');
       
       
       

    }
//     public function clearAllCart()
//     {
//         Cart::clear();

//         session()->flash('success', 'All Item Cart Clear Successfully !');

//         return redirect()->route('cart.list');
//     }
 }


