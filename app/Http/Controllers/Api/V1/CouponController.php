<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{


    public function checkCouponDiscount(Request $request)
    {
        $data = $request->all();
        $getCoupon = Coupon::query()
        ->where('code',$request->code)
        ->where('expires_at','>=',now())
        ->where('status',1)
        ->first();
        if($getCoupon){
            $getCoupon->amount_type == 1
            ? $discount = $getCoupon->amount
            :$discount =  $data['subtotal'] - $data['subtotal']*($getCoupon->amount/100);

            return response()->json([
                'status'=>'Coupons Applied Successfully',
                'discount'=>$discount,
        ],200);
        }else{
            return response()->json(['message'=>'Invalid Coupon Code'],400);
        }

    }
}
