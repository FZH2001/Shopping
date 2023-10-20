<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
//include('/Applications/MAMP/htdocs/shopping/vendor/bumbummen99/shoppingcart/src/Cart.php');

class CouponController extends Controller
{
    public static $used;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        //

        if ($request->type=='percentage') {

            $coupon = Coupon::where('type', 'percent')->where('code', $request->code)->first();

            if (!$coupon) {
                return back()->with('error', 'Invalid coupon code !');
            } 
           
              
                //$coupon->discount(Cart::instance(Auth::user()->id)->subtotal('2', '.', ''));
               // $newTotal = (float)Cart::instance(Auth::user()->id)->subtotal('2', '.', '') - (float)Cart::instance(Auth::user()->id)->subtotal('2', '.', '') * ((float)$coupon->percent_of) / 100;
                Cart::instance(Auth::user()->id)->SetPercentDiscount($coupon->percent_of);
                Cart::instance(Auth::user()->id)->setGlobalDiscount($coupon->percent_of);
                session()->put('used',1);
               
                return back()->with([
                    'coupon'=>$coupon,
                    'message' => "Congratulations you've got a discount of " . $coupon->percent_of . " % .",
                   
                   // 'newTotal' => $newTotal
                ]);
                
        } 
        else {

            $coupon = Coupon::where('type', 'fixed')->where('code', $request->code)->first();
            if (!$coupon) {
                return back()->with('error', 'Invalid coupon code !');
            } 
            $val=(float)$coupon->value;
            Cart::instance(Auth::user()->id)->SetFixedDiscount($val);
            //Cart::instance(Auth::user()->id)->GetFixedDiscount();
            session()->put('used',1);

            //$newTotal = (float)Cart::instance(Auth::user()->id)->subtotal('2','.','') - (float)($coupon->value);
            //Cart::instance(Auth::user()->id)->setGlobalDiscount($coupon->value);
        //    session()->put('fixediscount',$fixediscount);
        //    session()->put('fixedtotal',$fixedtotal);

            return back()->with([
                'coupon'=>$coupon,
                'message' => "Congratulations you've got a discount of " . $coupon->value . " $ .",
                // 'fixediscount'=>$fixediscount,
               
                // 'fixedtotal'=>$fixedtotal
               // 'newTotal' => $newTotal
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
    
}
