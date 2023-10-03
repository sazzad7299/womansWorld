<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Carbon\Traits\Date;
use App\Models\PayOption;
use App\Models\OrderDetail;
use App\Models\UserShipping;
use Illuminate\Http\Response;
use App\Models\ShippingOption;
use App\Mail\OrderConfirmation;
use App\Mail\OrderConfirmationPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'order_date_time',
        'shipping_charge',
        'amount',
        'delivered_date_time',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withdefault();
    }
    public function shippingoption()
    {
        return $this->belongsTo(ShippingOption::class, 'shipping_options_id', 'id')->withdefault();
    }
    public function paymentOption()
    {
        return $this->belongsTo(PayOption::class, 'pay_options_id', 'id')->withdefault();
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public static $validateRule = [

        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
    ];


    public function getUserAllOrder()
    {
        $orders = $this::where('orders.user_id', auth()->id())
            ->latest()
            ->select('orders.*')
            ->get();
        return $orders;
    }

    public function storeOrder($request, $user_id)
    {
        $data = $request->all();
        // return $data;
        DB::beginTransaction();
        try {
            $this->user_id = $user_id;
            $this->date = Carbon::now()->format('Y-m-d');
            $this->billing_info = $data['billing_info']['address'] . '<br>' . $data['billing_info']['thana'] . ',' . $data['billing_info']['city'] . ',' . $data['billing_info']['zip'];
            $this->shipping_address = $data['shipping_info']['address'] . '<br>'.$data['shipping_info']['thana'] . ',' . $data['shipping_info']['city'] . ',' . $data['shipping_info']['zip'];
            $this->pay_options_id = $data['pay_option_id'];
            $this->shipping_options_id = $data['shipping_option_id'];
            $this->payment_status = $data['pay_option_id'] ==1 ? '0':1;
            if ($request->has('payment_number')) {
                $this->payment_number = $data['payment_number'];
            }
            if ($request->has('transection_id')) {
                $this->trns_id = $data['transection_id'];
            }
            $this->total = $request->total;
            if ($request->has('coupon_discount')) {
                $this->coupon_discount = $data['coupon_discount'];
                $this->code = $data['code'];
            }
            $this->grand_total = $data['grand_total'];
            $this->shipping_charge = $data['shipping_charge'];
            $this->tracking_code = rand(11111,99999);
            $this->save();
            $order_id = $this->id;
            foreach ($data['cart'] as $item) {
                Product::where('id', $item['product_id'])
                ->decrement('stock', $item['quantity']);
                $carts[] = [
                    'order_id' => $order_id,
                    'user_id' => $user_id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    // 'size' => $item['size'],
                    // 'color' => $item['color'],
                    'price' => $item['price'],
                    'order_date_time' => Carbon::now()->format('Y-m-d'),
                    'total' => $item['total'],
                    'status' => 1,
                    'created_at' => now(),

                ];
            }
            OrderDetail::insert($carts);
            $shippingdata = [
                'name' => $data['shipping_info']['name'],
                'address' => $data['shipping_info']['address'],
                'city' => $data['shipping_info']['city'],
                'apartment' => $data['shipping_info']['apartment'],
                'zip' => $data['shipping_info']['zip'],
                'thana' => $data['shipping_info']['thana'],
                'phone' => $data['shipping_info']['phone'],
                'user_id' => $user_id,
            ];
            $shipping = UserShipping::insertOrUpdate($shippingdata);
            $user = User::where('id',$user_id)->first();
            $data['subject'] ="Your Order has been Received";
            $data['message'] ="Thank you for your recent purchase from our ecommerce store. We have received your order and we will process it as soon as possible. <br>You will receive a confirmation message from us shortly with the details of your order.<br>Thank you for choosing our ecommerce store, we appreciate your business.";
            Mail::to($user->email)->send(new OrderConfirmation($order_id, $data['subject']));

            $adata['subject'] ="New Order Received";

            Mail::to('perfumesomahar@gmail.com')->send(new OrderConfirmation($order_id,$adata['subject']));
            DB::commit();

            return response()->json(['message' => 'Order has been placed successfully']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => $th->getMessage()]);
        }

    }

    public function changeOrderStatus(int $id, int $status)
    {
            $order = $this::findOrFail($id);
            $updateorder ='';
            if($status==5){
                if($order->delivery_status == 0 && $status=5){
                    $updateorder = Order::where('id', $id)->update(['delivery_status' => $status]);
                }
            }elseif($status > $order->delivery_status){
                $updateorder = Order::where('id', $id)->update(['delivery_status' => $status]);
            }
           if($updateorder){
            return response()->json(['message' => 'Order status updated successfully']);
           }else{
            return response()->json(['message' => 'Something went wrong.Try Again!']);
           }

    }
    public function changeOrderPayStatus(int $id, int $status)
    {
            $order = $this::findOrFail($id);
            $updateorder ='';
            if($order->payment_status == $status){
                return response()->json(['message' => 'Payment status updated before']);
            }else{
                $updateorder = Order::where('id', $id)->update(['payment_status' => $status]);
            }

           if($updateorder){
            return response()->json(['message' => 'Payment Status Updated updated successfully']);
           }else{
            return response()->json(['message' => 'Something went wrong.Try Again!']);
           }

    }
}
