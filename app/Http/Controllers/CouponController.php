<?php

namespace App\Http\Controllers;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function addCoupon()
    {
        $allcoupon = Coupon::all();
        return view('admin.coupon.addCoupon', compact('allcoupon'));
    }

    function storeCoupon(Request $request)

    {

        $request->validate([
            'coupon_code'       => 'required',
            'coupon_discount'   => 'required',
            'coupon_validity'   => 'required',
        ]);

        Coupon::insert([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Coupon insert successfull');
    }

    function editCoupon($coupon)
    {

        $allcoupon = Coupon::findOrFail($coupon);

        return view('admin.coupon.editCoupon', compact('allcoupon'));
    }

    function updateCoupon($coupon, Request $request)
    {

        Coupon::findOrFail($coupon)->update([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);
        
        return redirect('/add-coupon');
    }
}
