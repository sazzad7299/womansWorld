<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Shipping;
use PDF;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\OrderConfirmation;
use App\Mail\OrderConfirmationPDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    protected $orderObject;

    public function __construct()
    {
        $this->orderObject = new Order();
    }

    public function index()
    {
        $orders = Order::latest()->select('id', 'user_id', 'grand_total', 'pay_options_id', 'delivery_status', 'payment_status', 'shipping_options_id','viewed')->paginate(20);
        // return $orders;
        return view('backend.admin.order.index', compact('orders'));
    }
    public function show(Order $order)
    {
        if($order->viewed == 0){
            $order->viewed = 1;
            $order->save();
        }
        $order = Order::with('orderdetails')->findOrFail($order->id);
        return view('backend.admin.order.orderdetails', compact('order'));
    }

    public function status(int $id, int $status)
    {
        $response = $this->orderObject->changeOrderStatus($id, $status);
        return $response;
    }
    public function paystatus(int $id, int $status)
    {
        $response = $this->orderObject->changeOrderPayStatus($id, $status);
        return $response;
    }
    public function sendinvoice(Request $request)
    {
        try {
            $data = $request->all();

            Mail::to($data['email'])->send(new OrderConfirmationPDF($request->order_id, $data));
            session()->flash('success', 'Email Send Successfully!');

            return back();
        } catch (\Throwable $th) {

            session()->flash('error', 'Something Went Wrong!');
            return back();
        }


    }
    public function saleReportSearch()
    {
        return view('backend.admin.reports.sale_search');
    }
    public function salereport(Request $request)
    {

        $data = $request->all();
        // dd($request->all());

        // $fDate =strtotime($request->from_date);
	    // $tDate = Carbon::createFromFormat('Y-m-d', $request->to_date);
        // dd($tDate,$fDate);

      $orders = Order::where('delivery_status',4)
      ->whereBetween('date',[$request->from_date, $request->to_date])
      ->get();
        $pdf = PDF::loadView('backend.admin.print.sale_report', ['orders' => $orders, 'data' => $data]);
        // $html = View::make('backend.admin.print.sale_report', ['orders' => $orders, 'data' => $data])->render();

        // $pdf->loadHtml("<th>Customer Name</th>");
        // $pdf->render();

       return  $pdf->stream('sale-report.pdf');

    }
}
