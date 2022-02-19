<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
      if(Auth::check()){
        $products= Product:: with('user')->get();
        $userid= Auth::user()->id;
        $totalprice= $prod=DB::table('cart')->join('products','cart.product_id',"=",'products.id')
        ->where('cart.user_id',$userid)->sum('products.price');
        return view('index', compact('products'),compact('totalprice'));
      }
      else{
          return View('admin.layouts.login');
      }
    }


    public function viewproducts()
    {
        $products= Product::with('user')->get();
        return view('viewproducts', compact('products'));
    }


    public function addproduct()
    {
        $product= Product:: with('user')->get();
        return view('addproduct', compact('product'));
    }

    public function store(Request $request)
    {
        $product= new Product;
        $product->title=$request->input('title');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->date=$request->input('date');
        $product->user_id = auth()->id();
        if($request->hasfile('file')){
            $file= $request->file('file');
            $extenstion= $file->getClientOriginalExtension();
            $filename=time().'.'.$extenstion;
            $file->move('uploads/image/', $filename);
            $product->file_path=$filename;}
            $product->save();
        return redirect('viewproducts')->with('flash_message','product Add Successfully');
    }

    public function editproduct($id)
    {
        if (Auth::user()->id == Product::find($id)->user_id){
            $product=Product::find($id);
            return view ('editproduct')->with('product',$product);}
		else
		   {return Redirect('viewproducts');}
    }

    public function updateproduct(Request $request, $id)
    {
           $product=Product::find($id);
           $product->title=$request->title;
           $product->description= $request->description;
           $product->price= $request->price;
           $product->date= $request->date;
        if($request->hasfile('file')){
           $destination='uploads/images/'.$product->file;
          if(File::exists($destination)){
             File::delete($destination);}
             $file= $request->file('file');
             $extenstion= $file->getClientOriginalExtension();
             $filename=time().'.'.$extenstion;
             $file->move('uploads/image/', $filename);
             $product->file_path=$filename;
        }
       $product->update();
       return redirect('viewproducts')->with('flash_message', 'Product Update');
    }


       public function destroy($id)
       {
           Product::destroy($id);
           return redirect('viewproducts')->with('flash_message', 'Product Delete');
       }



       public function register()
       {
          $product= Product::all();
           return view('auth.login');
       }



       public function addtocart(Request $request)
       {
          if(Auth::check()){
               $cartprod=Cart::where('Product_id',$request->product_id)->first();
            if($cartprod){
               $cartprod->prod_qty +=1;
               $cartprod->update();

            }
            else{
                 $cart=new Cart;
                 $cart->user_id=Auth()->user()->id;
                 $cart->product_id=$request->product_id;
                 $cart->save();
            }
            return redirect('/');

          }
            else{
              return redirect('/login');
            }
       }

       public function cartitem(){
           if(Auth::check()){
              $user=Auth()->user()->id;
              return Order::where('user_id',$user)->count();
           }
         }

      public function cartlist(){
         $user=Auth()->user()->id;
         $prod=DB::table('cart')->join('products','cart.product_id',"=",'products.id')
         ->where('cart.user_id',$user)->select('products.*')->get();
         return view('partials.header',compact('prod') );
    }

   public function removecart($id){
      Cart::destroy($id);
      return view('index');

   }
   public function removecartproduct($id){
        Cart::destroy($id);
        return view('checkout');
 }


   public function ShowtotalProduct(){
        $user=Auth()->user()->id;
        $prod=DB::table('cart')->join('products','cart.product_id',"=",'products.id')
        ->where('cart.user_id',$user)->select('products.*')->get();
        return view('show_add_to_cart_product',compact('prod'));
   }

    public function updatecart( Request $request){
      //  dd($request->all());
           $prod_id= $request->prod_id;
           $prod_qty= $request->prod_qty;
    if(Auth::check()){
        if(Cart::where('product_id',$prod_id)->where('user_id',Auth::user()->id)->exists()){
           $cart= Cart::where('product_id',$prod_id)->where('user_id',Auth::user()->id)->first();
           $cart->prod_qty = $prod_qty;
           $cart->update();
           return response()->json(['status'=>"Quantity Update"]);

        }else{
            return response()->json(['status'=>"error"]);}
        }
     }

    public function proceedcheckout(Request $request){ // Enter Your Stripe Secret
        $intent = auth()->user()->createSetupIntent();
        return view('checkout',compact('intent'));
    }





}
