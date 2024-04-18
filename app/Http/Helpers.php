<?php

use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

// use Auth;
class Helper {





    // Cart Count
    public static function cartCount($user_id=''){
        // dd(Auth::guard('customer')->check());
        if(Auth::guard('customer')->check()){
            if($user_id=="") $user_id=auth()->guard('customer')->user()->id;
            return Cart::where('customer_id',$user_id)->where('order_id',null)->sum('quantity');
        }
        else{
            return 0;
        }
    }
    // relationship cart with product
    // public function product(){
    //     return $this->hasOne('App\Models\Product','id','product_id');
    // }

    public static function getAllProductFromCart($user_id=''){
        if(Auth::guard('customer')->check()){
            if($user_id=="") $user_id=auth()->guard('customer')->user()->id;
            return Cart::with('ticket')->where('customer_id',$user_id)->where('order_id',null)->get();
        }
        else{
            return [];
        }
    }
    // Total amount cart
    public static function totalCartPrice($user_id=''){
        if(Auth::guard('customer')->check()){
            if($user_id=="") $user_id=auth()->guard('customer')->user()->id;
            return Cart::where('customer_id',$user_id)->where('order_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }



    // Total price with shipping and coupon
    // public static function grandPrice($id,$user_id){
    //     $order=Order::find($id);
    //     // dd($id);
    //     if($order){
    //         $shipping_price=(float)$order->shipping->price;
    //         $order_price=self::orderPrice($id,$user_id);
    //         return number_format((float)($order_price+$shipping_price),2,'.','');
    //     }else{
    //         return 0;
    //     }
    // }



}

?>
