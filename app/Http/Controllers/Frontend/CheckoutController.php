<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Models\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $shippingCharge  = General::where('name', 'delivery-charge')->first();
            return view('frontend.checkout', compact('shippingCharge'));

        } else {

            Session::put('checkout', true);
            return redirect()->route('login');
        }
    }

    public function order(Request $request)
    {
        $orderObject = new Order();
        $user_id = Auth::user()->id;
        $request->validate(Order::$validateRule);
        $orderObject->storeOrder($request,$user_id);
        Session::forget('coupon_amount');
        Session::save();
        return redirect()->route('user.dashboard');
    }
}
