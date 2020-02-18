<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Coupon;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function cart($cart, Request $request)
    {

        // mac address find.............
        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');

        $acrt_check = Cart::where('product_id', $cart)->where('visitor_ip', request()->ip())->count();

        if ($acrt_check > 0) {
            Cart::where('product_id', $cart)->where('visitor_ip', request()->ip())->increment('quantity', 1);
        } else {


            Cart::insert([
                'product_id'    => $cart,
                'quantity'      => 1,
                'mac_device'    => $MAC,
                'visitor_IP'    => $request->ip(),
            ]);
        }
        return back();
    }

    function cartDelete($cart_id)
    {
        Cart::findOrFail($cart_id)->delete();
        return back();
    }

    function shoppingCart($cart = '')
    {
        $ip = request()->ip();

        $MAC = exec('getmac');
        $MAC = strtok($MAC, ' ');
        $coupon_price = 0;
        $total = 0;
        $discount = 0;
        $grand_total = 0;

        $shopping = Cart::where('visitor_ip', request()->ip())->get();

        foreach ($shopping as  $value) {
            $total += ($value->get_product->product_price * $value->quantity);
        }

        if ($cart == '') {
            $grand_total = $total;
            return view('template.shoppingCart', compact('shopping', 'cart', 'coupon_price', 'total', 'grand_total', 'discount'));
        } else {
            $coupon = Coupon::where('coupon_code', $cart)->exists();

            if ($coupon) {
                if (Carbon::now() <= Coupon::where('coupon_code', $cart)->first()->coupon_validity) {
                    $coupon_price = Coupon::where('coupon_code', $cart)->first()->coupon_discount;

                    $discount = $total * $coupon_price / 100;

                    $grand_total = $total - $discount;

                    session(['grand_total' => $grand_total, 'discount' => $discount,'coupon_discount'=>$coupon_price,'total'=>$total]);


                    return view('template.shoppingCart', compact('shopping', 'cart', 'coupon_price', 'total', 'discount', 'grand_total'));
                } else {
                    $invalid = 'time nai';
                    return view('template.shoppingCart', compact('shopping', 'cart', 'coupon_price', 'total', 'discount', 'grand_total'));
                }
            }

            return view('template.shoppingCart', compact('shopping', 'cart', 'coupon_price', 'total', 'discount', 'grand_total'));
        }

    }

    function updateCart(Request $request)
    {
        foreach ($request->id as $key => $value) {
            Cart::findOrFail($value)->update([
                'quantity' => $request->quantity[$key]
            ]);
        }
        return back();
    }
    public function checkout()
    {
        return view('template/checkout');
    }
}
