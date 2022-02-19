<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Redirect;
use Illuminate\Support\Input;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class ProductsController extends Controller
{
    public function index()
    {
        $products= Product:: with('user')->get();
        return view('admin.layouts.posts', compact('products'));  }

    public function views()
    {
        $products=  Product:: with('user')->get();
        return view('admin.layouts.view', compact('products')); }

    public function admin(Request $request)
    {
        $contProducts = Product::count();
        $countorders = Order::count();
        $users=User::count();
        $orderstatus = Order::pluck('status')->toArray();
        return view('admin.welcome', compact('contProducts', 'countorders', 'users','orderstatus'));
    }


    public function store(Request $request)
    {   $product= new Product;
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
        return redirect('admin/view')->with('flash_message','Product Add Successfully'); }

    public function postview($id)
    {
        $product= Product::findOrFail($id);
        return view('admin.layouts.postviews')->with('product',$product); }


    public function viewprofile($id)
    {
        $product= User::findOrFail($id);
        return view('admin.layouts.profile')->with('product',$product); }


    public function edit($id)
    {
         $product=Product::find($id);
         return view ('admin.layouts.edit')->with('product',$product); }


    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description= $request->description;
        $product->price=$request->price;
        $product->date=$request->date;
        if($request->hasfile('file')){
           $destination='uploads/images/'.$product->file;
           if(File::exists($destination)){
              File::delete($destination);}
              $file= $request->file('file');
              $extenstion= $file->getClientOriginalExtension();
              $filename=time().'.'.$extenstion;
              $file->move('uploads/image/', $filename);
              $product->file_path=$filename;  }
              $product->update();
        return redirect('admin/view')->with('flash_message', 'Product Update');}


     public function destroy($id)
      {
         Product::destroy($id);
         return redirect('admin/view')->with('flash_message', 'Product Delete');  }

     public function vieworders(){
         $orders =Order::with('user')->get();
         return view ('admin.layouts.vieworders' ,compact('orders'));
    }

    public function register(){
        return View('admin.layouts.register');
    }







}
