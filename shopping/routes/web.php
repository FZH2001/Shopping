<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CouponController;
use App\Models\User;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function () {
    $products=product::all();
     return view('welcome',compact('products'));});
Route::get('/test',function(){ return view('customer.test');});


// Two factor authentication codes 
// IkgMSDgMDF-xPwPG9eeZU
// 44NZ4ynOm1-rvKRzOBvXY
// 75UffdfG7g-6lEK6eemqs
// cN4h6kn1DZ-lXji2wiV2m
// KgMsgkKS38-3bhClEZFbe
// EiarsKoUlD-TO7ua0eaFQ
// PvON01oKzB-P2pjHSKZRA
// Dna9yMLOuW-1gOPFH8ttH


###################################################################################
// Routes without auth middleware

    //Language
    Route::get('locale/{lang}',[LanguageController::class,'setlanguage'])->name('lang');
    
    Route::get('/category/{category}',[ProductController::class,'showByCategory'])->name('showcategory');
    //coupon 
    Route::post('/coupon', [CouponController::class, 'store'])->name('coupon.use');
    Route::post('/list/{id}', [CartController::class, 'addTocart'])->name('add.to.cart');

    Route::get('/home',[ProductController::class, 'index'])->name('home');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // admin pages

    Route::get('/dashboard', function () { return view('layouts.dashboard'); })->name('dashboard');
    Route::post('productshow/{id}',function($id){ 
        $product=product::where('id',$id)->first();
        return view('admin.showProduct')->with('product',$product);})->name('product.show');
    Route::match(['get','post'],'edit/{id}', [ProductController::class,'edit'])->name('edit');
    Route::put('edit/{id}',[ProductController::class,'update'])->name('update');
    Route::get('/carts',function(){
        $users=User::all();
        return view('admin.carts',compact('users')); })->name('carts');

    //---------------------------------------------------------------------------

    // customer pages
    Route::get('/showorders',[ OrderController::class, 'index'])->name('orders');
    Route::match(['get','post'],'/orderdetails/{id}',[ OrderController::class, 'showOrder'])->name('order.show');
    Route::get('/showproducts', [ProductController::class, 'show'])->name('products.show');
    Route::get('/addproduct', [ProductController::class,'create'])->name('product.add');
    Route::post('showorder/{id}',[ OrderController::class, 'showMyOrder'])->name('showMyorder');
    Route::get('myorders/{id}',[ OrderController::class, 'Myorders'])->name('myorders');
    Route::post('/ordercreate',[ OrderController::class, 'create'])->name('order.create');

    Route::delete('productdelete/{id}',[ProductController::class,'destroy'])->name('product.delete');
    Route::get('/checkout',function(){
        $id=Auth::user()->id;
        $cartItems=Cart::instance($id)->content();
        return view('customer.checkout',compact('cartItems'))->with('id',$id);
    })->name('checkout');
    Route::match(['get','post'],'/showItem/{id}',function($id){ 
        $product=product::where('id',$id)->first();
        $products=product::where('category',$product->category)->get();
        return view('customer.showProduct',compact('product'))->with('products',$products);
    })->name('showProduct');
    //--------------------------------------------------------------------------------

    //Managing products
    // Route::get('/dashboard', [ProductController::class, 'show'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'blade'])->name('manage');
    Route::get('/create', [ProductController::class,'create'])->name('create');
    Route::post('/store', [ProductController::class,'store'])->name('store');
    Route::get('show/{product?}', [ProductController::class,'display'])->name('show');




    //Mailing
    Route::get('/mail',[MailController::class,'sendMail'])->name('commande');

    // Route::get('/cart', function () {return view('cart');})->name('cart');

    //Managing cart items
    Route::get('/cartlist', [CartController::class, 'cartList'])->name('cart.list');
    Route::delete('/cartlist/{userid}/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::put('/updatecart/{userid}/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::get('/buyitems/{userid}',[CartController::class,'BuyItems'])->name('buyitems');
    Route::delete('/clearcart/{userid}',[CartController::class,'clear'])->name('cart.clear');
    Route::delete('/removecart/{id}',[CartController::class,'deleteCart'])->name('removecart');
    Route::match(['get', 'post'],'/showcart/{id}',[CartController::class,'showCart'])->name('showcart');
    Route::match(['get', 'post'],'/seecart/{id}',[CartController::class,'seeCart'])->name('seecart');
    Route::match(['get','post'],'/addproduct/{id}',[CartController::class,'AddCheckProduct'])->name('addcheckproducts');


    // Manage order
    Route::get('/orders',[ OrderController::class, 'show'] )->name('orders.show');
    Route::put('/orderitemupdate/{id}/{pid}',[ OrderController::class, 'edit'])->name('orderitem.update');
    Route::match(['post','get','delete'],'/orderitemdelete/{id?}/{itemId?}',[ OrderController::class, 'deleteitem'])->name('orderitem.delete');
    Route::delete('/orderdelete/{id}',[ OrderController::class, 'destroy'])->name('order.delete');
    Route::get('/orderproducts/{id}',[ OrderController::class, 'show_products'])->name('order_products');
    Route::post('/AddCartItems/{id}',[ OrderController::class, 'AddCartItems'])->name('AddCartItems');

    //Manage Carts
   
   
    Route::get('redirect',function(){
        $role=Auth::user()->role;
        if($role){
            return redirect('dashboard');
        }
        else{
        return  redirect('home');
        }
    });



});

