<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function show(){

        $products = product::paginate(8);
        $cartItems = Cart::instance(Auth::user()->id)->content();
        return view('admin.products', compact('products','cartItems'));
    }
    public function index(){
        $products = product::all();
        //$cartItems = Cart::instance(Auth::user()->id)->content();
        return view('customer.home', compact('products'));
    }
    public function blade(){
        $products = product::paginate(5);

        return view('Products.manageproducts', compact('products'));
    }
    public function create()
        {
            return view('admin.addProduct');
        }
    
    public function store(Request $request)
    {
        $input=$request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty'=>'required',
            'category'=>'required',
            'price'=>'required',
            'image' => 'required',
            

        ]);
  
        $input=$request->all();
   
        if ($image = $request->file('image')) {
            $imgpath = 'images/';
            $img = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imgpath, $img);
            $input['image'] = "$img";
        }
      
        product::create($input);
      
        return redirect()->route('products.show')
                        ->with('success','Product created successfully.');
    }
    public function display(Product $product)
    {
  
        return view('Products.show',compact('product'));
    }

    public function edit($id)
    {
        $product=product::where('id',$id)->first();
        return view('admin.updateProduct',compact('product'));
    }

    public function update(Request $request, $id)
   
    {
        $product=product::where('id',$id)->first();
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'qty'=>'required',
            'category'=>'required',
            'price'=>'required',
         

        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $imgpath = 'images/';
            $img = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imgpath, $img);
            $input['image'] = "$img";
        }else{
            unset($input['image']);
        }
           
        $product->update($input);
     
        return redirect()->route('products.show')->with('success','Product updated successfully');
    }
 

    public function destroy($id)
    {
        $product=product::where('id',$id)->first();
        $product->delete();
      
        return back()->with('success','Product deleted successfully');
    }
    public function showByCategory(string $category){
        if($category=='phones'){
        $array=array('phones');
        $products=product::whereIn('category',$array)->get();
       
        return view('customer.phone',compact('products'));
        }
        if($category=='laptops'){
        $array=array('laptops');
        $products=product::whereIn('category',$array)->get();
        return view('customer.laptop',compact('products'));
        }
        if($category=='ipads' || $category=='tablettes'){
        $array=array('ipads','tablettes');
        $products=product::whereIn('category',$array)->get();
        
        return view('customer.ipad',compact('products'));
        }
        if($category=='watchs'|| $category=='headphones'){
        $array=array('watchs','headphones');
        $products=product::whereIn('category',$array)->get();
        return view('customer.watch',compact('products'));
        }
    }
}
 

