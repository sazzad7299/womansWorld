<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\PayOption;
use App\Models\ShippingOption;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrdersResource;

class DashboardController extends Controller
{
    public function admin()
    {
        $today = Carbon::today();

        // Get the orders created today
        $orders = Order::whereDate('date', $today)->paginate(10);
        $todaysOrders = OrdersResource::collection($orders);
        $data['order'] = Order::query()->count();
        $data['completedOrder']= Order::where('delivery_status', 4)->count();
        // $data['totalOrderAmount'] = $completedOrder->sum('total');
        $data['sellAmount'] = Order::where('delivery_status', 4)->sum('grand_total') - Order::where('delivery_status', 4)->sum('coupon_discount');
        $data['stock'] = Product::sum(DB::raw('stock'));
        // $data['userWithMostOrders'] = User::withCount('orders')->orderByDesc('orders_count')->first();
        $data['stockAmount'] = Product::sum(DB::raw('price * stock'));
        $data['user'] = User::query()->count();
        // return $todaysOrders;
        return view('backend.admin.dashboard', compact('todaysOrders','data'));
    }
    public function settings()
    {
        $payoptions = PayOption::query()->paginate(10);
        $shippinoption = ShippingOption::query()->paginate(10);
        return view('backend.admin.settings.settings', compact('payoptions', 'shippinoption'));
    }
}
