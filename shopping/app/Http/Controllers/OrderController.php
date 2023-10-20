<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Models\product;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $orders = Order::all();
        return view('admin.orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        if(Cart::instance(Auth::user()->id)->GetFixedDiscount()){
            $order = $user->orders()->create([
                'user_id' => Auth::user()->id,
                'total' => Cart::instance(Auth::user()->id)->priceTotal(2, '.', ''),
                'tax' => Cart::instance(Auth::user()->id)->tax(2, '.', ''),
                'discount' => Cart::instance(Auth::user()->id)->GetFixedDiscount(),
                'discount_percent' => 0,
                'newTotal' =>Cart::instance(Auth::user()->id)->total('2','.','')-Cart::instance(Auth::user()->id)->GetFixedDiscount()
    
                ]);
        }
        else{
            $order = $user->orders()->create([
                'user_id' => Auth::user()->id,
                'total' => Cart::instance(Auth::user()->id)->priceTotal(2, '.', ''),
                'tax' => Cart::instance(Auth::user()->id)->tax(2, '.', ''),
                'discount' => Cart::instance(Auth::user()->id)->discount('2','.',''),
                'discount_percent' => Cart::instance(Auth::user()->id)->GetPercentDiscount(),
                'newTotal' =>Cart::instance(Auth::user()->id)->total('2','.','')
    
                ]);
        }

        foreach (Cart::instance(Auth::user()->id)->content() as $cartItem) {
            // $order->orderItems()->attach($cartItem->id,[
            $order->orderItems()->attach($cartItem->id, [
                'product_name' => $cartItem->name,
                'qty' => $cartItem->qty,
                'total' => $cartItem->qty * $cartItem->price,

            ]);
            $product = product::where('id', $cartItem->id)->first();
            $product->update(['qty' => $product->qty - $cartItem->qty]);
        }


        Cart::instance(Auth::user()->id)->destroy();
        session()->put('used', 0);
        return back()->with('message', 'Order created successfully !');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function showOrder($id)
    {
        //
        $order = Order::where('id', $id)->first();
        // $products=product::;
        // dd($orders);
        return view('admin.order_details', compact('order'));
    }

    public function showMyOrder($id)
    {
        //
        $order = Order::where('id', $id)->first();
        // $products=product::;
        // dd($orders);
        return view('customer.showOrder', compact('order'));
    }

    public function show_products($id)
    {
        //
        $orders = Order::where('id', $id)->first();
        // dd($orders);
        return view('Orders.order_products', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function show(Order $order)
    {
        //
        if (Auth::user()->role == 1) {
            $orders = Order::all();
        } else {
            $orders = Order::where('user_id', Auth::user()->id)->get();
        }

        return view('Orders.orders', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $pid, Request $request)
    {
        //

        $order = Order::where('id', $id)->first();
        $product = product::where('id', $pid)->first();
        // $item= $order->orderItems()->where('id',$pid)->first();
        // $product->update(['qty' => $product->qty - $request->qty + $item->qty]);

        //$user=User::find($id);
        $item = $order->orderItems();
        //dd($item);

        $item->updateExistingPivot($pid, [
            'qty' => $request->qty,
            'total' => $request->qty * $product->price,
        ]);

        $product->update(['qty' => $product->qty - $request->qty]);
        //     $order->orderItems()->updateExistingPivot($id, [
        //         'qty'=>$request->qty,
        //         'total'=>$item->qty*$item->price
        //     ]
        // );


        // $item=$order->orderItems()->where('product_id',$id)->first();
        // $item->attach($item->id,[
        //     'qty'=>$request->qty,
        //     'total'=>$item->qty*$item->price

        // ]);
        $order->update([
            'total' => $order->total+$request->qty * $product->price

        ]);
        return back();
    }
    public function AddCartItems($id)
    {
        $order = Order::where('id', $id)->first();
        $user = User::where('id', $order->user_id)->first();
        $order->update([
            'tax'=>(float)$order->tax+(float)Cart::instance($user->id)->tax(),

            'total' => (float)$order->total + (float)Cart::instance($user->id)->priceTotal(2, '.', '')

        ]);
        if (Cart::instance($user->id)->discount()) {
            $val = (float)Cart::instance($user->id)->discount(2, '.', '');
            $order->update([
    
                'discount' => $order->discount + $val,
                'newTotal' => (float)$order->newTotal + (float)Cart::instance($user->id)->total(2, '.', ''),

                'discount_percent'=>$order->discount_percent+Cart::instance($user->id)->GetPercentDiscount()

            ]);
        }
        else{
           
            $order->update([
                'newTotal' => (float)$order->newTotal + (float)Cart::instance($user->id)->total(2, '.', '')-(float)Cart::instance($user->id)->GetFixedDiscount(),

                'discount' => $order->discount  + Cart::instance($user->id)->GetFixedDiscount(2, '.', ''),
               ]);

        }
        foreach (Cart::instance($user->id)->content() as $cartItem) {
            // $order->orderItems()->attach($cartItem->id,[
            $order->orderItems()->attach($cartItem->id, [
                'product_name' => $cartItem->name,
                'qty' => $cartItem->qty,
                'total' => $cartItem->qty * $cartItem->price,

            ]);
            $product = product::where('id', $cartItem->id)->first();
            $product->update(['qty' => $product->qty - $cartItem->qty]);
        }
        session()->put('used',0);
        Cart::instance($user->id)->destroy();
        return back()->with('message', 'CartItems added successfully !');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function deleteitem($id, $itemId)
    {
        //
        $order = Order::where('id', $id)->first();

        $order_product = $order->orderItems()->find($itemId);
        //dd($order_product->pivot->total);
        $order->update([
            'total' => $order->total - $order_product->pivot->total
        ]);
        $order->orderItems()->detach($itemId);
        return back()->with('message', 'Item removed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Order::where('id', $id)->first();
        $order->orderItems()->detach();
        $order->delete();

        return back()->with('message', 'Order deleted successfully');
    }
    public function Myorders($id){
        $orders=Order::where('user_id',$id)->get();
        return view('customer.orders',compact('orders'));
    }
}
