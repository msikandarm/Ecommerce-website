<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;

use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function( $view){
            if(Auth::user()){
                $user= Auth::user()->id;
                $prod=Cart::where('user_id', $user)->with('product')->get();
                $view->with('prod',$prod);

            }else{
                $prod = [];
            }

        });

        view()->composer('*',function( $view){
            if(Auth::user()){
                $products= Product::all();
                $view->with('products',$products);

            }else{
                $prod = [];
            }

        });

        view()->composer('*',function( $view){
            if(Auth::user()){
                $userid= Auth::user()->id;
                $totalprice= $prod=DB::table('cart')->join('products','cart.product_id',"=",'products.id')
                 ->where('cart.user_id',$userid)->sum('products.price');
                $view->with('totalprice',$totalprice);

            }else{
                $prod = [];
            }

        });

    }
}
