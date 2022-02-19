<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Orderitem;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function checkout()
    {

        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_6IFSkkST8DC0WQgQ0QyPOuYz00vyFXWBQE');

		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('credit-card',compact('intent'));

    }

    public function afterPayment(Request $request)
    {
        $user=Auth::user();
        $paymentMethod=$request->payment_method;
        $price=$request->price;

        try {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->charge($price, $paymentMethod);
        } catch (\Exception $exception) {

            return back()->with('error', $exception->getMessage());
        }
            $cartdata=Cart::where('user_id',$user->id)->get();
           $price=$request->price;
            $totalItems = 0;
        foreach ($cartdata as $orderdata ){
            $totalItems += $orderdata->prod_qty;
            Cart::where('user_id',$user->id)->delete();
        }
       $order= Order::create([
           'totalitems' => $totalItems,
           'totalprice' => $price,
           'user_id' => Auth::user()->id
        ]);


        foreach ($cartdata as $orderdata ){
            $prod_price= Product::where('id',$orderdata->product_id)->first()->price;

        Orderitem::create([
                 'prod_id' => $orderdata-> product_id,
                 'Quantity' =>$orderdata-> prod_qty,
                 'order_id' =>  $order->id,
                 'price' =>  $prod_price
             ]);
        }

        // // Here, complete the order, like, send a notification email
        // $user->notify(new OrderProcessed($product));

        return redirect()->route('index')->with('alert-success', 'Product purchased successfully!');
    }
}
